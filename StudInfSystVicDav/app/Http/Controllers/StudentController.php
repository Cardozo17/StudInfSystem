<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Person;
use App\LegalRepresentative;
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


     public function create ()
    {
    	
    	return view('students.create');

    }

       public function store (Request $request)
    {
    	
    	$input= $request->all();

    	Person::create($input);

    	$repLegPerson= new Person(['document_id'=> $input['repLegDocId'], 'name'=> $input['repLegName'], 
    		'last_name'=> $input['repLegLastName'], 'gender'=> $input['repLegGender'], 'email'=> $input['repLegEmail']]);
    	$repLegPerson->save();


    	$personStudentInfo= Person::where('document_id', $input['document_id'])->get();

    
    	$repLeg= new LegalRepresentative(['id'=>$repLegPerson['id'], 'home_address'=> $input['home_address'],
    									 'work_address'=> $input['work_address']]);
    	$repLeg->save();

    	//OJOOO AQUI QUEDE VER PORQUE ME DA ERROR con id
    	$student= new Student(['id'=>$personStudentInfo['id'], 'legal_representative_id'=> $repLeg['id']]);
    	$student->save();							 

    	//return $repLeg;	

    	return redirect('students');

    }
}
