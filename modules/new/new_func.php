<?php

function new_client($memrow) {
?>
   <div style="">
      <table class="custborder" width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
         <td class="popup" align="left" width="50%">
            <ul>
               <li class="popup"><a href="#crm" id="menu1">CRM</a></li>
               <li class="popup"><a href="#hna" id="menu2">HNA</a></li>
            </ul>
         </td>
         <td class="popup" align="right" width="35%">
            <input name="submit" type="submit" value="Add User" class="button2" id="addButton">&nbsp;&nbsp;&nbsp;
         </td>
      </tr>
      </table>
   </div>
   <div id="crm">
      <div class="box2">
         <div class="box-header">
            <h1>Search</h1>
         </div>
         <form action="index.php?mod=search" method="post" id="search" name="search">
            <label>ID Number</label>
            <input id="id_number" name="id_number" type="text" value="<?php echo $memrow['id_number']; ?>">
            <label class="tab">Member Number</label>
            <input id="member_number" name="member_number" type="text" value="<?php echo $memrow['member_number']; ?>">
            <label class="tab">Case Number</label>
            <input name="case_nr" type="text">
            <label class="tab"></label>
            <button type="submit" form="search" class="button" value="search" id="searchButton" onclick="">Search</button>
         </form>
      </div>
      <br>
      <div class="box2">
         <div class="box-header">
            <h1>Employment</h1>
         </div>
         <div>
            <label>PERSAL Number</label>
            <input id="persal_no" name="persal_no" type="text" value="<?php echo $memrow['persal_no']; ?>">
            <label class="tab">Appointment Date</label>
            <input id="appointment_date" name="appointment_date" type="text" value="<?php echo $memrow['appointment_date']; ?>">
            <label class="tab">Province Description</label>
            <input id="province_description" name="province_description" type="text" value="<?php echo $memrow['province_description']; ?>">
         </div>
         <div>
            <label>Salary Notch</label>
            <input id="salary_notch" name="salary_notch" type="text" value="<?php echo $memrow['salary_notch']; ?>">
            <label class="tab">Salary Level</label>
            <input id="salary_level" name="salary_level" type="text" value="<?php echo $memrow['salary_level']; ?>">
            <label class="tab">Subsidy Amount</label>
            <input id="june_2006_subsidy_amount" name="june_2006_subsidy_amount" type="text" value="<?php echo $memrow['june_2006_subsidy_amount']; ?>">
         </div>
      </div>
      <br>
      <div class="box2">
         <div class="box-header">
            <h1>Personal</h1>
         </div>
         <div>
            <lable>Title</lable>
            <input id="beneficiary_title" name="beneficiary_title" placeholder="Title" type="text" value="<?php echo $memrow['beneficiary_title']; ?>">
            <label class="tab">Beneficiary First Name</label>
            <input id="beneficiary_firstname" name="beneficiary_firstname" placeholder="First" type="text" value="<?php echo $memrow['beneficiary_firstname']; ?>">
            <input id="initials" name="initials" placeholder="Initials" type="text" value="<?php echo $memrow['initials']; ?>">
            <input id="surname" name="surname" placeholder="Last" type="text" value="<?php echo $memrow['surname']; ?>">
            <label class="tab">Beneficiary Date of Birth</label>
            <input id="date_of_birth" name="date_of_birth" placeholder="YYYY-MM-DD" type="text" value="<?php echo $memrow['date_of_birth']; ?>">
         </div>
         <div style="padding-top: 6px; padding-bottom: 6px">
            <label>Beneficiary Gender</label>
            <input id="male" type="radio" name="gender" <?php if ($memrow['beneficiary_gender'] == "m") { echo "checked"; } ?> value="m"> Male
            <input id="female" type="radio" name="gender" <?php if ($memrow['personal_gender'] == "f") { echo "checked"; } ?> value="f"> Female
            <label class="tab">Beneficiary Relationship</label>
            <input id="beneficiary_relationship" name="beneficiary_relationship" type="text" value="<?php echo $memrow['beneficiary_relationship']; ?>">
            <label class="tab">Beneficiary Status</label>
            <input id="beneficiary_status" name="beneficiary_status" type="text" value="<?php echo $memrow['beneficiary_status']; ?>">
            <label class="tab">VIP</label>
            <input id="vip_ind" name="vip_ind" type="text" value="<?php echo $memrow['vip_ind']; ?>">
         </div>
         <div>
            <label>Customer Address</label>
            <input id="address_line_1" name="address_line_1" placeholder="Street Address" type="text" value="<?php echo $memrow['address_line_1']; ?>">
            <input id="address_line_2" name="address_line_2" placeholder="Street Address 2" type="text" value="<?php echo $memrow['address_line_2']; ?>">
            <input id="address_line_3" name="address_line_3" placeholder="City" type="text" value="<?php echo $memrow['address_line_3']; ?>">
            <input id="address_line_4" name="address_line_4" placeholder="Region" type="text" value="<?php echo $memrow['address_line_4']; ?>">
            <input id="post_code" name="post_code" placeholder="Postal/Code" type="text" value="<?php echo $memrow['post_code']; ?>">
         </div>
         <div>
            <label>Monthly Salary Amount</label>
            <input id="monthly_salary_amount" name="monthly_salary_amount" type="text" value="<?php echo $memrow['monthly_salary_amount']; ?>">
            <label class="tab">Home Language</label>
            <input id="home_language" name="home_language" type="text" value="<?php echo $memrow['home_language']; ?>">
            <label class="tab">Written Language</label>
            <input id="written_language" name="written_language" type="text" value="<?php echo $memrow['written_language']; ?>">
         </div>
         <div>
            <label>Mailing preference for claims statements</label>
            <input id="mailing_preference_for_claims_statements" name="mailing_preference_for_claims_statements" type="text" value="<?php echo $memrow['mailing_preference_for_claims_statements']; ?>">
            <label class="tab">Mailing preference for  all other letters</label>
            <input id="mailing_preference_for_all_other_letters" name="mailing_preference_for_all_other_letters" ttype="text" value="<?php echo $memrow['mailing_preference_for_all_other_letters']; ?>">
         </div>
         <div>
            <label>E-mail Address</label>
            <input id="email_address" name="email_address" type="text" value="<?php echo $memrow['email_address']; ?>">
            <label class="tab">Telephone number</label>
            <input id="telephone_number" name="telephone_number" placeholder="##########" type="text" value="<?php echo $memrow['telephone_number']; ?>">
            <label class="tab">Cellular number</label>
            <input id="cellular_number" name="cellular_number" placeholder="##########" type="text" value="<?php echo $memrow['cellular_number']; ?>">
         </div>
         <div>
            <label>Option Name</label>
            <input id="option_name" name="option_name" type="text" value="<?php echo $memrow['option_name']; ?>">
            <label class="tab">Member type</label>
            <input id="member_type" name="member_type" type="text" value="<?php echo $memrow['member_type']; ?>">
            <label class="tab">Deceased Date</label>
            <input id="deceased_date" name="deceased_date" type="text" value="<?php echo $memrow['deceased_date']; ?>">
         </div>
      </div>
      <br>
   </div>
   <div id="hna">
      <form action="index.php?mod=hna" method="post" id="hna_form" name="hna_form">
      <input id="id_number_hna" name="id_number_hna" type="hidden" value="<?php echo $memrow['id_number']; ?>">

      <div class="wrap">
      <div class="box2 div1">
         <div class="box-header">
            <h1>Step 1: About you and your family</h1>
         </div>
         <div data-step="1">
            <div>
               <label class="tab2">No. of adult dependant(s)*</label>
               <select class="button" name="dep_adult" id="dep_adult">
<?php
                  if (isset($memrow['dep_adult'])) {
                     echo "<option value='".$memrow['dep_adult']."'>".$memrow['dep_adult']."</option>";
                  }
                  for ($i = 0; $i <= 10; $i=$i+1) {
                     echo "<option value='$i'>".$i."</option>";
                  }
?>
               </select>
            </div>
            <div>
               <label class="tab2">No. of child dependant(s)*</label>
               <select class="button" name="dep_child" id="dep_child">
<?php
                  if (isset($memrow['dep_child'])) {
                     echo "<option value='".$memrow['dep_child']."'>".$memrow['dep_child']."</option>";
                  }
                  for ($i = 0; $i <= 10; $i=$i+1) {
                     echo "<option value='$i'>".$i."</option>";
                  }
?>
               </select>
            </div>
         </div>
         <div>      
            <label class="tab2">Name of Advisor</label>
            <input type="text" class="" id="advisor" name="advisor" value="<?php echo $memrow['advisor']; ?>">
         </div>
         <div>      
            <label class="tab2">Monthly Salary Amount</label>
            <input type="text" class="" id="salary_amount" name="salary_amount" value="<?php echo $memrow['salary_amount']; ?>">
         </div>
      </div>
      <div class="box2 div2">
         <div class="box-header">
            <h1>Step 2: Cover for hospitalisation</h1>
         </div>
         <div data-step="2">
            <p><strong>What is your family's in-hospital benefit (hospitalisation) requirement for the upcoming year?</strong></p>
            <div>
               <label>
                  <input id="unlimitedRadio200" value="unlimitedRadio200" <?php if ($memrow['step2Radio'] == "unlimitedRadio200") { echo "checked"; } ?> type="radio" name="step2Radio"><span id="unlimitedRadio200span">Unlimited cover up to 100% of the GEMS Tariff within the GEMS Hospital Network</span> 
               </label>
            </div>
            <div>
               <label>
                  <input id="unlimitedRadio100" value="unlimitedRadio100" <?php if ($memrow['step2Radio'] == "unlimitedRadio100") { echo "checked"; } ?> type="radio" name="step2Radio"><span id="unlimitedRadio100span">Unlimited cover up to 100% of the GEMS Tariff within the Emerald Value Hospital Network</span>
               </label>
            </div>
            <div>
               <label>
                  <input id="limitedRadio100" value="limitedRadio100" <?php if ($memrow['step2Radio'] == "limitedRadio100") { echo "checked"; } ?> type="radio" name="step2Radio"><span id="limitedRadio100span">Limited cover (R987,856 per family) up to 100% of the GEMS Tariff within the GEMS Hospital Network</span>
               </label>
            </div>
            <div>
               <label>
                  <input id="limitedPMBRadio100" value="limitedPMBRadio100" <?php if ($memrow['step2Radio'] == "limitedPMBRadio100") { echo "checked"; } ?> type="radio" name="step2Radio"><span id="limitedPMBRadio100span">Limited PMBs only cover (R186,385 per family) up to 100% of the GEMS Tariff within the GEMS Hospital Network</span>
               </label>
            </div>
            <br>                               
            <br>                               
      </div>
      </div>

      <div class="wrap">
      <div class="box2 div1">
         <div class="box-header">
            <h1>Step 3: Cover for chronic conditions</h1>
         </div>
         <p>
            <strong>Do you require cover for more than the Prescribed Minimum Benefit Chronic Disease List conditions including HIV/AIDS?</strong>
         </p>
<?php 
         if ($memrow['step3Radio'] == "Ext80CDL") {
?>
         <script>
         $(document).ready(function() {
            $("#Ext80CDL").prop("checked", true);
            $("#Ext80CDL").removeAttr('disabled');
            $("#Ext80CDL").parent().removeClass("mydisabled");
         });
         </script>
<?php
         } 
?>
         <div>
            <label id="lblExt80CDL">
               <input id="Ext80CDL" value="Ext80CDL" type="radio" name="step3Radio"> Require cover for more than standard PMBs (Member=R17,146 | Family=R35,144)
            </label>
         </div>
<?php 
         if ($memrow['step3Radio'] == "Ext40CDL") {
?>
         <script>
         $(document).ready(function() {
            $("#Ext40CDL").prop("checked", true);
            $("#Ext40CDL").removeAttr('disabled');
            $("#Ext40CDL").parent().removeClass("mydisabled");
         });
         </script>
<?php
         } 
?>
         <div>
            <label id="lblExt40CDL">
               <input id ="Ext40CDL" value="Ext40CDL" type="radio" name="step3Radio"> Require cover for more than standard PMBs (Member=R10,041 | Family=R20,218)
            </label>
         </div>
<?php 
         if ($memrow['step3Radio'] == "StdPMBsACCsFromMSA") {
?>
         <script>
         $(document).ready(function() {
            $("#StdPMBsACCsFromMSA").prop("checked", true);
            $("#StdPMBsACCsFromMSA").removeAttr('disabled');
            $("#StdPMBsACCsFromMSA").parent().removeClass("mydisabled");
         });
         </script>
<?php
         } 
?>
         <div>
            <label id="lblStdPMBsACCsFromMSA">
               <input id="StdPMBsACCsFromMSA" value="StdPMBsACCsFromMSA" type="radio" name="step3Radio"> Require cover for standard PMBs and ACCs from a Medical Savings Account (MSA)
            </label>
         </div>
<?php 
         if ($memrow['step3Radio'] == "StdPMBsOnly") {
?>
         <script>
         $(document).ready(function() {
            $("#StdPMBsOnly").prop("checked", true);
            $("#StdPMBsOnly").removeAttr('disabled');
            $("#StdPMBsOnly").parent().removeClass("mydisabled");
         });
         </script>
<?php
         } 
?>
         <div>
            <label id="lblStdPMBsOnly">
               <input id="StdPMBsOnly" value="StdPMBsOnly" type="radio" name="step3Radio"> Require cover for standard PMBs only
            </label>
         </div>
      </div>
      <div class="box2 div2">
         <div class="box-header">
            <h1>Step 4: In-hospital benefit (hospitalisation) co-payments</h1>
         </div>
         <p><strong>Please indicate whether you are willing to pay an amount upfront (called a co-payment) to the hospital in the following circumstances:</strong></p>
         <div class="tab">
            <ol>
               <li>Emerald/Ruby/Beryl/Sapphire | R1,000 per admission if pre-authorisation is NOT obtained from GEMS</li>
               <li>Emerald Value | R10,000 for VOLUNTARY use of a non-network hospital</li>
            </ol>
         </div>
<?php 
         if ($memrow['step4Radio'] == "noDeductibles") {
?>
         <script>
         $(document).ready(function() {
            $("#noDeductibles").prop("checked", true);
            $("#noDeductibles").removeAttr('disabled');
            $("#noDeductibles").parent().removeClass("mydisabled");
         });
         </script>
<?php
         } 
?>
         <div>
            <label id="lblnoDeductibles">
               <input id="noDeductibles" value="noDeductibles" type="radio" name="step4Radio"> Not willing to pay a co-payment
            </label>
         </div>
<?php 
         if ($memrow['step4Radio'] == "yesDeductibles") {
?>
         <script>
         $(document).ready(function() {
            $("#yesDeductibles").prop("checked", true);
            $("#yesDeductibles").removeAttr('disabled');
            $("#yesDeductibles").parent().removeClass("mydisabled");
         });
         </script>
<?php
         } 
?>
         <div>
             <label id="lblyesDeductibles">
                <input id="yesDeductibles" value="yesDeductibles" type="radio" name="step4Radio"> Willing to pay a co-payment
             </label>
         </div>
         <br>
         <p>*Based on steps 1 to 3, some options above may not be available to you.</p>
      </div>
      </div>

      <div class="wrap">
      <div class="box2 div1">
         <div class="box-header">
            <h1>Step 5: What is your family's out-of-hospital benefit (day-to-day) requirement for the upcoming year?</h1>
         </div>
         <p><strong>Below please indicate which statement best describes your family's requirement for day-to-day benefits, including professional services (e.g. GPs, specialists and psychologists), medicines (e.g. over-the-counter and prescribed), optical, dentistry, scopes and screening benefits for the upcoming year?</strong></p>
<?php 
         if ($memrow['step5Radio'] == "anyGP") {
?>
         <script>
         $(document).ready(function() {
            $("#anyGP").prop("checked", true);
            $("#anyGP").removeAttr('disabled');
            $("#anyGP").parent().removeClass("mydisabled");
            if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200" && $('input[type=radio][name=step3Radio]:Checked').val() == "Ext80CDL" && $('input[type=radio][name=step4Radio]:Checked').val() == "noDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "anyGP") {
               $("#bestPlan").text("Onyx");
               $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the GEMS Hospital Network");
               $("#resultChronic").text("Require cover for more than standard PMBs (Member=R17,146 | Family=R35,144)");
               $("#resultDeductibles").text("Not willing to pay a co-payment");
               $("#resultOOH").text("Consult any GP/Specialist within sub-limits and Block Benefit");
            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200" && $('input[type=radio][name=step3Radio]:Checked').val() == "Ext40CDL" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
               $("#bestPlan").text("Emerald");
               $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the GEMS Hospital Network");
               $("#resultChronic").text("Require cover for more than standard PMBs (Member=R10,041 | Family=R20,218)");
               $("#resultDeductibles").text("Willing to pay a co-payment");
               $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio100" && $('input[type=radio][name=step3Radio]:Checked').val() == "Ext40CDL" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
               $("#bestPlan").text("Emerald Value");
               $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the Emerald Value Hospital Network");
               $("#resultChronic").text("Require cover for more than standard PMBs (Member=R10,041 | Family=R20,218)");
               $("#resultDeductibles").text("Willing to pay a co-payment");
               $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200" && $('input[type=radio][name=step3Radio]:Checked').val() == "StdPMBsACCsFromMSA" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGPwithMSA") {
               $("#bestPlan").text("Ruby");
               $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the GEMS Hospital Network");
               $("#resultChronic").text("Require cover for standard PMBs and ACCs from a Medical Savings Account (MSA)");
               $("#resultDeductibles").text("Willing to pay a co-payment");
               $("#resultOOH").text("Consult a network GP/Specialist subject to available MSA and Block Benefit");
            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "limitedRadio100" && $('input[type=radio][name=step3Radio]:Checked').val() == "StdPMBsOnly" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
               $("#bestPlan").text("Beryl");
               $("#resultIH").text("Limited cover (R987,856 per family) up to 100% of the Scheme Tariff within the GEMS Hospital Network");
               $("#resultChronic").text("Require cover for standard PMBs only");
               $("#resultDeductibles").text("Willing to pay a co-payment");
               $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "limitedPMBRadio100" && $('input[type=radio][name=step3Radio]:Checked').val() == "StdPMBsOnly" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
               $("#bestPlan").text("Sapphire");
               $("#resultIH").text("Limited PMBs only cover (R186,385 per family) up to 100% of the Scheme Tariff within the GEMS Hospital Network");
               $("#resultChronic").text("Require cover for standard PMBs only");
               $("#resultDeductibles").text("Willing to pay a co-payment");
               $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
            }
         });
         </script>
<?php
         } 
