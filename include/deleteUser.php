<?php

	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	require './helpers/pageProtectInclude.php';

	$user = $_POST['user'];

	$fns->deleteUser($user);
	$fns->deleteRolesByEmail($user);

	$db = null;
?>