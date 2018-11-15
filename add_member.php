<?php
   mysql_connect("localhost","root");
   @mysql_select_db(crm) or die( "Unable to select database");

   print_r($_POST);

   if (isset($_POST[id_number])) {
      $persal_no = $_POST['persal_no'];
      $appointment_date = $_POST['appointment_date'];
      $id_number = $_POST['id_number'];
      $salary_level = $_POST['salary_level'];
      $june_2006_subsidy_amount = $_POST['june_2006_subsidy_amount'];
      $salary_notch = $_POST['salary_notch'];
      $province_description = $_POST['province_description'];

      $beneficiary_id = $_POST['id_number'];
      $beneficiary_firstname = $_POST['beneficiary_firstname'];
      $beneficiary_initials = $_POST['beneficiary_initials'];
      $beneficiary_surname = $_POST['beneficiary_surname'];
      $beneficiary_birthdate = $_POST['beneficiary_birthdate'];
      $beneficiary_gender = $_POST['beneficiary_gender'];
      $beneficiary_status = $_POST['beneficiary_status'];
      $address_line_1 = $_POST['address_line_1'];
      $address_line_2 = $_POST['address_line_2'];
      $address_line_3 = $_POST['address_line_3'];
      $address_line_4 = $_POST['address_line_4'];
      $post_code = $_POST['post_code'];
      $telephone_number = $_POST['telephone_number'];
      $cellular_number = $_POST['cellular_number'];
      $beneficiary_relationship = $_POST['beneficiary_relationship'];
      $email_address = $_POST['email_address'];
      $vip_ind = $_POST['vip_ind'];
      $beneficiary_title = $_POST['beneficiary_title'];
      $monthly_salary_amount = $_POST['monthly_salary_amount'];
      $home_language = $_POST['home_language'];
      $written_language = $_POST['written_language'];
      $mailing_preference_for_claims_statements = $_POST['mailing_preference_for_claims_statements'];
      $mailing_preference_for_all_other_letters = $_POST['mailing_preference_for_all_other_letters'];
      $deceased_date = $_POST['deceased_date'];
      $option_name = $_POST['option_name'];
      $member_type = $_POST['member_type'];

      mysql_query("REPLACE INTO new_persal (persal_no,appointment_date,id_number,salary_level,june_2006_subsidy_amount,salary_notch,province_description) VALUE ('$persal_no','$appointment_date','$id_number','$salary_level','$june_2006_subsidy_amount','$salary_notch','$province_description')");
      mysql_query("REPLACE INTO new_members (beneficiary_id,beneficiary_firstname,beneficiary_initials,beneficiary_surname,beneficiary_birthdate,beneficiary_gender,beneficiary_status,address_line_1,address_line_2,address_line_3,address_line_4,post_code,telephone_number,cellular_number,beneficiary_relationship,email_address,vip_ind,beneficiary_title,monthly_salary_amount,home_language,written_language,mailing_preference_for_claims_statements,mailing_preference_for_all_other_letters,deceased_date,option_name,member_type) VALUE ('$beneficiary_id','$beneficiary_firstname','$beneficiary_initials','$beneficiary_surname','$beneficiary_birthdate','$beneficiary_gender','$beneficiary_status','$address_line_1','$address_line_2','$address_line_3','$address_line_4','$post_code','$telephone_number','$cellular_number','$beneficiary_relationship','$email_address','$vip_ind','$beneficiary_title','$monthly_salary_amount','$home_language','$written_language','$mailing_preference_for_claims_statements','$mailing_preference_for_all_other_letters','$deceased_date','$option_name','$member_type')");

      include_once "modules/new/new_func.php";
      search($_POST['id_number_hna']);

   } else {
      echo "<script>alert('No ID Entered!');</script>";
   }
?>
