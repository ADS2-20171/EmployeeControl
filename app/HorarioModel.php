<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HorarioModel extends Model
{
    protected $table='horario';

    protected $fillable = ['horario_descripcion','horario_inicio','horario_fin'];

    protected $hidden = ['remember_token'];

}
