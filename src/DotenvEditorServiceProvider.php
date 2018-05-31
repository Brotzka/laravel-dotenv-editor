<?php
/**
 * Created by PhpStorm.
 * User: Fabian
 * Date: 12.05.16
 * Time: 07:22
 */

namespace Brotzka\DotenvEditor;

use Illuminate\Support\ServiceProvider;

class DotenvEditorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('brotzka-dotenveditor', function() {
            return new DotenvEditor();
        });

        $this->mergeConfigFrom(__DIR__ . '/config/dotenveditor.php', 'dotenveditor');
    }

    public function boot(){
        require __DIR__ . '/Http/routes.php';

        $this->loadViewsFrom(__DIR__ . '/views', 'dotenv-editor');
        $this->publishes(
            [__DIR__ . '/views' => base_path('resources/views/vendor/dotenv-editor')],
            'views'
        );

        $this->publishes(
        // Keep the config_path() empty, so the config file will be published directly to the config directory
            [__DIR__ . '/config' => config_path()],
            'config'
        );


        // Language Files
        $this->loadTranslationsFrom(__DIR__ . '/Lang', 'dotenv-editor');
    }
}
