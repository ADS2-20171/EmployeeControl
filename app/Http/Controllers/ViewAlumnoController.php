<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Alumno;
use App\Http\Requests;

class ViewAlumnoController extends Controller
{
	public function index(){
		return view('viewAlumno.alumno');
	}    



	public function getViewAlumno(){

			return \DB::table('alumno')->join('users','alumno.idAlumno','=','users.idAlumno')->get();

		}

}
