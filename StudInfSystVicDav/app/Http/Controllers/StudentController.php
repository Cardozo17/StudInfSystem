<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Student;
use DB;

class StudentController extends Controller
{
    
    public function index ()
    {
    	$students = Student::All();
    	//$students = Student::with(['teacher', 'legalRepresentative', 'parent'])->get();
    	//$students= DB::table('student')->get();

    	//Ver como sacar toda la informacion que necesito

    	return view('students.index', ['students' => $students]);

    }
}
