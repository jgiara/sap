<?php

	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	require './helpers/pageProtectInclude.php';

	$ids = $_POST['ids'];
	$program = $_POST['program'];
	$field = $_POST['field'];
	$newValue = $_POST['newValue'];

	if($field == 'delete') {
		foreach($ids as $id) {
				$fns->deleteShifts($id);
			}
	}
	else {
		foreach($ids as $id) {
				$fns->editShifts($id, $field, $newValue);
			}
	}

	$db = null;
?>