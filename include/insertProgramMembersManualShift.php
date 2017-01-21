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

	foreach($emails as $email) {
		$fns->insertProgramMemberShift($email, $program, $semester, $year, $day, $time);
		$fns->updateUserStatus($email, 'Active');
	}
	
	$db = null;
?>