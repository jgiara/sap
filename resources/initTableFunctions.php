<?php 

$highestRole = '';
if(isset($_SESSION['Roles'])) {
	$roles = $_SESSION['Roles'];
	if(in_array('Admin', $roles)) {
		$highestRole = 'Admin';
	}
	else if(in_array('Council', $roles)) {
		$highestRole = 'Council';
	}
	else if(in_array('Advisor', $roles)) {
		$highestRole = 'Advisor';
	}
	else if(in_array('Staff', $roles)) {
		$highestRole = 'Staff';
	}
	else {
		$highestRole = 'Volunteer';
	}
}
else {
	$highestRole = 'None';
}
switch($highestRole) {
	case 'None': {
		require_once 'connect/database0.php';
	} break;
	case 'Volunteer': {
		require_once 'connect/database1.php';
	} break;
	case 'Staff': {
		require_once 'connect/database2.php';
	} break;
	case 'Advisor': {
		require_once 'connect/database3.php';
	} break;
	case 'Council': {
		require_once 'connect/database4.php';
	} break;
	case 'Admin': {
		require_once 'connect/database5.php';
	} break;
	default: {
		require_once 'connect/database0.php';
	} break;
}

require_once 'classes/tableFunctions.php';

$fns = new TableFunctions($db);

$errors = array();

?>