<?php

	require_once '../resources/initTableFunctions.php';
	
	$year = $_GET['year'];
	$semester = $_GET['semester'];

	$items = $fns->getCoordinatorsForYear($year, $semester);
	
	echo json_encode($items);
	$db = null;

?>