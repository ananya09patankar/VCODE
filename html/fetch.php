<?php
session_start();
try{
	$dbh= new PDO('mysql:host=localhost;dbname=signup;charset=utf8','root','');
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$stmt=$dbh->query("SELECT * FROM students");
    $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $name = ($_POST["name"]);
    $userpassword=($_POST['password']);
   
  $k=0;  

foreach($results as $row){
	$username=htmlentities($row['name']);
	$password=htmlentities($row['password']);
	$city=htmlentities($row['city']);
	$country=htmlentities($row['country']);
	$email=htmlentities($row['email']);
	$contactno=htmlentities($row['contact']);
	$address=htmlentities($row['address']);
	$id=htmlentities($row['id']);
if(password_verify($userpassword,$password)){
if($username==$name){
$_SESSION['email']=$email;
$_SESSION['contact']=$contactno;
$_SESSION['address']=$address;
$_SESSION['password']=$password;		
$_SESSION["username"]= $name;
$_SESSION["city"]=$city;
$_SESSION["country"]=$country;
$_SESSION['id']=$id;
$_SESSION['status']="active";
$k=1;
header("Location:mainpage.html");
break;
	}
}
}
if($k==0)
	{
		echo"Invalid Username or Password";	
		
	}

}
catch(PDOException $e)
{
	echo "Connection failed:".$e->getMessage();
}

?>
