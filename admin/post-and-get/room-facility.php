<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

include_once(dirname(__FILE__) . '/../auth.php');

if (isset($_POST['create'])) {
    $ROOM_FACILITY = new RoomFacility(NULL);
    $VALID = new Validator();

    $ROOM_FACILITY->name = filter_input(INPUT_POST, 'name');
 
    $dir_dest = '../../upload/room-facility-icons/';

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
    $ROOM_FACILITY->image_name = $imgName;

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

    $dir_dest = '../../upload/room-facility-icons/';
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


    $ROOM_FACILITY = new RoomFacility($_POST['id']);
    $ROOM_FACILITY->id = $_POST['id'];
    $ROOM_FACILITY->name = $_POST['name'];
    $ROOM_FACILITY->image_name = $_POST['oldImageName'];
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