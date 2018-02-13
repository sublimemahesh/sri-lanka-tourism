<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

include_once(dirname(__FILE__) . '/../auth.php');

if (isset($_POST['create'])) {
    $ACCOMODATION_GENERAL_FACILITY = new AccommodationGeneralFacilities(NULL);
    $VALID = new Validator();

    $ACCOMODATION_GENERAL_FACILITY->name = filter_input(INPUT_POST, 'name');

    $VALID->check($ACCOMODATION_GENERAL_FACILITY, ['name' =>
            ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
       $ACCOMODATION_GENERAL_FACILITY->create();

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

if (isset($_POST['update'])) {
    $ACCOMODATION_GENERAL_FACILITY = new AccommodationGeneralFacilities(NULL);

    $ACCOMODATION_GENERAL_FACILITY->id = $_POST['id'];
    $ACCOMODATION_GENERAL_FACILITY->name = $_POST['name'];

    $VALID = new Validator();
    $VALID->check($ACCOMODATION_GENERAL_FACILITY, ['name' =>
            ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $ACCOMODATION_GENERAL_FACILITY->update();

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