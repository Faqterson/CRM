<?php
session_start();
if (!isset($_SESSION["user_session"]["uid"])){
	header("location:index.php");
} else {
	include 'menu.php';
	mysql_connect("localhost", "root", "");
	}
	 //print_r($_POST);
if (isset($_POST["id"])){
	$secret = $_POST['secret'];
	$extension = $_POST['extension'];
	$clid = $_POST['clid'];
	$mac = $_POST['mac'];
	$callforwarddst = $_POST['callforwarddst'];
	$callforwardbusydst = $_POST['callforwardbusydst'];
	$dnd = $_POST['dnd'];
	$callwaiting = $_POST['callwaiting'];
	$pickupgroup = $_POST['pickupgroup'];
	$callgroup = $_POST['callgroup'];
	$registrar = $_POST['registrar'];
	$ipaddr = $_POST['ipaddr'];
	$international = $_POST['international'];
	$national = $_POST['national'];
	$cellular = $_POST['cellular'];
	$internal = $_POST['internal'];
	$requirepin = $_POST['requirepin'];
	$id = $_POST['id'];
	$updateext = mysql_query("UPDATE asterisk.ext_features SET extension='$extension', secret='$secret', clid='$clid', mac='$mac', callforwarddst='$callforwarddst', callforwardbusydst='$callforwardbusydst', dnd='$dnd', callwaiting='$callwaiting', international='$international', national='$national', cellular='$cellular', internal='$internal', requirepin='$requirepin', pickupgroup='$pickupgroup', callgroup='$callgroup', registrar='$registrar', ipaddr='$ipaddr' WHERE id='$id ';");
}
if (isset($_POST["newid"])){
	$secret = $_POST['secret'];
	$extension = $_POST['extension'];
	$clid = $_POST['clid'];
	$mac = $_POST['mac'];
	$callforwarddst = $_POST['callforwarddst'];
	$callforwardbusydst = $_POST['callforwardbusydst'];
	$dnd = $_POST['dnd'];
	$callwaiting = $_POST['callwaiting'];
	$pickupgroup = $_POST['pickupgroup'];
	$callgroup = $_POST['callgroup'];
	$registrar = $_POST['registrar'];
	$ipaddr = $_POST['ipaddr'];
	$international = $_POST['international'];
	$national = $_POST['national'];
	$cellular = $_POST['cellular'];
	$internal = $_POST['internal'];
	$requirepin = $_POST['requirepin'];	
	$createext = mysql_query("INSERT INTO asterisk.ext_features (extension, secret, clid, mac, callforwarddst, callforwardbusydst, dnd, callwaiting, international, national, cellular, internal, requirepin, pickupgroup, callgroup, registrar, ipaddr) VALUES ('$extension', '$secret','$clid', '$mac', '$callforwarddst', '$callforwardbusydst', '$dnd', '$callwaiting', '$international', '$national', '$cellular', '$internal', '$requirepin', '$pickupgroup', '$callgroup', '$registrar', '$ipaddr');");
}
if (isset($_GET["delete"])){
	$id = $_GET['id'];
	$createext = mysql_query("DELETE FROM asterisk.ext_features WHERE id='$id';");
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
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * 30; 
$result = mysql_query("SELECT * FROM asterisk.ext_features ORDER by extension LIMIT $start_from, 30");
$result2 = mysql_query("SELECT count(extension) FROM asterisk.ext_features");
$thisfile = "sippeers.php";

echo "<div class='gradient-style'>";
echo "<table  id='gradient-style' border='0' cellspacing='0' cellpadding='5' >";
echo "<tr style='background:#005; color: #FFF; border-radius:10px;'><td>Extensions</td><td>Clid</td><td>Phone Hardware</td><td>CF</td><td>CF Busy</td><td>DND</td><td>Pickup group</td><td>Call Group</td><td>Registrar</td><td>IP Address</td><td>Edit</td><td>Delete</td></td></tr>";
while($row = mysql_fetch_array( $result )) { 
	echo "<tr>";
        echo "<td>".$row["extension"]."</td>";
		echo "<td>".$row["clid"]."</td>";
        echo "<td>".$row["mac"]."</td>";
        echo "<td>".$row["callforwarddst"]."</td>";
        echo "<td>".$row["callforwardbusydst"]."</td>";
		echo "<td>".$row["dnd"]."</td>";
		echo "<td>".$row["pickupgroup"]."</td>";
		echo "<td>".$row["callgroup"]."</td>";
		echo "<td>".$row["registrar"]."</td>";
		echo "<td>".$row["ipaddr"]."</td>";
		echo "<td><a href = 'editext.php?id=".$row["id"]."'>Edit </a></td>";
		echo "<td><a href = 'sippeers.php?id=".$row["id"]."&delete=yes'>Delete </a></td>";
	echo "</tr>";
}
echo "</table>"; 
        echo "<table align='center'><tr><td>";
		        echo "<form action='editext.php' method='post'>";
                echo "<input type='submit' value='Add Extension' />";
                echo "</form>";
				echo "<td>";
		include 'buttons.php';
		echo "</td>";
		echo "</td></tr></table>";
echo "</div>";
?>