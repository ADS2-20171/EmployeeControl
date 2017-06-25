<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\HorarioModel;
use App\Http\Requests;

class HorarioController extends Controller
{

	public function index(){
        $ho=HorarioModel::paginate();
       	return view('horarios.horarios', compact('ho'));
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

    public function UpdateHorario(Request $requests){
        $horario=HorarioModel::where('idHorario', $requests['id'])->first();
        $horario->fill([
            'horario_descripcion' => $requests['descripcion'],
            'horario_inicio' => Carbon::parse($requests['inicio']),
            'horario_fin' => Carbon::parse($requests['fin']),
        ]);
        $horario->save();
         return response()->json([
                "mensaje"=> $horario
                ]);
    }


    public function deleteHorario($id){
            $horario=HorarioModel::where('idHorario', $id)->first();
            $horario->delete();
             return response()->json([
                    "mensaje"=>"Eliminado"
                    ]);
    }
}
