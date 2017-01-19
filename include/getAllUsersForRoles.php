<?php

	require_once '../resources/initTableFunctions.php';
		
	$items = $fns->getAllUsersForRoles();
	
	echo json_encode($items);
	$db = null;

?>