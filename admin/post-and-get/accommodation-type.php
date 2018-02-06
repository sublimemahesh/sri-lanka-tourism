<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

include_once(dirname(__FILE__) . '/../auth.php');

if (isset($_POST['add-accomodation-type'])) {
    $ACCOMODATION_TYPE = new AccommodationType(NULL);
    $VALID = new Validator();

    $ACCOMODATION_TYPE->name = filter_input(INPUT_POST, 'name');

    $VALID->check($ACCOMODATION_TYPE, ['name' =>
            ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
       $ACCOMODATION_TYPE->create();

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

if (isset($_POST['edit-accomodation-type'])) {
    $ACCOMODATION_TYPE = new AccommodationType(NULL);

    $ACCOMODATION_TYPE->id = $_POST['id'];
    $ACCOMODATION_TYPE->name = $_POST['name'];

    $VALID = new Validator();
    $VALID->check($ACCOMODATION_TYPE, ['name' =>
            ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $ACCOMODATION_TYPE->update();

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