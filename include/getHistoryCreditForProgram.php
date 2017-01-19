<?php

	require_once '../resources/initTableFunctions.php';
	
	$user = $_GET['user'];
	$year = $_GET['year'];

	$data = [[ 0,0,0 ],[ 0,0,0 ],[ 0,0,0 ],[ 0,0,0 ],[ 0,0,0 ],[ 0,0,0 ],[ 0,0,0 ],[ 0,0,0 ],[ 0,0,0 ],[ 0,0,0 ],[ 0,0,0 ],[ 0,0,0 ]];
	$programs = ['Panels', 'Tours', 'Greeting', 'Office Management', 'Eagle for a Day', 'Admitted Eagle Day', 'Outreach', 'High School Visits', 'AHANA Outreach', 'International Outreach', 'Transfer Outreach', 'Media'];

	for($i = 0; $i < 12; $i++) {
		$items = $fns->getHistoryCreditForProgram($programs[$i], $user);
		foreach ($items as $item) {
			if($item[1] == 'Complete') {
				$data[$i][0] = $item[0];
			}
			else if($item[1] == 'Pending') {
				$data[$i][1] = $item[0];
			}
			else if($item[1] == 'Incomplete') {
				$data[$i][2] = $item[0];
			}
		}
	}

	if(intval($year) < 2020) {
		$history = $fns->getCreditHistory($user);
		for($i = 0; $i < 12; $i++) {
			$data[$i][0] = $data[$i][0] + $history[$i];
		}
	}
	
	echo json_encode($data);
	$db = null;

?>