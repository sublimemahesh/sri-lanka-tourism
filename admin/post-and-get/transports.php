<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');


if (isset($_POST['add-transports'])) {

    $TRANSPORTS = New Transports(NULL);
    $VALID = new Validator();
    $TRANSPORTS->title = $_POST['title'];
    $TRANSPORTS->vehicle_type = $_POST['vehicle_type'];
    $TRANSPORTS->member = $_POST['member_id'];
    $TRANSPORTS->registered_number = $_POST['registered_number'];
    $TRANSPORTS->registered_year = $_POST['registered_year'];
    $TRANSPORTS->fuel_type = $_POST['fuel_type_id'];
    $TRANSPORTS->condition = $_POST['condition_id'];
    $TRANSPORTS->no_of_passangers = $_POST['no_of_passangers'];
    $TRANSPORTS->no_of_baggages = $_POST['no_of_baggages'];
    $TRANSPORTS->no_of_doors = $_POST['no_of_doors'];
    $TRANSPORTS->ac = $_POST['ac'];
    $TRANSPORTS->description = $_POST['description'];

    $VALID->check($TRANSPORTS, [
        'title' => ['required' => TRUE],
        'vehicle_type' => ['required' => TRUE],
        'registered_number' => ['required' => TRUE],
        'description' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $TRANSPORTS->create();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your data was saved successfully", 'success');
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

if (isset($_POST['edit-transports'])) {

    $TRANSPORTS = New Transports($_POST['id']);
    $VALID = new Validator();

    $TRANSPORTS->title = $_POST['title'];
    $TRANSPORTS->vehicle_type = $_POST['vehicle_type'];
    $TRANSPORTS->member = $_POST['member_id'];
    $TRANSPORTS->registered_number = $_POST['registered_number'];
    $TRANSPORTS->registered_year = $_POST['registered_year'];
    $TRANSPORTS->fuel_type = $_POST['fuel_type_id'];
    $TRANSPORTS->condition = $_POST['condition_id'];
    $TRANSPORTS->no_of_passangers = $_POST['no_of_passangers'];
    $TRANSPORTS->no_of_baggages = $_POST['no_of_baggages'];
    $TRANSPORTS->no_of_doors = $_POST['no_of_doors'];
    $TRANSPORTS->ac = $_POST['ac'];
    $TRANSPORTS->description = $_POST['description'];



    $VALID->check($TRANSPORTS, [
        'title' => ['required' => TRUE],
        'vehicle_type' => ['required' => TRUE],
        'member' => ['required' => TRUE],
        'registered_number' => ['required' => TRUE],
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



