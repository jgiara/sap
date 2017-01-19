<?php

	require_once '../resources/initTableFunctions.php';
		
	$items = $fns->getAllRoles();
	
	echo json_encode($items);
	$db = null;

?>