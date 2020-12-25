<?php
include "session.php";
require "check.php";
echo "
<html>
<head>
<title>(Type a title for your page here)</title>";

require "../head.php";
echo "<style>#input_div{
	border: 2px solid #f1f1f1;
	min-height:150px;
}
#msg{
position: absolute;
 height:auto;
width:auto;
left:600px;
top:0px;
}</style>
</head>

<body >
";

require "../config.php";

require "menu.php";
echo "<div id=msg></div>";
echo "<div class='col-md-12 col-md-offset-1'> ";
$cont_id=@$_GET['cont_id'];
if(strlen($cont_id) >0 and !is_numeric($cont_id)){
echo "Data Error";
exit;
}


$msg=@$_GET['msg'];

echo "<h2>Update Details</h2>";
///////////////////////////////////////////////////
$query=" SELECT cont_id,a.cat_id,title,dtl from faqplus a where cont_id='$cont_id' ";

if($stmt = $connection->query("$query")){
  $row = $stmt->fetch_assoc();
  echo "<form id=f1>";
////////////////
  $q=" select name,cat_id from faqplus_cat order by name" ;
if($stmt1 = $connection->query("$q")){

echo "<div class='row'><div class='col-md-1'>Category</div><div class='col-md-6'><select name=cat_id id=cat_id class='form-control' style='width:auto;'>";
while ($row1 = $stmt1->fetch_assoc()) {
	if($row1[cat_id]==$row[cat_id]){
	echo "<option value=$row1[cat_id] selected>$row1[name]</option>";
	}else{echo "<option value=$row1[cat_id]>$row1[name]</option>";
}
}
echo "</select></div></div>";
}
//////////////
  
  

	echo "<input type=hidden name=cont_id id=cont_id value=$row[cont_id]> 
<div class='row'><div class='col-md-1'>Title</div><div class='col-md-6'><input type=text name=title value='$row[title]' class='form-control' ></div></div>

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
}else{
echo $connection->error;
}
echo "
<button id='b2'>Delete this Details</button>
<div id='dialog-window'></div>
<div id=display></div>
";
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
	})
////////////////
/////////////////////
 $("#font_color").click(function(){
	var f_color=prompt("Enter page address","#");
	document.execCommand('forecolor', false, f_color);

	})
////////////////
/////////////////////
 $("#font_size").click(function(){
	var f_size=prompt("Enter font size in number");
	document.execCommand('fontsize', false, f_size);

	})
////////////////


 $("#b1").click(function(){
var input_str=$("#input_div").html();
$("#dtl").val(input_str);

	 //alert($( "#f1" ).serialize());
  $.post( "faq-editck.php", $( "#f1" ).serialize(),function(return_data,status){
  if(return_data.validation_status=="NOTOK"){
  $("#msg").removeClass('alert alert-info').addClass('alert alert-danger');
$('#f1').find("input[type=text], textarea").val(""); 
  }else{
  $("#msg").removeClass('alert alert-danger').addClass('alert alert-info');
 // location.reload();        
   }
   $("#msg").html(return_data.msg);
$("#msg").show();

setTimeout(function() { $('#msg').fadeOut('slow'); }, 10000);
 },"json");  
  
 });

//////
$("#dialog-window").dialog({
        resizable: false,
        autoOpen: false,
        modal: true,
        title: "Confirm Box",
        height: 250,
        width: 400,
        buttons: {
            "Yes": function () {
                $(this).dialog('close');
                callback(true);
            },
                "No": function () {
                $(this).dialog('close');
                callback(false);
            }
        }
 });
//////////////////
function callback(value) {
 if (value) {
	 
var cont_id=$('#cont_id').val();
//alert(cont_id);
  $('#display').load("faq-deleteck.php?cont_id="+cont_id)
  var cat_id=$('#cat_id').val()
  window.location = "faq-list.php?cat_id="+cat_id;
 }// end of if (value )
else{
// code to execute if false
$('#display').html('You clicked No button') 
}
} // end of callback function 
///////////////////
$("#b2").click(function(){
$("#dialog-window").html("Confirm to Submit ...");
$( "#dialog-window" ).dialog( "open" );
})
////////////////////////
///////
})
</script>
</body>
</html>
