<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table='alumno';

    protected $fillable = ['alumno_nombres','alumno_apellidos','alumno_dni','alumno_fechNac','alumno_direccion','alumno_genero','alumno_celular','alumno_FechaMatric','alumno_nivel','alumno_grado','alumno_seccion','alumno_estado'];

    protected $hidden = ['remember_token'];
}
