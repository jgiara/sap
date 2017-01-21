<?php

	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	require './helpers/pageProtectInclude.php';

	$program = $_POST['program'];
	$semester = $_POST['semester'];
	$year = $_POST['year'];
	$week = $_POST['week'];
	$weekColor = $_POST['weekColor'];

	$fns->deleteShiftsForWeek($program, $semester, $year, $week);

	$shifts = $fns->getAssignedShiftsForProgramGreeting($program, $semester, $year, $weekColor); //email, day, time

	foreach($shifts as $shift) {
		$fns->insertAutoShiftsGreeting($shift[0], $program, $semester, $year, $week, $shift[1], $shift[2], $weekColor);
	}
	
	$db = null;
?>