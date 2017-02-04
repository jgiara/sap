<?php
	
	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';

	$week = $_POST['week'];
		
	$items = $fns->getNumbersData($week);
	
	echo json_encode($items);
	$db = null;

?>