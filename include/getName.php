<?php

	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';

	$email = $_POST['email'];
		
	$items = $fns->getName($email);
	
	echo json_encode($items);
	$db = null;

?>