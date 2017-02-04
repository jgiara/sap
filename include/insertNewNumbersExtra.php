<?php

	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	require './helpers/pageProtectInclude.php';

	$week = $_POST['week'];
	$day = $_POST['day'];
	$session = $_POST['session'];
	$time = $_POST['time'];
	$location = $_POST['location'];
	$notes = $_POST['notes'];
	$numbers = $_POST['numbers'];

	$fns->insertNewNumbersExtra($week, $day, $session, $time, $location, $notes, $numbers);
	
	$db = null;
?>