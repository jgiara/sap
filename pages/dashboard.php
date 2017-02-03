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
                                 <button class="btn btn-danger " id="new-numbers-modal-button" data-toggle="modal" data-target="#newNumbersModal">New Numbers</button>
                                    <div id="div-sunday" class="div-day">
                                        <h4>Sunday</h4>               
                                        <table class="table table-striped table-bordered table-hover" id="table-sunday" style="font-size: 13px; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Time</th>
                                                    <th>Session</th>
                                                    <th>Numbers</th>
                                                    <th>Location</th>
                                                </tr>
                                                <tr>
                                                    <td>Time</td>
                                                    <td>Session</td>
                                                    <td>Numbers</td>
                                                    <td>Location</td>
                                                </tr>
                                            </thead>
                                            
                                            <tbody id="tablebody-sunday">
                                                
                                            </tbody>
                                        </table>
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
                                                </tr>
                                                <tr>
                                                    <td>Time</td>
                                                    <td>Session</td>
                                                    <td>Numbers</td>
                                                    <td>Location</td>
                                                </tr>
                                            </thead>
                                            
                                            <tbody id="tablebody-monday">
                                                
                                            </tbody>
                                        </table>
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
                                                </tr>
                                                <tr>
                                                    <td>Time</td>
                                                    <td>Session</td>
                                                    <td>Numbers</td>
                                                    <td>Location</td>
                                                </tr>
                                            </thead>
                                            
                                            <tbody id="tablebody-tuesday">
                                                
                                            </tbody>
                                        </table>
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
                                                </tr>
                                                <tr>
                                                    <td>Time</td>
                                                    <td>Session</td>
                                                    <td>Numbers</td>
                                                    <td>Location</td>
                                                </tr>
                                            </thead>
                                            
                                            <tbody id="tablebody-wednesday">
                                                
                                            </tbody>
                                        </table>
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
                                                </tr>
                                                <tr>
                                                    <td>Time</td>
                                                    <td>Session</td>
                                                    <td>Numbers</td>
                                                    <td>Location</td>
                                                </tr>
                                            </thead>
                                            
                                            <tbody id="tablebody-thursday">
                                                
                                            </tbody>
                                        </table>
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
                                                </tr>
                                                <tr>
                                                    <td>Time</td>
                                                    <td>Session</td>
                                                    <td>Numbers</td>
                                                    <td>Location</td>
                                                </tr>
                                            </thead>
                                            
                                            <tbody id="tablebody-friday">
                                                
                                            </tbody>
                                        </table>
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
                                                </tr>
                                                <tr>
                                                    <td>Time</td>
                                                    <td>Session</td>
                                                    <td>Numbers</td>
                                                    <td>Location</td>
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
                    <h4 class="modal-title">Add New Numbers</h4>
                </div>
                <div class="modal-body">
                    <h5>Fill in the following information.</h5>
                    <form method="post" id="addNewNumbers" name="addNewNumbers">  
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
                            <strong>Warning: If any numbers data exists for this week, it will be deleted.</strong>
                            </br>
                            </br>   
                            <input type="button" name="addNewNumbers" id="addNewNumbers" value="Add New Numbers" class="btn btn-danger"></input>
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
                            <input type="button" name="addExtraNumbers" id="addExtraNumbers" value="Add Extra Numbers" class="btn btn-danger"></input>
                        </div>
                    </form>
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
     
        // DataTable
        var tableSun = $('#table-sunday').DataTable({
            responsive: true,
            orderCellsTop: true,
            paging: false,
            searching: false,
            info: false
        });
        var tableMon = $('#table-monday').DataTable({
            responsive: true,
            orderCellsTop: true,
            paging: false,
            searching: false,
            info: false
        });
        var tableTues = $('#table-tuesday').DataTable({
            responsive: true,
            orderCellsTop: true,
            paging: false,
            searching: false,
            info: false
        });
        var tableWed = $('#table-wednesday').DataTable({
            responsive: true,
            orderCellsTop: true,
            paging: false,
            searching: false,
            info: false
        });
        var tableThurs = $('#table-thursday').DataTable({
            responsive: true,
            orderCellsTop: true,
            paging: false,
            searching: false,
            info: false
        });
        var tableFri = $('#table-friday').DataTable({
            responsive: true,
            orderCellsTop: true,
            paging: false,
            searching: false,
            info: false
        });
        var tableSat = $('#table-saturday').DataTable({
            responsive: true,
            orderCellsTop: true,
            paging: false,
            searching: false,
            info: false
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
             
            getNumbersData(function(newTable) {
                  newTable.draw();
            }, programName, selectedSemester, selectedYear, tableWed);
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
                tableSun.clear();
                tableMon.clear();
                tableTues.clear();
                tableWed.clear();
                tableThurs.clear();
                tableFri.clear();
                tableSat.clear();
                getWeekData(function() {
                      ;
                }, nselectedSemester, nselectedYear);
                selectedSemester = nselectedSemester;
                selectedYear = nselectedYear;
                
            }
            else if(selectedWeek != nselectedWeek) {
                //getNumbersdata
            }

            if(selectedDay == 'day') {
                $('.div-day').show();
            }
            else {
                var showDay = '#div-' + selectedDay.toLowerCase();
                $(showDay).show();
            }

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
        });

        $('#addExtraNumbers').on('click', function(e) {
            e.preventDefault();
        });
        
        if(!<?php 
                if((in_array('Admin', $roles)) || (in_array('Staff', $roles)) || (in_array('Advisor', $roles))) {
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
