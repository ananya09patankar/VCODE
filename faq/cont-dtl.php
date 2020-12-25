<?Php
echo "

<html>

<head>
<title>(Type a title for your page here)</title>";
include "../head.php";
echo "</head>

<body >";

require "config.php";
$cat_id=$_GET['cat_id'];
$cat_name=urldecode($_GET['cat_name']);
echo "<h1>$cat_name</h1>";
//$cat_id=1;
$query="select cont_id, title, dtl from    faqplus  where cat_id=? order by title";
//echo $query;
if($stmt = $connection->prepare($query)){
  $stmt->bind_param('i',$cat_id);
  $stmt->execute();
   
   $result = $stmt->get_result();
   //echo "No of records : ".$result->num_rows."<br>";
   echo "<div id='accordion'>";
    while ($row = $result->fetch_assoc()) {
	echo "<h3>$row[title]</h3>
	<div>$row[dtl]</div>";	
	}
echo "</div>";	
}else{
  echo $connection->error;
}
?>

<center><a href=http://www.plus2net.com rel="nofollow">PHP MySQL Tutorials and free scripts</a></center>

<script>
$(document).ready(function() {
$( '#accordion' ).accordion();
})
</script>
</body>

</html>
