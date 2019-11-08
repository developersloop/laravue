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
        Route::get('/search', 'ArtigosController@search');
        Route::put('artigos/update/{id}', 'ArtigosController@update');
        Route::post('artigos/store','ArtigosController@store');
        Route::get('artigos/delete/{id}','ArtigosController@delete');
        Route::get('artigos/show/{id}','ArtigosController@show');

        Route::get('/users','UsersController@index');
});
