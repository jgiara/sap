<?php 
ob_start();
session_start();
require_once '../../resources/init.php';
$general->logged_out_protect();
require '../include/helpers/userInfo.php';
require '../include/helpers/helpers.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Profile - Student Admission Program - Boston College</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom Override Bootstrap -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap-override.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">Student Admission Program</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <?php 
                    displayDropdownNav($fn, $ln);
                ?>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav side-scroll" id="side-menu">
                        <?php 
                            displayModules($roles);
                        ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper" style="overflow-x: auto;">
            <div class="row" style="maring-bottom: 0;">
                <div class="col-lg-12">
                    <h3 style="margin-top: 60px; margin-bottom: 0;" class="page-header" id="panels-header">My Profile</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#basic-info" data-toggle="tab">Personal Info</a>
                                </li>
                                <li><a href="#involvement" data-toggle="tab">Involvement</a>
                                </li>
                                <li><a href="#notes" data-toggle="tab">Notes</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="basic-info">
                               
                                    <table class="table" style="font-size: 14px; width: 100%;">
                                        <tr>
                                            <td><strong>First Name:</strong> <span id="firstNameSpan">Jon</span></td>
                                            <td><strong>Last Name:</strong> <span id="lastNameSpan">Giara</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email:</strong> <span id="emailSpan">giara@bc.edu</span></td>
                                            <td><strong>Eagle ID:</strong> <span id="eagleidSpan">16114836</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Sex:</strong> <span id="sexSpan">Male</span></td>
                                            <td><strong>Phone Number:</strong> <span id="phoneSpan">(508) 838-7443</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Class:</strong> <span id="classSpan">2017</span></td>
                                            <td><strong>School:</strong> <span id="schoolSpan">MCAS</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Major:</strong> <span id="majorSpan">Computer Science</span></td>
                                            <td><strong>Minor:</strong> <span id="minorSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Hometown:</strong> <span id="hometownSpan">Attleboro, MA</span></td>
                                            <td><strong>Local Address:</strong> <span id="localAddressSpan">Ignacio A53</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>AHANA:</strong> <span id="ahanaSpan">No</span></td>
                                            <td><strong>International:</strong> <span id="internationalSpan">No</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Transfer:</strong> <span id="transferSpan">No</span></td>
                                            <td><strong>Local Address:</strong> <span id="localAddressSpan">Ignacio A53</span></td>
                                        </tr>
                                        <tr>
                                            <td></td><td></td>
                                        </tr>
                                    </table>
                    
                                </div>
                                <div class="tab-pane fade" id="involvement">
                                
                                   Click <a href="./involvement.php">here</a> to see a more in-depth view of involvement</br></br>
                                    <h4>Office Programs</h4>
                                    
                                    <table class="table" style="font-size: 14px; width: 100%;">
                                        <tr>
                                            <th></th>
                                            <th>Complete</th>
                                            <th>Pending</th>
                                            <th>Incomplete</th>
                                        </tr>
                                        <tr>
                                            <td><strong>Panels</strong></td>
                                            <td><span id="panelsCompleteSpan">4</span></td>
                                            <td><span id="panelsPendingSpan">1</span></td>
                                            <td><span id="panelsIncompleteSpan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tours</strong></td>
                                            <td><span id="toursCompleteSpan">4</span></td>
                                            <td><span id="toursPendingSpan">1</span></td>
                                            <td><span id="toursIncompleteSpan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Greeting</strong></td>
                                            <td><span id="greetingCompleteSpan">4</span></td>
                                            <td><span id="greetingPendingSpan">1</span></td>
                                            <td><span id="greetingIncompleteSpan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Office Management</strong></td>
                                            <td><span id="omCompleteSpan">4</span></td>
                                            <td><span id="omPendingSpan">1</span></td>
                                            <td><span id="omIncompleteSpan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Eagle for a Day</strong></td>
                                            <td><span id="efadCompleteSpan">4</span></td>
                                            <td><span id="efadPendingSpan">1</span></td>
                                            <td><span id="efadIncompleteSpan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Admitted Eagle Day</strong></td>
                                            <td><span id="aedCompleteSpan">4</span></td>
                                            <td><span id="aedPendingSpan">1</span></td>
                                            <td><span id="aedIncompleteSpan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td></td><td></td> <td></td><td></td>
                                        </tr>
                                    </table>
                                   
                                    <h4>Outreach Programs</h4>
                                    <table class="table" style="font-size: 14px; width: 100%;">
                                        <tr>
                                            <th></th>
                                            <th>Complete</th>
                                            <th>Pending</th>
                                            <th>Incomplete</th>
                                        </tr>
                                        <tr>
                                            <td><strong>Outreach</strong></td>
                                            <td><span id="outreachCompleteSpan">4</span></td>
                                            <td><span id="outreachPendingSpan">1</span></td>
                                            <td><span id="outreachIncompleteSpan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>High School Visits</strong></td>
                                            <td><span id="hsvisitsCompleteSpan">4</span></td>
                                            <td><span id="hsvisitsPendingSpan">1</span></td>
                                            <td><span id="hsvisitsIncompleteSpan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>AHANA Outreach</strong></td>
                                            <td><span id="ahanaCompleteSpan">4</span></td>
                                            <td><span id="ahanaPendingSpan">1</span></td>
                                            <td><span id="ahanaIncompleteSpan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>International Outreach</strong></td>
                                            <td><span id="ioCompleteSpan">4</span></td>
                                            <td><span id="ioPendingSpan">1</span></td>
                                            <td><span id="ioIncompleteSpan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Transfer Outreach</strong></td>
                                            <td><span id="transferCompleteSpan">4</span></td>
                                            <td><span id="transferPendingSpan">1</span></td>
                                            <td><span id="transferIncompleteSpan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Media</strong></td>
                                            <td><span id="mediaCompleteSpan">4</span></td>
                                            <td><span id="mediaPendingSpan">1</span></td>
                                            <td><span id="mediaIncompleteSpan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td></td><td></td> <td></td><td></td>
                                        </tr>
                                    </table>
                                    
                                <div class="tab-pane fade" id="notes">
                                    <table id="notes-table">
                                        <tr class="notes-row">
                                            <td>10:00:02 07/20/16</br>Jon Giara - Head Coordinator</td>
                                            <td class="notes-data">This is my first note</td>
                                        </tr>
                                        <tr class="notes-row">
                                            <td>10:00:02 07/20/16</br>Jon Giara - Head Coordinator</td>
                                            <td class="notes-data">This is my first note sdkfhsd sdfkhdaf sdafhdsaf sdafasdhfkj dsjfkhdsa fdsafihdsaf dsafhsad,mf sdjkfhdsjb</br></br>this is a test to see</br>how many</br></br>breaks llok like</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                   
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>



    
    <script>
    $(document).ready(function() {
        var s = document.getElementById("table-semester");
        var selectedSemester = s.options[s.selectedIndex].value;
        var y = document.getElementById("table-year");
        var selectedYear = y.options[y.selectedIndex].value;
        $.getJSON("../include/getWeek.php", 
            {
                semester: selectedSemester,
                year: selectedYear
            }, function(data) {
                $.each(data, function(i, item) {
                        document.getElementById("table-week").innerHTML += "<option value ='" + item.week_id + "'>Week " + item.week_number + ": " + item.sunday_date.substring(5) + " - " + item.saturday_date.substring(5) + "</option>"; 
                });

            })
            .fail(function() {
                console.log("getJSON error");
            });
        hideSelects();
    // Setup - add a text input to each footer cell
        $('#table-volunteers thead td').each( function () {
            var title = $(this).text();
            $(this).css('text-align', 'center');
            $(this).html( '<input type="text"/>' );
            $(this).children('input').css('width', '100%');
        } );
     
        // DataTable
        var tableVols = $('#table-volunteers').DataTable({
            responsive: true,
            orderCellsTop: true,
            "columnDefs": [
            {
                "targets": [7],
                "visible": false,
                "orderable": false
                
            }]
        });
        var s = document.getElementById("table-semester");
        var selectedSemester = s.options[s.selectedIndex].value;
        var y = document.getElementById("table-year");
        var selectedYear = y.options[y.selectedIndex].value;
        $.getJSON("../include/getProgramVolunteers.php", 
            {
                program: "Panels",
                semester: selectedSemester,
                year: selectedYear
            }, function(data) {
                $.each(data, function(i, item) {
                    tableVols.row.add([
                        item.first_name,
                        item.last_name,
                        item.class,
                        item.school,
                        item.shift_day,
                        item.shift_time,
                        item.requirements_status,
                        item.eagle_id
                    ]);
                });
            })
            .fail(function() {
                console.log("getJSON error");
            });

            setTimeout(function() {
            tableVols.draw();
        }, 300);
     
        // Apply the search
        tableVols.columns().every(function (index) {
        $('#table-volunteers thead tr:eq(1) td:eq(' + index + ') input').on('keyup change', function () {
            tableVols.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
            } );
        } );
    
        $('#table-attendance thead td').each( function () {
            var title = $(this).text();
            $(this).css('text-align', 'center');
            $(this).html( '<input type="text"/>' );
            $(this).children('input').css('width', '100%');
        } );
     
        // DataTable
        var tableAttn = $('#table-attendance').DataTable({
            responsive: true,
            orderCellsTop: true,
            "columnDefs": [
            {
                "targets": [6,7],
                "visible": false,
                "orderable": false
                
            }]
        });
        setTimeout(function() {
        var s = document.getElementById("table-semester");
        var selectedSemester = s.options[s.selectedIndex].value;
        var y = document.getElementById("table-year");
        var selectedYear = y.options[y.selectedIndex].value;
        var w = document.getElementById("table-week");
        var selectedWeek = w.options[w.selectedIndex].value; //sometimes has an undefined value
        var d = document.getElementById("table-day");
        var selectedDay = d.options[d.selectedIndex].value;
        $.getJSON("../include/getProgramAttendance.php", 
            {
                program: "Panels",
                semester: selectedSemester,
                year: selectedYear,
                week: selectedWeek,
                day: selectedDay
            }, function(data) {
                $.each(data, function(i, item) {
                    tableAttn.row.add([
                        item.first_name,
                        item.last_name,
                        item.shift_day,
                        item.shift_time,
                        item.present,
                        item.note,
                        item.eagle_id,
                        item.attendance_id
                    ]);
                });
            })
            .fail(function() {
                console.log("getJSON error");
            });

            setTimeout(function() {
            tableAttn.draw();
        }, 300);
        }, 200);
     
        // Apply the search
        tableAttn.columns().every(function (index) {
        $('#table-attendance thead tr:eq(1) td:eq(' + index + ') input').on('keyup change', function () {
            tableAttn.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
            } );
        } );


        $('#semester-submit').on("click", function() {
            
            var s = document.getElementById("table-semester");
            var selectedSemester = s.options[s.selectedIndex].value;
            var y = document.getElementById("table-year");
            var selectedYear = y.options[y.selectedIndex].value;
            var w = document.getElementById("table-week");
            var selectedWeek = w.options[w.selectedIndex].value;
            var d = document.getElementById("table-day");
            var selectedDay = d.options[d.selectedIndex].value;
            
            tableVols.clear();
            tableAttn.clear();

            document.getElementById("table-week").innerHTML = "";
            $.getJSON("../include/getWeek.php", 
            {
                semester: selectedSemester,
                year: selectedYear
            }, function(data) {
                $.each(data, function(i, item) {
                         document.getElementById("table-week").innerHTML += "<option value ='" + item.week_id + "'>Week " + item.week_number + ": " + item.sunday_date.substring(5) + " - " + item.saturday_date.substring(5) + "</option>"; 
                });

            })
            .fail(function() {
                console.log("getJSON error");
            });

           

            //document.getElementById("panels-header").innerHTML = "HELLO";
            
            
            $.getJSON("../include/getProgramVolunteers.php", 
            {
                program: "Panels",
                semester: selectedSemester,
                year: selectedYear
            }, function(data) {
                $.each(data, function(i, item) {
                    tableVols.row.add([
                        item.first_name,
                        item.last_name,
                        item.class,
                        item.school,
                        item.shift_day,
                        item.shift_time,
                        item.requirements_status,
                        item.eagle_id
                    ]);
                });
            })
            .fail(function() {
                console.log("getJSON error");
            });

            setTimeout(function() {
            tableVols.draw();
        }, 300);

            $.getJSON("../include/getProgramAttendance.php", 
            {
                program: "Panels",
                semester: selectedSemester,
                year: selectedYear, 
                week: selectedWeek,
                day: selectedDay
            }, function(data) {
                $.each(data, function(i, item) {
                    tableAttn.row.add([
                        item.first_name,
                        item.last_name,
                        item.shift_day,
                        item.shift_time,
                        item.present,
                        item.note,
                        item.eagle_id,
                        item.attendance_id
                    ]);
                });
            })
            .fail(function() {
                console.log("getJSON error");
            });

            setTimeout(function() {
            tableAttn.draw();
        }, 300);

        
        $('#table-volunteers tbody').on('dblclick', 'td', function(e) {
            var currentEle = $(this);
            var valueT = $(this).html();
            var row = tableVols.cell($(this)).index().row;
            var column = tableVols.cell($(this)).index().column;
            if(column != 4 && column != 5 && column != 6) { //can't update User table
                return;
            }
            var data = tableVols.row(row).data();
            var updateField = ['first_name', 'last_name', 'class', 'school', 'shift_day', 'shift_time', 'requirements_status'];
            setTimeout(function() {
            $(currentEle).html('<input id="newvalue" class="thVal" type="text" value="' + valueT + '" />');
            $(".thVal").focus();
            $(".thVal").keyup(function (event) {
            if (event.keyCode == 13) {
               
                data[column] =  document.getElementById("newvalue").value.trim();
                tableVols.row(row).remove();
                $.post("../include/inlineUpdateTable.php",
                {
                    id : data[7],
                    field : updateField[column],
                    table : 'Program_Members',
                    newValue : data[column],
                    whereField : 'user'
                },
              function(data){
                if(data) {
                  
                }
                });

                setTimeout( function(){
                tableVols.row.add([
                    data[0],
                    data[1],
                    data[2],
                    data[3],
                    data[4],
                    data[5],
                    data[6],
                    data[7]

                ]).draw();
            }, 100);
            }
        });
        },50);
            $('tbody td').not(currentEle).on('click', function() {

                $(currentEle).html(valueT);
            });
            $(currentEle).on("dblclick", function() {
                $(currentEle).html(valueT);
            });  
        });
        $('#table-attendance tbody').on('dblclick', 'td', function(e) {
            var currentEle = $(this);
            var value = $(this).html();
            var row = tableAttn.cell($(this)).index().row;
            var column = tableAttn.cell($(this)).index().column;
            if(column != 2 && column != 3 && column != 4 && column != 5) { //can't update User table
                return;
            }
            var data = tableAttn.row(row).data();
            var updateField = ['first_name', 'last_name', 'shift_day', 'shift_time', 'present', 'note'];
            setTimeout(function(){
            $(currentEle).html('<input id="newvalue" class="thVal" type="text" value="' + value + '" />');
            $(".thVal").focus();
            $(".thVal").keyup(function (event) {
            if (event.keyCode == 13) {
               
                data[column] =  document.getElementById("newvalue").value.trim();
                tableAttn.row(row).remove();
                $.post("../include/inlineUpdateTable.php",
                {
                    id : data[7],
                    field : updateField[column],
                    table : 'Attendance',
                    newValue : data[column],
                    whereField : 'attendance_id'
                },
              function(data){
                if(data) {
                  
                }
                });

                setTimeout( function(){
                tableAttn.row.add([
                    data[0],
                    data[1],
                    data[2],
                    data[3],
                    data[4],
                    data[5],
                    data[6],
                    data[7]

                ]).draw();
            }, 100);
            }
        });
        },50);
            $('tbody td').not(currentEle).on('click', function() {

                $(currentEle).html(value);
            });
            $(currentEle).on("dblclick", function() {
                $(currentEle).html(value);
            });  
        });
        });
        $("#attendance-tab").on("click", function() {
            showSelects();
        });
        $("#volunteers-tab").on("click", function() {
            hideSelects();
        });
    });
    function hideSelects(){
        var weekSelect = document.getElementById("table-week");
        var daySelect = document.getElementById("table-day");
        //var newAttnButton = document.getElementById("newAttendance");
        //weekSelect.style.visibility = 'hidden';
        //daySelect.style.visibility = 'hidden';
        $('#table-week').attr('disabled', true);
        $('#table-day').attr('disabled', true);
        //newAttendance.style.visibility = 'hidden';
    }

    function showSelects(){
        var weekSelect = document.getElementById("table-week");
        var daySelect = document.getElementById("table-day");
        //var newAttnButton = document.getElementById("newAttendance");
        //weekSelect.style.visibility = 'visible';
        //daySelect.style.visibility = 'visible';
        $('#table-week').attr('disabled', false);
        $('#table-day').attr('disabled', false);
        //newAttendance.style.visibility = 'visible';
    }
    </script>

</body>

</html>
