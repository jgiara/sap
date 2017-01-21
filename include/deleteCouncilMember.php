<?php
	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	require './helpers/pageProtectInclude.php';

	$id = $_POST['id'];

	$fns->deleteCouncilMember($id);

	$db = null;
?>