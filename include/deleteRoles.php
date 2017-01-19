<?php

	require_once '../resources/initTableFunctions.php';

	$ids = $_POST['ids'];

	foreach($ids as $id) {
			$fns->deleteRoles($id);
		}

	$db = null;
?>