<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

include_once(dirname(__FILE__) . '/../auth.php');

if (isset($_POST['add-visitor'])) {
    $VISITOR = new Visitor(NULL);
    $VALID = new Validator();

    $VISITOR->first_name = filter_input(INPUT_POST, 'name');
    $VISITOR->email = filter_input(INPUT_POST, 'email');
    $VISITOR->contact_number = filter_input(INPUT_POST, 'contact_number');
    $VISITOR->city = filter_input(INPUT_POST, 'city');

    $dir_dest = '../../upload/visitor/';

    $handle = new Upload($_FILES['image']);

    $imgName = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = Helper::randamId();
        $handle->image_x = 500;
        $handle->image_y = 500;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $VISITOR->image_name = $imgName;

    $VALID->check($VISITOR, [
        'first_name' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'contact_number' => ['required' => TRUE],
        'city' => ['required' => TRUE],
        'image_name' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $VISITOR->create();

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

if (isset($_POST['update-visitor'])) {

    $dir_dest = '../../upload/visitor/';

    $handle = new Upload($_FILES['image']);

    if (empty($_POST ["oldImageName"])) {
        $imgName = null;

        if ($handle->uploaded) {
            $handle->image_resize = true;
            $handle->file_new_name_ext = 'jpg';
            $handle->image_ratio_crop = 'C';
            $handle->file_new_name_body = Helper::randamId();
            $handle->image_x = 500;
            $handle->image_y = 500;

            $handle->Process($dir_dest);

            if ($handle->processed) {
                $info = getimagesize($handle->file_dst_pathname);
                $imgName = $handle->file_dst_name;
            }
        }
        $img = $imgName;
    } else {
        $imgName = null;
        if ($handle->uploaded) {
            $handle->image_resize = true;
            $handle->file_new_name_body = TRUE;
            $handle->file_overwrite = TRUE;
            $handle->file_new_name_ext = FALSE;
            $handle->image_ratio_crop = 'C';
            $handle->file_new_name_body = $_POST ["oldImageName"];
            $handle->image_x = 500;
            $handle->image_y = 500;

            $handle->Process($dir_dest);

            if ($handle->processed) {
                $info = getimagesize($handle->file_dst_pathname);
                $imgName = $handle->file_dst_name;
            }
        }
        $img = $_POST ["oldImageName"];
    }

    $VISITOR = new Visitor($_POST['id']);

    $VISITOR->image_name = $img;
    $VISITOR->first_name = mysql_real_escape_string($_POST['name']);
    $VISITOR->email = mysql_real_escape_string($_POST['email']);
    $VISITOR->contact_number = mysql_real_escape_string($_POST['contact_number']);
    $VISITOR->city = mysql_real_escape_string($_POST['city']);

    $VALID = new Validator();
    $VALID->check($VISITOR, [
        'image_name' => ['required' => TRUE],
        'first_name' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'contact_number' => ['required' => TRUE],
        'city' => ['required' => TRUE],
    ]);
    
    if ($VALID->passed()) {
        $VISITOR->update();
        $VISITOR->ChangeProPic($_POST['id'], $img);


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