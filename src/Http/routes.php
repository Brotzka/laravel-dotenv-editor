<?php

if(config('dotenveditor.activated')){
    
    $this->app->group([
        'middleware' => config('dotenveditor.middleware'),
        'middlewareGroups' => config('dotenveditor.middlewareGroups')
    ],
        function(){
            $this->app->get(config('dotenveditor.$this->app->'), 'Brotzka\DotenvEditor\Http\Controller\EnvController@overview');
            $this->app->post(config('dotenveditor.$this->app->') . '/add', 'Brotzka\DotenvEditor\Http\Controller\EnvController@add');
            $this->app->post(config('dotenveditor.$this->app->') . '/update', 'Brotzka\DotenvEditor\Http\Controller\EnvController@update');
            $this->app->get(config('dotenveditor.$this->app->') . '/createbackup', 'Brotzka\DotenvEditor\Http\Controller\EnvController@createBackup');
            $this->app->get(config('dotenveditor.$this->app->') . '/deletebackup/{timestamp}', 'Brotzka\DotenvEditor\Http\Controller\EnvController@deleteBackup');

            $this->app->get(config('dotenveditor.$this->app->') . '/restore/{backuptimestamp}', 'Brotzka\DotenvEditor\Http\Controller\EnvController@restore');
            $this->app->post(config('dotenveditor.$this->app->') . '/delete', 'Brotzka\DotenvEditor\Http\Controller\EnvController@delete');
            $this->app->get(config('dotenveditor.$this->app->') . '/download/{filename?}', 'Brotzka\DotenvEditor\Http\Controller\EnvController@download');
            $this->app->post(config('dotenveditor.$this->app->') . '/upload', 'Brotzka\DotenvEditor\Http\Controller\EnvController@upload');
            $this->app->get(config('dotenveditor.$this->app->') . '/getdetails/{timestamp?}', 'Brotzka\DotenvEditor\Http\Controller\EnvController@getDetails');

            $this->app->get(config('dotenveditor.$this->app->') . '/test', 'Brotzka\DotenvEditor\Http\Controller\EnvController@test');
        });
}
