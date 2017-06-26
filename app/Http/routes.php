<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::resource('/home', 'HomeController@index');
Route::resource('admin', 'AdminController');

//ViewAlumno
Route::resource('viewAlumno', 'ViewAlumnoController@index');
Route::get('/api/viewalumno','ViewAlumnoController@getViewAlumno');





//ViewTrabajador
Route::resource('viewTrabajador','ViewTrabajadorController@index');
Route::get('/api/viewTrabajador','ViewTrabajadorController@getViewTrabajador');





//Usuarios
Route::resource('usuario','UsuarioController@index');
Route::get('/api/usuario','UsuarioController@getUsuarios');
Route::post('/api/usuario', 'UsuarioController@postUsuarios');
Route::put('/api/usuario','UsuarioController@UpdateUsuarios');
Route::delete('/api/usuario/{id}','UsuarioController@DeleteUsuarios');

//Trabajador
Route::resource('trabajador','TrabajadorController@index');
Route::get('/api/trabajador','TrabajadorController@getTrabajadores');
Route::post('/api/trabajador','TrabajadorController@postTrabajoderes');
Route::put('/api/trabajador','TrabajadorController@UpdateTrabajador');
Route::delete('/api/trabajador/{id}','TrabajadorController@deleteTrabajador');

//Horarios
Route::resource('horario','HorarioController@index');
Route::get('/api/horario','HorarioController@getHorarios');
Route::post('/api/horario','HorarioController@postHorarios');
Route::put('/api/horario','HorarioController@UpdateHorario');
Route::delete('/api/horario/{id}','HorarioController@deleteHorario');
//Alumnos
Route::resource('alumno','AlumnoController@index');
Route::get('/api/alumno','AlumnoController@getAlumno');
Route::post('/api/alumno','AlumnoController@postAlumnos');
Route::put('/api/alumno','AlumnoController@UpdateAlumno');
//Route::resource('/api/alumno/{alumno}','AlumnoController@deleteAlumnos');


//Agenda
Route::resource('agenda','AgendaController@index');



//Reportes Alumnos
Route::resource('reportalumno','ReportAlumnoController@index');
Route::get('/api/reportalumno','ReportAlumnoController@getReportAlumno');
Route::put('/api/reportalumno','ReportAlumnoController@UpdateReportAlumno');
Route::delete('/api/reportalumno/{id}','ReportAlumnoController@DeleteReportAlumno');


//Reportes Trabjadores
Route::resource('reporttrabajador','ReportTrabajadorController@index');
Route::get('/api/reporttrabajador','ReportTrabajadorController@getReportTrabajador');
Route::put('/api/reporttrabajador','ReportTrabajadorController@UpdateReportTrabajador');
Route::delete('/api/reporttrabajador/{id}','ReportTrabajadorController@DeleteReportTrabajador');



//Asistencia
Route::resource('asistencia','AsistenciaController@index');
Route::post('/api/asistencia','AsistenciaController@postAsistencias');

Route::get('/', function(){
	return view('auth.login');
});

