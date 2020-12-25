<?php
include "session.php";
require "../config.php";
?>
<html>

<head>
<title>plus2net.com FAQ script : Update category name</title>
<SCRIPT language=JavaScript>
<!--
function win(){
window.opener.location.href="faq-category.php";
self.close();
//-->
}
</SCRIPT>
</head>

<body>

<?Php
require "check.php";
@$cat_id=$_GET['cat_id'];



@$todo=$_POST['todo'];
if(isset($todo) and $todo=="update"){
$cat_id2=$_POST['cat_id2'];
if(strlen($cat_id2) > 0 and !is_numeric($cat_id2)){
echo "Data Error";
exit;
}

$cat_name=$_POST['cat_name'];
$cat_id=$cat_id2;

$stmt = $connection->prepare("update faqplus_cat set name=? where cat_id=?");
if ($stmt) {
$stmt->bind_param('si', $cat_name, $cat_id2);
$stmt->execute();
echo "Record Updated:";
echo $stmt->affected_rows;
}else{
echo $connection->error;
}

echo "<SCRIPT language=JavaScript>
window.opener.location.href=\"faq-category.php\";
self.close();
</SCRIPT>
";
}

if(strlen($cat_id) > 0 and !is_numeric($cat_id)){
echo "Data Error";
exit;
}


if($stmt = $connection->prepare("select name,cat_id from faqplus_cat  where cat_id=?")){
  $stmt->bind_param('i',$cat_id);
  $stmt->execute();
   
   $result = $stmt->get_result();
   //echo "No of records : ".$result->num_rows."<br>";
   $row=$result->fetch_object();

//$dtl=$row->dtl;



echo "<form method=post action=''><input type=hidden name=todo value=update><input type=hidden name=cat_id2 value=$row->cat_id>
<input type=text name=cat_name value='$row->name'><input type=submit value='Update'></form>";
}
?>
<br><br>
<center><input type=button onClick="win();" value="Close this window"></center>
</body>

</html>
