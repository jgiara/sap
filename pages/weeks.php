<?php 
ob_start();
session_start();
require '../include/init.php';
$general->logged_out_protect();

$user     = $users->userdata($_SESSION['Eagle_Id']);
$eagleid  = $user['eagle_id'];

$groups = $users->get_roles($eagleid);


$roles = [];
foreach($groups as $group) {
    array_push($roles, $group['group_name']);
}

if(!(in_array('Council', $roles)) && !(in_array('Staff', $roles)) && !(in_array('Admin', $roles))) {
    header('Location: ./dashboard.php');
    exit();
}

echo "<input type='hidden' id='userid' value='$eagleid'/>";

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
                <a class="navbar-brand" href="index.html">Student Admission Program</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav side-scroll" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="./dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="./involvement.php">My Involvement</a>
                        </li>
                        <li>
                            <a href="./profile.php">My Profile</a>
                        </li>
                        <li>
                            <a href="./applications.php">Applications</a>
                        </li>
                        <?php 
                            if(in_array('Council', $roles) || in_array('Staff', $roles) || in_array('Admin', $roles)) {
                                echo "<li>
                                        <a href='./users.php'>All Users</a>
                                    </li>
                                    <li>
                                        <a href='./panels.php'>Panels</a>
                                    </li>
                                    <li>
                                        <a href='./tours.php'>Tours</a>
                                    </li>
                                    <li>
                                        <a href='./greeting.php'>Greeting</a>
                                    </li>
                                    <li>
                                        <a href='./om.php'>Office Management</a>
                                    </li>
                                    <li>
                                        <a href='./efad.php'>Eagle for a Day</a>
                                    </li>
                                    <li>
                                        <a href='./aed.php'>Admitted Eagle Day</a>
                                    </li>
                                    <li>
                                        <a href='./outreach.php'>Outreach</a>
                                    </li>
                                    <li>
                                        <a href='./hsvisits.php'>High School Visits</a>
                                    </li>
                                    <li>
                                        <a href='./ahana.php'>AHANA Outreach</a>
                                    </li>
                                    <li>
                                        <a href='./io.php'>International Outreach</a>
                                    </li>
                                    <li>
                                        <a href='./transfer.php'>Transfer Outreach</a>
                                    </li>
                                    <li>
                                        <a href='./media.php'>Media</a>
                                    </li>
                                    <li>
                                        <a href='./summer.php'>Summer</a>
                                    </li>
                                    <li>
                                        <a href='#'>Administration<span class='fa arrow'></span></a>
                                        <ul class='nav nav-second-level'>
                                            <li>
                                                <a href='./weeks.php'>Weeks</a>
                                            </li>
                                            <li>
                                                <a href='./reports.php'>Reports</a>
                                            </li>
                                        </ul>
                                    </li>";
                            }
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
                                            while($yearHolder >= 2015) {
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
                                                    <th>Sunday</th>
                                                    <th>Monday</th>
                                                    <th>Tuesday</th>
                                                    <th>Wednesday</th>
                                                    <th>Thursday</th>
                                                    <th>Friday</th>
                                                    <th>Saturday</th>
                                                </tr>
                                                <tr>
                                                    <td>Week</td>
                                                    <td>Sunday</td>
                                                    <td>Monday</td>
                                                    <td>Tuesday</td>
                                                    <td>Wednesday</td>
                                                    <td>Thursday</td>
                                                    <td>Friday</td>
                                                    <td>Saturday</td>
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
                    <div class="form-group">
                        <label for="moday-date">Monday Date:</label>
                        <input type="date" name="monday-date" class="form-control" id="monday-date" placeholder="Monday Date" required>
                    </div>
                    <div class="form-group">
                        <label for="tuesday-date">Tuesday Date:</label>
                        <input type="date" name="tuesday-date" class="form-control" id="tuesday-date" placeholder="Tuesday Date" required>
                    </div>
                    <div class="form-group">
                        <label for="wednesday-date">Wednesday Date:</label>
                        <input type="date" name="wednesday-date" class="form-control" id="wednesday-date" placeholder="Wednesday Date" required>
                    </div>
                    <div class="form-group">
                        <label for="thursday-date">Thursday Date:</label>
                        <input type="date" name="thursday-date" class="form-control" id="thursday-date" placeholder="Thursday Date" required>
                    </div>
                    <div class="form-group">
                        <label for="friday-date">Friday Date:</label>
                        <input type="date" name="friday-date" class="form-control" id="friday-date" placeholder="Friday Date" required>
                    </div>
                    <div class="form-group">
                        <label for="saturday-date">Saturday Date:</label>
                        <input type="date" name="saturday-date" class="form-control" id="saturday-date" placeholder="Saturday Date" required>
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
                "targets": [8],
                "visible": false,
                "orderable": false
                
            }]
            
        });
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
                    tableWeek.row.add([
                        item.week_number,
                        item.sunday_date,
                        item.monday_date,
                        item.tuesday_date,
                        item.wednesday_date,
                        item.thursday_date,
                        item.friday_date,
                        item.saturday_date,
                        item.week_id
                    ]);
                });
            })
            .fail(function() {
                console.log("getJSON error");
            });

            setTimeout(function() {
            tableWeek.draw();
        }, 300);
     
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

           

            //document.getElementById("panels-header").innerHTML = "HELLO";
            
            
            $.getJSON("../include/getWeek.php", 
            {
                semester: selectedSemester,
                year: selectedYear
            }, function(data) {
                $.each(data, function(i, item) {
                    tableWeek.row.add([
                        item.week_number,
                        item.sunday_date,
                        item.monday_date,
                        item.tuesday_date,
                        item.wednesday_date,
                        item.thursday_date,
                        item.friday_date,
                        item.saturday_date,
                        item.week_id
                    ]);
                });
            })
            .fail(function() {
                console.log("getJSON error");
            });

            setTimeout(function() {
            tableWeek.draw();
        }, 300);
            
            
        });
        
        $('#table-weeks tbody').on('dblclick', 'td', function(e) {
            var currentEle = $(this);
            var value = $(this).html();
            var row = tableWeek.cell($(this)).index().row;
            var column = tableWeek.cell($(this)).index().column;
            
            var data = tableWeek.row(row).data();
            var updateField = ['week_number', 'sunday_date', 'monday_date', 'tuesday_date', 'wednesday_date', 'thursday_date', 'friday_date', 'saturday_date'];
            
            $(currentEle).html('<input id="newvalue" class="thVal" type="text" value="' + value + '" />');
            $(".thVal").focus();
            $(".thVal").keyup(function (event) {
            if (event.keyCode == 13) {
               
                data[column] =  document.getElementById("newvalue").value.trim();
                tableWeek.row(row).remove();
                $.post("../include/inlineUpdateWeek.php",
                {
                    id : data[8],
                    field : updateField[column],
                    newValue : data[column]
                },
              function(data){
                if(data) {
                  
                }
                });

                setTimeout( function(){
                tableWeek.row.add([
                    data[0],
                    data[1],
                    data[2],
                    data[3],
                    data[4],
                    data[5],
                    data[6],
                    data[7],
                    data[8]

                ]).draw();
            }, 100);
            }
        });
            $('tbody td').not(currentEle).on('click', function() {

                $(currentEle).html(value);
            });
            $(currentEle).on("dblclick", function() {
                $(currentEle).html(value);
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
            var formMon = document.getElementById("monday-date").value;
            var formTues = document.getElementById("tuesday-date").value;
            var formWed = document.getElementById("wednesday-date").value;
            var formThurs = document.getElementById("thursday-date").value;
            var formFri = document.getElementById("friday-date").value;
            var formSat = document.getElementById("saturday-date").value;
            $.post("../include/insertProgrammingWeek.php",
                {
                    week : formWeek,
                    year : formYear,
                    semester : formSemester,
                    sun : formSun,
                    mon : formMon,
                    tues : formTues,
                    wed : formWed,
                    thurs : formThurs,
                    fri : formFri,
                    sat : formSat
                },
              function(data){
                if(data) {
                  
                }
            });
        });
    });
    </script>

</body>

</html>
