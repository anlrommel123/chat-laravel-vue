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

Route::get('/', 'ChatController@index');

Route::post('getMessages', 'ChatController@getMessages');
Route::post('sendMessage', 'ChatController@sendMessages');
Route::get('getContacts', 'ChatController@getContacts');
Route::get('searchContact', 'ChatController@searchContact');