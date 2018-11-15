<?php
   $connect = mysql_connect('localhost','root','');
   $db = mysql_select_db('crm',$connect);
   
   session_start();

   $user_check = $_SESSION["user_session"]["uid"];

   $sql = sprintf("SELECT user_id FROM admin_users WHERE user_id = '$user_check'");
   $result  = mysql_query($sql) or die('Error, query failed: ' . $sql . " : " . $HOST);
   $row = mysql_fetch_array($result);

   $login_session = $row['user_id'];

   if( !isset($_SESSION["user_session"]["uid"]) || !isset($login_session)){
      header("location:login.php");
   }

?>

