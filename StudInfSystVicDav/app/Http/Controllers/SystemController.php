<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\SystemParameters;

use App\Http\Requests;

class SystemController extends Controller
{
     public function showSystemParametersWindow()
    {
        return  view('system.systemParameters');
    }

    public function store (Request $request) //StudentFormRequest $request
    {

      $validator = Validator::make(
        $request->all(),
        [
        'school_name'=> array('required', 'max:45', 'min:5'),
        'school_principal'=> 'required|max:45' ,
        'school_address'=>'required|max:45',
        'school_phone'=>'required|max:45',
        'schol_email'=>'email|max:45',
        'school_mission'=>'max:500',
        'school_vision'=>'max:500',
        ]);

      if ($validator->fails())
      {
        return redirect('systemParameters')->withInput()->withErrors($validator);
      }

    	//getting the input from the form
      $input= $request->all();

      //registering the systemParameters in the table system_parameters
      $currentSystemParameters= SystemParameters::where('id',1)->update(['school_name'=> $input['school_name'],
       'school_principal'=> $input['school_principal'], 'school_address'=> $input['school_address'], 'school_vision'=>$input['school_vision'], 'school_mission'=>$input['school_mission'], 'school_address'=>$input['school_address'], 'school_phone'=>$input['school_phone']]);

      //registering the school logo in system parameters table
      if($request->hasFile('school_logo')&&$request->file('school_logo')->isValid())
      {
          $destinationPath = 'schoolLogo'; // upload path
          $extension = $request->file('school_logo')->getClientOriginalExtension(); // getting image extension
          $fileName = "SchoolLogo".'.'.$extension; // renaming image

          $currentSystemParameters= SystemParameters::find(1);
          $currentSystemParameters->school_logo= $request->file('school_logo')->move($destinationPath, $fileName); // uploading file to given path

          $currentSystemParameters->save();
      }

      return redirect('systemParameters')->with('status','Parametros del Sistema Establecidos Satisfactoriamente');

    }

    public function getSystemParameters()
    {
        $systemParameters = SystemParameters::find(1);
        return $systemParameters->toJson();
    }

}
