<?php

	require_once '../../resources/initTableFunctions.php';

	$programName = $_GET['program'];
	$semester = $_GET['semester'];
	$year = $_GET['year'];
		
	$items = $fns->getUsersInProgramForShifts($programName, $semester, $year);
	
	echo json_encode($items);
	$db = null;

?>