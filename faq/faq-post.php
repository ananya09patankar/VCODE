<?php
include "session.php";
echo "
<html>
<head>
<title>(Type a title for your page here)</title>";

require "../head.php";
echo "<style>#input_div{
	border: 2px solid #f1f1f1;
	min-height:150px;
	width:600px;
}
#msg{
position: absolute;
 height:auto;
width:auto;
left:500px;
top:0px;
}
</style>
</head>

<body >
";

//require "check.php";
require "menu.php";
require "../config.php";
///////////////////////////////////////////////////
echo "<div class='col-md-12 col-md-offset-1'> ";
  echo "<div id=msg></div>
<h2>Add Details </h2>
<form id=f1>";
////////////////
  $q=" select name,cat_id from faqplus_cat order by name" ;
  
  
if($stmt1 = $connection->query("$q")){

echo "<div class='row'><div class='col-md-1'>Category</div><div class='col-md-6'><select name=cat_id class='form-control' style='width:auto;'>";
while ($row1 = $stmt1->fetch_assoc()) {
echo "<option value=$row1[cat_id]>$row1[name]</option>";
}

echo "</select></div></div>";
}
//////////////
  
  

	echo "<div class='row'><div class='col-md-1'>Title</div><div class='col-md-4'><input type=text name=title class='form-control' ></div></div>

	<input type=hidden id=dtl name=dtl>
	
	<div id='wysiwyg' >
    <input type='button' value='OL' onclick=\"document.execCommand('insertOrderedList', false, '');\" />

 <input type='button' value='B' onclick=\"document.execCommand('bold', false, '');\" style='font-weight: bold;' />
   
  <input type='button' value='I' onclick=\"document.execCommand('italic', false, '');\" style='font-style: italic;' />
   
  <input type='button' value='U' onclick=\"document.execCommand('underline', false, '');\" style='text-decoration: underline;'/>
   
  <input type='button' value='delete' onclick=\"document.execCommand('delete', false, '');\" />
<input type='button' value='Left' onclick=\"document.execCommand('justifyleft', false, '');\" />
<input type='button' value='Right' onclick=\"document.execCommand('justifyright', false, '');\" />
<input type='button' value='Center' onclick=\"document.execCommand('justifycenter', false, '');\" />
   
  <input type='button' value='link' id='add_link'\" />
  <input type='button' value='font colour' id='font_color'\" />
<input type='button' value='font Size' id='font_size'\" />
   
  <br><br>
  <div contenteditable='true'  id='input_div' name='input_div'> $row[dtl]   </div>
</div>
<button type='button' class='btn btn-primary' id='b1'>Add / Update</button>
 </form>"; 

//////////////////////////////////////////////////////////////////////////////////////////////  
echo "</div>";
?>
<script>
$(document).ready(function() {
/////////////////

/////////////////////
 $("#add_link").click(function(){
	var url=prompt("Enter page address");
	document.execCommand('createLink', false, url);
my_load();
	})
////////////////
/////////////////////
 $("#font_color").click(function(){
	var f_color=prompt("Enter page address","#");
	document.execCommand('forecolor', false, f_color);
my_load();
	})
////////////////
/////////////////////
 $("#font_size").click(function(){
	var f_size=prompt("Enter font size in number");
	document.execCommand('fontsize', false, f_size);
my_load();
	})
////////////////


 $("#b1").click(function(){
var input_str=$("#input_div").html();
$("#dtl").val(input_str);

	 //alert($( "#f1" ).serialize());
  $.post( "faq-postck.php", $( "#f1" ).serialize(),function(return_data,status){
  if(return_data.validation_status=="NOTOK"){
  $("#msg").removeClass('alert alert-info').addClass('alert alert-danger');
$("#msg").html(return_data.msg);
  }else{
 $("#msg").removeClass('alert alert-danger').addClass('alert alert-info');
 $("#msg").html(return_data.msg);
 $('#f1')[0].reset();
 $('#title').val("");
 $('#input_div').html('');
 $('#dtl').val("");
$(this).closest('form').find("input[type=text], textarea").val("");
$("#f1 input[type='text']").val("");
   }
$("#msg").show();
setTimeout(function() { $('#msg').hide(); }, 10000);
 },"json");  
  
 });

//////
})
</script>

</body>
</html>
