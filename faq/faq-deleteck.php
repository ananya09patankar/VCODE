<?Php
include "session.php";
require "check.php";
require "../config.php";

$cont_id=$_GET['cont_id'];


$query="delete from faqplus where cont_id=?";
$stmt=$connection->prepare($query);
if($stmt){ 
$stmt->bind_param("i", $cont_id);
if($stmt->execute()){
echo " No of records delete : ".$connection->affected_rows;
}else{
echo $connection->error;
}
}else{
echo $connection->error;
}


?>