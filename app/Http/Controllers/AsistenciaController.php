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
    	
    	return view('asistencia.asistencia');
    }

    public function postAsistencias(Request $requests)
    {
        $diaasistencia=Carbon::now();
        $hoy=$diaasistencia->toDateString();

    	$alumno=Alumno::where('alumno_dni', $requests['codigo'])->first();

        if ($alumno==null) {

            $trabajador=Trabajador::where('trabajador_dni', $requests['codigo'])->first();

                if ($trabajador==null) {
                    return [ "status" => "error", "message" => "el alumno o el trabajador no existe"];             
                }else{

                    $t=\DB::table('asistencia')->join('trabajador','asistencia.idTrabajador','=','trabajador.idTrabajador')->where('asistencia.asistencia_asistio','=', 1)->where('asistencia.fecha','=', $hoy )->where('trabajador_dni', $requests['codigo'])->get();

                    if ($t==null) {
                            $obligatoria=HorarioModel::where('horario_tipo', "trabajador")->first();
                            $horallegada=Carbon::now();
                            /*$fecha=Carbon::toDateString($horallegada);*/
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
                                'fecha'=>$hoy,
                                'idTrabajador'=>$trabajador->idTrabajador,
                                ]);
                            }
                            return [ "status" => "success", "message" => "Entrada de Trabajador Registrado"];
                    }else{

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
                                /*Asistencia::create([
                                'asistencia_horasalida'=> $horallegada,
                                'asistencia_asistio'=>false,
                                'idTrabajador'=>$trabajador->idTrabajador,
                                ]);*/

                                $trab=$trabajador->idTrabajador;
                                $asistencia=Asistencia::where('idTrabajador','=',$trab)->where('asistencia.fecha','=', $hoy )->first();
                                $asistencia->fill([
                                    'asistencia_horasalida'=> $horallegada,
                                    'asistencia_asistio'=>false,
                                    ]);
                                $asistencia->save();
                                 
                            }
                            return [ "status" => "success", "message" => "Salida de Trabajador Registrado"];

                    }



                }
                
            }else{

                    $a=\DB::table('asistencia')->join('alumno','asistencia.idAlumno','=','alumno.idAlumno')->where('asistencia.asistencia_asistio','=', 1)->where('asistencia.fecha','=', $hoy )->where('alumno_dni', $requests['codigo'])->get();

                    if ($a==null) {
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
                                'fecha'=>$hoy,
                                'idAlumno'=>$alumno->idAlumno,
                                ]);
                            }
                            return [ "status" => "success", "message" => "Asistencia de Alumno Registrado"];
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
                               /* Asistencia::create([
                                'asistencia_horasalida'=> $horallegada,
                                'asistencia_asistio'=>false,
                                'idAlumno'=>$alumno->idAlumno,
                                ]);*/
                                $alum=$alumno->idAlumno;
                                $asistencia=Asistencia::where('idAlumno','=',$alum)->where('asistencia.fecha','=', $hoy )->first();
                                $asistencia->fill([
                                    'asistencia_horasalida'=> $horallegada,
                                    'asistencia_asistio'=>false,
                                    ]);
                                $asistencia->save();

                            }
                            return [ "status" => "success", "message" => "Salida de Alumno Registrado"];

                    }



                }

    	
    }
}
