<?php

	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	require './helpers/pageProtectInclude.php';

	$emails = $_POST['emails'];
	$program = $_POST['program'];
	$semester = $_POST['semester'];
	$year = $_POST['year'];
	$day = $_POST['day'];
	$time = $_POST['time'];
	$weekColor = $_POST['weekColor'];

	foreach($emails as $email) {
		$fns->insertProgramMemberShiftGreeting($email, $program, $semester, $year, $day, $time, $weekColor);
		$fns->updateUserStatus($email, 'Active');
	}
	
	$db = null;
?>