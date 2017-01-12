<?php
	if(!(in_array('Admin', $roles)) && !(in_array('Advisor', $roles))) {
	    header('Location: ./dashboard.php');
	    exit();
	}
?>