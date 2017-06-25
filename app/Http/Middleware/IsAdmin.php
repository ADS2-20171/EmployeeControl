<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Closure;

class IsAdmin
{
   
    protected  $auth;
    public function __construct(Guard $auth){
        $this->auth = $auth;
    }



    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {
          /*
          if ($this->auth->user()->getRol() == 'Administrador') {
            return Redirect::to('admin');
          } else {
             return response('Unauthorized.', 401);
          }
          */
            switch($this->auth->user()->idrol)
                {
                    case '1':
                       return Redirect::to('admin');
                       break;
                    case '2':
                       return Redirect::to('viewAlumno');
                       break;
                    case '3':
                       return Redirect::to('viewTrabajador');
                       break;
                   default:
                       return Redirect::to('/');
                       break;
               }
        }
      
        return $next($request);
    }
}
