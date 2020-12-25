<?php
include "session.php";
require "check.php";
echo "
<html>
<head>
<title>plus2net.com FAQ script: change password</title>";

require "../head.php";
echo "</head>
<style>
.list-group{
    z-index:10;display:none; 
	position:absolute; 
    color:red;
}
#msg{
position: absolute;
 height:auto;
width:auto;
left:600px;
top:0px;
}
</style>

<body onload=\"document.f1.old_password.focus()\">";

require "../config.php";

require "menu.php";
$msg='';
echo "<div id=msg></div>";
echo "<br><br><br><br><br><br><div class='col-xs-4 col-xs-offset-2' > ";

////////////////////////////////////////////////////////////////////////////////////////////
echo "<form name='f1' id='f1'>
<table class='table'> <input type=hidden name=todo value='change-data'>
<tr class='info'><th colspan=2>Change Password </th></tr>
<tr ><td>Old Password</td><td><div class='col-sm-8'><input type=password name='old_password' class=\"form-control\"></div></td></tr>
<tr ><td>Password</td><td><div class='col-sm-8'><input type=password name='password' class=\"form-control\" id=t1>Minimum 8 </div></td></tr>
<tr ><td>Password ( Retype) </td><td><div class='col-sm-8'><input type=password name='password2' class=\"form-control\"></div></td></tr>
<tr ><td></td><td><input type=button id=b1 value='Submit'></td></tr>

</table></form>
";

echo "</div><div class='col-xs-4' >   <ul  id='d1' class='list-group'>
<li class='list-group-item list-group-item-success'>Password Conditions</li>
<li class='list-group-item' id=d12><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> One Upper Case Letter</li>
<li class='list-group-item' id=d13 ><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> One Lower Case Letter </li>
<li class='list-group-item' id=d14><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> One Special Char </li>
<li class='list-group-item' id=d15><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> One Number</li>
<li class='list-group-item' id=d16><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> Length 8 Char</li>
</ul>
</div>";

?>
<script>
   $(document).ready(function() {
      $("#b1").click(function(event){
var data_str=$('#f1').serialize();
$.post( "changepwck.php", $( "#f1" ).serialize(),function(return_data){
if(return_data.validation_status=='OK'){
$("#f1")[0].reset();
$("#msg").removeClass('alert alert-danger').addClass('alert alert-info');
}else{
$("#msg").removeClass('alert alert-info').addClass('alert alert-danger');

}

 $("#msg").html(return_data.msg);     
$("#msg").show();
setTimeout(function() { $('#msg').fadeOut('slow'); }, 10000);

},"json");
});
/////////////
////////////////////
$('#t1').keyup(function(){
var str=$('#t1').val();
var upper_text= new RegExp('[A-Z]');
var lower_text= new RegExp('[a-z]');
var number_check=new RegExp('[0-9]');
var special_char= new RegExp('[!/\'^£$%&*()}{@#~?><>,|=_+¬-\]');

var flag='T';

if(str.match(upper_text)){
$('#d12').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span> One Upper Case Letter ");
$('#d12').css("color", "green");
}else{$('#d12').css("color", "red");
$('#d12').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span> One Upper Case Letter ");
flag='F';}

if(str.match(lower_text)){
$('#d13').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span> One Lower Case Letter ");
$('#d13').css("color", "green");
}else{$('#d13').css("color", "red");
$('#d13').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span> One Lower Case Letter ");
flag='F';}

if(str.match(special_char)){
$('#d14').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span> One Special Char ");
$('#d14').css("color", "green");
}else{
$('#d14').css("color", "red");
$('#d14').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span> One Special Char ");
flag='F';}

if(str.match(number_check)){
$('#d15').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span> One Number ");
$('#d15').css("color", "green");
}else{
$('#d15').css("color", "red");
$('#d15').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span> One Number ");
flag='F';}


if(str.length>7){
$('#d16').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span> Length 8 Char ");

$('#d16').css("color", "green");
}else{
$('#d16').css("color", "red");
$('#d16').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span> Length 8 Char ");

flag='F';}


if(flag=='T'){
$("#d1").fadeOut();
$('#display_box').css("color","green");
$('#display_box').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span> "+str);
}else{
$("#d1").show();
$('#display_box').css("color","red");
$('#display_box').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span> "+str);
}
});
///////////////////
$('#t1').blur(function(){
$("#d1").fadeOut();
});
///////////
$('#t1').focus(function(){
$("#d1").show();
});
////////////

////////////
});
</script>
</body>
</html>
