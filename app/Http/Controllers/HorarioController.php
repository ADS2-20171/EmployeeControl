<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\HorarioModel;
use App\Http\Requests;

class HorarioController extends Controller
{

	public function index(){
		return view('horarios.horarios');
	}


    public function getHorarios(){
    	return HorarioModel::all();
    }


    public function  postHorarios(Request $requests){
    	HorarioModel::create([
    		'horario_descripcion'=>$requests['descripcion'],
    		'horario_inicio'=>Carbon::parse($requests['inicio']),
    		'horario_fin'=>Carbon::parse($requests['fin']),
    		]);

    	return response()->json([
                "mensaje" => "creado"
                ]);
    }
}
