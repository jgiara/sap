<?php

	require_once '../../resources/initTableFunctions.php';

	$year = $_POST['year'];

	$fns->markGraduated($year);

	$db = null;
?>