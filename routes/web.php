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

 /* Route::get('/', function () {
    return view('welcome');
}); */


/**
 * Пропускаем страницу welcome и сразу выводим контент
 */
Route::get('/', 'DevResourceController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/**
 * Registrate DevResourceController
 */
Route::resource('content', 'DevResourceController');

Route::resource('comment', 'ComResController');
