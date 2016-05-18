[![Latest Stable Version](https://poser.pugx.org/brotzka/laravel-dotenv-editor/v/stable)](https://packagist.org/packages/brotzka/laravel-dotenv-editor) [![Total Downloads](https://poser.pugx.org/brotzka/laravel-dotenv-editor/downloads)](https://packagist.org/packages/brotzka/laravel-dotenv-editor) [![Latest Unstable Version](https://poser.pugx.org/brotzka/laravel-dotenv-editor/v/unstable)](https://packagist.org/packages/brotzka/laravel-dotenv-editor) [![License](https://poser.pugx.org/brotzka/laravel-dotenv-editor/license)](https://packagist.org/packages/brotzka/laravel-dotenv-editor)

# Edit your Laravel .env file

This package offers you a possibility to edit your .env dinamically, for example out of a controller.

Right now, the package offers the following functionalities:
 - Change values from your .env
 - Create backups of your .env

The following functions are in process:
 - Restore a previous version of your .env
 - Add new entries
 - Delete entries


Already tested with:
 - Laravel 5.2

## How to

Add the package to your composer.json `require-dev` section:

    "brotzka/laravel-dotenv-editor": "dev-master"

and run

    composer update

Or you may require the package via:

    composer require brotzka/laravel-dotenv-editor

Add the following line to your `config/app.php` providers:

    Brotzka\DotenvEditor\DotenvEditorServiceProvider::class,

Add the following line to your `config/app.php` aliases:

    'DotenvEditor' => Brotzka\DotenvEditor\DotenvEditorFacade::class,

Finally you have to publish the config file via:

    php artisan vendor:publish

Now you can edit the config file and put in your values.

## Examples

The following example shows an controller with a method, in which we change some values from the .env.
Make sure, the entries you want to change, really exist in your .env.

    namespace App\Http\Controllers;

    use Brotzka\DotenvEditor\DotenvEditor;

    class EnvController extends Controller
    {
        public function test(){
            $env = new DotenvEditor();

            $env->changeEnv([
                'TEST_ENTRY1'   => 'one_new_value',
                'TEST_ENTRY2'   => $anotherValue,
            ]);
        }
    }

Before editing the .env, a backup will be created (by default in `resources/backups/dotenv-editor`).


## Available Functions

#### getBackupPath()
    /**
     * Returns the current backup-path
     *
     * @return mixed
     */

#### setBackupPath
    /**
     * Set a new backup-path.
     * The new directory will be created if it doesn't exist
     *
     * @param $path
     * @return bool
     */

#### keyExists($key)
    /**
     * Checks, if a given key exists in your .env-file.
     * Returns false or true
     *
     * @param $key
     * @return bool
     */

#### getValue($key) similar to the built-in function env()
    /**
     * Returns the value matching to a given key.
     * Returns false, if key does not exist.
     *
     * @param $key
     * @return bool|mixed
     */

#### createBackup()
    /**
     * Used to create a backup of the current .env.
     * Will be assigned with the current timestamp.
     *
     * @return bool
     */

#### getLatestBackup()
    /**
     * Returns the timestamp of the latest version.
     *
     * @return int|mixed
     */

#### restoreBackup($timestamp = NULL)
    /**
     * Restores the latest backup or a backup from a given timestamp.
     * Restores the latest version when no timestamp is given.
     *
     * @param null $timestamp
     * @return bool|string
     */

#### getBackupVersions($foramted = 1)
    /**
     * Returns an array with all available backups.
     * $formated on 0 will show the timestamps instead of date time format.
     * Returns false, if no backups were found.
     *
     * @param int $formated
     * @return array|bool
     */

#### getBackupFile()
    /**
     * Returns filename and path for the given timestamp
     *
     * @param $timestamp
     * @return bool|string
     */

#### getContent($timestamp = NULL)
    /**
     * Returns the content of a given backup file
     * or the content of the current env file.
     *
     * @param null $backup
     * @return array
     */

#### envToArray($file)
    /**
     * Writes the content of a env file to an array.
     *
     * @param $file
     * @return array
     */

#### save($array)
    /**
     * Saves the given data to the .env-file
     *
     * @param $array
     * @return bool
     */

#### changeEnv($data = array())
    /**
     * Change the given values of the current env file.
     *
     * @param array $data
     * @return bool
     */

#### addData($data = array())
    /**
     * Add data to the current env file.
     * Data will be placed at the end.
     *
     * @param array $data
     * @return bool
     */

#### deleteData($data = array())
    /**
     * Delete one or more entries from the env file.
     *
     * @param array $data
     * @return bool
     */