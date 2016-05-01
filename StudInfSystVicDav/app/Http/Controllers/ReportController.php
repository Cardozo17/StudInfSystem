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
     public function showMakeConstancyWindow()
    {
        return view('reports.studyConstancy');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
 
    /**
     * Display a listing of the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('reports.report');
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
            public_path().'/constancy.jasper', 
            $output, 
            array($ext),
            array("parameterDocumentId"=>$personId),
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
        
        return Redirect::to('/reporting');
    }
}
