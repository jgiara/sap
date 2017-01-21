<?php

	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	require './helpers/pageProtectInclude.php';

	$emails = $_POST['emails'];
	$program = $_POST['program'];
	$semester = $_POST['semester'];
	$year = $_POST['year'];
	$week = $_POST['week'];
	$day = $_POST['day'];
	$time = $_POST['time'];
	$notes = $_POST['notes'];

	foreach($emails as $email) {
		$fns->insertManualShifts($email, $program, $semester, $year, $week, $day, $time, $notes);
	}
	
	$db = null;
?>