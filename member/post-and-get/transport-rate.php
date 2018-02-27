<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');

if (isset($_POST['add-transport-rate'])) {

    $TRANSPORT_RATES = New TransportRates(NULL);
    $VALID = new Validator();

    $TRANSPORT_RATES->transport_id = $_POST['id'];
    $TRANSPORT_RATES->location_from = $_POST['location_from'];
    $TRANSPORT_RATES->location_to = $_POST['location_to'];
    $TRANSPORT_RATES->distance = $_POST['distance'];
    $TRANSPORT_RATES->price = $_POST['price'];

    $VALID->check($TRANSPORT_RATES, [
        'location_from' => ['required' => TRUE],
        'location_to' => ['required' => TRUE],
        'distance' => ['required' => TRUE],
        'price' => ['required' => TRUE],
    ]);


    if ($VALID->passed()) {
        $TRANSPORT_RATES->create();

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
if (isset($_POST['update-transport-rate'])) {

    $TRANSPORT_RATES = New TransportRates($_POST['id']);
    $VALID = new Validator();

    $TRANSPORT_RATES->location_from = $_POST['location_from'];
    $TRANSPORT_RATES->location_to = $_POST['location_to'];
    $TRANSPORT_RATES->distance = $_POST['distance'];
    $TRANSPORT_RATES->price = $_POST['price'];

    $VALID->check($TRANSPORT_RATES, [
        'location_from' => ['required' => TRUE],
        'location_to' => ['required' => TRUE],
        'distance' => ['required' => TRUE],
        'price' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $TRANSPORT_RATES->update();

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
if (isset($_POST['arrange-data'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;

        $TRANSPORT_RATES = TransportRates::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}



