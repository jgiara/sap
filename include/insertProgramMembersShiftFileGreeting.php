<?php
	ob_start();
	session_start();

	require_once '../resources/initTableFunctions.php';
	require './helpers/pageProtectInclude.php';
	ini_set("auto_detect_line_endings", "1");

	$program = $_POST['program-form-members-file'];
	$semester = $_POST['semester-form-members-file'];
	$year = $_POST['year-form-members-file'];

	//echo "<script type='text/javascript'>alert('$program');</script>"

	$target_dir = "../resources/uploads/";
	$target_file = $target_dir . basename($_FILES["file-form"]["name"]);
	$uploadOk = 1;
	$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$errors = ['email' => [], 'color' => [], 'day' => [], 'time' => [], 'exist' => []];
	$timePattern = '/\b[1-9][0-2]?:[0-5][0-9] AM\b|\b[1-9][0-2]?:[0-5][0-9] PM\b/';
	$days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
	$colors = ['Maroon', 'Gold'];
	
	
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
	    	$file = fopen("../resources/uploads/dataFile.csv","r");
	    	$headers = fgetcsv($file);
	    	$emails = $fns->getAllEmails();
	    	$members = $fns->getUsersInProgramForShifts($program, $semester, $year);
	    	$currentMembers = [];
	    	$added = [];
	    	$index = 0;
	    	foreach($members as $member) {
	    		array_push($currentMembers, $member[0]);
	    	}
			while(!($end = feof($file))) {
				$a = fgetcsv($file);
				$email = (string) $a[0];
				$email = strtolower($email);
				if(!in_array($email, $emails)) {
					array_push($errors['email'], $a[0]);
				}
				else if(in_array($email, $currentMembers) || in_array($email, $added)) {
					array_push($errors['exist'], $email);
				}
				else if(!in_array($a[1], $colors)) {
					array_push($errors['color'], $a[0]);
				}
				else if(!in_array($a[2], $days)) {
					array_push($errors['day'], $a[0]);
				}
				else if(!preg_match($timePattern, $a[3])) {
					array_push($errors['time'], $a[0]);
				}
				else {
					$fns->insertProgramMemberShiftGreeting($email, $program, $semester, $year, $a[2], $a[3], $a[1]);
					$fns->updateUserStatus($email, 'Active');
					$added[$index] = $email;
					$index++;
				}
			}
			fclose($file);
	    } 
	    else {
	        echo "<script type='text/javascript'>alert('There has been an error uploading your file');</script>";
	    }
	}

	if(sizeof($errors['email']) + sizeof($error['color']) + sizeof($errors['exist']) + sizeof($errors['day']) + sizeof($errors['time']) > 0) {
		$strEmail = '';
		$strExist = '';
		$strColor = '';
		$strDay = '';
		$strTime = '';
		if(sizeof($errors['email']) > 0) {
			foreach($errors['email'] as $er) {
	 			$strEmail = $strEmail . $er . '\n';
	 		}
	 		$strEmail = '\n' . $strEmail;
	 		$strEmail = '\nThese users do not exist in the database:' . $strEmail . '\n';
		}
		if(sizeof($errors['exist']) > 0) {
			foreach($errors['exist'] as $er) {
	 			$strExist = $strExist . $er . '\n';
	 		}
	 		$strExist = '\n' . $strExist;
	 		$strExist = '\nThese users are already program members:' . $strExist . '\n';
		}
		if(sizeof($errors['color']) > 0) {
			foreach($errors['color'] as $er) {
	 			$strColor = $strColor . $er . '\n';
	 		}
	 		$strColor = '\n' . $strColor;
	 		$strColor = '\nIncorrect Week Color:' . $strColor . '\n';
		}
		if(sizeof($errors['day']) > 0) {
			foreach($errors['day'] as $er) {
	 			$strDay = $strDay . $er . '\n';
	 		}
	 		$strDay = '\n' . $strDay;
	 		$strDay = '\nIncorrect day format:' . $strDay . '\n';
		}
		if(sizeof($errors['time']) > 0) {
			foreach($errors['time'] as $er) {
	 			$strTime = $strTime . $er . '\n';
	 		}
	 		$strTime = '\n' . $strTime;
	 		$strTime = '\nIncorrect time format:' . $strTime;
		}
		echo "<script type='text/javascript'>alert('The following were not added for the following reasons:" . '\n' . "$strEmail $strExist $strColor $strDay $strTime');</script>";
	}

	switch($program) {
		case 'Panels' : { 
			echo "<script type='text/javascript'>window.location.assign('../pages/panels.php');</script>";
		} break;
		case 'Tours' : { 
			echo "<script type='text/javascript'>window.location.assign('../pages/tours.php');</script>";
		} break;
		case 'Greeting' : { 
			echo "<script type='text/javascript'>window.location.assign('../pages/greeting.php');</script>";
		} break;
		case 'Office Management' : { 
			echo "<script type='text/javascript'>window.location.assign('../pages/om.php');</script>";
		} break;
		default :  {
			echo "<script type='text/javascript'>window.location.assign('../pages/dashboard.php');</script>";
		}
	}
	$db = null;
?>