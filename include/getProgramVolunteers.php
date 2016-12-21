<?php

	$program = $_GET['program'];
	$semester = $_GET['semester'];
	$year = $_GET['year'];

	$dbc = @mysqli_connect("localhost", "root", "root", "SAP")
	    or die("Could not open SAP db, " . mysqli_connect_error());
	$query = "select * from Program_Members, Users, Programs where user=eagle_id and program=program_id and program_name='$program' and semester='$semester' and year='$year'";			
	$result = mysqli_query($dbc, $query) or die ("Error in Select" . mysqli_error($dbc));
		
	$items = array();	// put the rows as objects in an array
	while ( $row = mysqli_fetch_assoc( $result ) ) {
		$items[] = $row;
	}
	echo json_encode($items);
	mysqli_close($dbc);

?>