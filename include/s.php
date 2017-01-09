<?php
	ini_set("auto_detect_line_endings", "1");
	require_once '../../resources/initTableFunctions.php';

	$program = $_POST['program-form-members-file'];
	$semester = $_POST['semester-form-members-file'];
	$year = $_POST['year-form-members-file'];

	$target_dir = "../../resources/uploads/";
	$target_file = $target_dir . basename($_FILES["file-form"]["name"]);
	$uploadOk = 1;
	$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$errors = [];
	echo "<script type='text/javascript'>alert('-3');</script>";
	//$errors['email'] = [];
	echo "<script type='text/javascript'>alert('-2');</script>";
	//$errors['day'] = [];
	echo "<script type='text/javascript'>alert('-1');</script>";
	//$errors['time'] = [];
	echo "<script type='text/javascript'>alert('0');</script>";
	//$timePattern = '/\b[1-9][0-2]?:[0-5][0-9] AM\b|\b[1-9][0-2]?:[0-5][0-9] PM\b/';
	$days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
	
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
				//$email = strtolower((string) $a[0]);
				echo "<script type='text/javascript'>alert('1');</script>";
				if(!in_array($email, $emails)) {
					array_push($errors['email'], $a[0]);
				}
				echo "<script type='text/javascript'>alert('2');</script>";
				else if(!in_array($a[1], $days)) {
					array_push($errors['day'], $a[0]);
				}
				echo "<script type='text/javascript'>alert('3');</script>";
				//else if(!preg_match($timePattern, $a[2])) {
				//	array_push($errors['time'], $a[0]);
				//}
				echo "<script type='text/javascript'>alert('4');</script>";
				else {
					$fns->insertProgramMemberFile($email, $program, $semester, $year, $a[1], $a[2]);
				}
			}
			fclose($file);
	    } 
	    else {
	        echo "<script type='text/javascript'>alert('There has been an error uploading your file');</script>";
	    }
	}

	/*if(sizeof($errors['email']) + sizeof($errors['day']) + sizeof($errors['time']) > 0) {
		$strEmail = '';
		$strDay = '';
		$strTime = '';
		if(sizeof($errors['email']) > 0) {
			foreach($errors['email'] as $er) {
	 			$strEmail = $strEmail . $er . '\n';
	 		}
	 		$strEmail = '\n' . $strEmail;
	 		$strEmail = 'These users do not exist in the database:' . $strEmail . '\n';
		}
		if(sizeof($errors['day']) > 0) {
			foreach($errors['day'] as $er) {
	 			$strDay = $strDay . $er . '\n';
	 		}
	 		$strDay = '\n' . $strDay;
	 		$strDay = 'Incorrect day format:' . $strDay . '\n';
		}
		if(sizeof($errors['time']) > 0) {
			foreach($errors['time'] as $er) {
	 			$strTime = $strTime . $er . '\n';
	 		}
	 		$strTime = '\n' . $strTime;
	 		$strEmail = 'Incorrect time format:' . $strTime;
		}
		//echo "<script type='text/javascript'>alert('The following were not added for the following reasons: $strEmail $strDay $strTime');</script>";
	}*/

	switch($program) {
		case 'Panels' : { 
			echo "<script type='text/javascript'>window.location.assign('../pages/panels.php');</script>";
		} break;
		default :  {
			echo "<script type='text/javascript'>window.location.assign('../pages/panels.php');</script>";
		}
	}
	$db = null;
?>