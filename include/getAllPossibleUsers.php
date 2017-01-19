<?php

	require_once '../resources/initTableFunctions.php';
		
	$items = $fns->getAllPossibleUsers();
	
	echo json_encode($items);
	$db = null;

?>