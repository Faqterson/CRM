<?php 
   ob_start();

   unset($_COOKIE['id_number']);
   unset($_COOKIE['member_number']);

   include('include/checklogin.php');
?>
<!doctype html>
<html class="touch-styles">
<head>
   <meta charset="utf-8" />
   <title>ASI CRM</title>
   <link rel="stylesheet" type="text/css" href="css/site-asi.css"/>

   <script type="text/javascript" src="js/jquery.min.js"></script>
   <script type="text/javascript" src="js/site.js"></script>
   <script type="text/javascript" src="js/rates.js"></script>

    <link rel="stylesheet" href="css/utilities.css" type="text/css">
    <link rel="stylesheet" href="css/frontend.css" type="text/css">
    <link rel="stylesheet" href="css/dcalendar.picker.css" type="text/css">

    <script src="js/jquery.knob.js" type="text/javascript"></script>
    <script src="js/esm.js" type="text/javascript"></script>
    <script src="js/dcalendar.picker.js" type="text/javascript"></script>
    <script>
    $(document).ready(function() {
       $('#startdate').dcalendarpicker({
          format: 'yyyy-mm-dd'
       });
       $('#enddate').dcalendarpicker({
          format: 'yyyy-mm-dd'
       });


       document.getElementById("subtype").innerHTML = "<option value=''>== choose one ==</option>";

    });
    var button = document.querySelector('button');

    var evtSource = new EventSource('sse.php');
    console.log(evtSource.withCredentials);
    console.log(evtSource.readyState);
    console.log(evtSource.url);

    evtSource.onopen = function() {
      console.log("Connection to server opened.");
    };
//    evtSource.onmessage = function(e) {
//      var jdata = JSON.parse(e.data);

//      document.getElementById("datelabel").innerHTML = jdata.datetime;

//      if (jdata.callerid != '') {
//         document.getElementById("callerid").innerHTML = jdata.callerid;
//         document.getElementById("uniqueid").value = jdata.uniqueid;
//         document.cookie = "rec_id="+jdata.uniqueid;

//         document.getElementById("id_number").value = jdata.id_number;
//         document.getElementById("persal_id").value = jdata.id_number;
//         document.getElementById("id_number_hna").value = jdata.id_number;
//         document.cookie = "id_number="+jdata.id_number;
//         document.getElementById("member_number").value = jdata.member_number;
//         document.cookie = "member_number="+jdata.member_number;

//         document.getElementById("persal_no").value = jdata.persal_no;
//         document.getElementById("appointment_date").value = jdata.appointment_date;
//         document.getElementById("province_description").value = jdata.province_description;
//         document.getElementById("salary_notch").value = jdata.salary_notch;
//         document.getElementById("salary_level").value = jdata.salary_level;
//         document.getElementById("june_2006_subsidy_amount").value = jdata.june_2006_subsidy_amount;

//         document.getElementById("beneficiary_title").value = jdata.beneficiary_title;
//         document.getElementById("beneficiary_firstname").value = jdata.beneficiary_firstname;
//         document.getElementById("beneficiary_initials").value = jdata.beneficiary_initials;
//         document.getElementById("beneficiary_surname").value = jdata.beneficiary_surname;
//         document.getElementById("beneficiary_birthdate").value = jdata.beneficiary_birthdate;

//         if (jdata.personal_gender == "m") {
//            document.getElementById("male").checked = true;
//         } else if (jdata.personal_gender == "f") {
//            document.getElementById("female").checked = true;
//         }

//         document.getElementById("beneficiary_relationship").value = jdata.beneficiary_relationship;
//         document.getElementById("beneficiary_status").value = jdata.beneficiary_status;
//         document.getElementById("vip_ind").value = jdata.vip_ind;

