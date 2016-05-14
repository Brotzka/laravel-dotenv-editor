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
