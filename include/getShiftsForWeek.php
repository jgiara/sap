<?php

	require_once '../resources/initTableFunctions.php';

	$programName = $_GET['program'];
	$semester = $_GET['semester'];
	$year = $_GET['year'];
	$week = $_GET['week'];
	$day = $_GET['day'];
		
	$items = $fns->getShiftsForWeek($programName, $semester, $year, $week, $day);
	
	echo json_encode($items);
	$db = null;

?>