//         document.getElementById("address_line_1").value = jdata.address_line_1;
//         document.getElementById("address_line_2").value = jdata.address_line_2;
//         document.getElementById("address_line_3").value = jdata.address_line_3;
//         document.getElementById("address_line_4").value = jdata.address_line_4;
//         document.getElementById("post_code").value = jdata.post_code;
//         document.getElementById("monthly_salary_amount").value = jdata.monthly_salary_amount;
//         document.getElementById("home_language").value = jdata.home_language;
//         document.getElementById("written_language").value = jdata.written_language;
//         document.getElementById("mailing_preference_for_claims_statements").value = jdata.mailing_preference_for_claims_statements;
//         document.getElementById("mailing_preference_for_all_other_letters").value = jdata.mailing_preference_for_all_other_letters;
//         document.getElementById("email_address").value = jdata.email_address;
//         document.getElementById("telephone_number").value = jdata.telephone_number;
//         document.getElementById("cellular_number").value = jdata.cellular_number;
//         document.getElementById("option_name").value = jdata.option_name;
//         document.getElementById("member_type").value = jdata.member_type;
//         document.getElementById("deceased_date").value = jdata.deceased_date;

//         document.getElementById("dep_adult").value = jdata.dep_adult;
//         document.getElementById("dep_child").value = jdata.dep_child;
//         document.getElementById("advisor").value = jdata.advisor;

//         if (jdata.step2Radio == "unlimitedRadio200") {
//            $("#unlimitedRadio200").prop("checked", true);
//         } else if (jdata.step2Radio == "unlimitedRadio100") { 
//            $("#unlimitedRadio100").prop("checked", true);
//         } else if (jdata.step2Radio == "limitedRadio100") { 
//            $("#limitedRadio100").prop("checked", true);
//         } else if (jdata.step2Radio == "limitedPMBRadio100") { 
//            $("#limitedPMBRadio100").prop("checked", true);
//         }

//         if (jdata.step3Radio == "Ext80CDL") {
//            $("#Ext80CDL").prop("checked", true);
//            $("#Ext80CDL").removeAttr('disabled');
//            $("#Ext80CDL").parent().removeClass("mydisabled");
//         } else if (jdata.step3Radio == "Ext40CDL") {
//            $("#Ext40CDL").prop("checked", true);
//            $("#Ext40CDL").removeAttr('disabled');
//            $("#Ext40CDL").parent().removeClass("mydisabled");
//         } else if (jdata.step3Radio == "StdPMBsACCsFromMSA") {
//            $("#StdPMBsACCsFromMSA").prop("checked", true);
//            $("#StdPMBsACCsFromMSA").removeAttr('disabled');
//            $("#StdPMBsACCsFromMSA").parent().removeClass("mydisabled");
//         } else if (jdata.step3Radio == "StdPMBsOnly") {
//            $("#StdPMBsOnly").prop("checked", true);
//            $("#StdPMBsOnly").removeAttr('disabled');
//            $("#StdPMBsOnly").parent().removeClass("mydisabled");
//         }

//         if (jdata.step4Radio == "noDeductibles") {
//            $("#noDeductibles").prop("checked", true);
//            $("#noDeductibles").removeAttr('disabled');
//            $("#noDeductibles").parent().removeClass("mydisabled");
//         } else if (jdata.step4Radio == "yesDeductibles") {
//            $("#yesDeductibles").prop("checked", true);
//            $("#yesDeductibles").removeAttr('disabled');
//            $("#yesDeductibles").parent().removeClass("mydisabled");
//         }

