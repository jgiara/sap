<?php

	require_once '../../resources/initTableFunctions.php';

	$email = $_GET['email'];
		
	$items = $fns->getName($email);
	
	echo json_encode($items);
	$db = null;

?>