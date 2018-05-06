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

Route::get('/', 'AppController@app')->name('app');
Route::get('works/', 'WorksController@index')->name('works');
Route::get('works/rotategeo', 'WorksController@rotategeo')->name('rotategeo');

Route::get('works/staygreen', 'WorksController@staygreen')->name('staygreen');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