//         if (jdata.step5Radio == "anyGP") {
//            $("#anyGP").prop("checked", true);
//            $("#anyGP").removeAttr('disabled');
//            $("#anyGP").parent().removeClass("mydisabled");
//            if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200" && $('input[type=radio][name=step3Radio]:Checked').val() == "Ext80CDL" && $('input[type=radio][name=step4Radio]:Checked').val() == "noDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "anyGP") {
//               $("#bestPlan").text("Onyx");
//               $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the GEMS Hospital Network");
//               $("#resultChronic").text("Require cover for more than standard PMBs (Member=R17,146 | Family=R35,144)");
//               $("#resultDeductibles").text("Not willing to pay a co-payment");
//               $("#resultOOH").text("Consult any GP/Specialist within sub-limits and Block Benefit");
//            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200" && $('input[type=radio][name=step3Radio]:Checked').val() == "Ext40CDL" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
//               $("#bestPlan").text("Emerald");
//               $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the GEMS Hospital Network");
//               $("#resultChronic").text("Require cover for more than standard PMBs (Member=R10,041 | Family=R20,218)");
//               $("#resultDeductibles").text("Willing to pay a co-payment");
//               $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
//            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio100" && $('input[type=radio][name=step3Radio]:Checked').val() == "Ext40CDL" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
//               $("#bestPlan").text("Emerald Value");
//               $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the Emerald Value Hospital Network");
//               $("#resultChronic").text("Require cover for more than standard PMBs (Member=R10,041 | Family=R20,218)");
//               $("#resultDeductibles").text("Willing to pay a co-payment");
//               $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
//            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200" && $('input[type=radio][name=step3Radio]:Checked').val() == "StdPMBsACCsFromMSA" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGPwithMSA") {
//               $("#bestPlan").text("Ruby");
//               $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the GEMS Hospital Network");
//               $("#resultChronic").text("Require cover for standard PMBs and ACCs from a Medical Savings Account (MSA)");
//               $("#resultDeductibles").text("Willing to pay a co-payment");
//               $("#resultOOH").text("Consult a network GP/Specialist subject to available MSA and Block Benefit");
//            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "limitedRadio100" && $('input[type=radio][name=step3Radio]:Checked').val() == "StdPMBsOnly" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
//               $("#bestPlan").text("Beryl");
//               $("#resultIH").text("Limited cover (R987,856 per family) up to 100% of the Scheme Tariff within the GEMS Hospital Network");
//               $("#resultChronic").text("Require cover for standard PMBs only");
//               $("#resultDeductibles").text("Willing to pay a co-payment");
//               $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
//            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "limitedPMBRadio100" && $('input[type=radio][name=step3Radio]:Checked').val() == "StdPMBsOnly" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
//               $("#bestPlan").text("Sapphire");
//               $("#resultIH").text("Limited PMBs only cover (R186,385 per family) up to 100% of the Scheme Tariff within the GEMS Hospital Network");
//               $("#resultChronic").text("Require cover for standard PMBs only");
//               $("#resultDeductibles").text("Willing to pay a co-payment");
//               $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
//            }
//         } else if (jdata.step5Radio == "networkGP") {
//            $("#networkGP").prop("checked", true);
//            $("#networkGP").removeAttr('disabled');
//            $("#networkGP").parent().removeClass("mydisabled");
//            if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200" && $('input[type=radio][name=step3Radio]:Checked').val() == "Ext80CDL" && $('input[type=radio][name=step4Radio]:Checked').val() == "noDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "anyGP") {
//               $("#bestPlan").text("Onyx");
//               $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the GEMS Hospital Network");
//               $("#resultChronic").text("Require cover for more than standard PMBs (Member=R17,146 | Family=R35,144)");
//               $("#resultDeductibles").text("Not willing to pay a co-payment");
//               $("#resultOOH").text("Consult any GP/Specialist within sub-limits and Block Benefit");
//            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200" && $('input[type=radio][name=step3Radio]:Checked').val() == "Ext40CDL" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
//               $("#bestPlan").text("Emerald");
//               $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the GEMS Hospital Network");
//               $("#resultChronic").text("Require cover for more than standard PMBs (Member=R10,041 | Family=R20,218)");
//               $("#resultDeductibles").text("Willing to pay a co-payment");
//               $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
//            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio100" && $('input[type=radio][name=step3Radio]:Checked').val() == "Ext40CDL" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
//               $("#bestPlan").text("Emerald Value");
//               $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the Emerald Value Hospital Network");
//               $("#resultChronic").text("Require cover for more than standard PMBs (Member=R10,041 | Family=R20,218)");
//               $("#resultDeductibles").text("Willing to pay a co-payment");
//               $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
//            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200" && $('input[type=radio][name=step3Radio]:Checked').val() == "StdPMBsACCsFromMSA" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGPwithMSA") {
//               $("#bestPlan").text("Ruby");
//               $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the GEMS Hospital Network");
//               $("#resultChronic").text("Require cover for standard PMBs and ACCs from a Medical Savings Account (MSA)");
//               $("#resultDeductibles").text("Willing to pay a co-payment");
//               $("#resultOOH").text("Consult a network GP/Specialist subject to available MSA and Block Benefit");
//            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "limitedRadio100" && $('input[type=radio][name=step3Radio]:Checked').val() == "StdPMBsOnly" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
//               $("#bestPlan").text("Beryl");
//               $("#resultIH").text("Limited cover (R987,856 per family) up to 100% of the Scheme Tariff within the GEMS Hospital Network");
//               $("#resultChronic").text("Require cover for standard PMBs only");
//               $("#resultDeductibles").text("Willing to pay a co-payment");
//               $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
//            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "limitedPMBRadio100" && $('input[type=radio][name=step3Radio]:Checked').val() == "StdPMBsOnly" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
//               $("#bestPlan").text("Sapphire");
//               $("#resultIH").text("Limited PMBs only cover (R186,385 per family) up to 100% of the Scheme Tariff within the GEMS Hospital Network");
//               $("#resultChronic").text("Require cover for standard PMBs only");
//               $("#resultDeductibles").text("Willing to pay a co-payment");
//               $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
//            }
//         } else if (jdata.step5Radio == "networkGPwithMSA") {
//            $("#networkGPwithMSA").prop("checked", true);
//            $("#networkGPwithMSA").removeAttr('disabled');
//            $("#networkGPwithMSA").parent().removeClass("mydisabled");

