$(document).ready(function(){

    function exportTableToCSV($table, filename) {
       var $rows = $table.find('tr:has(td)'),

       // Temporary delimiter characters unlikely to be typed by keyboard
       // This is to avoid accidentally splitting the actual contents
       tmpColDelim = String.fromCharCode(11), // vertical tab character
       tmpRowDelim = String.fromCharCode(0), // null character

       // actual delimiter characters for CSV format
       colDelim = '","',
       rowDelim = '"\r\n"',

       // Grab text from table into CSV formatted string
       csv = '"' + $rows.map(function(i, row) {
          var $row = $(row),
          $cols = $row.find('td');
          return $cols.map(function(j, col) {
             var $col = $(col),
             text = $col.text();
             return text.replace(/"/g, '""'); // escape double quotes
          }).get().join(tmpColDelim);

        }).get().join(tmpRowDelim)
        .split(tmpRowDelim).join(rowDelim)
        .split(tmpColDelim).join(colDelim) + '"';

      // Deliberate 'false', see comment below
      if (false && window.navigator.msSaveBlob) {

        var blob = new Blob([decodeURIComponent(csv)], {
          type: 'text/csv;charset=utf8'
        });

        // Crashes in IE 10, IE 11 and Microsoft Edge
        // See MS Edge Issue #10396033
        // Hence, the deliberate 'false'
        // This is here just for completeness
        // Remove the 'false' at your own risk
        window.navigator.msSaveBlob(blob, filename);

      } else if (window.Blob && window.URL) {
        // HTML5 Blob        
        var blob = new Blob([csv], {
          type: 'text/csv;charset=utf-8'
        });
        var csvUrl = URL.createObjectURL(blob);

        $(this)
          .attr({
            'download': filename,
            'href': csvUrl
          });
      } else {
        // Data URI
        var csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

        $(this)
          .attr({
            'download': filename,
            'href': csvData,
            'target': '_blank'
          });
      }
    }

    // This must be a hyperlink
    $(".export1").on('click', function(event) {
      // CSV
      var args = [$('#dvData1>table'), 'export.csv'];
      exportTableToCSV.apply(this, args);
      // If CSV, don't do event.preventDefault() or return false
      // We actually need this to be a typical hyperlink
    });

    $("#addButton").click(function() {
       $.post( "add_member.php", $("#crm :input").serialize(), function() {
          alert( "success" );
       }).fail(function() {
          alert( "error" );
       });
    });

    $("#createbox").hide();

    $( "#createbutton" ).click(function() {
       $("#createbox").show();
    });
    $( "#close" ).click(function() {
       $("#createbox").hide();
    });
    $( "#searchButton" ).click(function() {
       $("#recording").hide();
    });
    $( "#submitButton" ).click(function() {
       evtSource.addEventListener("message", handler);
       updateConnectionStatus('Connected', true);
    });
    $( "#modifyButton" ).click(function() {
       evtSource.addEventListener("message", handler);
       updateConnectionStatus('Connected', true);
    });

    $("#crm").show();
    $("#hna").hide();
    $("#menu1").addClass("active");

    $('ul li a').click(function(){
      $('li a').removeClass("active");
      $(this).addClass("active");
    });
    $("#menu1").click(function() { //event called
      $("#hna").hide();
      $("#crm").show();
    });
    $("#menu2").click(function() { //event called
      $("#crm").hide();
      $("#hna").show();
    });

    $('input[type=radio][name=step3Radio]').prop("checked", false);
    $('input[type=radio][name=step3Radio]').attr('disabled', 'disabled');
    $('input[type=radio][name=step3Radio]').parent().addClass("mydisabled");
    $('input[type=radio][name=step4Radio]').prop("checked", false);
    $('input[type=radio][name=step4Radio]').attr('disabled', 'disabled');
    $('input[type=radio][name=step4Radio]').parent().addClass("mydisabled");
    $('input[type=radio][name=step5Radio]').prop("checked", false);
    $('input[type=radio][name=step5Radio]').attr('disabled', 'disabled');
    $('input[type=radio][name=step5Radio]').parent().addClass("mydisabled");

    $('#onyx_table').addClass("mydisabled");
    $('#emerald_table').addClass("mydisabled");
    $('#emerald_value_table').addClass("mydisabled");
    $('#ruby_table').addClass("mydisabled");
    $('#beryl_table').addClass("mydisabled");
    $('#sapphire_table').addClass("mydisabled");

    // risk
    $("#onyx_monthlyRisk").text("");
    $("#onyx_annualRisk").text("");
    // savings
    $("#onyx_monthlySav").text("");
    $("#onyx_annualSav").text("");
    //total
    $("#onyx_monthlyTot").text("");
    $("#onyx_annualTot").text("");

    $('input[type=radio][name=step2Radio]').change(function() {
       $('input[type=radio][name=step3Radio]').prop("checked", false);
       $('input[type=radio][name=step3Radio]').attr('disabled', 'disabled');
       $('input[type=radio][name=step3Radio]').parent().addClass("mydisabled");

       $('input[type=radio][name=step4Radio]').prop("checked", false);
       $('input[type=radio][name=step4Radio]').attr('disabled', 'disabled');
       $('input[type=radio][name=step4Radio]').parent().addClass("mydisabled");

       $('input[type=radio][name=step5Radio]').prop("checked", false);
       $('input[type=radio][name=step5Radio]').attr('disabled', 'disabled');
       $('input[type=radio][name=step5Radio]').parent().addClass("mydisabled");

       $("#bestPlan").text("Plan option name");
       $("#resultIH").text("IH cover");
       $("#resultChronic").text("Chronic cover");
       $("#resultDeductibles").text("Deductible");
       $("#resultOOH").text("OOH cover");

       $('#onyx_table').addClass("mydisabled");
       $('#emerald_table').addClass("mydisabled");
       $('#emerald_value_table').addClass("mydisabled");
       $('#ruby_table').addClass("mydisabled");
       $('#beryl_table').addClass("mydisabled");
       $('#sapphire_table').addClass("mydisabled");

       if (this.value == "unlimitedRadio200") {
          $("#Ext80CDL").removeAttr('disabled'); 
          $("#Ext80CDL").parent().removeClass("mydisabled");      
          $("#Ext40CDL").removeAttr('disabled'); 
          $("#Ext40CDL").parent().removeClass("mydisabled");      
          $("#StdPMBsACCsFromMSA").removeAttr('disabled');
          $("#StdPMBsACCsFromMSA").parent().removeClass("mydisabled");
          $("#StdPMBsOnly").attr('disabled', 'disabled');
          $("#StdPMBsOnly").parent().addClass("mydisabled");
          $("#StdPMBsOnly").prop("checked", false);
       } else if (this.value == "unlimitedRadio100") {
          $("#Ext80CDL").attr('disabled', 'disabled'); 
          $("#Ext80CDL").parent().addClass("mydisabled");  
          $("#Ext80CDL").prop("checked", false);
          $("#Ext40CDL").removeAttr('disabled');
          $("#Ext40CDL").parent().removeClass("mydisabled");
          $("#StdPMBsACCsFromMSA").attr('disabled', 'disabled');
          $("#StdPMBsACCsFromMSA").parent().addClass("mydisabled");
          $("#StdPMBsACCsFromMSA").prop("checked", false);
          $("#StdPMBsOnly").attr('disabled', 'disabled');
          $("#StdPMBsOnly").parent().addClass("mydisabled");
          $("#StdPMBsOnly").prop("checked", false);
       } else if (this.value == "limitedRadio100") {
          $("#Ext80CDL").attr('disabled', 'disabled');
          $("#Ext80CDL").parent().addClass("mydisabled");
          $("#Ext80CDL").prop("checked", false);
          $("#Ext40CDL").attr('disabled', 'disabled');
          $("#Ext40CDL").parent().addClass("mydisabled");
          $("#Ext40CDL").prop("checked", false);
          $("#StdPMBsACCsFromMSA").attr('disabled', 'disabled');
          $("#StdPMBsACCsFromMSA").parent().addClass("mydisabled");
          $("#StdPMBsACCsFromMSA").prop("checked", false);
          $("#StdPMBsOnly").removeAttr('disabled');
          $("#StdPMBsOnly").parent().removeClass("mydisabled");
       } else if (this.value == "limitedPMBRadio100") {
          $("#Ext80CDL").attr('disabled', 'disabled');
          $("#Ext80CDL").parent().addClass("mydisabled");
          $("#Ext80CDL").prop("checked", false);
          $("#Ext40CDL").attr('disabled', 'disabled');
          $("#Ext40CDL").parent().addClass("mydisabled");
          $("#Ext40CDL").prop("checked", false);
          $("#StdPMBsACCsFromMSA").attr('disabled', 'disabled');
          $("#StdPMBsACCsFromMSA").parent().addClass("mydisabled");
          $("#StdPMBsACCsFromMSA").prop("checked", false);
          $("#StdPMBsOnly").removeAttr('disabled');
          $("#StdPMBsOnly").parent().removeClass("mydisabled");
       }
    });
    $('input[type=radio][name=step3Radio]').change(function() {
       $('input[type=radio][name=step4Radio]').prop("checked", false);
       $('input[type=radio][name=step4Radio]').attr('disabled', 'disabled');
       $('input[type=radio][name=step4Radio]').parent().addClass("mydisabled");

       $('input[type=radio][name=step5Radio]').prop("checked", false);
       $('input[type=radio][name=step5Radio]').attr('disabled', 'disabled');
       $('input[type=radio][name=step5Radio]').parent().addClass("mydisabled");

       $("#bestPlan").text("Plan option name");
       $("#resultIH").text("IH cover");
       $("#resultChronic").text("Chronic cover");
       $("#resultDeductibles").text("Deductible");
       $("#resultOOH").text("OOH cover");

       $('#onyx_table').addClass("mydisabled");
       $('#emerald_table').addClass("mydisabled");
       $('#emerald_value_table').addClass("mydisabled");
       $('#ruby_table').addClass("mydisabled");
       $('#beryl_table').addClass("mydisabled");
       $('#sapphire_table').addClass("mydisabled");

       if ( $('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200") {
          if (this.value == "Ext80CDL") {
             $("#noDeductibles").removeAttr('disabled'); 
             $("#noDeductibles").parent().removeClass("mydisabled");
             $("#yesDeductibles").attr('disabled', 'disabled');
             $("#yesDeductibles").parent().addClass("mydisabled");
             $("#yesDeductibles").prop("checked", false);
          } else {
             $("#noDeductibles").attr('disabled', 'disabled');
             $("#noDeductibles").parent().addClass("mydisabled");
             $("#noDeductibles").prop("checked", false);
             $("#yesDeductibles").removeAttr('disabled');
             $("#yesDeductibles").parent().removeClass("mydisabled");
          } 
       } else {
          $("#noDeductibles").attr('disabled', 'disabled');
          $("#noDeductibles").parent().addClass("mydisabled");
          $("#noDeductibles").prop("checked", false);
          $("#yesDeductibles").removeAttr('disabled'); // enable it       // show the radio button => $("#unlimitedRadio200").parent().show();
          $("#yesDeductibles").parent().removeClass("mydisabled");      // remove the grey
       }
    });
    $('input[type=radio][name=step4Radio]').change(function() {
       $('input[type=radio][name=step5Radio]').prop("checked", false);
       $('input[type=radio][name=step5Radio]').attr('disabled', 'disabled');
       $('input[type=radio][name=step5Radio]').parent().addClass("mydisabled");

       $("#bestPlan").text("Plan option name");
       $("#resultIH").text("IH cover");
       $("#resultChronic").text("Chronic cover");
       $("#resultDeductibles").text("Deductible");
       $("#resultOOH").text("OOH cover");

       $('#onyx_table').addClass("mydisabled");
       $('#emerald_table').addClass("mydisabled");
       $('#emerald_value_table').addClass("mydisabled");
       $('#ruby_table').addClass("mydisabled");
       $('#beryl_table').addClass("mydisabled");
       $('#sapphire_table').addClass("mydisabled");

        if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200" && $('input[type=radio][name=step3Radio]:Checked').val() == "Ext80CDL" && $('input[type=radio][name=step4Radio]:Checked').val() == "noDeductibles") {
            $("#anyGP").removeAttr('disabled'); // enable it         // hide it completely => $("#unlimitedRadio200").parent().hide();
            $("#anyGP").parent().removeClass("mydisabled");	 // remove the grey
            $("#networkGP").attr('disabled', 'disabled'); // disable	  // show the radio button => $("#unlimitedRadio200").parent().show();
            $("#networkGP").parent().addClass("mydisabled");  // grey it out & disable link
            $("#networkGP").prop("checked", false);        // make sure its not selected
            $("#networkGPwithMSA").attr('disabled', 'disabled'); // disable	 // show the radio button => $("#unlimitedRadio200").parent().show();$
            $("#networkGPwithMSA").parent().addClass("mydisabled");  // grey it out & disable link
            $("#networkGPwithMSA").prop("checked", false);        // make sure its not selected
        } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200" && $('input[type=radio][name=step3Radio]:Checked').val() == "Ext40CDL" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles") {
            $("#anyGP").attr('disabled', 'disabled'); // disable      // show the radio button => $("#unlimitedRadio200").parent().show();
            $("#anyGP").parent().addClass("mydisabled");  // grey it out & disable link
            $("#anyGP").prop("checked", false);        // make sure its not selected
            $("#networkGP").removeAttr('disabled'); // enable it         // hide it completely => $("#unlimitedRadio200").parent().hide();
            $("#networkGP").parent().removeClass("mydisabled");      // remove the grey
            $("#networkGPwithMSA").attr('disabled', 'disabled'); // disable	 // show the radio button => $("#unlimitedRadio200").parent().show();$
            $("#networkGPwithMSA").parent().addClass("mydisabled");  // grey it out & disable link
            $("#networkGPwithMSA").prop("checked", false);        // make sure its not selected
        } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200" && $('input[type=radio][name=step3Radio]:Checked').val() == "StdPMBsACCsFromMSA" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles") {
            $("#anyGP").attr('disabled', 'disabled'); // disable      // show the radio button => $("#unlimitedRadio200").parent().show();
            $("#anyGP").parent().addClass("mydisabled");  // grey it out & disable link
            $("#anyGP").prop("checked", false);        // make sure its not selected
            $("#networkGP").attr('disabled', 'disabled'); // disable      // show the radio button => $("#unlimitedRadio200").parent().show();
            $("#networkGP").parent().addClass("mydisabled");  // grey it out & disable link
            $("#networkGP").prop("checked", false);        // make sure its not selected
            $("#networkGPwithMSA").removeAttr('disabled'); // enable it         // hide it completely => $("#unlimitedRadio200").parent().hide();
            $("#networkGPwithMSA").parent().removeClass("mydisabled");      // remove the grey
	} else if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio100" && $('input[type=radio][name=step3Radio]:Checked').val() == "Ext40CDL" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles") {
	    $("#anyGP").attr('disabled', 'disabled'); // disable      // show the radio button => $("#unlimitedRadio200").parent().show();
            $("#anyGP").parent().addClass("mydisabled");  // grey it out & disable link
            $("#anyGP").prop("checked", false);        // make sure its not selected
            $("#networkGP").removeAttr('disabled'); // enable it         // hide it completely => $("#unlimitedRadio200").parent().hide();
            $("#networkGP").parent().removeClass("mydisabled");      // remove the grey
            $("#networkGPwithMSA").attr('disabled', 'disabled'); // disable      // show the radio button => $("#unlimitedRadio200").parent().show();$
            $("#networkGPwithMSA").parent().addClass("mydisabled");  // grey it out & disable link
            $("#networkGPwithMSA").prop("checked", false);        // make sure its not selected
        } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "limitedRadio100" && $('input[type=radio][name=step3Radio]:Checked').val() == "StdPMBsOnly" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles") {
            $("#anyGP").attr('disabled', 'disabled'); // disable      // show the radio button => $("#unlimitedRadio200").parent().show();
            $("#anyGP").parent().addClass("mydisabled");  // grey it out & disable link
            $("#anyGP").prop("checked", false);        // make sure its not selected
            $("#networkGP").removeAttr('disabled'); // enable it         // hide it completely => $("#unlimitedRadio200").parent().hide();
            $("#networkGP").parent().removeClass("mydisabled");      // remove the grey
            $("#networkGPwithMSA").attr('disabled', 'disabled'); // disable	 // show the radio button => $("#unlimitedRadio200").parent().show();$
            $("#networkGPwithMSA").parent().addClass("mydisabled");  // grey it out & disable link
            $("#networkGPwithMSA").prop("checked", false);        // make sure its not selected
        } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "limitedPMBRadio100" && $('input[type=radio][name=step3Radio]:Checked').val() == "StdPMBsOnly" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles") {
            $("#anyGP").attr('disabled', 'disabled'); // disable      // show the radio button => $("#unlimitedRadio200").parent().show();
            $("#anyGP").parent().addClass("mydisabled");  // grey it out & disable link
            $("#anyGP").prop("checked", false);        // make sure its not selected
            $("#networkGP").removeAttr('disabled'); // enable it         // hide it completely => $("#unlimitedRadio200").parent().hide();
            $("#networkGP").parent().removeClass("mydisabled");      // remove the grey
            $("#networkGPwithMSA").attr('disabled', 'disabled'); // disable	 // show the radio button => $("#unlimitedRadio200").parent().show();$
            $("#networkGPwithMSA").parent().addClass("mydisabled");  // grey it out & disable link
            $("#networkGPwithMSA").prop("checked", false);        // make sure its not selected
        }
    });
    $('input[type=radio][name=step5Radio]').change(function() { 
            var adultDeps = $("#dep_adult").val();
            var childDeps = $("#dep_adult").val();
            var monthly_salary = $("#salary_amount").val();

            if (monthly_salary < '12760') {
               var plan = "Onyx<1";
            } else if (monthly_salary > '12760' & monthly_salary < '27189') {
               var plan = "Onyx>1";
            } else if (monthly_salary > '27189') {
               var plan = "Onyx>2";
            }

            var fresultRisk = Risk(2018, plan, adultDeps, childDeps);
            var fresultSav = MSA(2018, plan, adultDeps, childDeps);
            var fresultTot = Risk(2018, plan, adultDeps, childDeps) + MSA(2018, plan, adultDeps, childDeps);

            // risk
            $("#onyx_monthlyRisk").text(fresultRisk);
            $("#onyx_annualRisk").text(fresultRisk * 12);
            // savings
            $("#onyx_monthlySav").text(fresultSav);
            $("#onyx_annualSav").text(fresultSav * 12);
            //total
            $("#onyx_monthlyTot").text(fresultTot);
            $("#onyx_annualTot").text(fresultTot * 12);

            if (monthly_salary < '12760') {
               var plan = "Emerald<1";
            } else if (monthly_salary > '12760' & monthly_salary < '27189') {
               var plan = "Emerald>1";
            } else if (monthly_salary > '27189') {
               var plan = "Emerald>2";
            }

            var fresultRisk = Risk(2018, plan, adultDeps, childDeps);
            var fresultSav = MSA(2018, plan, adultDeps, childDeps);
            var fresultTot = Risk(2018, plan, adultDeps, childDeps) + MSA(2018, plan, adultDeps, childDeps);

            // risk
            $("#emerald_monthlyRisk").text(fresultRisk);
            $("#emerald_annualRisk").text(fresultRisk * 12);
            // savings
            $("#emerald_monthlySav").text(fresultSav);
            $("#emerald_annualSav").text(fresultSav * 12);
            //total
            $("#emerald_monthlyTot").text(fresultTot);
            $("#emerald_annualTot").text(fresultTot * 12);

            if (monthly_salary < '12760') {
               var plan = "Emerald_Value<1";
            } else if (monthly_salary > '12760' & monthly_salary < '27189') {
               var plan = "Emerald_Value>1";
            } else if (monthly_salary > '27189') {
               var plan = "Emerald_Value>2";
            }

            var fresultRisk = Risk(2018, plan, adultDeps, childDeps);
            var fresultSav = MSA(2018, plan, adultDeps, childDeps);
            var fresultTot = Risk(2018, plan, adultDeps, childDeps) + MSA(2018, plan, adultDeps, childDeps);

            // risk
            $("#emerald_value_monthlyRisk").text(fresultRisk);
            $("#emerald_value_annualRisk").text(fresultRisk * 12);
            // savings
            $("#emerald_value_monthlySav").text(fresultSav);
            $("#emerald_value_annualSav").text(fresultSav * 12);
            //total
            $("#emerald_value_monthlyTot").text(fresultTot);
            $("#emerald_value_annualTot").text(fresultTot * 12);

            if (monthly_salary < '12760') {
               var plan = "Ruby<1";
            } else if (monthly_salary > '12760' & monthly_salary < '27189') {
               var plan = "Ruby>1";
            } else if (monthly_salary > '27189') {
               var plan = "Ruby>2";
            }

            var fresultRisk = Risk(2018, plan, adultDeps, childDeps);
            var fresultSav = MSA(2018, plan, adultDeps, childDeps);
            var fresultTot = Risk(2018, plan, adultDeps, childDeps) + MSA(2018, plan, adultDeps, childDeps);

            // risk
            $("#ruby_monthlyRisk").text(fresultRisk);
            $("#ruby_annualRisk").text(fresultRisk * 12);
            // savings
            $("#ruby_monthlySav").text(fresultSav);
            $("#ruby_annualSav").text(fresultSav * 12);
            //total
            $("#ruby_monthlyTot").text(fresultTot);
            $("#ruby_annualTot").text(fresultTot * 12);

            if (monthly_salary < '12760') {
               var plan = "Beryl<1";
            } else if (monthly_salary > '12760' & monthly_salary < '27189') {
               var plan = "Beryl>1";
            } else if (monthly_salary > '27189') {
               var plan = "Beryl>2";
            }

            var fresultRisk = Risk(2018, plan, adultDeps, childDeps);
            var fresultSav = MSA(2018, plan, adultDeps, childDeps);
            var fresultTot = Risk(2018, plan, adultDeps, childDeps) + MSA(2018, plan, adultDeps, childDeps);

            // risk
            $("#beryl_monthlyRisk").text(fresultRisk);
            $("#beryl_annualRisk").text(fresultRisk * 12);
            // savings
            $("#beryl_monthlySav").text(fresultSav);
            $("#beryl_annualSav").text(fresultSav * 12);
            //total
            $("#beryl_monthlyTot").text(fresultTot);
            $("#beryl_annualTot").text(fresultTot * 12);

            if (monthly_salary < '12760') {
               var plan = "Sapphire<1";
            } else if (monthly_salary > '12760' & monthly_salary < '27189') {
               var plan = "Sapphire>1";
            } else if (monthly_salary > '27189') {
               var plan = "Sapphire>2";
            }

            var fresultRisk = Risk(2018, plan, adultDeps, childDeps);
            var fresultSav = MSA(2018, plan, adultDeps, childDeps);
            var fresultTot = Risk(2018, plan, adultDeps, childDeps) + MSA(2018, plan, adultDeps, childDeps);

            // risk
            $("#sapphire_monthlyRisk").text(fresultRisk);
            $("#sapphire_annualRisk").text(fresultRisk * 12);
            // savings
            $("#sapphire_monthlySav").text(fresultSav);
            $("#sapphire_annualSav").text(fresultSav * 12);
            //total
            $("#sapphire_monthlyTot").text(fresultTot);
            $("#sapphire_annualTot").text(fresultTot * 12);

//        alert($('input[type=radio][name=step2Radio]:Checked').val()+"--"+$('input[type=radio][name=step3Radio]:Checked').val()+"--"+$('input[type=radio][name=step4Radio]:Checked').val()+"--"+$('input[type=radio][name=step5Radio]:Checked').val());

        if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200" && $('input[type=radio][name=step3Radio]:Checked').val() == "Ext80CDL" && $('input[type=radio][name=step4Radio]:Checked').val() == "noDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "anyGP") {
            $("#bestPlan").text("Onyx");
            $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the GEMS Hospital Network");
            $("#resultChronic").text("Require cover for more than standard PMBs (Member=R17,146 | Family=R35,144)");
            $("#resultDeductibles").text("Not willing to pay a co-payment");
            $("#resultOOH").text("Consult any GP/Specialist within sub-limits and Block Benefit");
            $("#onyx_table").removeClass("mydisabled");
        } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200" && $('input[type=radio][name=step3Radio]:Checked').val() == "Ext40CDL" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
            $("#bestPlan").text("Emerald");
            $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the GEMS Hospital Network");
            $("#resultChronic").text("Require cover for more than standard PMBs (Member=R10,041 | Family=R20,218)");
            $("#resultDeductibles").text("Willing to pay a co-payment");
            $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
            $("#emerald_table").removeClass("mydisabled");
        } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio100" && $('input[type=radio][name=step3Radio]:Checked').val() == "Ext40CDL" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
            $("#bestPlan").text("Emerald Value");
            $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the Emerald Value Hospital Network");
            $("#resultChronic").text("Require cover for more than standard PMBs (Member=R10,041 | Family=R20,218)");
            $("#resultDeductibles").text("Willing to pay a co-payment");
            $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
            $("#emerald_value_table").removeClass("mydisabled");
        } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "unlimitedRadio200" && $('input[type=radio][name=step3Radio]:Checked').val() == "StdPMBsACCsFromMSA" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGPwithMSA") {
            $("#bestPlan").text("Ruby");
            $("#resultIH").text("Unlimited cover up to 100% of the Scheme Tariff within the GEMS Hospital Network");
            $("#resultChronic").text("Require cover for standard PMBs and ACCs from a Medical Savings Account (MSA)");
            $("#resultDeductibles").text("Willing to pay a co-payment");
            $("#resultOOH").text("Consult a network GP/Specialist subject to available MSA and Block Benefit");
            $("#ruby_table").removeClass("mydisabled");
        } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "limitedRadio100" && $('input[type=radio][name=step3Radio]:Checked').val() == "StdPMBsOnly" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
            $("#bestPlan").text("Beryl");
            $("#resultIH").text("Limited cover (R987,856 per family) up to 100% of the Scheme Tariff within the GEMS Hospital Network");
            $("#resultChronic").text("Require cover for standard PMBs only");
            $("#resultDeductibles").text("Willing to pay a co-payment");
            $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
            $("#beryl_table").removeClass("mydisabled");
        } else if ($('input[type=radio][name=step2Radio]:Checked').val() == "limitedPMBRadio100" && $('input[type=radio][name=step3Radio]:Checked').val() == "StdPMBsOnly" && $('input[type=radio][name=step4Radio]:Checked').val() == "yesDeductibles" && $('input[type=radio][name=step5Radio]:Checked').val() == "networkGP") {
            $("#bestPlan").text("Sapphire");
            $("#resultIH").text("Limited PMBs only cover (R186,385 per family) up to 100% of the Scheme Tariff within the GEMS Hospital Network");
            $("#resultChronic").text("Require cover for standard PMBs only");
            $("#resultDeductibles").text("Willing to pay a co-payment");
            $("#resultOOH").text("Consult a network GP/Specialist within sub-limits");
            $("#sapphire_table").removeClass("mydisabled");
        }
    });
});
 
