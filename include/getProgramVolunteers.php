<?php
	
	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	require './helpers/pageProtectInclude.php';

	$program = $_POST['program'];
	$semester = $_POST['semester'];
	$year = $_POST['year'];
		
	$items = $fns->getProgramVolunteers($program, $semester, $year);
	
	echo json_encode($items);
	$db = null;

?>