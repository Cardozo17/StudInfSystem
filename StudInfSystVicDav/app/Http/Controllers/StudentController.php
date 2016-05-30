<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\StudentFormRequest;

use Validator;
use App\Person;
use App\LegalRepresentative;
use App\Student;
use App\PhoneNumbers;

use DB;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('is_admin');
    }

    public function showFindOneStudentWindow() 
    {
        return  view('students.findStudent');
    } 

    public function index ()
    {
      $students = Student::All();
      //$students = Student::with(['teacher', 'legalRepresentative', 'parent'])->get();
      //$students= DB::table('student')->get();

      return view('students.index', ['students' => $students]);

    }
  
    public function findOneById(Request $request)
    {
        $personId = $request->input('personId');

        $person = Person::with('student')->where('document_id', $personId)->firstOrFail();

        if($person->student== null)
        {
            return null;
        }    

        return $person->toJson();
    }

     public function listStudents ()
    {
        $students = Student::with('person', 'legalRepresentative.person', 'parent.person', 'teacher.person', 'brothers.person')->get();

        return $students->toJson();

    }
    

     public function showCreateStudentWindow ()
    {
    	
    	return view('students.create');

    }

     public function store (Request $request) //StudentFormRequest $request
    {

      $validator = Validator::make(
        $request->all(),
        [
        'document_id'=> array('required', 'regex: /^[[V|E|J|G]\d\d\d\d\d\d\d\d?]{0,9}$|^\d\d\d[[V|E|J|G]\d\d\d\d\d\d\d\d]{0,9}$/', 'max:45'),
        'name'=> 'required|min:3|max:45',
        'last_name'=>'required|min:3|max:45',
        'home_address'=> 'required|max:140',
        'born_place'=>'max:45|required',
        'relationship_with_legal_representative'=>'max:45',
        'born_date'=>'date_format:Y-m-d|required',
        'born_place'=>'required|max:45',
        'height'=> 'numeric',
        'weight'=>'numeric',
        'repLegDocId' => array('required', 'regex: /^[[V|E|J|G]\d\d\d\d\d\d\d\d?]{0,9}$/', 'max:45'),
        'repLegName'=> 'required|min:3|max:45',
        'repLegLastName'=> 'required|min:3|max:45',
        'repLegEmail' => 'email|max:45',
        ]);

      if ($validator->fails()) 
      {
        return redirect('students/create')->withInput()->withErrors($validator);
      }

    	//getting the input from the form
      $input= $request->all();

    	//registering the student in the table person
      $personStudentInfo= new Person (['document_id'=> $input['document_id'], 'name'=> $input['name'], 
        'last_name'=> $input['last_name'], 'home_address'=> $input['home_address'], 'gender'=> $input['gender']]);

      $personStudentInfo->save();

      //registering the student picture in person table
      if($request->hasFile('picture')&&$request->file('picture')->isValid())
      {
          $destinationPath = 'uploads'; // upload path
          $extension = $request->file('picture')->getClientOriginalExtension(); // getting image extension
          $fileName = $request->file('picture')->getCLientOriginalName().'.'.$extension; // renameing image
          $personStudentInfo->picture= $request->file('picture')->move($destinationPath, $fileName); // uploading file to given path
      } 

        $personStudentInfo->save();

    	//Person::create($input);
    	//$personStudentInfo= Person::where('document_id', $input['document_id'])->get();

      //registering representant phones 
        $repLegPhones= new PhoneNumbers(['home_phone'=>$input['repLegHomePhone'], 'mobile_phone'=>$input['repLegMobilePhone'], 'work_phone'=>$input['repLegWorkPhone']]);

        $repLegPhones->save();

    	//registering the legal representative in the table person
        $repLegPerson= new Person(['document_id'=> $input['repLegDocId'], 'name'=> $input['repLegName'], 
          'last_name'=> $input['repLegLastName'], 'gender'=> $input['repLegGender'], 
          'email'=> $input['repLegEmail'], 'phone_numbers_id'=>$repLegPhones['id'],  
          'home_address'=> $input['repLegHomeAddress']]);
        $repLegPerson->save();


    	//after having registered the legal representative in the table person now we can register the legal representative in its table
        $repLeg= new LegalRepresentative(['id'=>$repLegPerson['id'], 
          'work_address'=> $input['repLegWorkAddress']]);
        $repLeg->save();


    	//now that I have the student person Id and the legal representative Id I can register the student
        $student= new Student(['id'=>$personStudentInfo['id'], 'legal_representative_id'=>$repLegPerson['id'],
         'height'=>$input['height'], 'weight'=>$input['weight'], 
         'born_place'=>$input['born_place'],'born_date'=>$input['born_date'], 'status'=>1, 
         'relationship_with_legal_representative'=>$input['selectedRelationshipWithStudent'], 'grade_to_be_register'=>$input['grade_to_be_register']]);
        $student->save();							 

        return redirect('students/create')->with('status','Estudiante Inscrito Satisfactoriamente');

    }

        public function show($id) 
    {
        //
    }  

      public function edit($id)
    {
        //
    }

     public function update($id)
    {
        //
    }

     public function destroy($id)
    {
        //
    }  


}
