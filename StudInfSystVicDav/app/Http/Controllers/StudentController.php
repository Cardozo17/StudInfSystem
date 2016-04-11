<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\StudentFormRequest;

use App\Person;
use App\LegalRepresentative;
use App\Student;

use DB;

class StudentController extends Controller
{
      public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('is_admin');
    }

    public function findOneById(Request $request)
    {
      $personId = $request->input('personId');
       
        //$input= $request->all();
        //$personId= $input['personId'];

        //$person = Person::where('document_id', $personId)->firstOrFail();


        $person = Person::with('student')->where('document_id', $personId)->firstOrFail();

        if($person->student== null)
        {
            return null;
        }    

       // $studentFound= $person->student()->where('id', '=', $person->id);
       // $studentFound = Student::where('document_id', $personId);

       /* $studentFound= Student::with(['person'=> function($query){
            $query->where('id', '=', $person->id);}])->firstOrFail();*/

       
      //  $studentFound = Student::where('id', $personId)->get();

        //$studentId= $person->id;
        //$studentFound = Student::find($studentId);
       

//echo("<script>console.log('PHP: ".json_encode($personId)."');</script>");
        //  $studentFound= $Person->Student()->where('id', '==',1)->get();
       //  $person = Person::where('document_id', $personId)->firstOrFail();
       //$studentFound = $Person->$Student::where( 'id',  1);
        //$person = student->person()->firstOrFail();;
       // $students = Student::with('person')->get();
      
      //  $studentFound = Student::find(1);
       

     // buena   $person = $studentFound->person;
       // $data = $person->student->person;
        
        //return $studentFound->toJson();
        return $person->toJson();
    }

     public function listStudents ()
    {
        $students = Student::with('person', 'legalRepresentative.person', 'parent.person', 'teacher.person', 'brothers.person')->get();

        return $students->toJson();

    }
    
     public function index ()
    {
    	$students = Student::All();
    	//$students = Student::with(['teacher', 'legalRepresentative', 'parent'])->get();
    	//$students= DB::table('student')->get();

    	return view('students.index', ['students' => $students]);

    }


     public function create ()
    {
    	
    	return view('students.create');

    }

       public function store (StudentFormRequest $request)
    {
    	//getting the input from the form
    	$input= $request->all();

    	//registering the student in the table person
    	$personStudentInfo= new Person (['document_id'=> $input['document_id'], 'name'=> $input['name'], 
    		'last_name'=> $input['last_name'], 'home_address'=> $input['home_address'], 'gender'=> $input['gender'], 'email'=> $input['email']]);
    	$personStudentInfo->save();

    	//Person::create($input);
    	//$personStudentInfo= Person::where('document_id', $input['document_id'])->get();

    	//registering the legal representative in the table person
    	$repLegPerson= new Person(['document_id'=> $input['repLegDocId'], 'name'=> $input['repLegName'], 
    		'last_name'=> $input['repLegLastName'], 'gender'=> $input['repLegGender'], 'email'=> $input['repLegEmail']]);
    	$repLegPerson->save();
    
    	//after having registered the legal representative in the table person now we can register the legal representative in its table
    	$repLeg= new LegalRepresentative(['id'=>$repLegPerson['id'], 
    									 'work_address'=> $input['work_address']]);
    	$repLeg->save();

    
    	//now that I have the student person Id and the legal representative Id I can register the student
    	$student= new Student(['id'=>$personStudentInfo['id'], 'legal_representative_id'=>$repLegPerson['id']]);
    	$student->save();							 

    	return redirect('students');

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
