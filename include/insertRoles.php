<?php

	require_once '../resources/initTableFunctions.php';

	$emails = $_POST['emails'];
	$role = $_POST['role'];

	foreach($emails as $email) {
		$fns->insertRoles($email, $role);
	}
	
	$db = null;
?>