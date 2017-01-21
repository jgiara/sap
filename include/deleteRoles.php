<?php

	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	require './helpers/pageProtectInclude.php';

	$ids = $_POST['ids'];

	foreach($ids as $id) {
			$fns->deleteRoles($id);
		}

	$db = null;
?>