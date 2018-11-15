<?php
session_start();
if (!isset($_SESSION["user_session"]["uid"])){
	header("location:index.php");
} else {
	include 'menu.php';
	mysql_connect("localhost", "root", "");
	}
	 //
if (isset($_POST["id"])){
	$name = $_POST['name'];
	$international = $_POST['international'];
	$national = $_POST['national'];
	$cellular = $_POST['cellular'];
	$internal = $_POST['internal'];
	$pin = $_POST['pin'];
	$id = $_POST['id'];
	$updateext = mysql_query("UPDATE asterisk.pin_codes SET name='$name', pin='$pin', international='$international', national='$national', cellular='$cellular', internal='$internal' WHERE id='$id ';");
}
if (isset($_POST["newid"])){
    print_r($_POST);
	$name = $_POST['name'];
	$pin = $_POST['pin'];
	$international = $_POST['international'];
	$national = $_POST['national'];
	$cellular = $_POST['cellular'];
	$internal = $_POST['internal'];
	$createext = mysql_query("INSERT INTO asterisk.pin_codes (name, pin, international, national, cellular, internal) VALUES ('$name', '$pin','$international', '$national', '$cellular', '$internal');");
}
if (isset($_GET["delete"])){
	$id = $_GET['id'];
	$createext = mysql_query("DELETE FROM asterisk.pin_codes WHERE id='$id';");
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
$result = mysql_query("SELECT * FROM asterisk.pin_codes ORDER by pin LIMIT $start_from, 30");
$result2 = mysql_query("SELECT count(pin) FROM asterisk.pin_codes");
$thisfile = "pincodes.php";

echo "<div class='gradient-style'>";
echo "<table  id='gradient-style' border='0' cellspacing='0' cellpadding='5' >";
echo "<tr style='background:#005; color: #FFF; border-radius:10px;'><td>Name</td><td>Pin</td><td>International</td><td>National</td><td>Cellular</td><td>Internal</td><td>Edit</td><td>Delete</td></td></tr>";
while($row = mysql_fetch_array( $result )) { 
	echo "<tr>";
        echo "<td>".$row["name"]."</td>";
		echo "<td>".$row["pin"]."</td>";
        echo "<td>".$row["international"]."</td>";
	    echo "<td>".$row["national"]."</td>";
        echo "<td>".$row["cellular"]."</td>";
        echo "<td>".$row["internal"]."</td>";
		echo "<td><a href = 'editpin.php?id=".$row["id"]."'>Edit </a></td>";
		echo "<td><a href = 'pincodes.php?id=".$row["id"]."&delete=yes'>Delete </a></td>";
	echo "</tr>";
}
echo "</table>"; 
        echo "<table align='center'><tr><td>";
		        echo "<form action='editpin.php' method='post'>";
                echo "<input type='submit' value='Add Pin Code' />";
                echo "</form>";
				echo "<td>";
		include 'buttons.php';
		echo "</td>";
		echo "</td></tr></table>";
echo "</div>";
?>