<?php
	if(!(in_array('Council', $roles)) && !(in_array('Admin', $roles)) && !(in_array('Advisor', $roles))) {
	    header('Location: ./dashboard.php');
	    exit();
	}
?>