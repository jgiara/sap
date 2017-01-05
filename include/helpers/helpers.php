<?php
    function displayDropdownNav($fn, $ln) {
        echo "<li class='dropdown'>
            <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                $fn $ln  <i class='fa fa-caret-down'></i>
            </a>
            <ul class='dropdown-menu dropdown-user'>
                <li><a href='#'><i class='fa fa-user fa-fw'></i> User Profile</a>
                </li>
                <li><a href='#'><i class='fa fa-gear fa-fw'></i> Settings</a>
                </li>
                <li class='divider'></li>
                <li><a href='../logout.php'><i class='fa fa-sign-out fa-fw'></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->";
    }

	function displayModules($roles) {
		echo "<li class='sidebar-search'>
                <div class='input-group custom-search-form'>
                    <input type='text' class='form-control' placeholder='Search...''>
                    <span class='input-group-btn'>
                    <button class='btn btn-default' type='button'>
                         <i class='fa fa-search'></i>&nbsp
                    </button>
                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
             	<a href='./dashboard.php'>Dashboard</a>
            </li>
            <li>
                <a href='./involvement.php'>My Involvement</a>
            </li>
            <li>
                <a href='./profile.php'>My Profile</a>
            </li>
            <li>
                <a href='./applications.php'>Applications</a>
            </li>";
            displayHigherAccessModules($roles);
	}

	function displayHigherAccessModules($roles) {
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
                    <a href='./reports.php'>Reports</a>
                </li>";
                if((in_array('Council', $roles)) || (in_array('Admin', $roles))) {
                  echo  "<li>
                        <a href='#' data-toggle='collapse' data-target='#submenu'>Administration<span class='fa arrow'></span></a>
                        <ul class='nav nav-second-level collapse' id='submenu'>
                            <li>
                                <a href='./weeks.php'>Weeks</a>
                            </li>
                            <li>
                                <a href='./roles.php'>Roles</a>
                            </li>
                            <li>
                                <a href='./passwordReset.php'>Reset User Password</a>
                            </li>
                            <li>
                                <a href='./programs.php'>Programs</a>
                            </li>
                            <li>
                                <a href='./programs.php'>Change Class Status</a>
                            </li>

                        </ul>
                    </li>";     
                }    
        }
	}
?>