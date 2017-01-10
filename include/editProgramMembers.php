<?php

	require_once '../../resources/initTableFunctions.php';

	$emails = $_POST['emails'];
	$program = $_POST['program'];
	$semester = $_POST['semester'];
	$year = $_POST['year'];
	$field = $_POST['field'];
	$newValue = $_POST['newValue'];

	if($field == 'delete') {
		foreach($emails as $email) {
				$id = $fns->getProgramMemberID($email, $program, $semester, $year);
				$fns->deleteProgramMembers($id);
			}
	}
	else {
		foreach($emails as $email) {
				$id = $fns->getProgramMemberID($email, $program, $semester, $year);	
				$fns->editProgramMembers($id, $field, $newValue);
			}
	}

	$db = null;
?>