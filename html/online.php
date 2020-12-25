<?php
try{
$dbh=new PDO('mysql:host=localhost;dbname=signup;charset=utf8','root','');
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$a=0;
$stmt=$dbh->query("SELECT friends FROM students where name=");
$results=$stmt->fetchAll(PDO::FETCH_ASSOC);
$names=array();
foreach($results as $row){
$username=htmlentities($row['name']);
session_start
if(=='active'){
names[$a++]=$username;
}
}
foreach($names as i){
	echo i."</br>";
}
}
catch(PDOException $e)
{
echo "Connection failed:".$e->getMessage();
}
?>