?>
         <div>
            <label id="lblanyGP">
               <input id="anyGP" value="anyGP" type="radio" name="step5Radio"> Consult ANY GP/Specialist within the Scheme's sub-limits and Block Benefit
            </label>
         </div>
<?php 
         if ($memrow['step5Radio'] == "networkGP") {
?>
         <script>
         $(document).ready(function() {
            $("#networkGP").prop("checked", true);
            $("#networkGP").removeAttr('disabled');
            $("#networkGP").parent().removeClass("mydisabled");
            if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200" && $('input[type=radio][name=step3Radio]:Checked').val() == "Ext80CDL" && $('input[type=radio][name=step4Radio]:Checked').val() == "noDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "anyGP") {
               $("#bestPlan").text("Onyx");
               $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the GEMS Hospital Network");
               $("#resultChronic").text("Require cover for more than standard PMBs (Member=R17,146 | Family=R35,144)");
               $("#resultDeductibles").text("Not willing to pay a co-payment");
               $("#resultOOH").text("Consult any GP/Specialist within sub-limits and Block Benefit");
            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200" && $('input[type=radio][name=step3Radio]:Checked').val() == "Ext40CDL" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
               $("#bestPlan").text("Emerald");
               $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the GEMS Hospital Network");
               $("#resultChronic").text("Require cover for more than standard PMBs (Member=R10,041 | Family=R20,218)");
               $("#resultDeductibles").text("Willing to pay a co-payment");
               $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio100" && $('input[type=radio][name=step3Radio]:Checked').val() == "Ext40CDL" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
               $("#bestPlan").text("Emerald Value");
               $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the Emerald Value Hospital Network");
               $("#resultChronic").text("Require cover for more than standard PMBs (Member=R10,041 | Family=R20,218)");
               $("#resultDeductibles").text("Willing to pay a co-payment");
               $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200" && $('input[type=radio][name=step3Radio]:Checked').val() == "StdPMBsACCsFromMSA" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGPwithMSA") {
               $("#bestPlan").text("Ruby");
               $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the GEMS Hospital Network");
               $("#resultChronic").text("Require cover for standard PMBs and ACCs from a Medical Savings Account (MSA)");
               $("#resultDeductibles").text("Willing to pay a co-payment");
               $("#resultOOH").text("Consult a network GP/Specialist subject to available MSA and Block Benefit");
            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "limitedRadio100" && $('input[type=radio][name=step3Radio]:Checked').val() == "StdPMBsOnly" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
               $("#bestPlan").text("Beryl");
               $("#resultIH").text("Limited cover (R987,856 per family) up to 100% of the Scheme Tariff within the GEMS Hospital Network");
               $("#resultChronic").text("Require cover for standard PMBs only");
               $("#resultDeductibles").text("Willing to pay a co-payment");
               $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "limitedPMBRadio100" && $('input[type=radio][name=step3Radio]:Checked').val() == "StdPMBsOnly" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
               $("#bestPlan").text("Sapphire");
               $("#resultIH").text("Limited PMBs only cover (R186,385 per family) up to 100% of the Scheme Tariff within the GEMS Hospital Network");
               $("#resultChronic").text("Require cover for standard PMBs only");
               $("#resultDeductibles").text("Willing to pay a co-payment");
               $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
            }
         });
         </script>
