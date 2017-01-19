<?php

	require_once '../../resources/initTableFunctions.php';

	$email = $_GET['email'];
		
	$items = $fns->getInvolvementData($email);
	
	echo json_encode($items);
	$db = null;

?>