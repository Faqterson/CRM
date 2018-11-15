<?php

include "include/common_func.php";

function type() {
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

   $result=mysql_query("SELECT query_type.name,count(sub_query_type.name),query_type.uniqueid FROM query_type LEFT JOIN sub_query_type ON (query_type.uniqueid = qtype_id) group by query_type.name LIMIT $offset, $rowsperpage");

   echo "<table width=100%>";
   echo "<tr><th align='left'>Name</th><th align='left'>Total Sub Types</th><th align='left'>Edit</th></tr>";
   while($row = mysql_fetch_array($result))
   {
      echo "<tr>";
      echo "<td align='left'>" . $row[0] . "</td>";
      echo "<td align='left'>" . $row[1] . "</td>";
      echo "<td align='left'>";
      echo "<a style='background: none' href='index.php?mod=modify_type&id=" . $row[2] . "'><img src=img/edit-icon.png height='20' width='20'></a>&nbsp&nbsp&nbsp";
      echo "<a style='background: none' href='index.php?mod=delete_type&id=" . $row[2] . "'><img class='delete' src=img/delete-icon.png height='20' width='20'></a></td>";
      echo "</td>";
      echo "</tr>";
   }
   echo "</table>";
?>
   <table width="100%">
   <tr>
      <td align="center">
      <?php
      $resultPage = mysql_query("SELECT name FROM query_type");
      pagination('index.php?mod=type',$rowsperpage,$resultPage,$page);
      ?>
      </td>
   </tr>
   </table>
<?php
   echo "<form action='index.php?mod=add_type' method='post'>";
   echo "<input class='button' type='submit' value='Add Type' />";
   echo "</form>";

   mysql_close();
}

function add_type() {
   mysql_connect('localhost','root');
   @mysql_select_db(crm) or die( "Unable to select database");
?>
<form name="edit" id="edit" action="index.php?mod=add_type_details" method="post" enctype="multipart/form-data" class="" >
   <div style="padding-left: 100px; padding-right: 100px">
   <table style="width: 100%" id='TextBoxesGroup'>
   <th>Setting</th><th colspan="2">Value</th>
   <tr>
      <td>
         <label class="" for="name">Name</label>
      </td>
      <td colspan="4">
         <input type="text" class="" id="name" name="name" value="" required style="width:100%">
      </td>
   </tr>
   <tr>
      <td colspan="2">
         <a id="add_sub_cat" href="#">Add Sub Type</a> 
      </td>
   </tr>
</table>
<div>
   <input class= "button" type="submit" value="Add type"</input>
</div>
</div>
</form>

<?php
   mysql_close();
}

function add_type_details() {
   mysql_connect('localhost','root');
   @mysql_select_db(crm) or die( "Unable to select database");

   $name = $_POST['name'];

   mysql_query("INSERT INTO query_type (name) VALUES ('$name')");

   $result = mysql_query("SELECT uniqueid from query_type WHERE name = '$name'");
   $row = mysql_fetch_array($result);

   foreach ($_POST['sub_cat'] as $key => $value) {
      $subcat[$key]=$value;
   }
 
   foreach ($subcat as $key => $value) {
      $res_date = $_POST['res_date'.$key];
      if ($value != "") {
         mysql_query("INSERT INTO sub_query_type (qtype_id,name,res_date) VALUES ('$row[0]','$value','$res_date')");
      }
   }
 
   mysql_close();

   type();
}

