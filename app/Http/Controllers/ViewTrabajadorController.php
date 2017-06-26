<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Trabajador;
use App\Http\Requests;

class ViewTrabajadorController extends Controller
{
    
	public function index(){
		return view('viewTrabajador.trabajador');
	}
	public function getViewTrabajador(){

			return \DB::table('trabajador')->join('users','trabajador.idTrabajador','=','users.idTrabajador')->get();

		}

}
