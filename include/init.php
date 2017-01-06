<?php 
require_once 'classes/general.php';

$general = new General();
$highestRole = '';
if($general->logged_in()) {
	$roles = $_SESSION['Roles'];
	echo "LOGGED IN";
	if(in_array('Admin', $roles)) {
		$highestRole = 'Admin';
		echo "Admin";
	}
	else if(in_array('Council', $roles)) {
		$highestRole = 'Council';
		echo "Council";
	}
	else if(in_array('Advisor', $roles)) {
		$highestRole = 'Advisor';
		echo "Advisor";
	}
	else if(in_array('Staff', $roles)) {
		$highestRole = 'Staff';
		echo "Staf";
	}
	else {
		$highestRole = 'Volunteer';
		echo "Volunteers";
	}
}
else {
	$highestRole = 'None';
	echo "NOT LOGGED IN";
}
switch($highestRole) {
	case 'None': {
		require_once 'connect/database0.php';
		//header("Location: www.google.com");
	} break;
	case 'Volunteer': {
		require_once 'connect/database1.php';
		//header("Location: https://www.gmail.com");
	} break;
	case 'Staff': {
		require_once 'connect/database2.php';
		header("Location: www.facebook.com");
	} break;
	case 'Advisor': {
		require_once 'connect/database3.php';
		header("Location: www.cnn.com");
	} break;
	case 'Council': {
		require_once 'connect/database4.php';
		header("Location: www.boston.com");
	} break;
	case 'Admin': {
		require_once 'connect/database5.php';
		header("Location: https://www.facebook.com");
	} break;
	default: {
		require_once 'connect/database0.php';
		header("Location: www.bc.edu");
	} break;
}

require_once 'classes/users.php';

$users = new Users($db);

$errors = array();

?>