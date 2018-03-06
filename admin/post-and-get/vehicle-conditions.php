<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');

if (isset($_POST['add-vehicle-conditions'])) {
    $VEHICLE_CONDITIONS = new VehicleCondition(NULL);
    $VALID = new Validator();

    $VEHICLE_CONDITIONS->name = filter_input(INPUT_POST, 'name');

    $VALID->check($VEHICLE_CONDITIONS, ['name' =>
            ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $VEHICLE_CONDITIONS->create();

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

if (isset($_POST['edit-vehicle-conditions'])) {
    $VEHICLE_CONDITIONS = new VehicleCondition(NULL);

    $VEHICLE_CONDITIONS->id = $_POST['id'];
    $VEHICLE_CONDITIONS->name = $_POST['name'];

    $VALID = new Validator();
    $VALID->check($VEHICLE_CONDITIONS, ['name' =>
            ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $VEHICLE_CONDITIONS->update();

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

        $TOUR_SUB = VehicleCondition::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}