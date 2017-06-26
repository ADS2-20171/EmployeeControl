<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apoderado extends Model
{
    protected $table='apoderado';

    protected $fillable = ['apoderado_nombres','apoderado_apellidos','apoderado_direccion','apoderado_dni','apoderado_celular'];

    protected $primaryKey = 'idApoderado';

    protected $hidden = ['remember_token'];
}
