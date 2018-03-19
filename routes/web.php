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
Route::post('inicio', 'InicioController@index');

Route::get('hogar', function () {
    return view('hogar');
});

Route::post('login', 'Auth\LoginController@login')->name('login');

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('configuracion', 'ConfigController@index')->name('configuracion');

Route::post('upload', 'ConfigController@store')->name('upload');

Route::post('update', 'ConfigController@update')->name('update');

Route::get('calendar', 'CalendarController@index')->name('calendar');

Route::get('/chat', 'ChatController@index')->middleware('auth')->name('chat.index');

Route::get('/chat/{id}', 'ChatController@show')->middleware('auth')->name('chat.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/friend', 'FriendController@index')->middleware('auth');