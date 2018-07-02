<?php
/**
 * Created by PhpStorm.
 * User: Fabian
 * Date: 19.07.16
 * Time: 06:04
 */
if(config('dotenveditor.activated')){
    Route::group([
        'middleware' => config('dotenveditor.middleware'),
        'middlewareGroups' => config('dotenveditor.middlewareGroups')
    ],
        function(){
            Route::get(config('dotenveditor.route'), 'Brotzka\DotenvEditor\Http\Controller\EnvController@overview');
            Route::post(config('dotenveditor.route') . '/add', 'Brotzka\DotenvEditor\Http\Controller\EnvController@add');
            Route::post(config('dotenveditor.route') . '/update', 'Brotzka\DotenvEditor\Http\Controller\EnvController@update');
            Route::get(config('dotenveditor.route') . '/createbackup', 'Brotzka\DotenvEditor\Http\Controller\EnvController@createBackup');
            Route::get(config('dotenveditor.route') . '/deletebackup/{timestamp}', 'Brotzka\DotenvEditor\Http\Controller\EnvController@deleteBackup');
            Route::get(config('dotenveditor.route') . '/restore/{backuptimestamp}', 'Brotzka\DotenvEditor\Http\Controller\EnvController@restore');
            Route::post(config('dotenveditor.route') . '/delete', 'Brotzka\DotenvEditor\Http\Controller\EnvController@delete');
            Route::get(config('dotenveditor.route') . '/download/{filename?}', 'Brotzka\DotenvEditor\Http\Controller\EnvController@download');
            Route::post(config('dotenveditor.route') . '/upload', 'Brotzka\DotenvEditor\Http\Controller\EnvController@upload');
            Route::get(config('dotenveditor.route') . '/getdetails/{timestamp?}', 'Brotzka\DotenvEditor\Http\Controller\EnvController@getDetails');
            Route::get(config('dotenveditor.route') . '/test', 'Brotzka\DotenvEditor\Http\Controller\EnvController@test');
        });
}
