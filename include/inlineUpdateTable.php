<?php
	require_once '../../resources/initTableFunctions.php';

	$id = $_POST['id'];
	$field = $_POST['field'];
	$table = $_POST['table'];
	$newValue = $_POST['newValue'];
	$whereField = $_POST['whereField'];

	$items = $fns->inlineUpdate($id, $field, $table, $newValue, $whereField);

	echo json_encode($items);
	$db = null;
?>
?>