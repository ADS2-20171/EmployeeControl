<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{

	protected $table='trabajador';

    protected $fillable = ['trabajador_nombres','trabajador_apellidos','trabajador_dni','trabajador_FechNac','trabajador_sexo','trabajador_celular','trabajador_FechInicio','trabajador_estado','trabajador_cargo','trabajador_condicion','idHorario'];

    protected $primaryKey = 'idTrabajador';

    protected $hidden = ['remember_token'];

}
