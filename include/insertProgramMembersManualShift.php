<?php

	require_once '../../resources/initTableFunctions.php';

	$emails = $_POST['emails'];
	$program = $_POST['program'];
	$semester = $_POST['semester'];
	$year = $_POST['year'];
	$day = $_POST['day'];
	$time = $_POST['time'];

	foreach($emails as $email) {
		$fns->insertProgramMemberShift($email, $program, $semester, $year, $day, $time);
	}
	
	$db = null;
?>