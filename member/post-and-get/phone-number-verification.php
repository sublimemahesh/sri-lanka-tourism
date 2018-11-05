<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
$VALID = new Validator();
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['submitPIN'])) {
    $back = '';
    $id = $_SESSION['id'];
    $code = $_POST['verificationPIN'];
    if($_SESSION['back']) {
        $back = $_SESSION['back'];
    }
    
    $MEMBER = new Member($id);
    if ($MEMBER->phoneVerificationCode === $code) {

        $MEMBER->updateVerifiedStatus();
        if ($back == '') {
            if ($_SESSION['registered']) {
                header('location: ../profile.php?message=29');
            } else {
                header('location: ../profile.php?message=30');
            }
        } else {
            header('loaction: ' . $back);
        }
    } else {
        header('location: ../phone-verification-page.php?message=28');
    }
}


