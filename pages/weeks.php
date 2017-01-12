<?php 
ob_start();
session_start();
require_once '../../resources/init.php';
$general->logged_out_protect();
require '../include/helpers/userInfo.php';
require '../include/helpers/helpers.php';
require '../include/helpers/highestPageProtect.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Week Administration - Student Admission Program - Boston College</title>

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
                    <h3 style="margin-top: 60px; margin-bottom: 0;" class="page-header" id="panels-header">Week Administration</h3>
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
                                <button class="btn btn-md btn-success" id="openModalButton" style="margin-left: 10px;" data-toggle="modal" data-target="#addWeekModal">Add New Week</button>
                            </br></br>

                            <!-- Tab panes -->
                            
                                        <table class="table table-striped table-bordered table-hover" id="table-weeks" style="font-size: 13px; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Week</th>
                                                    <th>Current Week</th>
                                                    <th>Sunday</th>
                                                    <th>Monday</th>
                                                    <th>Tuesday</th>
                                                    <th>Wednesday</th>
                                                    <th>Thursday</th>
                                                    <th>Friday</th>
                                                    <th>Saturday</th>
                                                    <th>Week ID</th>
                                                </tr>
                                                <tr>
                                                    <td>Week</td>
                                                    <td>Current Week</td>
                                                    <td>Sunday</td>
                                                    <td>Monday</td>
                                                    <td>Tuesday</td>
                                                    <td>Wednesday</td>
                                                    <td>Thursday</td>
                                                    <td>Friday</td>
                                                    <td>Saturday</td>
                                                    <td>Week ID</td>
                                                </tr>
                                            </thead>
                                            
                                            <tbody id="tablebody-weeks">
                                                
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

     <!-- MODAL FOR Registration -->
        <div id="addWeekModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Week</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST" id="addWeekForm" name="addWeekForm">
                    <div class="form-group">
                        <label for="semester-form">Semester:</label>
                        <input type="text" name="semester-form" class="form-control" id="semester-form" readonly required>
                    </div>    
                    <div class="form-group">
                        <label for="year-form">Year:</label>
                        <input type="text" name="year-form" class="form-control" id="year-form" readonly required>
                    </div>    
                    <div class="form-group">
                        <label for="eagleid">Week Number:</label>
                        <input type="number" name="week-number" class="form-control" id="week-number" placeholder="Week Number" required>
                    </div>    
                    <div class="form-group">
                        <label for="sunday">Sunday Date:</label>
                        <input type="date" name="sunday-date" class="form-control" id="sunday-date" placeholder="Sunday Date" required>
                    </div>
                    <input type="submit" name="submit" id="modalFormSubmit" value="Add Week" class="btn btn-default"></input>
                    </form>
                  </div>
                <div class="modal-footer">
                    <button type="button" id="submitWeek" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
              </div>
            </div>
            <!--end MODAL -->

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
    // Setup - add a text input to each footer cell
        $('#table-weeks thead td').each( function () {
            var title = $(this).text();
            $(this).css('text-align', 'center');
            $(this).html( '<input type="text"/>' );
            $(this).children('input').css('width', '100%');
        } );
     
        // DataTable
        var tableWeek = $('#table-weeks').DataTable({
            responsive: true,
            orderCellsTop: true,
            "columnDefs": [
            {
                "targets": [9],
                "visible": false,
                "orderable": false
                
            }], 
            order: [[0, "asc"]]
            
        });
        var s = document.getElementById("table-semester");
        var selectedSemester = s.options[s.selectedIndex].value;
        var y = document.getElementById("table-year");
        var selectedYear = y.options[y.selectedIndex].value;
        tableWeek.clear();

        getWeeks(function(newTable) {
            newTable.draw();
        }, selectedSemester, selectedYear, tableWeek);
     
        // Apply the search
        tableWeek.columns().every(function (index) {
        $('#table-weeks thead tr:eq(1) td:eq(' + index + ') input').on('keyup change', function () {
            tableWeek.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
            } );
        } );

        $('#semester-submit').on("click", function() {
            
            var s = document.getElementById("table-semester");
            var selectedSemester = s.options[s.selectedIndex].value;
            var y = document.getElementById("table-year");
            var selectedYear = y.options[y.selectedIndex].value;
            tableWeek.clear();

            getWeeks(function(newTable) {
                newTable.draw();
            }, selectedSemester, selectedYear, tableWeek);            
        });
        
        $('#table-weeks tbody').on('dblclick', 'td', function(e) {
            var currentEle = $(this);
            var valueT = $(this).html();
            var row = tableWeek.cell($(this)).index().row;
            var column = tableWeek.cell($(this)).index().column;
            var alterable = [0,1,2,3,4,5,6,7,8];
            var selectable = [1];
            if(alterable.indexOf(column) == -1) { //can't the other columns
                return;
            }
            var data = tableWeek.row(row).data();
            var updateField = ['week_number', 'current_week', 'sunday_date', 'monday_date', 'tuesday_date', 'wednesday_date', 'thursday_date', 'friday_date', 'saturday_date', 'week_id'];
            setTimeout(function() {
                if(column == 1) {
                    $(currentEle).html('<select id="newvalue" class="thVal">' +
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
                            data[column] =  document.getElementById("newvalue").value.trim();
                        }
                        else {
                            data[column] =  $('#newvalue option:selected').val().trim();
                        }     
                        tableWeek.row(row).remove();
                        inLineUpdatePostData(function() {
                            tableWeek.row.add([
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
                            ]).draw()
                        }, data[9], updateField[column], 'Programming_Weeks', data[column], 'week_id');
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

        $("#openModalButton").on("click", function() {
            var s = document.getElementById("table-semester");
            var selectedSemester = s.options[s.selectedIndex].value;
            var y = document.getElementById("table-year");
            var selectedYear = y.options[y.selectedIndex].value;
            document.getElementById("year-form").value = selectedYear;
            document.getElementById("semester-form").value = selectedSemester;
        });

        $("#addWeekForm").on("submit", function(e) {
            var formWeek = document.getElementById("week-number").value;
            var formYear = document.getElementById("year-form").value;
            var formSemester = document.getElementById("semester-form").value;
            var formSun = document.getElementById("sunday-date").value;
            var formSunYear = formSun.substring(0, 4);
            var formSunMonth = formSun.substring(5,7);
            var formSunDate = formSun.substring(8);
            if(parseInt(formSunYear, 10) < 2015 || parseInt(formSunMonth, 10) > 12 || parseInt(formSunDate, 10) > 31) {
                alert("Please input the date in the correct format: yyyy-mm-dd");
                e.preventDefault();
                return ;
            }

            var sunDate = new Date(formSunYear, formSunMonth-1, formSunDate);
            var year = sunDate.getFullYear();
            var month = sunDate.getMonth()+1;
            var date = sunDate.getDate();
            var tmp = sunDate;

            if(isNaN(month) || isNaN(tmp) || isNaN(year)) {
                alert("Please input the date in the correct format: yyyy-mm-dd");
                e.preventDefault();
                return ;
            }

            tmp.setDate(tmp.getDate() + 0);
            month = tmp.getMonth()+1;
            date = tmp.getDate();
            sunDate = year + "-" + month  +"-" + date;

            tmp.setDate(tmp.getDate() + 1);
            month = tmp.getMonth()+1;
            date = tmp.getDate();
            var monDate = year + "-" + month  +"-" + date;

            tmp.setDate(tmp.getDate() + 1);
            month = tmp.getMonth()+1;
            date = tmp.getDate();
            var tuesDate = year + "-" + month  +"-" + date;

            tmp.setDate(tmp.getDate() + 1);
            month = tmp.getMonth()+1;
            date = tmp.getDate();
            var wedDate = year + "-" + month  +"-" + date;

            tmp.setDate(tmp.getDate() + 1);
            month = tmp.getMonth()+1;
            date = tmp.getDate();
            var thursDate = year + "-" + month  +"-" + date;

            tmp.setDate(tmp.getDate() + 1);
            month = tmp.getMonth()+1;
            date = tmp.getDate();
            var friDate = year + "-" + month  +"-" + date;

            tmp.setDate(tmp.getDate() + 1);
            month = tmp.getMonth()+1;
            date = tmp.getDate();
            var satDate = year + "-" + month  +"-" + date;
            
            insertProgrammingWeek(function() {
                location.reload();
            }, formWeek, formYear, formSemester, sunDate, monDate, tuesDate, wedDate, thursDate, friDate, satDate);
            e.preventDefault();
        });
    });
    </script>

</body>

</html>
