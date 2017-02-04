<?php 
ob_start();
session_start();
require_once '../resources/init.php';
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
                                    <form id='changeInfoForm'>
                                    <table class="table" style="font-size: 14px; width: 100%;">
                                        <tr>
                                            <td><strong>First Name:</strong> <span id="firstNameSpan"></span></td>
                                            <td><strong>Last Name:</strong> <span class="inputChange" id="lastNameSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email:</strong> <span class="inputChange" id="emailSpan"></span></td>
                                            <td><strong>Eagle ID:</strong> <span class="inputChange" id="eagleidSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Sex:</strong> <span class="inputChange" id="sexSpan"></span></td>
                                            <td><strong>Phone Number:</strong> <span class="inputChange" id="phoneSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Class:</strong> <span class="inputChange" id="classSpan"></span></td>
                                            <td><strong>School:</strong> <span class="inputChange" id="schoolSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Major:</strong> <span class="inputChange" id="majorSpan"></span></td>
                                            <td><strong>Minor:</strong> <span class="inputChange" id="minorSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Hometown:</strong> <span class="inputChange" id="hometownSpan"></span></td>
                                            <td><strong>State/Country:</strong> <span class="inputChange" id="stateSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Local Address:</strong> <span class="inputChange" id="localAddressSpan"></span></td>
                                            <td><strong>AHANA:</strong> <span class="inputChange" id="ahanaSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>International:</strong> <span class="inputChange" id="internationalSpan"></span></td>
                                            <td><strong>Transfer:</strong> <span class="inputChange" id="transferSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status:</strong> <span id="statusSpan"></span></td>
                                            <td><strong>Last Login:</strong> <span id="loginSpan"></span></td>
                                        </tr>
                                        <tr>
                                            <td></td><td></td>
                                        </tr>
                                    </table>
                                    <button class="btn btn-primary btn-sm preventButton" id="updateInfoButton">Update Information</button>
                                    <button class="btn btn-danger btn-sm preventButton" id="submitInfoButton">Submit Changes</button>
                                    <button class="btn btn-warning btn-sm preventButton" id="cancelButton">Cancel</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="involvement">
                                
                                   Click <a href="./myInvolvement.php">here</a> to see a more in-depth view of involvement</br></br>
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
        $('#submitInfoButton').hide();
        $('#cancelButton').hide();

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

            getInvolvementData(function(data) {
                document.getElementById("panelsCompleteSpan").innerHTML = data[0][0];
                document.getElementById("panelsPendingSpan").innerHTML = data[0][1];
                document.getElementById("panelsIncompleteSpan").innerHTML = data[0][2];
                document.getElementById("toursCompleteSpan").innerHTML = data[1][0];
                document.getElementById("toursPendingSpan").innerHTML = data[1][1];
                document.getElementById("toursIncompleteSpan").innerHTML = data[1][2];
                document.getElementById("greetingCompleteSpan").innerHTML = data[2][0];
                document.getElementById("greetingPendingSpan").innerHTML = data[2][1];
                document.getElementById("greetingIncompleteSpan").innerHTML = data[2][2];
                document.getElementById("omCompleteSpan").innerHTML = data[3][0];
                document.getElementById("omPendingSpan").innerHTML = data[3][1];
                document.getElementById("omIncompleteSpan").innerHTML = data[3][2];
                document.getElementById("efadCompleteSpan").innerHTML = data[4][0];
                document.getElementById("efadPendingSpan").innerHTML = data[4][1];
                document.getElementById("efadIncompleteSpan").innerHTML = data[4][2];
                document.getElementById("aedCompleteSpan").innerHTML = data[5][0];
                document.getElementById("aedPendingSpan").innerHTML = data[5][1];
                document.getElementById("aedIncompleteSpan").innerHTML = data[5][2];
                document.getElementById("outreachCompleteSpan").innerHTML = data[6][0];
                document.getElementById("outreachPendingSpan").innerHTML = data[6][1];
                document.getElementById("outreachIncompleteSpan").innerHTML = data[6][2];
                document.getElementById("hsvisitsCompleteSpan").innerHTML = data[7][0];
                document.getElementById("hsvisitsPendingSpan").innerHTML = data[7][1];
                document.getElementById("hsvisitsIncompleteSpan").innerHTML = data[7][2];
                document.getElementById("ahanaCompleteSpan").innerHTML = data[8][0];
                document.getElementById("ahanaPendingSpan").innerHTML = data[8][1];
                document.getElementById("ahanaIncompleteSpan").innerHTML = data[8][2];
                document.getElementById("ioCompleteSpan").innerHTML = data[9][0];
                document.getElementById("ioPendingSpan").innerHTML = data[9][1];
                document.getElementById("ioIncompleteSpan").innerHTML = data[9][2];
                document.getElementById("transferCompleteSpan").innerHTML = data[10][0];
                document.getElementById("transferPendingSpan").innerHTML = data[10][1];
                document.getElementById("transferIncompleteSpan").innerHTML = data[10][2];
                document.getElementById("mediaCompleteSpan").innerHTML = data[11][0];
                document.getElementById("mediaPendingSpan").innerHTML = data[11][1];
                document.getElementById("mediaIncompleteSpan").innerHTML = data[11][2];
            }, email, year.innerHTML);

        }, email);
        
        $('#updateInfoButton').on('click', function(e) {
            var valueT;
            fn.innerHTML = '<input type="text" id="fnInput" class="thVal" value="' + fn.innerHTML + '">';
            ln.innerHTML = '<input type="text" id="lnInput" class="thVal" value="' + ln.innerHTML + '">';
            eagleid.innerHTML = '<input type="text" id="eagleidInput" class="thVal" value="' + eagleid.innerHTML + '">';
            valueT = sex.innerHTML;
            sex.innerHTML = '<select id="sexInput" class="thVal">' +
                                            '<option value="Male"' + (valueT == "Male" ? 'selected = selected' : '') + '>Male</option>' +
                                            '<option value="Female"' + (valueT == "Female" ? 'selected = selected' : '') + '>Female</option>' +
                                        '</select>';
            phone.innerHTML = '<input type="text" id="phoneInput" class="thVal" value="' + phone.innerHTML + '">';
            year.innerHTML = '<input type="text" id="yearInput" class="thVal" value="' + year.innerHTML + '">';
            valueT = school.innerHTML;
            school.innerHTML = '<select id="schoolInput" class="thVal">' +
                                            '<option value="MCAS"' + (valueT == "MCAS" ? 'selected = selected' : '') + '>MCAS</option>' +
                                            '<option value="CSOM"' + (valueT == "CSOM" ? 'selected = selected' : '') + '>CSOM</option>' +
                                            '<option value="LSOE"' + (valueT == "LSOE" ? 'selected = selected' : '') + '>LSOE</option>' +
                                            '<option value="CSON"' + (valueT == "CSON" ? 'selected = selected' : '') + '>CSON</option>' +
                                        '</select>';
            major.innerHTML = '<input type="text" id="majorInput" class="thVal" value="' + major.innerHTML + '">';
            minor.innerHTML = '<input type="text" id="minorInput" class="thVal" value="' + minor.innerHTML + '">';
            hometown.innerHTML = '<input type="text" id="hometownInput" class="thVal" value="' + hometown.innerHTML + '">';
            valueT = state.innerHTML;
            state.innerHTML = '<select id="stateInput" name="state" class="stateSelect thVal">' +
                                            '<option value="AL"' + (valueT == "AL" ? 'selected = selected' : '') + '>AL</option>' +
                                            '<option value="AK"' + (valueT == "AK" ? 'selected = selected' : '') + '>AK</option>' +
                                            '<option value="AZ"' + (valueT == "AZ" ? 'selected = selected' : '') + '>AZ</option>' +
                                            '<option value="AR"' + (valueT == "AR" ? 'selected = selected' : '') + '>AR</option>' +
                                            '<option value="CA"' + (valueT == "CA" ? 'selected = selected' : '') + '>CA</option>' +
                                            '<option value="CO"' + (valueT == "CO" ? 'selected = selected' : '') + '>CO</option>' +
                                            '<option value="CT"' + (valueT == "CT" ? 'selected = selected' : '') + '>CT</option>' +
                                            '<option value="DE"' + (valueT == "DE" ? 'selected = selected' : '') + '>DE</option>' +
                                            '<option value="DC"' + (valueT == "DC" ? 'selected = selected' : '') + '>DC</option>' +
                                            '<option value="FL"' + (valueT == "FL" ? 'selected = selected' : '') + '>FL</option>' +
                                            '<option value="GA"' + (valueT == "GA" ? 'selected = selected' : '') + '>GA</option>' +
                                            '<option value="HI"' + (valueT == "HI" ? 'selected = selected' : '') + '>HI</option>' +
                                            '<option value="ID"' + (valueT == "ID" ? 'selected = selected' : '') + '>ID</option>' +
                                            '<option value="IL"' + (valueT == "IL" ? 'selected = selected' : '') + '>IL</option>' +
                                            '<option value="IN"' + (valueT == "IN" ? 'selected = selected' : '') + '>IN</option>' +
                                            '<option value="IA"' + (valueT == "IA" ? 'selected = selected' : '') + '>IA</option>' +
                                            '<option value="KS"' + (valueT == "KS" ? 'selected = selected' : '') + '>KS</option>' +
                                            '<option value="KY"' + (valueT == "KY" ? 'selected = selected' : '') + '>KY</option>' +
                                            '<option value="LA"' + (valueT == "LA" ? 'selected = selected' : '') + '>LA</option>' +
                                            '<option value="ME"' + (valueT == "ME" ? 'selected = selected' : '') + '>ME</option>' +
                                            '<option value="MD"' + (valueT == "MD" ? 'selected = selected' : '') + '>MD</option>' +
                                            '<option value="MA"' + (valueT == "MA" ? 'selected = selected' : '') + '>MA</option>' +
                                            '<option value="MI"' + (valueT == "MI" ? 'selected = selected' : '') + '>MI</option>' +
                                            '<option value="MN"' + (valueT == "MN" ? 'selected = selected' : '') + '>MN</option>' +
                                            '<option value="MS"' + (valueT == "MS" ? 'selected = selected' : '') + '>MS</option>' +
                                            '<option value="MO"' + (valueT == "MO" ? 'selected = selected' : '') + '>MO</option>' +
                                            '<option value="MT"' + (valueT == "MT" ? 'selected = selected' : '') + '>MT</option>' +
                                            '<option value="NE"' + (valueT == "NE" ? 'selected = selected' : '') + '>NE</option>' +
                                            '<option value="NV"' + (valueT == "NV" ? 'selected = selected' : '') + '>NV</option>' +
                                            '<option value="NH"' + (valueT == "NH" ? 'selected = selected' : '') + '>NH</option>' +
                                            '<option value="NJ"' + (valueT == "NJ" ? 'selected = selected' : '') + '>NJ</option>' +
                                            '<option value="NM"' + (valueT == "NM" ? 'selected = selected' : '') + '>NM</option>' +
                                            '<option value="NY"' + (valueT == "NY" ? 'selected = selected' : '') + '>NY</option>' +
                                            '<option value="NC"' + (valueT == "NC" ? 'selected = selected' : '') + '>NC</option>' +
                                            '<option value="ND"' + (valueT == "ND" ? 'selected = selected' : '') + '>ND</option>' +
                                            '<option value="OH"' + (valueT == "OH" ? 'selected = selected' : '') + '>OH</option>' +
                                            '<option value="OK"' + (valueT == "OK" ? 'selected = selected' : '') + '>OK</option>' +
                                            '<option value="OR"' + (valueT == "OR" ? 'selected = selected' : '') + '>OR</option>' +
                                            '<option value="PA"' + (valueT == "PA" ? 'selected = selected' : '') + '>PA</option>' +
                                            '<option value="RI"' + (valueT == "RI" ? 'selected = selected' : '') + '>RI</option>' +
                                            '<option value="SC"' + (valueT == "SC" ? 'selected = selected' : '') + '>SC</option>' +
                                            '<option value="SD"' + (valueT == "SD" ? 'selected = selected' : '') + '>SD</option>' +
                                            '<option value="TN"' + (valueT == "TN" ? 'selected = selected' : '') + '>TN</option>' +
                                            '<option value="TX"' + (valueT == "TX" ? 'selected = selected' : '') + '>TX</option>' +
                                            '<option value="UT"' + (valueT == "UT" ? 'selected = selected' : '') + '>UT</option>' +
                                            '<option value="VT"' + (valueT == "VT" ? 'selected = selected' : '') + '>VT</option>' +
                                            '<option value="VA"' + (valueT == "VA" ? 'selected = selected' : '') + '>VA</option>' +
                                            '<option value="WA"' + (valueT == "WA" ? 'selected = selected' : '') + '>WA</option>' +
                                            '<option value="WV"' + (valueT == "WV" ? 'selected = selected' : '') + '>WV</option>' +
                                            '<option value="WI"' + (valueT == "WI" ? 'selected = selected' : '') + '>WI</option>' +
                                            '<option value="WY"' + (valueT == "WY" ? 'selected = selected' : '') + '>WY</option>' +
                                            '<option value="Afganistan">Afghanistan</option>' + 
                                            '<option value="Albania">Albania</option>' +
                                            '<option value="Algeria">Algeria</option>' +
                                            '<option value="American Samoa">American Samoa</option>' +
                                            '<option value="Andorra">Andorra</option>' +
                                            '<option value="Angola">Angola</option>' +
                                            '<option value="Anguilla">Anguilla</option>' +
                                            '<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>' +
                                            '<option value="Argentina">Argentina</option>' +
                                            '<option value="Armenia">Armenia</option>' +
                                            '<option value="Aruba">Aruba</option>' +
                                            '<option value="Australia">Australia</option>' +
                                            '<option value="Austria">Austria</option>' +
                                            '<option value="Azerbaijan">Azerbaijan</option>' +
                                            '<option value="Bahamas">Bahamas</option>' +
                                            '<option value="Bahrain">Bahrain</option>' +
                                            '<option value="Bangladesh">Bangladesh</option>' +
                                            '<option value="Barbados">Barbados</option>' +
                                            '<option value="Belarus">Belarus</option>' +
                                            '<option value="Belgium">Belgium</option>' +
                                            '<option value="Belize">Belize</option>' +
                                            '<option value="Benin">Benin</option>' +
                                            '<option value="Bermuda">Bermuda</option>' +
                                            '<option value="Bhutan">Bhutan</option>' +
                                            '<option value="Bolivia">Bolivia</option>' +
                                            '<option value="Bonaire">Bonaire</option>' +
                                            '<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>' +
                                            '<option value="Botswana">Botswana</option>' +
                                            '<option value="Brazil">Brazil</option>' +
                                            '<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>' +
                                            '<option value="Brunei">Brunei</option>' +
                                            '<option value="Bulgaria">Bulgaria</option>' +
                                            '<option value="Burkina Faso">Burkina Faso</option>' +
                                            '<option value="Burundi">Burundi</option>' +
                                            '<option value="Cambodia">Cambodia</option>' +
                                            '<option value="Cameroon">Cameroon</option>' +
                                            '<option value="Canada">Canada</option>' +
                                            '<option value="Canary Islands">Canary Islands</option>' +
                                            '<option value="Cape Verde">Cape Verde</option>' +
                                            '<option value="Cayman Islands">Cayman Islands</option>' +
                                            '<option value="Central African Republic">Central African Republic</option>' +
                                            '<option value="Chad">Chad</option>' +
                                            '<option value="Channel Islands">Channel Islands</option>' +
                                            '<option value="Chile">Chile</option>' +
                                            '<option value="China">China</option>' +
                                            '<option value="Christmas Island">Christmas Island</option>' +
                                            '<option value="Cocos Island">Cocos Island</option>' +
                                            '<option value="Colombia">Colombia</option>' +
                                            '<option value="Comoros">Comoros</option>' +
                                            '<option value="Congo">Congo</option>' +
                                            '<option value="Cook Islands">Cook Islands</option>' +
                                            '<option value="Costa Rica">Costa Rica</option>' +
                                            '<option value="Cote DIvoire">Cote D\'Ivoire</option>' +
                                            '<option value="Croatia">Croatia</option>' +
                                            '<option value="Cuba">Cuba</option>' +
                                            '<option value="Curaco">Curacao</option>' +
                                            '<option value="Cyprus">Cyprus</option>' +
                                            '<option value="Czech Republic">Czech Republic</option>' +
                                            '<option value="Denmark">Denmark</option>' +
                                            '<option value="Djibouti">Djibouti</option>' +
                                            '<option value="Dominica">Dominica</option>' +
                                            '<option value="Dominican Republic">Dominican Republic</option>' +
                                            '<option value="East Timor">East Timor</option>' +
                                            '<option value="Ecuador">Ecuador</option>' +
                                            '<option value="Egypt">Egypt</option>' +
                                            '<option value="El Salvador">El Salvador</option>' +
                                            '<option value="Equatorial Guinea">Equatorial Guinea</option>' +
                                            '<option value="Eritrea">Eritrea</option>' +
                                            '<option value="Estonia">Estonia</option>' +
                                            '<option value="Ethiopia">Ethiopia</option>' +
                                            '<option value="Falkland Islands">Falkland Islands</option>' +
                                            '<option value="Faroe Islands">Faroe Islands</option>' +
                                            '<option value="Fiji">Fiji</option>' +
                                            '<option value="Finland">Finland</option>' +
                                            '<option value="France">France</option>' +
                                            '<option value="French Guiana">French Guiana</option>' +
                                            '<option value="French Polynesia">French Polynesia</option>' +
                                            '<option value="French Southern Ter">French Southern Ter</option>' +
                                            '<option value="Gabon">Gabon</option>' +
                                            '<option value="Gambia">Gambia</option>' +
                                            '<option value="Georgia">Georgia</option>' +
                                            '<option value="Germany">Germany</option>' +
                                            '<option value="Ghana">Ghana</option>' +
                                            '<option value="Gibraltar">Gibraltar</option>' +
                                            '<option value="Great Britain">Great Britain</option>' +
                                            '<option value="Greece">Greece</option>' +
                                            '<option value="Greenland">Greenland</option>' +
                                            '<option value="Grenada">Grenada</option>' +
                                            '<option value="Guadeloupe">Guadeloupe</option>' +
                                            '<option value="Guam">Guam</option>' +
                                            '<option value="Guatemala">Guatemala</option>' +
                                            '<option value="Guinea">Guinea</option>' +
                                            '<option value="Guyana">Guyana</option>' +
                                            '<option value="Haiti">Haiti</option>' +
                                            '<option value="Hawaii">Hawaii</option>' +
                                            '<option value="Honduras">Honduras</option>' +
                                            '<option value="Hong Kong">Hong Kong</option>' +
                                            '<option value="Hungary">Hungary</option>' +
                                            '<option value="Iceland">Iceland</option>' +
                                            '<option value="India">India</option>' +
                                            '<option value="Indonesia">Indonesia</option>' +
                                            '<option value="Iran">Iran</option>' +
                                            '<option value="Iraq">Iraq</option>' +
                                            '<option value="Ireland">Ireland</option>' +
                                            '<option value="Isle of Man">Isle of Man</option>' +
                                            '<option value="Israel">Israel</option>' +
                                            '<option value="Italy">Italy</option>' +
                                            '<option value="Jamaica">Jamaica</option>' +
                                            '<option value="Japan">Japan</option>' +
                                            '<option value="Jordan">Jordan</option>' +
                                            '<option value="Kazakhstan">Kazakhstan</option>' +
                                            '<option value="Kenya">Kenya</option>' +
                                            '<option value="Kiribati">Kiribati</option>' +
                                            '<option value="Korea North">Korea North</option>' +
                                            '<option value="Korea Sout">Korea South</option>' +
                                            '<option value="Kuwait">Kuwait</option>' +
                                            '<option value="Kyrgyzstan">Kyrgyzstan</option>' +
                                            '<option value="Laos">Laos</option>' +
                                            '<option value="Latvia">Latvia</option>' +
                                            '<option value="Lebanon">Lebanon</option>' +
                                            '<option value="Lesotho">Lesotho</option>' +
                                            '<option value="Liberia">Liberia</option>' +
                                            '<option value="Libya">Libya</option>' +
                                            '<option value="Liechtenstein">Liechtenstein</option>' +
                                            '<option value="Lithuania">Lithuania</option>' +
                                            '<option value="Luxembourg">Luxembourg</option>' +
                                            '<option value="Macau">Macau</option>' +
                                            '<option value="Macedonia">Macedonia</option>' +
                                            '<option value="Madagascar">Madagascar</option>' +
                                            '<option value="Malaysia">Malaysia</option>' +
                                            '<option value="Malawi">Malawi</option>' +
                                            '<option value="Maldives">Maldives</option>' +
                                            '<option value="Mali">Mali</option>' +
                                            '<option value="Malta">Malta</option>' +
                                            '<option value="Marshall Islands">Marshall Islands</option>' +
                                            '<option value="Martinique">Martinique</option>' +
                                            '<option value="Mauritania">Mauritania</option>' +
                                            '<option value="Mauritius">Mauritius</option>' +
                                            '<option value="Mayotte">Mayotte</option>' +
                                            '<option value="Mexico">Mexico</option>' +
                                            '<option value="Midway Islands">Midway Islands</option>' +
                                            '<option value="Moldova">Moldova</option>' +
                                            '<option value="Monaco">Monaco</option>' +
                                            '<option value="Mongolia">Mongolia</option>' +
                                            '<option value="Montserrat">Montserrat</option>' +
                                            '<option value="Morocco">Morocco</option>' +
                                            '<option value="Mozambique">Mozambique</option>' +
                                            '<option value="Myanmar">Myanmar</option>' +
                                            '<option value="Nambia">Nambia</option>' +
                                            '<option value="Nauru">Nauru</option>' +
                                            '<option value="Nepal">Nepal</option>' +
                                            '<option value="Netherland Antilles">Netherland Antilles</option>' +
                                            '<option value="Netherlands">Netherlands (Holland, Europe)</option>' +
                                            '<option value="Nevis">Nevis</option>' +
                                            '<option value="New Caledonia">New Caledonia</option>' +
                                            '<option value="New Zealand">New Zealand</option>' +
                                            '<option value="Nicaragua">Nicaragua</option>' +
                                            '<option value="Niger">Niger</option>' +
                                            '<option value="Nigeria">Nigeria</option>' +
                                            '<option value="Niue">Niue</option>' +
                                            '<option value="Norfolk Island">Norfolk Island</option>' +
                                            '<option value="Norway">Norway</option>' +
                                            '<option value="Oman">Oman</option>' +
                                            '<option value="Pakistan">Pakistan</option>' +
                                            '<option value="Palau Island">Palau Island</option>' +
                                            '<option value="Palestine">Palestine</option>' +
                                            '<option value="Panama">Panama</option>' +
                                            '<option value="Papua New Guinea">Papua New Guinea</option>' +
                                            '<option value="Paraguay">Paraguay</option>' +
                                            '<option value="Peru">Peru</option>' +
                                            '<option value="Phillipines">Philippines</option>' +
                                            '<option value="Pitcairn Island">Pitcairn Island</option>' +
                                            '<option value="Poland">Poland</option>' +
                                            '<option value="Portugal">Portugal</option>' +
                                            '<option value="Puerto Rico">Puerto Rico</option>' +
                                            '<option value="Qatar">Qatar</option>' +
                                            '<option value="Republic of Montenegro">Republic of Montenegro</option>' +
                                            '<option value="Republic of Serbia">Republic of Serbia</option>' +
                                            '<option value="Reunion">Reunion</option>' +
                                            '<option value="Romania">Romania</option>' +
                                            '<option value="Russia">Russia</option>' +
                                            '<option value="Rwanda">Rwanda</option>' +
                                            '<option value="St Barthelemy">St Barthelemy</option>' +
                                            '<option value="St Eustatius">St Eustatius</option>' +
                                            '<option value="St Helena">St Helena</option>' +
                                            '<option value="St Kitts-Nevis">St Kitts-Nevis</option>' +
                                            '<option value="St Lucia">St Lucia</option>' +
                                            '<option value="St Maarten">St Maarten</option>' +
                                            '<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>' +
                                            '<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>' +
                                            '<option value="Saipan">Saipan</option>' +
                                            '<option value="Samoa">Samoa</option>' +
                                            '<option value="Samoa American">Samoa American</option>' +
                                            '<option value="San Marino">San Marino</option>' +
                                            '<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>' +
                                            '<option value="Saudi Arabia">Saudi Arabia</option>' +
                                            '<option value="Senegal">Senegal</option>' +
                                            '<option value="Serbia">Serbia</option>' +
                                            '<option value="Seychelles">Seychelles</option>' +
                                            '<option value="Sierra Leone">Sierra Leone</option>' +
                                            '<option value="Singapore">Singapore</option>' +
                                            '<option value="Slovakia">Slovakia</option>' +
                                            '<option value="Slovenia">Slovenia</option>' +
                                            '<option value="Solomon Islands">Solomon Islands</option>' +
                                            '<option value="Somalia">Somalia</option>' +
                                            '<option value="South Africa">South Africa</option>' +
                                            '<option value="Spain">Spain</option>' +
                                            '<option value="Sri Lanka">Sri Lanka</option>' +
                                            '<option value="Sudan">Sudan</option>' +
                                            '<option value="Suriname">Suriname</option>' +
                                            '<option value="Swaziland">Swaziland</option>' +
                                            '<option value="Sweden">Sweden</option>' +
                                            '<option value="Switzerland">Switzerland</option>' +
                                            '<option value="Syria">Syria</option>' +
                                            '<option value="Tahiti">Tahiti</option>' +
                                            '<option value="Taiwan">Taiwan</option>' +
                                            '<option value="Tajikistan">Tajikistan</option>' +
                                            '<option value="Tanzania">Tanzania</option>' +
                                            '<option value="Thailand">Thailand</option>' +
                                            '<option value="Togo">Togo</option>' +
                                            '<option value="Tokelau">Tokelau</option>' +
                                            '<option value="Tonga">Tonga</option>' +
                                            '<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>' +
                                            '<option value="Tunisia">Tunisia</option>' +
                                            '<option value="Turkey">Turkey</option>' +
                                            '<option value="Turkmenistan">Turkmenistan</option>' +
                                            '<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>' +
                                            '<option value="Tuvalu">Tuvalu</option>' +
                                            '<option value="Uganda">Uganda</option>' +
                                            '<option value="Ukraine">Ukraine</option>' +
                                            '<option value="United Arab Erimates">United Arab Emirates</option>' +
                                            '<option value="United Kingdom">United Kingdom</option>' +
                                            '<option value="United States of America">United States of America</option>' +
                                            '<option value="Uraguay">Uruguay</option>' +
                                            '<option value="Uzbekistan">Uzbekistan</option>' +
                                            '<option value="Vanuatu">Vanuatu</option>' +
                                            '<option value="Vatican City State">Vatican City State</option>' +
                                            '<option value="Venezuela">Venezuela</option>' +
                                            '<option value="Vietnam">Vietnam</option>' +
                                            '<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>' +
                                            '<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>' +
                                            '<option value="Wake Island">Wake Island</option>' +
                                            '<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>' +
                                            '<option value="Yemen">Yemen</option>' +
                                            '<option value="Zaire">Zaire</option>' +
                                            '<option value="Zambia">Zambia</option>' +
                                            '<option value="Zimbabwe">Zimbabwe</option>' +
                                        '</select>';
            local.innerHTML = '<input type="text" id="localInput" class="thVal" value="' + local.innerHTML + '">';
            valueT = ahana.innerHTML;
            ahana.innerHTML = '<select id="ahanaInput" class="thVal">' +
                                            '<option value="Yes"' + (valueT == "Yes" ? 'selected = selected' : '') + '>Yes</option>' +
                                            '<option value="No"' + (valueT == "No" ? 'selected = selected' : '') + '>No</option>' +
                                        '</select>';
            valueT = international.innerHTML;
            international.innerHTML = '<select id="internationalInput" class="thVal">' +
                                            '<option value="Yes"' + (valueT == "Yes" ? 'selected = selected' : '') + '>Yes</option>' +
                                            '<option value="No"' + (valueT == "No" ? 'selected = selected' : '') + '>No</option>' +
                                        '</select>';
            valueT = transfer.innerHTML;
            transfer.innerHTML = '<select id="transferInput" class="thVal">' +
                                            '<option value="Yes"' + (valueT == "Yes" ? 'selected = selected' : '') + '>Yes</option>' +
                                            '<option value="No"' + (valueT == "No" ? 'selected = selected' : '') + '>No</option>' +
                                        '</select>';


            $('#updateInfoButton').hide();
            $('#submitInfoButton').show();
            $('#cancelButton').show();

            $(".thVal").keydown(function (event) {
                if (event.keyCode == 13) { 
                    event.preventDefault();
                    $('#cancelButton').trigger('click');
                    alert("Your changes did not submit. Please refresh the page and be sure to click on the \"Submit Changes\" button");
                }
            });
        });

        $('#cancelButton').on('click', function() {
            $('#updateInfoButton').show();
            $('#submitInfoButton').hide();
            $('#cancelButton').hide();
            var fnn = document.getElementById("fnInput").value;
            var lnn = document.getElementById("lnInput").value;
            var eagleidn = document.getElementById("eagleidInput").value;
            var a = document.getElementById("sexInput");
            var sexn = a.options[a.selectedIndex].value;
            var phonen = document.getElementById("phoneInput").value;
            var yearn = document.getElementById("yearInput").value;
            a = document.getElementById("schoolInput");
            var schooln = a.options[a.selectedIndex].value;
            var majorn = document.getElementById("majorInput").value;
            var minorn = document.getElementById("minorInput").value;
            var hometownn = document.getElementById("hometownInput").value;
            a = document.getElementById("stateInput");
            var staten = a.options[a.selectedIndex].value;
            var localn = document.getElementById("localInput").value;
            a = document.getElementById("ahanaInput");
            var ahanan = a.options[a.selectedIndex].value;
            a = document.getElementById("internationalInput");
            var internationaln = a.options[a.selectedIndex].value;
            a = document.getElementById("transferInput");
            var transfern = a.options[a.selectedIndex].value;

            fn.innerHTML = fnn;
            ln.innerHTML = lnn;
            eagleid.innerHTML = eagleidn;
            sex.innerHTML = sexn;
            phone.innerHTML = phonen;
            year.innerHTML = yearn;
            school.innerHTML = schooln;
            major.innerHTML = majorn;
            minor.innerHTML = minorn;
            hometown.innerHTML = hometownn;
            state.innerHTML = staten;
            local.innerHTML = localn;
            ahana.innerHTML = ahanan;
            international.innerHTML = internationaln;
            transfer.innerHTML = transfern;
        });

        $('#submitInfoButton').on('click', function() {
            var fnn = document.getElementById("fnInput").value;
            var lnn = document.getElementById("lnInput").value;
            var eagleidn = document.getElementById("eagleidInput").value;
            var a = document.getElementById("sexInput");
            var sexn = a.options[a.selectedIndex].value;
            var phonen = document.getElementById("phoneInput").value;
            var yearn = document.getElementById("yearInput").value;
            a = document.getElementById("schoolInput");
            var schooln = a.options[a.selectedIndex].value;
            var majorn = document.getElementById("majorInput").value;
            var minorn = document.getElementById("minorInput").value;
            var hometownn = document.getElementById("hometownInput").value;
            a = document.getElementById("stateInput");
            var staten = a.options[a.selectedIndex].value;
            var localn = document.getElementById("localInput").value;
            a = document.getElementById("ahanaInput");
            var ahanan = a.options[a.selectedIndex].value;
            a = document.getElementById("internationalInput");
            var internationaln = a.options[a.selectedIndex].value;
            a = document.getElementById("transferInput");
            var transfern = a.options[a.selectedIndex].value;

            updateProfile(function() {
                location.reload();
            }, email, fnn, lnn, eagleidn, sexn, phonen, yearn, schooln, majorn, minorn, hometownn, staten, localn, ahanan, internationaln, transfern);
        });

        $('.preventButton').on('click', function(e) {
            e.preventDefault();
        });
    });
    </script>

</body>

</html>
