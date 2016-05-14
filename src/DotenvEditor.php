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
     * TODO: Create Backups (with JSON or XML???)
     * TODO: Restore from Backups
     * TODO: Check the changeEnv-method
     * TODO: Create add-method
     * TODO: Create delete-method
     * TODO: Create a method to return the env-entries
     * TODO: Create a method to return all .env-keys
     */

    protected $env;
    protected $backupPath;

    /**
     * DotenvEditor constructor.
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

    /**
     * Used to create a backup of the current .env.
     * Will be assigned with the current timestamp.
     *
     * @return bool
     */
    protected function createBackup(){
        $currentFile = $this->env;
        $backupFile = $this->backupPath . time() . "_env";
        return copy($currentFile, $backupFile);
    }


    /**
     * @param array $data
     * @return bool
     */
    public function changeEnv($data = array()){
        if(count($data) > 0){

            // Make a backup
            $this->createBackup();

            // Read .env-file
            $env = file_get_contents($this->env);

            // Split string on every " " and write into array
            $env = preg_split('/\s+/', $env);;

            // Loop through given data
            foreach((array)$data as $key => $value){

                // Loop through .env-data
                foreach($env as $env_key => $env_value){

                    // Turn the value into an array and stop after the first split
                    // So it's not possible to split e.g. the App-Key by accident
                    $entry = explode("=", $env_value, 2);

                    // Check, if new key fits the actual .env-key
                    if($entry[0] == $key){
                        // If yes, overwrite it with the new one
                        $env[$env_key] = $key . "=" . $value;
                    } else {
                        // If not, keep the old one
                        $env[$env_key] = $env_value;
                    }
                }
            }

            // Turn the array back to an String
            $env = implode("\n", $env);

            // And overwrite the .env with the new data
            file_put_contents($this->env, $env);

            return true;
        } else {
            return false;
        }
    }
}