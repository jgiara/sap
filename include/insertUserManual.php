<?php

	ob_start();
    session_start();

    require_once '../resources/initTableFunctions.php';
    require './helpers/pageProtectInclude.php';

	$email = $_POST['email'];
    $id = $_POST['id'];
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $sex = $_POST['sex'];
    $year = $_POST['year'];
    $school = $_POST['school'];
    $major = $_POST['major'];
    $minor = $_POST['minor'];
    $hometown = $_POST['hometown'];
    $state = $_POST['state'];
    $international = $_POST['international'];
    $ahana = $_POST['ahana'];
    $transfer = $_POST['transfer'];
    $phone = $_POST['phone'];

    $email = strtolower($email);
    $emails = $fns->getAllEmails();
    if(in_array($email, $emails)) {
		echo json_encode('exists');
	}
	else {
		$fns->insertUserManual($email, $id, $fn, $ln, $sex, $year, $school, $major, $minor, $hometown, $state, $international, $ahana, $transfer, $phone);
        $fns->insertRoles($email, 1);
        echo json_encode('entered');
	}
	
	$db = null;
?>