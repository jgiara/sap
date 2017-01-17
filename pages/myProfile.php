<?php 
ob_start();
session_start();
require_once '../../resources/init.php';
$general->logged_out_protect();
require '../include/helpers/userInfo.php';
require '../include/helpers/helpers.php';
echo '<input type="hidden" id="programName" value="My Profile">';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Profile - Student Admission Program - Boston College</title>

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
                    <h3 style="margin-top: 60px; margin-bottom: 0;" class="page-header" id="panels-header">My Profile</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#basic-info" data-toggle="tab">Personal Info</a>
                                </li>
                                <li><a href="#involvement" data-toggle="tab">Involvement</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="basic-info">
                               
                                    <table class="table" style="font-size: 14px; width: 100%;">
                                        <tr>
                                            <td><strong>First Name:</strong> <span id="firstNameSpan"></span></td>
                                            <td><strong>Last Name:</strong> <span id="lastNameSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email:</strong> <span id="emailSpan"></span></td>
                                            <td><strong>Eagle ID:</strong> <span id="eagleidSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Sex:</strong> <span id="sexSpan"></span></td>
                                            <td><strong>Phone Number:</strong> <span id="phoneSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Class:</strong> <span id="classSpan"></span></td>
                                            <td><strong>School:</strong> <span id="schoolSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Major:</strong> <span id="majorSpan"></span></td>
                                            <td><strong>Minor:</strong> <span id="minorSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Hometown:</strong> <span id="hometownSpan"><span></td>
                                            <td><strong>State:</strong> <span id="stateSpan"><span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Local Address:</strong> <span id="localAddressSpan"></span></td>
                                            <td><strong>AHANA:</strong> <span id="ahanaSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>International:</strong> <span id="internationalSpan"></span></td>
                                            <td><strong>Transfer:</strong> <span id="transferSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status:</strong> <span id="statusSpan"></span></td>
                                            <td><strong>Last Login:</strong> <span id="loginSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td></td><td></td>
                                        </tr>
                                    </table>
                    
                                </div>
                                <div class="tab-pane fade" id="involvement">
                                
                                   Click <a href="./involvement.php">here</a> to see a more in-depth view of involvement</br></br>
                                    <h4>Office Programs</h4>
                                    
                                    <table class="table" style="font-size: 14px; width: 100%;">
                                        <tr>
                                            <th></th>
                                            <th>Complete</th>
                                            <th>Pending</th>
                                            <th>Incomplete</th>
                                        </tr>
                                        <tr>
                                            <td><strong>Panels</strong></td>
                                            <td><span id="panelsCompleteSpan"></span></td>
                                            <td><span id="panelsPendingSpan"></span></td>
                                            <td><span id="panelsIncompleteSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tours</strong></td>
                                            <td><span id="toursCompleteSpan"></span></td>
                                            <td><span id="toursPendingSpan"></span></td>
                                            <td><span id="toursIncompleteSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Greeting</strong></td>
                                            <td><span id="greetingCompleteSpan"></span></td>
                                            <td><span id="greetingPendingSpan"></span></td>
                                            <td><span id="greetingIncompleteSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Office Management</strong></td>
                                            <td><span id="omCompleteSpan"></span></td>
                                            <td><span id="omPendingSpan"></span></td>
                                            <td><span id="omIncompleteSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Eagle for a Day</strong></td>
                                            <td><span id="efadCompleteSpan"></span></td>
                                            <td><span id="efadPendingSpan"></span></td>
                                            <td><span id="efadIncompleteSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Admitted Eagle Day</strong></td>
                                            <td><span id="aedCompleteSpan"></span></td>
                                            <td><span id="aedPendingSpan"></span></td>
                                            <td><span id="aedIncompleteSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td></td><td></td> <td></td><td></td>
                                        </tr>
                                    </table>
                                   
                                    <h4>Outreach Programs</h4>
                                    <table class="table" style="font-size: 14px; width: 100%;">
                                        <tr>
                                            <th></th>
                                            <th>Complete</th>
                                            <th>Pending</th>
                                            <th>Incomplete</th>
                                        </tr>
                                        <tr>
                                            <td><strong>Outreach</strong></td>
                                            <td><span id="outreachCompleteSpan"></span></td>
                                            <td><span id="outreachPendingSpan"></span></td>
                                            <td><span id="outreachIncompleteSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>High School Visits</strong></td>
                                            <td><span id="hsvisitsCompleteSpan"></span></td>
                                            <td><span id="hsvisitsPendingSpan"></span></td>
                                            <td><span id="hsvisitsIncompleteSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>AHANA Outreach</strong></td>
                                            <td><span id="ahanaCompleteSpan"></span></td>
                                            <td><span id="ahanaPendingSpan"></span></td>
                                            <td><span id="ahanaIncompleteSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>International Outreach</strong></td>
                                            <td><span id="ioCompleteSpan"></span></td>
                                            <td><span id="ioPendingSpan"></span></td>
                                            <td><span id="ioIncompleteSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Transfer Outreach</strong></td>
                                            <td><span id="transferCompleteSpan"></span></td>
                                            <td><span id="transferPendingSpan"></span></td>
                                            <td><span id="transferIncompleteSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Media</strong></td>
                                            <td><span id="mediaCompleteSpan"></span></td>
                                            <td><span id="mediaPendingSpan"></span></td>
                                            <td><span id="mediaIncompleteSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td></td><td></td> <td></td><td></td>
                                        </tr>
                                    </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                   
                   </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
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
        var email = document.getElementById("userid").value;

        var fn = document.getElementById("firstNameSpan");
        var ln = document.getElementById("lastNameSpan");
        var emailS = document.getElementById("emailSpan");
        var eagleid = document.getElementById("eagleidSpan");
        var sex = document.getElementById("sexSpan");
        var phone = document.getElementById("phoneSpan");
        var year = document.getElementById("classSpan");
        var school = document.getElementById("schoolSpan");
        var major = document.getElementById("majorSpan");
        var minor = document.getElementById("minorSpan");
        var hometown = document.getElementById("hometownSpan");
        var state = document.getElementById("stateSpan");
        var local = document.getElementById("localAddressSpan");
        var ahana = document.getElementById("ahanaSpan");
        var international = document.getElementById("internationalSpan");
        var transfer = document.getElementById("transferSpan");
        var status = document.getElementById("statusSpan");
        var login = document.getElementById("loginSpan");
        
        
        getUserData(function(data) {
            fn.innerHTML = data['first_name'];
            ln.innerHTML = data['last_name'];
            emailS.innerHTML = email;
            eagleid.innerHTML = data['eagle_id'];
            sex.innerHTML = data['sex'];
            phone.innerHTML = data['phone'];
            year.innerHTML = data['class'];
            school.innerHTML = data['school'];
            major.innerHTML = data['major'];
            minor.innerHTML = data['minor'];
            hometown.innerHTML = data['hometown'];
            state.innerHTML = data['state_country'];
            local.innerHTML = data['local_address'];
            ahana.innerHTML = data['ahana'];
            international.innerHTML = data['international'];
            transfer.innerHTML = data['transfer'];
            status.innerHTML = data['status'];
            login.innerHTML = data['last_login'];
        }, email);

        getInvolvementData(function(data) {
            document.getElementById("panelsCompleteSpan").value = 
            document.getElementById("panelsPendingSpan").value = 
            document.getElementById("panelsIncompleteSpan").value = 
            document.getElementById("toursCompleteSpan").value = 
            document.getElementById("toursPendingSpan").value = 
            document.getElementById("toursIncompleteSpan").value = 
            document.getElementById("greetingCompleteSpan").value = 
            document.getElementById("greetingPendingSpan").value = 
            document.getElementById("greetingIncompleteSpan").value = 
            document.getElementById("omCompleteSpan").value = 
            document.getElementById("omPendingSpan").value = 
            document.getElementById("omIncompleteSpan").value = 
            document.getElementById("efadCompleteSpan").value = 
            document.getElementById("efadPendingSpan").value = 
            document.getElementById("efadIncompleteSpan").value = 
            document.getElementById("aedCompleteSpan").value = 
            document.getElementById("aedPendingSpan").value = 
            document.getElementById("aedIncompleteSpan").value = 
            document.getElementById("hsvisitsCompleteSpan").value = 
            document.getElementById("hsvisitsPendingSpan").value = 
            document.getElementById("hsvisitsIncompleteSpan").value = 
            document.getElementById("outreachCompleteSpan").value = 
            document.getElementById("outreachPendingSpan").value = 
            document.getElementById("outreachIncompleteSpan").value = 
            document.getElementById("ahanaCompleteSpan").value = 
            document.getElementById("ahanaPendingSpan").value = 
            document.getElementById("ahanaIncompleteSpan").value = 
            document.getElementById("ioCompleteSpan").value = 
            document.getElementById("ioPendingSpan").value = 
            document.getElementById("ioIncompleteSpan").value = 
            document.getElementById("transferCompleteSpan").value = 
            document.getElementById("transferPendingSpan").value = 
            document.getElementById("transferIncompleteSpan").value = 
            document.getElementById("mediaCompleteSpan").value = 
            document.getElementById("mediaPendingSpan").value = 
            document.getElementById("mediaIncompleteSpan").value = 
        }, email, eagleid.innerHTML);
    });
    </script>

</body>

</html>
