<?php
	ini_set("auto_detect_line_endings", "1");
	require_once '../../resources/initTableFunctions.php';

	$program = $_POST['program-form-members-file'];
	$semester = $_POST['semester-form-members-file'];
	$year = $_POST['year-form-members-file'];

	//echo "<script type='text/javascript'>alert('$program');</script>"

	$target_dir = "../../resources/uploads/";
	$target_file = $target_dir . basename($_FILES["file-form"]["name"]);
	$uploadOk = 1;
	$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$errors = [];
	
	if(isset($_POST["addMembersFormSubmitFile"])) {
	    if($fileType != "csv") {
	    	$uploadOk = 0;
	    }
	}
	if ($uploadOk == 0) {
	    echo "<script type='text/javascript'>alert('Only .csv file formats are accepted');</script>";
	} 
	else {
	    if (move_uploaded_file($_FILES["file-form"]["tmp_name"], $target_dir . 'dataFile.csv')) {
	    	$file = fopen("../../resources/uploads/dataFile.csv","r");
	    	$headers = fgetcsv($file);
	    	$emails = $fns->getAllEmails();
			while(!($end = feof($file))) {
				$a = fgetcsv($file);
				$email = (string) $a[0];
				if(in_array(strtolower($email), $emails))
					$fns->insertProgramMemberFile(strtolower($email), $program, $semester, $year, $a[1], $a[2]);
				else
					array_push($errors, $a[0]);
			}
			fclose($file);
	    } 
	    else {
	        echo "<script type='text/javascript'>alert('There has been an error uploading your file');</script>";
	    }
	}

	switch($program) {
		case 'Panels' : { 
			if(sizeof($errors) > 0) {
				$str = '';
				foreach($errors as $er) {
			 		$str = $str . $er . '\n';
			 	}
			 	$str = '\n' . $str;
				echo "<script type='text/javascript'>alert('The following were not added because they did not already exist in the database:".
			 		$str . "');</script>";
			}
			echo "<script type='text/javascript'>window.location.assign('../pages/panels.php');</script>";
		} break;
		default :  {
			echo "<script type='text/javascript'>window.location.assign('../pages/panels.php');</script>";
		}
	}
	$db = null;
?>