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

    	return view('students.index',compact('students'));

    }
}
