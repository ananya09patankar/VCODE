<?php
session_start();
try{
$dbh=new PDO('mysql:host=localhost;dbname=signup;charset=utf8','root','');
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
echo "Connection failed:".$e->getMessage();
}
$name=$_SESSION["username"];
$a=explode(" ",$name);
$stmt=$dbh->query("SELECT DISTINCT friendrequest FROM students WHERE name LIKE '$a[0]%'");
$results=$stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($results[0]["friendrequest"]);    
?>