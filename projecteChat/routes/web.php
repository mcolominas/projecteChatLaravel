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

Auth::routes();

Route::get('/', 'ChatController@getIndex');

Route::get('/denuncia', 'ChatController@getDenuncias');

Route::get('/chatroom', 'ChatController@getChatroom');

Route::put('/denuncia', 'ChatController@putDenuncias');

Route::get('/foro', 'ChatController@getForo');

Route::get('/intercanvios', 'ChatController@getIntercanvios');

Route::get('/denuncia/show', 'ChatController@getShowsDenuncia');

Route::get('/denuncia/show/{id}', 'ChatController@getShowDenuncias')->where('id','[0-9]+');
Route::put('/denuncia/show/{id}', 'ChatController@putShowDenuncias')->where('id','[0-9]+');
