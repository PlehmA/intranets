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

Route::get('inicioder', 'InicioController@show');

Route::get('hogar', function () {
    return view('hogar');
});

Route::post('login', 'Auth\LoginController@login')->name('login');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('configuracion', 'ConfigController@index')->name('configuracion');

Route::post('upload', 'ConfigController@store')->name('upload');

Route::post('update', 'ConfigController@update')->name('update');

Route::get('calendar', 'CalendarController@index')->name('calendar');

Route::resource('chats', 'ChatController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/friend', 'FriendController@index')->middleware('auth');

Route::get('correo', 'CorreoController@index')->middleware('auth')->name('correo.index');

Route::get('rrhh', 'PersonalController@index')->middleware('auth')->name('rrhh.index');

Route::get('personal', 'PersonalController@show')->middleware('auth')->name('rrhh.personal');

Route::post('ingpersonal', 'PersonalController@store')->name('ingpersonal');

Route::get('/edit/users/{id}','PersonalController@edit')->name('rrhh.editar');

Route::post('/edit/users/{id}','PersonalController@update')->name('rrhh.update');
