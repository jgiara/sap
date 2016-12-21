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

echo "<input type='hidden' id='userid' value='$eagleid'/>";
date_default_timezone_set('EST');

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
                                <li><a href="#notes" data-toggle="tab">Notes</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content inner-scroll">
                                <div class="tab-pane fade in active" id="basic-info">
                                </br>
                                    <div class="info-left">
                                        <label class="info-label">Eagle ID: </label>12345678
                                    </div>
                                    <div class="info-right">
                                        <label class="info-label">Position: </label>Panels Coordinator
                                    </div> </br></br>
                                    <div class="info-left">
                                         <label class="info-label">First Name: </label> <input type="text" id="info-fn" class="info-div-hide-box" size="30" value="Abigail"></input>
                                    </div>
                                    <div class="info-right">
                                         <label class="info-label">Last Name: </label> <input type="text" id="info-ln" class="info-div-hide-box" size="30" value="Brown"></input>
                                    </div></br></br>
                                    <div class="info-left">
                                        <label class="info-label">Class: </label> <input type="text" id="info-class" class="info-div-hide-box" size="30" value="2018"></input>
                                    </div>
                                    <div class="info-right">
                                        <label class="info-label">School: </label> <input type="text" id="info-school" class="info-div-hide-box" size="30" value="MCAS"></input>
                                    </div></br></br>
                                    <div class="info-left">
                                         <label class="info-label">Major: </label> <input type="text" id="info-major" class="info-div-hide-box" size="30" value="Applied Psychology & Human Development"></input>
                                    </div>
                                    <div class="info-right">
                                        <label class="info-label">Minor: </label> <input type="text" id="info-minor" class="info-div-hide-box" size="30" value="Applied Psychology & Human Development"></input>
                                    </div></br></br>
                                    <div class="info-left">
                                         <label class="info-label">Hometown: </label> <input type="text" id="info-hometown" class="info-div-hide-box" size="30" value="Iowa City, IA"></input>
                                    </div>
                                    <div class="info-right">
                                       <label class="info-label">Local Address: </label> <input type="text" id="info-local-address" class="info-div-hide-box" size="30" value="2000 Comm Ave, 418"></input>
                                    </div></br></br>
                                    <div class="info-left">
                                        <label class="info-label">Email: </label> <input type="text" id="info-email" class="info-div-hide-box" size="30" value="brownbba@bc.edu"></input>
                                    </div>
                                    <div class="info-right">
                                       <label class="info-label">Phone: </label> <input type="text" id="info-phone" class="info-div-hide-box" size="30" value="555-555-5555"></input>   
                                    </div></br></br>
                                    <div class="info-left">
                                        <label class="info-label">Sex: </label> <input type="text" id="info-sex" class="info-div-hide-box" size="30" value="Female"></input>
                                    </div>
                                    <div class="info-right">
                                        <label class="info-label">AHANA: </label> <input type="text" id="info-ahana" class="info-div-hide-box" size="30" value="No"></input>
                                    </div> </br>
                                    </br>
                                    <div class="info-left">
                                        <label class="info-label">International: </label> <input type="text" id="info-international" class="info-div-hide-box" size="30" value="No"></input>
                                    </div>
                                    <div class="info-right">
                                        <label class="info-label">Transfer: </label> <input type="text" id="info-transfer" class="info-div-hide-box" size="30" value="No"></input>
                                    </div> </br></br>
                    
                                </div>
                                <div class="tab-pane fade" id="involvement">
                                
                                   Click <a href="./involvement.php">here</a> to see a more in-depth view of involvement</br></br>
                                    <div class="info-left">
                                        <label class="involv-label">OFFICE PROGRAMS
                                    </div>
                                    <div class="info-right">
                                        <label class="involv-label">OUTREACH PROGRAMS
                                    </div> </br>
                                    <div class="involv-left">
                                        <label class="involv-label">Panels</label>
                                    </div>
                                    <div class="involv-right">
                                        <label class="involv-label">Outreach</label>
                                    </div> </br>
                                    <div class="involvd-left">
                                        <label class="involv-label-count">Completed: </label> <input type="text" id="involv-comp-panels" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div>
                                    <div class="involvd-right">
                                        <label class="involv-label-count">Completed: </label> <input type="text" id="involv-comp-outreach" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div> </br>
                                    <div class="involvd-left">
                                        <label class="involv-label-count">Pending: </label> <input type="text" id="involv-pend-panels" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div>
                                    <div class="involvd-right">
                                        <label class="involv-label-count">Pending: </label> <input type="text" id="involv-pend-outreach" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div> </br>
                                    <div class="involvd-left">
                                        <label class="involv-label-count">Incomplete: </label> <input type="text" id="involv-incomp-panels" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div>
                                    <div class="involvd-right">
                                        <label class="involv-label-count">Incompleted: </label> <input type="text" id="involv-incomp-outreach" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div> </br></br>

                                    <div class="involv-left">
                                        <label class="involv-label">Tours</label> 
                                    </div>
                                    <div class="involv-right">
                                        <label class="involv-label">High School Visits</label>
                                    </div> </br>
                                    <div class="involvd-left">
                                        <label class="involv-label-count">Completed: </label> <input type="text" id="involv-comp-tours" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div>
                                    <div class="involvd-right">
                                        <label class="involv-label-count">Completed: </label> <input type="text" id="involv-comp-hsvisits" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div> </br>
                                    <div class="involvd-left">
                                        <label class="involv-label-count">Pending: </label> <input type="text" id="involv-pend-tours" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div>
                                    <div class="involvd-right">
                                        <label class="involv-label-count">Pending: </label> <input type="text" id="involv-pend-hsvisits" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div> </br>
                                    <div class="involvd-left">
                                        <label class="involv-label-count">Incomplete: </label> <input type="text" id="involv-incomp-tours" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div>
                                    <div class="involvd-right">
                                        <label class="involv-label-count">Incompleted: </label> <input type="text" id="involv-incomp-hsvisits" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div> </br></br>
                                    <div class="involv-left">
                                        <label class="involv-label">Greeting</label>
                                    </div>
                                    <div class="involv-right">
                                        <label class="involv-label">AHANA Outreach</label>
                                    </div> </br>
                                    <div class="involvd-left">
                                        <label class="involv-label-count">Completed: </label> <input type="text" id="involv-comp-greeting" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div>
                                    <div class="involvd-right">
                                        <label class="involv-label-count">Completed: </label> <input type="text" id="involv-comp-ahana" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div> </br>
                                    <div class="involvd-left">
                                        <label class="involv-label-count">Pending: </label> <input type="text" id="involv-pend-greeting" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div>
                                    <div class="involvd-right">
                                        <label class="involv-label-count">Pending: </label> <input type="text" id="involv-pend-ahana" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div> </br>
                                    <div class="involvd-left">
                                        <label class="involv-label-count">Incomplete: </label> <input type="text" id="involv-incomp-greeting" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div>
                                    <div class="involvd-right">
                                        <label class="involv-label-count">Incompleted: </label> <input type="text" id="involv-incomp-ahana" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div> </br></br>
                                    <div class="involv-left">
                                        <label class="involv-label">Office Management</label> 
                                    </div>
                                    <div class="involv-right">
                                        <label class="involv-label">International Outreach</label>
                                    </div> </br>
                                    <div class="involvd-left">
                                        <label class="involv-label-count">Completed: </label> <input type="text" id="involv-comp-om" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div>
                                    <div class="involvd-right">
                                        <label class="involv-label-count">Completed: </label> <input type="text" id="involv-comp-io" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div> </br>
                                    <div class="involvd-left">
                                        <label class="involv-label-count">Pending: </label> <input type="text" id="involv-pend-om" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div>
                                    <div class="involvd-right">
                                        <label class="involv-label-count">Pending: </label> <input type="text" id="involv-pend-io" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div> </br>
                                    <div class="involvd-left">
                                        <label class="involv-label-count">Incomplete: </label> <input type="text" id="involv-incomp-om" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div>
                                    <div class="involvd-right">
                                        <label class="involv-label-count">Incompleted: </label> <input type="text" id="involv-incomp-io" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div> </br></br>
                                    <div class="involv-left">
                                        <label class="involv-label">Eagle for a Day</label>
                                    </div>
                                    <div class="involv-right">
                                        <label class="involv-label">Transfer Outreach</label>
                                    </div> </br>
                                    <div class="involvd-left">
                                        <label class="involv-label-count">Completed: </label> <input type="text" id="involv-comp-efad" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div>
                                    <div class="involvd-right">
                                        <label class="involv-label-count">Completed: </label> <input type="text" id="involv-comp-transfer" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div> </br>
                                    <div class="involvd-left">
                                        <label class="involv-label-count">Pending: </label> <input type="text" id="involv-pend-efad" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div>
                                    <div class="involvd-right">
                                        <label class="involv-label-count">Pending: </label> <input type="text" id="involv-pend-transfer" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div> </br>
                                    <div class="involvd-left">
                                        <label class="involv-label-count">Incomplete: </label> <input type="text" id="involv-incomp-efad" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div>
                                    <div class="involvd-right">
                                        <label class="involv-label-count">Incompleted: </label> <input type="text" id="involv-incomp-transfer" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div> </br></br>
                                    <div class="involv-left">
                                        <label class="involv-label">Admitted Eagle Day</label>
                                    </div>
                                    <div class="involv-right">
                                        <label class="involv-label">Media</label>
                                    </div> </br>
                                    <div class="involvd-left">
                                        <label class="involv-label-count">Completed: </label> <input type="text" id="involv-comp-aed" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div>
                                    <div class="involvd-right">
                                        <label class="involv-label-count">Completed: </label> <input type="text" id="involv-comp-media" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div> </br>
                                    <div class="involvd-left">
                                        <label class="involv-label-count">Pending: </label> <input type="text" id="involv-pend-aed" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div>
                                    <div class="involvd-right">
                                        <label class="involv-label-count">Pending: </label> <input type="text" id="involv-pend-media" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div> </br>
                                    <div class="involvd-left">
                                        <label class="involv-label-count">Incomplete: </label> <input type="text" id="involv-incomp-aed" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div>
                                    <div class="involvd-right">
                                        <label class="involv-label-count">Incompleted: </label> <input type="text" id="involv-incomp-media" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div> </br></br>
                                     <div class="involv-left">
                                        <label class="involv-label">Summer</label>
                                    </div>
                                    <div class="involv-right">
                                        
                                    </div> </br>
                                    <div class="involvd-left">
                                        <label class="involv-label-count">Completed: </label> <input type="text" id="involv-comp-aed" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div>
                                    <div class="involvd-right">
                                        
                                    </div> </br>
                                    <div class="involvd-left">
                                        <label class="involv-label-count">Pending: </label> <input type="text" id="involv-pend-aed" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div>
                                    <div class="involvd-right">
                                       
                                    </div> </br>
                                    <div class="involvd-left">
                                        <label class="involv-label-count">Incomplete: </label> <input type="text" id="involv-incomp-aed" class="involv-div-hide-box" size="1" value="3"></input>
                                    </div>
                                    <div class="involvd-right">
                                        
                                    </div> </br></br>
                                    
                                </div>
                                <div class="tab-pane fade" id="notes">
                                    <table id="notes-table">
                                        <tr class="notes-row">
                                            <td>10:00:02 07/20/16</br>Jon Giara - Head Coordinator</td>
                                            <td class="notes-data">This is my first note</td>
                                        </tr>
                                        <tr class="notes-row">
                                            <td>10:00:02 07/20/16</br>Jon Giara - Head Coordinator</td>
                                            <td class="notes-data">This is my first note sdkfhsd sdfkhdaf sdafhdsaf sdafasdhfkj dsjfkhdsa fdsafihdsaf dsafhsad,mf sdjkfhdsjb</br></br>this is a test to see</br>how many</br></br>breaks llok like</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                   
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
    

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>



    
    <script>
    $(document).ready(function() {
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
                        document.getElementById("table-week").innerHTML += "<option value ='" + item.week_id + "'>Week " + item.week_number + ": " + item.sunday_date.substring(5) + " - " + item.saturday_date.substring(5) + "</option>"; 
                });

            })
            .fail(function() {
                console.log("getJSON error");
            });
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
            "columnDefs": [
            {
                "targets": [7],
                "visible": false,
                "orderable": false
                
            }]
        });
        var s = document.getElementById("table-semester");
        var selectedSemester = s.options[s.selectedIndex].value;
        var y = document.getElementById("table-year");
        var selectedYear = y.options[y.selectedIndex].value;
        $.getJSON("../include/getProgramVolunteers.php", 
            {
                program: "Panels",
                semester: selectedSemester,
                year: selectedYear
            }, function(data) {
                $.each(data, function(i, item) {
                    tableVols.row.add([
                        item.first_name,
                        item.last_name,
                        item.class,
                        item.school,
                        item.shift_day,
                        item.shift_time,
                        item.requirements_status,
                        item.eagle_id
                    ]);
                });
            })
            .fail(function() {
                console.log("getJSON error");
            });

            setTimeout(function() {
            tableVols.draw();
        }, 300);
     
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
            "columnDefs": [
            {
                "targets": [6,7],
                "visible": false,
                "orderable": false
                
            }]
        });
        setTimeout(function() {
        var s = document.getElementById("table-semester");
        var selectedSemester = s.options[s.selectedIndex].value;
        var y = document.getElementById("table-year");
        var selectedYear = y.options[y.selectedIndex].value;
        var w = document.getElementById("table-week");
        var selectedWeek = w.options[w.selectedIndex].value; //sometimes has an undefined value
        var d = document.getElementById("table-day");
        var selectedDay = d.options[d.selectedIndex].value;
        $.getJSON("../include/getProgramAttendance.php", 
            {
                program: "Panels",
                semester: selectedSemester,
                year: selectedYear,
                week: selectedWeek,
                day: selectedDay
            }, function(data) {
                $.each(data, function(i, item) {
                    tableAttn.row.add([
                        item.first_name,
                        item.last_name,
                        item.shift_day,
                        item.shift_time,
                        item.present,
                        item.note,
                        item.eagle_id,
                        item.attendance_id
                    ]);
                });
            })
            .fail(function() {
                console.log("getJSON error");
            });

            setTimeout(function() {
            tableAttn.draw();
        }, 300);
        }, 200);
     
        // Apply the search
        tableAttn.columns().every(function (index) {
        $('#table-attendance thead tr:eq(1) td:eq(' + index + ') input').on('keyup change', function () {
            tableAttn.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
            } );
        } );


        $('#semester-submit').on("click", function() {
            
            var s = document.getElementById("table-semester");
            var selectedSemester = s.options[s.selectedIndex].value;
            var y = document.getElementById("table-year");
            var selectedYear = y.options[y.selectedIndex].value;
            var w = document.getElementById("table-week");
            var selectedWeek = w.options[w.selectedIndex].value;
            var d = document.getElementById("table-day");
            var selectedDay = d.options[d.selectedIndex].value;
            
            tableVols.clear();
            tableAttn.clear();

            document.getElementById("table-week").innerHTML = "";
            $.getJSON("../include/getWeek.php", 
            {
                semester: selectedSemester,
                year: selectedYear
            }, function(data) {
                $.each(data, function(i, item) {
                         document.getElementById("table-week").innerHTML += "<option value ='" + item.week_id + "'>Week " + item.week_number + ": " + item.sunday_date.substring(5) + " - " + item.saturday_date.substring(5) + "</option>"; 
                });

            })
            .fail(function() {
                console.log("getJSON error");
            });

           

            //document.getElementById("panels-header").innerHTML = "HELLO";
            
            
            $.getJSON("../include/getProgramVolunteers.php", 
            {
                program: "Panels",
                semester: selectedSemester,
                year: selectedYear
            }, function(data) {
                $.each(data, function(i, item) {
                    tableVols.row.add([
                        item.first_name,
                        item.last_name,
                        item.class,
                        item.school,
                        item.shift_day,
                        item.shift_time,
                        item.requirements_status,
                        item.eagle_id
                    ]);
                });
            })
            .fail(function() {
                console.log("getJSON error");
            });

            setTimeout(function() {
            tableVols.draw();
        }, 300);

            $.getJSON("../include/getProgramAttendance.php", 
            {
                program: "Panels",
                semester: selectedSemester,
                year: selectedYear, 
                week: selectedWeek,
                day: selectedDay
            }, function(data) {
                $.each(data, function(i, item) {
                    tableAttn.row.add([
                        item.first_name,
                        item.last_name,
                        item.shift_day,
                        item.shift_time,
                        item.present,
                        item.note,
                        item.eagle_id,
                        item.attendance_id
                    ]);
                });
            })
            .fail(function() {
                console.log("getJSON error");
            });

            setTimeout(function() {
            tableAttn.draw();
        }, 300);

        
        $('#table-volunteers tbody').on('dblclick', 'td', function(e) {
            var currentEle = $(this);
            var valueT = $(this).html();
            var row = tableVols.cell($(this)).index().row;
            var column = tableVols.cell($(this)).index().column;
            if(column != 4 && column != 5 && column != 6) { //can't update User table
                return;
            }
            var data = tableVols.row(row).data();
            var updateField = ['first_name', 'last_name', 'class', 'school', 'shift_day', 'shift_time', 'requirements_status'];
            setTimeout(function() {
            $(currentEle).html('<input id="newvalue" class="thVal" type="text" value="' + valueT + '" />');
            $(".thVal").focus();
            $(".thVal").keyup(function (event) {
            if (event.keyCode == 13) {
               
                data[column] =  document.getElementById("newvalue").value.trim();
                tableVols.row(row).remove();
                $.post("../include/inlineUpdateTable.php",
                {
                    id : data[7],
                    field : updateField[column],
                    table : 'Program_Members',
                    newValue : data[column],
                    whereField : 'user'
                },
              function(data){
                if(data) {
                  
                }
                });

                setTimeout( function(){
                tableVols.row.add([
                    data[0],
                    data[1],
                    data[2],
                    data[3],
                    data[4],
                    data[5],
                    data[6],
                    data[7]

                ]).draw();
            }, 100);
            }
        });
        },50);
            $('tbody td').not(currentEle).on('click', function() {

                $(currentEle).html(valueT);
            });
            $(currentEle).on("dblclick", function() {
                $(currentEle).html(valueT);
            });  
        });
        $('#table-attendance tbody').on('dblclick', 'td', function(e) {
            var currentEle = $(this);
            var value = $(this).html();
            var row = tableAttn.cell($(this)).index().row;
            var column = tableAttn.cell($(this)).index().column;
            if(column != 2 && column != 3 && column != 4 && column != 5) { //can't update User table
                return;
            }
            var data = tableAttn.row(row).data();
            var updateField = ['first_name', 'last_name', 'shift_day', 'shift_time', 'present', 'note'];
            setTimeout(function(){
            $(currentEle).html('<input id="newvalue" class="thVal" type="text" value="' + value + '" />');
            $(".thVal").focus();
            $(".thVal").keyup(function (event) {
            if (event.keyCode == 13) {
               
                data[column] =  document.getElementById("newvalue").value.trim();
                tableAttn.row(row).remove();
                $.post("../include/inlineUpdateTable.php",
                {
                    id : data[7],
                    field : updateField[column],
                    table : 'Attendance',
                    newValue : data[column],
                    whereField : 'attendance_id'
                },
              function(data){
                if(data) {
                  
                }
                });

                setTimeout( function(){
                tableAttn.row.add([
                    data[0],
                    data[1],
                    data[2],
                    data[3],
                    data[4],
                    data[5],
                    data[6],
                    data[7]

                ]).draw();
            }, 100);
            }
        });
        },50);
            $('tbody td').not(currentEle).on('click', function() {

                $(currentEle).html(value);
            });
            $(currentEle).on("dblclick", function() {
                $(currentEle).html(value);
            });  
        });
        });
        $("#attendance-tab").on("click", function() {
            showSelects();
        });
        $("#volunteers-tab").on("click", function() {
            hideSelects();
        });
    });
    function hideSelects(){
        var weekSelect = document.getElementById("table-week");
        var daySelect = document.getElementById("table-day");
        //var newAttnButton = document.getElementById("newAttendance");
        //weekSelect.style.visibility = 'hidden';
        //daySelect.style.visibility = 'hidden';
        $('#table-week').attr('disabled', true);
        $('#table-day').attr('disabled', true);
        //newAttendance.style.visibility = 'hidden';
    }

    function showSelects(){
        var weekSelect = document.getElementById("table-week");
        var daySelect = document.getElementById("table-day");
        //var newAttnButton = document.getElementById("newAttendance");
        //weekSelect.style.visibility = 'visible';
        //daySelect.style.visibility = 'visible';
        $('#table-week').attr('disabled', false);
        $('#table-day').attr('disabled', false);
        //newAttendance.style.visibility = 'visible';
    }
    </script>

</body>

</html>
