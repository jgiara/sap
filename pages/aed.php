<?php 
ob_start();
session_start();
require_once '../../resources/init.php';
$general->logged_out_protect();
require '../include/helpers/userInfo.php';
require '../include/helpers/helpers.php';
require '../include/helpers/pageProtect.php';
echo '<input type="hidden" id="programName" value="Admitted Eagle Day">';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admitted Eagle Day - Student Admission Program - Boston College</title>

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
                    <h3 style="margin-top: 60px; margin-bottom: 0;" class="page-header" id="panels-header">Admitted Eagle Day</h3>
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
                                <!--<button class="btn btn-success" id="newAttendance" style="margin-left: 10px;">Populate Sheet</button>-->
    
                            <ul id="tabs-list" class="nav nav-tabs" style="margin-top: 10px;">
                                <li id="volunteers-tab" class="active"><a href="#volunteers" data-toggle="tab">Volunteers</a>
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
                        <form method="post" id="addMembersFormFile" name="addMembersFormFile" enctype="multipart/form-data" action="../include/insertProgramMembers.php">
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
                                </br><Strong>Note: </strong>File must ONLY have emails in the first column with the header included
                                </br>
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
                            <button class="btn btn-primary btn-xs" id="editCreditButton">Credit</button>
                            <button class="btn btn-primary btn-xs" id="editRequirementsButton">Requirements Status</button>
                            <button class="btn btn-primary btn-xs" id="editCommentsButton">Comments</button> 
                            <button class="btn btn-primary btn-xs" id="editDeleteButton">Delete Members</button>   
                        </br></br>
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
        var programName = 'Admitted Eagle Day';
        var s = document.getElementById("table-semester");
        var selectedSemester = s.options[s.selectedIndex].value;
        var y = document.getElementById("table-year");
        var selectedYear = y.options[y.selectedIndex].value;
        
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
                targets: [2,5,6,7,8,9,10,11,12,14,15,16, 17],
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

        $("#editCredit").hide();
        $("#editRequirements").hide();
        $("#editComments").hide();
        $("#editDelete").hide();
        $("#editConfirmation").hide();



        $('#semester-submit').on("click", function() {
            
            var s = document.getElementById("table-semester");
            var selectedSemester = s.options[s.selectedIndex].value;
            var y = document.getElementById("table-year");
            var selectedYear = y.options[y.selectedIndex].value;
            
            tableVols.clear();


            getVolunteerData(function(newTable) {
                  newTable.draw();
            }, programName, selectedSemester, selectedYear, tableVols);
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
            var alterable = [13,14,15];
            var selectable = [14];
            var textAreaCols = [13,15];
            if(alterable.indexOf(column) == -1) { //can't the other columns
                return;
            }
            var data = tableVols.row(row).data();
            var updateField = ['first_name','last_name','email','class','school','major','minor','hometown','state_country','ahana','transfer','shift_day','shift_time','requirements_status','credit_status','comments','eagle_id', 'program_id'];
            setTimeout(function() {
                if(column == 14) {
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
                insertProgramMembersManualShift(function() {
                    location.reload();
                }, emails, program, semester, year, '', '');
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
