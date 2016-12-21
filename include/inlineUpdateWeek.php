<?php

		$week_id = $_POST['id'];
		$field = $_POST['field'];
		$newValue = $_POST['newValue'];


		$dbc = @mysqli_connect("localhost", "root", "root", "SAP")
	       or die("Could not open db SAP, " . mysqli_connect_error());
		$query = "Update Programming_Weeks set $field = '$newValue' where week_id = '$week_id'";				
		
		
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