<?php
         } 
?>
         <div>
            <label id="lblnetworkGP">
               <input id="networkGP" value="networkGP" type="radio" name="step5Radio"> Consult a NETWORK GP/Specialist only within the Scheme's sub-limits
            </label>
         </div>
<?php 
         if ($memrow['step5Radio'] == "networkGPwithMSA") {
?>
         <script>
         $(document).ready(function() {
            $("#networkGPwithMSA").prop("checked", true);
            $("#networkGPwithMSA").removeAttr('disabled');
            $("#networkGPwithMSA").parent().removeClass("mydisabled");

            if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200" && $('input[type=radio][name=step3Radio]:Checked').val() == "Ext80CDL" && $('input[type=radio][name=step4Radio]:Checked').val() == "noDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "anyGP") {
               $("#bestPlan").text("Onyx");
               $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the GEMS Hospital Network");
               $("#resultChronic").text("Require cover for more than standard PMBs (Member=R17,146 | Family=R35,144)");
               $("#resultDeductibles").text("Not willing to pay a co-payment");
               $("#resultOOH").text("Consult any GP/Specialist within sub-limits and Block Benefit");
            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200" && $('input[type=radio][name=step3Radio]:Checked').val() == "Ext40CDL" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
               $("#bestPlan").text("Emerald");
               $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the GEMS Hospital Network");
               $("#resultChronic").text("Require cover for more than standard PMBs (Member=R10,041 | Family=R20,218)");
               $("#resultDeductibles").text("Willing to pay a co-payment");
               $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio100" && $('input[type=radio][name=step3Radio]:Checked').val() == "Ext40CDL" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
               $("#bestPlan").text("Emerald Value");
               $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the Emerald Value Hospital Network");
               $("#resultChronic").text("Require cover for more than standard PMBs (Member=R10,041 | Family=R20,218)");
               $("#resultDeductibles").text("Willing to pay a co-payment");
               $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200" && $('input[type=radio][name=step3Radio]:Checked').val() == "StdPMBsACCsFromMSA" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGPwithMSA") {
               $("#bestPlan").text("Ruby");
               $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the GEMS Hospital Network");
               $("#resultChronic").text("Require cover for standard PMBs and ACCs from a Medical Savings Account (MSA)");
               $("#resultDeductibles").text("Willing to pay a co-payment");
               $("#resultOOH").text("Consult a network GP/Specialist subject to available MSA and Block Benefit");
            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "limitedRadio100" && $('input[type=radio][name=step3Radio]:Checked').val() == "StdPMBsOnly" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
               $("#bestPlan").text("Beryl");
               $("#resultIH").text("Limited cover (R987,856 per family) up to 100% of the Scheme Tariff within the GEMS Hospital Network");
               $("#resultChronic").text("Require cover for standard PMBs only");
               $("#resultDeductibles").text("Willing to pay a co-payment");
               $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
            } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "limitedPMBRadio100" && $('input[type=radio][name=step3Radio]:Checked').val() == "StdPMBsOnly" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
               $("#bestPlan").text("Sapphire");
               $("#resultIH").text("Limited PMBs only cover (R186,385 per family) up to 100% of the Scheme Tariff within the GEMS Hospital Network");
               $("#resultChronic").text("Require cover for standard PMBs only");
               $("#resultDeductibles").text("Willing to pay a co-payment");
               $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
            }
         });
         </script>
