<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table='eventos';

    protected $fillable = ['eventos_titulo','eventos_cuerpo','eventos_inicio','eventos_final','idAlumno','idTrabajador'];

    protected $primaryKey = 'idEventos';

    protected $hidden = ['remember_token'];
}
