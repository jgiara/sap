<?php
	ini_set("auto_detect_line_endings", "1");
	require_once '../../resources/initTableFunctions.php';

	//echo "<script type='text/javascript'>alert('$program');</script>"

	$target_dir = "../../resources/uploads/";
	$target_file = $target_dir . basename($_FILES["file-form"]["name"]);
	$uploadOk = 1;
	$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$errors = ['exist' => []];
	
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
	    	$added = [];
	    	$index = 0;
			while(!($end = feof($file))) {
				$a = fgetcsv($file);
				$email = (string) trim($a[0]);
				$email = strtolower($email);
				if(in_array($email, $emails) || in_array($email, $added)) {
					array_push($errors['exist'], $email);
				}
				else {
					$fns->insertUserAuto($email, $a);
					$added[$index] = $email;
					$index++;
					$fns->insertRoles($email, 1);
				}
			}
			fclose($file);
	    } 
	    else {
	        echo "<script type='text/javascript'>alert('There has been an error uploading your file');</script>";
	    }
	}

	if(sizeof($errors['exist']) > 0) {
		$strExist = '';
		if(sizeof($errors['exist']) > 0) {
			foreach($errors['exist'] as $er) {
	 			$strExist = $strExist . $er . '\n';
	 		}
	 		$strExist = '\n' . $strExist;
	 		$strExist = '\nThese users already exist in the database:' . $strExist . '\n';
		}
		echo "<script type='text/javascript'>alert('The following were not added for the following reasons:" . '\n' . "$strExist');</script>";
	}

	echo "<script type='text/javascript'>window.location.assign('../pages/users.php');</script>";
	$db = null;
?>