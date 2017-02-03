<?php

	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	require './helpers/pageProtectInclude.php';

	$week = $_POST['week'];

	$fns->deleteNumbersForWeek($week);

	$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
	$times = [['10:00 AM', 'Panel'], ['11:00 AM', 'Tour'], ['12:00 PM', 'Panel'], ['1:00 PM', 'Tour'], ['2:00 PM', 'Panel'], ['3:00 PM', 'Tour']];

	foreach($days as $day) {
		foreach($times as $time) {
			$fns->insertNewNumbersDefault($week, $day, $time[0], $time[1]);
		}
		
	}
	
	$db = null;
?>