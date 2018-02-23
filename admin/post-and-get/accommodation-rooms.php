<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

include_once(dirname(__FILE__) . '/../auth.php');

if (isset($_POST['create'])) {
    $ACCOMODATION_ROOM = new Room(NULL);
    $VALID = new Validator();

    $ACCOMODATION_ROOM->accommodation = $_POST['id'];
    $ACCOMODATION_ROOM->name = mysql_real_escape_string($_POST['name']);
    $ACCOMODATION_ROOM->description = mysql_real_escape_string($_POST['description']);
    $ACCOMODATION_ROOM->number_of_room = mysql_real_escape_string($_POST['number_of_room']);
    $ACCOMODATION_ROOM->number_of_adults = mysql_real_escape_string($_POST['number_of_adults']);
    $ACCOMODATION_ROOM->number_of_children = mysql_real_escape_string($_POST['number_of_children']);
    $ACCOMODATION_ROOM->number_of_extra_bed = mysql_real_escape_string($_POST['number_of_extra_bed']);
    $ACCOMODATION_ROOM->extra_bed_price = mysql_real_escape_string($_POST['extra_bed_price']);


    $VALID->check($ACCOMODATION_ROOM, ['name' =>
            ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $ACCOMODATION_ROOM->create();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your data was saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();

        header("location: ../view-room-facilities.php?id=". $ACCOMODATION_ROOM->id);
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['update'])) {
    $ACCOMODATION_ROOM = new Room($_POST['id']);

    $ACCOMODATION_ROOM->name = mysql_real_escape_string($_POST['name']);
    $ACCOMODATION_ROOM->description = mysql_real_escape_string($_POST['description']);
    $ACCOMODATION_ROOM->number_of_room = mysql_real_escape_string($_POST['number_of_room']);
    $ACCOMODATION_ROOM->number_of_adults = mysql_real_escape_string($_POST['number_of_adults']);
    $ACCOMODATION_ROOM->number_of_children = mysql_real_escape_string($_POST['number_of_children']);
    $ACCOMODATION_ROOM->number_of_extra_bed = mysql_real_escape_string($_POST['number_of_extra_bed']);
    $ACCOMODATION_ROOM->extra_bed_price = mysql_real_escape_string($_POST['extra_bed_price']);

    $VALID = new Validator();
    $VALID->check($ACCOMODATION_ROOM, ['name' =>
            ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $ACCOMODATION_ROOM->update();

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

        $ACCOMODATION_ROOM = Room::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}