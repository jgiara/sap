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

    <title>Change User Status - Student Admission Program - Boston College</title>

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
                    <h3 style="margin-top: 60px; margin-bottom: 0;" class="page-header" id="panels-header">Change User Status</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style="margin-bottom: 0;">
                <div class="col-lg-12">
                    
                        <!-- /.panel-heading -->
                        <div class="panel-body">
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
                            </br></br>
                        <strong>What do you wish to do?</strong></br>
                        <button class="btn btn-warning" id="markGraduatedButton">Set a class as graduated</button>
                        <button class="btn btn-danger" id="markInactiveButton">Set members inactive who are not in a program</button>
                        <div id="markGraduated">
                            <form method="POST" id="markGraduatedForm" name="markGraduatedForm">
                                <div class="form-group">
                                    <br>
                                    <label for="gclass">What class has graduated? (yyyy)</label></br>
                                    <input type="number" name="gclass" class="" id="gclass" min="2016" placehold="yyyy" readonly>
                                </div>   
                                <strong>Are you sure you want to make these changes?</strong>
                                <input type="radio" name="confirmationChangeg" value="yes" id="confirmationChangeYesg">
                                <label for="confirmationChangeYesg">Yes</label>
                                <input type="radio" name="confirmationChangeg" value="no" checked = "checked" id="confirmationChangeNog">
                                <label for="confirmationChangeNog">No</label>   
                                <br>
                                <input type="submit" name="gsubmit" id="markGraduatedSubmit" value="Make Changes" class="btn btn-primary"></input>
                            </form>
                        </div>
                        <div id="markInactive">
                            <form method="POST" id="markInactiveForm" name="markInactiveForm">
                                <div class="form-group">
                                    <br>
                                    <label for="formSemester">Which semester?</label></br>
                                    <input type="text" name="formSemester" class="" id="formSemester" readonly>
                                </div> 
                                <div class="form-group">
                                    <label for="formYear">Which year?</label></br>
                                    <input type="text" name="formYear" class="" id="formYear" readonly>
                                </div> 
                                <strong>Are you sure you want to make these changes?</strong>
                                <input type="radio" name="confirmationChangei" value="yes" id="confirmationChangeYesi">
                                <label for="confirmationChangeYesi">Yes</label>
                                <input type="radio" name="confirmationChangei" value="no" checked = "checked" id="confirmationChangeNoi">
                                <label for="confirmationChangeNoi">No</label> 
                                <br>     
                                <input type="submit" name="isubmit" id="markInactiveSubmit" value="Make Changes" class="btn btn-primary"></input>
                            </form>
                        </div>      
                                
                        </div>
                        <!-- /.panel-body -->
                </div>            
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
    
    <!-- Custom helper functions -->
    <script type="text/javascript" src="../js/helpers.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>



    
    <script>
    $(document).ready(function() {
        $("#markInactive").hide();
        $("#markGraduated").hide();

        $("#markInactiveButton").on("click", function() {
            $("#markInactive").show();
            $("#markGraduated").hide();
            var s = document.getElementById("table-semester");
            var selectedSemester = s.options[s.selectedIndex].value;
            var y = document.getElementById("table-year");
            var selectedYear = y.options[y.selectedIndex].value;
            document.getElementById("formYear").value = selectedYear;
            document.getElementById("formSemester").value = selectedSemester;
        });

        $("#markGraduatedButton").on("click", function() {
            $("#markInactive").hide();
            $("#markGraduated").show();
            var y = document.getElementById("table-year");
            var selectedYear = y.options[y.selectedIndex].value;
            document.getElementById("gclass").value = selectedYear;
        });

        $("#markGraduatedForm").on("submit", function(e) {
            var classYear = document.getElementById("gclass").value;
            if (document.getElementById('confirmationChangeNog').checked) {
                e.preventDefault();
                return ;
            }
            markGraduated(function() {
                alert("The appropriate users' status has been changed");
                location.reload();
            }, classYear);
            e.preventDefault();
        });

        $("#markInactiveForm").on("submit", function(e) {
            var year = document.getElementById("formYear").value;
            var semester = document.getElementById("formSemester").value;
            if (document.getElementById('confirmationChangeNoi').checked) {
                e.preventDefault();
                return ;
            }
            markInactive(function() {
                alert("The appropriate users' status has been changed");
                location.reload();
            }, year, semester);
            e.preventDefault();
        });
    });
    </script>

</body>

</html>
