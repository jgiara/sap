<?php

	require_once '../resources/initTableFunctions.php';
		
	$items = $fns->getRoles();
	
	echo json_encode($items);
	$db = null;

?>