<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asistencia;
use App\Http\Requests;

class ReportTrabajadorController extends Controller
{
	
	public function index(){
		return view('reporttrabajador.reporttrabajador');
	}    

	public function getReportTrabajador(){
		return \DB::table('trabajador')->join('asistencia', 'trabajador.idTrabajador', '=', 'asistencia.idTrabajador')->join('horario','trabajador.idHorario','=','horario.idHorario')->select('trabajador.*','horario.*','asistencia.*')->get();
	}

	public function UpdateReportTrabajador(Request $requests){
    	$reporttrabajador=Asistencia::where('idAsistencia', $requests['id'])->first();
        $reporttrabajador->fill([
            'asistencia_observaciones' => $requests['observacion'],
        ]);
        $reporttrabajador->save();
         return response()->json([
                "mensaje"=> $reporttrabajador
                ]);
    }


    public function DeleteReportTrabajador($id){
    	$reporttrabajador=Asistencia::where('idAsistencia', $id)->first();
	        $reporttrabajador->delete();
	         return response()->json([
	                "mensaje"=>"Eliminado"
	                ]);
    }

}
