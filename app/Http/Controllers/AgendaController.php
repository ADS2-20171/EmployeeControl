<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Alumno;
use App\Trabajador;
use App\Agenda;
use App\Http\Requests;

class AgendaController extends Controller
{
    public function index(){
    	$alumno=Alumno::all();
    	$trabajador = Trabajador::all();
    	return view('agenda.agenda',compact('alumno', 'trabajador'));
    }

    public function getAgenda(){
        $data = array(); 
        $id = Agenda::all()->lists('idEventos'); 
        $titulo = Agenda::all()->lists('eventos_titulo'); 
        $fecha = Agenda::all()->lists('eventos_inicio');
        $fin=Agenda::all()->lists('eventos_final');
        $count = count($id);
 
        
        for($i=0;$i<$count;$i++){ 
            $data[$i] = array(
                "title"=>$titulo[$i],
                "start"=>$fecha[$i],
                "end"=>$fin[$i],
                "url"=>"http://localhost/AcademicSystem/public/api/agenda/".$id[$i] ,
            );
        }
 
        return response()->json($data);

    }



    public function PostEventos(Request $requests){
    	$alumno=Alumno::where('idAlumno', $requests['idAlumno'])->first();
    	 if ($alumno==null) {

    	 	$trabajador = Trabajador::where('idTrabajador', $requests['idTrabajador'])->first();
    	 		if ($trabajador==null) {
    	 			 return [ "status" => "error", "message" => "el alumno o el trabajador no existe"];
    	 		}else{
    	 				Agenda::create([
							'eventos_titulo' => $requests['titulo'],
		    	 			'eventos_cuerpo' => $requests['cuerpo'],
		    	 			'eventos_inicio' => Carbon::parse($requests['inicio']),
		    	 			'eventos_final'=> Carbon::parse($requests['fin']),
		    	 			'idTrabajador' => $trabajador->idTrabajador,
    	 					]);
    	 				 return [ "status" => "guardado", "message" => "Evento Registrado"];
    	 			
    	 		}
    	}else{
    		Agenda::create([
    			'eventos_titulo' => $requests['titulo'],
	    	 	'eventos_cuerpo' => $requests['cuerpo'],
	    	 	'eventos_inicio' => Carbon::parse($requests['inicio']),
	    	 	'eventos_final'=> Carbon::parse($requests['fin']),
	    	 	'idAlumno' => $alumno->idAlumno,
    			]);
    		return [ "status" => "guardado", "message" => "Evento Registrado"];
    	 	
    	 }
    }
}
