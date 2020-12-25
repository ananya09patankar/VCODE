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
$a=0;
$user=$_SESSION["username"];
$ar=explode(" ",$user);
$stmtp=$dbh->query("SELECT DISTINCT friendrequest FROM students WHERE name LIKE '$ar[0]%' ");
$res=$stmtp->fetch();
$obj=$res["friendrequest"];
$arr1=explode(",",$obj);
$stmt2=$dbh->query("SELECT DISTINCT friends FROM students WHERE name LIKE '$ar[0]%' ");
$res2=$stmt2->fetch();
$obj2=$res2["friends"];
$arr2=explode(",",$obj2);
$k=0;
$t=0;
$m=0;
$stmt=$dbh->query("SELECT DISTINCT name FROM students");
$results=$stmt->fetchAll(PDO::FETCH_ASSOC);
$name=array();
foreach($results as $row){
	$t=0;
	$k=0;
	$m=0;
 $username=htmlentities($row['name']);
 $arrn=explode(",",$username);
  for($i=0;$i<sizeof($arr1);$i++)
{
if ($username==$arr1[$i]){
$k=1;
break;
}
}
for($i=0;$i<sizeof($arr2);$i++)
{
if ($username==$arr2[$i]){
$t=1;
break;
}
}
$st1=$dbh->query("SELECT DISTINCT friendrequest FROM students WHERE name LIKE '$arrn[0]%' ");
$resn=$st1->fetch();
$objn=$resn["friendrequest"];
$arrnew=explode(",",$objn);
for($i=0;$i<sizeof($arrnew);$i++)
{
if ($user==$arrnew[$i]){
$m=1;
break;
}
}
if(($username!=$_SESSION["username"] && $username!="")&&($t==0 && $k==0)&&($m==0)){
  $names[$a]=$username;
  $a++;
  } 
}
echo json_encode($names);    
?>	