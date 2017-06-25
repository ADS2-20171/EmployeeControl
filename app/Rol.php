<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table='rol';

    protected $fillable = ['nombre'];

    protected $hidden = ['remember_token'];

    public function user()
    {
        return $this->hasMany('App\User');
    }
}
