<?php

	require_once '../../resources/initTableFunctions.php';

	$fn = $_POST['fn']; 
    $ln = $_POST['ln']; 
    $eagleid = $_POST['eagleid'];
    $sex = $_POST['sex'];
    $year = $_POST['year'];
    $school = $_POST['school']; 
    $major = $_POST['major'];
    $minor = $_POST['minor'];
    $hometown = $_POST['hometown'];
    $state = $_POST['state'];
    $local = $_POST['local'];
    $ahana = $_POST['ahana'];
    $international = $_POST['international'];
    $transfer = $_POST['transfer'];
    $tours = $_POST['tours'];
    $panels = $_POST['panels'];
    $council = $_POST['council'];
    $summer = $_POST['summer'];
    $status = $_POST['status'];
    $email = $_POST['email'];

	$fns->updateUserProfile($fn, $ln, $eagleid, $sex, $year, $school, $major, $minor, $hometown, $state, $local, $ahana, $international, $transfer, $tours, $panels, $council, $summer, $status, $email);

	$db = null;
?>