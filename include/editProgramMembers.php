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
				//$fns->insertAudit('Program_Members', $field, 'DELETED', $_SESSION['Email'], $id);
			}
	}
	else {
		foreach($ids as $id) {
				$fns->editProgramMembers($id, $field, $newValue);
				//$fns->insertAudit('Program_Members', $field, $newValue, $_SESSION['Email'], $id);
			}
	}

	$db = null;
?>