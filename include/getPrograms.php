<?php
	
	require_once '../../resources/initTableFunctions.php';

	$semester = $_GET['semester'];
	$year = $_GET['year'];
		
	$items = $fns->getPrograms($semester, $year);
	
	echo json_encode($items);
	$db = null;

?>