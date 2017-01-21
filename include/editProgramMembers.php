<?php

	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	require './helpers/pageProtectInclude.php';

	$ids = $_POST['ids'];
	$field = $_POST['field'];
	$newValue = $_POST['newValue'];

	if($field == 'delete') {
		foreach($ids as $id) {
				$fns->deleteProgramMembers($id);
			}
	}
	else {
		foreach($ids as $id) {
				$fns->editProgramMembers($id, $field, $newValue);
			}
	}

	$db = null;
?>