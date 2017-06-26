<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Alumno;
use App\Http\Requests;

class AlumnoController extends Controller
{
    public function index(){
    	return view('alumnos.alumno');
    }


    public function getAlumno(){
    		return Alumno::all();
    }
}
