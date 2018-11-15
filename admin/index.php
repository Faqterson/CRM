<?php 
   ob_start();

   include('include/checklogin.php');

   require 'autoload.php';
   $Config = new Config();
   $update = $Config->checkUpdate();
?>
<!doctype html>
<html class="touch-styles">
<head>
   <meta charset="utf-8" />
   <title>Desktop Group: Customized VoIP solutions, Software and Hardware providers</title>
   <link rel="stylesheet" type="text/css" href="css/site.css"/>

   <script type="text/javascript" src="js/jquery.min.js"></script>
   <script type="text/javascript" src="js/site.js"></script>

    <link rel="stylesheet" href="css/utilities.css" type="text/css">
    <link rel="stylesheet" href="css/frontend.css" type="text/css">
    <link rel="stylesheet" href="css/dcalendar.picker.css" type="text/css">

    <script src="js/jquery.knob.js" type="text/javascript"></script>
    <script src="js/esm.js" type="text/javascript"></script>
    <script src="js/dcalendar.picker.js" type="text/javascript"></script>
    <script>
    $(function(){
        $('.gauge').knob({
            'fontWeight': 'normal',
            'format' : function (value) {
                return value + '%';
            }
        });

        $('a.reload').click(function(e){
            e.preventDefault();
        });

        esm.getAll();

        <?php 
        if ($Config->get('esm:auto_refresh') > 0): 
        ?>
            setInterval(function(){ esm.getAll(); }, <?php echo $Config->get('esm:auto_refresh') * 1000; ?>);
        <?php 
        endif; 
        ?>
    });
    </script> 
    <script>
    $(document).ready(function() {
       $('#startdate').dcalendarpicker({
          format: 'yyyy-mm-dd'
       });
       $('#enddate').dcalendarpicker({
          format: 'yyyy-mm-dd'
       });
    });
    </script>

</head>

