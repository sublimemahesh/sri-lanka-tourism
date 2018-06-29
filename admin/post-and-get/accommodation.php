<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $ACCOMODATION = new Accommodation(NULL);
    $VALID = new Validator();

    $ACCOMODATION->name = mysql_real_escape_string($_POST['name']);
    $ACCOMODATION->address = mysql_real_escape_string($_POST['address']);
    $ACCOMODATION->email = mysql_real_escape_string($_POST['email']);
    $ACCOMODATION->phone = mysql_real_escape_string($_POST['phone']);
    $ACCOMODATION->website = mysql_real_escape_string($_POST['website']);
    $ACCOMODATION->city = mysql_real_escape_string($_POST['city']);
    $ACCOMODATION->type = mysql_real_escape_string($_POST['type']);
    $ACCOMODATION->member = mysql_real_escape_string($_POST['member']);
    $ACCOMODATION->rank = mysql_real_escape_string($_POST['rank']);
    $ACCOMODATION->description = mysql_real_escape_string($_POST['description']);


    $VALID->check($ACCOMODATION, [
        'name' => ['required' => TRUE],
        'address' => ['required' => TRUE],
        'phone' => ['required' => TRUE],
        'city' => ['required' => TRUE],
        'type' => ['required' => TRUE],
        'address' => ['required' => TRUE],
        'description' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $ACCOMODATION->create();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your data was saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();

        header("location: ../view-accommodation-facilities.php?id=" . $ACCOMODATION->id);
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

    $ACCOMODATION->name = mysql_real_escape_string($_POST['name']);
    $ACCOMODATION->address = mysql_real_escape_string($_POST['address']);
    $ACCOMODATION->email = mysql_real_escape_string($_POST['email']);
    $ACCOMODATION->phone = mysql_real_escape_string($_POST['phone']);
    $ACCOMODATION->website = mysql_real_escape_string($_POST['website']);
    $ACCOMODATION->city = mysql_real_escape_string($_POST['city']);
    $ACCOMODATION->type = mysql_real_escape_string($_POST['type']);
    $ACCOMODATION->member = mysql_real_escape_string($_POST['member']);
    $ACCOMODATION->rank = mysql_real_escape_string($_POST['rank']);
    $ACCOMODATION->description = mysql_real_escape_string($_POST['description']);

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