<?php
         } 
?>
         <div>
            <label id="lblnetworkGPwithMSA">
               <input id="networkGPwithMSA" value="networkGPwithMSA" type="radio" name="step5Radio"> Consult a NETWORK GP/Specialist only subject to available MSA and Block Benefit
            </label>
         </div>
      </div>
      <div class="box2 div2">
         <div class="box-header">
            <h1>Step 6: Needs Analysis</h1>
         </div>
         <p><strong>Most Appropriate Plan Option*</strong></p>
         <p>The GEMS plan option that best meets your requirements: <strong><span id="bestPlan">Plan option name</span></strong>
         <br>
         <p><strong>Summary of requirements</strong></p>
         <div class="tab">
            <ol>
               <li><span id="resultIH">IH cover</span></li>
               <li><span id="resultChronic">Chronic cover</span></li>
               <li><span id="resultDeductible">Deductible</span></li>
               <li><span id="resultOOH">OOH cover</span></li>
            </ol>
         </div>
         <p><strong>Important Notes</strong></p>
         <div class="tab">
            <ol>
               <li>The GEMS Wellness Benefit covers certain screening tests and preventative care paid from insured benefits</li>
               <li>Unused funds in your Medical Savings Account (MSA) will carry forward to the following benefit year on the Ruby plan option only.</li>
            </ol>
         </div>
      </div>
      </div>

      <div class="box2">
         <div class="box-header">
            <h1>Contributions</h1>
         </div>
         <table>
            <tr>
                  <th>Onyx</th>
                  <th>Emerald</th>
                  <th>Emerald Value</th>
                  <th>Ruby</th>
                  <th>Beryl</th>
                  <th>Sapphire</th>
            </tr>
            <tr>
               <td id="onyx_table">
                  <table>
                  <thead>
                  <tr>
                     <th></th>
                     <th>Monthly</th>
                     <th>Annual</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                     <th scope="row">Risk</th>
                     <td>R<span id="onyx_monthlyRisk"></span></td>
                     <td>R<span id="onyx_annualRisk"></span></td>
                  </tr>
                  <tr>
                     <th scope="row">Savings</th>
                     <td>R<span id="onyx_monthlySav"></span></td>
                     <td>R<span id="onyx_annualSav"></span></td>
                  </tr>
                  <tr>
                     <th scope="row">Total*</th>
                     <td>R<span id="onyx_monthlyTot"></span></td>
                     <td>R<span id="onyx_annualTot"></span></td>
                  </tr>
                  </tbody>
                  </table>
               </td>
               <td id="emerald_table">
                  <table>
                  <thead>
                  <tr>
                     <th></th>
                     <th>Monthly</th>
                     <th>Annual</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                     <th scope="row">Risk</th>
                     <td>R<span id="emerald_monthlyRisk"></span></td>
                     <td>R<span id="emerald_annualRisk"></span></td>
                  </tr>
                  <tr>
                     <th scope="row">Savings</th>
                     <td>R<span id="emerald_monthlySav"></span></td>
                     <td>R<span id="emerald_annualSav"></span></td>
                  </tr>
                  <tr>
                     <th scope="row">Total*</th>
                     <td>R<span id="emerald_monthlyTot"></span></td>
                     <td>R<span id="emerald_annualTot"></span></td>
                  </tr>
                  </tbody>
                  </table>
               </td>
               <td id="emerald_value_table">
                  <table>
                  <thead>
                  <tr>
                     <th></th>
                     <th>Monthly</th>
                     <th>Annual</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                     <th scope="row">Risk</th>
                     <td>R<span id="emerald_value_monthlyRisk"></span></td>
                     <td>R<span id="emerald_value_annualRisk"></span></td>
                  </tr>
                  <tr>
                     <th scope="row">Savings</th>
                     <td>R<span id="emerald_value_monthlySav"></span></td>
                     <td>R<span id="emerald_value_annualSav"></span></td>
                  </tr>
                  <tr>
                     <th scope="row">Total*</th>
                     <td>R<span id="emerald_value_monthlyTot"></span></td>
                     <td>R<span id="emerald_value_annualTot"></span></td>
                  </tr>
                  </tbody>
                  </table>
               </td>
               <td id="ruby_table">
                  <table>
                  <thead>
                  <tr>
                     <th></th>
                     <th>Monthly</th>
                     <th>Annual</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                     <th scope="row">Risk</th>
                     <td>R<span id="ruby_monthlyRisk"></span></td>
                     <td>R<span id="ruby_annualRisk"></span></td>
                  </tr>
                  <tr>
                     <th scope="row">Savings</th>
                     <td>R<span id="ruby_monthlySav"></span></td>
                     <td>R<span id="ruby_annualSav"></span></td>
                  </tr>
                  <tr>
                     <th scope="row">Total*</th>
                     <td>R<span id="ruby_monthlyTot"></span></td>
                     <td>R<span id="ruby_annualTot"></span></td>
                  </tr>
                  </tbody>
                  </table>
               </td>
               <td id="beryl_table">
                  <table>
                  <thead>
                  <tr>
                     <th></th>
                     <th>Monthly</th>
                     <th>Annual</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                     <th scope="row">Risk</th>
                     <td>R<span id="beryl_monthlyRisk"></span></td>
                     <td>R<span id="beryl_annualRisk"></span></td>
                  </tr>
                  <tr>
                     <th scope="row">Savings</th>
                     <td>R<span id="beryl_monthlySav"></span></td>
                     <td>R<span id="beryl_annualSav"></span></td>
                  </tr>
                  <tr>
                     <th scope="row">Total*</th>
                     <td>R<span id="beryl_monthlyTot"></span></td>
                     <td>R<span id="beryl_annualTot"></span></td>
                  </tr>
                  </tbody>
                  </table>
               </td>
               <td id="sapphire_table">
                  <table>
                  <thead>
                  <tr>
                     <th></th>
                     <th>Monthly</th>
                     <th>Annual</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                     <th scope="row">Risk</th>
                     <td>R<span id="sapphire_monthlyRisk"></span></td>
                     <td>R<span id="sapphire_annualRisk"></span></td>
                  </tr>
                  <tr>
                     <th scope="row">Savings</th>
                     <td>R<span id="sapphire_monthlySav"></span></td>
                     <td>R<span id="sapphire_annualSav"></span></td>
                  </tr>
                  <tr>
                     <th scope="row">Total*</th>
                     <td>R<span id="sapphire_monthlyTot"></span></td>
                     <td>R<span id="sapphire_annualTot"></span></td>
                  </tr>
                  </tbody>
                  </table>
               </td>
            </tr>
         </table>
      </div>

      <br>
      <button type="submit" class="button" value="hna_form" id="hna_formButton">Submit</button>
      </form>
   </div>
   </div>

   <div id="createcase">
         <button <?php if (!isset($memrow['id_number'])) { echo "style='display: none'"; } ?> id="createbutton" class="button">Create Case</button>
   </div>
   <br>
   <div id="newcasebox">
      <div id="createbox" class="box2 cases_new">
         <div class="box-header-edit">
            <h1>Create New Case<a id="close" class="close" href="#" style="background: none"><img src="img/close-icon-asi.png" alt="close" style="width:30px;height:30px;"></a></h1>
         </div>
         <form action="index.php?mod=add_case" method="post" id="newcase" name="newcase">
         <input type="hidden" id="create_date" name="create_date" value="<?php echo date("Y-m-d h:i:s"); ?>">
         <input type="hidden" id="persal_id" name="persal_id" value="<?php echo $memrow['id_number'] ?>">
         <input type="hidden" id="uniqueid" name="uniqueid" value="">
         <table class="cases_new">
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
                  <select id="type" class="button" name="qtype" onchange="getsubtype(this.value)">
                     <option value="">== choose one ==</option>
