<?php
	
	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';

	$semester = $_POST['semester'];
	$year = $_POST['year'];

	$items = $fns->getWeeks($semester, $year);
	
	echo json_encode($items);
	$db = null;

?>