<?Php
echo "<!doctype html public \"-//w3c//dtd html 3.2//en\">

<html>

<head>
<title>Frequently Asked Questions FAQ</title>";
include "head.php";
echo "<SCRIPT language=JavaScript>
function reload(form){  
var val=form.cat_id.options[form.cat_id.options.selectedIndex].value;
self.location='faq-cat.php?cat_id=' + val ;
}
</script>

</head>

<body>";

require "config.php";

//////////////////////Drop down list to display Categories ////////
$cat_id=$_GET['cat_id'];
if(strlen($cat_id) >0 and !is_numeric($cat_id)){
echo "Data Error";
exit;
}

echo "
<div class='col-md-12 col-md-offset-1'> ";
require "menu.php";
echo "
<form method=post action=''><select name=cat_id onchange=\"reload(this.form)\" class='form-control' style='width:auto;'><option value='0'>Select Category</option>";

$sql=" select name,cat_id from faqplus_cat order by name";
if($stmt = $connection->query("$sql")){
while ($row = $stmt->fetch_assoc()) {
if($cat_id==$row[cat_id]){echo "<option value=$row[cat_id] selected>$row[name]</option>";}
else{echo "<option value=$row[cat_id]>$row[name]</option>";}
}
}
echo "</select></form>";
///////////////////////////// End of drop down list /////////

//////////////////////////////////List of categories of FAQ /////////////
if ($result_set = $connection->query($sql)) {
echo "<table class='table'>";
while($nt = $result_set->fetch_array(MYSQLI_ASSOC)){
echo "<tr><td><a href=faq-cat.php?cat_id=$nt[cat_id]>$nt[name]</a></td></tr>";
}
echo "</table>";
}
//////////////////////////////////// End of Categories /////////////////
echo "</div>";
///////////////////////// end of all FAQ /////
?>
<center><a href=http://www.plus2net.com rel="nofollow">PHP MySQL Tutorials and free scripts</a></center>


</body>

</html>
