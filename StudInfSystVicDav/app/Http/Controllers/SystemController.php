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
        'school_name'=> array('required'),
        'school_principal'=> 'required',
        'school_address'=>'required',
        ]);

      if ($validator->fails())
      {
        return redirect('systemParameters')->withInput()->withErrors($validator);
      }

    	//getting the input from the form
      $input= $request->all();

      //registering the systemParameters in the table system_parameters
      $currentSystemParameters= SystemParameters::where('id',1)->update(['school_name'=> $input['school_name'],
       'school_principal'=> $input['school_principal'], 'school_address'=> $input['school_address']]);

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
