[![Codacy Badge](https://api.codacy.com/project/badge/Grade/26c13ba0918c42858ec6f94607238baa)](https://www.codacy.com/app/fabianhagen87/laravel-dotenv-editor?utm_source=github.com&utm_medium=referral&utm_content=Brotzka/laravel-dotenv-editor&utm_campaign=badger)
[![Latest Stable Version](https://poser.pugx.org/brotzka/laravel-dotenv-editor/v/stable)](https://packagist.org/packages/brotzka/laravel-dotenv-editor) 
[![Total Downloads](https://poser.pugx.org/brotzka/laravel-dotenv-editor/downloads)](https://packagist.org/packages/brotzka/laravel-dotenv-editor) 
[![Latest Unstable Version](https://poser.pugx.org/brotzka/laravel-dotenv-editor/v/unstable)](https://packagist.org/packages/brotzka/laravel-dotenv-editor) 
[![License](https://poser.pugx.org/brotzka/laravel-dotenv-editor/license)](https://packagist.org/packages/brotzka/laravel-dotenv-editor)

# Edit your Laravel .env file

This package offers you the possibility to edit your .env dynamically through a controller or model. 

The current version (2.x) ships with a graphical user interface based on VueJS to offer you a very simple implementation of all features.

List of available functions:
- check, if a given key exists
- get the value of a key
- get the complete content of your .env
- get the content as JSON
- change existing values
- add new key-value-pairs
- delete existing key-value-pairs
- create/restore/delete backups
- list all backups
- get the content of a backup
- enable auto-backups
- check, if auto-backups are enabled or not
- get and set a backup-path


Here are some images showing the gui which ships with the current version:

![Overview](https://github.com/Brotzka/laravel-dotenv-editor/blob/master/images/screenshot_01.png)
![Overview with loaded content](https://github.com/Brotzka/laravel-dotenv-editor/blob/master/images/screenshot_02.png)
![Edit an entry](https://github.com/Brotzka/laravel-dotenv-editor/blob/master/images/screenshot_08.png)
![Adding a new key-value-pair](https://github.com/Brotzka/laravel-dotenv-editor/blob/master/images/screenshot_03.png)
![Backups](https://github.com/Brotzka/laravel-dotenv-editor/blob/master/images/screenshot_04.png)
![Showing the content of a backup](https://github.com/Brotzka/laravel-dotenv-editor/blob/master/images/screenshot_06.png)
![More options for backups](https://github.com/Brotzka/laravel-dotenv-editor/blob/master/images/screenshot_07.png)
![Uploading Backups](https://github.com/Brotzka/laravel-dotenv-editor/blob/master/images/screenshot_05.png)


# Installation

Visit the [Wiki-page](https://github.com/Brotzka/laravel-dotenv-editor/wiki/Installation) to get more Information.


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

For more exmaples visit the Wiki.
