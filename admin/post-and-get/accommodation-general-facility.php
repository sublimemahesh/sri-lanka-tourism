<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

include_once(dirname(__FILE__) . '/../auth.php');

if (isset($_POST['create'])) {
    $ACCOMODATION_GENERAL_FACILITY = new AccommodationGeneralFacilities(NULL);
    $VALID = new Validator();

    $ACCOMODATION_GENERAL_FACILITY->name = filter_input(INPUT_POST, 'name');

    $dir_dest = '../../upload/accommodation-facilities-icons/';

    $handle = new Upload($_FILES['image']);

    $imgName = null;
    $img = Helper::randamId();

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $img;
        $handle->image_x = 24;
        $handle->image_y = 24;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }
    $ACCOMODATION_GENERAL_FACILITY->image_name = $imgName;

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


    $dir_dest = '../../upload/accommodation-facilities-icons/';
    $handle = new Upload($_FILES['image']);

    $img = $_POST ["oldImageName"];

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = FALSE;
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $img;
        $handle->image_x = 24;
        $handle->image_y = 24;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $img = $handle->file_dst_name;
        }
    }

    $ACCOMODATION_GENERAL_FACILITY = new AccommodationGeneralFacilities($_POST['id']);
    $ACCOMODATION_GENERAL_FACILITY->id = $_POST['id'];
    $ACCOMODATION_GENERAL_FACILITY->name = $_POST['name'];
    $ACCOMODATION_GENERAL_FACILITY->image_name = $_POST['oldImageName'];

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

if (isset($_POST['save-data'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;

        $ACCOMODATION_GENERAL_FACILITY = AccommodationGeneralFacilities::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

    