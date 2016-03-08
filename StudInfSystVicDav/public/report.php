<?php
error_reporting(0);
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once('phpjasperxml_0.9d/class/tcpdf/tcpdf.php');
include_once("phpjasperxml_0.9d/class/PHPJasperXML.inc.php");

$server = "localhost";
$user = "root";
$pass = "root";
$db = "vicentedavila";

$value = 8021568;
$PHPJasperXML = new PHPJasperXML();
//$PHPJasperXML->debugsql=true;
$PHPJasperXML->arrayParameter=array("parametroOsa"=>$value);
$PHPJasperXML->load_xml_file("mm.jrxml");

$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file

?>
