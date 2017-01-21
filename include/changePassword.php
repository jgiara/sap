<?php

	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';

	$emails = $_POST['emails'];
	$password = $_POST['password'];

	foreach($emails as $email) {
		$fns->changePassword($email, $password);
	}
	
	$db = null;
?>