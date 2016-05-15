<?php
/**
 * Created by PhpStorm.
 * User: Fabian
 * Date: 12.05.16
 * Time: 07:19
 */

namespace Brotzka\DotenvEditor;

use Dotenv\Exception\InvalidPathException;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


class DotenvEditor
{
    /*
     * TODO: Implement Exception
     * TODO: Create a method to return all .env-keys
     */

    /*
    |--------------------------------------------------------------------------
    | Attributes and constructor
    |--------------------------------------------------------------------------
    |
    | 
    |
    */
    protected $env;
    protected $backupPath;

    /**
     * DotenvEditor constructor
     */
    public function __construct(){
        $backupPath = config('dotenveditor.backupPath');
        $env = config('dotenveditor.pathToEnv');

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
    public function getBackupPath(){
        return $this->backupPath;
    }

    /**
     * Set a new backup-path.
     * The new directory will be created if it doesn't exist
     *
     * @param $path
     * @return bool
     */
    public function setBackupPath($path){
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
    protected function createBackup(){
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
    protected function getLatestBackup(){
        $backups = $this->getVersions(0);
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
     * @return bool|string
     */
    public function restoreBackup($timestamp = NULL){
        if($timestamp !== NULL){
            if($this->getFile($timestamp)){
                $file = $this->getFile($timestamp);
            }
        } else {
            $file = $this->getFile($this->getLatestBackup());
        }
        return copy(
            $file,
            $this->env
        );
    }

    /**
     * Returns an array with all available backups.
     * $formated on 0 will show the timestamps instead of date time format.
     * Returns false, if no backups were found.
     *
     * @param int $formated
     * @return array|bool
     */
    public function getBackupVersions($formated = 1){
        $versions = array_diff(scandir($this->backupPath), array('..', '.'));

        if(count($versions) > 0){
            $output = array();
            $c = 0;
            foreach($versions as $version){
                $part = explode("_", $version);
                $output[$c] = ($formated) ? date("Y-m-d H:i:s", (int)$part[0]) : $part[0];
                $c++;
            }
            return $output;
        }
        return false;
    }

    /**
     * Returns filename and path for the given timestamp
     *
     * @param $timestamp
     * @return bool|string
     */
    protected function getBackupFile($timestamp){
        $backups = $this->getVersions(0);
        $index = array_search($timestamp, $backups);
        if(!$index){
            return false;
        }
        return $this->backupPath . $backups[$index] . "_env";
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
     * @param null $backup
     * @return array
     */
    public function getContent($timestamp = NULL){
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
    protected function envToArray($file){
        $string = file_get_contents($file);
        $string = preg_split('/\s+/', $string);
        $returnArray = array();

        foreach($string as $one){
            $entry = explode("=", $one, 2);
            $returnArray[$entry[0]] = $entry[1];
        }

        return $returnArray;
    }


    /*
    |--------------------------------------------------------------------------
    | Editing the env content
    |--------------------------------------------------------------------------
    |
    | changeEnv($data = array())
    |
    */
    protected function save($array){
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
     *
     * @param array $data
     * @return bool
     */
    public function changeEnv($data = array()){
        if(count($data) > 0){
            $this->createBackup();
            $env = $this->getContent();

            foreach($data as $dataKey => $dataValue){
                foreach($env as $envKey => $envValue){
                    if($dataKey === $envKey){
                        $env[$envKey] = $dataValue;
                    }
                }
            }

            return $this->save($env);
        } else {
            return false;
        }
    }

    /**
     * Add data to the current env file.
     * Data will be placed at the end.
     * 
     * @param array $data
     * @return bool
     */
    public function addData($data = array()){
        if(count($data) > 0){
            // Create Backup
            $this->createBackup();

            $env = $this->getContent();
            
            // Expand the existing array with the new data
            foreach($data as $key => $value){
                $env[$key] = $value;
            }

            return $this->save($env);
        }
        return false;
    }

    /**
     * Delete one or more entries from the env file.
     */
    public function deleteData($data = array()){
        $this->createBackup();
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