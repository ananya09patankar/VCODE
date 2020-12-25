<?Php
include "session.php";
require "check.php";
require "../config.php";

$elements=array("t1"=>'T',"t2"=>'T',"t3"=>'T',"t4"=>'T',"msg"=>'',"validation_status"=>'OK');
$cont_id=$_POST['cont_id'];
$title=$_POST['title'];
$dtl=$_POST['dtl'];
$cat_id=$_POST['cat_id'];
$msg='';
$validation_status='OK';
$db_status='OK';

/////////End of collecting data/////////////////////////////////////////
///////// Checking all the inputs ////////////////////////////////////
$status_form = "OK";
$msg="";
if(strlen($title) < 3 or (strlen($title) > 100)){
$elements["t1"]='F';
$elements["msg"] .="Your  title must be minimum 3 character length and less than 100 character lenght";
$elements['validation_status']='NOTOK';
}

if(strlen($dtl) < 10){
$elements["t2"]='F';
$elements["msg"] .="<br>Your detail  description  must be minimum 10 character length";
$elements['validation_status']='NOTOK';
}

if($cat_id <1){
$elements["t3"]='F';
$elements["msg"] .="<br>Select on Category";
$elements['validation_status']='NOTOK';
}


if($elements['validation_status'] =='OK'){


$query="UPDATE faqplus set title=?,dtl=?,cat_id=? where cont_id=?";
$stmt=$connection->prepare($query);
if($stmt){ 
$stmt->bind_param("ssii", $title, $dtl, $cat_id,$cont_id);
if($stmt->execute()){
$elements["msg"] .=" No of records updated : ".$connection->affected_rows;
}else{

$elements["msg"] .= $connection->error;
}
}else{

$elements["msg"] .= $connection->error;
}
}
//$elements["msg"]=$msg;
echo json_encode($elements);
?>