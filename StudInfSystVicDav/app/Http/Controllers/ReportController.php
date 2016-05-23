<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use \phpjasperxml;
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

  /* public function prueba()
    {
        error_reporting(0);
        /* 
         * To change this template, choose Tools | Templates
         * and open the template in the editor.
         
        include_once('phpjasperxml/class/tcpdf/tcpdf.php');
        include_once("phpjasperxml/class/PHPJasperXML.inc.php");

        $server = "localhost";
        $user = "root";
        $pass = "root";
        $db = "vicentedavila";

        $value = 20200366;
        $PHPJasperXML = new PHPJasperXML();
        //$PHPJasperXML->debugsql=true;
        $PHPJasperXML->arrayParameter=array("parametroOsa"=>$value);
        $PHPJasperXML->load_xml_file("mm.jrxml");

        $PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
        $PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
    }

     public function makeConstancy(Request $request)
    {
       $personId = $request->id;

     /*   $personId = $request->input('personId');
           
       $person = Person::with('student')->where('document_id', $personId)->firstOrFail();

        if($person->student == null)
        {
            return null;
        }    

                            // return $person->toJson();
       else
       {             
            error_reporting(0);
         
            
            include_once('phpjasperxml/class/tcpdf/tcpdf.php');
            include_once("phpjasperxml/class/PHPJasperXML.inc.php");

            $server = "localhost";
            $user = "root";
            $pass = "root";
            $db = "vicentedavila";

          $value = 20200366;
          $PHPJasperXML = new PHPJasperXML();
          //$PHPJasperXML->debugsql=true;
          $PHPJasperXML->arrayParameter=array("parameterDocumentId"=>$value);
          $PHPJasperXML->load_xml_file("constancy.jrxml");
          

          //  $PHPJasperXML = new PHPJasperXML();
            //$PHPJasperXML->debugsql=true;
            //$PHPJasperXML->arrayParameter=array("parametroOsa"=>$value);
            //$PHPJasperXML->load_xml_file("mm.jrxml");


            $PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
            $PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
           
      //  }
        
    } */

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

        output();
        
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
