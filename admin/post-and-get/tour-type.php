<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');

if (isset($_POST['add-tour-type'])) {
    $TOUR_TYPE = new TourType(NULL);
    $VALID = new Validator();

    $TOUR_TYPE->name = filter_input(INPUT_POST, 'name');

    $dir_dest = '../../upload/tour-type/';
    $dir_dest_thumb = '../../upload/tour-type/thumb';
    
    $handle = new Upload($_FILES['picture_name']);

    $imgName = null;
    $img = Helper::randamId();
    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $img;
        $handle->image_x = 240;
        $handle->image_y = 440;

        $handle->Process($dir_dest);


        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $img;
        $handle->image_x = 300;
        $handle->image_y = 206;

        $handle->Process($dir_dest_thumb);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $TOUR_TYPE->picture_name = $imgName;

    $VALID->check($TOUR_TYPE, [
        'name' => ['required' => TRUE],
        'picture_name' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $TOUR_TYPE->create();

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

if (isset($_POST['edit-tour-type'])) {

    $dir_dest = '../../upload/tour-type/';
    $dir_dest_thumb = '../../upload/tour-type/thumb';

    $handle = new Upload($_FILES['picture_name']);

    $imgName = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = FALSE;
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $_POST ["oldImageName"];
        $handle->image_x = 240;
        $handle->image_y = 440;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
        if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = FALSE;
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $_POST ["oldImageName"];
        $handle->image_x = 300;
        $handle->image_y = 206;
        
         $handle->Process($dir_dest_thumb);
        }
         if ($handle->processed) {
                $info = getimagesize($handle->file_dst_pathname);
                $imgName = $handle->file_dst_name;
            }
        
    }

    $TOUR_TYPE = new TourType($_POST['id']);



    $TOUR_TYPE->id = $_POST['id'];
    $TOUR_TYPE->name = $_POST['name'];
    $TOUR_TYPE->picture_name = $_POST['oldImageName'];
    $TOUR_TYPE->sort = $_POST['sort'];

    $VALID = new Validator();
    $VALID->check($TOUR_TYPE, [
        'name' => ['required' => TRUE],
        'picture_name' => ['required' => TRUE],
        'sort' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $TOUR_TYPE->update();

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

        $TOUR_SUB = TourType::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}