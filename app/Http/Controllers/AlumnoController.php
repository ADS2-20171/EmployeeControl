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
    	return view('alumnos.alumno');
    }


    public function getAlumno(){
    		return Alumno::all();
            
    }

    public function Pagination(Request $request){
       $limit = (int) $request->input('limit');
        $page = (int) $request->input('page');
        $offset = ($limit * $page) - $limit;
        return Alumno::take($limit)->skip($offset)->get();      

        
    }


    public function postAlumnos(Request $requests)
    {


        $dir = "C:/xampp/htdocs/AcademicSystem/public/avatar/";
        $uuid = uniqid(); // uuid
        $name = $_FILES["photo"]["name"]; // nombre real
        $temp = $_FILES["photo"]["tmp_name"]; // nombre temporal
        $ext = pathinfo($name, PATHINFO_EXTENSION); // extensión
        $path = $dir.$uuid.".".$ext; // ruta completa para guardar en el modelo
        
        $apoderado=Apoderado::create([
            'apoderado_nombres' => $requests['nombres'],
            'apoderado_apellidos' => $requests['apellidos'],
            'apoderado_dni' => $requests['dni'],
            'apoderado_direccion' => $requests['direccion'],
            'apoderado_celular' => $requests['celular'],
            ]);
    	Alumno::create([
    		'alumno_nombres' => $requests['nombresalumno'],
            'alumno_apellidos' => $requests['apellidosalumno'],
            'alumno_dni' => $requests['dnialumno'],
            'alumno_fechaNac' => Carbon::parse($requests['fechnacalumno']),
            'alumno_direccion' => $requests['direccionalumno'],
            'alumno_genero' => $requests['generoalumno'],
            'alumno_celular' =>  $requests['celularalumno'],
            'alumno_FechaMatric' =>Carbon::parse($requests['fechamatricalumno']),
            'alumno_nivel' => $requests['nivelalumno'],
            'alumno_grado' => $requests['gradoalumno'],
            'alumno_seccion' => $requests['seccionalumno'],
            'alumno_estado' => $requests['estadoalumno'],
            'alumno_imagen' => $uuid.".".$ext,
            'idApoderado' => $apoderado->idApoderado,
    		]);
    	
        move_uploaded_file($temp, $path);
    	 return response()->json([
                "mensaje" => "creado"
                ]);

    }



    public function UpdateAlumno(Request $requests){
        $alumno=Alumno::where('idAlumno', $requests['id'])->first();
        $alumno->fill([
            'alumno_nombres' => $requests['nombres'],
            'alumno_apellidos' => $requests['apellidos'],
            'alumno_dni' => $requests['dni'],
            'alumno_fechaNac' => Carbon::parse($requests['fechnac']),
            'alumno_direccion' => $requests['direccion'],
            'alumno_genero' => $requests['genero'],
            'alumno_celular' => $requests['celular'],
            'alumno_FechaMatric' => Carbon::parse($requests['fechamatric']),
            'alumno_nivel' => $requests['nivel'],
            'alumno_grado' => $requests['grado'],
            'alumno_seccion'=>$requests['seccion'],
            'alumno_estado'=>$requests['estado'],
        ]);
        $alumno->save();
         return response()->json([
                "mensaje"=> $alumno
                ]);
    }


    public function deleteAlumnos($id){
        $alumno=Alumno::where('idAlumno', $id)->first();
            $alumno->delete();
             return response()->json([
                    "mensaje"=>"Eliminado"
                    ]);

    }

}
