<?php

include_once(dirname(__FILE__) . '/../class/include.php');

date_default_timezone_set('Asia/Colombo');
$now = date('Y-m-d H:i:s');

if (isset($_POST['save'])) {
    $FEEDBACK = new Feedback(NULL);
    $VALID = new Validator();

    $FEEDBACK->visitor = $_POST['visitor'];
    $FEEDBACK->transport = $_POST['transport'];
    $FEEDBACK->date_time = $now;
    $FEEDBACK->title = $_POST['title'];
    $FEEDBACK->rate = $_POST['rate'];
    $FEEDBACK->description = $_POST['message'];
    $FEEDBACK->accommodation = 0;
    $FEEDBACK->tour_package = 0;

    $RESULT = $FEEDBACK->create();

    if ($RESULT) {
        $VALID->addError("Your Comment was saved successfully.", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $VALID->addError("There was an error..!.", 'danger');
        $_SESSION['ERRORS'] = $VALID->errors();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

