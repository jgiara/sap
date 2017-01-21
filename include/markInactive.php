<?php

	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	require './helpers/pageProtectInclude.php';

	$semester = $_POST['semester'];
	$year = $_POST['year'];

	$fns->markInactive($year, $semester);

	$db = null;
?>