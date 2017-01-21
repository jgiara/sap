<?php

	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	require './helpers/pageProtectInclude.php';

	$program = $_POST['program'];
	$semester = $_POST['semester'];
	$year = $_POST['year'];
	$coordinator = $_POST['coordinator'];

	$fns->insertProgram($program, $semester, $year, $coordinator);
	$fns->insertProgramMemberCoordinator($coordinator, $program, $semester, $year);

	$db = null;
?>