<?Php
echo "<!doctype html public \"-//w3c//dtd html 3.2//en\">

<html>
<head>
<title>Frequently Asked Questions FAQ</title>";

include "head.php";
echo "

<SCRIPT language=JavaScript>
function reload(form){  
var val=form.cat_id.options[form.cat_id.options.selectedIndex].value;
self.location='faq.php?cat_id=' + val ;
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

/////////// List of all FAQ ///////
echo "<div class='col-md-12 col-md-offset-1'> ";
require "menu.php";


////////// End of all FAQ /////////////
$query="select cont_id,title from faqplus where cat_id=$cat_id order by cont_id desc ";

if ($result_set = $connection->query($query)) {

echo "<table class='table'>";
while($nt = $result_set->fetch_array(MYSQLI_ASSOC)){
echo "<tr><td> <b><a href=#$nt[cont_id]>$nt[title]</a></b></td></tr>";
}
echo "</table>";
}

////////////////////////////
$query="select cont_id,title,dtl from faqplus where  faqplus.cat_id=$cat_id order by cont_id desc ";

if ($result_set = $connection->query($query)) {

echo "<table class='table'>";
while($nt = $result_set->fetch_array(MYSQLI_ASSOC)){
echo "<tr id=$nt[cont_id]><td><b>$nt[title]</b>:</td><td>  <a href=#TOP>Back to Top </td></tr>
<tr ><td colspan=2>$nt[dtl]</td></tr>
";
}
echo "</table>";
}

echo "</div>";
/////////////////////////
?>
<center><a href=http://www.plus2net.com rel="nofollow">PHP MySQL Tutorials and free scripts</a></center>


</body>

</html>