<?php
                     $result=mysql_query("SELECT uniqueid,name from query_type");
                     while($row = mysql_fetch_array($result))
                     {
                        echo "<option value='$row[0]'>$row[1]</option>";
                     }
?>
                  </select>
               </td>
               <td>
                  <select id="subtype" class="button" name="sub_qtype" onchange="getresdate(this.value)">
                  </select>
               </td>
               <td>
                  <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['user_session']['uid']; ?>">
                  <input class="hide" type="text" readonly id="user_name" name="user_name" value="<?php echo $_SESSION['user_session']['name']; ?>">
               </td>
               <td>
                  <input class="hide" type="text" readonly id="pendate" name="pendate" value="">
               </td>
               <td>
                  <label class="container">
                  <input name="closed" type="checkbox">
                  <span class="checkmark"></span> 
                  </label>
               </td>
               <td>
                  <label <?php if (isset($memrow['id_number'])) { echo "hidden"; } ?> id="recording" style="padding-left: 29px" class="container">
                  <input name="recording" type="checkbox">
                  <span class="checkmark"></span>Allocate Recording
                  </label>
               </td>
            </tr>
            <tr>
               <td>
                  <label>Notes</label>
               </td>
            </tr>
            <tr>
               <td colspan="6">
               <textarea style="resize: none;" id="notes" class="fsField" name="notes" rows="4" cols="100"></textarea>                  
               </td>
            </tr>
         </table>
         </form>
         <div align="center">
            <button type="submit" form="newcase" class="button" value="submit" id="submitButton" onclick="">Submit</button>
         </div>
      </div>
      <br>

      <div id="cases">
