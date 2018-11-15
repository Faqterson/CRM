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
$result = mysql_query("SELECT MAX(extension) FROM asterisk.ext_features");	
$row = mysql_fetch_row($result);
$nextextension = $row[0] + 1;
$ip = "192.168.1.".$nextextension;







echo "<table  id='gradient-style-login' border='0' cellspacing='0' cellpadding='5' >";
echo "<tr style='background:#005; color: #FFF; border-radius:10px;'><td>Setting</td><td>Value</td></tr>";
echo "<form action='sippeers.php' method='post'>";
        echo "<tr><td>Extension</td><td><input type='text' name='extension' value='".$nextextension."'</input></td></tr>";
		echo "<tr><td>Name</td><td><input type='text' name='clid' value='Username'</input></td></tr>";
		echo "<tr><td>Password</td><td><input type='password' name='secret' value='".$row["secret"]."'</input></td></tr>";
        echo "<tr><td>Phone Hardware</td><td><input type='text' name='mac' value='".$row["mac"]."'</input></td></tr>";
        echo "<tr><td>Call Forward Destination</td><td><input type='text' name='callforwarddst' value='0'</input></td></tr>";
        echo "<tr><td>Call Forward Destination on Busy</td><td><input type='text' name='callforwardbusydst' value='0'</input></td></tr>";
		echo "<tr><td>Registration Server</td><td><input type='text' name='registrar' value='".$_SERVER['SERVER_ADDR']."'</input></td></tr>";
		echo "<tr><td>Hardware IP Adress</td><td><input type='text' name='ipaddr' value='".$ip."'</input></td></tr>";
		echo "<tr><td>Pickup Group</td><td><input type='text' name='pickupgroup' value='1'</input></td></tr>";
		echo "<tr><td>Call Group</td><td><input type='text' name='callgroup' value='1'</input></td></tr>";
		echo "<tr><td>Do Not Disturb</td><td><select name='dnd'>";
		if ($row["dnd"] == 'yes'){
				echo "<option selected value='yes'>Yes</option> <option value='no'>No</option></select></td></tr>";
			} else { 
				echo "<option value='yes'>Yes</option> <option selected  value='no'>No</option></select></td></tr>";
			}
		echo "<tr><td>Call Waiting</td><td><select name='callwaiting'>";
			if ($row["callwaiting"] != 'yes'){
				echo "<option selected value='yes'>Yes</option> <option value='no'>No</option></select></td></tr>";
			} else { 
				echo "<option value='yes'>Yes</option> <option selected  value='no'>No</option></select></td></tr>";
			}
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
		echo "<tr><td>Require Pin?</td><td><select name='requirepin'>";
			if ($row["requirepin"] == 'yes'){
				echo "<option selected value='yes'>Yes</option> <option value='no'>No</option></select></td></tr>";
			} else { 
				echo "<option value='yes'>Yes</option> <option selected  value='no'>No</option></select></td></tr>";
			}
		echo "<tr><td></td><td><input type='hidden' name='newid' value='yes'</input><input type='submit' value='Save'> </input> </td></tr> </form>";
	echo "</tr>";













	
	
	
	} else {
$result = mysql_query("SELECT * FROM asterisk.ext_features WHERE id = ".$_GET['id']);
echo "<table  id='gradient-style-login' border='0' cellspacing='0' cellpadding='5' >";
echo "<tr style='background:#005; color: #FFF; border-radius:10px;'><td>Setting</td><td>Value</td></tr>";
echo "<form action='sippeers.php' method='post'>";
while($row = mysql_fetch_array( $result )) { 
        echo "<tr><td>Extension</td><td><input type='text' name='extension' value='".$row["extension"]."'</input></td></tr>";
		echo "<tr><td>Name</td><td><input type='text' name='clid' value='".$row["clid"]."'</input></td></tr>";
		echo "<tr><td>Password</td><td><input type='password' name='secret' value='".$row["secret"]."'</input></td></tr>";
        echo "<tr><td>Phone Hardware</td><td><input type='text' name='mac' value='".$row["mac"]."'</input></td></tr>";
        echo "<tr><td>Call Forward Destination</td><td><input type='text' name='callforwarddst' value='".$row["callforwarddst"]."'</input></td></tr>";
        echo "<tr><td>Call Forward Destination on Busy</td><td><input type='text' name='callforwardbusydst' value='".$row["callforwardbusydst"]."'</input></td></tr>";
		echo "<tr><td>Registration Server</td><td><input type='text' name='registrar' value='".$row["registrar"]."'</input></td></tr>";
		echo "<tr><td>Hardware IP Adress</td><td><input type='text' name='ipaddr' value='".$row["ipaddr"]."'</input></td></tr>";
		echo "<tr><td>Pickup Group</td><td><input type='text' name='pickupgroup' value='".$row["pickupgroup"]."'</input></td></tr>";
		echo "<tr><td>Call Group</td><td><input type='text' name='callgroup' value='".$row["callgroup"]."'</input></td></tr>";
		echo "<tr><td>Do Not Disturb</td><td><select name='dnd'>";
		if ($row["dnd"] == 'yes'){
				echo "<option selected value='yes'>Yes</option> <option value='no'>No</option></select></td></tr>";
			} else { 
				echo "<option value='yes'>Yes</option> <option selected  value='no'>No</option></select></td></tr>";
			}
		echo "<tr><td>Call Waiting</td><td><select name='callwaiting'>";
			if ($row["callwaiting"] == 'yes'){
				echo "<option selected value='yes'>Yes</option> <option value='no'>No</option></select></td></tr>";
			} else { 
				echo "<option value='yes'>Yes</option> <option selected  value='no'>No</option></select></td></tr>";
			}
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
		echo "<tr><td>Require Pin?</td><td><select name='requirepin'>";
			if ($row["requirepin"] == 'yes'){
				echo "<option selected value='yes'>Yes</option> <option value='no'>No</option></select></td></tr>";
			} else { 
				echo "<option value='yes'>Yes</option> <option selected  value='no'>No</option></select></td></tr>";
			}
		echo "<tr><td></td><td><input type='hidden' name='id' value='".$row["id"]."'</input><input type='submit' value='Save'> </input> </td></tr> </form>";
	echo "</tr>";
}
}
?>