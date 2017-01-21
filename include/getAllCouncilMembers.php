<?php

	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	
	$year = $_POST['year'];
	$semester = $_POST['semester'];

	$items = $fns->getCoordinatorsForYear($year, $semester);
	
	echo json_encode($items);
	$db = null;

?>