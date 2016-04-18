<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class NotAutorizedController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
  public function showNotAutorized()
    {
         return view('notAutorized');
    }
}