<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
         Route::resource('artigos', 'ArtigosController');
         Route::get('/artigos/detail','ArtigosController@show')->name('artigos.detail');
    });


    Route::group(['prefix' => 'admin/users'], function () {
        Route::get('/','UsuariosController@index')->name('users.manager');
        Route::get('/create','UsuariosController@create')->name('users.create');

    });
});

