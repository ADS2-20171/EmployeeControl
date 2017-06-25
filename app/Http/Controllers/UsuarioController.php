<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rol;
use App\Alumno;
use App\Trabajador;
use App\Http\Requests;

class UsuarioController extends Controller
{
    public function index()
    {
        $roles=Rol::all();
    	$alumnos=Alumno::all();
        $trabajadores=Trabajador::all();
	   	return view('usuario.usuario', compact('alumnos','trabajadores','roles'));
    }

    public function getUsuarios()
    {	

        return User::all();
    	
    }

    public function postUsuarios(Request $requests)
    {

        $rol=Rol::where('idrol',$requests['idrol'])->first();
            if ($rol->idrol==2) {
                $alumno=Alumno::where('idAlumno', $requests['alumno'])->first();
               $a=User::create([
                    'name'=>$alumno->alumno_nombres,
                    'email'=>$requests['email'],
                    'password'=>bcrypt($requests['password']),
                    'idrol'=>$requests['idrol'],
                    'idAlumno'=>$requests['alumno'],
                    ]);
                 return response()->json([
                "mensaje" => $a,
                            ]);
            }else{
                if ($rol->idrol==3) {
                $trabajador=Trabajador::where('idTrabajador', $requests['trabajador'])->first();
                $t=User::create([
                    'name'=>$trabajador->trabajador_nombres,
                    'email'=>$requests['email'],
                    'password'=>bcrypt($requests['password']),
                    'idrol'=>$requests['idrol'],
                    'idTrabajador'=>$requests['trabajador'],
                    ]);
                                  }
                return response()->json([
                "mensaje" => $t,
                ]);

            }

    }


    public function UpdateUsuarios(Request $requests){
        $user=User::where('id', $requests['id'])->first();
        $user->fill([
            'name'=>$requests['name'],
            'email'=>$requests['email'],
            'password'=>bcrypt($requests['password']),
            'idrol'=>$requests['idrol'],
                 ]);
        $user->save();
        return response()->json([
                "mensaje"=> $user
                ]);
    }



    public function DeleteUsuarios($id){
            $user=User::where('id', $id)->first();
            $horario->delete();
             return response()->json([
                    "mensaje"=>"Eliminado"
                    ]);
    }
}
