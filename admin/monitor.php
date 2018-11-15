<?php
session_start();
if (!isset($_SESSION["user_session"]["uid"])){
	header("location:index.php");
}else {
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
<body>
<?php
mysql_connect("localhost", "root", "");
$today = date("Y-m-d 00:00:00");
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * 30; 

if (isset($_POST["startday"])) { 
	$startdate = $_POST['startyear']."-".$_POST['startmonth']."-".$_POST['startday']." 00:00:00";
	$enddate = $_POST['endyear']."-".$_POST['endmonth']."-".$_POST['endday']." 00:00:00";
	$result = mysql_query("SELECT * FROM asterisk.cdr where calldate > '$startdate' and calldate < '$enddate' LIMIT $start_from, 30");
	$result2 = mysql_query("SELECT count(calldate) FROM asterisk.cdr where  calldate > '$startdate' and calldate < '$enddate'");
} else { 
	$result = mysql_query("SELECT * FROM asterisk.cdr where calldate > '$today' LIMIT $start_from, 30");
	$result2 = mysql_query("SELECT count(calldate) FROM asterisk.cdr where calldate > '$today'");
}
$thisfile = "monitor.php";

echo "<div class='gradient-style'>";
echo "<table  id='gradient-style' border='0' cellspacing='0' cellpadding='5' >";
echo "<tr style='background:#005; color: #FFF; border-radius:10px;'><td>Call Date</td><td>CLID</td><td>Source</td><td>Destination</td><td>Duration</td><td>Disposition</td><td>Recording</td><td>User Field</td></tr>";
while($row = mysql_fetch_array( $result )) { 
	$clid = str_replace('"', '', $row['clid']);
        $clid = str_replace('<', '', $clid);
	$clid = str_replace('>', '', $clid);
	$clid = str_replace($row["src"], '', $clid);
	if ($clid == ''){ 
		$clid = "No CLID";
	}
	echo "<tr>";
        echo "<td>".$row["calldate"]."</td>";
        echo "<td>".$clid."</td>";
        echo "<td>".$row["src"]."</td>";
        echo "<td>".$row["dst"]."</td>";
	$init = $row["billsec"];
	$hours = floor($init / 3600);
	$minutes = floor(($init / 60) % 60);
	$seconds = $init % 60;
	echo "<td>"./*"$hours:*/"$minutes:$seconds"."</td>";
//      echo "<td>".$row["billsec"]."</td>";
        echo "<td>".$row["disposition"]."</td>";
	if($row["disposition"] == 'ANSWERED'){
        	echo "<td><a href=monitor/".$row["uniqueid"].".WAV>Recording</a>"."</td>";
	} else {
		echo "<td>Not Applicable</td>";
	}
        echo "<td>".$row["userfield"]."</td>";
	echo "</tr>";
}
echo "</table>"; 
        echo "<table align='center'><tr><td>";
		include 'buttons.php';
		echo "</td></tr></table>";
		echo "<table  id='menutable'><tr><td>";
		include 'dateranges.php';
		echo "</td></tr></table>";
echo "</div>";
?>
