<?php
include "session.php";
require "check.php";
echo "
<html>
<head>
<title>plus2net.com FAQ scirpt : List of contents</title>";

require "../head.php";
echo "
<SCRIPT language=JavaScript>
function reload(form){  
var val=form.cat_id.options[form.cat_id.options.selectedIndex].value;
self.location='faq-list.php?cat_id=' + val ;
}
</script>


</head>

<body >";



require "menu.php";
require "../config.php";
echo "<div class='col-md-12 col-md-offset-1'> ";
$cat_id=@$_GET['cat_id'];
if(strlen($cat_id) >0 and !is_numeric($cat_id)){
echo "Data Error";
exit;
}



$msg=@$_GET['msg'];
if(isset($msg) and strlen($msg) >1 ){
echo "<br><span style='background-color: #FFFF00'>$msg</span>";;
}
///////////////////////////////////////////////////

echo "<br><form method=post action=''><select name=cat_id onchange=\"reload(this.form)\" class='form-control' style='width:auto;'><option value='0'>Select Any Category</option>";
$q=" select name,cat_id from faqplus_cat order by name" ;
if($stmt = $connection->query("$q")){


while ($row = $stmt->fetch_assoc()) {
	if($cat_id==$row[cat_id]){
	echo "<option value=$row[cat_id] selected>$row[name]</option>";
	}else{
	echo "<option value=$row[cat_id]>$row[name]</option>";	
	}
}
echo "</select></form>";
}
//exit;
////////////////////////////////////////////////////////////////////////////////////////////
if($cat_id > 0 ){
$query="select cont_id,title,a.cat_id,dtl,b.name as cat_name from faqplus a left join faqplus_cat b on a.cat_id=b.cat_id where a.cat_id=$cat_id order by cont_id desc ";
}else{
$query="select cont_id,title,a.cat_id,dtl,b.name as cat_name from faqplus a left join faqplus_cat b on a.cat_id=b.cat_id  order by cont_id desc ";
}

if ($result_set = $connection->query($query)) {
echo "<table class='table table-striped'><tr class=info><th width=20%>Title</th><th>Category</th></tr>";


while($row = $result_set->fetch_array(MYSQLI_ASSOC)){
echo "<tr ><td> <a href='faq-edit.php?cont_id=$row[cont_id]'>$row[title]</a></td><td>$row[cat_name] </td></tr>";
}
echo "</table>";
 $result_set->close();
}
else{
echo $connection->error;
}
//////////////////////////////////////////////////////////////////////////////////////////////  
echo "</div>";
?>
</body>
</html>
