<?php

	require_once '../../resources/initTableFunctions.php';

	$active = $_GET['active'];
		
	$items = $fns->getAllUsers($active);
	
	echo json_encode($items);
	$db = null;

?>