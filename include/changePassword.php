<?php

	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';

	$emails = $_POST['emails'];
	$password = $_POST['password'];

	foreach($emails as $email) {
		$name = $fns->getName($email);
		$fns->changePassword($email, $password, $name[0], $name[1]);
	}
	
	$db = null;
?>