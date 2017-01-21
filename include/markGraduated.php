<?php

	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	require './helpers/pageProtectInclude.php';

	$year = $_POST['year'];

	$fns->markGraduated($year);

	$db = null;
?>