<?php
/**
 * Created by PhpStorm.
 * User: Fabian
 * Date: 12.05.16
 * Time: 07:19
 */

namespace Brotzka\DotenvEditor;

use Dotenv\Exception\InvalidPathException;
use Brotzka\DotenvEditor\Exceptions\DotEnvException;


class DotenvEditor
{
    /*
    |--------------------------------------------------------------------------
    | Attributes and constructor
    |--------------------------------------------------------------------------
    |
    | 
    |
    */
    private $env;
    private $backupPath;
    private $autoBackup = false;

    /**
     * DotenvEditor constructor
     */
    public function __construct()
    {
        $backupPath = config('dotenveditor.backupPath', base_path() . '/resources/backups/dotenv-editor/');
        $env = config('dotenveditor.pathToEnv', base_path() . '/.env');

        if(file_exists($env)){
            $this->env = $env;
        } else {
            return false;
        }

        if(!is_dir($backupPath)){
            mkdir($backupPath, 0777, true);
        }
        $this->backupPath = $backupPath;
    }

    /*
    |--------------------------------------------------------------------------
    | Getter & setter
    |--------------------------------------------------------------------------
    |
    | 
    |
    */
    /**
     * Returns the current backup-path
     *
     * @return mixed
     */
    public function getBackupPath()
    {
        return $this->backupPath;
    }

    /**
     * Set a new backup-path.
     * The new directory will be created if it doesn't exist
     *
     * @param $path
     * @return bool
     */
    public function setBackupPath($path)
    {
        if(!is_dir($path)){
            try {
                mkdir($path, 0777, true);
            }catch(InvalidPathException $e){
                echo $e->getMessage();
                return false;
            }
        }
        $this->backupPath = $path;
        return true;
    }

    /**
     * Checks, if a given key exists in your .env-file.
     * Returns false or true
     *
     * @param $key
     * @return bool
     */
    public function keyExists($key)
    {
        $env = $this->getContent();
        foreach($env as $envkey => $envvalue){
            if($key === $envkey){
                return true;
            }
        }
        return false;
    }

    /**
     * Returns the value matching to a given key.
     * Returns false, if key does not exist.
     *
     * @param $key
     * @return mixed
     * @throws DotEnvException
     */
    public function getValue($key)
    {
        if($this->keyExists($key)){
            return env($key);
        } else {
            throw new DotEnvException(trans('dotenv-editor::class.requested_value_not_available'), 0);
        }
    }

    /**
     * Activate or deactivate the AutoBackup-Functionality
     *
     * @param $onOff
     * @throws DotEnvException
     */
    public function setAutoBackup($onOff)
    {
        if(is_bool($onOff)){
            $this->autoBackup = $onOff;
        } else {
            throw new DotEnvException(trans('dotenv-editor::class.autobackup_wrong_value'), 0);
        }
    }

    /**
     * Checks, if Autobackup is enabled
     *
     * @return bool
     */
    public function AutoBackupEnabled()
    {
        return $this->autoBackup;
    }
    /*
    |--------------------------------------------------------------------------
    | Working with backups
    |--------------------------------------------------------------------------
    |
    | createBackup()
    | getLatestBackup()
    | restoreBackup($timestamp = NULL)
    | getBackupVersions($formated = 1)
    | getBackupFile($timestamp)
    |
    */
    /**
     * Used to create a backup of the current .env.
     * Will be assigned with the current timestamp.
     *
     * @return bool
     */
    public function createBackup()
    {
        return copy(
            $this->env,
            $this->backupPath . time() . "_env"
        );
    }

    /**
     * Returns the timestamp of the latest version.
     *
     * @return int|mixed
     */
    protected function getLatestBackup()
    {
        $backups = $this->getBackupVersions();
        $latestBackup = 0;
        foreach($backups as $backup){
            if($backup > $latestBackup) {
                $latestBackup = $backup;
            }
        }
        return $latestBackup;
    }

    /**
     * Restores the latest backup or a backup from a given timestamp.
     * Restores the latest version when no timestamp is given.
     *
     * @param null $timestamp
     * @return string
     */
    public function restoreBackup($timestamp = NULL)
    {
        $file = NULL;
        if($timestamp !== NULL){
            if($this->getFile($timestamp)){
                $file = $this->getFile($timestamp);
            }
        } else {
            $file = $this->getFile($this->getLatestBackup()['unformatted']);
        }

        return copy($file, $this->env);
    }

    /**
     * Returns the file for the given backup-timestamp
     * 
     * @param $timestamp
     * @return string
     * @throws DotEnvException
     */
    protected function getFile($timestamp)
    {
        $file = $this->getBackupPath() . $timestamp . "_env";

        if(file_exists($file)){
            return $file;
        } else {
            throw new DotEnvException(trans('dotenv-editor::class.requested_backup_not_found'), 0);
        }

    }

    /**
     * Returns an array with all available backups.
     * Array contains the formatted and unformatted version of each backup.
     * Throws exception, if no backups were found.
     * 
     * @return array
     * @throws DotEnvException
     */
    public function getBackupVersions()
    {
        $versions = array_diff(scandir($this->backupPath), array('..', '.'));

        if(count($versions) > 0){
            $output = array();
            $c = 0;
            foreach($versions as $version){
                $part = explode("_", $version);
                $output[$c]['formatted'] = date("Y-m-d H:i:s", (int)$part[0]);
                $output[$c]['unformatted'] = $part[0];
                $c++;
            }
            return $output;
        }
        throw new DotEnvException(trans('dotenv-editor::class.no_backups_available'), 0);
    }

