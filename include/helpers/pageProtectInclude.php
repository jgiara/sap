<?php
	if(!(in_array('Council', $roles)) && !(in_array('Staff', $roles)) && !(in_array('Advisor', $roles)) && !(in_array('Admin', $roles))) {
	    header('Location: ../pages/dashboard.php');
	    exit();
	}
?>