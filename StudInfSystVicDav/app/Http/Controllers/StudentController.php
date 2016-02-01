<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    
    public function index ()
    {
    	$students = Student::All();

    	//Ver como sacar toda la informacion que necesito

    	return view('students.index',compact('students'));

    }
}
