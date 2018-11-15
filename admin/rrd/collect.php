#!/usr/bin/php
<?php

getconcurcalls();

function getconcurcalls() {
   mysql_connect("localhost", "root", "");

   $result = mysql_query("SELECT count(uniqueid) from asterisk.cdr where calldate >= DATE_SUB(now(), interval 5 minute) AND disposition = 'ANSWERED'");
   $row = mysql_fetch_array($result);

   echo "/usr/bin/rrdtool update /usr/local/rrd/concurcalls.rrd N:".$row[0]."\n";

}

?>