<?php
      $caseresult=mysql_query("SELECT cases.uniqueid as uniqueid,cases.qtype_id as qtype_id,query_type.name as query_name,sub_qtype_id as sub_query_id,sub_query_type.name as sub_query_name,cases.user_id as user_id,users.name as user_name,cases.res_date as res_date,close_date FROM cases LEFT JOIN query_type ON (cases.qtype_id = query_type.uniqueid) LEFT JOIN sub_query_type ON (sub_qtype_id = sub_query_type.uniqueid) LEFT JOIN users ON (cases.user_id = users.user_id) WHERE persal_id = '$memrow[id_number]' ORDER BY close_date DESC, uniqueid DESC");
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
         <input type="hidden" id="persal_id" name="persal_id" value="<?php echo $memrow['id_number']; ?>">
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
                  <label <?php if (isset($memrow['id_number'])) { echo "hidden"; } ?> id="recording" style="padding-left: 29px" class="container">
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
      </div>
   </div>
<?php
}

function add_case() {
   mysql_connect("localhost","root");
   @mysql_select_db(crm) or die( "Unable to select database");

   $create_date = $_POST['create_date'];
   $persal_id = $_POST['persal_id'];
   $qtype = $_POST['qtype'];
   $sub_qtype = $_POST['sub_qtype'];
   $user_id = $_POST['user_id'];
   $pendate = $_POST['pendate'];
   $notes = $_POST['notes'];

   if ($_POST['closed'] == "on") {
      $closed = date("Y-m-d h:i:s");
   } else {
      $closed = "Open";
   }

   mysql_query("INSERT INTO cases (persal_id,qtype_id,sub_qtype_id,user_id,create_date,res_date,close_date) VALUES ('$persal_id','$qtype','$sub_qtype','$user_id','$create_date','$pendate','$closed')");
   $case_id = mysql_insert_id();

   mysql_query("INSERT INTO notes (case_id,notes,user_id) VALUES ('$case_id','$notes','$user_id')");

   if ($_POST['recording'] == "on") {
      $uniqueid = $_POST['uniqueid'];
      mysql_query("INSERT INTO call_recordings (case_id,recording,date) VALUES ('$case_id','$uniqueid','$create_date')");
      file_put_contents("/var/spool/crm/monitor/$uniqueid.WAV", fopen("http://10.255.228.183/admin/monitor/$uniqueid.WAV", 'r'));
   }

   search($persal_id);   

   mysql_close();
}

