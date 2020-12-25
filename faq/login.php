<?php
include "session.php";
//require "../config.php";
echo "
<html>
<head>
<title>(Type a title for your page here)</title>";

require "../head.php";
echo "</head>
<style>
#msg{
position: relative;
 height:100px;
width:700px;
}
</style>

<body onload=\"document.f1.cat_name.focus()\">";

require "../config.php";

echo "<div class='col-md-12 col-md-offset-1'> ";
$msg=$_GET['msg'];
echo "<div id=msg>$msg</div>";
////////////////////////////////////////////////////////////////////////////////////////////
echo "<h1>FAQ Script SiteAdmin Login</h1>
<form name='myForm' action='loginck.php' method=post><input type=hidden name=todo value='login-data'><input type=hidden name=redirect value='$_GET[redirect]'>
<div class='col-xs-6 col-xs-offset-3' >



<div class=\"form-group\" id='userid_d'>
    <label for=\"inputEmail2\" class=\"col-sm-2 control-label\"> Userid</label>
    <div class=\"col-sm-4\">
      <input type=\"text\" class=\"form-control\" id=\"userid\" name='userid' placeholder=\"Userid\">
    </div>
</div><br><br>";


echo "<div class=\"form-group\" id='password_d'>
  <label for=\"inputEmail3\" class=\"col-sm-2 control-label\">Password</label>
    <div class=\"col-sm-4\">
  <input type=\"password\" class=\"form-control\" id='password' name='password' placeholder=\"password\">
</div></div>
<br>

<div class=\"col-sm-8\"><input type=submit id=\"b1_login_post\" class=\"btn btn-default\" value=Login> </div>        

</div>
</form>
";

//////////////////////////////////////////////////////////////////////////////////////////////  
echo "</div>
<script>
\$(document).ready(function() { 
";
echo "var msg='".$msg."'";

?>
/////////////////


 //$("#msg").removeClass('alert alert-danger').addClass('alert alert-info');
 $("#msg").html(msg);
 setTimeout(function() { $('#msg').html(''); }, 5000);
//////
})
</script>
</body>
</html>
