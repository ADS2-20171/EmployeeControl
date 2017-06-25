<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function index()
    {
    	if (\Auth::user()->getRol() == 'Administrador')
        	return view('index');
        else
        	return response('Unauthorized.', 401);
    }
}
