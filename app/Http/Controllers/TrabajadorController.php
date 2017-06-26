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
    	return view('trabajador.trabajador');

    }

    public function getTrabajadores()
    {
    	return Trabajador::all();
    }

    public function postTrabajoderes(Request $requests){
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
            ]);

            return response()->json([
                "mensaje" => "creado"
                ]);

        
    }

    public function UpdateTrabajador($id){
    	$trabajador=Trabajador::find($id);
        $trabajador->fill($request->all());
        $trabajador->save();
         return response()->json([
                "mensaje"=>"Actualizado"
                ]);
    }


    public function deleteTrabajador($id){
    	 	$trabajador=Trabajador::find($id);
	        $trabajador->delete();
	         return response()->json([
	                "mensaje"=>"Eliminado"
	                ]);
    }
}
