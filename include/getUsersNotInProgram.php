<?php

	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	require './helpers/pageProtectInclude.php';

	$programName = $_POST['program'];
	$semester = $_POST['semester'];
	$year = $_POST['year'];
		
	$items = $fns->getUsersNotInProgram($programName, $semester, $year);
	
	echo json_encode($items);
	$db = null;

?>