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

    <title>Program Administration - Student Admission Program - Boston College</title>

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
                    <h3 style="margin-top: 60px; margin-bottom: 0;" class="page-header" id="panels-header">Program Administration</h3>
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
                                <button class="btn btn-md btn-success" id="openModalButton" style="margin-left: 10px;" data-toggle="modal" data-target="#addProgramModal">Add New Program</button>
                            </br></br>

                            <!-- Tab panes -->
                            
                                        <table class="table table-striped table-bordered table-hover" id="table-programs" style="font-size: 13px; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Program</th>
                                                    <th>Coordinator</th>
                                                    <th>Requirements</th>
                                                    <th>Number of Volunteers</th>
                                                    <th>Program ID</th>
                                                </tr>
                                                <tr>
                                                    <td>Program</td>
                                                    <td>Coordinator</td>
                                                    <td>Requirements</td>
                                                    <td>Number of Volunteers</td>
                                                    <td>Program ID</td>
                                                </tr>
                                            </thead>
                                            
                                            <tbody id="tablebody-programs">
                                                
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
        <div id="addProgramModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Program</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST" id="addProgramForm" name="addProgramForm">
                    <div class="form-group">
                        <label for="semester-form">Semester:</label>
                        <input type="text" name="semester-form" class="form-control" id="semester-form" readonly required>
                    </div>    
                    <div class="form-group">
                        <label for="year-form">Year:</label>
                        <input type="text" name="year-form" class="form-control" id="year-form" readonly required>
                    </div>    
                    <div class="form-group">
                        <label for="program-name">Program Name:</label>
                        <select name="program-name" class="form-control" id="program-name" required>
                            <option disabled selected value required> -- Select an Option -- </option>
                            <option value="Panels">Panels</option>
                            <option value="Tours">Tours</option>
                            <option value="Greeting">Greeting</option>
                            <option value="Office Management">Office Management</option>
                            <option value="Eagle for a Day">Eagle for a Day</option>
                            <option value="Admitted Eagle Day">Admitted Eagle Day</option>
                            <option value="Outreach">Outreach</option>
                            <option value="High School Visits">High School Visits</option>
                            <option value="AHANA Outreach">AHANA Outreach</option>
                            <option value="International Outreach">International Outreach</option>
                            <option value="Transfer Outreach">Transfer Outreach</option>
                            <option value="Media">Media</option>
                            <option value="Summer">Summer</option>
                        </select>
                    </div>
                    <table style='margin-left:150px;'>
                                <tr>
                                    <td>
                                        <b>Coordinators:</b><br/>
                                       <select multiple="multiple" size='10' id='councillstBox'>
                                        </select>
                                        
                                </td>
                                <td style='text-align:center;vertical-align:middle;'>
                                    <button class="btn btn-primary btn-xs lstButton" id='btnRightCouncil' value='right'>></button>
                                    <br/><button class="btn btn-primary btn-xs lstButton" style='margin:5px;' id='btnLeftCouncil' value='left'><</button> 
                                </td>
                                <td>
                                    <b>Selected Coordinators:</b><br/>
                                    <select multiple="multiple" size='10' id='tocouncillstBox'> 
                                    </select>
                                </td>
                            </tr>
                            </table>          
                    <input type="submit" name="submit" id="modalFormSubmit" value="Add Program" class="btn btn-danger"></input>
                    </form>
                  </div>
                <div class="modal-footer">
                    <button type="button" id="submitProgram" class="btn btn-default" data-dismiss="modal">Close</button>
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
        $('#table-programs thead td').each( function () {
            var title = $(this).text();
            $(this).css('text-align', 'center');
            $(this).html( '<input type="text"/>' );
            $(this).children('input').css('width', '100%');
        } );
     
        // DataTable
        var tableProgram = $('#table-programs').DataTable({
            responsive: true,
            orderCellsTop: true,
            "columnDefs": [
            {
                "targets": [4],
                "visible": false,
                "orderable": false
                
            }], 
            order: [[0, "asc"]]
            
        });
        var s = document.getElementById("table-semester");
        var selectedSemester = s.options[s.selectedIndex].value;
        var y = document.getElementById("table-year");
        var selectedYear = y.options[y.selectedIndex].value;
        tableProgram.clear();

        getPrograms(function(newTable) {
            newTable.draw();
        }, selectedSemester, selectedYear, tableProgram);
     
        // Apply the search
        tableProgram.columns().every(function (index) {
        $('#table-programs thead tr:eq(1) td:eq(' + index + ') input').on('keyup change', function () {
            tableProgram.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
            } );
        } );

        $(".lstButton").on("click", function(e) {
            e.preventDefault();
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
                    return a.id > b.id;
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
                    return a.id > b.id;
                });
                $("#councillstBox").empty().append(my_options);
            }
        });

        $('#semester-submit').on("click", function() {
            
            var s = document.getElementById("table-semester");
            var selectedSemester = s.options[s.selectedIndex].value;
            var y = document.getElementById("table-year");
            var selectedYear = y.options[y.selectedIndex].value;
            tableProgram.clear();

            getPrograms(function(newTable) {
                newTable.draw();
            }, selectedSemester, selectedYear, tableProgram);            
        });
        
        $('#table-programs tbody').on('dblclick', 'td', function(e) {
            var currentEle = $(this);
            var valueT = $(this).html();
            var row = tableProgram.cell($(this)).index().row;
            var column = tableProgram.cell($(this)).index().column;
            var alterable = [0,2];
            var selectable = [0];
            var textAreaCols = [2];
            if(alterable.indexOf(column) == -1) { //can't the other columns
                return;
            }
            var data = tableProgram.row(row).data();
            var updateField = ['program_name', 'coordinator', 'requirements'];
            setTimeout(function() {
                if(column == 0) {
                    if(!<?php 
                        if((in_array('Admin', $roles)) || (in_array('Advisor', $roles))) {
                            echo "true";
                        }
                        else {
                            echo "false";
                        } 
                        ?>) {
                        return ;
                    }
                    $(currentEle).html('<select id="newvalue" class="thVal">' +
                                            '<option value="Panels"' + (valueT == "Panels" ? 'selected = selected' : '') + '>Panels</option>' +
                                            '<option value="Tours"' + (valueT == "Tours" ? 'selected = selected' : '') + '>Tours</option>' +
                                            '<option value="Greeting"' + (valueT == "Greeting" ? 'selected = selected' : '') + '>Greeting</option>' +
                                            '<option value="Office Management"' + (valueT == "Office Management" ? 'selected = selected' : '') + '>Office Management</option>' +
                                            '<option value="Eagle for a Day"' + (valueT == "Eagle for a Day" ? 'selected = selected' : '') + '>Eagle for a Day</option>' +
                                            '<option value="Admitted Eagle Day"' + (valueT == "Admitted Eagle Day" ? 'selected = selected' : '') + '>Admitted Eagle Day</option>' +
                                            '<option value="Outreach"' + (valueT == "Outreach" ? 'selected = selected' : '') + '>Outreach</option>' +
                                            '<option value="High School Visits"' + (valueT == "High School Visits" ? 'selected = selected' : '') + '>High School Visits</option>' +
                                            '<option value="AHANA Outreach"' + (valueT == "AHANA Outreach" ? 'selected = selected' : '') + '>AHANA Outreach</option>' +
                                            '<option value="International Outreach"' + (valueT == "International Outreach" ? 'selected = selected' : '') + '>International Outreach</option>' +
                                            '<option value="Transfer Outreach"' + (valueT == "Transfer Outreach" ? 'selected = selected' : '') + '>Transfer Outreach</option>' +
                                            '<option value="Media"' + (valueT == "Media" ? 'selected = selected' : '') + '>Media</option>' +
                                            '<option value="Summer"' + (valueT == "Summer" ? 'selected = selected' : '') + '>Summer</option>' +
                                        '</select>');
                }
                else {
                    var valueTT = valueT.replace(/<br>/g, '\n');
                    $(currentEle).html('<textarea rows="5" cols="30" id="newvalue" class="thVal">' + valueTT + '</textarea>');
                }
                $(".thVal").focus();
                if(selectable.indexOf(column) == -1) {
                    var tmp = document.getElementById("newvalue").value;
                    document.getElementById("newvalue").value = '';
                    document.getElementById("newvalue").value = tmp;
                }
                $(".thVal").keydown(function (event) {
                    if (event.keyCode == 13 && !event.shiftKey) {
                        if(textAreaCols.indexOf(column) != -1) {
                            event.preventDefault();
                            data[column] =  document.getElementById("newvalue").value.trim();
                        }
                        else {
                            data[column] =  $('#newvalue option:selected').val().trim();
                        }        
                        tableProgram.row(row).remove();
                        inLineUpdatePostData(function() {
                            if(textAreaCols.indexOf(column) != -1) {
                                data[column] = document.getElementById("newvalue").value.trim().replace(/\n/g, '<br>');
                            }
                            tableProgram.row.add([
                                data[0],
                                data[1],
                                data[2],
                                data[3],
                                data[4],
                            ]).draw()
                        }, data[4], updateField[column], 'Programs', data[column], 'program_id');
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
            getCoordinatorsForYear(function(b) {
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
            }, selectedYear, selectedSemester);

            getExistingProgramsForSemester(function(c) {
                var programs = c;
                var programOptions = $("#program-name option");
                for(var i = 0; i < programs.length; i++) {
                    for(var k = 0; k < programOptions.length; k++) {
                        if(programs[i] == programOptions[k].value) {
                            programOptions[k].disabled = true;
                        }
                    }
                }
            }, selectedYear, selectedSemester);
        });

        $("#addProgramForm").on("submit", function(e) {
            var formProgram = document.getElementById("program-name").value;
            var formYear = document.getElementById("year-form").value;
            var formSemester = document.getElementById("semester-form").value;

            var selectedOpts = $('#tocouncillstBox option');
            if (selectedOpts.length != 1) {
                    alert("You must choose one (and only one) council member to be the coordinator of the program");
                    e.preventDefault();
                    return ;
                }
            var id;
            for(var i=0; i < selectedOpts.length; i++) {
                id = selectedOpts[i].value;
            }
            
            insertProgram(function() {
                location.reload();
            }, formProgram, formYear, formSemester, id);
            e.preventDefault();
        });

        if(!<?php 
                if((in_array('Admin', $roles)) || (in_array('Advisor', $roles))) {
                    echo "true";
                }
                else {
                    echo "false";
                } 
                ?>) {
                $("#openModalButton").hide();
            }
    });
    </script>

</body>

</html>
