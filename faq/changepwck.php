<?Php
include "session.php";
require "check.php";
require "../config.php";

$elements=array("t1"=>'T',"t2"=>'T',"t3"=>'T',"t4"=>'T',"msg"=>'',"validation_status"=>'OK');
$password=$_POST['password'];
$password2=$_POST['password2'];
$old_password=$_POST['old_password'];

$msg='';
$elements['validation_status']='OK';
$db_status='OK';

/////////End of collecting data/////////////////////////////////////////
///////// Checking all the inputs ////////////////////////////////////
if ( strlen($password)< 8 ) {
$elements['msg']=$elements['msg']."Length of Password should not be less than 8 <BR>";
$elements['validation_status']= "NOTOK";}

if ( $password <> $password2) {
$elements['msg']=$elements['msg']."Password does not match with re-typed password<br>"; 
$elements['validation_status']= "NOTOK";}

//echo "select password from faqplus_admin where userid='$_SESSION[userid]' ";
//exit;

$stmt = $connection->query("select password from faqplus_admin where userid='$_SESSION[userid]' ");


$row = $stmt->fetch_assoc();

if (!(crypt($old_password, $row[password]) === $row[password])) {
$elements['msg'] =$elements['msg']."Check	 your old password<br>"; 
$elements['validation_status']= "NOTOK";}


if($elements['validation_status'] =='OK'){

$cost = 10;
$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
$salt = sprintf("$2a$%02d$", $cost) . $salt;
$hash = crypt($password, $salt);

$query="UPDATE faqplus_admin set password=?  where  userid='$_SESSION[userid]'";
$stmt=$connection->prepare($query);
if($stmt){ 
$stmt->bind_param("s", $hash);
if($stmt->execute()){
$elements["msg"] .="Password Changed,  No of records updated : ".$connection->affected_rows;
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