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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index', 'ChatController@getIndex')->name('index');

Route::get('/denuncia', 'ChatController@getDenuncias');

Route::get('/chatroom', 'ChatController@getChatroom')->name('chatroom');

Route::put('/denuncia', 'ChatController@putDenuncias');

Route::get('/foro', 'ChatController@getForo')->name('foro');

Route::get('/intercanvios', 'ChatController@getIntercanvios')->name('intercanvios');
