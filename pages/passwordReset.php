<?php 
ob_start();
session_start();
require_once '../../resources/init.php';
$general->logged_out_protect();
require '../include/helpers/userInfo.php';
require '../include/helpers/helpers.php';
require '../include/helpers/higherPageProtect.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reset User Password - Student Admission Program - Boston College</title>

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
                    <h3 style="margin-top: 60px; margin-bottom: 0;" class="page-header" id="panels-header">Reset User Password</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style="margin-bottom: 0;">
                <div class="col-lg-12">
                    
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                        <form method="POST" id="newPasswordForm" name="newPasswordForm">
                            <table style='margin-left:150px;'>
                                <tr>
                                    <td>
                                        <b>Users:</b><br/>
                                       <select multiple="multiple" size='10' id='newpasswordlstBox'>
                                        </select>
                                        
                                </td>
                                <td style='text-align:center;vertical-align:middle;'>
                                    <button class="btn btn-primary btn-xs lstButton" id='btnRightNewPassword' value='right'>></button>
                                    <br/><button class="btn btn-primary btn-xs lstButton" style='margin:5px;' id='btnLeftNewPassword' value='left'><</button> 
                                </td>
                                <td>
                                    <b>Selected Users:</b><br/>
                                    <select multiple="multiple" size='10' id='tonewpasswordlstBox'> 
                                    </select>
                                </td>
                            </tr>
                            </table> 
                            </br><strong>Passwords must be between 8 and 20 characters.</br>An email will be sent to the users informing them that their password has been changed.</strong></br>
                            <div class="form-group">
                                <br>
                                <label for="new-password1">Enter New Password:</label></br>
                                <input type="password" name="new-password1" class="" id="new-password1" required size="20" maxlength="20">
                            </div>   
                            <div class="form-group">
                                <label for="new-password2">Re-Enter New Password:</label></br>
                                <input type="password" name="new-password2" class="" id="new-password2" required size="20" maxlength="20">
                            </div>      
                            <input type="submit" name="submit" id="newPasswordSubmit" value="Change Password" class="btn btn-danger"></input>
                        </form>
                            </br></br>
                                    
                                
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
        getAllUsersForRoles(function(b) {
            var users = b;
            var userselect = document.getElementById("newpasswordlstBox");
            $("#newpasswordlstBox").empty();
            $("#tonewpasswordlstBox").empty();
            for(var i = 0; i < users[0].length; i++) {
                var opt = document.createElement('option');
                opt.value = users[0][i];
                opt.id = users[2][i];
                opt.innerHTML = users[2][i] + ", " + users[1][i];
                userselect.appendChild(opt);
            }
            var my_options = $("#newpasswordlstBox option");
            my_options.sort(function(a,b) {
                return a.id > b.id;
            });
            $("#newpasswordlstBox").empty().append(my_options);
        });

        $(".lstButton").on("click", function(e) {
            e.preventDefault();
        });

        $('#btnRightNewPassword').on("click", function() {
            var selectedOpts = $('#newpasswordlstBox option:selected');
            if (selectedOpts.length == 0) {
            }
            else {
                $('#tonewpasswordlstBox').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                var my_options = $("#tonewpasswordlstBox option");

                my_options.sort(function(a,b) {
                    return a.id > b.id;
                });
                $("#tonewpasswordlstBox").empty().append(my_options);
            }
        });

        $('#btnLeftNewPassword').on("click", function() {
            var selectedOpts = $('#tonewpasswordlstBox option:selected');
            if (selectedOpts.length == 0) {
            }
            else {
                $('#newpasswordlstBox').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                var my_options = $("#newpasswordlstBox option");

                my_options.sort(function(a,b) {
                    return a.id > b.id;
                });
                $("#newpasswordlstBox").empty().append(my_options);
            }
        });

        $("#newPasswordForm").on("submit", function(e) {
            var selectedOpts = $('#tonewpasswordlstBox option');
            if (selectedOpts.length == 0) {
                alert("You must choose at least one user");
                e.preventDefault();
            }
            else {
                var pass1 = document.getElementById("new-password1").value;
                var pass2 = document.getElementById("new-password2").value;
                if(pass1.length < 8) {
                    alert("Your password must be at 8 characters long");
                    e.preventDefault();
                    return ;
                }
                if(pass1 != pass2) {
                    alert("Your passwords do not match");
                    e.preventDefault();
                    return ;
                }
                var emails = [];
                for(var i=0; i < selectedOpts.length; i++) {
                    emails[i] = selectedOpts[i].value;
                }
                changePassword(function() {
                    alert("The passwords have been changed");
                    location.reload();
                }, emails, pass1);
                e.preventDefault();
            }
        });
    });
    </script>

</body>

</html>
