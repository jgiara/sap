<?php

	require_once '../../resources/initTableFunctions.php';

	$program = $_POST['program'];
	$semester = $_POST['semester'];
	$year = $_POST['year'];
	$week = $_POST['week'];

	$fns->deleteShiftsForWeek($program, $semester, $year, $week);

	$shifts = $fns->getAssignedShiftsForProgram($program, $semester, $year); //email, day, time

	foreach($shifts as $shift) {
		$fns->insertAutoShifts($shift[0], $program, $semester, $year, $week, $shift[1], $shift[2]);
	}
	
	$db = null;
?>