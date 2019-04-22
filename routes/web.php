<?php

// Route::group(['middleware' => ['auth']], function () {
    
// });

Route::get('/', 'HelloController@index');

Route::post('inicio', 'InicioController@index');

Route::get('inicioder', 'InicioController@show');

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

Route::resource('word', 'WordController');

Route::resource('excel', 'ExcelController');

Route::resource('officebase', 'OfficebaseController');

Route::resource('onedrive', 'OnedriveController');

Route::resource('officeimpress', 'OfficeimpressController');

Route::resource('notes', 'NoteController');

Route::resource('organigrama', 'OrganigController');

Route::resource('plantillas', 'TemplateController');

Route::resource('presidencia', 'CpresiController');

Route::resource('addpers', 'AddPersController');

Route::resource('report', 'ReportController');

Route::resource('noticia', 'NewsController');

Route::resource('autorizaciones', 'AutorizationController');

Route::resource('autojf', 'AutojfController');

Route::get('/api/mensaje', 'MessageController@index');

Route::post('/api/mensaje', 'MessageController@store');

Route::get('/api/convers', 'ConversationController@index');

Route::get('/api/user', 'UserController@index');

Route::resource('modal', 'ModalController');

Route::get('/contacts', 'ContactsController@get');

Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');

Route::post('/conversation/send', 'ContactsController@send');

Route::put('/conversation/{id}', 'ContactsController@readed');

Route::get('/uichat', 'UichatController@index');

Route::get('/api/notificaciones', 'NotifyController@index');

Route::get('/correotutos', 'CorreotutoController@index');

Route::put('/api/user/{id}', 'UserController@update');

Route::get('/correotutos2', 'Correotuto1Controller@index');

Route::get('/correotutos3', 'Correotuto2Controller@index');

Route::get('/correotutos4', 'Correotuto3Controller@index');

Route::post('/calguardar', 'CalendarController@guardar');

Route::resource('/files', 'FileController');

Route::get('tickets', 'TicketController@index')->name('tickets.index');

Route::get('registroticket', 'RegistroticketController@index')->name('rticket.index');

Route::post('recordatorio', 'RecordatoryController@store')->name('recordatorio.store');

Route::get('testing', 'TestingController@index')->name('testing.index');

Route::post('invitarcal', 'CalendarController@invitarAmigo')->name('invitarcal');

Route::post('exportevent', 'CalendarController@exportEvent')->name('exportevent');

Route::post('creartabla', 'AddPersController@crearTabla')->name('creartabla');

Route::get('/sistemas', 'SistemasController@index')->name('sistemas');

Route::resource('puesto', 'PuestoController');

Route::resource('video', 'VideoController');

Route::post('subidaloca', 'SistemasController@store')->name('subidaloca');

Route::put('tutoriales/subida', 'EducationController@imageUp')->name('tutoriales/subida');

Route::get('tutoriales/show/{id}', 'EducationController@toEdit')->name('tutoriales/show');

Route::put('tutoriales/update/{id}', 'EducationController@educatUpdate')->name('tutoriales/update');

Route::delete('tutoriales/delete/{id}', 'EducationController@destructionEdu')->name('tutoriales/delete');

Route::post('videos/store', 'VideoController@upVideos')->name('videos/store');

Route::get('mail', 'MailController@index');