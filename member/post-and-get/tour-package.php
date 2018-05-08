<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

include_once(dirname(__FILE__) . '/../auth.php');

if (isset($_POST['add-tour-package'])) {
    $TOUR_PACKAGE = new TourPackage(NULL);
    $VALID = new Validator();

    $TOUR_PACKAGE->tourtype = filter_input(INPUT_POST, 'tourtype');
    $TOUR_PACKAGE->name = filter_input(INPUT_POST, 'name');
    $TOUR_PACKAGE->price = filter_input(INPUT_POST, 'price');
    $TOUR_PACKAGE->member = filter_input(INPUT_POST, 'member');
    $TOUR_PACKAGE->description = filter_input(INPUT_POST, 'description');

    $dir_dest = '../../upload/tour-package/';
    $dir_dest_thumb = '../../upload/tour-package/thumb/';



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
        $handle->image_x = 300;
        $handle->image_y = 278;

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

    $TOUR_PACKAGE->picture_name = $imgName;

    $VALID->check($TOUR_PACKAGE, [
        'tourtype' => ['required' => TRUE],
        'name' => ['required' => TRUE],
        'description' => ['required' => TRUE],
        'picture_name' => ['required' => TRUE]
    ]);


    if ($VALID->passed()) {
        $TOUR_PACKAGE->create();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your data was saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();

        header("location: ../manage-tour-package-sub-section.php?id=" . $TOUR_PACKAGE->id);
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['edit-tour-package'])) {
    $dir_dest = '../../upload/tour-package/';
    $dir_dest_thumb = '../../upload/tour-package/thumb/';

    $handle = new Upload($_FILES['picture_name']);

    $imgName = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = FALSE;
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $_POST ["oldImageName"];
        $handle->image_x = 300;
        $handle->image_y = 278;

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

            if ($handle->processed) {
                $info = getimagesize($handle->file_dst_pathname);
                $imgName = $handle->file_dst_name;
            }
        }
    }

    $TOUR_PACKAGE = new TourPackage($_POST['id']);

    $TOUR_PACKAGE->picture_name = $_POST['oldImageName'];
    $TOUR_PACKAGE->tourtype = filter_input(INPUT_POST, 'tourtype');
    $TOUR_PACKAGE->name = filter_input(INPUT_POST, 'name');
    $TOUR_PACKAGE->price = filter_input(INPUT_POST, 'price');
    $TOUR_PACKAGE->member = filter_input(INPUT_POST, 'member');
    $TOUR_PACKAGE->description = filter_input(INPUT_POST, 'description');

    $VALID = new Validator();

    $VALID->check($TOUR_PACKAGE, [
        'tourtype' => ['required' => TRUE],
        'name' => ['required' => TRUE],
        'price' => ['required' => TRUE],
        'description' => ['required' => TRUE],
        'picture_name' => ['required' => TRUE],
    ]);


    if ($VALID->passed()) {
        $TOUR_PACKAGE->update();

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

        $TOUR_PACKAGE = TourPackage::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}