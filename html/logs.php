<?php
session_start();
try{
$id=0;
$db= new PDO('mysql:host=localhost;dbname=chat;charset=utf8','root','');
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$name = $_SESSION['username'];
$friend=$_SESSION['chatwith'];
$id1=$_SESSION['id'];
$ar=explode(" ",$friend);
$ar2=explode(" ",$name);
$stmt=$db->query("SELECT * FROM chatbox WHERE (username LIKE  '$ar2[0]%' and receiver LIKE '$ar[0]%') or (username LIKE'$ar[0]%' and receiver LIKE'$ar2[0]%') ORDER by id DESC");
$arr=array();
$a=0;
$results=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($results as $row){
	$username=htmlentities($row['username']);
	$message=htmlentities($row['msg']);
echo "<u>"."<b>".$username."</b>"."</u>".":"."</br>".$message."</br>"."</br>";
	}
}	
catch(PDOException $e){
echo $e->getMessage();
}
?>

