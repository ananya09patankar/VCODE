<?php
include "session.php";
require "check.php";
echo "
<html>
<head>
<title>(Type a title for your page here)</title>";

require "../head.php";
echo "</head>
<style>
#msg{
position: absolute;
 height:auto;
width:auto;
left:600px;
top:0px;
}
</style>

<body onload=\"document.f1.cat_name.focus()\">";

require "../config.php";

require "menu.php";
$msg='';
echo "<div id=msg></div>";
echo "<div class='col-md-12 col-md-offset-1'> ";

////////////////////////////////////////////////////////////////////////////////////////////
@$todo=$_POST['todo'];
if(isset($todo) and $todo=="delete_cat_name"){
	$show_msg='yes';
@$box=$_POST['box'];
while (list ($key, $val) = each ($box)) {

if($stmt=$connection->prepare("delete from faqplus_cat where cat_id not in (select distinct(cat_id) from faqplus ) and cat_id=?")){
$stmt->bind_param('i', $val);
$stmt->execute();
if($stmt->affected_rows ==1){$msg.= " One category with id = $val deleted <br>";}
else{ $msg.= " Category Not deleted, remove all contents from the Category before deleting <br>";}
}
else { $msg.="  Category can't be deleted <br>" ;} 
}
}
if(isset($todo) and $todo=="addcat_name"){
@$cat_name=$_POST['cat_name'];
$show_msg='yes';
if($stmt=$connection->prepare("insert into faqplus_cat (name) values(?)")){
$stmt->bind_param('s', $cat_name);
$stmt->execute();
$msg.= " Category : $cat_name  added : ";
}else{$msg.= " Category : $cat_name not  added : ";}
//echo mysql_error();

}

echo "<table  >  <tr ><form name=f1 method=post action=''>
<input type=hidden name=todo value=addcat_name>

   <tr><td    colspan=2><b>ADD A category </b> </td></tr>";
echo "<tr><td  >Enter Category Name</td><td><input type=text name='cat_name'><input type=submit value='Add'></td></tr></form>";
echo "</table><br><br>";
 

$sql="SELECT * FROM  faqplus_cat order by name";

//$recs=mysql_num_rows($result);
if($stmt = $connection->query("$sql")){

  echo "<button type='button' class='btn btn-default btn-xs'>Number of Categories <span class='badge'>$stmt->num_rows</span></button>";
  echo "<form method=post action=''><table class='table table-striped'>
 <tr class='info'><th width=20%>Category NAME</th><th><input type=submit value=DELETE name=sub><input type=hidden name=todo value=delete_cat_name></th></tr>";





  while ($row = $stmt->fetch_assoc()) {
 echo "<tr ><td > <font face='verdana, arial, helvetica' size='2' ><a href=\"javascript:void(0);\" NAME=\"w1\" title=\"t1\" onClick=window.open(\"faq-child.php?cat_id=$row[cat_id]\",\"Category\",\"width=550,height=170,left=150,top=200,toolbar=1,status=1,\");>$row[name]</a>
</td>
<td><input type=checkbox name=box[] value=$row[cat_id]></td>
</tr>";
}
echo  "</table></form>";
}else{
echo $connection->error;
}
////////////////////////////////////////////////////////////////////////////////////////////// 
//$show_msg='yes'; 
//$msg='testing ';
echo "</div>
<script>
\$(document).ready(function() { 
";
if($show_msg=='yes'){
	
echo "var msg='".$msg."';";

echo "\$('#msg').removeClass('alert alert-danger').addClass('alert alert-info');
 \$('#msg').html(msg);
 setTimeout(function() { $('#msg').hide(); }, 5000);
";
}
?>
/////////////////


 
//////
})
</script>
</body>
</html>
