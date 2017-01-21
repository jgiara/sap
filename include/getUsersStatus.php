<?php

	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	require './helpers/pageProtectInclude.php';

	$status = $_POST['status'];
		
	$items = $fns->getAllUsers($status);
	
	echo json_encode($items);
	$db = null;

?>