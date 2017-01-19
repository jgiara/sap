<?php 
ob_start();
session_start();
require_once '../resources/init.php';
$general->logged_out_protect();
require '../include/helpers/userInfo.php';
require '../include/helpers/helpers.php';
require '../include/helpers/pageProtect.php';
echo '<input type="hidden" id="programName" value="Applications">';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Applications - Student Admission Program - Boston College</title>

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
                    <h3 style="margin-top: 60px; margin-bottom: 0;" class="page-header" id="panels-header">Applications</h3>
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
                                <button class="btn btn-primary" id="semester-submit">Go</button>
                                <?php if(in_array('Admin', $roles) || in_array('Advisor', $roles)) {
                                    echo '<button class="btn btn-danger" id="new-apps-modal-button" data-toggle="modal" data-target="#newAppsModal">New Applications</button>';
                                }?>

                                <table class="table table-striped table-bordered table-hover" id="table-applications" style="font-size: 13px; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Applying For</th>
                                            <th>Interviewer</th>
                                            <th>Grade</th>
                                            <th>Comments</th>
                                            <th>Panels Decision</th>
                                            <th>Tours Decision</th>

                                        </tr>
                                        <tr>
                                            <td>First Name</td>
                                            <td>Last Name</td>
                                            <td>Applying For</td>
                                            <td>Interviewer</td>
                                            <th>Comments</th>
                                            <td>Grade</td>
                                            <td>Panels Decision</td>
                                            <td>Tours Decision</td>
                                        </tr>
                                    </thead>
                                    
                                    <tbody id="tablebody-applications">
                                        
                                    </tbody>
                                </table>
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

    <div id="newAppsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Applications</h4>
                </div>
                <div class="modal-body">
                    <div id="fileMethod">
                        <form method="post" id="addMembersFormFile" name="addMembersFormFile" enctype="multipart/form-data" action="../include/insertProgramMembersShiftFile.php">
                            <div class="form-group">
                                <label for="program-form-members-file">Program:</label>
                                <input type="text" name="program-form-members-file" class="form-control" id="program-form-members-file" readonly required>
                            </div>   
                            <div class="form-group">
                                <label for="semester-form-members-file">Semester:</label>
                                <input type="text" name="semester-form-members-file" class="form-control" id="semester-form-members-file" readonly required>
                            </div>    
                            <div class="form-group">
                                <label for="year-form-members-file">Year:</label>
                                <input type="text" name="year-form-members-file" class="form-control" id="year-form-members-file" readonly required>
                            </div>    
                            <div class="form-group">
                                <strong>Upload file (only .csv):</strong>
                                <input type="file" name="file-form" id="file-form" accept=".csv" required>
                                </br><Strong>Note: </strong>File must have the following column format with the header included:
                                </br>Email - Shift Day - Shift Time (XX:XX AM/PM; i.e. "10:00 AM" or "2:30 PM")
                            </div>
                            <div>
                                <p>&nbsp</p>
                            </div> 
                            <input type="submit" name="addMembersFormSubmitFile" id="addMembersFormSubmitFile" value="Add Members" class="btn btn-danger"></input>
                        </form>  
                    </div>
                </div>
                </br>
                <div class="modal-footer">
                    <button type="button" id="closeNewApps" class="btn btn-default" data-dismiss="modal">Close</button>
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
        var programName = 'Applications';
        var s = document.getElementById("table-semester");
        var selectedSemester = s.options[s.selectedIndex].value;
        var y = document.getElementById("table-year");
        var selectedYear = y.options[y.selectedIndex].value;
        
    // Setup - add a text input to each footer cell
        $('#table-apps thead td').each( function () {
            var title = $(this).text();
            $(this).css('text-align', 'center');
            $(this).html( '<input type="text"/>' );
            $(this).children('input').css('width', '100%');
        } );
     
        // DataTable
        var tableApps = $('#table-apps').DataTable({
            responsive: true,
            orderCellsTop: true,
            order: [[1, "asc"], [0, "asc"]],
            paging: false,
        });
        
        getApplicationData(function(newTable) {
                  newTable.draw();
            }, selectedSemester, selectedYear, tableApps);
     
        // Apply the search
        tableApps.columns().every(function (index) {
        $('#table-apps thead tr:eq(1) td:eq(' + index + ') input').on('keyup change', function () {
            tableApps.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
            } );
        } );


        $('#semester-submit').on("click", function() {
            
            var s = document.getElementById("table-semester");
            var selectedSemester = s.options[s.selectedIndex].value;
            var y = document.getElementById("table-year");
            var selectedYear = y.options[y.selectedIndex].value;
            
            tableApps.clear();

            getApplicationData(function(newTable) {
                  newTable.draw();
            }, selectedSemester, selectedYear, tableApps);
        });
        
        $('#table-applications tbody').on('dblclick', 'td', function(e) {
            if(!<?php 
                if((in_array('Admin', $roles)) || (in_array('Application Decision', $roles)) || (in_array('Advisor', $roles))) {
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
            var row = tableVols.cell($(this)).index().row;
            var column = tableVols.cell($(this)).index().column;
            var alterable = [2,3,4,5,6,7];
            var selectable = [2,6,7];
            var textAreaCols = [4];
            if(alterable.indexOf(column) == -1) { //can't the other columns
                return;
            }
            var data = tableVols.row(row).data();
            var updateField = ['first_name','last_name','email','class','school','major','minor','hometown','state_country','ahana','transfer','shift_day','shift_time','requirements_status','credit_status','comments','eagle_id', 'program_id'];
            setTimeout(function() {
                if(column == 11) {
                    $(currentEle).html('<select id="newvalue" class="thVal">' +
                                            '<option value="Sunday"' + (valueT == "Sunday" ? 'selected = selected' : '') + '>Sunday</option>' +
                                            '<option value="Monday"' + (valueT == "Monday" ? 'selected = selected' : '') + '>Monday</option>' +
                                            '<option value="Tuesday"' + (valueT == "Tuesday" ? 'selected = selected' : '') + '>Tuesday</option>' +
                                            '<option value="Wednesday"' + (valueT == "Wednesday" ? 'selected = selected' : '') + '>Wednesday</option>' +
                                            '<option value="Thursday"' + (valueT == "Thursday" ? 'selected = selected' : '') + '>Thursday</option>' +
                                            '<option value="Friday"' + (valueT == "Friday" ? 'selected = selected' : '') + '>Friday</option>' +
                                            '<option value="Saturday"' + (valueT == "Saturday" ? 'selected = selected' : '') + '>Saturday</option>' +
                                        '</select>');
                }
                else if(column == 14) {
                    $(currentEle).html('<select id="newvalue" class="thVal">' +
                                            '<option value="Pending"' + (valueT == "Pending" ? 'selected = selected' : '') + '>Pending</option>' +
                                            '<option value="Complete"' + (valueT == "Complete" ? 'selected = selected' : '') + '>Complete</option>' +
                                            '<option value="Incomplete"' + (valueT == "Incomplete" ? 'selected = selected' : '') + '>Incomplete</option>' +
                                        '</select>');
                }
                else if(textAreaCols.indexOf(column) != -1) {
                    var valueTT = valueT.replace(/<br>/g, '\n');
                    $(currentEle).html('<textarea rows="5" id="newvalue" class="thVal">' + valueTT + '</textarea>');
                }
                else {
                    $(currentEle).html('<input id="newvalue" class="thVal" type="text" value="' + valueT + '" />');
                }
                $(".thVal").focus();
                if(selectable.indexOf(column) == -1) {
                    var tmp = document.getElementById("newvalue").value;
                    document.getElementById("newvalue").value = '';
                    document.getElementById("newvalue").value = tmp;
                }
                $(".thVal").keydown(function (event) {
                    if (event.keyCode == 13 && !event.shiftKey) {
                        if(selectable.indexOf(column) == -1 && textAreaCols.indexOf(column) == -1) {
                            if(verifyData(updateField[column], document.getElementById("newvalue").value.trim())) {
                                data[column] =  document.getElementById("newvalue").value.trim();
                            }
                            else {
                                return;
                            }
                        }
                        else if(textAreaCols.indexOf(column) != -1) {
                            event.preventDefault();
                            data[column] =  document.getElementById("newvalue").value.trim();
                        }
                        else {
                            data[column] =  $('#newvalue option:selected').val().trim();
                        }     
                        tableVols.row(row).remove();
                        inLineUpdatePostData(function() {
                            if(textAreaCols.indexOf(column) != -1) {
                                data[column] = document.getElementById("newvalue").value.trim().replace(/\n/g, '<br>');
                            }
                            tableVols.row.add([
                                data[0],
                                data[1],
                                data[2],
                                data[3],
                                data[4],
                                data[5],
                                data[6],
                                data[7],
                                data[8],
                                data[9],
                                data[10],
                                data[11],
                                data[12],
                                data[13],
                                data[14],
                                data[15],
                                data[16],
                                data[17]
                            ]).draw()
                        }, data[17], updateField[column], 'Program_Members', data[column], 'member_id');
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
            if(!<?php 
                if((in_array('Admin', $roles)) || (in_array('Council', $roles)) || (in_array('Advisor', $roles))) {
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
            var row = tableAttn.cell($(this)).index().row;
            var column = tableAttn.cell($(this)).index().column;
            var alterable = [11,12,13,14,15,16];
            var selectable = [11,13,14,15];
            if(alterable.indexOf(column) == -1) { //can't update the other columns
                return;
            }
            var data = tableAttn.row(row).data();
            var updateField = ['first_name','last_name','email','class','school','major','minor','hometown','state_country','ahana','transfer','shift_day','shift_time','alternate_number','present','gave_panel_tour','note', 'week_number', 'eagle_id','attendance_id'];
            setTimeout(function() {
                if(column == 11) {
                    $(currentEle).html('<select id="newvalue" class="thVal">' +
                                            '<option value="Sunday"' + (valueT == "Sunday" ? 'selected = selected' : '') + '>Sunday</option>' +
                                            '<option value="Monday"' + (valueT == "Monday" ? 'selected = selected' : '') + '>Monday</option>' +
                                            '<option value="Tuesday"' + (valueT == "Tuesday" ? 'selected = selected' : '') + '>Tuesday</option>' +
                                            '<option value="Wednesday"' + (valueT == "Wednesday" ? 'selected = selected' : '') + '>Wednesday</option>' +
                                            '<option value="Thursday"' + (valueT == "Thursday" ? 'selected = selected' : '') + '>Thursday</option>' +
                                            '<option value="Friday"' + (valueT == "Friday" ? 'selected = selected' : '') + '>Friday</option>' +
                                            '<option value="Saturday"' + (valueT == "Saturday" ? 'selected = selected' : '') + '>Saturday</option>' +
                                        '</select>');
                }
                else if(column == 13) {
                    $(currentEle).html('<select id="newvalue" class="thVal">' +
                                            '<option value=""' + (valueT == "" ? 'selected = selected' : '') + '>(Blank)</option>' +
                                            '<option value="Alternate"' + (valueT == "Alternate" ? 'selected = selected' : '') + '>Alternate</option>' +
                                        '</select>');
                }
                else if(column == 14) {
                    $(currentEle).html('<select id="newvalue" class="thVal">' +
                                            '<option value=""' + (valueT == "" ? 'selected = selected' : '') + '>(Blank)</option>' +
                                            '<option value="Present"' + (valueT == "Present" ? 'selected = selected' : '') + '>Present</option>' +
                                            '<option value="Excused"' + (valueT == "Excused" ? 'selected = selected' : '') + '>Excused</option>' +
                                            '<option value="No Show"' + (valueT == "No Show" ? 'selected = selected' : '') + '>No Show</option>' +
                                        '</select>');
                }
                else if(column == 15) {
                    $(currentEle).html('<select id="newvalue" class="thVal">' +
                                            '<option value=""' + (valueT == "" ? 'selected = selected' : '') + '>(Blank)</option>' +
                                            '<option value="Yes"' + (valueT == "Yes" ? 'selected = selected' : '') + '>Yes</option>' +
                                            '<option value="No"' + (valueT == "No" ? 'selected = selected' : '') + '>No</option>' +
                                        '</select>');
                }
                else {
                    $(currentEle).html('<input id="newvalue" class="thVal" type="text" value="' + valueT + '" />');
                }
                $(".thVal").focus();
                if(selectable.indexOf(column) == -1) {
                    var tmp = document.getElementById("newvalue").value;
                    document.getElementById("newvalue").value = '';
                    document.getElementById("newvalue").value = tmp;
                }
                $(".thVal").keydown(function (event) {
                    if (event.keyCode == 13) {
                        if(selectable.indexOf(column) == -1) {
                            if(verifyData(updateField[column], document.getElementById("newvalue").value.trim())) {
                                data[column] =  document.getElementById("newvalue").value.trim();
                            }
                            else {
                                return;
                            }
                        }
                        else {
                            data[column] =  $('#newvalue option:selected').val().trim();
                        }     
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
                                data[7],
                                data[8],
                                data[9],
                                data[10],
                                data[11],
                                data[12],
                                data[13],
                                data[14],
                                data[15],
                                data[16],
                                data[17],
                                data[18],
                                data[19]
                            ]).draw()
                        }, data[19], updateField[column], 'Attendance', data[column], 'attendance_id');
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

        $("#attendance-tab").on("click", function() {
            showSelects();
        });

        $("#volunteers-tab").on("click", function() {
            hideSelects();
        });

        $("#new-members-modal-button").on("click", function() {
            var s = document.getElementById("table-semester");
            var selectedSemester = s.options[s.selectedIndex].value;
            var y = document.getElementById("table-year");
            var selectedYear = y.options[y.selectedIndex].value;
            document.getElementById("program-form-members").value = programName;
            document.getElementById("year-form-members").value = selectedYear;
            document.getElementById("semester-form-members").value = selectedSemester;
            document.getElementById("program-form-members-file").value = programName;
            document.getElementById("year-form-members-file").value = selectedYear;
            document.getElementById("semester-form-members-file").value = selectedSemester;
            getUsersNotInProgram(function(a) {
                var nonmembers = a;
                var userSelect = document.getElementById("userlstBox");
                $("#userlstBox").empty();
                $("#memberlstBox").empty();
                for(var i = 0; i < nonmembers[0].length; i++) {
                    var opt = document.createElement('option');
                    opt.value = nonmembers[0][i];
                    opt.id = nonmembers[2][i];
                    opt.innerHTML = nonmembers[2][i] + ", " + nonmembers[1][i];
                    userSelect.appendChild(opt);
                    }
                var my_options = $("#userlstBox option");
                my_options.sort(function(a,b) {
                    return a.id > b.id;
                });
                $("#userlstBox").empty().append(my_options);
            }, programName, selectedSemester, selectedYear);
        });

        $("#addMembersFormManual").on("submit", function(e) {
            if(verifyData('shift_time', document.getElementById("time-form-members").value)) {
                var selectedOpts = $('#memberlstBox option');
                if (selectedOpts.length == 0) {
                    alert("You must choose at least one person to add");
                    e.preventDefault();
                }
                else {
                    var emails = [];
                    for(var i=0; i < selectedOpts.length; i++) {
                        emails[i] = selectedOpts[i].value;
                    }
                    var program = document.getElementById("program-form-members").value;
                    var semester = document.getElementById("semester-form-members").value;
                    var year = document.getElementById("year-form-members").value;
                    var day = document.getElementById("day-form-members").value;
                    var time = document.getElementById("time-form-members").value;
                    insertProgramMembersManualShift(function() {
                        location.reload();
                    }, emails, program, semester, year, day, time);
                    e.preventDefault();
                }
            }
            else {
                e.preventDefault();
            }
        });

        $("#edit-members-modal-button").on("click", function() {
            var s = document.getElementById("table-semester");
            var selectedSemester = s.options[s.selectedIndex].value;
            var y = document.getElementById("table-year");
            var selectedYear = y.options[y.selectedIndex].value;
            document.getElementById("program-edit-members").value = programName;
            document.getElementById("year-edit-members").value = selectedYear;
            document.getElementById("semester-edit-members").value = selectedSemester;
            getUsersInProgram(function(b) {
                var members = b;
                var memberSelect = document.getElementById("editmemberlstBox");
                $("#editmemberlstBox").empty();
                $("#toeditmemberlstBox").empty();
                for(var i = 0; i < members[0].length; i++) {
                    var opt = document.createElement('option');
                    opt.value = members[0][i];
                    opt.id = members[2][i];
                    opt.innerHTML = members[2][i] + ", " + members[1][i];
                    memberSelect.appendChild(opt);
                }
                var my_options = $("#editmemberlstBox option");
                my_options.sort(function(a,b) {
                    return a.id > b.id;
                });
                $("#editmemberlstBox").empty().append(my_options);
            }, programName, selectedSemester, selectedYear);
        });
        
        $("#edit-shifts-modal-button").on("click", function() {
            var s = document.getElementById("table-semester");
            var selectedSemester = s.options[s.selectedIndex].value;
            var y = document.getElementById("table-year");
            var selectedYear = y.options[y.selectedIndex].value;
            var w = document.getElementById("table-week");
            var selectedWeek = w.options[w.selectedIndex].text;
            var selectedWeekValue = w.options[w.selectedIndex].value;
            var d = document.getElementById("table-day");
            var selectedDay = d.options[d.selectedIndex].text;
            var selectedDayValue = d.options[d.selectedIndex].value;
            document.getElementById("program-edit-shifts").value = programName;
            document.getElementById("year-edit-shifts").value = selectedYear;
            document.getElementById("semester-edit-shifts").value = selectedSemester;
            document.getElementById("week-edit-shifts").value = selectedWeek;
            document.getElementById("day-edit-shifts").value = selectedDay;

            getShiftsForWeek(function(b) {
                var shifts = b;
                var shiftselect = document.getElementById("editshiftslstBox");
                $("#editshiftslstBox").empty();
                $("#toeditshiftslstBox").empty();
                for(var i = 0; i < shifts[0].length; i++) {
                    var opt = document.createElement('option');
                    opt.value = shifts[0][i];
                    opt.id = shifts[2][i];
                    opt.innerHTML = shifts[2][i] + ", " + shifts[1][i] + " (" + shifts[0][i] + ")";
                    shiftselect.appendChild(opt);
                }
                var my_options = $("#editshiftslstBox option");
                my_options.sort(function(a,b) {
                    return a.id > b.id;
                });
                $("#editshiftslstBox").empty().append(my_options);
            }, programName, selectedSemester, selectedYear, selectedWeekValue, selectedDayValue);
            
        });

        $("#new-shifts-modal-button").on("click", function() {
            var s = document.getElementById("table-semester");
            var selectedSemester = s.options[s.selectedIndex].value;
            var y = document.getElementById("table-year");
            var selectedYear = y.options[y.selectedIndex].value;
            var w = document.getElementById("table-week");
            var selectedWeek = w.options[w.selectedIndex].text;
            var selectedWeekValue = w.options[w.selectedIndex].value;
            var d = document.getElementById("table-day");
            var selectedDay = d.options[d.selectedIndex].text;
            document.getElementById("program-form-shifts-auto").value = programName;
            document.getElementById("year-form-shifts-auto").value = selectedYear;
            document.getElementById("semester-form-shifts-auto").value = selectedSemester;
            document.getElementById("week-form-shifts-auto").value = selectedWeek;
            document.getElementById("program-form-shifts-manual").value = programName;
            document.getElementById("year-form-shifts-manual").value = selectedYear;
            document.getElementById("semester-form-shifts-manual").value = selectedSemester;
            document.getElementById("week-form-shifts-manual").value = selectedWeek;
            
            getUsersInProgramForShifts(function(b) {
                var members = b;
                var memberSelect = document.getElementById("manualshiftslstBox");
                $("#manualshiftslstBox").empty();
                $("#tomanualshiftslstBox").empty();
                for(var i = 0; i < members[0].length; i++) {
                    var opt = document.createElement('option');
                    opt.value = members[0][i];
                    opt.id = members[2][i];
                    opt.innerHTML = members[2][i] + ", " + members[1][i];
                    memberSelect.appendChild(opt);
                }
                var my_options = $("#manualshiftslstBox option");
                my_options.sort(function(a,b) {
                    return a.id > b.id;
                });
                $("#manualshiftslstBox").empty().append(my_options);
            }, programName, selectedSemester, selectedYear);
            
        });

        $("#newShiftsAutoForm").on("submit", function(e) {
            var w = document.getElementById("table-week");
            var selectedWeekValue = w.options[w.selectedIndex].value;
            if(selectedWeekValue == 'all') {
                alert("You can not enter shifts for the selected week 'All Weeks'");
                e.preventDefault();
                return ;
            }
            if (document.getElementById('confirmation-no-shifts-auto').checked) {
                e.preventDefault();
                return ;
            }
            var w = document.getElementById("table-week");
            var selectedWeek = w.options[w.selectedIndex].value;
        
            var program = document.getElementById("program-form-shifts-manual").value;
            var semester = document.getElementById("semester-form-shifts-manual").value;
            var year = document.getElementById("year-form-shifts-manual").value;
            var week = selectedWeek;
            insertAutoShifts(function() {
                location.reload();
            }, program, semester, year, week);
            e.preventDefault();
        });

        $("#newShiftsManualForm").on("submit", function(e) {
            var w = document.getElementById("table-week");
            var selectedWeekValue = w.options[w.selectedIndex].value;
            if(selectedWeekValue == 'all') {
                alert("You can not enter shifts for the selected week 'All Weeks'");
                e.preventDefault();
                return ;
            }
            if(verifyData('shift_time', document.getElementById("time-form-shifts-manual").value)) {
                var selectedOpts = $('#tomanualshiftslstBox option');
                if (selectedOpts.length == 0) {
                    alert("You must choose at least one person to add");
                    e.preventDefault();
                }
                else {
                    var w = document.getElementById("table-week");
                    var selectedWeek = w.options[w.selectedIndex].value;
                    var emails = [];
                    for(var i=0; i < selectedOpts.length; i++) {
                        emails[i] = selectedOpts[i].value;
                    }
                    var program = document.getElementById("program-form-shifts-manual").value;
                    var semester = document.getElementById("semester-form-shifts-manual").value;
                    var year = document.getElementById("year-form-shifts-manual").value;
                    var week = selectedWeek;
                    var day = document.getElementById("day-form-shifts-manual").value;
                    var time = document.getElementById("time-form-shifts-manual").value;
                    var notes = document.getElementById("notes-form-shifts-manual").value;
                    insertManualShifts(function() {
                        location.reload();
                    }, emails, program, semester, year, week, day, time, notes);
                    e.preventDefault();
                }
            }
            else {
                e.preventDefault();
            }
        });

        $("#fileMethodButton").on("click", function() {
            $("#fileMethod").show();
            $("#manualMethod").hide();
            $("#file-form").prop('required', true);
            $("#test-form").prop('required', false);
        });

        $("#manualMethodButton").on("click", function() {
            $("#manualMethod").show();
            $("#fileMethod").hide();
            $("#test-form").prop('required', true);
            $("#file-form").prop('required', false);
        });

        $(".lstButton").on("click", function(e) {
            e.preventDefault();
        });

        $("#editDayButton").on("click", function() {
            $("#editDay").show();
            $("#editTime").hide()
            $("#editCredit").hide();
            $("#editRequirements").hide();
            $("#editComments").hide();
            $("#editDelete").hide();
            $("#editConfirmation").hide();
            document.getElementById("editChoice").value = "day";
        });

        $("#editTimeButton").on("click", function() {
            $("#editDay").hide();
            $("#editTime").show()
            $("#editCredit").hide();
            $("#editRequirements").hide();
            $("#editComments").hide();
            $("#editDelete").hide();
            $("#editConfirmation").hide();
            document.getElementById("editChoice").value = "time";
        });

        $("#editCreditButton").on("click", function() {
            $("#editDay").hide();
            $("#editTime").hide()
            $("#editCredit").show();
            $("#editRequirements").hide();
            $("#editComments").hide();
            $("#editDelete").hide();
            $("#editConfirmation").hide();
            document.getElementById("editChoice").value = "credit";
        });

        $("#editRequirementsButton").on("click", function() {
            $("#editDay").hide();
            $("#editTime").hide()
            $("#editCredit").hide();
            $("#editRequirements").show();
            $("#editComments").hide();
            $("#editDelete").hide();
            $("#editConfirmation").show();
            document.getElementById("editChoice").value = "requirements";
        });

        $("#editCommentsButton").on("click", function() {
            $("#editDay").hide();
            $("#editTime").hide()
            $("#editCredit").hide();
            $("#editRequirements").hide();
            $("#editComments").show();
            $("#editDelete").hide();
            $("#editConfirmation").show();
            document.getElementById("editChoice").value = "comments";
        });

        $("#editDeleteButton").on("click", function() {
            $("#editDay").hide();
            $("#editTime").hide()
            $("#editCredit").hide();
            $("#editRequirements").hide();
            $("#editComments").hide();
            $("#editDelete").show();
            $("#editConfirmation").show();
            document.getElementById("editChoice").value = "delete";
        });

        $("#editMembersSubmit").on("click", function() {
            var edits = document.getElementById("editChoice").value;
            var ids = [];
            var selectedOpts = $('#toeditmemberlstBox option');
            if (selectedOpts.length == 0) {
                alert("You must choose at least one member");
                return ;
            }
            for(var i=0; i < selectedOpts.length; i++) {
                ids[i] = selectedOpts[i].value;
            }
            var field;
            var newValue;
            switch(edits) {
                case "day" : {
                    newValue = document.getElementById("day-edit-members").value;
                    if(newValue == "none") {
                        return ;
                    }
                    field = "shift_day";
                } break;

                case "time" : {
                    newValue = document.getElementById("time-edit-members").value;
                    field = "shift_time";
                    if(!(verifyData(field, newValue))) {
                        return;
                    }
                } break;

                case "credit" : {
                    newValue = document.getElementById("credit-edit-members").value;
                    if(newValue == "none") {
                        return ;
                    }
                    field = "credit_status";
                } break;

                case "requirements" : {
                    if (document.getElementById('confirmation-no-edit-members').checked) {
                        return ;
                    }
                    newValue = document.getElementById("requirements-edit-members").value;
                    field = "requirements_status";
                } break;

                case "comments" : {
                    if (document.getElementById('confirmation-no-edit-members').checked) {
                        return ;
                    }
                    newValue = document.getElementById("comments-edit-members").value;
                    field = "comments";
                } break;

                case "delete" : {
                    if (document.getElementById('confirmation-no-edit-members').checked) {
                        return ;
                    }
                    field = "delete"
                } break;

                default : {
                    return ;
                }

            }
            editProgramMembers(function() {
                location.reload();
            }, ids, field, newValue);
        });

        $("#autoShiftsEntryButton").on("click", function() {
            $("#autoShiftsEntry").show();
            $("#manualShiftsEntry").hide();
        });

        $("#manualShiftsEntryButton").on("click", function() {
            $("#manualShiftsEntry").show();
            $("#autoShiftsEntry").hide();
        });

        $("#editDayShiftsButton").on("click", function() {
            $("#editDayShifts").show();
            $("#editTimeShifts").hide()
            $("#editAlternateNumberShifts").hide();
            $("#editPresentShifts").hide();
            $("#editGaveShifts").hide();
            $("#editNoteShifts").hide();
            $("#editDeleteShifts").hide();
            $("#editConfirmationShifts").hide();
            document.getElementById("editChoiceShifts").value = "day";
        });

        $("#editTimeShiftsButton").on("click", function() {
            $("#editDayShifts").hide();
            $("#editTimeShifts").show()
            $("#editAlternateNumberShifts").hide();
            $("#editPresentShifts").hide();
            $("#editGaveShifts").hide();
            $("#editNoteShifts").hide();
            $("#editDeleteShifts").hide();
            $("#editConfirmationShifts").hide();
            document.getElementById("editChoiceShifts").value = "time";
        });

        $("#editAlternateNumberShiftsButton").on("click", function() {
            $("#editDayShifts").hide();
            $("#editTimeShifts").hide()
            $("#editAlternateNumberShifts").show();
            $("#editPresentShifts").hide();
            $("#editGaveShifts").hide();
            $("#editNoteShifts").hide();
            $("#editDeleteShifts").hide();
            $("#editConfirmationShifts").hide();
            document.getElementById("editChoiceShifts").value = "alternateNumber";
        });

        $("#editPresentShiftsButton").on("click", function() {
            $("#editDayShifts").hide();
            $("#editTimeShifts").hide()
            $("#editAlternateNumberShifts").hide();
            $("#editPresentShifts").show();
            $("#editGaveShifts").hide();
            $("#editNoteShifts").hide();
            $("#editDeleteShifts").hide();
            $("#editConfirmationShifts").hide();
            document.getElementById("editChoiceShifts").value = "present";
        });

        $("#editGaveShiftsButton").on("click", function() {
            $("#editDayShifts").hide();
            $("#editTimeShifts").hide()
            $("#editAlternateNumberShifts").hide();
            $("#editPresentShifts").hide();
            $("#editGaveShifts").show();
            $("#editNoteShifts").hide();
            $("#editDeleteShifts").hide();
            $("#editConfirmationShifts").hide();
            document.getElementById("editChoiceShifts").value = "gaveShifts";
        });

        $("#editNoteShiftsButton").on("click", function() {
            $("#editDayShifts").hide();
            $("#editTimeShifts").hide()
            $("#editAlternateNumberShifts").hide();
            $("#editPresentShifts").hide();
            $("#editGaveShifts").hide();
            $("#editNoteShifts").show();
            $("#editDeleteShifts").hide();
            $("#editConfirmationShifts").show();
            document.getElementById("editChoiceShifts").value = "notes";
        });

        $("#editDeleteShiftsButton").on("click", function() {
            $("#editDayShifts").hide();
            $("#editTimeShifts").hide()
            $("#editAlternateNumberShifts").hide();
            $("#editPresentShifts").hide();
            $("#editGaveShifts").hide();
            $("#editNoteShifts").hide();
            $("#editDeleteShifts").show();
            $("#editConfirmationShifts").show();
            document.getElementById("editChoiceShifts").value = "delete";
        });

        $("#editShiftsSubmit").on("click", function() {
            var w = document.getElementById("table-week");
            var selectedWeekValue = w.options[w.selectedIndex].value;
            var edits = document.getElementById("editChoiceShifts").value;
            var ids = [];
            var selectedOpts = $('#toeditshiftslstBox option');
            if (selectedOpts.length == 0) {
                alert("You must choose at least one shift");
                return ;
            }
            for(var i=0; i < selectedOpts.length; i++) {
                ids[i] = selectedOpts[i].value;
            }
            var field;
            var newValue;
            switch(edits) {
                case "day" : {
                    newValue = document.getElementById("day-edit-shifts-input").value;
                    if(newValue == "none") {
                        return ;
                    }
                    field = "shift_day";
                } break;

                case "time" : {
                    newValue = document.getElementById("time-edit-shifts").value;
                    field = "shift_time";
                    if(!(verifyData(field, newValue))) {
                        return;
                    }
                } break;

                case "alternateNumber" : {
                    newValue = document.getElementById("alternateNumber-edit-shifts").value;
                    if(newValue == "none") {
                        return ;
                    }
                    field = "alternate_number";
                } break;

                case "present" : {
                    newValue = document.getElementById("present-edit-shifts").value;
                    if(newValue == "none") {
                        return ;
                    }
                    field = "present";
                } break;

                case "gaveShifts" : {
                    newValue = document.getElementById("gaveShifts-edit-shifts").value;
                    if(newValue == "none") {
                        return ;
                    }
                    field = "gave_panel_tour";
                } break;

                case "notes" : {
                    if (document.getElementById('confirmation-no-edit-shifts').checked) {
                        return ;
                    }
                    newValue = document.getElementById("noteShifts-edit-shifts").value;
                    field = "note";
                } break;

                case "delete" : {
                    if (document.getElementById('confirmation-no-edit-shifts').checked) {
                        return ;
                    }
                    field = "delete"
                } break;

                default : {
                    return ;
                }

            }
            editShifts(function() {
                location.reload();
            }, ids, field, newValue);
        });

        //access to certain parts of page
        if(!<?php 
                if((in_array('Admin', $roles)) || (in_array('Council', $roles)) || (in_array('Advisor', $roles))) {
                    echo "true";
                }
                else {
                    echo "false";
                } 
                ?>) {
                $("#edit-members-modal-button").hide();
                $("#new-members-modal-button").hide();
                $("#edit-shifts-modal-button").hide();
                $("#new-shifts-modal-button").hide();
            }
    });
    </script>

</body>

</html>
