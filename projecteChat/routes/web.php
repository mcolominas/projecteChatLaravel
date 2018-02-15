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

Route::get('/', 'HomeController@getIndex');

Route::get('/denuncia', 'DenunciaController@getDenuncias');
Route::put('/denuncia', 'DenunciaController@putDenuncias');
Route::get('/denuncia/show', 'DenunciaController@getShowsDenuncia');
Route::get('/denuncia/show/{id}', 'DenunciaController@getShowDenuncias')->where('id','[0-9]+');
Route::put('/denuncia/show/{id}', 'DenunciaController@putShowDenuncias')->where('id','[0-9]+');

Route::get('/chatroom', 'ChatController@getChatroom');

Route::get('/foro', 'ForoController@getForo');

Route::get('/intercanvios', 'IntercanviosController@getIntercanvios');

Route::get('/noticias', 'NoticiasController@getNoticias');
Route::get('/noticias/add', 'NoticiasController@getAddNoticias');
Route::put('/noticias/add', 'NoticiasController@putAddNoticias');

Route::get('/api/public/getChats', 'ApiController@getChatPublico');
Route::get('/api/private/getChats/{id}', 'ApiController@getChatPrivado')->where('id','[0-9]+');
Route::get('/api/public/getMensajes/{id}', 'ApiController@getMensajesPublico')->where('id','[0-9]+');


