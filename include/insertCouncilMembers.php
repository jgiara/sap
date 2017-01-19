<?php

	require_once '../resources/initTableFunctions.php';

	$emails = $_POST['emails'];
	$semester = $_POST['semester'];
	$year = $_POST['year'];
	$position = $_POST['position'];

	foreach($emails as $email) {
		$fns->insertCouncilMember($email, $semester, $year, $position);
	}
	
	$db = null;
?>