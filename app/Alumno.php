<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Alumno extends Model
{
    protected $table='alumno';

    protected $fillable = ['alumno_nombres','alumno_apellidos','alumno_dni','alumno_fechaNac','alumno_direccion','alumno_genero','alumno_celular','alumno_FechaMatric','alumno_nivel','alumno_grado','alumno_seccion','alumno_imagen','alumno_estado', 'idApoderado'];

    protected $primaryKey = 'idAlumno';

    protected $hidden = ['remember_token'];

    public function setPathAttribute($path){
    	$this->attributes['path']= Carbon::now()->second.$path->getClientOriginalName();
    	$name=Carbon::now()->second.$path->getClientOriginalName();
    	\Storage::disk('local')->put($name, \File::get($path));
    }

}
