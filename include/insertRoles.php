<?php

	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	require './helpers/pageProtectInclude.php';

	$emails = $_POST['emails'];
	$role = $_POST['role'];

	foreach($emails as $email) {
		$fns->insertRoles($email, $role);
	}
	
	$db = null;
?>