<?php

$username=$_POST['username'];
$uname=$_POST['uname'];
$uname1=$_POST['uname1'];
$email=$_POST['email'];
$password=$_POST['password'];

$conn=new mysqli('localhost','root','','registration');
if($conn->connect_error){
	
}

?>