//            if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200" && $('input[type=radio][name=step3Radio]:Checked').val() == "Ext80CDL" && $('input[type=radio][name=step4Radio]:Checked').val() == "noDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "anyGP") {
//               $("#bestPlan").text("Onyx");
//               $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the GEMS Hospital Network");
//               $("#resultChronic").text("Require cover for more than standard PMBs (Member=R17,146 | Family=R35,144)");
//               $("#resultDeductibles").text("Not willing to pay a co-payment");
//               $("#resultOOH").text("Consult any GP/Specialist within sub-limits and Block Benefit");
//            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200" && $('input[type=radio][name=step3Radio]:Checked').val() == "Ext40CDL" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
//               $("#bestPlan").text("Emerald");
//               $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the GEMS Hospital Network");
//               $("#resultChronic").text("Require cover for more than standard PMBs (Member=R10,041 | Family=R20,218)");
//               $("#resultDeductibles").text("Willing to pay a co-payment");
//               $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
//            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio100" && $('input[type=radio][name=step3Radio]:Checked').val() == "Ext40CDL" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
//               $("#bestPlan").text("Emerald Value");
//               $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the Emerald Value Hospital Network");
//               $("#resultChronic").text("Require cover for more than standard PMBs (Member=R10,041 | Family=R20,218)");
//               $("#resultDeductibles").text("Willing to pay a co-payment");
//               $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
//            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200" && $('input[type=radio][name=step3Radio]:Checked').val() == "StdPMBsACCsFromMSA" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGPwithMSA") {
//               $("#bestPlan").text("Ruby");
//               $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the GEMS Hospital Network");
//               $("#resultChronic").text("Require cover for standard PMBs and ACCs from a Medical Savings Account (MSA)");
//               $("#resultDeductibles").text("Willing to pay a co-payment");
//               $("#resultOOH").text("Consult a network GP/Specialist subject to available MSA and Block Benefit");
//            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "limitedRadio100" && $('input[type=radio][name=step3Radio]:Checked').val() == "StdPMBsOnly" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
//               $("#bestPlan").text("Beryl");
//               $("#resultIH").text("Limited cover (R987,856 per family) up to 100% of the Scheme Tariff within the GEMS Hospital Network");
//               $("#resultChronic").text("Require cover for standard PMBs only");
//               $("#resultDeductibles").text("Willing to pay a co-payment");
//               $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
//            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "limitedPMBRadio100" && $('input[type=radio][name=step3Radio]:Checked').val() == "StdPMBsOnly" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
//               $("#bestPlan").text("Sapphire");
//               $("#resultIH").text("Limited PMBs only cover (R186,385 per family) up to 100% of the Scheme Tariff within the GEMS Hospital Network");
//               $("#resultChronic").text("Require cover for standard PMBs only");
//               $("#resultDeductibles").text("Willing to pay a co-payment");
//               $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
//            }
//         }

