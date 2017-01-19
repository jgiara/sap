<?php

	require_once '../resources/initTableFunctions.php';

	$user = $_POST['user'];

	$fns->deleteUser($user);
	$fns->deleteRolesByEmail($user);

	$db = null;
?>