<?php 
ob_start();
session_start();
require_once '../resources/init.php';
$general->logged_out_protect();
require '../include/helpers/userInfo.php';
require '../include/helpers/helpers.php';
require '../include/helpers/pageProtect.php';
echo '<input type="hidden" id="programName" value="All Users">';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>All Users - Student Admission Program - Boston College</title>

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
                    <h3 style="margin-top: 60px; margin-bottom: 0;" class="page-header" id="panels-header">All Users</h3>
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
                                <select name="table-status" class="form-control form-control-xs" id="table-status" style="text-align: right;">
                                    <option value='Active' selected="selected">Active</option>
                                    <option value='Inactive'>Inactive</option>
                                    <option value="Abroad/Prac/Clinical">Abroad/Prac/Clinical</option>
                                    <option value="Graduated">Graduated</option>
                                    <option value="Staff">Staff</option>
                                </select>
                            </div>
                                <button class="btn btn-primary" id="semester-submit">Go</button>
                                <!--<button class="btn btn-success" id="newAttendance" style="margin-left: 10px;">Populate Sheet</button>-->
                            <div>
                            </br>
                                <button class="btn btn-primary btn-xs" id="export-excel-all">Excel</button>
                                <button class="btn btn-primary btn-xs" id="export-csv-all">CSV</button>
                                <button class="btn btn-primary btn-xs" id="export-pdf-all">PDF</button>
                                <button class="btn btn-success btn-xs" id="openModalButton" data-toggle="modal" data-target="#toggleVolsColumnsModal">Toggle Columns</button>
                                <?php if(in_array('Admin', $roles) || in_array('Council', $roles) || in_array('Advisor', $roles)) {

                                    echo 
                                    '<button class="btn btn-danger btn-xs" id="new-members-modal-button" data-toggle="modal" data-target="#newMembersModal">New Users</button>';
                                }?>
                                
                            </div>
                            </br>
                            <table class="table table-striped table-bordered table-hover" id="table-volunteers" style="font-size: 13px; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Sex</th>
                                        <th>Class</th>
                                        <th>School</th>
                                        <th>Major</th>
                                        <th>Minor</th>
                                        <th>Hometown</th>
                                        <th>State</th>
                                        <th>AHANA</th>
                                        <th>International</th>
                                        <th>Transfer</th>
                                        <th>Local Address</th>
                                        <th>Applied Tours</th>
                                        <th>Applied Panels</th>
                                        <th>Applied Council</th>
                                        <th>Applied Summer</th>
                                        <th>Status</th>
                                        <th>Last Login</th>
                                        <th>Eagle ID</th>
                                        <th>Delete</th>
                                    </tr>
                                    <tr>
                                        <td>First Name</td>
                                        <td>Last Name</td>
                                        <td>Email</td>
                                        <td>Phone</td>
                                        <td>Sex</td>
                                        <td>Class</td>
                                        <td>School</td>
                                        <td>Major</td>
                                        <td>Minor</td>
                                        <td>Hometown</td>
                                        <td>State</td>
                                        <td>AHANA</td>
                                        <td>International</td>
                                        <td>Transfer</td>
                                        <td>Local Address</td>
                                        <td>Applied Tours</td>
                                        <td>Applied Panels</td>
                                        <td>Applied Council</td>
                                        <td>Applied Summer</td>
                                        <td>Status</td>
                                        <td>Last Login</td>
                                        <td>Eagle ID</td>
                                        <td>Delete</td>
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

    <div id="toggleVolsColumnsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Toggle Columns</h4>
                </div>
                <div class="modal-body">
                    <table style='margin-left:150px;'>
                        <tr>
                            <td>
                                <b>Displayed:</b><br/>
                               <select multiple="multiple" size='10' id='volslstBox1'>
                                    <option value="0">First Name</th>
                                    <option value="1">Last Name</option>
                                    <option value="2">Email</option>
                                    <option value="4">Sex</option>
                                    <option value="5">Class</option>
                                    <option value="6">School</option>
                                    <option value="7">Major</option>
                                    <option value="8">Minor</option>
                                    <option value="9">Hometown</option>
                                    <option value="10">State</option>
                            </select>
                        </td>
                        <td style='text-align:center;vertical-align:middle;'>
                            <button class="btn btn-primary btn-xs" id='btnRightVols' value='right'>></button>
                            <br/><button class="btn btn-primary btn-xs" style='margin:5px;' id='btnLeftVols' value='left'><</button> 
                        </td>
                        <td>
                            <b>Not Displayed: </b><br/>
                            <select multiple="multiple" size='10' id='volslstBox2'> 
                                <option value="3">Phone</option>
                                <option value="11">AHANA</option>
                                <option value="12">International</option>
                                <option value="13">Transfer</option>
                                <option value="14">Local Address</option>
                                <option value="15">Applied Tours</option>
                                <option value="16">Applied Panels</option>
                                <option value="17">Applied Council</option>
                                <option value="18">Applied Summer</option>
                                <option value="19">Status</option>
                                <option value="20">Last Login</option>
                                <option value="21">Eagle ID</option>
                                <option value="22">Delete</option>
                            </select>
                        </td>
                    </tr>
                    </table>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="newMembersModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Members</h4>
                </div>
                <div class="modal-body">
                    <h5>Users CANNOT be added more than once. IMPORTANT: Please use the email username@bc.edu</h5>
                    File upload or manual entry?
                    <button class="btn btn-primary btn-xs" id="fileMethodButton">File Upload</button>
                    <button class="btn btn-primary btn-xs" id="manualMethodButton">Manual Entry</button>
                    <div id="fileMethod">
                        <form method="post" id="addMembersFormFile" name="addMembersFormFile" enctype="multipart/form-data" action="../include/insertUserFile.php">
                            <div class="form-group">
                                <strong>Upload file (only .csv):</strong>
                                <input type="file" name="file-form" id="file-form" accept=".csv" required>
                                </br><Strong>Note: </strong>File MUST have the following column format with the header included:
                                </br>Email - Eagle ID - First Name - Last Name - Sex - Class - School - Major - Minor - Hometown - State Abbreviation (Or Country) - 
                                International - AHANA - Transfer - Phone Number (xxx) xxx-xxxx 
                            </div>
                            <div>
                                <p>&nbsp</p>
                            </div> 
                            <input type="submit" name="addMembersFormSubmitFile" id="addMembersFormSubmitFile" value="Add Members" class="btn btn-danger"></input>
                        </form>  
                    </div>
                    <div id="manualMethod">
                        <form method="POST" id="addMembersFormManual" name="addMembersFormManual">
                            <div class="form-group">
                                <label for="email-form-members">Email:</label>
                                <input type="email" name="email-form-members" class="form-control" id="email-form-members" required>
                            </div>
                            <div class="form-group">
                                <label for="id-form-members">Eagle ID:</label>
                                <input type="text" name="id-form-members" class="form-control" id="id-form-members" required>
                            </div>
                            <div class="form-group">
                                <label for="fn-form-members">First Name:</label>
                                <input type="text" name="fn-form-members" class="form-control" id="fn-form-members" required>
                            </div>
                            <div class="form-group">
                                <label for="ln-form-members">Last Name:</label>
                                <input type="text" name="ln-form-members" class="form-control" id="ln-form-members" required>
                            </div>
                            <div class="form-group">
                                <label for="sex-form-members">Sex:</label>
                                <select name="sex-form-members" class="form-control" id="sex-form-members" required>
                                    <option disabled selected value> -- Select one -- </option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="class-form-members">Class:</label>
                                <input type="text" name="class-form-members" class="form-control" id="class-form-members" required>
                            </div>
                            <div class="form-group">
                                <label for="school-form-members">School:</label>
                                <select name="school-form-members" class="form-control" id="school-form-members" required>
                                    <option disabled selected value> -- Select one -- </option>
                                    <option value="MCAS">MCAS</option>
                                    <option value="CSOM">CSOM</option>
                                    <option value="LSOE">LSOE</option>
                                    <option value="CSON">CSON</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="major-form-members">Major:</label>
                                <input type="text" name="major-form-members" class="form-control" id="major-form-members" required>
                            </div>
                            <div class="form-group">
                                <label for="minor-form-members">Minor:</label>
                                <input type="text" name="minor-form-members" class="form-control" id="minor-form-members">
                            </div>
                            <div class="form-group">
                                <label for="hometown-form-members">Hometown:</label>
                                <input type="text" name="hometown-form-members" class="form-control" id="hometown-form-members" required>
                            </div>  
                             <div class="form-group">
                                <label for="state-form-members">State (Or Country):</label>
                                <select name="state-form-members" class="form-control" id="state-form-members" required>
                                    <option disabled selected value> -- Select one -- </option>
                                    <option value="AL">AL</option>
                                    <option value="AK">AK</option>
                                    <option value="AZ">AZ</option>
                                    <option value="AR">AR</option>
                                    <option value="CA">CA</option>
                                    <option value="CO">CO</option>
                                    <option value="CT">CT</option>
                                    <option value="DE">DE</option>
                                    <option value="DC">DC</option>
                                    <option value="FL">FL</option>
                                    <option value="GA">GA</option>
                                    <option value="HI">HI</option>
                                    <option value="ID">ID</option>
                                    <option value="IL">IL</option>
                                    <option value="IN">IN</option>
                                    <option value="IA">IA</option>
                                    <option value="KS">KS</option>
                                    <option value="KY">KY</option>
                                    <option value="LA">LA</option>
                                    <option value="ME">ME</option>
                                    <option value="MD">MD</option>
                                    <option value="MA">MA</option>
                                    <option value="MI">MI</option>
                                    <option value="MN">MN</option>
                                    <option value="MS">MS</option>
                                    <option value="MO">MO</option>
                                    <option value="MT">MT</option>
                                    <option value="NE">NE</option>
                                    <option value="NV">NV</option>
                                    <option value="NH">NH</option>
                                    <option value="NJ">NJ</option>
                                    <option value="NM">NM</option>
                                    <option value="NY">NY</option>
                                    <option value="NC">NC</option>
                                    <option value="ND">ND</option>
                                    <option value="OH">OH</option>
                                    <option value="OK">OK</option>
                                    <option value="OR">OR</option>
                                    <option value="PA">PA</option>
                                    <option value="RI">RI</option>
                                    <option value="SC">SC</option>
                                    <option value="SD">SD</option>
                                    <option value="TN">TN</option>
                                    <option value="TX">TX</option>
                                    <option value="UT">UT</option>
                                    <option value="VT">VT</option>
                                    <option value="VA">VA</option>
                                    <option value="WA">WA</option>
                                    <option value="WV">WV</option>
                                    <option value="WI">WI</option>
                                    <option value="WY">WY</option>
                                    <option value="Afganistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bonaire">Bonaire</option>
                                    <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Canary Islands">Canary Islands</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Channel Islands">Channel Islands</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos Island">Cocos Island</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote DIvoire">Cote D'Ivoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Curaco">Curacao</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands">Falkland Islands</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Ter">French Southern Ter</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Great Britain">Great Britain</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Hawaii">Hawaii</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea North">Korea North</option>
                                    <option value="Korea Sout">Korea South</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macau">Macau</option>
                                    <option value="Macedonia">Macedonia</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Midway Islands">Midway Islands</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Nambia">Nambia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                    <option value="Nevis">Nevis</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau Island">Palau Island</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Phillipines">Philippines</option>
                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="St Barthelemy">St Barthelemy</option>
                                    <option value="St Eustatius">St Eustatius</option>
                                    <option value="St Helena">St Helena</option>
                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                    <option value="St Lucia">St Lucia</option>
                                    <option value="St Maarten">St Maarten</option>
                                    <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                                    <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                                    <option value="Saipan">Saipan</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="Samoa American">Samoa American</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Tahiti">Tahiti</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States of America">United States of America</option>
                                    <option value="Uraguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City State">Vatican City State</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                    <option value="Wake Island">Wake Island</option>
                                    <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zaire">Zaire</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                    
                                </select>
                            </div> 
                            <div class="form-group"><strong>International: </strong>
                                <input type="radio" name="international-form-members" value="yes" id="international-yes" required>
                                <label for="international-yes">Yes</label>
                                <input type="radio" name="international-form-members" value="no" id="international-no" required>
                                <label for="international-no">No</label> 
                            </div>
                            <div class="form-group"><strong>AHANA: </strong>
                                <input type="radio" name="ahana-form-members" value="yes" id="ahana-yes" required>
                                <label for="ahana-yes">Yes</label>
                                <input type="radio" name="ahana-form-members" value="no" id="ahana-no" required>
                                <label for="ahana-no">No</label> 
                            </div> 
                            <div class="form-group"><strong>Transfer: </strong>
                                <input type="radio" name="transfer-form-members" value="yes" id="transfer-yes" required>
                                <label for="transfer-yes">Yes</label>
                                <input type="radio" name="transfer-form-members" value="no" id="transfer-no" required>
                                <label for="transfer-no">No</label> 
                            </div>   
                            <div class="form-group">
                                <label for="phone-form-members">Phone Number: (xxx) xxx-xxxx</label>
                                <input type="text" name="phone-form-members" class="form-control" id="phone-form-members" required>
                            </div>   
                            
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
        var s = document.getElementById("table-status");
        var selectedStatus = s.options[s.selectedIndex].value;
        var currentElement;

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
                targets: [3,11,12,13,14,15,16,17,18,19,20,21,22],
                searchable: true,
                visible: false,
            }],
            order: [[1, "asc"], [0, "asc"]],
            paging: false,
        });

        $('#btnRightVols').on("click", function() {
            var selectedOpts = $('#volslstBox1 option:selected');
            if (selectedOpts.length == 0) {
            }
            else {
                for(var i=0; i < selectedOpts.length; i++) {
                    toggleColumns(tableVols, selectedOpts[i].value);
                }
                tableVols.columns().every(function (index) {
                $('#table-volunteers thead tr:eq(1) td:eq(' + index + ') input').on('keyup change', function () {
                    tableVols.column($(this).parent().index() + ':visible')
                        .search(this.value)
                        .draw();
                    } );
                } );
                $('#volslstBox2').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                var my_options = $("#volslstBox2 option");

                my_options.sort(function(a,b) {
                    return a.value - b.value;
                });
                $("#volslstBox2").empty().append(my_options);
            }
        });

        $('#btnLeftVols').on("click", function() {
            var selectedOpts = $('#volslstBox2 option:selected');
            if (selectedOpts.length == 0) {
            }
            else {
                for(var i=0; i < selectedOpts.length; i++) {
                    toggleColumns(tableVols, selectedOpts[i].value);
                }
                tableVols.columns().every(function (index) {
                $('#table-volunteers thead tr:eq(1) td:eq(' + index + ') input').on('keyup change', function () {
                    tableVols.column($(this).parent().index() + ':visible')
                        .search(this.value)
                        .draw();
                    } );
                } );
                $('#volslstBox1').append($(selectedOpts).clone());
                $(selectedOpts).remove();
                var my_options = $("#volslstBox1 option");

                my_options.sort(function(a,b) {
                    return a.value - b.value;
                });
                $("#volslstBox1").empty().append(my_options);
            }
        });
        
        getAllUsers(function(newTable) {
                  newTable.draw();
            }, selectedStatus, tableVols);
     
        // Apply the search
        tableVols.columns().every(function (index) {
        $('#table-volunteers thead tr:eq(1) td:eq(' + index + ') input').on('keyup change', function () {
            tableVols.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
            } );
        } );


        $("#fileMethod").hide();
        $("#manualMethod").hide();


        $('#semester-submit').on("click", function() {
            
            var s = document.getElementById("table-status");
            var selectedStatus = s.options[s.selectedIndex].value;
            
            tableVols.clear();

            getAllUsers(function(newTable) {
                  newTable.draw();
            }, selectedStatus, tableVols);
        });
        
        $('#table-volunteers tbody').on('dblclick', 'td', function(e) {
            if(!<?php 
                if((in_array('Admin', $roles)) || (in_array('Council', $roles)) || (in_array('Advisor', $roles))) {
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
            var orig = valueT;
            var row = tableVols.cell($(this)).index().row;
            var column = tableVols.cell($(this)).index().column;
            var alterable = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,21,22];
            var selectable = [4,6,10,11,12,13,19];
            if(column == 2 || column == 22) {
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
            }
            if(alterable.indexOf(column) == -1) { //can't the other columns
                return;
            }
            var data = tableVols.row(row).data();
            var emailID = data[2];
            var updateField = ['first_name', 'last_name', 'email', 'phone', 'sex', 'class', 'school', 'major', 'minor', 'hometown', 'state_country', 'ahana', 'international', 'transfer', 'local_address', 'applied_tours', 'applied_panels', 'applied_council', 'applied_summer', 'status', 'last_login', 'eagle_id'];
            setTimeout(function() {
                if(column == 4) {
                    $(currentEle).html('<select id="newvalue" class="thVal">' +
                                            '<option value="Male"' + (valueT == "Male" ? 'selected = selected' : '') + '>Male</option>' +
                                            '<option value="Female"' + (valueT == "Female" ? 'selected = selected' : '') + '>Female</option>' +
                                        '</select>');
                }
                else if(column == 0 || column == 1) {
                    
                    valueT = valueT.match(/>[a-z, \s, A-Z, -]*</).toString();
                    valueT = valueT.substring(1, valueT.length-1);
                    $(currentEle).html('<input id="newvalue" class="thVal" type="text" value="' + valueT + '" />');
                }
                else if(column == 6) {
                    $(currentEle).html('<select id="newvalue" class="thVal">' +
                                            '<option value="MCAS"' + (valueT == "MCAS" ? 'selected = selected' : '') + '>MCAS</option>' +
                                            '<option value="CSOM"' + (valueT == "CSOM" ? 'selected = selected' : '') + '>CSOM</option>' +
                                            '<option value="LSOE"' + (valueT == "LSOE" ? 'selected = selected' : '') + '>LSOE</option>' +
                                            '<option value="CSON"' + (valueT == "CSON" ? 'selected = selected' : '') + '>CSON</option>' +
                                        '</select>');
                }
                else if(column == 10) {
                    currentElement = currentEle;
                    $(currentEle).html('<select id="newvalue" class="thVal" name="state" class="stateSelect">' +
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
                                        '</select>');
                }
                else if(column == 11 || column ==12 || column == 13) {
                    $(currentEle).html('<select id="newvalue" class="thVal">' +
                                            '<option value="Yes"' + (valueT == "Yes" ? 'selected = selected' : '') + '>Yes</option>' +
                                            '<option value="No"' + (valueT == "No" ? 'selected = selected' : '') + '>No</option>' +
                                        '</select>');
                }
                else if(column == 22) {
                    $(currentEle).html('<button class="btn btn-primary btn-xs" id="delete-user">Delete User</button>');
                }
                else if(column == 19) {
                    $(currentEle).html('<select id="newvalue" class="thVal">' +
                                            '<option value="Active"' + (valueT == "Active" ? 'selected = selected' : '') + '>Active</option>' +
                                            '<option value="Inactive"' + (valueT == "Inactive" ? 'selected = selected' : '') + '>Inactive</option>' +
                                            '<option value="Abroad/Prac/Clinical"' + (valueT == "Abroad/Prac/Clinical" ? 'selected = selected' : '') + '>Abroad/Prac/Clinical</option>' +
                                            '<option value="Graduated"' + (valueT == "Graduated" ? 'selected = selected' : '') + '>Graduated</option>' +
                                            '<option value="Staff"' + (valueT == "Staff" ? 'selected = selected' : '') + '>Staff</option>' +
                                        '</select>');
                }
                else {
                    $(currentEle).html('<input id="newvalue" class="thVal" type="text" value="' + valueT + '" />');
                }
                $(".thVal").focus();
                if(selectable.indexOf(column) == -1 && column != 22) {
                    var tmp = document.getElementById("newvalue").value;
                    document.getElementById("newvalue").value = '';
                    document.getElementById("newvalue").value = tmp;
                }

                $("#delete-user").on("click", function() {
                    deleteUser(function() {
                        var nameDisplayFN = "";
                        var nameDisplayLN = "";
                        nameDisplayFN = data[0].match(/>[a-z, \s, A-Z, -]*</).toString();
                        nameDisplayFN = nameDisplayFN.substring(1, nameDisplayFN.length-1);
                        nameDisplayLN = data[1].match(/>[a-z, \s, A-Z, -]*</).toString();
                        nameDisplayLN = nameDisplayLN.substring(1, nameDisplayLN.length-1);
                        alert(nameDisplayFN + " " + nameDisplayLN + " has been deleted");
                        location.reload();
                    }, data[2]);
                });

                $(".thVal").keydown(function (event) {
                    if(column == 22) {
                        return ;
                    }
                    if (event.keyCode == 13) {
                        if(selectable.indexOf(column) == -1) {
                            if(verifyData(updateField[column], document.getElementById("newvalue").value.trim())) {
                                data[column] =  document.getElementById("newvalue").value.trim();
                            }
                            else {
                                return;
                            }
                        }
                        else {
                            data[column] =  $('#newvalue option:selected').val().trim();
                        }     
                        tableVols.row(row).remove();
                        inLineUpdatePostData(function() {
                            tableVols.row.add([
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
                                data[10],
                                data[11],
                                data[12],
                                data[13],
                                data[14],
                                data[15],
                                data[16],
                                data[17],
                                data[18],
                                data[19],
                                data[20],
                                data[21],
                                data[22]
                            ]).draw()
                        }, emailID, updateField[column], 'Users', data[column], 'email');
                    }
                });
            },150);
            $('tbody td').not(currentEle).on('click', function() {
                if(column == 0 || column == 1) {
                    valueT = orig;
                }
                $(currentEle).html(valueT);
            });
            $(currentEle).on("dblclick", function() {
                if(column == 0 || column == 1) {
                    valueT = orig;
                }
                $(currentEle).html(valueT);
            });  
        });

        $("#addMembersFormManual").on("submit", function(e) {
            var email = document.getElementById("email-form-members").value.trim();
            var id = document.getElementById("id-form-members").value.trim();
            var fn = document.getElementById("fn-form-members").value.trim();
            var ln = document.getElementById("ln-form-members").value.trim();
            var a = document.getElementById("sex-form-members");
            var sex = a.options[a.selectedIndex].value;
            var b = document.getElementById("school-form-members");
            var school = b.options[b.selectedIndex].value;
            var year = document.getElementById("class-form-members").value.trim();
            var major = document.getElementById("major-form-members").value.trim();
            var minor = document.getElementById("minor-form-members").value.trim();
            var hometown = document.getElementById("hometown-form-members").value.trim();
            var c = document.getElementById("state-form-members");
            var state = c.options[c.selectedIndex].value;
            var international = 'Yes';
            if(document.getElementById("international-no").checked) {
                international = 'No';
            }
            var ahana = 'Yes';
            if(document.getElementById("ahana-no").checked) {
                ahana = 'No';
            }
            var transfer = 'Yes';
            if(document.getElementById("transfer-no").checked) {
                transfer = 'No';
            }
            var phone = document.getElementById("phone-form-members").value.trim();
            insertUserManual(function() {
                location.reload();
            }, email, id, fn, ln, sex, year, school, major, minor, hometown, state, international, ahana, transfer, phone);
            e.preventDefault();
        });
        

        $("#fileMethodButton").on("click", function() {
            $("#fileMethod").show();
            $("#manualMethod").hide();
            $("#file-form").prop('required', true);
            $("#test-form").prop('required', false);
        });

        $("#manualMethodButton").on("click", function() {
            $("#manualMethod").show();
            $("#fileMethod").hide();
            $("#test-form").prop('required', true);
            $("#file-form").prop('required', false);
        });

        $(".lstButton").on("click", function(e) {
            e.preventDefault();
        });

        //access to certain parts of page
        if(!<?php 
                if((in_array('Admin', $roles)) || (in_array('Council', $roles)) || (in_array('Advisor', $roles))) {
                    echo "true";
                }
                else {
                    echo "false";
                } 
                ?>) {
                $("#edit-members-modal-button").hide();
                $("#new-members-modal-button").hide();
            }
    });
    </script>

</body>

</html>
