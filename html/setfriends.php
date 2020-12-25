<?php
session_start();
$friend=$_REQUEST["name"];
$_SESSION["chatwith"]=$friend;
?>