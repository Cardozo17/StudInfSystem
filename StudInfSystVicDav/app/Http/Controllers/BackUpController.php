<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BackUpController extends Controller
{
	public function showBackUpWindow()
    {
        return view('backup.studentsInfoBackup');
    }    
}
