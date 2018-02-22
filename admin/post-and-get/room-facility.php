<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

include_once(dirname(__FILE__) . '/../auth.php');

if (isset($_POST['create'])) {
    $ROOM_FACILITY = new RoomFacility(NULL);
    $VALID = new Validator();

    $ROOM_FACILITY->name = filter_input(INPUT_POST, 'name');

    $VALID->check($ROOM_FACILITY, ['name' =>
            ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $ROOM_FACILITY->create();

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
    $ROOM_FACILITY = new RoomFacility($_POST['id']);

    $ROOM_FACILITY->id = $_POST['id'];
    $ROOM_FACILITY->name = $_POST['name'];

    $VALID = new Validator();
    $VALID->check($ROOM_FACILITY, ['name' =>
            ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $ROOM_FACILITY->update();

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

        $ROOM_FACILITY = RoomFacility::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}