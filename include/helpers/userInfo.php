<?php
    $user = $users->userdata($_SESSION['Email']);
    $email = $user['email'];
    $fn = $user['first_name'];
    $ln = $user['last_name'];

    $roles = $users->get_roles($email);

    echo "<input type='hidden' id='userid' value='$email'/>";
    echo "<input type='hidden' id='fn' value='$fn'/>";
    echo "<input type='hidden' id='ln' value='$ln'/>";

    date_default_timezone_set('EST');
    ini_set('auto_detect_line_endings', '1');

    $limit = $_SESSION['Session_Limit'];
    $now = time();
    if($limit < $now) {
    	header('Location: ../logout.php');
    }
?>