<body>
<div id="siteWrapper" class="clearfix">
<header id="header" class="show-on-scroll header">
   <div class="header-inner">
      <div class="wrapper" id="logoWrapper">
         <h1 id="logoImage">
            <a href="index.php"><img src="img/desktop.png" alt="Desktop Group: Customized VoIP solutions, Software and Hardware providers"/></a>
         </h1>
      </div>
      <div id="headerNav">
         <div class="nav-wrapper" id="mainNavWrapper">
            <nav>
               <div class="dropdown">
                  <a href="">System Setting</a>
                  <div class="dropdown-content">
                     <a href="index.php?mod=users">Users</a>
                     <a href="index.php?mod=asterisk">Asterisk</a>
                  </div>
               </div>         
               <div class="dropdown">
                  <a href="">CRM Setup</a>
                  <div class="dropdown-content">
                     <a href="index.php?mod=types">Types</a>
                  </div>
               </div>
               <div class="dropdown" style="padding-right: 50px">
                  <a href="">CRM Reports</a>
                  <div class="dropdown-content">
                     <a href="index.php?mod=callgraphs">Call Graphs</a>
                     <a href="index.php?mod=cdr">CDR's</a>
                     <a href="index.php?mod=ext_usage">Usage Report</a>
                  </div>
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
       if(!isset($_GET['mod'])) {
?>
     <div class="box " id="esm-load_average">
        <div class="box-header">
            <h1>Load Average</h1>
            <ul>
                <li><a href="#" class="reload" onclick="esm.reloadBlock('load_average');"><span class=reload>&#x21bb;</span></a></li>
            </ul>
        </div>

        <div class="box-content t-center">
            <div class="f-left w33p">
                <h3>1 min</h3>
                <input type="text" class="gauge" id="load-average_1" value="0" data-height="100" data-width="150" data-min="0" data-max="100" data-readOnly="true" data-fgColor="#BED7EB" data-angleOffset="-90" data-angleArc="180">
            </div>

            <div class="f-right w33p">
                <h3>15 min</h3>
                <input type="text" class="gauge" id="load-average_15" value="0" data-height="100" data-width="150" data-min="0" data-max="100" data-readOnly="true" data-fgColor="#BED7EB" data-angleOffset="-90" data-angleArc="180">
            </div>

            <div class="t-center">
                <h3>5 min</h3>
                <input type="text" class="gauge" id="load-average_5" value="0" data-height="100" data-width="150" data-min="0" data-max="100" data-readOnly="true" data-fgColor="#BED7EB" data-angleOffset="-90" data-angleArc="180">
            </div>
        </div>
    </div>

    <div class="box" id="esm-system">
        <div class="box-header">
            <h1>System</h1>
            <ul>
                <li><a href="#" class="reload" onclick="esm.reloadBlock('system');"><span class=reload>&#x21bb;</span></a></li>
            </ul>
        </div>
        <div class="box-content">
            <table class="firstBold">
                <tbody>
                    <tr>
                        <td>Hostname</td>
                        <td id="system-hostname"></td>
                    </tr>
                    <tr>
                        <td>OS</td>
                        <td id="system-os"></td>
                    </tr>
                    <tr>
                        <td>Kernel version</td>
                        <td id="system-kernel"></td>
                    </tr>
                    <tr>
                        <td>Uptime</td>
                        <td id="system-uptime"></td>
                    </tr>
                    <tr>
                        <td>Last boot</td>
                        <td id="system-last_boot"></td>
                    </tr>
                    <tr>
                        <td>Current user(s)</td>
                        <td id="system-current_users"></td>
                    </tr>
                    <tr>
                        <td>Server date & time</td>
                        <td id="system-server_date"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="box" id="esm-services">
         <div class="box-header">
             <h1>Services status</h1>
             <ul>
                 <li><a href="#" class="reload" onclick="esm.reloadBlock('services');"><span class=reload>&#x21bb;</span></a></li>
             </ul>
         </div>
         <div class="box-content">
             <table>
                 <tbody></tbody>
             </table>
         </div>
    </div>

    <div class="box" id="esm-disk">
        <div class="box-header">
            <h1>Disk usage</h1>
            <ul>
                <li><a href="#" class="reload" onclick="esm.reloadBlock('disk');"><span class=reload>&#x21bb;</span></a></li>
            </ul>
        </div>

        <div class="box-content">
            <table>
                <thead>
                    <tr>
                        <?php if ($Config->get('disk:show_filesystem')): ?>
                            <th class="w10p filesystem">Filesystem</th>
                        <?php endif; ?>
                        <th class="w20p">Mount</th>
                        <th>Use</th>
                        <th class="w15p">Free</th>
                        <th class="w15p">Used</th>
                        <th class="w15p">Total</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>

    <div class="box " id="esm-memory">
        <div class="box-header">
            <h1>Memory</h1>
            <ul>
                <li><a href="#" class="reload" onclick="esm.reloadBlock('memory');"><span class=reload>&#x21bb;</span></a></li>
            </ul>
        </div>

        <div class="box-content">
            <table class="firstBold">
                <tbody>
                    <tr>
                        <td class="w20p">Used %</td>
                        <td><div class="progressbar-wrap"><div class="progressbar" style="width: 0%;">0%</div></div></td>
                    </tr>
                    <tr>
                        <td class="w20p">Used</td>
                        <td id="memory-used"></td>
                    </tr>
                    <tr>
                        <td class="w20p">Free</td>
                        <td id="memory-free"></td>
                    </tr>
                    <tr>
                        <td class="w20p">Total</td>
                        <td id="memory-total"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="box " id="esm-cpu">
        <div class="box-header">
            <h1>CPU</h1>
            <ul>
                <li><a href="#" class="reload" onclick="esm.reloadBlock('cpu');"><span class=reload>&#x21bb;</span></a></li>
            </ul>
        </div>

        <div class="box-content">
            <table class="firstBold">
                <tbody>
                    <tr>
                        <td>Model</td>
                        <td id="cpu-model"></td>
                    </tr>
                    <tr>
                        <td>Cores</td>
                        <td id="cpu-num_cores"></td>
                    </tr>
                    <tr>
                        <td>Speed</td>
                        <td id="cpu-frequency"></td>
                    </tr>
                    <?php if ($Config->get('cpu:enable_temperature')): ?>
                        <tr>
                            <td>Temperature</td>
                            <td id="cpu-temp"></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
       } else {
          switch ($_GET['mod'])   {
             case 'users':
                   include_once "modules/users/users_func.php";
                   user();
             break;
             case 'add_user':
                   include_once "modules/users/users_func.php";
                   add_user();
             break;
             case 'add_user_details':
                   include_once "modules/users/users_func.php";
                   add_user_details();
             break;
             case 'modify_user':
                   include_once "modules/users/users_func.php";
                   modify_user();
             break;
             case 'modify_user_details':
                   include_once "modules/users/users_func.php";
                   modify_user_details();
             break;
             case 'delete_user':
                   include_once "modules/users/users_func.php";
                   delete_user();
             break;
             case 'asterisk':
                   include_once "modules/asterisk/asterisk_func.php";
                   asterisk();
             break;
             case 'add_asterisk':
                   include_once "modules/asterisk/asterisk_func.php";
                   add_asterisk();
             break;
             case 'types':
                   include_once "modules/type/type_func.php";
                   type();
             break;
             case 'add_type':
                   include_once "modules/type/type_func.php";
                    add_type();
             break;
             case 'add_type_details':
                   include_once "modules/type/type_func.php";
                    add_type_details();
             break;
             case 'modify_type':
                   include_once "modules/type/type_func.php";
                    modify_type();
             break;
             case 'modify_type_details':
                   include_once "modules/type/type_func.php";
                    modify_type_details();
             break;
             case 'delete_sub_type':
                   include_once "modules/type/type_func.php";
                    delete_sub_type();
             break;
             case 'delete_type':
                   include_once "modules/type/type_func.php";
                    delete_type();
             break;
          }
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

