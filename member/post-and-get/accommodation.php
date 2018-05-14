<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $ACCOMODATION = new Accommodation(NULL);
    $VALID = new Validator();

    $ACCOMODATION->name = $_POST['name'];
    $ACCOMODATION->address = $_POST['address'];
    $ACCOMODATION->email = $_POST['email'];
    $ACCOMODATION->phone = $_POST['phone'];
    $ACCOMODATION->website = $_POST['website'];
    $ACCOMODATION->city = $_POST['city'];
    $ACCOMODATION->type = $_POST['type'];
    $ACCOMODATION->member = $_POST['member'];
    $ACCOMODATION->description = $_POST['description'];


    $VALID->check($ACCOMODATION, [
        'name' => ['required' => TRUE],
        'address' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'phone' => ['required' => TRUE],
        'city' => ['required' => TRUE],
        'type' => ['required' => TRUE],
        'member' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $ACCOMODATION->create();

        foreach ($_POST["accommodation-images"] as $key => $photos) {

            $ACCOMMODATION_PHOTO = new AccommodationPhoto(NULL);
            $ACCOMMODATION_PHOTO->accommodation = $ACCOMODATION->id;
            $ACCOMMODATION_PHOTO->image_name = $photos;
            $ACCOMMODATION_PHOTO->caption = '';
            $key++;
            $ACCOMMODATION_PHOTO->sort = $key;
            $ACCOMMODATION_PHOTO->create();
        }
        if (isset($_POST["facility"])) {
            $ACCOMODATION_FACILITY_DETAILS = new AccommodationFacilityDetails(NULL);
            $ACCOMODATION_FACILITY_DETAILS->accommodation = mysql_real_escape_string($ACCOMODATION->id);
            $ACCOMODATION_FACILITY_DETAILS->facility = implode(",", $_POST['facility']);
            $ACCOMODATION_FACILITY_DETAILS->create();
        }
        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your data was saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();

//        header('Location: ' . $_SERVER['HTTP_REFERER']);
        header('Location: ../accommodation-room.php?id=' . $ACCOMODATION->id);
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();



        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['update'])) {

    $ACCOMODATION = new Accommodation($_POST['id']);

    $ACCOMODATION->name = $_POST['name'];
    $ACCOMODATION->address = $_POST['address'];
    $ACCOMODATION->email = $_POST['email'];
    $ACCOMODATION->phone = $_POST['phone'];
    $ACCOMODATION->website = $_POST['website'];
    $ACCOMODATION->city = $_POST['city'];
    $ACCOMODATION->type = $_POST['type'];
    $ACCOMODATION->member = $_POST['member'];
    $ACCOMODATION->description = $_POST['description'];

    $VALID = new Validator();
    $VALID->check($ACCOMODATION, [
        'name' => ['required' => TRUE],
        'address' => ['required' => TRUE],
        'email' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $ACCOMODATION->update();

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

        $ACCOMODATION = Accommodation::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}