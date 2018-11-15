<?php
session_start();
$connect = mysql_connect('localhost','root','');
$db = mysql_select_db('crm',$connect);

   session_start();
   $sql = sprintf("SELECT user_id, name " .
                  " FROM admin_users WHERE (username='%s' AND password='%s')",
                    mysql_real_escape_string($_POST["username"]),
                    md5(mysql_real_escape_string($_POST["password"]))
   );
   $result  = mysql_query($sql) or die('Error, query failed: ' . $sql . " : " . $HOST);
   $rst = mysql_fetch_array($result, MYSQL_ASSOC);

   if($rst["user_id"] != null){
      $_SESSION["user_session"]["uid"] = $rst["user_id"];
      $_SESSION["user_session"]["name"] = $rst["name"];
      header("location:index.php");
   } 

?>
<!doctype html>
<html class="touch-styles">
<head>
   <meta charset="utf-8" />
   <title>Desktop Group: Customized VoIP solutions, Software and Hardware providers</title>
   <link rel="stylesheet" type="text/css" href="css/site.css"/>
</head>
<body>
<div class='login' align='center'>
<form action='' method='post'>
<table  align="center" width="200" >
   <th colspan="2">Desktop Network Solutions</th>
   <tr>
      <td>Username</td>
      <td><input type="text" name="username" style="width:260px;"></td>
   </tr>
   <tr>
      <td>Password</td>
      <td><input type="password" name="password" style="width:260px;"></td>
   </tr>
   <tr>
      <td align="center" colspan="2" style="text-align:center; border-bottom: none">
         <input class='button' type="submit" value="Login"/>
      </td>
   </tr>
</table>
</form>
</div>
</body>

