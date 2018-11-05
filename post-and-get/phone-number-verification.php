<?php

include_once(dirname(__FILE__) . '/../class/include.php');
$VALID = new Validator();
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['submitPIN'])) {
    $id = $_SESSION['id'];
    $code = $_POST['verificationPIN'];
    $back = $_SESSION['back'];
    $VISITOR = new Visitor($id);

    if ($VISITOR->phoneVerificationCode === $code) {

        $VISITOR->updateVerifiedStatus();
        if ($back == '') {
            if ($_SESSION['registered']) {
                header('location: ../visitor-profile.php?message=29');
            } else {
                header('location: ../visitor-profile.php?message=30');
            }
        } else {
            header('loaction: ' . $back);
        }
    } else {
        header('location: ../phone-verification-page.php?message=28');
    }
}


