<?php

	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	require './helpers/pageProtectInclude.php';
		
	$items = $fns->getAllPossibleUsers();
	
	echo json_encode($items);
	$db = null;

?>