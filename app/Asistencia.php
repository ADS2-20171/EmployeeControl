<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table='asistencia';

    protected $fillable = ['idAsistencia','asistencia_horaentrada','asistencia_horasalida','asistencia_asistio','asistencia_observaciones','asistencia_tardanza','idAlumno','idTrabajador'];

    protected $primaryKey = 'idAsistencia';

    protected $hidden = ['remember_token'];

}
