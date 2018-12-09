<?php
/**
 * Created by PhpStorm.
 * User: Fabian
 * Date: 19.07.16
 * Time: 06:04
 */
if (config('dotenveditor.activated')) {
    Route::group(
        config('dotenveditor.route'),
        function () {
            Route::get('/', 'Brotzka\DotenvEditor\Http\Controller\EnvController@overview');
            Route::post('/add', 'Brotzka\DotenvEditor\Http\Controller\EnvController@add');
            Route::post('/update', 'Brotzka\DotenvEditor\Http\Controller\EnvController@update');
            Route::get('/createbackup', 'Brotzka\DotenvEditor\Http\Controller\EnvController@createBackup');
            Route::get('/deletebackup/{timestamp}', 'Brotzka\DotenvEditor\Http\Controller\EnvController@deleteBackup');
            Route::get('/restore/{backuptimestamp}', 'Brotzka\DotenvEditor\Http\Controller\EnvController@restore');
            Route::post('/delete', 'Brotzka\DotenvEditor\Http\Controller\EnvController@delete');
            Route::get('/download/{filename?}', 'Brotzka\DotenvEditor\Http\Controller\EnvController@download');
            Route::post('/upload', 'Brotzka\DotenvEditor\Http\Controller\EnvController@upload');
            Route::get('/getdetails/{timestamp?}', 'Brotzka\DotenvEditor\Http\Controller\EnvController@getDetails');
            Route::get('/test', 'Brotzka\DotenvEditor\Http\Controller\EnvController@test');
        });
}
