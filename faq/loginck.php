<?Php
session_start();
//

////////////////////////////////////////////
require "../config.php";
///////////////////////
if($_POST['todo']=="login-data"){
$userid=$_POST['userid'];
$password=$_POST['password'];
$ip=$_SERVER['REMOTE_ADDR'];
}
/////////////////
$status = "OK";
$msg="";
//error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);
//echo "select password,mem_id,userid from faqplus_admin where userid=$userid ";

if($stmt = $connection->prepare("select password,userid from faqplus_admin where userid=?")){

  $stmt->bind_param('s',$userid);
  $stmt->execute();
   
   $result = $stmt->get_result();
   //$no=$result->num_rows;
  // echo "No of records : ".$result->num_rows."<br>";
   $row=$result->fetch_object();
  // echo $row->password;
}else{
echo $connection->error;
}




if (crypt($password, $row->password) === $row->password) {

$_SESSION['id']=session_id();
$_SESSION['userid']=$row->userid;


header ("Location: faq-list.php"); 

}else{
header ("Location: login.php?msg=Wrong Login "); 
}

?>



