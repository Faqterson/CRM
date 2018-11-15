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

    $(".delete").click(function(){
        return window.confirm("Are you sure?");
    });

    var counter = 1;
    $("#add_sub_cat").click(function () {
       $('<tr>').html('<td>'+counter+'</td><td><input id="textbox'+ counter + '" name="sub_cat[' + counter + ']" type="text"><label style="padding-left: 10%">Resolution Date:</label><select name="res_date' + counter + '" class="button" id="selectbox'+ counter + '" style="margin-left: 20px"><option value="24">24 Hours</option><option value="48">48 Hours</option><option value="72">72 Hours</option><option value="96">96 Hours</option></select></td>')
       .appendTo( '#TextBoxesGroup' )
       counter++;
    });

    $("#modify_sub_cat").click(function () {
       var counter2 = $("#sub_counter").val();
       $('<tr>').html('<td>'+counter2+'</td><td><input id="textbox'+ counter2 + '" name="sub_cat[' + counter2 + ']" type="text"><label style="padding-left: 10%">Resolution Date:</label><select name="res_date'+ counter2 +'" class="button" id="selectbox'+ counter2 +'" style="margin-left: 20px"><option value="24">24 Hours</option><option value="48">48 Hours</option><option value="72">72 Hours</option><option value="96">96 Hours</option></select></td>')
       .appendTo( '#TextBoxesGroup' )
       counter2++;
       $("#sub_counter").val(counter2);
     });


});
 
