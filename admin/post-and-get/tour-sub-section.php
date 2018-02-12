<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');


if (isset($_POST['add-tour-sub-section'])) {

    $TOURSUBSECTION = New TourSubSection(NULL);
    $VALID = new Validator();

    $TOURSUBSECTION->tour = $_POST['id'];
    $TOURSUBSECTION->title = $_POST['title'];
    $TOURSUBSECTION->duration = $_POST['duration'];
    $TOURSUBSECTION->description = $_POST['description'];

    $VALID->check($TOURSUBSECTION, [
        'title' => ['required' => TRUE],
        'duration' => ['required' => TRUE],
        'description' => ['required' => TRUE],
    ]);


    if ($VALID->passed()) {
        $TOURSUBSECTION->create();

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

if (isset($_POST['edit-tour-sub-section'])) {

    $TOURSUBSECTION = New TourSubSection($_POST['id']);
    $VALID = new Validator();

    $TOURSUBSECTION->title = $_POST['title'];
    $TOURSUBSECTION->duration = $_POST['duration'];
    $TOURSUBSECTION->description = $_POST['description'];

    $VALID->check($TOURSUBSECTION, [
        'title' => ['required' => TRUE],
        'duration' => ['required' => TRUE],
        'description' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $TOURSUBSECTION->update();

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

        $TOUR_SUB = TourSubSection::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}



