<?php
	
		ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	require './helpers/pageProtectInclude.php';

		$week = $_POST['week'];
		$year = $_POST['year'];
		$semester = $_POST['semester'];
		$sun = $_POST['sun'];
		$mon = $_POST['mon'];
		$tues = $_POST['tues'];
		$wed = $_POST['wed'];
		$thurs = $_POST['thurs'];
		$fri = $_POST['fri'];
		$sat = $_POST['sat'];

		$fns->insertProgrammingWeek($week, $year, $semester, $sun, $mon, $tues, $wed, $thurs, $fri, $sat);

		$db = null;
?>