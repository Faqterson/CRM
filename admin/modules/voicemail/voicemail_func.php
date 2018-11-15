<?php
include "include/common_func.php";

function voicemail() {
   mysql_connect('localhost','root');
   @mysql_select_db(asterisk) or die( "Unable to select database");

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

   $result=mysql_query("SELECT mailbox,fullname,email,`delete`,uniqueid FROM voicemail LIMIT $offset, $rowsperpage");

   echo "<table width=100%>";
   echo "<tr><th align='left'>Mailbox</th><th align='left'>Full Name</th><th align='left'>Email</th><th align='left'>Delete On Sent</th><th align='left'>Edit</th></tr>";
   while($row = mysql_fetch_array($result))
   {
      echo "<tr>";
      echo "<td align='left'>" . $row[0] . "</td>";
      echo "<td align='left'>" . $row[1] . "</td>";
      echo "<td align='left'>" . $row[2] . "</td>";
      echo "<td align='left'>" . $row[3] . "</td>";
      echo "<td align='left'>";
      echo "<a style='background: none' href='index.php?mod=modify_voicemail&id=" . $row[4] . "'><img src=img/edit-icon.png height='20' width='20'></a>&nbsp&nbsp&nbsp";
      echo "<a style='background: none' href='index.php?mod=delete_voicemail&id=" . $row[4] . "'><img class='delete' src=img/delete-icon.png height='20' width='20'></a></td>";
      echo "</td>";
      echo "</tr>";
   }
   echo "</table>";
?>
   <table width="100%">
   <tr>
      <td align="center">
      <?php
      $resultPage = mysql_query("SELECT mailbox,fullname,email,`delete` FROM voicemail");
      pagination('index.php?mod=voicemail',$rowsperpage,$resultPage,$page);
      ?>
      </td>
   </tr>
   </table>
<?php
   echo "<form action='index.php?mod=add_voicemail' method='post'>";
   echo "<input class='button' type='submit' value='Add Voicemail' />";
   echo "</form>";

   mysql_close();
}

function add_voicemail() {
   mysql_connect('localhost','root');
   @mysql_select_db(asterisk) or die( "Unable to select database");
?>
<form name="edit" id="edit" action="index.php?mod=add_voicemail_details" method="post" enctype="multipart/form-data" class="" >
   <div style="padding-left: 100px; padding-right: 100px">
   <table style="width: 100%">
   <th>Setting</th><th colspan="2">Value</th>
   <tr>
      <td>
         <label class="" for="mailbox">Mailbox Number</label>
      </td>
      <td colspan="4">
         <input type="text" class="" id="mailbox" name="mailbox" value="" required style="width:100%">
      </td>
   </tr>
   <tr>
      <td>
         <label class="" for="fullname">Full Name</label>
      </td>
      <td colspan="4">
         <input type="text" class="" id="fullname" name="fullname" value="" required style="width:100%">
      </td>
   </tr>
   <tr>
      <td>
         <label class="" for="password">Password</label>
      </td>
      <td colspan="4">
         <input type="password" class="" id="password" name="password" value="" required style="width:100%">
      </td>
   </tr>
   <tr>
      <td>
         <label class="control-label" for="email">Email</label>
      </td>
      <td colspan="4">
         <input type="text" class="" id="email" name="email" value="" style="width:100%">
      </td>
   </tr>
   <tr>
      <td>
         <label class="" for="delete">Delete</label>
      </td>
      <td colspan="4">
	 <select name="delete" id="" class="" style="width: 100%" >
            <option value="no">No</option>
            <option value="yes">Yes</option>
         </select>
      </td>
   </tr>
   <tr>
      <td>
         <label class="" for="context">Context</label>
      </td>
      <td colspan="4">
         <input type="text" class="" id="context" name="context" value="default" style="width:100%">
      </td>
   </tr>
   <tr>
      <td></td>
      <td colspan="4">
         <input type="submit" value="Add Voicemail"</input>
      </td>
   </tr>

</table>
</div>
</form>

<?php
   mysql_close();
}

