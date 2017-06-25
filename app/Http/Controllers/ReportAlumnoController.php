<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asistencia;
use App\Http\Requests;

class ReportAlumnoController extends Controller
{
    public function index(){
    	return view('reportalumno.reportalumno');
    }

    public function getReportAlumno(){
    	
    	return \DB::table('alumno')->join('asistencia', 'alumno.idAlumno', '=', 'asistencia.idAlumno')->select('alumno.*','asistencia.*')->get();
    }


    public function UpdateReportAlumno(Request $requests){
    	$reportalumno=Asistencia::where('idAsistencia', $requests['id'])->first();
        $reportalumno->fill([
            'asistencia_observaciones' => $requests['observacion'],
        ]);
        $reportalumno->save();
         return response()->json([
                "mensaje"=> $reportalumno
                ]);
    }


    public function DeleteReportAlumno($id){
    	$reportalumno=Asistencia::where('idAsistencia', $id)->first();
	        $reportalumno->delete();
	         return response()->json([
	                "mensaje"=>"Eliminado"
	                ]);
    }

}
