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
                                        <button class="btn btn-warning btn-xs" id="edit-shifts-modal-button">Edit Shifts</button>
                                        <button class="btn btn-danger btn-xs" id="new-attendance-modal-button">New Attendance Sheet</button>
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
                                                    <th>Alternate</th>
                                                    <th>Present</th>
                                                    <th>Gave Panel</th>
                                                    <th>Notes</th>
                                                    <th>Eagle Id</th>
                                                    <th>Attendance Id</th>
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
                                                    <td>Alternate</td>
                                                    <td>Present</td>
                                                    <td>Gave Panel</td>
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
                               <select multiple="multiple" size='7' id='volslstBox1'>
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
                            <select multiple="multiple" size='7' id='volslstBox2'> 
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
                               <select multiple="multiple" size='7' id='attnlstBox1'>
                                  <option value="0">First Name</option>
                                  <option value="1">Last Name</option>
                                  <option value="11">Shift Day</option>
                                  <option value="12">Shift Time</option>
                                  <option value="13">Alternate</option>
                                  <option value="14">Present</option>
                                  <option value="15">Gave Panel</option>
                                  <option value="16">Notes</option> 
                            </select>
                        </td>
                        <td style='text-align:center;vertical-align:middle;'>
                            <button class="btn btn-primary btn-xs" id='btnRightAttn' value='right'>></button>
                            <br/><button class="btn btn-primary btn-xs" style='margin:5px;' id='btnLeftAttn' value='left'><</button> 
                        </td>
                        <td>
                            <b>Not Displayed: </b><br/>
                            <select multiple="multiple" size='7' id='attnlstBox2'> 
                                <option value="2">Email</option>
                                <option value="3">Class</option>
                                <option value="4">School</option>
                                <option value="5">Major</option>
                                <option value="6">Minor</option>
                                <option value="7">Hometown</option>
                                <option value="8">State</option>
                                <option value="9">AHANA</option>
                                <option value="10">Transfer</option>
                                <option value="17">Eagle ID</option>
                                <option value="18">Attendance ID</option>
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
                                <input type="file" name="file-form" id="file-form" accept=".csv">
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
                                <label for="semester-form-members">Shift Day:</label>
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
                    <div id="manualMethod">
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
                            <strong>What do you wish to do?</strong> </br>
                            <button class="btn btn-primary btn-xs" id="editDayButton">Edit Shift Day</button>
                            <button class="btn btn-primary btn-xs" id="editTimeButton">Edit Shift Time</button>
                            <button class="btn btn-primary btn-xs" id="editCreditButton">Edit Credit</button>
                            <button class="btn btn-primary btn-xs" id="editRequirementsButton">Edit Requirements Status</button>
                            <button class="btn btn-primary btn-xs" id="editCommentsButton">Delete Members</button>   
                        </br></br>
                            <div id="editDay">
                                 <div class="form-group">
                                    <label for="semester-edit-members">Shift Day:</label>
                                    <select name="day-edit-members" class="form-control" id="day-edit-members" required>
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
                            </div>
                            <div id="editTime">
                                <div class="form-group">
                                    <label for="semester-time-members">Shift Time: (XX:XX AM/PM; i.e. "10:00 AM" or "2:30 PM")</label>
                                    <input type="text" name="time-edit-members" class="form-control" id="time-edit-members" required>
                                </div>    
                            </div>
                            <input type="button" name="editMembersSubmit" id="editMembersSubmit" value="Make Changes" class="btn btn-danger"></input>
                        
                    </div>
                </div>
                </br>
                <div class="modal-footer">
                    <button type="button" id="closeNewMembers" class="btn btn-default" data-dismiss="modal">Close</button>
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
                targets: [2,3,4,5,6,7,8,9,10,17,18],
                visible: false,
                orderable: false
                
            },
            {
                targets: [12],
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
                    return a.id > b.id;
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
                    return a.id > b.id;
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
                    return a.id > b.id;
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
                    return a.id > b.id;
                });
                $("#editmemberlstBox").empty().append(my_options);
            }
        });

        $("#fileMethod").hide();
        $("#manualMethod").hide();
        $("#file-form").prop('required', true);
        $("#test-form").prop('required', true);


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
                else {
                    $(currentEle).html('<input id="newvalue" class="thVal" type="text" value="' + valueT + '" />');
                }
                $(".thVal").focus();
                if(selectable.indexOf(column) == -1) {
                    document.getElementById("newvalue").value = document.getElementById("newvalue").value;
                    $(".thVal").focus();
                }
                $(".thVal").keyup(function (event) {
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
            var updateField = ['first_name','last_name','email','class','school','major','minor','hometown','state_country','ahana','transfer','shift_day','shift_time','alternate_number','present','gave_panel_tour','note','eagle_id','attendance_id'];
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
                    document.getElementById("newvalue").value = document.getElementById("newvalue").value;
                    $(".thVal").focus();
                }
                $(".thVal").keyup(function (event) {
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
                                data[18]
                            ]).draw()
                        }, data[18], updateField[column], 'Attendance', data[column], 'attendance_id');
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
                    insertProgramMembersManualShift(emails, program, semester, year, day, time);
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

        $("#selectSearch").keyup(function() {
            var seachText = $(this).val().toLowerCase();
            $("#userlstBox option").each(function() {
                var name = $(this).text().toLowerCase();
                var email = $(this).val().toLowerCase();
            });
        });
    });
    </script>

</body>

</html>
