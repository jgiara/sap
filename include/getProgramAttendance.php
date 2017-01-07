<?php
	
	require_once '../../resources/initTableFunctions.php';

	$program = $_GET['program'];
	$semester = $_GET['semester'];
	$year = $_GET['year'];
	$week = $_GET['week'];
	$day = $_GET['day'];

	$day = '%'.$day;
	
	$items = $fns->getProgramAttendance($program, $semester, $year, $week, $day);
	
	echo json_encode($items);
	$db = null;

?>