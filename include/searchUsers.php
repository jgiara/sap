<?php

	require_once '../../resources/initTableFunctions.php';

	$search = $_GET['searchVals'];
	
	$results = [];
	foreach ($search as $val) {
		if($val != '') {
			array_push($results, $fns->searchUsers($val));
		} 
	}

	$items = [];
	$emails = [];
	foreach($results as $item) {
		foreach($item as $row) {
			if(!(in_array($row['email'], $emails))) {
				array_push($items, $row);
				array_push($emails, $row['email']);
			}
		}
	}
	

	
	echo json_encode($items);
	$db = null;

?>