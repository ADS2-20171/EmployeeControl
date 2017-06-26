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

/*Route::get('/', function () {
    return view('index');
});*/

Route::auth();

Route::resource('/home', 'HomeController@index');
//Trabajador
Route::resource('trabajador','TrabajadorController@index');
Route::get('/api/trabajador','TrabajadorController@getTrabajadores');
Route::post('/api/trabajador','TrabajadorController@postTrabajoderes');
Route::put('/api/trabajador','TrabajadorController@UpdateTrabajador');
//Route::resource('/api/trabajador/{trabajador}','TrabajadorController@deleteTrabajador');

//Horarios
Route::resource('horario','HorarioController@index');
Route::get('/api/horario','HorarioController@getHorarios');
Route::post('/api/horario','HorarioController@postHorarios');

//Alumnos
Route::resource('alumno','AlumnoController@index');
Route::get('/api/alumno','AlumnoController@getAlumno');
Route::post('/api/alumno','AlumnoController@postAlumnos');
Route::put('/api/alumno','AlumnoController@UpdateAlumno');
//Route::resource('/api/alumno/{alumno}','AlumnoController@deleteAlumnos');


Route::get('/', function(){
	return view('auth.login');
});





/*Route::get('trabajadores', function(){
	return App\Trabajador::all();
})->name('trabajador');*/