    /**
     * Returns filename and path for the given timestamp
     *
     * @param $timestamp
     * @return string
     * @throws DotEnvException
     */
    public function getBackupFile($timestamp)
    {
        if(file_exists($this->getBackupPath() . $timestamp . "_env")){
            return $this->backupPath . $timestamp . "_env";
        }
        throw new DotEnvException(trans('dotenv-editor::class.requested_backup_not_found'), 0);
    }


    /**
     * Delete the given backup-file
     *
     * @param $timestamp
     * @throws DotEnvException
     */
    public function deleteBackup($timestamp)
    {
        $file = $this->getBackupPath() . $timestamp . "_env";
        if(file_exists($file)){
            unlink($file);
        } else {
            throw new DotEnvException(trans('dotenv-editor::class.backup_not_deletable'), 0);
        }
    }

    
    /*
    |--------------------------------------------------------------------------
    | Get the content
    |--------------------------------------------------------------------------
    |
    | getContent($backup = NULL)
    |
    */

    /**
     * Returns the content of a given backup file
     * or the content of the current env file.
     *
     * @param null $timestamp
     * @return array
     */
    public function getContent($timestamp = NULL)
    {
        if($timestamp === NULL){
            return $this->envToArray($this->env);
        } else {
            return $this->envToArray($this->getBackupFile($timestamp));
        }
    }

    /**
     * Writes the content of a env file to an array.
     *
     * @param $file
     * @return array
     */
    protected function envToArray($file)
    {
        $string = file_get_contents($file);
        $string = preg_split('/\n+/', $string);
        $returnArray = array();

        foreach($string as $one){
            if (preg_match('/^(#\s)/', $one) === 1) {
                continue;
            }
            $entry = explode("=", $one, 2);
            $returnArray[$entry[0]] = isset($entry[1]) ? $entry[1] : null;
        }

        return array_filter($returnArray,function(key) { return !empty($key);},ARRAY_FILTER_USE_KEY);
    }


    /**
     * Returns the given .env as JSON array containing all entries as object
     * with key and value
     *
     * @param null $timestamp
     * @return string
     */
    public function getAsJson($timestamp = NULL)
    {
        return $this->envToJson($this->getContent($timestamp));
    }


    /**
     * Converts the given .env-array to JSON
     *
     * @param array $file
     * @return string
     */
    private function envToJson($file = [])
    {
        $array = [];
        $c = 0;
        foreach($file as $key => $value){
            $array[$c] = new \stdClass();
            $array[$c]->key = $key;
            $array[$c]->value = $value;
            $c++;
        }
        return json_encode($array);
    }


    /*
    |--------------------------------------------------------------------------
    | Editing the env content
    |--------------------------------------------------------------------------
    |
    | changeEnv($data = array())
    |
    */

    /**
     * Saves the given data to the .env-file
     * 
     * @param $array
     * @return bool
     */
    protected function save($array)
    {
        if(is_array($array)){
            $newArray = array();
            $c = 0;
            foreach($array as $key => $value){
                $newArray[$c] = $key . "=" . $value;
                $c++;
            }

            $newArray = implode("\n", $newArray);

            file_put_contents($this->env, $newArray);

            return true;
        }
        return false;
    }

    /**
     * Change the given values of the current env file.
     * If the given key(s) is/are not found, nothing happens.
     *
     * @param array $data
     * @return bool
     * @throws DotEnvException
     */
    public function changeEnv($data = array())
    {
        if(count($data) > 0){
            if($this->AutoBackupEnabled()){
                $this->createBackup();
            }

            $env = $this->getContent();

            foreach($data as $dataKey => $dataValue){
                foreach($env as $envKey => $envValue){
                    if($dataKey === $envKey){
                        $env[$envKey] = $dataValue;
                    }
                }
            }
            return $this->save($env);
        }
        throw new DotEnvException(trans('dotenv-editor::class.array_needed'), 0);
    }

    /**
     * Add data to the current env file.
     * Data will be placed at the end.
     *
     * @param array $data
     * @return bool
     * @throws DotEnvException
     */
    public function addData($data = array())
    {
        if(count($data) > 0){
            if($this->AutoBackupEnabled()){
                $this->createBackup();
            }

            $env = $this->getContent();
            
            // Expand the existing array with the new data
            foreach($data as $key => $value){
                $env[$key] = $value;
            }

            return $this->save($env);
        }
        throw new DotEnvException(trans('dotenv-editor::class.array_needed'), 0);
    }

    /**
     * Delete one or more entries from the env file.
     *
     * @param array $data
     * @return bool
     * @throws DotEnvException
     */
    public function deleteData($data = array())
    {
        foreach($data as $key => $value){
            if(!is_numeric($key)){
                throw new DotEnvException("dotenv-editor::class.numeric_array_needed", 0);
            }
        }

        if($this->AutoBackupEnabled()){
            $this->createBackup();
        }
        $env = $this->getContent();

        foreach($data as $delete){
            foreach($env as $key => $value){
                if($delete === $key){
                    unset($env[$key]);
                }
            }
        }
        return $this->save($env);
    }
}
