<?Php
echo "

<html>

<head>
<title>(Type a title for your page here)</title>";
include "head.php";
echo "</head>

<body >";

require "config.php";
//$cat_id=$_GET['cat_id'];
//$cat_id=1;
$query="select distinct(a.cat_id),a.name from   faqplus b ,faqplus_cat a  where a.cat_id=b.cat_id order by a.name";
//echo $query;
echo "<div class='col-md-12 col-md-offset-1'> ";
require "menu.php";

if ($result_set = $connection->query($query)) {
echo "<table class='table table-striped'>";


while($row = $result_set->fetch_array(MYSQLI_ASSOC)){
echo "<tr ><td> <b><a href='glassory-dtl.php?cat_id=$row[cat_id]&cat_name=".urlencode($row[name])."'>$row[name]</a></b></td>
";
}
echo "</table>";
 $result_set->close();
}
else{
echo $connection->error;
}

echo "</div>";


?>

<center><a href=http://www.plus2net.com rel="nofollow">PHP MySQL Tutorials and free scripts</a></center>


</body>

</html>
