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

    public function Pagination(Request $request){
       $limit = (int) $request->input('limit');
        $page = (int) $request->input('page');
        $offset = ($limit * $page) - $limit;
        return HorarioModel::take($limit)->skip($offset)->get();      

        
    }


    public function  postHorarios(Request $requests){
    	HorarioModel::create([
    		'horario_descripcion'=>$requests['descripcion'],
    		'horario_inicio'=>Carbon::parse($requests['inicio']),
    		'horario_fin'=>Carbon::parse($requests['fin']),
            'horario_estado'=>1,
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
