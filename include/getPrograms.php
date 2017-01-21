<?php
	
	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	require './helpers/pageProtectInclude.php';

	$semester = $_POST['semester'];
	$year = $_POST['year'];
		
	$items = $fns->getPrograms($semester, $year);
	
	echo json_encode($items);
	$db = null;

?>