function add_voicemail_details() {
   mysql_connect('localhost','root');
   @mysql_select_db(asterisk) or die( "Unable to select database");

   $mailbox = $_POST['mailbox'];
   $password = $_POST['password'];
   $fullname = $_POST['fullname'];
   $email = $_POST['email'];
   $delete = $_POST['delete'];
   $context = $_POST['context'];

   mysql_query("INSERT INTO voicemail (mailbox,password,fullname,email,`delete`,context) VALUES ('$mailbox','$password','$fullname','$email','$delete','$context')");
 
   mysql_close();

   voicemail();
}

function modify_voicemail() {
   mysql_connect('localhost','root');
   @mysql_select_db(asterisk) or die( "Unable to select database");

   $ID = $_GET['id'];
   $result = mysql_query("SELECT mailbox,password,fullname,email,`delete`,context FROM voicemail WHERE uniqueid = '$ID'");

   $row = mysql_fetch_array($result);

?>
<form name="edit" id="edit" action="index.php?mod=modify_voicemail_details" method="post" enctype="multipart/form-data" class="" >
   <input name="id" id="id" value="<?php echo $ID; ?>" type="hidden">
   <div style="padding-left: 100px; padding-right: 100px">
   <table style="width: 100%">
   <th>Setting</th><th colspan="2">Value</th>
   <tr>
      <td>
         <label class="" for="mailbox">Mailbox Number</label>
      </td>
      <td colspan="4">
         <input type="text" class="" id="mailbox" name="mailbox" value="<?php echo $row[0]; ?>" required style="width:100%">
      </td>
   </tr>
   <tr>
      <td>
         <label class="" for="fullname">Full Name</label>
      </td>
      <td colspan="4">
         <input type="text" class="" id="fullname" name="fullname" value="<?php echo $row[2]; ?>" required style="width:100%">
      </td>
   </tr>
   <tr>
      <td>
         <label class="" for="password">Password</label>
      </td>
      <td colspan="4">
         <input type="password" class="" id="password" name="password" value="<?php echo $row[1]; ?>" required style="width:100%">
      </td>
   </tr>
   <tr>
      <td>
         <label class="control-label" for="email">Email</label>
      </td>
      <td colspan="4">
         <input type="text" class="" id="email" name="email" value="<?php echo $row[3]; ?>" style="width:100%">
      </td>
   </tr>
   <tr>
      <td>
         <label class="" for="delete">Delete</label>
      </td>
      <td colspan="4">
	 <select name="delete" id="" class="" style="width: 100%" >
<?php
            if (isset($row[4])) {
?>
            <option value="<?php echo $row[4]; ?>" ><?php echo $row[4]; ?></option>
<?php
            } else {
?>
            <option value="no">No</option>            
            <option value="yes">Yes</option>            
<?php
            }
            if ($row[4] == "yes") {
?>
            <option value="no">No</option>
<?php
            } elseif ($row[4] == "no") {
?>
            <option value="yes">Yes</option>
<?php
            }
?>
         </select>
      </td>
   </tr>
   <tr>
      <td>
         <label class="" for="context">Context</label>
      </td>
      <td colspan="4">
         <input type="text" class="" id="context" name="context" value="<?php echo $row[5]; ?>" style="width:100%">
      </td>
   </tr>
   <tr>
      <td></td>
      <td colspan="4">
         <input type="submit" value="Modify Voicemail"</input>
      </td>
   </tr>

</table>
</div>
</form>

<?php
   mysql_close();
}

function modify_voicemail_details() {
   mysql_connect('localhost','root');
   @mysql_select_db(asterisk) or die( "Unable to select database");

   $id = $_POST['id'];
   $mailbox = $_POST['mailbox'];
   $password = $_POST['password'];
   $fullname = $_POST['fullname'];
   $email = $_POST['email'];
   $delete = $_POST['delete'];
   $context = $_POST['context'];

   mysql_query("UPDATE voicemail SET mailbox = '$mailbox',password = '$password',fullname = '$fullname',email = '$email',`delete` = '$delete',context = '$context' WHERE uniqueid = '$id'"); 
 
   mysql_close();

   voicemail();
}

function delete_voicemail() {
   mysql_connect('localhost','root');
   @mysql_select_db(asterisk) or die( "Unable to select database");

   $id = $_GET['id'];

   mysql_query("DELETE FROM voicemail WHERE uniqueid = '$id'");

   mysql_close();

   voicemail();
}
?>

