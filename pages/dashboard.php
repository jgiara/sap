<?php 
ob_start();
session_start();
require_once '../resources/init.php';
$general->logged_out_protect();
require_once '../include/helpers/userInfo.php';
require_once '../include/helpers/helpers.php';
if($_SESSION['New_Session']) {
    $users->updateLastLogin($email);
    $_SESSION['New_Session'] = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Student Admission Program - Boston College</title>

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
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0;">
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

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 style="margin-top: 60px; margin-bottom: 0;">Hello, <?php echo $fn."!"?></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </br>
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
                                 <button class="btn btn-danger " id="new-numbers-modal-button" data-toggle="modal" data-target="#newNumbersModal">New Sessions</button>
                                    <div id="div-sunday" class="div-day">
                                        <h4>Sunday</h4>               
                                        <table class="table table-striped table-bordered table-hover" id="table-sunday" style="font-size: 13px; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Time</th>
                                                    <th>Session</th>
                                                    <th>Numbers</th>
                                                    <th>Location</th>
                                                    <th>Notes</th>
                                                    <th>Delete</th>
                                                    <th>Numbers ID</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody id="tablebody-sunday">
                                                
                                            </tbody>
                                        </table>
                                    </br>
                                    </div>
                                    <div id="div-monday" class="div-day">
                                        <h4>Monday</h4>               
                                        <table class="table table-striped table-bordered table-hover" id="table-monday" style="font-size: 13px; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Time</th>
                                                    <th>Session</th>
                                                    <th>Numbers</th>
                                                    <th>Location</th>
                                                    <th>Notes</th>
                                                    <th>Delete</th>
                                                    <th>Numbers ID</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody id="tablebody-monday">
                                                
                                            </tbody>
                                        </table>
                                    </br>
                                    </div>
                                    <div id="div-tuesday" class="div-day">
                                        <h4>Tuesday</h4>               
                                        <table class="table table-striped table-bordered table-hover" id="table-tuesday" style="font-size: 13px; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Time</th>
                                                    <th>Session</th>
                                                    <th>Numbers</th>
                                                    <th>Location</th>
                                                    <th>Notes</th>
                                                    <th>Delete</th>
                                                    <th>Numbers ID</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody id="tablebody-tuesday">
                                                
                                            </tbody>
                                        </table>
                                    </br>
                                    </div>
                                    <div id="div-wednesday" class="div-day">
                                        <h4>Wednesday</h4>               
                                        <table class="table table-striped table-bordered table-hover" id="table-wednesday" style="font-size: 13px; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Time</th>
                                                    <th>Session</th>
                                                    <th>Numbers</th>
                                                    <th>Location</th>
                                                    <th>Notes</th>
                                                    <th>Delete</th>
                                                    <th>Numbers ID</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody id="tablebody-wednesday">
                                                
                                            </tbody>
                                        </table>
                                    </br>
                                    </div>
                                    <div id="div-thursday" class="div-day">
                                        <h4>Thursday</h4>               
                                        <table class="table table-striped table-bordered table-hover" id="table-thursday" style="font-size: 13px; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Time</th>
                                                    <th>Session</th>
                                                    <th>Numbers</th>
                                                    <th>Location</th>
                                                    <th>Notes</th>
                                                    <th>Delete</th>
                                                    <th>Numbers ID</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody id="tablebody-thursday">
                                                
                                            </tbody>
                                        </table>
                                    </br>
                                    </div>
                                    <div id="div-friday" class="div-day">
                                        <h4>Friday</h4>               
                                        <table class="table table-striped table-bordered table-hover" id="table-friday" style="font-size: 13px; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Time</th>
                                                    <th>Session</th>
                                                    <th>Numbers</th>
                                                    <th>Location</th>
                                                    <th>Notes</th>
                                                    <th>Delete</th>
                                                    <th>Numbers ID</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody id="tablebody-friday">
                                                
                                            </tbody>
                                        </table>
                                    </br>
                                    </div>
                                    <div id="div-saturday" class="div-day">
                                        <h4>Saturday</h4>               
                                        <table class="table table-striped table-bordered table-hover" id="table-saturday" style="font-size: 13px; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Time</th>
                                                    <th>Session</th>
                                                    <th>Numbers</th>
                                                    <th>Location</th>
                                                    <th>Notes</th>
                                                    <th>Delete</th>
                                                    <th>Numbers ID</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody id="tablebody-saturday">
                                                
                                            </tbody>
                                        </table>
                                    </div>
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
    <div id="newNumbersModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Sessions</h4>
                </div>
                <div class="modal-body">
                    <h5>Fill in the following information.</h5>
                     
                        <div class="form-group">
                            <label for="semester-form">Semester:</label>
                            <input type="text" name="semester-form" class="form-control" id="semester-form" readonly required>
                        </div>    
                        <div class="form-group">
                            <label for="year-form">Year:</label>
                            <input type="text" name="year-form" class="form-control" id="year-form" readonly required>
                        </div>      
                        <div class="form-group">
                            <label for="week-form">Week:</label>
                            <input type="text" name="week-form" class="form-control" id="week-form" readonly required>
                        </div>      
                        <strong>Default or Extra Sessions</strong></br>
                        <button class="btn btn-primary btn-xs" id="defaultButton">Default</button>
                        <button class="btn btn-primary btn-xs" id="extraButton">Extra</button>
                        <div id="default-form-div"> 
                            </br>
                            <strong>Warning: If any session data exists for this week, it will be deleted.</strong>
                            </br>
                            </br>   
                            <button name="addNewNumbers" id="addNewNumbers" value="Add New Numbers" class="btn btn-danger">Add New Sessions</button>
                        </div>
                        <div id="extra-form-div">
                            <div class="form-group">
                            </br>
                                <label for="day-form">Day:</label>
                                <input type="text" name="day-form" class="form-control" id="day-form" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="extra-session-form">Session:</label>
                                <input type="text" name="extra-session-form" class="form-control" id="extra-session-form" required>
                            </div>  
                            <div class="form-group">
                                <label for="extra-time-form">Time:</label>
                                <input type="text" name="extra-time-form" class="form-control" id="extra-time-form" required>
                            </div>    
                            <div class="form-group">
                                <label for="extra-location-form">Location: **Optional**</label>
                                <input type="text" name="extra-location-form" class="form-control" id="extra-location-form" required>
                            </div>    
                            <div class="form-group">
                                <label for="extra-numbers-form">Numbers: **Optional**</label>
                                <input type="text" name="extra-numbers-form" class="form-control" id="extra-numbers-form" required>
                            </div>    
                            <div class="form-group">
                                <label for="extra-notes-form">Notes: **Optional**</label>
                                <input type="text" name="extra-notes-form" class="form-control" id="extra-notes-form" required>
                            </div>    
                            <button name="addExtraNumbers" id="addExtraNumbers" value="Add Extra Numbers" class="btn btn-danger">Add Extra Sessions</button>
                        </div>
                    
                </div>
                </br>
                <div class="modal-footer">
                    <button type="button" id="closeNewNumbers" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom helper functions -->
    <script type="text/javascript" src="../js/helpers.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script>
    $(document).ready(function() {
        var s = document.getElementById("table-semester");
        var selectedSemester = s.options[s.selectedIndex].value;
        var y = document.getElementById("table-year");
        var selectedYear = y.options[y.selectedIndex].value;

        $('.div-day').hide();
        $('#extra-form-div').hide();
        $('#default-form-div').hide();

        var targs;
        if(<?php 
            if((in_array('Admin', $roles)) || (in_array('Advisor', $roles)) || (in_array('Numbers', $roles))) {
                echo "true";
            }
            else {
                echo "false";
            } 
            ?>) {
            targs = [6];
        } 
        else {
            targs = [5,6];
        }

        if(!<?php 
            if((in_array('Admin', $roles)) || (in_array('Advisor', $roles)) || (in_array('Numbers', $roles)) || (in_array('Staff', $roles)) || (in_array('Council', $roles))) {
                echo "true";
            }
            else {
                echo "false";
            } 
            ?>) {
            targs.push(4);
        } 
     
        // DataTable
        var tableSun = $('#table-sunday').DataTable({
            responsive: true,
            orderCellsTop: true,
            paging: false,
            searching: false,
            info: false,
            columnDefs: [
            {

                targets: targs,
                visible: false,
            }]
        });
        var tableMon = $('#table-monday').DataTable({
            responsive: true,
            orderCellsTop: true,
            paging: false,
            searching: false,
            info: false,
            columnDefs: [
            {
                targets: targs,
                visible: false,
            }]
        });
        var tableTues = $('#table-tuesday').DataTable({
            responsive: true,
            orderCellsTop: true,
            paging: false,
            searching: false,
            info: false,
            columnDefs: [
            {
                targets: targs,
                visible: false,
            }]
        });
        var tableWed = $('#table-wednesday').DataTable({
            responsive: true,
            orderCellsTop: true,
            paging: false,
            searching: false,
            info: false,
            columnDefs: [
            {
                targets: targs,
                visible: false,
            }]
        });
        var tableThurs = $('#table-thursday').DataTable({
            responsive: true,
            orderCellsTop: true,
            paging: false,
            searching: false,
            info: false,
            columnDefs: [
            {
                targets: targs,
                visible: false,
            }]
        });
        var tableFri = $('#table-friday').DataTable({
            responsive: true,
            orderCellsTop: true,
            paging: false,
            searching: false,
            info: false,
            columnDefs: [
            {
                targets: targs,
                visible: false,
            }]
        });
        var tableSat = $('#table-saturday').DataTable({
            responsive: true,
            orderCellsTop: true,
            paging: false,
            searching: false,
            info: false,
            columnDefs: [
            {
                targets: targs,
                visible: false,
            }]
        });

        var w;
        var selectedWeek;
        var d = document.getElementById("table-day");
        var selectedDay = d.options[d.selectedIndex].value;
        
        if(selectedDay == 'day') {
            $('div-day').show();
        }
        else {
            var showDay = '#div-' + selectedDay.toLowerCase();
            $(showDay).show();
        }

        getWeekData(function() {
            w = document.getElementById("table-week");
            selectedWeek = w.options[w.selectedIndex].value;

             
            getNumbersData(function(newSun, newMon, newTues, newWed, newThurs, newFri, newSat) {
                  newSun.draw();
                  newMon.draw();
                  newTues.draw();
                  newWed.draw();
                  newThurs.draw();
                  newFri.draw();
                  newSat.draw();
            }, selectedWeek, tableSun, tableMon, tableTues, tableWed, tableThurs, tableFri, tableSat);
        }, selectedSemester, selectedYear);

        $('#semester-submit').on("click", function() {
            
            var s = document.getElementById("table-semester");
            var nselectedSemester = s.options[s.selectedIndex].value;
            var y = document.getElementById("table-year");
            var nselectedYear = y.options[y.selectedIndex].value;
            var w = document.getElementById("table-week");
            var nselectedWeek = w.options[w.selectedIndex].value;
            var d = document.getElementById("table-day");
            var selectedDay = d.options[d.selectedIndex].value;
            $('.div-day').hide();

            if(nselectedSemester != selectedSemester || nselectedYear != selectedYear) {
                document.getElementById("table-week").innerHTML = "";
                getWeekData(function() {
                    w = document.getElementById("table-week");
                    selectedWeek = w.options[w.selectedIndex].value;
                    tableSun.clear();
                    tableMon.clear();
                    tableTues.clear();
                    tableWed.clear();
                    tableThurs.clear();
                    tableFri.clear();
                    tableSat.clear();
                    getNumbersData(function(newSun, newMon, newTues, newWed, newThurs, newFri, newSat) {
                          newSun.draw();
                          newMon.draw();
                          newTues.draw();
                          newWed.draw();
                          newThurs.draw();
                          newFri.draw();
                          newSat.draw();
                    }, selectedWeek, tableSun, tableMon, tableTues, tableWed, tableThurs, tableFri, tableSat);    
                }, nselectedSemester, nselectedYear);
                selectedSemester = nselectedSemester;
                selectedYear = nselectedYear; 
            }

            else if(selectedWeek != nselectedWeek) {
                selectedWeek = nselectedWeek;
                tableSun.clear();
                tableMon.clear();
                tableTues.clear();
                tableWed.clear();
                tableThurs.clear();
                tableFri.clear();
                tableSat.clear();
                getNumbersData(function(newSun, newMon, newTues, newWed, newThurs, newFri, newSat) {
                      newSun.draw();
                      newMon.draw();
                      newTues.draw();
                      newWed.draw();
                      newThurs.draw();
                      newFri.draw();
                      newSat.draw();
                }, selectedWeek, tableSun, tableMon, tableTues, tableWed, tableThurs, tableFri, tableSat);    
            }

            if(selectedDay == 'day') {
                $('.div-day').show();
            }
            else {
                var showDay = '#div-' + selectedDay.toLowerCase();
                $(showDay).show();
            }

        });

        $('#table-sunday tbody').on('dblclick', 'td', function(e) {
            if(!<?php 
                if((in_array('Admin', $roles)) || (in_array('Council', $roles)) || (in_array('Advisor', $roles)) || (in_array('Staff', $roles)) || (in_array('Numbers', $roles))) {
                    echo "true";
                }
                else {
                    echo "false";
                } 
                ?>) {
                return;
            }
            var currentEle = $(this);
            var valueT = $(this).html();
            var orig = valueT;
            var row = tableSun.cell($(this)).index().row;
            var column = tableSun.cell($(this)).index().column;
            var alterable = [0,1,2,3,4,5];
            if(alterable.indexOf(column) == -1) { //can't the other columns
                return;
            }
            var data = tableSun.row(row).data();
            var updateField = ['time', 'session', 'numbers', 'location', 'notes', 'delete', 'numbers_location_id'];
            setTimeout(function() {
                if(column == 5) {
                    $(currentEle).html('<button class="btn btn-primary btn-xs" id="delete-numbers">Delete Session</button>');
                }
                else {
                    $(currentEle).html('<input id="newvalue" class="thVal" type="text" value="' + valueT + '" />');
                }
                $(".thVal").focus();
                if(column != 5) {
                    var tmp = document.getElementById("newvalue").value;
                    document.getElementById("newvalue").value = '';
                    document.getElementById("newvalue").value = tmp;
                }

                $("#delete-numbers").on("click", function() {
                    deleteNumbersLocationID(function() {
                        location.reload();
                    }, data[6]);
                });

                $(".thVal").keydown(function (event) {
                    if(column == 5) {
                        return ;
                    }
                    if (event.keyCode == 13) {
                        data[column] =  document.getElementById("newvalue").value.trim();  
                        tableSun.row(row).remove();
                        inLineUpdatePostData(function() {
                            tableSun.row.add([
                                data[0],
                                data[1],
                                data[2],
                                data[3],
                                data[4],
                                data[5],
                                data[6]
                            ]).draw()
                        }, data[6], updateField[column], 'Numbers_Location', data[column], 'numbers_location_id');
                    }
                });
            },150);
            $('tbody td').not(currentEle).on('click', function() {
                if(column == 0 || column == 1) {
                    valueT = orig;
                }
                $(currentEle).html(valueT);
            });
            $(currentEle).on("dblclick", function() {
                if(column == 0 || column == 1) {
                    valueT = orig;
                }
                $(currentEle).html(valueT);
            });  
        });

        $('#table-monday tbody').on('dblclick', 'td', function(e) {
            if(!<?php 
                if((in_array('Admin', $roles)) || (in_array('Council', $roles)) || (in_array('Advisor', $roles)) || (in_array('Staff', $roles)) || (in_array('Numbers', $roles))) {
                    echo "true";
                }
                else {
                    echo "false";
                } 
                ?>) {
                return;
            }
            var currentEle = $(this);
            var valueT = $(this).html();
            var orig = valueT;
            var row = tableMon.cell($(this)).index().row;
            var column = tableMon.cell($(this)).index().column;
            var alterable = [0,1,2,3,4,5];
            if(alterable.indexOf(column) == -1) { //can't the other columns
                return;
            }
            var data = tableMon.row(row).data();
            var updateField = ['time', 'session', 'numbers', 'location', 'notes', 'delete', 'numbers_location_id'];
            setTimeout(function() {
                if(column == 5) {
                    $(currentEle).html('<button class="btn btn-primary btn-xs" id="delete-numbers">Delete Session</button>');
                }
                else {
                    $(currentEle).html('<input id="newvalue" class="thVal" type="text" value="' + valueT + '" />');
                }
                $(".thVal").focus();
                if(column != 5) {
                    var tmp = document.getElementById("newvalue").value;
                    document.getElementById("newvalue").value = '';
                    document.getElementById("newvalue").value = tmp;
                }

                $("#delete-numbers").on("click", function() {
                    deleteNumbersLocationID(function() {
                        location.reload();
                    }, data[6]);
                });

                $(".thVal").keydown(function (event) {
                    if(column == 5) {
                        return ;
                    }
                    if (event.keyCode == 13) {
                        data[column] =  document.getElementById("newvalue").value.trim();  
                        tableMon.row(row).remove();
                        inLineUpdatePostData(function() {
                            tableMon.row.add([
                                data[0],
                                data[1],
                                data[2],
                                data[3],
                                data[4],
                                data[5],
                                data[6]
                            ]).draw()
                        }, data[6], updateField[column], 'Numbers_Location', data[column], 'numbers_location_id');
                    }
                });
            },150);
            $('tbody td').not(currentEle).on('click', function() {
                if(column == 0 || column == 1) {
                    valueT = orig;
                }
                $(currentEle).html(valueT);
            });
            $(currentEle).on("dblclick", function() {
                if(column == 0 || column == 1) {
                    valueT = orig;
                }
                $(currentEle).html(valueT);
            });  
        });

        $('#table-tuesday tbody').on('dblclick', 'td', function(e) {
            if(!<?php 
                if((in_array('Admin', $roles)) || (in_array('Council', $roles)) || (in_array('Advisor', $roles)) || (in_array('Staff', $roles)) || (in_array('Numbers', $roles))) {
                    echo "true";
                }
                else {
                    echo "false";
                } 
                ?>) {
                return;
            }
            var currentEle = $(this);
            var valueT = $(this).html();
            var orig = valueT;
            var row = tableTues.cell($(this)).index().row;
            var column = tableTues.cell($(this)).index().column;
            var alterable = [0,1,2,3,4,5];
            if(alterable.indexOf(column) == -1) { //can't the other columns
                return;
            }
            var data = tableTues.row(row).data();
            var updateField = ['time', 'session', 'numbers', 'location', 'notes', 'delete', 'numbers_location_id'];
            setTimeout(function() {
                if(column == 5) {
                    $(currentEle).html('<button class="btn btn-primary btn-xs" id="delete-numbers">Delete Session</button>');
                }
                else {
                    $(currentEle).html('<input id="newvalue" class="thVal" type="text" value="' + valueT + '" />');
                }
                $(".thVal").focus();
                if(column != 5) {
                    var tmp = document.getElementById("newvalue").value;
                    document.getElementById("newvalue").value = '';
                    document.getElementById("newvalue").value = tmp;
                }

                $("#delete-numbers").on("click", function() {
                    deleteNumbersLocationID(function() {
                        location.reload();
                    }, data[6]);
                });

                $(".thVal").keydown(function (event) {
                    if(column == 5) {
                        return ;
                    }
                    if (event.keyCode == 13) {
                        data[column] =  document.getElementById("newvalue").value.trim();  
                        tableTues.row(row).remove();
                        inLineUpdatePostData(function() {
                            tableTues.row.add([
                                data[0],
                                data[1],
                                data[2],
                                data[3],
                                data[4],
                                data[5],
                                data[6]
                            ]).draw()
                        }, data[6], updateField[column], 'Numbers_Location', data[column], 'numbers_location_id');
                    }
                });
            },150);
            $('tbody td').not(currentEle).on('click', function() {
                if(column == 0 || column == 1) {
                    valueT = orig;
                }
                $(currentEle).html(valueT);
            });
            $(currentEle).on("dblclick", function() {
                if(column == 0 || column == 1) {
                    valueT = orig;
                }
                $(currentEle).html(valueT);
            });  
        });

        $('#table-wednesday tbody').on('dblclick', 'td', function(e) {
            if(!<?php 
                if((in_array('Admin', $roles)) || (in_array('Council', $roles)) || (in_array('Advisor', $roles)) || (in_array('Staff', $roles)) || (in_array('Numbers', $roles))) {
                    echo "true";
                }
                else {
                    echo "false";
                } 
                ?>) {
                return;
            }
            var currentEle = $(this);
            var valueT = $(this).html();
            var orig = valueT;
            var row = tableWed.cell($(this)).index().row;
            var column = tableWed.cell($(this)).index().column;
            var alterable = [0,1,2,3,4,5];
            if(alterable.indexOf(column) == -1) { //can't the other columns
                return;
            }
            var data = tableWed.row(row).data();
            var updateField = ['time', 'session', 'numbers', 'location', 'notes', 'delete', 'numbers_location_id'];
            setTimeout(function() {
                if(column == 5) {
                    $(currentEle).html('<button class="btn btn-primary btn-xs" id="delete-numbers">Delete Session</button>');
                }
                else {
                    $(currentEle).html('<input id="newvalue" class="thVal" type="text" value="' + valueT + '" />');
                }
                $(".thVal").focus();
                if(column != 5) {
                    var tmp = document.getElementById("newvalue").value;
                    document.getElementById("newvalue").value = '';
                    document.getElementById("newvalue").value = tmp;
                }

                $("#delete-numbers").on("click", function() {
                    deleteNumbersLocationID(function() {
                        location.reload();
                    }, data[6]);
                });

                $(".thVal").keydown(function (event) {
                    if(column == 5) {
                        return ;
                    }
                    if (event.keyCode == 13) {
                        data[column] =  document.getElementById("newvalue").value.trim();  
                        tableWed.row(row).remove();
                        inLineUpdatePostData(function() {
                            tableWed.row.add([
                                data[0],
                                data[1],
                                data[2],
                                data[3],
                                data[4],
                                data[5],
                                data[6]
                            ]).draw()
                        }, data[6], updateField[column], 'Numbers_Location', data[column], 'numbers_location_id');
                    }
                });
            },150);
            $('tbody td').not(currentEle).on('click', function() {
                if(column == 0 || column == 1) {
                    valueT = orig;
                }
                $(currentEle).html(valueT);
            });
            $(currentEle).on("dblclick", function() {
                if(column == 0 || column == 1) {
                    valueT = orig;
                }
                $(currentEle).html(valueT);
            });  
        });
    
        $('#table-thursday tbody').on('dblclick', 'td', function(e) {
            if(!<?php 
                if((in_array('Admin', $roles)) || (in_array('Council', $roles)) || (in_array('Advisor', $roles)) || (in_array('Staff', $roles)) || (in_array('Numbers', $roles))) {
                    echo "true";
                }
                else {
                    echo "false";
                } 
                ?>) {
                return;
            }
            var currentEle = $(this);
            var valueT = $(this).html();
            var orig = valueT;
            var row = tableThurs.cell($(this)).index().row;
            var column = tableThurs.cell($(this)).index().column;
            var alterable = [0,1,2,3,4,5];
            if(alterable.indexOf(column) == -1) { //can't the other columns
                return;
            }
            var data = tableThurs.row(row).data();
            var updateField = ['time', 'session', 'numbers', 'location', 'notes', 'delete', 'numbers_location_id'];
            setTimeout(function() {
                if(column == 5) {
                    $(currentEle).html('<button class="btn btn-primary btn-xs" id="delete-numbers">Delete Session</button>');
                }
                else {
                    $(currentEle).html('<input id="newvalue" class="thVal" type="text" value="' + valueT + '" />');
                }
                $(".thVal").focus();
                if(column != 5) {
                    var tmp = document.getElementById("newvalue").value;
                    document.getElementById("newvalue").value = '';
                    document.getElementById("newvalue").value = tmp;
                }

                $("#delete-numbers").on("click", function() {
                    deleteNumbersLocationID(function() {
                        location.reload();
                    }, data[6]);
                });

                $(".thVal").keydown(function (event) {
                    if(column == 5) {
                        return ;
                    }
                    if (event.keyCode == 13) {
                        data[column] =  document.getElementById("newvalue").value.trim();  
                        tableThurs.row(row).remove();
                        inLineUpdatePostData(function() {
                            tableThurs.row.add([
                                data[0],
                                data[1],
                                data[2],
                                data[3],
                                data[4],
                                data[5],
                                data[6]
                            ]).draw()
                        }, data[6], updateField[column], 'Numbers_Location', data[column], 'numbers_location_id');
                    }
                });
            },150);
            $('tbody td').not(currentEle).on('click', function() {
                if(column == 0 || column == 1) {
                    valueT = orig;
                }
                $(currentEle).html(valueT);
            });
            $(currentEle).on("dblclick", function() {
                if(column == 0 || column == 1) {
                    valueT = orig;
                }
                $(currentEle).html(valueT);
            });  
        });

        $('#table-friday tbody').on('dblclick', 'td', function(e) {
            if(!<?php 
                if((in_array('Admin', $roles)) || (in_array('Council', $roles)) || (in_array('Advisor', $roles)) || (in_array('Staff', $roles)) || (in_array('Numbers', $roles))) {
                    echo "true";
                }
                else {
                    echo "false";
                } 
                ?>) {
                return;
            }
            var currentEle = $(this);
            var valueT = $(this).html();
            var orig = valueT;
            var row = tableFri.cell($(this)).index().row;
            var column = tableFri.cell($(this)).index().column;
            var alterable = [0,1,2,3,4,5];
            if(alterable.indexOf(column) == -1) { //can't the other columns
                return;
            }
            var data = tableFri.row(row).data();
            var updateField = ['time', 'session', 'numbers', 'location', 'notes', 'delete', 'numbers_location_id'];
            setTimeout(function() {
                if(column == 5) {
                    $(currentEle).html('<button class="btn btn-primary btn-xs" id="delete-numbers">Delete Session</button>');
                }
                else {
                    $(currentEle).html('<input id="newvalue" class="thVal" type="text" value="' + valueT + '" />');
                }
                $(".thVal").focus();
                if(column != 5) {
                    var tmp = document.getElementById("newvalue").value;
                    document.getElementById("newvalue").value = '';
                    document.getElementById("newvalue").value = tmp;
                }

                $("#delete-numbers").on("click", function() {
                    deleteNumbersLocationID(function() {
                        location.reload();
                    }, data[6]);
                });

                $(".thVal").keydown(function (event) {
                    if(column == 5) {
                        return ;
                    }
                    if (event.keyCode == 13) {
                        data[column] =  document.getElementById("newvalue").value.trim();  
                        tableFri.row(row).remove();
                        inLineUpdatePostData(function() {
                            tableFri.row.add([
                                data[0],
                                data[1],
                                data[2],
                                data[3],
                                data[4],
                                data[5],
                                data[6]
                            ]).draw()
                        }, data[6], updateField[column], 'Numbers_Location', data[column], 'numbers_location_id');
                    }
                });
            },150);
            $('tbody td').not(currentEle).on('click', function() {
                if(column == 0 || column == 1) {
                    valueT = orig;
                }
                $(currentEle).html(valueT);
            });
            $(currentEle).on("dblclick", function() {
                if(column == 0 || column == 1) {
                    valueT = orig;
                }
                $(currentEle).html(valueT);
            });  
        });

        $('#table-saturday tbody').on('dblclick', 'td', function(e) {
            if(!<?php 
                if((in_array('Admin', $roles)) || (in_array('Council', $roles)) || (in_array('Advisor', $roles)) || (in_array('Staff', $roles)) || (in_array('Numbers', $roles))) {
                    echo "true";
                }
                else {
                    echo "false";
                } 
                ?>) {
                return;
            }
            var currentEle = $(this);
            var valueT = $(this).html();
            var orig = valueT;
            var row = tableSat.cell($(this)).index().row;
            var column = tableSat.cell($(this)).index().column;
            var alterable = [0,1,2,3,4,5];
            if(alterable.indexOf(column) == -1) { //can't the other columns
                return;
            }
            var data = tableSat.row(row).data();
            var updateField = ['time', 'session', 'numbers', 'location', 'notes', 'delete', 'numbers_location_id'];
            setTimeout(function() {
                if(column == 5) {
                    $(currentEle).html('<button class="btn btn-primary btn-xs" id="delete-numbers">Delete Session</button>');
                }
                else {
                    $(currentEle).html('<input id="newvalue" class="thVal" type="text" value="' + valueT + '" />');
                }
                $(".thVal").focus();
                if(column != 5) {
                    var tmp = document.getElementById("newvalue").value;
                    document.getElementById("newvalue").value = '';
                    document.getElementById("newvalue").value = tmp;
                }

                $("#delete-numbers").on("click", function() {
                    deleteNumbersLocationID(function() {
                        location.reload();
                    }, data[6]);
                });

                $(".thVal").keydown(function (event) {
                    if(column == 5) {
                        return ;
                    }
                    if (event.keyCode == 13) {
                        data[column] =  document.getElementById("newvalue").value.trim();  
                        tableSat.row(row).remove();
                        inLineUpdatePostData(function() {
                            tableSat.row.add([
                                data[0],
                                data[1],
                                data[2],
                                data[3],
                                data[4],
                                data[5],
                                data[6]
                            ]).draw()
                        }, data[6], updateField[column], 'Numbers_Location', data[column], 'numbers_location_id');
                    }
                });
            },150);
            $('tbody td').not(currentEle).on('click', function() {
                if(column == 0 || column == 1) {
                    valueT = orig;
                }
                $(currentEle).html(valueT);
            });
            $(currentEle).on("dblclick", function() {
                if(column == 0 || column == 1) {
                    valueT = orig;
                }
                $(currentEle).html(valueT);
            });  
        });

        $('#new-numbers-modal-button').on('click', function(e) {
            e.preventDefault();
            var s = document.getElementById("table-semester");
            var selectedSemester = s.options[s.selectedIndex].value;
            var y = document.getElementById("table-year");
            var selectedYear = y.options[y.selectedIndex].value;
            var w = document.getElementById("table-week");
            var selectedWeek = w.options[w.selectedIndex].text;
            var selectedWeekValue = w.options[w.selectedIndex].value;
            var d = document.getElementById("table-day");
            var selectedDay = d.options[d.selectedIndex].text;
            document.getElementById("year-form").value = selectedYear;
            document.getElementById("semester-form").value = selectedSemester;
            document.getElementById("week-form").value = selectedWeek;
            document.getElementById("day-form").value = selectedDay;


        });

        $('#defaultButton').on('click', function(e) {
            e.preventDefault();
            $('#extra-form-div').hide();
            $('#default-form-div').show();
            $("#extra-session-form").prop('required', false);
            $("#extra-time-form").prop('required', false);
        });

        $('#extraButton').on('click', function(e) {
            e.preventDefault();
            $('#extra-form-div').show();
            $('#default-form-div').hide();
            $("#extra-session-form").prop('required', true);
            $("#extra-time-form").prop('required', true);
        });

        $('#addNewNumbers').on('click', function(e) {
            e.preventDefault();
            var s = document.getElementById("table-semester");
            var selectedSemester = s.options[s.selectedIndex].value;
            var y = document.getElementById("table-year");
            var selectedYear = y.options[y.selectedIndex].value;
            var w = document.getElementById("table-week");
            var selectedWeek = w.options[w.selectedIndex].value;
            addNewNumbersDefault(function() {
                location.reload();
            }, selectedWeek);
        });

        $('#addExtraNumbers').on('click', function(e) {
            e.preventDefault();
            var w = document.getElementById("table-week");
            var selectedWeek = w.options[w.selectedIndex].value;
            var d = document.getElementById("table-day");
            var selectedDay = d.options[d.selectedIndex].value;
            var session = document.getElementById("extra-session-form").value.trim();
            var time = document.getElementById("extra-time-form").value.trim();
            var locationn = document.getElementById("extra-location-form").value.trim();
            var notes = document.getElementById("extra-notes-form").value.trim();
            var numbers = document.getElementById("extra-numbers-form").value.trim();
            if(selectedDay == 'day') {
                alert('Extra sessions cannot be added to all days');
                return;
            }
            if(session == '' || time == '') {
                alert('Please fill out all fields');
                return;
            }
            addNewNumbersExtra(function() {
                location.reload();
            }, selectedWeek, selectedDay, session, time, locationn, notes, numbers)
        });
        
        if(!<?php 
                if((in_array('Admin', $roles)) || (in_array('Advisor', $roles)) || (in_array('Numbers', $roles))) {
                    echo "true";
                }
                else {
                    echo "false";
                } 
                ?>) {
                $('#new-numbers-modal-button').hide();
            }
        
    });

    </script>

</body>

</html>
