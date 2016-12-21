<?php
		$week = $_POST['week'];
		$year = $_POST['year'];
		$semester = $_POST['semester'];
		$sun = $_POST['sun'];
		$mon = $_POST['mon'];
		$tues = $_POST['tues'];
		$wed = $_POST['wed'];
		$thurs = $_POST['thurs'];
		$fri = $_POST['fri'];
		$sat = $_POST['sat'];


		$dbc = @mysqli_connect("localhost", "root", "root", "SAP")
	       or die("Could not open db SAP, " . mysqli_connect_error());
		$query = "insert into Programming_Weeks (week_number, year, semester, sunday_date, monday_date, tuesday_date, wednesday_date, thursday_date, friday_date, saturday_date) values ('$week', '$year', '$semester', '$sun', '$mon', '$tues', '$wed', '$thurs', '$fri', '$sat')";				
		
		
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