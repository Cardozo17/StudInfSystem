<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
     public function logout ()
    {
    	echo "Estoy cerrando sesion";
    	Auth::logout(); // logout user
        Session::flush();
        Redirect::back();
        return Redirect::to('pages/login'); //redirect back to login
    }
}
