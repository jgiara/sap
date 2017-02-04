<?php

	require_once '../resources/initTableFunctions.php';

	$fn = $_POST['fn']; 
    $ln = $_POST['ln']; 
    $eagleid = $_POST['eagleid'];
    $sex = $_POST['sex'];
    $year = $_POST['year'];
    $phone = $_POST['phone'];
    $school = $_POST['school']; 
    $major = $_POST['major'];
    $minor = $_POST['minor'];
    $hometown = $_POST['hometown'];
    $state = $_POST['state'];
    $local = $_POST['local'];
    $ahana = $_POST['ahana'];
    $international = $_POST['international'];
    $transfer = $_POST['transfer'];
    $email = $_POST['email'];

	$fns->updateProfile($fn, $ln, $eagleid, $sex, $year, $school, $major, $minor, $hometown, $state, $local, $ahana, $international, $transfer, $email, $phone);

	$db = null;
?>