<?php
include "include/common_func.php";

function user() {
   mysql_connect('localhost','root');
   @mysql_select_db(crm) or die( "Unable to select database");

   $rowsperpage = 100;

   //find page number//
   if(isset($_GET['page']) && is_numeric($_GET['page'])) {
      $page = $_GET['page'];
   }elseif(isset($_POST['page']) && is_numeric($_POST['page'])) {
      $page = $_POST['page'];
   }else{
      $page = 1;
   }
   $offset = ($page - 1) * $rowsperpage;

   $result=mysql_query("SELECT name,username,user_id from users LIMIT $offset, $rowsperpage");

   echo "<table width=100% border='0'>";
   echo "<tr><th align='left'>Name</th><th align='left'>Username</th><th align='left'>Edit</th></tr>";
   while($row = mysql_fetch_array($result))
   {
      echo "<tr>";
      echo "<td align='left'>" . $row[0] . "</td>";
      echo "<td align='left'>" . $row[1] . "</td>";
      echo "<td><a style='background: none' href = 'index.php?mod=modify_user&id=".$row[2]."'><img src=img/edit-icon.png height='20' width='20'></a>&nbsp&nbsp&nbsp";
      echo "<a style='background: none' href = 'index.php?mod=delete_user&id=".$row[2]."'><img class='delete' src=img/delete-icon.png height='20' width='20'></a></td>";
      echo "</tr>";
   }
   echo "</table>";
?>
   <table width="100%">
   <tr>
      <td align="center">
      <?php
      $resultPage = mysql_query("SELECT name,username,user_id from user");
      pagination('index.php?mod=user',$rowsperpage,$resultPage,$page);
      ?>
      </td>
   </tr>
   </table>

<?php
   echo "<form action='index.php?mod=add_user' method='post'>";
   echo "<input class='button' type='submit' value='Add User' />";
   echo "</form>";

   mysql_close();
}

function add_user() {
   mysql_connect('localhost','root');
   @mysql_select_db(crm) or die( "Unable to select database");
?>
<form name="edit" id="edit" action="index.php?mod=add_user_details" method="post" enctype="multipart/form-data" class="myForms" >
   <div style="padding-left: 100px; padding-right: 100px">
   <table style="width: 100%">
   <tr>
      <td>
         <label class="" for="username">Username</label>
      </td>
      <td colspan="4">
         <input type="text" class="" id="username" name="username" value="" required style="width:100%">
      </td>
   </tr>
   <tr>
      <td>
         <label class="" for="secret">Password</label>
      </td>
      <td colspan="4">
         <input type="password" class="" id="secret" name="secret" value="" required style="width:100%">
      </td>
   </tr>
   <tr>
      <td>
         <label class="control-label" for="Name">Name</label>
      </td>
      <td colspan="4">
         <input type="text" class="" id="Name" name="Name" value="" style="width:100%">
      </td>
   </tr>
   <tr>
      <td>
         <label class="" for="extension">Extension</label>
      </td>
      <td colspan="4">
         <input type="text" class="" id="extension" name="extension" value="" style="width:100%">
      </td>
   </tr>
   <tr>
      <td></td>
      <td colspan="4">
         <input class="button" type="submit" value="Add User"</input>
      </td>
   </tr>

</table>
</div>
</form>

<?php
   mysql_close();
}

function add_user_details() {
   mysql_connect('localhost','root');
   @mysql_select_db(crm) or die( "Unable to select database");

   $username = $_POST['username'];
   $secret = md5($_POST['secret']);
   $Name = $_POST['Name'];
   $extension = $_POST['extension'];
   
   mysql_query("INSERT INTO users (username,password,name,extension) VALUES ('$username','$secret','$Name','$extension')");
   mysql_query("INSERT INTO calls (extension) VALUES ('$extension')");

   mysql_close();

   user();
}

function modify_user() {
   mysql_connect('localhost','root');
   @mysql_select_db(crm) or die( "Unable to select database");

   $ID = $_GET['id'];
   $result = mysql_query("SELECT username,password,name,extension FROM users WHERE user_id = '$ID'");

   $row = mysql_fetch_array($result);

?>
<form name="PbxForm" id="PbxForm" action="index.php?mod=modify_user_details" method="post" enctype="multipart/form-data" class="" >
   <input name="id" id="id" value="<?php echo $ID; ?>" type="hidden">
   <div style="padding-left: 100px; padding-right: 100px">
   <table style="width: 100%">
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
         <label class="" for="secret">Password</label>
      </td>
      <td colspan="4">
         <input type="password" class="" id="secret" name="secret" value="" style="width:100%">
      </td>
   </tr>
   <tr>
      <td>
         <label class="control-label" for="Name">Name</label>
      </td>
      <td colspan="4">
         <input type="text" class="" id="Name" name="Name" value="<?php echo $row['name']; ?>" style="width:100%">
      </td>
   </tr>
   <tr>
      <td>
         <label class="" for="extension">Extension</label>
      </td>
      <td colspan="4">
         <input type="hidden" class="" id="oldextension" name="oldextension" value="<?php echo $row['extension']; ?>" style="width:100%">
         <input type="text" class="" id="extension" name="extension" value="<?php echo $row['extension']; ?>" style="width:100%">
      </td>
   </tr>
   <tr>
      <td></td>
      <td colspan="4">
         <input class="button" type="submit" value="Modify User"</input>
      </td>
   </tr>
</table>
</div>
</form>
<?php
   mysql_close();
}

function modify_user_details() {
   mysql_connect('localhost','root');
   @mysql_select_db(crm) or die( "Unable to select database");

   $id = $_POST['id'];
   $username = $_POST['username'];
   $secret = md5($_POST['secret']);
   $Name = $_POST['Name'];
   $extension = $_POST['extension'];
   $oldextension = $_POST['oldextension'];

   mysql_query("UPDATE calls SET extension = '$extension' WHERE extension = '$oldextension'");
      
   if ($_POST['secret'] == "") {
      mysql_query("UPDATE users SET username = '$username',Name = '$Name', extension = '$extension' WHERE user_id  = '$id'");
   } else {
      mysql_query("UPDATE users SET username = '$username',password = '$secret',Name = '$Name', extension = '$extension' WHERE user_id  = '$id'");
   }

   mysql_close();
 
   user();
}

function delete_user() {
   mysql_connect('localhost','root');
   @mysql_select_db(crm) or die( "Unable to select database");

   $id = $_GET['id'];

   $result=mysql_query("SELECT extension FROM users WHERE user_id = '$id'");
   $row=mysql_fetch_array($result);

   mysql_query("DELETE FROM calls WHERE extension = '$row[extension]'");
   mysql_query("DELETE FROM users WHERE user_id = '$id'");

   mysql_close();

   user();
}

?>

