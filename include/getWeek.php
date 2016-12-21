<?php

	$semester = $_GET['semester'];
	$year = $_GET['year'];

	$dbc = @mysqli_connect("localhost", "root", "root", "SAP")
	    or die("Could not open SAP db, " . mysqli_connect_error());
	$query = "select * from Programming_Weeks where semester='$semester' and year='$year' order by week_number desc";			
	$result = mysqli_query($dbc, $query) or die ("Error in Select" . mysqli_error($dbc));
		
	$items = array();	// put the rows as objects in an array
	while ( $row = mysqli_fetch_assoc( $result ) ) {
		$items[] = $row;
	}
	echo json_encode($items);
	mysqli_close($dbc);

?>