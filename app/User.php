<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'idrol','idAlumno', 'idTrabajador'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    protected $primaryKey = 'id';


     public function getRol()
    {
        $rol = \DB::table('rol')->where('idrol', $this->idrol)->first();
        return $rol->nombre;
    }


     public function rol()
    {
        return $this->belongsTo('App\Rol');
    }
}
