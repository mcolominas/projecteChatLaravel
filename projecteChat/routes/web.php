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

Route::get('/denuncia', 'DenunciaController@getDenuncias')->middleware('auth');
Route::put('/denuncia', 'DenunciaController@putDenuncias')->middleware('auth');
Route::get('/denuncia/show', 'DenunciaController@getShowsDenuncia')->middleware('auth');
Route::get('/denuncia/show/{id}', 'DenunciaController@getShowDenuncias')->where('id','[0-9]+')->middleware('auth');
Route::put('/denuncia/show/{id}', 'DenunciaController@putShowDenuncias')->where('id','[0-9]+')->middleware('auth');

Route::get('/chatroom', 'ChatController@getChatroom')->middleware('auth');

Route::get('/foro', 'ForoController@getForo')->middleware('auth');

Route::get('/intercanvios', 'IntercanviosController@getIntercanvios')->middleware('auth');

Route::get('/noticias', 'NoticiasController@getNoticias');
Route::get('/noticias/categoria/{categoria}', 'NoticiasController@getNoticiasByCategoria');
Route::get('/noticias/add', 'NoticiasController@getAddNoticias')->middleware('auth');
Route::put('/noticias/add', 'NoticiasController@putAddNoticias')->middleware('auth');

Route::get('/api/public/getChats', 'ApiController@getChatPublico');
Route::get('/api/private/getChats/{id}', 'ApiController@getChatPrivado')->where('id','[0-9]+');
Route::get('/api/public/getMensajes', 'ApiController@getMensajesPublico');
Route::get('/api/public/setMensajes', 'ApiController@setMensajesPublico');
Route::get('/api/public/getLastMensajes', 'ApiController@getLastMensajes');

Route::get('/api/noticias/getNoticias', 'ApiNoticias@getNoticias');
Route::get('/api/noticias/getCategorias', 'ApiNoticias@getCategorias');