<?php
session_start();

date_default_timezone_set("Africa/Johannesburg");
header("Content-Type: text/event-stream;charset=UTF-8");

mysql_connect("localhost","root");
@mysql_select_db(crm) or die( "Unable to select database");

// Check user session validity
if(!isset($_SESSION['user_session']['uid'])) {
	$sse_response = "data: " . json_encode(array('error' => 1, 'error_message' => 'User Authentication Failed')) . PHP_EOL . PHP_EOL;
	echo $sse_response;
	exit();
}

// Get the user id
$user_id = $_SESSION['user_session']['name'];
$extension = $_SESSION['user_session']['extension'];

// 1 is always true, so repeat the while loop forever (aka event-loop)
while (1) { 
  $curDate = date("Y-m-d h:i:s");

  echo "event: ping\n",
       'data: {"time": "' . $curDate . '"}', "\n\n";

  $data['datetime']=$curDate;

  $result=mysql_query("SELECT callerid,uniqueid FROM calls WHERE extension = '$extension'");
  $row = mysql_fetch_array($result);

//  $memresult=mysql_query("SELECT * FROM persal LEFT JOIN members ON (beneficiary_id = id_number) LEFT JOIN hna ON (persal_id = id_number) WHERE (telephone_number = '$row[callerid]' or cellular_number = '$row[callerid]')");
//  $memrow = mysql_fetch_array($memresult);

  $data['callerid']=$row['callerid'];
  $data['uniqueid']=$row['uniqueid'];

//  $data['id_number']=$memrow['id_number'];
//  $data['member_number']=$memrow['member_number'];

//  $data['persal_no']=$memrow['persal_no'];
//  $data['appointment_date']=$memrow['appointment_date'];
//  $data['province_description']=$memrow['province_description'];
//  $data['salary_notch']=$memrow['salary_notch'];
//  $data['salary_level']=$memrow['salary_level'];
//  $data['june_2006_subsidy_amount']=$memrow['june_2006_subsidy_amount'];

//  $data['beneficiary_title']=$memrow['beneficiary_title'];
//  $data['beneficiary_firstname']=$memrow['beneficiary_firstname'];
//  $data['beneficiary_initials']=$memrow['beneficiary_initials'];
//  $data['beneficiary_surname']=$memrow['beneficiary_surname'];
//  $data['beneficiary_birthdate']=$memrow['beneficiary_birthdate'];
//  $data['beneficiary_gender']=$memrow['beneficiary_gender'];
//  $data['beneficiary_relationship']=$memrow['beneficiary_relationship'];
//  $data['beneficiary_status']=$memrow['beneficiary_status'];
//  $data['vip_ind']=$memrow['vip_ind'];

//  $data['address_line_1']=$memrow['address_line_1'];
//  $data['address_line_2']=$memrow['address_line_2'];
//  $data['address_line_3']=$memrow['address_line_3'];
//  $data['address_line_4']=$memrow['address_line_4'];
//  $data['post_code']=$memrow['post_code'];

//  $data['monthly_salary_amount']=$memrow['monthly_salary_amount'];
//  $data['home_language']=$memrow['home_language'];
//  $data['written_language']=$memrow['written_language'];
//  $data['mailing_preference_for_claims_statements']=$memrow['mailing_preference_for_claims_statements'];
//  $data['mailing_preference_for_all_other_letters']=$memrow['mailing_preference_for_all_other_letters'];

//  $data['email_address']=$memrow['email_address'];
//  $data['telephone_number']=$memrow['telephone_number'];
//  $data['cellular_number']=$memrow['cellular_number'];

//  $data['option_name']=$memrow['option_name'];
//  $data['member_type']=$memrow['member_type'];
//  $data['deceased_date']=$memrow['deceased_date'];

//  $data['dep_adult']=$memrow['dep_adult'];
//  $data['dep_child']=$memrow['dep_child'];
//  $data['advisor']=$memrow['advisor'];
//  $data['step2Radio']=$memrow['step2Radio'];
//  $data['step3Radio']=$memrow['step3Radio'];
//  $data['step4Radio']=$memrow['step4Radio'];
//  $data['step5Radio']=$memrow['step5Radio'];

  $str = json_encode($data);
  echo "data: {$str}\n\n";

  // flush the output buffer and send echoed messages to the browser
  while (ob_get_level() > 0) {
    ob_end_flush();
  }
  flush();

  // break the loop if the client aborted the connection (closed the page)  
  if ( connection_aborted() ) break;

  // sleep for 1 second before running the loop again  
  sleep(1);
}
