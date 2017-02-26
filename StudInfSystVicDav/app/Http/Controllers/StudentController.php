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
use App\GradeSection;
use App\StudentGrades;

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

    public function findStudentById(Request $request)
    {
        $personId = $request->input('personId');

        $person = Person::with('student','student.legalRepresentative.person','student.legalRepresentative.person.phoneNumbers' )->where('document_id', $personId)->first();

        if($person== null)
        {
            return ['error_status' => 'El alumno no fue encontrado en la base de datos'];
        }

        if($person->student== null)
        {
            return ['error_status' => 'Esta persona esta en el sistema pero no es un alumno'];
        }

        return $person->toJson();
    }

     public function listStudents ()
    {
        $students = Student::with('person', 'legalRepresentative.person', 'parent.person',
         'brothers.person', 'gradeSection.teacher.person' )->get();

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
        'document_id'=> array('required', 'regex: /^[[V|v|E|e|J|j|G|g]\d\d\d\d\d\d\d\d?]{0,9}$|^\d\d\d[[V|v|E|e|J|j|G|g]\d\d\d\d\d\d\d\d?]{0,9}$/', 'max:45', 'unique:person,document_id'),
        'name'=> 'required|min:3|max:45',
        'last_name'=>'required|min:3|max:45',
        'home_address'=> 'required|max:140',
        'born_place'=>'required|max:45',
        'relationship_with_legal_representative'=>'max:45',
        'born_date'=>'required|date_format:Y-m-d',
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
          $destinationPath = 'studentsPictures'; // upload path
          $extension = $request->file('picture')->getClientOriginalExtension(); // getting image extension
          $fileName = $request->document_id.'.'.$extension; /*$request->file('picture')->getCLientOriginalName();.'.'.$extension*/; // renaming image
          $personStudentInfo->picture= $request->file('picture')->move($destinationPath, $fileName); // uploading file to given path
      }

      $personStudentInfo->save();

    	//Person::create($input);
    	//$personStudentInfo= Person::where('document_id', $input['document_id'])->get();

      //registering representant phones
      $repLegPhones= new PhoneNumbers(['home_phone'=>$input['repLegHomePhone'], 'mobile_phone'=>$input['repLegMobilePhone'], 'work_phone'=>$input['repLegWorkPhone']]);

      $repLegPhones->save();

      //checking if the legal representative is not already registered

      //if it's registered I update it with the new information
      if(Person::where('document_id', $input['repLegDocId'])->first()!= null)
      {
          $repLegPerson= Person::where('document_id', $input['repLegDocId'])->first();

          $repLegPerson->update(['name'=> $input['repLegName'],
                'last_name'=> $input['repLegLastName'], 'gender'=> $input['repLegGender'],
                'email'=> $input['repLegEmail'], 'phone_numbers_id'=>$repLegPhones['id'],
                'home_address'=> $input['repLegHomeAddress']]);

          //registering the legRepresentative picture in person table
          if($request->hasFile('repLegPicture')&&$request->file('repLegPicture')->isValid())
          {
              $destinationPath = 'legalRepresentativePictures'; // upload path
              $extension = $request->file('repLegPicture')->getClientOriginalExtension(); // getting image extension
              $fileName = $request->repLegDocId.'.'.$extension; /*$request->file('repLegPicture')->getCLientOriginalName()/*.'.'.$extension*/; // renaming image
              $repLegPerson->picture= $request->file('repLegPicture')->move($destinationPath, $fileName); // uploading file to given path

              $repLegPerson->save();
          }

          //after having registered the legal representative in the table person now we can register the legal representative in its table
            $repLeg=  LegalRepresentative::where('id', $repLegPerson->id);

            $repLeg->update(['id'=>$repLegPerson['id'],
              'work_address'=> $input['repLegWorkAddress']]);

      }
      else
        {
            //if it's not registered I registered in the dataBase

            //registering the legal representative in the table person
            $repLegPerson= new Person(['document_id'=> $input['repLegDocId'], 'name'=> $input['repLegName'],
                'last_name'=> $input['repLegLastName'], 'gender'=> $input['repLegGender'],
                'email'=> $input['repLegEmail'], 'phone_numbers_id'=>$repLegPhones['id'],
                'home_address'=> $input['repLegHomeAddress']]);

            //registering the legRepresentative picture in person table
            if($request->hasFile('repLegPicture')&&$request->file('repLegPicture')->isValid())
            {
                $destinationPath = 'legalRepresentativePictures'; // upload path
                $extension = $request->file('repLegPicture')->getClientOriginalExtension(); // getting image extension
                $fileName = $request->repLegDocId.'.'.$extension;/*$request->file('repLegPicture')->getCLientOriginalName().'.'.$extension*/; // renaming image
                $repLegPerson->picture= $request->file('repLegPicture')->move($destinationPath, $fileName); // uploading file to given path
            }

             $repLegPerson->save();

            //after having registered the legal representative in the table person now we can register the legal representative in its table
            $repLeg= new LegalRepresentative(['id'=>$repLegPerson['id'],
              'work_address'=> $input['repLegWorkAddress']]);

            $repLeg->save();

        }

        //Logica para asignacion de estudiante a seccion y grado
       $grade = $input['grade_to_be_register'];
       $section = $input['section_to_be_register'];

       $gradeSectionAssignment = GradeSection::where('grade', $grade)->where('section_letter', $section)->first();

    	//now that I have the student person Id and the legal representative Id I can register the student
       $student= new Student(['id'=>$personStudentInfo['id'], 'legal_representative_id'=>$repLegPerson['id'],
         'height'=>$input['height'], 'weight'=>$input['weight'],
         'born_place'=>$input['born_place'],'born_date'=>$input['born_date'], 'status'=>1,
         'relationship_with_legal_representative'=>$input['selectedRelationshipWithStudent'], 'grade_to_be_register'=>$input['grade_to_be_register'], 'grade_section_id'=>$gradeSectionAssignment['id']]);
       $student->save();

       return redirect('students/create')->with('status','Estudiante Inscrito Satisfactoriamente');

    }


     public function showPutGrades()
    {
        return  view('students.putGrades');
    }

    public function listStudentsBySectionGrade(Request $request){

       $grade = $request->input('grade');
       $section = $request->input('section');

       /*$students = Person::with(['student.gradeSection' => function ($query) {
        $query->where('grade_section.grade', '1');
      }], 'person')->get();*/

      $students = Person::with('student.gradeSection')->whereHas('student.gradeSection', function ($query) use ($grade, $section)
      {
        $query->where('grade_section.grade',  $grade);
        $query->where('grade_section.section_letter',  $section);
      })->get();


  //     $students->gradeSection()->where('grade', $grade)->get();
/*
       $students = Student::with('person','gradeSection')->where('gradeSection.grade',  $grade)
       ->where('gradeSection.section_letter', $section)->get();
       dd($students);*/

      return $students->toJson();

    }

    public function assignGradeToStudent(Request $request){

       $studentId = $request->input('studentId');
       $literal = $request->input('literal');

       //TODO Validate if student has already a grade assigned

       $studentGrade= new StudentGrades(['student_id'=>$studentId, 'value'=>$literal]);
       $studentGrade->save();

         if($studentGrade== null)
        {
            return ['error_status' => 'Error asignando nota al alumno'];
        }

        if($studentGrade != null)
        {
            return ['success_status' => 'Nota asignada exitosamente'];
        }

        return $studentGrade->toJson();

    }


}
