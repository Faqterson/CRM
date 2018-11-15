<?php

function asterisk() {
   mysql_connect('localhost','root');
   @mysql_select_db(crm) or die( "Unable to select database");

   $result=mysql_query("SELECT * FROM asterisk");
   $row = mysql_fetch_array($result);   
?>
<form name="edit" id="edit" action="index.php?mod=add_asterisk" method="post" enctype="multipart/form-data" class="myForms" >
   <input type="hidden" id="uniqueid" name="uniqueid" value="<?php echo $row['uniqueid']; ?>">
   <div style="padding-left: 100px; padding-right: 100px">
   <table style="width: 100%">
   <tr>
      <td>
         <label class="control-label" for="amiip">AMI IP Address</label>
      </td>
      <td colspan="4">
         <input type="text" class="" id="amiip" name="amiip" value="<?php echo $row['amiip']; ?>" style="width:100%">
      </td>
   </tr>
   <tr>
      <td>
         <label class="" for="username">Username</label>
      </td>
      <td colspan="4">
         <input type="text" class="" id="username" name="username" value="<?php echo $row['username']; ?>" required style="width:100%">
      </td>
   </tr>
   <tr>
      <td>
         <label class="" for="password">Password</label>
      </td>
      <td colspan="4">
         <input type="password" class="" id="password" name="password" value="<?php echo $row['password']; ?>" required style="width:100%">
      </td>
   </tr>
   <tr>
      <td></td>
      <td colspan="4">
         <input class="button" type="submit" value="Submit"</input>
      </td>
   </tr>

</table>
</div>
</form>

<?php
   mysql_close();
}

function add_asterisk() {
   mysql_connect('localhost','root');
   @mysql_select_db(crm) or die( "Unable to select database");

   $uniqueid = $_POST['uniqueid'];
   $amiip = $_POST['amiip'];
   $username = $_POST['username'];
   $password = $_POST['password'];
   
   mysql_query("REPLACE INTO asterisk (uniqueid,amiip,username,password) VALUES ('$uniqueid','$amiip','$username','$password')");

   mysql_close();

   asterisk();
}
?>

