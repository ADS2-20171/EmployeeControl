<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;
use Illuminate\Support\Facades\View;
use FontLib\Font;
use App\Asistencia;
use App\User;
use App\Alumno;
use App\Http\Requests;

class PDFViewAlumno extends Controller
{
    public function index(){

    	$alumno=\Auth::user()->name;
    	$user=\Auth::user()->idAlumno;
		$al=\DB::table('alumno')->join('users','alumno.idAlumno','=','users.idAlumno')->join('asistencia','alumno.idAlumno','=','asistencia.idAlumno')->join('apoderado', 'alumno.idApoderado','=','apoderado.idApoderado')->where('users.idAlumno','=',$user)->get();
		$view = View::make('viewAlumno.alumnopdf', ['al' => $al])->render();
		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($view);
		$pdf->stream();
		return $pdf->download( $alumno.'.pdf');
	
	}
}
