<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Trabajador;
use App\Http\Requests;

class ViewTrabajadorController extends Controller
{
    
	public function index(){
		$user=\Auth::user()->idTrabajador;
		$ta=\DB::table('trabajador')->join('users','trabajador.idTrabajador','=','users.idTrabajador')->join('asistencia','trabajador.idTrabajador','=','asistencia.idTrabajador')->where('users.idTrabajador','=',$user)->get();
		return view('viewTrabajador.trabajador', compact('ta'));
	}
	public function getViewTrabajador(){
			$user=\Auth::user()->name;
			return \DB::table('trabajador')->join('users','trabajador.idTrabajador','=','users.idTrabajador')->where('users.name','=',$user)->get();

		}

}
