<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ReportController extends Controller
{
     public function studyConstancyPaper()
    {
        return view('reports.studyConstancy');
    }

	public function __construct()
    {
        //$this->middleware('guest');
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
 
 
    public function post()
    {
        
        $database = null;//\Config::get('database.connections.mysql');
        $output = public_path() . '/report/'.time().'_try';
        
        $ext = "pdf";
 
        \JasperPHP::process(
            public_path() . '/report/try.jasper', 
            $output, 
            array($ext),
            array(),
            $database,
            false,
            false
        )->execute();
 
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.time().'_try.'.$ext);
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
