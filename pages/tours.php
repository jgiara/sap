<?php 
ob_start();
session_start();
require_once '../resources/init.php';
$general->logged_out_protect();
require '../include/helpers/userInfo.php';
require '../include/helpers/helpers.php';
require '../include/helpers/pageProtect.php';
echo '<input type="hidden" id="programName" value="Tours">';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tours - Student Admission Program - Boston College</title>

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
                    <h3 style="margin-top: 60px; margin-bottom: 0;" class="page-header" id="panels-header">Tours</h3>
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
                                        <button class="btn btn-success btn-xs" id="openModalButton" data-toggle="modal" data-target="#toggleVolsColumnsModal">Toggle Columns</button>
                                        <button class="btn btn-warning btn-xs" id="edit-members-modal-button" data-toggle="modal" data-target="#editMembersModal">Edit Members</button>
                                        <button class="btn btn-danger btn-xs" id="new-members-modal-button" data-toggle="modal" data-target="#newMembersModal">New Members</button>
                                    </br>
                                        <table class="table table-striped table-bordered table-hover" id="table-volunteers" style="font-size: 13px; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Class</th>
                                                    <th>School</th>
                                                    <th>Major</th>
                                                    <th>Minor</th>
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
                                                    <th>Member ID</th>
                                                </tr>
                                                <tr>
                                                    <td>First Name</td>
                                                    <td>Last Name</td>
                                                    <td>Email</td>
                                                    <td>Class</td>
                                                    <td>School</td>
                                                    <td>Major</td>
                                                    <td>Minor</td>
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
                                                    <td>Member ID</td>
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
                                        <button class="btn btn-success btn-xs" id="openModalButton" data-toggle="modal" data-target="#toggleAttnColumnsModal">Toggle Columns</button>
                                        <button class="btn btn-warning btn-xs" id="edit-shifts-modal-button" data-toggle="modal" data-target="#editShiftsModal">Edit Shifts</button>
                                        <button class="btn btn-danger btn-xs" id="new-shifts-modal-button" data-toggle="modal" data-target="#newShiftsModal">New Shifts</button>
                                    </br>
                                        <table class="table table-striped table-bordered table-hover" id="table-attendance" style="font-size: 13px; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Class</th>
                                                    <th>School</th>
                                                    <th>Major</th>
                                                    <th>Minor</th>
                                                    <th>Hometown</th>
                                                    <th>State</th>
                                                    <th>AHANA</th>
                                                    <th>Transfer</th>
                                                    <th>Shift Day</th>
                                                    <th>Shift Time</th>
                                                    <th>Number</th>
                                                    <th>Present</th>
                                                    <th>Gave Tour</th>
                                                    <th>Notes</th>
                                                    <th>Week Number</th>
                                                    <th>Eagle ID</th>
                                                    <th>Attendance ID</th>
                                                </tr>
                                                <tr>
                                                    <td>First Name</td>
                                                    <td>Last Name</td>
                                                    <td>Email</td>
                                                    <td>Class</td>
                                                    <td>School</td>
                                                    <td>Major</td>
                                                    <td>Minor</td>
                                                    <td>Hometown</td>
                                                    <td>State</td>
                                                    <td>AHANA</td>
                                                    <td>Transfer</td>
                                                    <td>Shift Day</td>
                                                    <td>Shift Time</td>
                                                    <td>Number</td>
                                                    <td>Present</td>
                                                    <td>Gave Tour</td>
                                                    <td>Notes</td>
                                                    <td>Week Number</td>
                                                    <td>Eagle ID</td>
                                                    <td>Attendance ID</td>
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

    <div id="toggleVolsColumnsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Toggle Columns</h4>
                </div>
                <div class="modal-body">
                    <table style='margin-left:150px;'>
                        <tr>
                            <td>
                                <b>Displayed:</b><br/>
                               <select multiple="multiple" size='10' id='volslstBox1'>
                                  <option value="0">First Name</option>
                                  <option value="1">Last Name</option>
                                  <option value="3">Class</option>
                                  <option value="4">School</option>
                                  <option value="11">Shift Day</option>
                                  <option value="12">Shift Time</option>
                                  <option value="13">Requirements</option>
                            </select>
                        </td>
                        <td style='text-align:center;vertical-align:middle;'>
                            <button class="btn btn-primary btn-xs" id='btnRightVols' value='right'>></button>
                            <br/><button class="btn btn-primary btn-xs" style='margin:5px;' id='btnLeftVols' value='left'><</button> 
                        </td>
                        <td>
                            <b>Not Displayed: </b><br/>
                            <select multiple="multiple" size='10' id='volslstBox2'> 
                                <option value="2">Email</option>
                                <option value="5">Major</option>
                                <option value="6">Minor</option>
                                <option value="7">Hometown</option>
                                <option value="8">State</option>
                                <option value="9">AHANA</option>
                                <option value="10">Transfer</option>
                                <option value="14">Credit</option>
                                <option value="15">Comments</option>
                                <option value="16">Eagle ID</option>
                                <option value="17">Member ID</option>
                            </select>
                        </td>
                    </tr>
                    </table>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="toggleAttnColumnsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Toggle Columns</h4>
                </div>
                <div class="modal-body">
                    <table style='margin-left:150px;'>
                        <tr>
                            <td>
                                <b>Displayed:</b><br/>
                               <select multiple="multiple" size='10' id='attnlstBox1'>
                                  <option value="0">First Name</option>
                                  <option value="1">Last Name</option>
                                  <option value="11">Shift Day</option>
                                  <option value="12">Shift Time</option>
                                  <option value="13">Number</option>
                                  <option value="14">Present</option>
                                  <option value="15">Gave Tour</option>
                                  <option value="16">Notes</option> 
                            </select>
                        </td>
                        <td style='text-align:center;vertical-align:middle;'>
                            <button class="btn btn-primary btn-xs" id='btnRightAttn' value='right'>></button>
                            <br/><button class="btn btn-primary btn-xs" style='margin:5px;' id='btnLeftAttn' value='left'><</button> 
                        </td>
                        <td>
                            <b>Not Displayed: </b><br/>
                            <select multiple="multiple" size='10' id='attnlstBox2'> 
                                <option value="2">Email</option>
                                <option value="3">Class</option>
                                <option value="4">School</option>
                                <option value="5">Major</option>
                                <option value="6">Minor</option>
                                <option value="7">Hometown</option>
                                <option value="8">State</option>
                                <option value="9">AHANA</option>
                                <option value="10">Transfer</option>
                                <option value="17">Week Number</option>
                                <option value="18">Eagle ID</option>
                                <option value="19">Attendance ID</option>
                            </select>
                        </td>
                    </tr>
                    </table>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="newMembersModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Members</h4>
                </div>
                <div class="modal-body">
                    <h5>Members must already be a part of this database in order to add them to this program</h5>
                    File upload or manual entry?
                    <button class="btn btn-primary btn-xs" id="fileMethodButton">File Upload</button>
                    <button class="btn btn-primary btn-xs" id="manualMethodButton">Manual Entry</button>
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
                    <div id="manualMethod">
                        <form method="POST" id="addMembersFormManual" name="addMembersFormManual">
                            <div class="form-group">
                                <label for="program-form-members">Program:</label>
                                <input type="text" name="program-form-members" class="form-control" id="program-form-members" readonly required>
                            </div>   
                            <div class="form-group">
                                <label for="semester-form-members">Semester:</label>
                                <input type="text" name="semester-form-members" class="form-control" id="semester-form-members" readonly required>
                            </div>    
                            <div class="form-group">
                                <label for="year-form-members">Year:</label>
                                <input type="text" name="year-form-members" class="form-control" id="year-form-members" readonly required>
                            </div>    
                            <table style='margin-left:150px;'>
                                <tr>
                                    <td>
                                        <b>SAP Users:</b><br/>
                                       <select multiple="multiple" size='10' id='userlstBox'>
                                        </select>
                                        
                                </td>
                                <td style='text-align:center;vertical-align:middle;'>
                                    <button class="btn btn-primary btn-xs lstButton" id='btnRightMember' value='right'>></button>
                                    <br/><button class="btn btn-primary btn-xs lstButton" style='margin:5px;' id='btnLeftMember' value='left'><</button> 
                                </td>
                                <td>
                                    <b>Members to Add:</b><br/>
                                    <select multiple="multiple" size='10' id='memberlstBox'> 
                                    </select>
                                </td>
                            </tr>
                            </table>   
                        </br>
                             <div class="form-group">
                                <label for="day-form-members">Shift Day:</label>
                                <select name="day-form-members" class="form-control" id="day-form-members" required>
                                    <option disabled selected value> -- Select a day -- </option>
                                    <option value="Sunday">Sunday</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                </select>
                            </div>    
                            <div class="form-group">
                                <label for="time-form-members">Shift Time: (XX:XX AM/PM; i.e. "10:00 AM" or "2:30 PM")</label>
                                <input type="text" name="time-form-members" class="form-control" id="time-form-members" required>
                            </div>    
                            <input type="submit" name="addMembersFormSubmit" id="addMembersFormSubmit" value="Add Members" class="btn btn-danger"></input>
                        </form>
                    </div>
                </div>
                </br>
                <div class="modal-footer">
                    <button type="button" id="closeNewMembers" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="editMembersModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Members</h4>
                </div>
                <div class="modal-body">
                    
                            <div class="form-group">
                                <label for="program-edit-members">Program:</label>
                                <input type="text" name="program-edit-members" class="form-control" id="program-edit-members" readonly required>
                            </div>   
                            <div class="form-group">
                                <label for="semester-edit-members">Semester:</label>
                                <input type="text" name="semester-edit-members" class="form-control" id="semester-edit-members" readonly required>
                            </div>    
                            <div class="form-group">
                                <label for="year-edit-members">Year:</label>
                                <input type="text" name="year-edit-members" class="form-control" id="year-edit-members" readonly required>
                            </div>    
                            <table style='margin-left:150px;'>
                                <tr>
                                    <td>
                                        <b>Program Members:</b><br/>
                                       <select multiple="multiple" size='10' id='editmemberlstBox'>
                                        </select>
                                        
                                </td>
                                <td style='text-align:center;vertical-align:middle;'>
                                    <button class="btn btn-primary btn-xs lstButton" id='btnRightMemberEdit' value='right'>></button>
                                    <br/><button class="btn btn-primary btn-xs lstButton" style='margin:5px;' id='btnLeftMemberEdit' value='left'><</button> 
                                </td>
                                <td>
                                    <b>Members to Edit:</b><br/>
                                    <select multiple="multiple" size='10' id='toeditmemberlstBox'> 
                                    </select>
                                </td>
                            </tr>
                            </table>
                            <strong>What do you wish to edit?</strong> </br>
                            <button class="btn btn-primary btn-xs" id="editDayButton">Shift Day</button>
                            <button class="btn btn-primary btn-xs" id="editTimeButton">Shift Time</button>
                            <button class="btn btn-primary btn-xs" id="editCreditButton">Credit</button>
                            <button class="btn btn-primary btn-xs" id="editRequirementsButton">Requirements Status</button>
                            <button class="btn btn-primary btn-xs" id="editCommentsButton">Comments</button> 
                            <button class="btn btn-primary btn-xs" id="editDeleteButton">Delete Members</button>   
                        </br></br>
                            <div id="editDay">
                                 <div class="form-group">
                                    <label for="day-edit-members">Shift Day:</label>
                                    <select name="day-edit-members" class="form-control" id="day-edit-members" required>
                                        <option disabled selected value="none"> -- Select a day -- </option>
                                        <option value="Sunday">Sunday</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                        <option value="Saturday">Saturday</option>
                                    </select>
                                </div>    
                            </div>
                            <div id="editTime">
                                <div class="form-group">
                                    <label for="time-edit-members">Shift Time: (XX:XX AM/PM; i.e. "10:00 AM" or "2:30 PM")</label>
                                    <input type="text" name="time-edit-members" class="form-control" id="time-edit-members" required>
                                </div>    
                            </div>
                            <div id="editCredit">
                                 <div class="form-group">
                                    <label for="credit-edit-members">Credit Status:</label>
                                    <select name="credit-edit-members" class="form-control" id="credit-edit-members" required>
                                        <option disabled selected value="none"> -- Select an Option -- </option>
                                        <option value="Pending">Pending</option>
                                        <option value="Complete">Complete</option>
                                        <option value="Incomplete">Incomplete</option>
                                    </select>
                                </div>    
                            </div>
                            <div id="editRequirements">
                                <div class="form-group">
                                    <label for="requirements-edit-members">Requirements Status:</label>
                                    <textarea name="requirements-edit-members" class="form-control" id="requirements-edit-members" required></textarea>
                                </br>
                                    <strong>Are you sure you want to make these changes? Any previous data for this will be deleted.</strong>
                                </div>    
                            </div>
                            <div id="editComments">
                                <div class="form-group">
                                    <label for="comments-edit-members">Comments</label>
                                    <textarea name="comments-edit-members" class="form-control" id="comments-edit-members" required></textarea>
                                </br>
                                    <strong>Are you sure you want to make these changes? Any previous data for this will be deleted.</strong>
                                </div>    
                            </div>
                            <div id="editDelete">
                                <div class="form-group">
                                    <strong>Are you sure you want to remove the selected members from this program?</strong>
                                </div>    
                            </div>
                            <div id="editConfirmation">
                                <input type="radio" name="confirmation-edit-members" value="yes" id="confirmation-yes-edit-members">
                                <label for="confirmation-yes-edit-members">Yes</label>
                                <input type="radio" name="confirmation-edit-members" value="no" checked = "checked" id="confirmation-no-edit-members">
                                <label for="confirmation-no-edit-members">No</label>
                            </div>
                        </br>
                            <input type="hidden" id="editChoice" value="">
                            <input type="button" name="editMembersSubmit" id="editMembersSubmit" value="Make Changes" class="btn btn-danger"></input>
                </div>
                </br>
                <div class="modal-footer">
                    <button type="button" id="closEditMembers" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="newShiftsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Shifts</h4>
                </div>
                <div class="modal-body">
                    Create shifts from members' assigned shifts or manually enter shifts? </br>
                    <button class="btn btn-primary btn-xs" id="autoShiftsEntryButton">Auto Entry</button>
                    <button class="btn btn-primary btn-xs" id="manualShiftsEntryButton">Manual Entry</button>
                    <div id="autoShiftsEntry">
                        <h5>If any shifts already exist for this week, they will be deleted by using this method</h5>
                        <form method="post" id="newShiftsAutoForm" name="newShiftsAutoForm">
                            <div class="form-group">
                                <label for="program-form-shifts-auto">Program:</label>
                                <input type="text" name="program-form-shifts-auto" class="form-control" id="program-form-shifts-auto" readonly required>
                            </div>   
                            <div class="form-group">
                                <label for="semester-form-shifts-auto">Semester:</label>
                                <input type="text" name="semester-form-shifts-auto" class="form-control" id="semester-form-shifts-auto" readonly required>
                            </div>    
                            <div class="form-group">
                                <label for="year-form-shifts-auto">Year:</label>
                                <input type="text" name="year-form-shifts-auto" class="form-control" id="year-form-shifts-auto" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="week-form-shifts-auto">Week:</label>
                                <input type="text" name="week-form-shifts-auto" class="form-control" id="week-form-shifts-auto" readonly required>
                            </div> 
                            <div id="editConfirmationAutoShifts">
                                <strong>Are you sure you want to proceed? If any shifts already exist for this week, they will be deleted.</strong> </br>
                                <input type="radio" name="confirmation-shifts-auto" value="yes" id="confirmation-yes-shifts-auto">
                                <label for="confirmation-yes-shifts-auto">Yes</label>
                                <input type="radio" name="confirmation-shifts-auto" value="no" checked = "checked" id="confirmation-no-shifts-auto">
                                <label for="confirmation-no-shifts-auto">No</label>
                            </div> 
                            <div>
                                <p>&nbsp</p>
                            </div> 
                            <input type="submit" name="newShiftsAutoFormSubmit" id="newShiftsAutoFormSubmit" value="Add Shifts" class="btn btn-danger"></input>
                        </form>  
                    </div>
                    <div id="manualShiftsEntry">
                        <form method="POST" id="newShiftsManualForm" name="newShiftsManualForm">
                            <div class="form-group">
                                <label for="program-form-shifts-manual">Program:</label>
                                <input type="text" name="program-form-shifts-manual" class="form-control" id="program-form-shifts-manual" readonly required>
                            </div>   
                            <div class="form-group">
                                <label for="semester-form-shifts-manual">Semester:</label>
                                <input type="text" name="semester-form-shifts-manual" class="form-control" id="semester-form-shifts-manual" readonly required>
                            </div>    
                            <div class="form-group">
                                <label for="year-form-shifts-manual">Year:</label>
                                <input type="text" name="year-form-shifts-manual" class="form-control" id="year-form-shifts-manual" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="week-form-shifts-manual">Week:</label>
                                <input type="text" name="week-form-shifts-manual" class="form-control" id="week-form-shifts-manual" readonly required>
                            </div> 
                            <table style='margin-left:150px;'>
                                <tr>
                                    <td>
                                        <b>Members:</b><br/>
                                       <select multiple="multiple" size='10' id='manualshiftslstBox'>
                                        </select>
                                        
                                </td>
                                <td style='text-align:center;vertical-align:middle;'>
                                    <button class="btn btn-primary btn-xs lstButton" id='btnRightManualShift' value='right'>></button>
                                    <br/><button class="btn btn-primary btn-xs lstButton" style='margin:5px;' id='btnLeftManualShift' value='left'><</button> 
                                </td>
                                <td>
                                    <b>Shifts to Add:</b><br/>
                                    <select multiple="multiple" size='10' id='tomanualshiftslstBox'> 
                                    </select>
                                </td>
                            </tr>
                            </table>   
                        </br>
                             <div class="form-group">
                                <label for="day-form-shifts-manual">Shift Day:</label>
                                <select name="day-form-shifts-manual" class="form-control" id="day-form-shifts-manual" required>
                                    <option disabled selected value> -- Select a day -- </option>
                                    <option value="Sunday">Sunday</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                </select>
                            </div>    
                            <div class="form-group">
                                <label for="time-form-shifts-manual">Shift Time: (XX:XX AM/PM; i.e. "10:00 AM" or "2:30 PM")</label>
                                <input type="text" name="time-form-shifts-manual" class="form-control" id="time-form-shifts-manual" required>
                            </div> 
                            <div class="form-group">
                                <label for="notes-form-shifts-manual">Notes: **Optional** (Extra, Group, etc.)</label>
                                <input type="text" name="notes-form-shifts-manual" class="form-control" id="notes-form-shifts-manual">
                            </div>    
                            <input type="submit" name="newShiftsManualFormSubmit" id="newShiftsManualFormSubmit" value="Add Shifts" class="btn btn-danger"></input>
                        </form>
                    </div>
                </div>
                </br>
                <div class="modal-footer">
                    <button type="button" id="closeNewMembers" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="editShiftsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Shifts</h4>
                </div>
                <div class="modal-body">
                    
                            <div class="form-group">
                                <label for="program-edit-shifts">Program:</label>
                                <input type="text" name="program-edit-shifts" class="form-control" id="program-edit-shifts" readonly required>
                            </div>   
                            <div class="form-group">
                                <label for="semester-edit-shifts">Semester:</label>
                                <input type="text" name="semester-edit-shifts" class="form-control" id="semester-edit-shifts" readonly required>
                            </div>    
                            <div class="form-group">
                                <label for="year-edit-shifts">Year:</label>
                                <input type="text" name="year-edit-shifts" class="form-control" id="year-edit-shifts" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="week-edit-shifts">Week:</label>
                                <input type="text" name="week-edit-shifts" class="form-control" id="week-edit-shifts" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="day-edit-shifts">Day:</label>
                                <input type="text" name="day-edit-shifts" class="form-control" id="day-edit-shifts" readonly required>
                            </div>    
                            <h5>Members' Attendance ID's for the given week are also shown to help you choose the right shift</h5>
                            <table style='margin-left:150px;'>
                                <tr>
                                    <td>
                                        <b>Shifts:</b><br/>
                                       <select multiple="multiple" size='10' id='editshiftslstBox'>
                                        </select>
                                        
                                </td>
                                <td style='text-align:center;vertical-align:middle;'>
                                    <button class="btn btn-primary btn-xs lstButton" id='btnRightShiftsEdit' value='right'>></button>
                                    <br/><button class="btn btn-primary btn-xs lstButton" style='margin:5px;' id='btnLeftShiftsEdit' value='left'><</button> 
                                </td>
                                <td>
                                    <b>Shifts to Edit:</b><br/>
                                    <select multiple="multiple" size='10' id='toeditshiftslstBox'> 
                                    </select>
                                </td>
                            </tr>
                            </table>
                            <strong>What do you wish to edit?</strong> </br>
                            <button class="btn btn-primary btn-xs" id="editDayShiftsButton">Shift Day</button>
                            <button class="btn btn-primary btn-xs" id="editTimeShiftsButton">Shift Time</button>
                            <button class="btn btn-primary btn-xs" id="editAlternateNumberShiftsButton">Number</button>
                            <button class="btn btn-primary btn-xs" id="editPresentShiftsButton">Present</button>
                            <button class="btn btn-primary btn-xs" id="editGaveShiftsButton">Gave Tour</button> 
                            <button class="btn btn-primary btn-xs" id="editNoteShiftsButton">Notes</button> 
                            <button class="btn btn-primary btn-xs" id="editDeleteShiftsButton">Delete Shifts</button>   
                        </br></br>
                            <div id="editDayShifts">
                                 <div class="form-group">
                                    <label for="day-edit-shifts-input">Shift Day:</label>
                                    <select name="day-edit-shifts-input" class="form-control" id="day-edit-shifts-input" required>
                                        <option disabled selected value="none"> -- Select a day -- </option>
                                        <option value="Sunday">Sunday</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                        <option value="Saturday">Saturday</option>
                                    </select>
                                </div>    
                            </div>
                            <div id="editTimeShifts">
                                <div class="form-group">
                                    <label for="time-edit-shifts">Shift Time: (XX:XX AM/PM; i.e. "10:00 AM" or "2:30 PM")</label>
                                    <input type="text" name="time-edit-shifts" class="form-control" id="time-edit-shifts" required>
                                </div>    
                            </div>
                            <div id="editAlternateNumberShifts">
                                 <div class="form-group">
                                    <label for="alternateNumber-edit-shifts">Number:</label>
                                    <input type="number" name="alternateNumber-edit-shifts" class="form-control" id="alternateNumber-edit-shifts" required>
                                </div>    
                            </div>
                            <div id="editPresentShifts">
                                 <div class="form-group">
                                    <label for="present-edit-shifts">Present:</label>
                                    <select name="present-edit-shifts" class="form-control" id="present-edit-shifts" required>
                                        <option disabled selected value="none"> -- Select an Option -- </option>
                                        <option value="Present">Present</option>
                                        <option value="Excused">Excused</option>
                                        <option value="No Show">No Show</option>
                                    </select>
                                </div>    
                            </div>
                            <div id="editGaveShifts">
                                <div class="form-group">
                                    <label for="gaveShifts-edit-shifts">Gave Tour:</label>
                                    <select name="gaveShifts-edit-shifts" class="form-control" id="gaveShifts-edit-shifts" required>
                                        <option disabled selected value="none"> -- Select an Option -- </option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>    
                            </div>
                            <div id="editNoteShifts">
                                <div class="form-group">
                                    <label for="noteShifts-edit-shifts">Notes</label>
                                    <input type="text" name="noteShifts-edit-shifts" class="form-control" id="noteShifts-edit-shifts" required>
                                </br>
                                    <strong>Are you sure you want to make these changes? Any previous data for this will be deleted.</strong>
                                </div>    
                            </div>
                            <div id="editDeleteShifts">
                                <div class="form-group">
                                    <strong>Are you sure you want to remove the selected shifts from their shifts for this week?</strong>
                                </div>    
                            </div>
                            <div id="editConfirmationShifts">
                                <input type="radio" name="confirmation-edit-shifts" value="yes" id="confirmation-yes-edit-shifts">
                                <label for="confirmation-yes-edit-shifts">Yes</label>
                                <input type="radio" name="confirmation-edit-shifts" value="no" checked = "checked" id="confirmation-no-edit-shifts">
                                <label for="confirmation-no-edit-shifts">No</label>
                            </div>
                        </br>
                            <input type="hidden" id="editChoiceShifts" value="">
                            <input type="button" name="editShiftsSubmit" id="editShiftsSubmit" value="Make Changes" class="btn btn-danger"></input>
                </div>
                </br>
                <div class="modal-footer">
                    <button type="button" id="closEditShifts" class="btn btn-default" data-dismiss="modal">Close</button>
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
        var programName = 'Tours';
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
                targets: [2,5,6,7,8,9,10,14,15,16, 17],
                visible: false,
            },
            {
                targets: [11],
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

        $('#btnRightVols').on("click", function() {
            var selectedOpts = $('#volslstBox1 option:selected');
            if (selectedOpts.length == 0) {
            }
            else {
                for(var i=0; i < selectedOpts.length; i++) {
                    toggleColumns(tableVols, selectedOpts[i].value);
                }
                $('#volslstBox2').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                var my_options = $("#volslstBox2 option");

                my_options.sort(function(a,b) {
                    return a.value - b.value;
                });
                $("#volslstBox2").empty().append(my_options);
            }
        });

        $('#btnLeftVols').on("click", function() {
            var selectedOpts = $('#volslstBox2 option:selected');
            if (selectedOpts.length == 0) {
            }
            else {
                for(var i=0; i < selectedOpts.length; i++) {
                    toggleColumns(tableVols, selectedOpts[i].value);
                }
                $('#volslstBox1').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                var my_options = $("#volslstBox1 option");

                my_options.sort(function(a,b) {
                    return a.value - b.value;
                });
                $("#volslstBox1").empty().append(my_options);
            }
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
                targets: [2,3,4,5,6,7,8,9,10,17,18,19],
                visible: false
                
            },
            {
                targets: [11],
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
            order: [[11, "asc"], [12, "asc"], [1, "asc"]],
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

        $('#btnRightAttn').on("click", function() {
            var selectedOpts = $('#attnlstBox1 option:selected');
            if (selectedOpts.length == 0) {
            }
            else {
                for(var i=0; i < selectedOpts.length; i++) {
                    toggleColumns(tableAttn, selectedOpts[i].value);
                }
                $('#attnlstBox2').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                var my_options = $("#attnlstBox2 option");

                my_options.sort(function(a,b) {
                    return a.value - b.value;
                });
                $("#attnlstBox2").empty().append(my_options);
            }
        });

        $('#btnLeftAttn').on("click", function() {
            var selectedOpts = $('#attnlstBox2 option:selected');
            if (selectedOpts.length == 0) {
            }
            else {
                for(var i=0; i < selectedOpts.length; i++) {
                    toggleColumns(tableAttn, selectedOpts[i].value);
                }
                $('#attnlstBox1').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                var my_options = $("#attnlstBox1 option");

                my_options.sort(function(a,b) {
                    return a.value - b.value;
                });
                $("#attnlstBox1").empty().append(my_options);
            }
        });

        $('#btnRightMember').on("click", function() {
            var selectedOpts = $('#userlstBox option:selected');
            if (selectedOpts.length == 0) {
            }
            else {
                $('#memberlstBox').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                var my_options = $("#memberlstBox option");

                my_options.sort(function(a,b) {
                    return a.text == b.text ? 0 : a.text < b.text ? -1 : 1;
                });
                $("#memberlstBox").empty().append(my_options);
            }
        });

        $('#btnLeftMember').on("click", function() {
            var selectedOpts = $('#memberlstBox option:selected');
            if (selectedOpts.length == 0) {
            }
            else {
                $('#userlstBox').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                var my_options = $("#userlstBox option");

                my_options.sort(function(a,b) {
                    return a.text == b.text ? 0 : a.text < b.text ? -1 : 1;
                });
                $("#userlstBox").empty().append(my_options);
            }
        });

        $('#btnRightMemberEdit').on("click", function() {
            var selectedOpts = $('#editmemberlstBox option:selected');
            if (selectedOpts.length == 0) {
            }
            else {
                $('#toeditmemberlstBox').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                var my_options = $("#toeditmemberlstBox option");

                my_options.sort(function(a,b) {
                    return a.text == b.text ? 0 : a.text < b.text ? -1 : 1;
                });
                $("#toeditmemberlstBox").empty().append(my_options);
            }
        });

        $('#btnLeftMemberEdit').on("click", function() {
            var selectedOpts = $('#toeditmemberlstBox option:selected');
            if (selectedOpts.length == 0) {
            }
            else {
                $('#editmemberlstBox').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                var my_options = $("#editmemberlstBox option");

                my_options.sort(function(a,b) {
                    return a.text == b.text ? 0 : a.text < b.text ? -1 : 1;
                });
                $("#editmemberlstBox").empty().append(my_options);
            }
        });

        $('#btnRightShiftsEdit').on("click", function() {
            var selectedOpts = $('#editshiftslstBox option:selected');
            if (selectedOpts.length == 0) {
            }
            else {
                $('#toeditshiftslstBox').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                var my_options = $("#toeditshiftslstBox option");

                my_options.sort(function(a,b) {
                    return a.text == b.text ? 0 : a.text < b.text ? -1 : 1;
                });
                $("#toeditshiftslstBox").empty().append(my_options);
            }
        });

        $('#btnLeftShiftsEdit').on("click", function() {
            var selectedOpts = $('#toeditshiftslstBox option:selected');
            if (selectedOpts.length == 0) {
            }
            else {
                $('#editshiftslstBox').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                var my_options = $("#editshiftslstBox option");

                my_options.sort(function(a,b) {
                    return a.text == b.text ? 0 : a.text < b.text ? -1 : 1;
                });
                $("#editshiftslstBox").empty().append(my_options);
            }
        });

        $('#btnRightManualShift').on("click", function() {
            var selectedOpts = $('#manualshiftslstBox option:selected');
            if (selectedOpts.length == 0) {
            }
            else {
                $('#tomanualshiftslstBox').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                var my_options = $("#tomanualshiftslstBox option");

                my_options.sort(function(a,b) {
                    return a.text == b.text ? 0 : a.text < b.text ? -1 : 1;
                });
                $("#tomanualshiftslstBox").empty().append(my_options);
            }
        });

        $('#btnLeftManualShift').on("click", function() {
            var selectedOpts = $('#tomanualshiftslstBox option:selected');
            if (selectedOpts.length == 0) {
            }
            else {
                $('#manualshiftslstBox').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                var my_options = $("#manualshiftslstBox option");

                my_options.sort(function(a,b) {
                    return a.text == b.text ? 0 : a.text < b.text ? -1 : 1;
                });
                $("#manualshiftslstBox").empty().append(my_options);
            }
        });

        $("#fileMethod").hide();
        $("#manualMethod").hide();

        $("#editDay").hide();
        $("#editTime").hide();
        $("#editCredit").hide();
        $("#editRequirements").hide();
        $("#editComments").hide();
        $("#editDelete").hide();
        $("#editConfirmation").hide();

        $("#autoShiftsEntry").hide();
        $("#manualShiftsEntry").hide();

        $("#editDayShifts").hide();
        $("#editTimeShifts").hide();
        $("#editAlternateNumberShifts").hide();
        $("#editPresentShifts").hide();
        $("#editGaveShifts").hide();
        $("#editNoteShifts").hide();
        $("#editDeleteShifts").hide();
        $("#editConfirmationShifts").hide();


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
            var row = tableVols.cell($(this)).index().row;
            var column = tableVols.cell($(this)).index().column;
            var alterable = [11,12,13,14,15];
            var selectable = [11,14];
            var textAreaCols = [13,15];
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
            var selectable = [11,14,15];
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
                    return a.text == b.text ? 0 : a.text < b.text ? -1 : 1;
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
                    return a.text == b.text ? 0 : a.text < b.text ? -1 : 1;
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
                    return a.text == b.text ? 0 : a.text < b.text ? -1 : 1;
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
                    return a.text == b.text ? 0 : a.text < b.text ? -1 : 1;
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
                    if(newValue == "") {
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
