<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;
use App\User;
use App\Alumno;
use App\Http\Requests;

class ViewAlumnoController extends Controller
{
	public function index(){

		$user=\Auth::user()->idAlumno;//capturar el Alumno que se esta identificando
		$event=\DB::table('alumno')->join('eventos','alumno.idAlumno','=','eventos.idAlumno')->where('eventos.idAlumno','=',$user)->get();//capturar los eventos relacionados al alumno que se identifico
		$al=\DB::table('alumno')->join('users','alumno.idAlumno','=','users.idAlumno')->join('asistencia','alumno.idAlumno','=','asistencia.idAlumno')->where('users.idAlumno','=',$user)->get();//capturar las asistencias y datos del alumno que se identifica
		return view('viewAlumno.alumno', compact('al','event'));
	}    



	public function getViewAlumno(){
			$user=\Auth::user()->name;
			return \DB::table('alumno')->join('users','alumno.idAlumno','=','users.idAlumno')->join('apoderado','alumno.idApoderado','=','apoderado.idApoderado')->where('users.name','=',$user)->get();
		}

}
