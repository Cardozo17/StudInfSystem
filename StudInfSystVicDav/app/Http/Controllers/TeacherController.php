<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use Validator;
use App\Person;
use App\Teacher;
use App\GradeSection;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('is_admin');
    }

    public function showCreateTeacherWindow()
    {
        return  view('teachers.create');
    }

    public function  showAssignTeacherWindow()
    {
        return  view('teachers.assign');
    }

    public function store (Request $request)
    {

      $validator = Validator::make(
        $request->all(),
        [
        'document_id'=> array('required', 'regex: /^[[V|v|E|e|J|j|G|g]\d\d\d\d\d\d\d\d?]{0,9}$|^\d\d\d[[V|v|E|e|J|j|G|g]\d\d\d\d\d\d\d\d?]{0,9}$/', 'max:45', 'unique:person,document_id'),
        'name'=> 'required|min:3|max:45',
        'last_name'=>'required|min:3|max:45',
        ]);

      if ($validator->fails())
      {
        return redirect('teachers/create')->withInput()->withErrors($validator);
      }

    	//getting the input from the form
      $input= $request->all();

    	//registering the student in the table person
      $personTeacherInfo= new Person (['document_id'=> $input['document_id'], 'name'=> $input['name'],
        'last_name'=> $input['last_name'], 'gender'=> $input['gender']]);

      $personTeacherInfo->save();

    	//now that I have the teacher person I can register the  teacher
      $teacher= new Teacher(['id'=>$personTeacherInfo['id'], 'teacher_code' => mt_rand(10000, 99999)]);
      $teacher->save();

      return redirect('teachers/create')->with('status','Docente Registrado Satisfactoriamente');

    }

    public function findTeacherById(Request $request)
    {
        $personId = $request->input('personId');

        $person = Person::with('teacher')->where('document_id', $personId)->first();

        if($person== null)
        {
            return ['error_status' => 'El docente no fue encontrado en la base de datos'];
        }

        if($person->teacher== null)
        {
            return ['error_status' => 'Esta persona esta en el sistema pero no es un docente'];
        }

        return $person->toJson();
    }

    public function assignTeacher(Request $request)
    {
         $personDocId = $request->input('document_id');
         $grade = $request ->input('grade_to_be_assigned');
         $section = $request ->input('section_to_be_assigned');

         $person = Person::with('teacher')->where('document_id', $personDocId)->first();

         if($person == null)
        {
        	return redirect('teachers/assign')->with('error_status','El docente no fue encontrado en la base de datos');
        }

        if($person->teacher== null)
        {
        	return redirect('teachers/assign')->with('error_status','Esta persona esta en el sistema pero no es un docente');
        }

        $gradeSectionAssignment= new GradeSection(['teacher_id'=>$person['id'], 'grade' => $grade, 'section_letter' =>$section ]);
      	$gradeSectionAssignment->save();

      	 return redirect('teachers/assign')->with('status', "Docente asignado correctamente");
    }


}
