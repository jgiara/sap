<?php 
ob_start();
session_start();
require_once '../resources/init.php';
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

    <title>Roles Administration - Student Admission Program - Boston College</title>

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
                    <h3 style="margin-top: 60px; margin-bottom: 0;" class="page-header" id="panels-header">Roles Administration</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style="margin-bottom: 0;">
                <div class="col-lg-12">
                    
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                                <button class="btn btn-md btn-warning" id="openNewModalButton" style="margin-left: 10px;" data-toggle="modal" data-target="#newRolesModal">New Roles</button>
                                <button class="btn btn-md btn-danger" id="openDeleteModalButton" style="margin-left: 10px;" data-toggle="modal" data-target="#deleteRolesModal">Delete Roles</button>
                            </br></br>

                            <!-- Tab panes -->
                            
                                        <table class="table table-striped table-bordered table-hover" id="table-roles" style="font-size: 13px; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Role ID</th>
                                                </tr>
                                                <tr>
                                                    <td>First Name</td>
                                                    <td>Last Name</td>
                                                    <td>Email</td>
                                                    <td>Role</td>
                                                    <td>Role ID</td>
                                                </tr>
                                            </thead>
                                            
                                            <tbody id="tablebody-roles">
                                                
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
        <div id="newRolesModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New Roles</h4>
                  </div>
                  <div class="modal-body">
                        <form method="POST" id="newRolesForm" name="newRolesForm">
                            <table style='margin-left:150px;'>
                                <tr>
                                    <td>
                                        <b>Users:</b><br/>
                                       <select multiple="multiple" size='10' id='newroleslstBox'>
                                        </select>
                                        
                                </td>
                                <td style='text-align:center;vertical-align:middle;'>
                                    <button class="btn btn-primary btn-xs lstButton" id='btnRightNewRoles' value='right'>></button>
                                    <br/><button class="btn btn-primary btn-xs lstButton" style='margin:5px;' id='btnLeftNewRoles' value='left'><</button> 
                                </td>
                                <td>
                                    <b>Selected Users:</b><br/>
                                    <select multiple="multiple" size='10' id='tonewroleslstBox'> 
                                    </select>
                                </td>
                            </tr>
                            </table> 
                            <div class="form-group">
                                <label for="new-role-select">Role:</label>
                                <select name="new-role-select" class="form-control" id="new-role-select" required>
                                    <option disabled selected value> -- Select a role -- </option>
                                    <option value="1">Volunteer</option>
                                    <option value="2">Staff</option>
                                    <option value="3">Advisor</option>
                                    <option value="4">Council</option>
                                    <option value="5">Admin</option>
                                </select>
                            </div>      
                            <input type="submit" name="submit" id="newRolesSubmit" value="Add Roles" class="btn btn-danger"></input>
                        </form>
                  </div>
                <div class="modal-footer">
                    <button type="button" id="closeModal" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
              </div>
            </div>
            <!--end MODAL -->

            <div id="deleteRolesModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete Roles</h4>
                  </div>
                  <div class="modal-body">
                        <form method="POST" id="deleteRolesForm" name="deleteRolesForm">
                            <table style='margin-left:150px;'>
                                <tr>
                                    <td>
                                        <b>Roles:</b><br/>
                                       <select multiple="multiple" size='10' id='deleteroleslstBox'>
                                        </select>
                                        
                                </td>
                                <td style='text-align:center;vertical-align:middle;'>
                                    <button class="btn btn-primary btn-xs lstButton" id='btnRightDeleteRoles' value='right'>></button>
                                    <br/><button class="btn btn-primary btn-xs lstButton" style='margin:5px;' id='btnLeftDeleteRoles' value='left'><</button> 
                                </td>
                                <td>
                                    <b>Selected Roles:</b><br/>
                                    <select multiple="multiple" size='10' id='todeleteroleslstBox'> 
                                    </select>
                                </td>
                            </tr>
                            </table>      
                            <input type="submit" name="submit" id="deleteRolesSubmit" value="Delete Roles" class="btn btn-danger"></input>
                        </form>
                  </div>
                <div class="modal-footer">
                    <button type="button" id="closeModal" class="btn btn-default" data-dismiss="modal">Close</button>
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
    
    <!-- Custom helper functions -->
    <script type="text/javascript" src="../js/helpers.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>



    
    <script>
    $(document).ready(function() {
    // Setup - add a text input to each footer cell
        $('#table-roles thead td').each( function () {
            var title = $(this).text();
            $(this).css('text-align', 'center');
            $(this).html( '<input type="text"/>' );
            $(this).children('input').css('width', '100%');
        } );
     
        // DataTable
        var tableRoles = $('#table-roles').DataTable({
            responsive: true,
            orderCellsTop: true,
            "columnDefs": [
            {
                "targets": [4],
                "visible": false,
                "orderable": false
                
            }],
            order: [[1, "asc"]]            
        });

        getRoles(function(newTable) {
            newTable.draw();
        }, tableRoles);
     
        // Apply the search
        tableRoles.columns().every(function (index) {
        $('#table-roles thead tr:eq(1) td:eq(' + index + ') input').on('keyup change', function () {
            tableRoles.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
            } );
        } );
        
        $('#table-roles tbody').on('dblclick', 'td', function(e) {
            var currentEle = $(this);
            var valueT = $(this).html();
            var row = tableRoles.cell($(this)).index().row;
            var column = tableRoles.cell($(this)).index().column;
            var alterable = [3];
            var selectable = [3];
            if(alterable.indexOf(column) == -1) { //can't the other columns
                return;
            }
            var data = tableRoles.row(row).data();
            var updateField = ['first_name', 'last_name', 'email', 'group_id', 'group_member_id'];
            setTimeout(function() {
                if(column == 3) {
                    $(currentEle).html('<select id="newvalue" class="thVal">' +
                                            '<option value="1"' + (valueT == "Volunteer" ? 'selected = selected' : '') + '>Volunteer</option>' +
                                            '<option value="2"' + (valueT == "Staff" ? 'selected = selected' : '') + '>Staff</option>' +
                                            '<option value="3"' + (valueT == "Advisor" ? 'selected = selected' : '') + '>Advisor</option>' +
                                            '<option value="4"' + (valueT == "Council" ? 'selected = selected' : '') + '>Council</option>' +
                                            '<option value="5"' + (valueT == "Admin" ? 'selected = selected' : '') + '>Admin</option>' +
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
                        tableRoles.row(row).remove();
                        var newRole = '';
                        switch(data[column]) {
                            case '1': {
                                newRole = 'Volunteer';
                            } break;
                            case '2': {
                                newRole = 'Staff';
                            } break;
                            case '3': {
                                newRole = 'Advisor';
                            } break;
                            case '4': {
                                newRole = 'Council';
                            } break;
                            case '5': {
                                newRole = 'Admin';
                            } break;
                        }
                        inLineUpdatePostData(function() {
                            tableRoles.row.add([
                                data[0],
                                data[1],
                                data[2],
                                newRole,
                                data[4]
                            ]).draw()
                        }, data[4], updateField[column], 'Group_Members', data[column], 'group_member_id');
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

        $(".lstButton").on("click", function(e) {
            e.preventDefault();
        });

        $('#btnRightNewRoles').on("click", function() {
            var selectedOpts = $('#newroleslstBox option:selected');
            if (selectedOpts.length == 0) {
            }
            else {
                $('#tonewroleslstBox').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                var my_options = $("#tonewroleslstBox option");

                my_options.sort(function(a,b) {
                    return a.id > b.id;
                });
                $("#tonewroleslstBox").empty().append(my_options);
            }
        });

        $('#btnLeftNewRoles').on("click", function() {
            var selectedOpts = $('#tonewroleslstBox option:selected');
            if (selectedOpts.length == 0) {
            }
            else {
                $('#newroleslstBox').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                var my_options = $("#newroleslstBox option");

                my_options.sort(function(a,b) {
                    return a.id > b.id;
                });
                $("#newroleslstBox").empty().append(my_options);
            }
        });

        $('#btnRightDeleteRoles').on("click", function() {
            var selectedOpts = $('#deleteroleslstBox option:selected');
            if (selectedOpts.length == 0) {
            }
            else {
                $('#todeleteroleslstBox').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                var my_options = $("#todeleteroleslstBox option");

                my_options.sort(function(a,b) {
                    return a.id > b.id;
                });
                $("#todeleteroleslstBox").empty().append(my_options);
            }
        });

        $('#btnLeftDeleteRoles').on("click", function() {
            var selectedOpts = $('#todeleteroleslstBox option:selected');
            if (selectedOpts.length == 0) {
            }
            else {
                $('#deleteroleslstBox').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                var my_options = $("#deleteroleslstBox option");

                my_options.sort(function(a,b) {
                    return a.id > b.id;
                });
                $("#deleteroleslstBox").empty().append(my_options);
            }
        });

        $("#openNewModalButton").on("click", function() {
            getAllUsersForRoles(function(b) {
                var users = b;
                var userselect = document.getElementById("newroleslstBox");
                $("#newroleslstBox").empty();
                $("#tonewroleslstBox").empty();
                for(var i = 0; i < users[0].length; i++) {
                    var opt = document.createElement('option');
                    opt.value = users[0][i];
                    opt.id = users[2][i];
                    opt.innerHTML = users[2][i] + ", " + users[1][i];
                    userselect.appendChild(opt);
                }
                var my_options = $("#newroleslstBox option");
                my_options.sort(function(a,b) {
                    return a.id > b.id;
                });
                $("#newroleslstBox").empty().append(my_options);
            });
        });

        $("#openDeleteModalButton").on("click", function() {
            getAllRoles(function(b) {
                var roles = b;
                var roleselect = document.getElementById("deleteroleslstBox");
                $("#deleteroleslstBox").empty();
                $("#todeleteroleslstBox").empty();
                for(var i = 0; i < roles[0].length; i++) {
                    var opt = document.createElement('option');
                    opt.value = roles[0][i];
                    opt.id = roles[2][i];
                    opt.innerHTML = roles[2][i] + ", " + roles[1][i] + " (" + roles[3][i] + ")";
                    roleselect.appendChild(opt);
                }
                var my_options = $("#deleteroleslstBox option");
                my_options.sort(function(a,b) {
                    return a.id > b.id;
                });
                $("#deleteroleslstBox").empty().append(my_options);
            });
        });

        $("#newRolesForm").on("submit", function(e) {
            var selectedOpts = $('#tonewroleslstBox option');
            if (selectedOpts.length == 0) {
                alert("You must choose at least one user");
                e.preventDefault();
            }
            else {
                var role = document.getElementById("new-role-select").value;
                var emails = [];
                for(var i=0; i < selectedOpts.length; i++) {
                    emails[i] = selectedOpts[i].value;
                }
                insertRoles(function() {
                    location.reload();
                }, emails, role);
                e.preventDefault();
            }
        });

        $("#deleteRolesForm").on("submit", function(e) {
            var selectedOpts = $('#todeleteroleslstBox option');
            if (selectedOpts.length == 0) {
                alert("You must choose at least one role");
                e.preventDefault();
            }
            else {
                var ids = [];
                for(var i=0; i < selectedOpts.length; i++) {
                    ids[i] = selectedOpts[i].value;
                }
                deleteRoles(function() {
                    location.reload();
                }, ids);
                e.preventDefault();
            }
        });
    });
    </script>

</body>

</html>
