<?php 
ob_start();
session_start();
require_once '../../resources/init.php';
$general->logged_out_protect();
require '../include/helpers/userInfo.php';
require '../include/helpers/helpers.php';
require '../include/helpers/pageProtect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panels - Student Admission Program - Boston College</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom Override Bootstrap -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap-override.css" rel="stylesheet">
    

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
                    <h3 style="margin-top: 60px; margin-bottom: 0;" class="page-header" id="panels-header">Panels</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style="margin-bottom: 0;">
                <div class="col-lg-12">
                    
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <div class="col-xs-2">
                                <select name="table-semester" class="form-control form-control-xs" id="table-semester" style="text-align: right;">
                                        <?php
                                            $currMonth = date("n");
                                            $currSemester = "Fall";
                                            if($currMonth < 8) {
                                                $currSemester = "Spring";
                                            }
                                            echo "<option value='Fall'";
                                            if($currSemester == "Fall") {
                                                echo "selected='selected'>Fall</option>";
                                            }
                                            else {
                                                echo ">Fall</option>";
                                            }
                                            echo "<option value='Spring'";
                                            if($currSemester == "Spring") {
                                                echo "selected='selected'>Spring</option>";
                                            }
                                            else {
                                                echo ">Spring</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xs-2">
                                    <select name="table-year" class="form-control form-control-xs" id="table-year" style="text-align: right;">
                                        <?php
                                            $currYear = date("Y");
                                            $yearHolder = $currYear;
                                            echo "<option value='".$yearHolder."' selected='selected'>".$yearHolder."</option>";
                                            $yearHolder--;
                                            while($yearHolder >= 2016) {
                                                echo "<option value='".$yearHolder."'>".$yearHolder."</option>";
                                                $yearHolder--;
                                            }
                                        ?>
                                    </select>

                                </div>
                                <div class="col-xs-3">
                                    <select name="table-week" class="form-control form-control-xs" id="table-week" style="text-align: right;">
                                      
                                    </select>

                                </div>
                                <div class="col-xs-2">
                                    <select name="table-day" class="form-control form-control-xs" id="table-day" style="text-align: right;">
                                        <option value ="day">All</option>
                                        <option value="Sunday" <?php $day = date("w"); if($day == 0){ echo "selected='selected'";}?> >Sunday</option>
                                        <option value="Monday" <?php $day = date("w"); if($day == 1) {echo "selected='selected'";}?> >Monday</option>
                                        <option value="Tuesday" <?php $day = date("w"); if($day == 2) {echo "selected='selected'";}?> >Tuesday</option>
                                        <option value="Wednesday" <?php $day = date("w"); if($day == 3) {echo "selected='selected'";}?> >Wednesday</option>
                                        <option value="Thursday" <?php $day = date("w"); if($day == 4) {echo "selected='selected'";}?> >Thursday</option>
                                        <option value="Friday" <?php $day = date("w"); if($day == 5) {echo "selected='selected'";}?> >Friday</option>
                                        <option value="Saturday" <?php $day = date("w"); if($day == 6) {echo "selected='selected'";}?> >Saturday</option>

                                    </select>

                                </div>
                                <button class="btn btn-primary" id="semester-submit">Go</button>
                                <!--<button class="btn btn-success" id="newAttendance" style="margin-left: 10px;">Populate Sheet</button>-->
    
                            <ul id="tabs-list" class="nav nav-tabs" style="margin-top: 10px;">
                                <li id="volunteers-tab" class="active"><a href="#volunteers" data-toggle="tab">Volunteers</a>
                                </li>
                                <li id="attendance-tab"><a href="#attendance" data-toggle="tab">Attendance</a>
                                </li>
                                
                                
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                    <div class="tab-pane fade in active" id="volunteers">
                                        <button class="btn btn-primary btn-xs" id="export-excel-volunteers">Excel</button>
                                        <button class="btn btn-primary btn-xs" id="export-csv-volunteers">CSV</button>
                                        <button class="btn btn-primary btn-xs" id="export-pdf-volunteers">PDF</button>
                                    </br>
                                    Toggle column: 
                                    <a href='#' class='toggle-vis-vols' id='volsCol0'>First Name</a>
                                    <a href='#' class='toggle-vis-vols' id='volsCol1'>Last Name</a>
                                    <a href='#' class='toggle-vis-vols' id='volsCol2'>Email</a>
                                    <a href='#' class='toggle-vis-vols' id='volsCol3'>Class</a>
                                    <a href='#' class='toggle-vis-vols' id='volsCol4'>School</a>
                                    <a href='#' class='toggle-vis-vols' id='volsCol5'>Major</a>
                                    <a href='#' class='toggle-vis-vols' id='volsCol6'>Hometown</a>
                                    <a href='#' class='toggle-vis-vols' id='volsCol7'>State</a>
                                    <a href='#' class='toggle-vis-vols' id='volsCol8'>AHANA</a>
                                    <a href='#' class='toggle-vis-vols' id='volsCol9'>Transfer</a>
                                    <a href='#' class='toggle-vis-vols' id='volsCol10'>Shift Day</a>
                                    <a href='#' class='toggle-vis-vols' id='volsCol11'>Shift Time</a>
                                    <a href='#' class='toggle-vis-vols' id='volsCol12'>Requirements</a>
                                    <a href='#' class='toggle-vis-vols' id='volsCol13'>Credit Status</a>
                                    <a href='#' class='toggle-vis-vols' id='volsCol14'>Comments</a>
                                    <a href='#' class='toggle-vis-vols' id='volsCol15'>Eagle ID</a>
                                        <table class="table table-striped table-bordered table-hover" id="table-volunteers" style="font-size: 13px; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Class</th>
                                                    <th>School</th>
                                                    <th>Major</th>
                                                    <th>Hometown</th>
                                                    <th>State</th>
                                                    <th>AHANA</th>
                                                    <th>Transfer</th>
                                                    <th>Shift Day</th>
                                                    <th>Shift Time</th>
                                                    <th>Requirements</th>
                                                    <th>Credit</th>
                                                    <th>Comments</th>
                                                    <th>Eagle ID</th>
                                                </tr>
                                                <tr>
                                                    <td>First Name</td>
                                                    <td>Last Name</td>
                                                    <td>Email</td>
                                                    <td>Class</td>
                                                    <td>School</td>
                                                    <td>Major</td>
                                                    <td>Hometown</td>
                                                    <td>State</td>
                                                    <td>AHANA</td>
                                                    <td>Transfer</td>
                                                    <td>Shift Day</td>
                                                    <td>Shift Time</td>
                                                    <td>Requirements</td>
                                                    <td>Credit</td>
                                                    <td>Comments</td>
                                                    <td>Eagle ID</td>
                                                </tr>
                                            </thead>
                                            
                                            <tbody id="tablebody-volunteers">
                                                
                                            </tbody>
                                        </table>
                                    
                                </div>
                                <div class="tab-pane fade" id="attendance">
                                        <button class="btn btn-primary btn-xs" id="export-excel-attendance">Excel</button>
                                        <button class="btn btn-primary btn-xs" id="export-csv-attendance">CSV</button>
                                        <button class="btn btn-primary btn-xs" id="export-pdf-attendance">PDF</button>
                                    </br>
                                        <table class="table table-striped table-bordered table-hover" id="table-attendance" style="font-size: 13px; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Shift Day</th>
                                                    <th>Shift Time</th>
                                                    <th>Present</th>
                                                    <th>Notes</th>
                                                    <th>Eagle Id</th>
                                                    <th>Attendance Id</th>
                                                </tr>
                                                <tr>
                                                    <td>First Name</td>
                                                    <td>Last Name</td>
                                                    <td>Shift Day</td>
                                                    <td>Shift Time</td>
                                                    <td>Present</td>
                                                    <td>Notes</td>
                                                    <td>Eagle Id</td>
                                                    <td>Attendance Id</td>
                                                </tr>
                                            </thead>
                                            
                                            <tbody id="tablebody-attendance">
                                                
                                            </tbody>
                                        </table>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    
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

    <!-- Table Export Plugin -->
    <script type="text/javascript" src="../js/FileSaver.min.js"></script>
    <script type="text/javascript" src="../js/xlsx.core.min.js"></script>
    <script type="text/javascript" src="../js/jspdf.min.js"></script>
    <script type="text/javascript" src="../js/jspdf.plugin.autotable.js"></script>
    <script type="text/javascript" src="../js/tableExport.js"></script>

    <!-- Custom helper functions -->
    <script type="text/javascript" src="../js/helpers.js"></script>

    

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    



    <script>
    $(document).ready(function() {
        var programName = 'Panels';
        var s = document.getElementById("table-semester");
        var selectedSemester = s.options[s.selectedIndex].value;
        var y = document.getElementById("table-year");
        var selectedYear = y.options[y.selectedIndex].value;
        
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
            columnDefs: [
            {
                targets: [2,5,6,7,8,9,13,14,15],
                visible: false,
            },
            {
                targets: [4],
                render: function(data, type, row) {
                    if(type === 'sort') {
                        switch(data) {
                            case "Sunday": return 0; break;
                            case "Monday": return 1; break;
                            case "Tuesday": return 2; break;
                            case "Wednesday": return 3; break;
                            case "Thursday": return 4; break;
                            case "Friday": return 5; break;
                            case "Saturday": return 6; break;
                            default: return data;
                        }
                    }
                    return data;
                }
            }],
            order: [[1, "asc"]],
            paging: false,
        });

        $('a.toggle-vis-vols').on( 'click', function (e) {
            e.preventDefault();
            var index = this.id;
            index = index.substring(7);
            var column = tableVols.column(index);
            column.visible(!column.visible());
        });
        
        getVolunteerData(function(newTable) {
                  newTable.draw();
            }, programName, selectedSemester, selectedYear, tableVols);
     
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
            columnDefs: [
            {
                targets: [6,7],
                visible: false,
                orderable: false
                
            },
            {
                targets: [2],
                render: function(data, type, row) {
                    if(type === 'sort') {
                        switch(data) {
                            case "Sunday": return 0; break;
                            case "Monday": return 1; break;
                            case "Tuesday": return 2; break;
                            case "Wednesday": return 3; break;
                            case "Thursday": return 4; break;
                            case "Friday": return 5; break;
                            case "Saturday": return 6; break;
                            default: return data;
                        }
                    }
                    return data;
                }
            }],
            order: [[2, "asc"], [3, "asc"], [1, "asc"]],
            paging: false
        });
        var w;
        var selectedWeek;
        var d;
        var selectedDay;
        getWeekData(function() {
            w = document.getElementById("table-week");
            selectedWeek = w.options[w.selectedIndex].value; //sometimes has an undefined value
            d = document.getElementById("table-day");
            selectedDay = d.options[d.selectedIndex].value;
            getAttendanceData(function(newTable) {
                newTable.draw();
            }, programName, selectedSemester, selectedYear, selectedWeek, selectedDay, tableAttn);
        }, selectedSemester, selectedYear);
     
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
            var nselectedSemester = s.options[s.selectedIndex].value;
            var y = document.getElementById("table-year");
            var nselectedYear = y.options[y.selectedIndex].value;
            var w = document.getElementById("table-week");
            var selectedWeek = w.options[w.selectedIndex].value;
            var d = document.getElementById("table-day");
            var selectedDay = d.options[d.selectedIndex].value;
            
            tableVols.clear();
            tableAttn.clear();

            if(nselectedSemester != selectedSemester || nselectedYear != selectedYear) {
                document.getElementById("table-week").innerHTML = "";
                    getWeekData(function() {
                      ;
                }, nselectedSemester, nselectedYear);
                    selectedSemester = nselectedSemester;
                    selectedYear = nselectedYear;
            }

            getVolunteerData(function(newTable) {
                  newTable.draw();
            }, programName, selectedSemester, selectedYear, tableVols);

            getAttendanceData(function(newTable) {
                  newTable.draw();
            }, programName, selectedSemester, selectedYear, selectedWeek, selectedDay, tableAttn);
        });
        
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
            document.getElementById("newvalue").value = document.getElementById("newvalue").value;
            $(".thVal").keyup(function (event) {
            if (event.keyCode == 13 && verifyData(updateField[column], document.getElementById("newvalue").value.trim())) {
               
                data[column] =  document.getElementById("newvalue").value.trim();
                tableVols.row(row).remove();
                inLineUpdatePostData(function() {
                    tableVols.row.add([
                        data[0],
                        data[1],
                        data[2],
                        data[3],
                        data[4],
                        data[5],
                        data[6],
                        data[7]
                    ]).draw()
                }, data[7], updateField[column], 'Program_Members', data[column], 'user');

                
            }
        });
        },150);
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
            if (event.keyCode == 13 && verifyData(updateField[column], document.getElementById("newvalue").value.trim())) {
               
                data[column] =  document.getElementById("newvalue").value.trim();
                tableAttn.row(row).remove();
                inLineUpdatePostData(function() {
                    tableAttn.row.add([
                        data[0],
                        data[1],
                        data[2],
                        data[3],
                        data[4],
                        data[5],
                        data[6],
                        data[7]
                    ]).draw()
                }, data[7], updateField[column], 'Attendance', data[column], 'attendance_id');
            }
        });
        },150);
            $('tbody td').not(currentEle).on('click', function() {

                $(currentEle).html(value);
            });
            $(currentEle).on("dblclick", function() {
                $(currentEle).html(value);
            });  
        });
        $("#attendance-tab").on("click", function() {
            showSelects();
        });
        $("#volunteers-tab").on("click", function() {
            hideSelects();
        });
    });
    </script>

</body>

</html>
