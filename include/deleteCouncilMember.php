<?php

	require_once '../../resources/initTableFunctions.php';

	$id = $_POST['id'];

	$fns->deleteCouncilMember($id);

	$db = null;
?>