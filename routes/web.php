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

Route::get('/dashboard', 'AdminController@index')->name('dashboard');

Route::get('/cryptos', 'CryptoController@index')->name('cryptos');

Route::get('/cryptos/detail/{crypto}', 'CryptoController@detail')->name('cryptos');


//API
Route::get('/api/cryptos', 'CryptoController@apiIndex')->name('cryptos');

Route::get('/api/cryptos/detail/{crypto}', 'CryptoController@apiDetail')->name('cryptos');
