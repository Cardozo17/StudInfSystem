<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use JasperPHP\JasperPHP as JasperPHP;

use App\Person;
use App\LegalRepresentative;
use App\Student;

class ReportController extends Controller
{
     public function showMakeStudyConstancyWindow()
    {
        return view('reports.studyConstancy');
    }

    public function showMakeCitationWindow()
    {
        return view('reports.citation');
    }

     public function showMakeAuthorizationWindow()
    {
        return view('reports.authorization');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function makeStudyConstancy(Request $request)
    {
        $jasper= new JasperPHP;

        $input= $request->all();

        $personId = $input['document_id']; 
      
        $database = config('database.connections.mysql');

        $output = public_path().time().'_constancy';
        
        $ext = "pdf";
 
        $jasper->process(
            public_path().'/reportJasperVD/constancy.jasper', 
            $output, 
            array($ext),
            array("parameterDocumentId"=>$personId, "realPath"=>public_path().'/images/'),
            $database,
            false,
            false
        )->execute();
 
        header('Content-Description: File Transfer');
        header('Content-type: application/pdf');
        //header('Content-Type: application/octet-stream');
        header('Content-Disposition: inline; filename='.time().'_constancy.'.$ext);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($output.'.'.$ext));
        flush();
        readfile($output.'.'.$ext);
        unlink($output.'.'.$ext); // deletes the temporary file
        
        return Redirect::to('/showMakeStudyConstancyWindow');
    }

        public function makeCitation(Request $request)
    {
        $jasper= new JasperPHP;

        $jasper->compile(public_path().'/reportJasperVD/citacion.jrxml')->execute();

        $input= $request->all();

        $personId = $input['document_id']; 
      
        $database = config('database.connections.mysql');

        $output = public_path().time().'_citation';
        
        $ext = "pdf";
 
        $jasper->process(
            public_path().'/reportJasperVD/citacion.jasper', 
            $output, 
            array($ext),
            array("parameterDocumentId"=>$personId, "realPath"=>public_path().'/images/'),
            $database,
            false,
            false
        )->execute();
 
        header('Content-Description: File Transfer');
        header('Content-type: application/pdf');
        //header('Content-Type: application/octet-stream');
        header('Content-Disposition: inline; filename='.time().'_constancy.'.$ext);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($output.'.'.$ext));
        flush();
        readfile($output.'.'.$ext);
        unlink($output.'.'.$ext); // deletes the temporary file
        
        return Redirect::to('/showMakeCitationWindow');
    }

      public function makeAuthorization(Request $request)
    {
        $jasper= new JasperPHP;

        $input= $request->all();

        $personId = $input['document_id'];
      
        $database = config('database.connections.mysql');

        $output = public_path().time().'_authorization';
        
        $ext = "pdf";
 
        $jasper->process(
            public_path().'/reportJasperVD/autorizacion.jasper', 
            $output, 
            array($ext),
            array("parameterDocumentId"=>$personId, "realPath"=>public_path().'/images/'),
            $database,
            false,
            false
        )->execute();
 
        header('Content-Description: File Transfer');
        header('Content-type: application/pdf');
        //header('Content-Type: application/octet-stream');
        header('Content-Disposition: inline; filename='.time().'_constancy.'.$ext);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($output.'.'.$ext));
        flush();
        readfile($output.'.'.$ext);
        unlink($output.'.'.$ext); // deletes the temporary file
        
        return Redirect::to('/showMakeAuthorizationWindow');
    }

}
