<?php

	require_once '../../resources/initTableFunctions.php';

	$user = $_POST['user'];

	$fns->deleteUser($user);

	$db = null;
?>