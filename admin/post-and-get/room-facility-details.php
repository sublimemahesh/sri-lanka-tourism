<?php

include_once(dirname(__FILE__) . '/../../class/include.php');


if (isset($_POST['create'])) {

    $ACCOMODATION_ROOM_DETAILS = new RoomFaciliityDetails(NULL);


    $result = $ACCOMODATION_ROOM_DETAILS->getFacilitiesByRoomId($_POST['room_id']);

    $ResultRoomID = $result['room'];

    if ($ResultRoomID == $_POST['room_id']) {

        $ACCOMODATION_ROOM_DETAILS = new RoomFaciliityDetails($result['id']);

        $ACCOMODATION_ROOM_DETAILS->facility = implode(",", $_POST['facility']);


        $VALID = new Validator();
        $VALID->check($ACCOMODATION_ROOM_DETAILS, [
            'facility' => ['required' => TRUE]
        ]);

        if ($VALID->passed()) {
            $ACCOMODATION_ROOM_DETAILS->update();

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
    } else {

        $ACCOMODATION_ROOM_DETAILS->room = mysql_real_escape_string($_POST['room_id']);
        $ACCOMODATION_ROOM_DETAILS->facility = implode(",", $_POST['facility']);

        $VALID = new Validator();
        $VALID->check($ACCOMODATION_ROOM_DETAILS, [
            'room' => ['required' => TRUE],
            'facility' => ['required' => TRUE],
        ]);

        if ($VALID->passed()) {
            $ACCOMODATION_ROOM_DETAILS->create();

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
}





