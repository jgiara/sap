<?php
	
	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	require './helpers/pageProtectInclude.php';

	$week = $_POST['week'];
		
	$items = $fns->getNumbersData($week);
	
	echo json_encode($items);
	$db = null;

?>