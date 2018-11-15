<?php
   $id_number = $_COOKIE['id_number'];
   $member_number = $_COOKIE['member_number'];
   $rec_id = $_COOKIE['rec_id'];

   mysql_connect("localhost","root");
   @mysql_select_db(crm) or die( "Unable to select database");

      $caseresult=mysql_query("SELECT cases.uniqueid as uniqueid,cases.qtype_id as qtype_id,query_type.name as query_name,sub_qtype_id as sub_query_id,sub_query_type.name as sub_query_name,cases.user_id as user_id,users.name as user_name,cases.res_date as res_date,close_date FROM cases LEFT JOIN query_type ON (cases.qtype_id = query_type.uniqueid) LEFT JOIN sub_query_type ON (sub_qtype_id = sub_query_type.uniqueid) LEFT JOIN users ON (cases.user_id = users.user_id) WHERE persal_id = '$id_number' ORDER BY close_date DESC, uniqueid DESC");
      while($caserow = mysql_fetch_array($caseresult)) {
      $i = $caserow['uniqueid'];
?>
      <div id="editbox<?php echo $i; ?>disp" class="box2 <?php if ($caserow['close_date'] == "Open") { echo "cases_open"; } else { echo "cases_closed"; }?>">
         <div class="box-header">
            <h1 class="case_header"><a href="#" id="case<?php echo $i; ?>">Case Number: <?php echo $i; ?></a></h1>
         </div>
         <table class="<?php if ($caserow['close_date'] == "Open") { echo "cases_open"; } else { echo "cases_closed"; }?>">
            <tr>
               <th>
                  <label >Case Type</label>
               </th>
               <th>
                  <label >Sub Type</label>
               </th>
               <th>
                  <label >Created By</label>
               </th>
               <th>
                  <label >Pending Date</label>
               </th>
               <th>
                  <label >Closed Date</label>
               </th>
               <th>
                  <label >Call Recording</label>
               </th>
            </tr>
            <tr>
               <td>
                  <label ><?php echo $caserow['query_name']; ?></label>
               </td>
               <td>
                  <label ><?php echo $caserow['sub_query_name']; ?></label>
               </td>
               <td>
                  <label ><?php echo $caserow['user_name']; ?></label>
               </td>
               <td>
                  <label ><?php echo $caserow['res_date']; ?></label>
               </td>
               <td>
                  <label><?php echo $caserow['close_date']; ?></label>
               </td>
               <td>
<?php
                  $recresult=mysql_query("SELECT recording,date FROM call_recordings WHERE case_id='$i'");
                  while($recrow = mysql_fetch_array($recresult)) {
                     $play = "";
                     if (file_exists("/var/spool/crm/monitor/".$recrow['recording'].".WAV")) {
                        $play = "<a style='background: none; float: left;' href=monitor/".$recrow['recording'].".WAV><img class='recording' src=img/play-icon-asi.png height='20' width='20'></a>&nbsp;&nbsp;<label>".$recrow['date']."</label>";
                     } 
                     echo "<div>" . $play . "</div>";
                  }
?>
               </td>
            </tr>
         </table>
      </div>
      <div id="editbox<?php echo $i; ?>edit" class="box2 cases_edit">
         <div class="box-header-edit">
            <h1 class="case_header">Edit Case Number: <?php echo $i; ?><a id="close<?php echo $i; ?>" class="close" href="#" style="background: none"><img src="img/close-icon-asi.png" alt="close" style="width:30px;height:30px;"></a></h1>
         </div>
         <form action="index.php?mod=mod_case" method="post" id="modcase<?php echo $i; ?>" name="modcase<?php echo $i; ?>">
         <input type="hidden" id="case_id" name="case_id" value="<?php echo $i; ?>">
         <input type="hidden" id="persal_id" name="persal_id" value="<?php echo $id_number; ?>">
         <input type="hidden" id="uniqueid" name="uniqueid" value="">
         <table class="cases_edit">
            <tr>
               <th>
                  <label >Case Type</label>
               </th>
               <th>
                  <label >Sub Type</label>
               </th>
               <th>
                  <label >Created By</label>
               </th>
               <th>
                  <label >Pending Date</label>
               </th>
               <th>
                  <label >Close Case</label>
               </th>
               <th>
                  <label >Call Recording</label>
               </th>
            </tr>
            <tr>
               <td>
                  <input type="hidden" id="qtype_id" name="qtype_id" value="<?php echo $caserow['qtype_id']; ?>">
                  <input class="hide" type="text" readonly id="query_name" name="query_name" value="<?php echo $caserow['query_name']; ?>">

<!--                  <select id="type<?php echo $i; ?>" name="qtype" class="button" onchange="getsubtype<?php echo $i; ?>(this.value)">
                     <option value="<?php echo $caserow['qtype_id']; ?>"><?php echo $caserow['query_name']; ?></option>
<?php
                     $result=mysql_query("SELECT uniqueid,name from query_type ");
                     while($row = mysql_fetch_array($result))
                     {
                        echo "<option value='$row[0]'>$row[1]</option>";
                     }
?>
                  </select>-->
               </td>
               <td>
                  <input type="hidden" id="sub_query_id" name="sub_query_id" value="<?php echo $caserow['sub_query_id']; ?>">
                  <input class="hide" type="text" readonly id="sub_query_name" name="sub_query_name" value="<?php echo $caserow['sub_query_name']; ?>">

<!--                  <select id="subtype<?php echo $i; ?>" name="sub_qtype" class="button" onchange="getresdate<?php echo $i; ?>(this.value)">
                  </select>-->
               </td>
               <td>
                  <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['user_session']['uid']; ?>">
                  <input class="hide" type="text" readonly id="user_name" name="user_name" value="<?php echo $caserow['user_name']; ?>">
               </td>
               <td>
                  <input class="hide" type="text" readonly id="pendate<?php echo $i; ?>" name="pendate" value="<?php echo $caserow['res_date']; ?>">
               </td>
               <td>
<?php
                  if ($caserow['close_date']=="Open") {
?>
                     <label class="container">
                     <input name="closed" type="checkbox">
                     <span class="checkmark"></span> 
                     </label>
<?php
                  } else {
?>
                     <input class="hide" type="text" readonly id="pendate<?php echo $i; ?>" name="pendate" value="<?php echo $caserow['close_date']; ?>">
<?php
                  }
?>
               </td>
               <td>
                  <label <?php if (isset($id_number)) { echo "hidden"; } ?> id="recording" style="padding-left: 29px" class="container">
                  <input name="recording" type="checkbox">
                  <span class="checkmark"></span>Allocate Recording
                  </label>
               </td>
            </tr>
            <tr>
               <th>
                  <label>Notes</label>
               </th>
            </tr>
<?php
            $notesresult=mysql_query("SELECT notes,name FROM notes LEFT JOIN users ON (users.user_id = notes.user_id) WHERE case_id = '$i';");
            while($notesrow = mysql_fetch_array($notesresult)) {
               echo "<tr><td>";
               echo "<label>".$notesrow['notes']."</labe></td><td><label class='tab'>".$notesrow['name']."</label>";
               echo "</td></tr>";
            }
?>
            <tr>
               <td colspan="6">
               <textarea style="resize: none;" id="notes" class="fsField" name="notes" rows="4" cols="100"><?php echo $caserow['notes']; ?></textarea>                  
               </td>
            </tr>
         </table>
         </form>
         <div align="center">
            <button type="submit" form="modcase<?php echo $i; ?>" class="button" value="submit" id="modifyButton<?php echo $i; ?>">Modify</button>
         </div>
      </div>
      <script>
      $(document).ready(function(){
         $("#editbox<?php echo $i; ?>edit").hide();

         $( "#case<?php echo $i; ?>" ).click(function() {
            $("#createbox").hide();
            $("#editbox<?php echo $i; ?>disp").hide();
            $("#editbox<?php echo $i; ?>edit").show();
         });
         $( "#close<?php echo $i; ?>" ).click(function() {
            $("#createbox").hide();
            $("#editbox<?php echo $i; ?>disp").show();
            $("#editbox<?php echo $i; ?>edit").hide();
         });

         $( "#modifyButton<?php echo $i; ?>" ).click(function() {
            evtSource.addEventListener("message", handler);
            updateConnectionStatus('Connected', true);
         });

         document.getElementById("subtype<?php echo $i; ?>").innerHTML = "<option value=''>== choose one ==</option>";

      });

      function getsubtype<?php echo $i; ?>(str) {
         var xhttp;
         if (str == "") {
            document.getElementById("subtype<?php echo $i; ?>").innerHTML = "";
            return;
         }
         xhttp = new XMLHttpRequest();
         xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               document.getElementById("subtype<?php echo $i; ?>").innerHTML = this.responseText;
            }
         };
         xhttp.open("GET", "getsubtype.php?s1type="+str, true);
         xhttp.send();
      }

      function getresdate<?php echo $i; ?>(str) {
         var xhttp;
         if (str == "") {
            document.getElementById("pendate<?php echo $i; ?>").value = "";
            return;
         }
         xhttp = new XMLHttpRequest();
         xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               document.getElementById("pendate<?php echo $i; ?>").value = this.responseText;
            }
         };
         xhttp.open("GET", "getpendate.php?s1type="+str, true);
         xhttp.send();
      }

      </script>
      <br>
<?php
      }
?>