//         if (jdata.uniqueid) {
//            $("#cases").load("cases.php");
//            $("#createbutton").show();
//            $("#recording").show();
//            evtSource.close();
//            updateConnectionStatus('Disconnected', false);
//         }
//      }
//    };

    evtSource.onerror = function() {
      console.log("EventSource failed.");
    };

    evtSource.addEventListener('open', function(event) {
       updateConnectionStatus('Connected', true);
    }, false);

    function updateConnectionStatus(msg, connected) {
       var el = document.querySelector('#connection');
       if (connected) {
          if (el.classList) {
             el.classList.add('connected');
             el.classList.remove('disconnected');
          } else {
             el.addClass('connected');
             el.removeClass('disconnected');
          }
       } else {
          if (el.classList) {
             el.classList.remove('connected');
             el.classList.add('disconnected');
          } else {
             el.removeClass('connected');
             el.addClass('disconnected');
          }
       }
       el.innerHTML = msg + '<div></div>';
    }

    function getsubtype(str) {
      var xhttp;    
      if (str == "") {
         document.getElementById("subtype").innerHTML = "";
         return;
      }
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
            document.getElementById("subtype").innerHTML = this.responseText;
         }
      };
      xhttp.open("GET", "getsubtype.php?s1type="+str, true);
      xhttp.send();
    }

    function getresdate(str) {
      var xhttp;    
      if (str == "") {
         document.getElementById("pendate").value = "";
         return;
      }
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
            document.getElementById("pendate").value = this.responseText;
         }
      };
      xhttp.open("GET", "getpendate.php?s1type="+str, true);
      xhttp.send();
    }
    </script>
</head>

<body>
<div id="siteWrapper" class="clearfix">
<header id="header" class="show-on-scroll header">
   <div class="header-inner">
      <div class="wrapper" id="logoWrapper">
         <h1 id="logoImage">
            <a href="index.php"><img src="img/ASI.svg" style="width:265px;height:58px;" alt="ASI CRM"/></a>
         </h1>
      </div>
      <div id="headerNav">
         <div class="nav-wrapper" id="mainNavWrapper">
            <nav>
               <div style="padding-right: 50px">
                  <label class="datelabel" id="connection">Connecting...<div></div></label>
                  <label class="datelabel" id="datelabel"></label>
<!--                  <label class="datelabel" id="callerid">|</label>
                  <label class="datelabel" id="uniqueid">|</label>-->
               </div>
            </nav>
         </div>
      </div>
   </div>
</header>

<main id="page" role="main">
   <div id="content" class="main-content">
      <div class="sqs-layout sqs-grid-12 columns-12">
         <div class="row sqs-row">
             <div class="col sqs-col-12 span-12">
<?php
             switch ($_GET['mod'])   {
                case 'add_case':
                   include_once "modules/new/new_func.php";
                   add_case();
                break;
                case 'mod_case':
                   include_once "modules/new/new_func.php";
                   mod_case();
                break;
                case 'search':
                   include_once "modules/new/new_func.php";
                   search();
                break;
                case 'hna':
                   include_once "modules/hna/hna_func.php";
                   hna();
                break;
                default:
                   include_once "modules/new/new_func.php";
                   new_client();
                break;
             }
?>
             </div>
         </div>
      </div>
   </div>
</main>

<footer id="footer" class="footer" role="contentinfo">
   <div class="footer-inner">
         <nav>
            <div id="siteInfo">
            </div>
         </nav>
   </div>
</footer>
</div>
</body>
</html>

