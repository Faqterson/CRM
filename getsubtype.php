<?php
mysql_connect('localhost','root');
@mysql_select_db(crm) or die( "Unable to select database");

$s1type = intval($_GET['s1type']);

$result=mysql_query("SELECT uniqueid,name from sub_query_type WHERE qtype_id = '$s1type'");

echo "<option value='' >== choose one ==</option>";
while($row = mysql_fetch_array($result))
{
   echo "<option value='$row[0]'>$row[1]</option>";
}
?>