function mod_case() {
   mysql_connect("localhost","root");
   @mysql_select_db(crm) or die( "Unable to select database");

   $case_id = $_POST['case_id'];
   $persal_id = $_POST['persal_id'];

   if (isset($_POST['closed'])) {
      if ($_POST['closed'] == "on") {
         $closed = date("Y-m-d h:i:s");
      } else {
         $closed = "Open";
      }
      mysql_query("UPDATE cases SET close_date = '$closed' WHERE uniqueid = '$case_id';");
   }

   if ($_POST['notes']!='') {
      $notes = $_POST['notes'];
      $user_id = $_POST['user_id'];
      mysql_query("INSERT INTO notes (case_id,notes,user_id) VALUES ('$case_id','$notes','$user_id')");
   }

   if ($_POST['recording'] == "on") {
      $uniqueid = $_POST['uniqueid'];
      $create_date = date("Y-m-d h:i:s");
      mysql_query("INSERT INTO call_recordings (case_id,recording,date) VALUES ('$case_id','$uniqueid','$create_date')");
      file_put_contents("/var/spool/crm/monitor/$uniqueid.WAV", fopen("http://10.255.228.183/admin/monitor/$uniqueid.WAV", 'r'));
   }

   search($persal_id);   

   mysql_close();   
}

