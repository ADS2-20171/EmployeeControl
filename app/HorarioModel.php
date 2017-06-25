<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HorarioModel extends Model
{
    protected $table='horario';

    protected $fillable = ['horario_descripcion','horario_inicio','horario_fin','horario_tipo'];

    protected $primaryKey = 'idHorario';

    protected $hidden = ['remember_token'];

    protected $date=['horario_inicio', 'horario_fin' ];

}
