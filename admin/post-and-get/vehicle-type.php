<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');

if (isset($_POST['add-vehicle-type'])) {
    $VEHICLE_TYPE = new VehicleType(NULL);
    $VALID = new Validator();

    $VEHICLE_TYPE->name = filter_input(INPUT_POST, 'name');

    $VALID->check($VEHICLE_TYPE, ['name' =>
            ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $VEHICLE_TYPE->create();

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

if (isset($_POST['edit-vehicle-type'])) {
    $VEHICLE_TYPE = new VehicleType(NULL);

    $VEHICLE_TYPE->id = $_POST['id'];
    $VEHICLE_TYPE->name = $_POST['name'];

    $VALID = new Validator();
    $VALID->check($VEHICLE_TYPE, ['name' =>
            ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $VEHICLE_TYPE->update();

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
if (isset($_POST['save-data'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;

        $TOUR_SUB = VehicleType::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}