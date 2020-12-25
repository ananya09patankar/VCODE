<?php
include "session.php";
require "check.php";
require "../config.php";
////////////////////////////////////////////////////////////////////////////////////////////
/////////Collecting the form data ////////////////////////////
$title=$_POST['title'];
$dtl=$_POST['dtl'];
$todo=$_POST['todo'];
$cat_id=$_POST['cat_id'];

if(strlen($cat_id) >0 and !is_numeric($cat_id)){
echo "Data Error";
exit;
}

$elements=array("t1"=>'T',"t2"=>'T',"t3"=>'T',"t4"=>'T',"msg"=>'',"validation_status"=>'OK');
$validation_status='OK';
$db_status='OK';

/////////End of collecting data/////////////////////////////////////////
///////// Checking all the inputs ////////////////////////////////////
$status_form = "OK";
$msg="";
if(strlen($title) < 3 or (strlen($title) > 100)){
$elements["t1"]='F';
$elements["msg"] .="<br>Your  title must be minimum 3 character length and less than 100 character lenght";
$validation_status='NOTOK';
}

if(strlen($dtl) < 10){
$elements["t2"]='F';
$elements["msg"] .="<br>Your detail  description  must be minimum 10 character length";
$validation_status='NOTOK';
}

if($cat_id <1){
$elements["t3"]='F';
$elements["msg"] .="<br>Select on Category";
$validation_status='NOTOK';
}


if($validation_status =='OK'){

$query="insert into faqplus  (title,cat_id,dtl) values  (?,?,?) ";
$stmt=$connection->prepare($query);
if($stmt){ 
$stmt->bind_param("sis", $title, $cat_id, $dtl);
if($stmt->execute()){
$elements["msg"] .= "No of records inserted : ".$connection->affected_rows;
}else{
$elements["msg"] .= $connection->error;
}
}else{
$elements["msg"] .= $connection->error;
}


}// end of else if status_form==OK


//////////////////////////////////////////////////////////////////////////////////////////////  

$elements["validation_status"]=$validation_status;
echo json_encode($elements);



///////////////////////////////////////////



?>
