<?php
	
	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	require './helpers/pageProtectInclude.php';

	$program = $_POST['program'];
	$semester = $_POST['semester'];
	$year = $_POST['year'];
	$week = $_POST['week'];
	$day = $_POST['day'];

	$day = '%'.$day;
	
	$items = $fns->getProgramAttendance($program, $semester, $year, $week, $day);
	
	echo json_encode($items);
	$db = null;

?>