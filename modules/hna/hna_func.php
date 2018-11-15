<?php

function hna() {
//   print_r($_POST);
   if ($_POST['id_number_hna']!="") {

      $id_number = $_POST['id_number_hna'];
      $dep_adult = $_POST['dep_adult'];
      $dep_child = $_POST['dep_child'];
      $advisor = $_POST['advisor'];
      $step2Radio = $_POST['step2Radio'];
      $step3Radio = $_POST['step3Radio'];
      $step4Radio = $_POST['step4Radio'];
      $step5Radio = $_POST['step5Radio'];

      mysql_query("REPLACE INTO hna (persal_id,dep_adult,dep_child,advisor,step2Radio,step3Radio,step4Radio,step5Radio) VALUES ('$id_number','$dep_adult','$dep_child','$advisor','$step2Radio','$step3Radio','$step4Radio','$step5Radio')");
      
      include_once "modules/new/new_func.php";
      search($_POST['id_number_hna']);

   } else {
      echo "<script>alert('No ID Entered!');</script>";
      
      include_once "modules/new/new_func.php";
      new_client();
   }
}
?>
