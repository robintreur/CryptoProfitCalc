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

Route::get('/', 'WelcomeController@index')->name('welcome');


Auth::routes();

Route::get('/dashboard', 'AdminController@index')->name('dashboard');
Route::get('/dashboard/{active}', 'AdminController@filterActive')->name('dashboard.filterActive');
Route::get('/dashboard/search', 'AdminController@search')->name('dashboard.search');
Route::put('/dashboard', 'AdminController@active');

Route::get('/cryptos', 'CryptoController@index')->name('cryptos');
Route::get('/cryptos/create', 'CryptoController@create')->name('crypto.create');
Route::post('/cryptos', 'CryptoController@store');

Route::get('/cryptos/detail/{crypto}', 'CryptoController@detail')->name('crypto');
Route::get('/cryptos/detail/{crypto}/edit', 'CryptoController@edit')->name('crypto.edit');
Route::put('/cryptos/detail/{crypto}', 'CryptoController@update');
Route::delete('/cryptos/detail/{crypto}', 'CryptoController@destroy')->name('crypto.destroy');

//API
Route::get('/api/cryptos', 'CryptoController@apiIndex')->name('api.cryptos');
Route::get('/api/cryptos/detail/{crypto}', 'CryptoController@apiDetail')->name('api.crypto');
