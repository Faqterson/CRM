<?php
session_start();
if (!isset($_SESSION["user_session"]["uid"])){
	header("location:index.php");
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
<body>
<?php
mysql_connect("localhost", "root", "");
$today = date("Y-m-d 00:00:00");
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * 30; 
if (!isset($_GET["id"])){
echo "<table  id='gradient-style-login' border='0' cellspacing='0' cellpadding='5' >";
echo "<tr style='background:#005; color: #FFF; border-radius:10px;'><td>Setting</td><td>Value</td></tr>";
echo "<form action='pincodes.php' method='post'>";
        echo "<tr><td>Pin</td><td><input type='text' name='pin' </input></td></tr>";
		echo "<tr><td>Name</td><td><input type='text' name='name' value='Username'</input></td></tr>";
		echo "<tr><td>Can call International</td><td><select name='international'>";
			if ($row["international"] != 'yes'){
				echo "<option selected value='yes'>Yes</option> <option value='no'>No</option></select></td></tr>";
			} else { 
				echo "<option value='yes'>Yes</option> <option selected  value='no'>No</option></select></td></tr>";
			}
				echo "<tr><td>Can call National</td><td><select name='national'>";
			if ($row["national"] != 'yes'){
				echo "<option selected value='yes'>Yes</option> <option value='no'>No</option></select></td></tr>";
			} else { 
				echo "<option value='yes'>Yes</option> <option selected  value='no'>No</option></select></td></tr>";
			}
				echo "<tr><td>Can call Cellular</td><td><select name='cellular'>";
			if ($row["cellular"] != 'yes'){
				echo "<option selected value='yes'>Yes</option> <option value='no'>No</option></select></td></tr>";
			} else { 
				echo "<option value='yes'>Yes</option> <option selected  value='no'>No</option></select></td></tr>";
			}
			echo "<tr><td>Can call Internal</td><td><select name='internal'>";
			if ($row["internal"] != 'yes'){
				echo "<option selected value='yes'>Yes</option> <option value='no'>No</option></select></td></tr>";
			} else { 
				echo "<option value='yes'>Yes</option> <option selected  value='no'>No</option></select></td></tr>";
			}
		echo "<tr><td></td><td><input type='hidden' name='newid' value='yes'</input><input type='submit' value='Save'> </input> </td></tr> </form>";
	echo "</tr>";

	} else {
$result = mysql_query("SELECT * FROM asterisk.pin_codes WHERE id = ".$_GET['id']);
echo "<table  id='gradient-style-login' border='0' cellspacing='0' cellpadding='5' >";
echo "<tr style='background:#005; color: #FFF; border-radius:10px;'><td>Setting</td><td>Value</td></tr>";
echo "<form action='pincodes.php' method='post'>";
while($row = mysql_fetch_array( $result )) { 
		echo "<tr><td>Name</td><td><input type='text' name='name' value='".$row["name"]."'</input></td></tr>";
		echo "<tr><td>Pin</td><td><input type='text' name='secret' value='".$row["pin"]."'</input></td></tr>";
		echo "<tr><td>Can call International</td><td><select name='international'>";
			if ($row["international"] == 'yes'){
				echo "<option selected value='yes'>Yes</option> <option value='no'>No</option></select></td></tr>";
			} else { 
				echo "<option value='yes'>Yes</option> <option selected  value='no'>No</option></select></td></tr>";
			}
				echo "<tr><td>Can call National</td><td><select name='national'>";
			if ($row["national"] == 'yes'){
				echo "<option selected value='yes'>Yes</option> <option value='no'>No</option></select></td></tr>";
			} else { 
				echo "<option value='yes'>Yes</option> <option selected  value='no'>No</option></select></td></tr>";
			}
				echo "<tr><td>Can call Cellular</td><td><select name='cellular'>";
			if ($row["cellular"] == 'yes'){
				echo "<option selected value='yes'>Yes</option> <option value='no'>No</option></select></td></tr>";
			} else { 
				echo "<option value='yes'>Yes</option> <option selected  value='no'>No</option></select></td></tr>";
			}
			echo "<tr><td>Can call Internal</td><td><select name='internal'>";
			if ($row["internal"] == 'yes'){
				echo "<option selected value='yes'>Yes</option> <option value='no'>No</option></select></td></tr>";
			} else { 
				echo "<option value='yes'>Yes</option> <option selected  value='no'>No</option></select></td></tr>";
			}
		echo "<tr><td></td><td><input type='hidden' name='id' value='".$row["id"]."'</input><input type='submit' value='Save'> </input> </td></tr> </form>";
	echo "</tr>";
}
}
?>