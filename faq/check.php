<?Php
if($_SESSION['userid'] != 'siteadmin'){
echo " Not authorized ";
exit; 	
}
?>