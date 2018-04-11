<?php

//----------------------CAPTCHACODE---------------------
session_start();


$response = array();
if ($_SESSION['CAPTCHACODE'] != $_POST['captchacode']) {
    $response['status'] = 'incorrect';
    $response['msg'] = 'Security code is invalid';
    echo json_encode($response);
    exit();
} else {
    $response['status'] = 'correct';
    echo json_encode($response);
    exit();
} 