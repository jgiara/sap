<?php

		$eagleid = $_POST['id'];
		$field = $_POST['field'];
		$table = $_POST['table'];
		$newValue = $_POST['newValue'];
		$whereField = $_POST['whereField'];


		$dbc = @mysqli_connect("localhost", "root", "root", "SAP")
	       or die("Could not open db SAP, " . mysqli_connect_error());
		$query = "Update $table set $field = '$newValue' where $whereField = '$eagleid'";				
		
		
		if(mysqli_query($dbc, $query)) {
			$result = true;
		}
		else {
			$result = false;
		}
		//Add row to audit table - or add a stored procedure?
	
		$data_from_post = array('update' => $field);
		echo json_encode($result);
		mysqli_close($dbc);
?>
?>