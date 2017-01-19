<?php

	require_once '../resources/initTableFunctions.php';

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