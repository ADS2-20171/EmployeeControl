<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Trabajador;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;

class TrabajadorController extends Controller
{
    public function index()
    {
    	//$trabajadores = Trabajador::all();
        $ta=Trabajador::paginate();
    	return view('trabajador.trabajador', compact('ta'));

    }

    public function getTrabajadores()
    {
    	return Trabajador::all();
    }

    public function postTrabajoderes(Request $requests){


        $dir="C:/xampp/htdocs/AcademicSystem/public/avatar/";
        $uuid = uniqid();
        $name = $_FILES["photo"]["name"];
        $temp= $_FILES["photo"]["tmp_name"];
        $ext = pathinfo($name, PATHINFO_EXTENSION); 
        $path = $dir.$uuid.".".$ext;
            Trabajador::create([
            'trabajador_nombres' => $requests['nombres'],
            'trabajador_apellidos' => $requests['apellidos'],
            'trabajador_dni' => $requests['dni'],
            'trabajador_FechNac' => Carbon::parse($requests['fechnac']),
            'trabajador_sexo' => $requests['sexo'],
            'trabajador_celular' => $requests['celular'],
            'trabajador_FechInicio' => Carbon::parse($requests['fechinicio']),
            'trabajador_estado' => $requests['estado'],
            'trabajador_cargo' => $requests['cargo'],
            'trabajador_condicion' => $requests['condicion'],
            'trabajador_imagen' => $uuid.".".$ext,
            ]);
            move_uploaded_file($temp, $path);
            return response()->json([
                "mensaje" => "creado"
                ]);

        
    }

    public function UpdateTrabajador(Request $requests){
    	$trabajador=Trabajador::where('idTrabajador', $requests['id'])->first();
        $trabajador->fill([
            'trabajador_nombres' => $requests['nombres'],
            'trabajador_apellidos' => $requests['apellidos'],
            'trabajador_dni' => $requests['dni'],
            'trabajador_FechNac' => Carbon::parse($requests['fechnac']),
            'trabajador_sexo' => $requests['sexo'],
            'trabajador_celular' => $requests['celular'],
            'trabajador_FechInicio' => Carbon::parse($requests['fechinicio']),
            'trabajador_estado' => $requests['estado'],
            'trabajador_cargo' => $requests['cargo'],
            'trabajador_condicion' => $requests['condicion'],
        ]);
        $trabajador->save();
         return response()->json([
                "mensaje"=> $trabajador
                ]);
    }


    public function deleteTrabajador($id){
    	 	$trabajador=Trabajador::where('idTrabajador', $id)->first();
	        $trabajador->delete();
	         return response()->json([
	                "mensaje"=>"Eliminado"
	                ]);
    }
}
