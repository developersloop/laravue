<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api'], function () {
       Route::group(['prefix' => 'artigos'], function () {
            Route::get('/', 'ArtigosController@index');
            Route::put('/update/{id}', 'ArtigosController@update');
            Route::post('/store','ArtigosController@store');
            Route::get('/delete/{id}','ArtigosController@delete');
            Route::get('/show/{id}','ArtigosController@show');

       });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/','UsersController@index');
        Route::post('/','UsersController@store');
    });
});
