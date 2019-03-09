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

Route::get('/', 'PersonasController@create')->name('home')->middleware('auth');


Auth::routes();

Route::get('/home', 'PersonasController@create')->name('home')->middleware('auth');

Route::post('/personas/create', 'PersonasController@store')->name('save_personas')->middleware('auth');

Route::get('/personas', 'PersonasController@index')->name('personas')->middleware('auth');

Route::get('/personas/edit/{id}', 'PersonasController@edit')->middleware('auth');
