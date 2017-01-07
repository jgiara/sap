<?php
	
	require_once '../../resources/initTableFunctions.php';

	$program = $_GET['program'];
	$semester = $_GET['semester'];
	$year = $_GET['year'];
		
	$items = $fns->getProgramVolunteers($program, $semester, $year);
	
	echo json_encode($items);
	$db = null;

?>