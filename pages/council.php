<?php 
ob_start();
session_start();
require_once '../../resources/init.php';
$general->logged_out_protect();
require '../include/helpers/userInfo.php';
require '../include/helpers/helpers.php';
echo '<input type="hidden" id="programName" value="Council">';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SAP Council - Student Admission Program - Boston College</title>

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
                    <h3 style="margin-top: 60px; margin-bottom: 0;" class="page-header" id="panels-header">SAP Council</h3>
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
                                            if($currMonth < 6) {
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
                            <div>
                            </br>
                                <button class="btn btn-primary btn-xs" id="export-excel-all">Excel</button>
                                <button class="btn btn-primary btn-xs" id="export-csv-all">CSV</button>
                                <button class="btn btn-primary btn-xs" id="export-pdf-all">PDF</button>
                                <button class="btn btn-danger btn-xs" id="new-members-modal-button" data-toggle="modal" data-target="#newMembersModal">New Council Members</button>
                            </div>
                            </br>
                            <table class="table table-striped table-bordered table-hover" id="table-volunteers" style="font-size: 13px; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Position</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Class</th>
                                        <th>School</th>
                                        <th>Major</th>
                                        <th>Minor</th>
                                        <th>Hometown</th>
                                        <th>State</th>
                                        <th>Delete</th>
                                        <th>Council Member ID</th>
                                    </tr>
                                    <tr>
                                        <td>Position</td>
                                        <td>First Name</td>
                                        <td>Last Name</td>
                                        <td>Email</td>
                                        <td>Class</td>
                                        <td>School</td>
                                        <td>Major</td>
                                        <td>Minor</td>
                                        <td>Hometown</td>
                                        <td>State</td>
                                        <td>Delete</td>
                                        <td>Council Member ID</td>
                                    </tr>
                                </thead>
                                
                                <tbody id="tablebody-volunteers">
                                    
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

    <div id="newMembersModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Council New Members</h4>
                </div>
                <div class="modal-body">
                    <div id="manualMethod">
                        <form method="POST" id="addNewCouncilMembers" name="addNewCouncilMembers">
                            <div class="form-group">
                        <label for="semester-form">Semester:</label>
                        <input type="text" name="semester-form" class="form-control" id="semester-form" readonly required>
                    </div>   
                            <div class="form-group">
                        <label for="year-form">Year:</label>
                        <input type="text" name="year-form" class="form-control" id="year-form" readonly required>
                    </div>    
                    <div class="form-group">
                        <label for="position-form">Position:</label>
                        <select name="position-form" class="form-control" id="position-form" required>
                            <option disabled selected value required> -- Select a Position -- </option>
                            <option value="Panels Coordinator">Panels Coordinator</option>
                            <option value="Tours Coordinator">Tours Coordinator</option>
                            <option value="Greeting Coordinator">Greeting Coordinator</option>
                            <option value="Office Management Coordinator">Office Management Coordinator</option>
                            <option value="Eagle for a Day Coordinator">Eagle for a Day Coordinator</option>
                            <option value="Admitted Eagle Day Coordinator">Admitted Eagle Day Coordinator</option>
                            <option value="Outreach Coordinator">Outreach Coordinator</option>
                            <option value="High School Visits Coordinator">High School Visits Coordinator</option>
                            <option value="AHANA Outreach Coordinator">AHANA Outreach Coordinator</option>
                            <option value="International Outreach Coordinator">International Outreach Coordinator</option>
                            <option value="Transfer Outreach Coordinator">Transfer Outreach Coordinator</option>
                            <option value="Media Coordinator">Media Coordinator</option>
                            <option value="Summer SAP Advisor">Summer SAP Advisor</option>
                            <option value="SAP Advisor">SAP Advisor</option>
                        </select>
                    </div>
                    <table style='margin-left:150px;'>
                                <tr>
                                    <td>
                                        <b>Users:</b><br/>
                                       <select multiple="multiple" size='10' id='councillstBox'>
                                        </select>
                                        
                                </td>
                                <td style='text-align:center;vertical-align:middle;'>
                                    <button class="btn btn-primary btn-xs lstButton" id='btnRightCouncil' value='right'>></button>
                                    <br/><button class="btn btn-primary btn-xs lstButton" style='margin:5px;' id='btnLeftCouncil' value='left'><</button> 
                                </td>
                                <td>
                                    <b>Selected Users:</b><br/>
                                    <select multiple="multiple" size='10' id='tocouncillstBox'> 
                                    </select>
                                </td>
                            </tr>
                            </table>          
                            
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
        var y = document.getElementById("table-year");
        var selectedYear = y.options[y.selectedIndex].value;
        var s = document.getElementById("table-semester");
        var selectedSemester = s.options[s.selectedIndex].value;

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
                targets: [10,11],
                visible: false,
            },
            {
                targets: [0],
                render: function(data, type, row) {
                    if(type === 'sort') {
                        switch(data) {
                            case "Head Coordinator": return 'A'; break;
                            case "Panels Coordinator": return 'B'; break;
                            case "Tours Coordinator": return 'C'; break;
                            case "Greeting Coordinator": return 'D'; break;
                            case "Office Management Coordinator": return 'E'; break;
                            case "Eagle for a Day Coordinator": return 'F'; break;
                            case "Admitted Eagle Day Coordinator": return 'G'; break;
                            case "Outreach Coordinator": return 'H'; break;
                            case "High School Visits Coordinator": return 'I'; break;
                            case "AHANA Outreach Coordinator": return 'J'; break;
                            case "International Outreach Coordinator": return 'K'; break;
                            case "Transfer Outreach Coordinator": return 'L'; break;
                            case "Media Coordinator": return 'M'; break;
                            case "SAP Advisor": return 'N'; break;
                            case "Summer SAP Advisor": return 'O'; break;
                            default: return data;
                        }
                    }
                    return data;
                }
            }],
            order: [[0, "asc"], [2, "asc"]],
            paging: false,
        });

        $('#btnRightCouncil').on("click", function() {
            var selectedOpts = $('#councillstBox option:selected');
            if (selectedOpts.length == 0) {
            }
            else {
                $('#tocouncillstBox').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                var my_options = $("#tocouncillstBox option");

                my_options.sort(function(a,b) {
                    return a.value - b.value;
                });
                $("#tocouncillstBox").empty().append(my_options);
            }
        });

        $('#btnLeftCouncil').on("click", function() {
            var selectedOpts = $('#tocouncillstBox option:selected');
            if (selectedOpts.length == 0) {
            }
            else {
                $('#councillstBox').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                var my_options = $("#councillstBox option");

                my_options.sort(function(a,b) {
                    return a.value - b.value;
                });
                $("#councillstBox").empty().append(my_options);
            }
        });
        
        getAllCouncilMembers(function(newTable) {
                  newTable.draw();
            }, selectedYear, selectedSemester, tableVols);
     
        // Apply the search
        tableVols.columns().every(function (index) {
        $('#table-volunteers thead tr:eq(1) td:eq(' + index + ') input').on('keyup change', function () {
            tableVols.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
            } );
        } );


        $('#semester-submit').on("click", function() {
            
            var y = document.getElementById("table-year");
            var selectedYear = y.options[y.selectedIndex].value;
            var s = document.getElementById("table-semester");
            var selectedSemester = s.options[s.selectedIndex].value;
            
            tableVols.clear();

            getAllCouncilMembers(function(newTable) {
                  newTable.draw();
            }, selectedYear, selectedSemester, tableVols);
        });
        
        $('#table-volunteers tbody').on('dblclick', 'td', function(e) {
            if(!<?php 
                if((in_array('Admin', $roles)) || (in_array('Advisor', $roles))) {
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
            var alterable = [10];
            if(alterable.indexOf(column) == -1) { //can't the other columns
                return;
            }
            var data = tableVols.row(row).data();
            setTimeout(function() {
                $(currentEle).html('<button class="btn btn-primary btn-xs" id="delete-user">Delete User</button>');
                $(".thVal").focus();
                $("#delete-user").on("click", function() {
                    deleteCouncilMember(function() {
                        alert(data[1] + " " + data[2] + " has been deleted as a Council member");
                        location.reload();
                    }, data[11]);
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
            var y = document.getElementById("table-year");
            var selectedYear = y.options[y.selectedIndex].value;
            var s = document.getElementById("table-semester");
            var selectedSemester = s.options[s.selectedIndex].value;
            document.getElementById("year-form").value = selectedYear;
            document.getElementById("semester-form").value = selectedSemester;
            var programOptions = $("#program-name option");
            getAllPossibleUsers(function(b) {
                var users = b;
                var userselect = document.getElementById("councillstBox");
                $("#councillstBox").empty();
                $("#tocouncillstBox").empty();
                for(var i = 0; i < users[0].length; i++) {
                    var opt = document.createElement('option');
                    opt.value = users[0][i];
                    opt.id = users[2][i];
                    opt.innerHTML = users[2][i] + ", " + users[1][i];
                    userselect.appendChild(opt);
                }
                var my_options = $("#councillstBox option");
                my_options.sort(function(a,b) {
                    return a.id > b.id;
                });
                $("#councillstBox").empty().append(my_options);
            });
        });

        $("#addNewCouncilMembers").on("submit", function(e) {
            var selectedOpts = $('#tocouncillstBox option');
            if (selectedOpts.length == 0) {
                alert("You must choose at least one user");
                e.preventDefault();
            }
            else {
                var y = document.getElementById("table-year");
                var selectedYear = y.options[y.selectedIndex].value;
                var s = document.getElementById("table-semester");
                var selectedSemester = s.options[s.selectedIndex].value;
                var p = document.getElementById("position-form");
                var position = p.options[p.selectedIndex].value;
                var emails = [];
                    for(var i=0; i < selectedOpts.length; i++) {
                        emails[i] = selectedOpts[i].value;
                    }
                insertCouncilMember(function() {
                    location.reload();
                }, emails, selectedYear, selectedSemester, position);
                e.preventDefault();
            }
        }); 

        $(".lstButton").on("click", function(e) {
            e.preventDefault();
        });

        //access to certain parts of page
        if(!<?php 
                if((in_array('Admin', $roles)) || (in_array('Advisor', $roles))) {
                    echo "true";
                }
                else {
                    echo "false";
                } 
                ?>) {
                $("#new-members-modal-button").hide();
            }
            else {
                tableVols.column(10).visible(true);
            }
    });
    </script>

</body>

</html>
