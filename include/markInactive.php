<?php

	require_once '../resources/initTableFunctions.php';

	$semester = $_POST['semester'];
	$year = $_POST['year'];

	$fns->markInactive($year, $semester);

	$db = null;
?>