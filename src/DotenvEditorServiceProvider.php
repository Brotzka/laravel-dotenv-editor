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

        $this->mergeConfigFrom(__DIR__ . '/config/dotenveditor.php', 'brotzka-dotenveditor');
    }

    public function boot(){
        $this->publishes(
        // Keep the config_path() empty, so the config file will be published directly to the config directory
            [__DIR__ . '/config' => config_path()],
            'config'
        );
    }
}