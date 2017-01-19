<?php

	require_once '../resources/initTableFunctions.php';

	$status = $_GET['status'];
		
	$items = $fns->getAllUsers($status);
	
	echo json_encode($items);
	$db = null;

?>