function modify_type() {
   mysql_connect('localhost','root');
   @mysql_select_db(crm) or die( "Unable to select database");
   
   $id = $_GET['id'];

   $result = mysql_query("SELECT name from query_type WHERE uniqueid = '$id'");
   $row = mysql_fetch_array($result);
?>
<form name="edit" id="edit" action="index.php?mod=modify_type_details" method="post" enctype="multipart/form-data" class="" >
   <div style="padding-left: 100px; padding-right: 100px">
   <table style="width: 100%" id='TextBoxesGroup'>
   <th>Setting</th><th colspan="2">Value</th>
   <tr>
      <td>
         <label class="" for="name">Name</label>
      </td>
      <td colspan="4">
         <input type="text" class="" id="name" name="name" value="<?php echo $row['name']; ?>" required style="width:100%">
      </td>
   </tr>
   <tr>
      <td colspan="2">
         <a id="modify_sub_cat" href="#">Add Sub Type</a> 
      </td>
   </tr>
<?php
   $subresult = mysql_query("select uniqueid,name,res_date from sub_query_type WHERE qtype_id = '$id'");
   $counter=1;
   while ($subrow = mysql_fetch_array($subresult)) {
?>   
   <tr>
      <td><?php echo $counter ?></td>
      <td>
         <input id="textbox" name="sub_cat[<?php echo $counter ?>]" type="text" value="<?php echo $subrow['name'] ?>">
         <label style="padding-left: 10%">Resolution Date:</label>
         <select name="res_date<?php echo $counter ?>" class="button" id="selectbox<?php echo $counter ?>" style="margin-left: 20px">
            <option value="<?php echo $subrow['res_date']; ?>"><?php echo $subrow['res_date']; ?> Hours</option>
<?php
            if ($subrow['res_date'] == "24") {
?>
            <option value="48">48 Hours</option>
            <option value="72">72 Hours</option>
            <option value="96">96 Hours</option>
<?php
            }
            if ($subrow['res_date'] == "48") {
?>
            <option value="24">24 Hours</option>
            <option value="72">72 Hours</option>
            <option value="96">96 Hours</option>
<?php
            }
            if ($subrow['res_date'] == "72") {
?>
            <option value="24">24 Hours</option>
            <option value="48">48 Hours</option>
            <option value="96">96 Hours</option>
<?php
            }
            if ($subrow['res_date'] == "96") {
?>
            <option value="24">24 Hours</option>
            <option value="48">48 Hours</option>
            <option value="72">72 Hours</option>
<?php
            }
?>
         </select>      
      </td>
      <td>
         <a style='background: none' href='index.php?mod=delete_sub_type&id=<?php echo $subrow[uniqueid]?>&qtype_id=<?php echo $id;?>'>
            <img class='delete' src=img/delete-icon.png height='20' width='20'>
         </a>
      </td>
   </tr>
<?php
   $counter++;
   }
?>
   <input id="sub_counter" name="counter" type="hidden" value="<?php echo $counter; ?>">
</table>
<div>
   <input class= "button" type="submit" value="Add type"</input>
</div>
</div>
</form>

<?php
   mysql_close();
}

function modify_type_details() {
   mysql_connect('localhost','root');
   @mysql_select_db(crm) or die( "Unable to select database");

   $name = $_POST['name'];

   mysql_query("UPDATE query_type SET name = '$name';");

   $result = mysql_query("SELECT uniqueid from query_type WHERE name = '$name'");
   $row = mysql_fetch_array($result);

   mysql_query("DELETE FROM sub_query_type WHERE qtype_id = '$row[0]'");

   foreach ($_POST['sub_cat'] as $key => $value) {
      $subcat[$key]=$value;
   }
 
   foreach ($subcat as $key => $value) {
      $res_date = $_POST['res_date'.$key];
      if ($value != "") {
         mysql_query("INSERT INTO sub_query_type (qtype_id,name,res_date) VALUES ('$row[0]','$value','$res_date')");
      }
   }
 
   mysql_close();

   type();
}

function delete_sub_type() {
   mysql_connect('localhost','root');
   @mysql_select_db(crm) or die( "Unable to select database");

   $id = $_GET['id'];

   mysql_query("DELETE FROM sub_query_type WHERE uniqueid = '$id'");

   mysql_close();

   type();
}

function delete_type() {
   mysql_connect('localhost','root');
   @mysql_select_db(crm) or die( "Unable to select database");

   $id = $_GET['id'];

   mysql_query("DELETE FROM query_type WHERE uniqueid = '$id'");
   mysql_query("DELETE FROM sub_query_type WHERE qtype_id = '$id'");

   mysql_close();

   type();
}
?>
