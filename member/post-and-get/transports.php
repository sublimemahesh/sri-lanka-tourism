<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');


if (isset($_POST['add-transports'])) {

    $TRANSPORTS = New Transports(NULL);
    $VALID = new Validator();


    $TRANSPORTS->title = $_POST['title'];
    $TRANSPORTS->member = $_POST['member'];
    $TRANSPORTS->vehicle_type = $_POST['vehicle_type'];
    $TRANSPORTS->description = $_POST['description'];

    $VALID->check($TRANSPORTS, [
        'title' => ['required' => TRUE],
        'vehicle_type' => ['required' => TRUE],
        'description' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $TRANSPORTS->create();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your data was saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ../add-transport-rates.php?id='. $TRANSPORTS->id);
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['edit-transports'])) {

    $TRANSPORTS = New Transports($_POST['id']);
    $VALID = new Validator();

    $TRANSPORTS->title = $_POST['title'];
    $TRANSPORTS->description = $_POST['description'];
    $TRANSPORTS->vehicle_type = $_POST['vehicle_type'];

    $VALID->check($TRANSPORTS, [
        'title' => ['required' => TRUE],
        'description' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $TRANSPORTS->update();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your changes saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}



