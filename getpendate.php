<?php
mysql_connect('localhost','root');
@mysql_select_db(crm) or die( "Unable to select database");

$s1type = intval($_GET['s1type']);

$curDate = date("Y-m-d h:i:s");

$result=mysql_query("SELECT uniqueid,res_date from sub_query_type WHERE uniqueid = '$s1type'");

while($row = mysql_fetch_array($result))
{
   echo date('Y-m-d H:i:s', strtotime($curDate . " +" . $row['1']." hours"));
}
?>
