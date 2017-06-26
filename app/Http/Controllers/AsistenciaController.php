<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\HorarioModel;
use App\Alumno;
use App\Trabajador;
use App\Asistencia;
use App\Http\Requests;

class AsistenciaController extends Controller
{
    public function index(){
    	$date = Carbon::now()->toDateTimeString();
    	return view('asistencia.asistencia', compact('date'));
    }

    public function postAsistencias(Request $requests)
    {
    	$alumno=Alumno::where('alumno_dni', $requests['codigo'])->first();

        if ($alumno==null) {

            $trabajador=Trabajador::where('trabajador_dni', $requests['codigo'])->first();

                if ($trabajador==null) {
                    return [ "status" => "error", "message" => "el alumno o el trabajador no existe"];             
                }else{
                    //generar la hora
                    $obligatoria=HorarioModel::where('horario_tipo', "trabajador")->first();
                    $horallegada=Carbon::now();
                    $today = getdate();
                        $anyo = $today["year"];
                        $mes = $today["mon"];
                        $dia = $today["mday"];

                    $solo_hora_entrada = explode(':',$obligatoria->horario_inicio)[0];
                    $carbon_entrada = Carbon::createFromDate($anyo, $mes, $dia);
                    $carbon_entrada->addHours($solo_hora_entrada);

                    $tardanza=$horallegada->diffInHours($carbon_entrada);
                    $tardanzaminutos=$horallegada->diffInMinutes($carbon_entrada);
                    if ($tardanza>0) {
                        Asistencia::create([
                        'asistencia_horaentrada'=> $horallegada,
                        'asistencia_asistio'=>true,
                        'asistencia_tardanza'=>$tardanza + ($tardanzaminutos / 100),
                        'idTrabajador'=>$trabajador->idTrabajador,
                        ]);
                    }
                    return [ "status" => "success", "message" => "Trabajador Registrado"];
                }
                
            }else{
                $obligatoria=HorarioModel::where('horario_tipo', "alumno")->first();
                    $horallegada=Carbon::now();
                    $today = getdate();
                        $anyo = $today["year"];
                        $mes = $today["mon"];
                        $dia = $today["mday"];

                    $solo_hora_entrada = explode(':',$obligatoria->horario_inicio)[0];
                    $carbon_entrada = Carbon::createFromDate($anyo, $mes, $dia);
                    $carbon_entrada->addHours($solo_hora_entrada);

                    $tardanza=$horallegada->diffInHours($carbon_entrada);
                    $tardanzaminutos=$horallegada->diffInMinutes($carbon_entrada);
                    if ($tardanza>0) {
                        Asistencia::create([
                        'asistencia_horaentrada'=> $horallegada,
                        'asistencia_asistio'=>true,
                        'asistencia_tardanza'=>$tardanza + ($tardanzaminutos / 100),
                        'idAlumno'=>$alumno->idAlumno,
                        ]);
                    }
                    return [ "status" => "success", "message" => "Alumno Registrado"];
            }

    	
    }
}
