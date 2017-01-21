<?php

	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	require './helpers/pageProtectInclude.php';

	$emails = $_POST['emails'];
	$semester = $_POST['semester'];
	$year = $_POST['year'];
	$position = $_POST['position'];

	foreach($emails as $email) {
		$fns->insertCouncilMember($email, $semester, $year, $position);
	}
	
	$db = null;
?>