function search($persal_id) {
   mysql_connect("localhost","root");
   @mysql_select_db(crm) or die( "Unable to select database");

   if (isset($_POST['id_number'])) {
      $id_number = $_POST['id_number'];
   } else {
      $id_number = $persal_id;
   }

   $member_number = $_POST['member_number'];
   $case_nr = $_POST['case_nr'];

   if ($id_number != "") {
      $memresult=mysql_query("SELECT * FROM persal LEFT JOIN members ON (beneficiary_id = id_number) LEFT JOIN hna ON (persal_id = id_number) WHERE id_number = '$id_number'");
      $memrow = mysql_fetch_array($memresult);
   } elseif ($member_number != "") {
      $memresult=mysql_query("SELECT * FROM persal LEFT JOIN members ON (beneficiary_id = id_number) LEFT JOIN hna ON (persal_id = id_number) WHERE member_number = '$member_number';");
      $memrow = mysql_fetch_array($memresult);
   } elseif ($case_nr != "") {
      $memresult=mysql_query("SELECT * FROM persal LEFT JOIN members ON (beneficiary_id = id_number) LEFT JOIN hna ON (hna.persal_id = id_number) LEFT JOIN cases ON (cases.persal_id = id_number) WHERE cases.uniqueid = '$case_nr';");
      $memrow = mysql_fetch_array($memresult);
   }

   new_client($memrow);

   mysql_close();
}

function add_member_details() {
   print_r($_POST);
}

?>
