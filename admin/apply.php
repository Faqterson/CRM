<?php
session_start();
if (!isset($_SESSION["user_session"]["uid"])){
	header("location:index.php");
} else {
	include 'menu.php';
	}
?>
	<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Logic Gate Systems</title>
<style type="text/css">
<!--
@import url("style.css");
-->
</style>
</head>
<?php
	echo exec('sudo /usr/local/logicgate/applyconfig');
	echo "<table  id='gradient-style-login' border='0' cellspacing='0' cellpadding='5' >";
	echo "<tr><td>Settings applied</td><td><a href='sippeers.php'><<<--- Go Back!</a></td></tr>";
	echo "";
?>