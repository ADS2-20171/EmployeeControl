<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Apoderado;
use App\Alumno;
use App\Http\Requests;

class AlumnoController extends Controller
{
    public function index(){
    	$al=Alumno::paginate();
    	return view('alumnos.alumno', compact('al'));
    }


    public function getAlumno(){
    		return Alumno::all();
            
    }


    public function postAlumnos(Request $requests)
    {
    	Alumno::create([
    		'alumno_nombres' => $requests['nombres'],
            'alumno_apellidos' => $requests['apellidos'],
            'alumno_dni' => $requests['dni'],
            'alumno_fechaNac' => Carbon::parse($requests['fechnac']),
            'alumno_direccion' => $requests['direccion'],
            'alumno_genero' => $requests['genero'],
            'alumno_celular' =>  $requests['celular'],
            'alumno_FechaMatric' =>Carbon::parse($requests['fechamatric']),
            'alumno_nivel' => $requests['nivel'],
            'alumno_grado' => $requests['grado'],
            'alumno_seccion' => $requests['seccion'],
            'alumno_estado' => $requests['estado'],
    		]);
    	Apoderado::create([
    		'apoderado_nombres' => $requests['nombres'],
            'apoderado_apellidos' => $requests['apellidos'],
            'apoderado_dni' => $requests['dni'],
            'apoderado_direccion' => $requests['direccion'],
            'apoderado_celular' => $requests['celular'],
    		]);

    	 return response()->json([
                "mensaje" => "creado"
                ]);

    }
}
