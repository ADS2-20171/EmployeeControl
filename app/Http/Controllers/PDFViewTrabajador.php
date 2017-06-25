<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Requests;

class PDFViewTrabajador extends Controller
{
    public function index(){
    	$trabajador=\Auth::user()->name;
    	$user=\Auth::user()->idTrabajador;
		$ta=\DB::table('trabajador')->join('users','trabajador.idTrabajador','=','users.idTrabajador')->join('asistencia','trabajador.idTrabajador','=','asistencia.idTrabajador')->where('users.idTrabajador','=',$user)->get();
		$view = View::make('viewTrabajador.trabajadorpdf', ['ta' => $ta])->render();
		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($view);
		$pdf->stream();
		return $pdf->download( $trabajador.'.pdf');
    }
}
