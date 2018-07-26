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

Route::put('update', 'ConfigController@update')->name('update');

Route::resource('calendar', 'CalendarController');

Route::resource('chats', 'ChatController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/friend', 'FriendController@index')->middleware('auth');

Route::get('correo', 'CorreoController@index')->middleware('auth')->name('correo.index');

Route::resource('rrhh', 'PersonalController');

Route::resource('directorio', 'DirectoryController');

Route::resource('contact', 'ContactController');

Route::resource('agpers', 'DiaryController');

Route::resource('tutos', 'TutorialController');

Route::resource('agenda', 'AgendaController');

Route::resource('datoscol', 'ColumnaController');

Route::resource('officecalc', 'OfficecalcController');

Route::resource('officewriter', 'OfficewriterController');

Route::resource('officebase', 'OfficebaseController');

Route::resource('officeimpress', 'OfficeimpressController');

Route::resource('notes', 'NoteController');

Route::resource('organigrama', 'OrganigController');

Route::resource('plantillas', 'TemplateController');

Route::resource('presidencia', 'CpresiController');

Route::resource('addpers', 'AddPersController');