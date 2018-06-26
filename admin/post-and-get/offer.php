<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

include_once(dirname(__FILE__) . '/../auth.php');

if (isset($_POST['create-offer'])) {
    $OFFER = new Offer(NULL);
    $VALID = new Validator();

    $OFFER->title = $_POST['title'];
    $OFFER->description = $_POST['description'];
    $OFFER->price = $_POST['price'];
    $OFFER->discount = $_POST['discount'];
    $OFFER->type = $_POST['type'];
    $OFFER->member = 0;
    $OFFER->url = $_POST['url'];
    $OFFER->is_active = $_POST['active'];

    $dir_dest = '../../upload/offer/';

    $handle = new Upload($_FILES['image']);

    $imgName = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = Helper::randamId();
        $handle->image_x = 500;
        $handle->image_y = 300;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $OFFER->image_name = $imgName;

    $VALID->check($OFFER, [
        'title' => ['required' => TRUE],
        'description' => ['required' => TRUE],
        'type' => ['required' => TRUE],
        'url' => ['required' => TRUE],
        'image_name' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $OFFER->create();

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

if (isset($_POST['update-offer'])) {

    $dir_dest = '../../upload/offer/';

    $handle = new Upload($_FILES['image']);

    $imgName = null;
    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = FALSE;
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $_POST ["oldImageName"];
        $handle->image_x = 500;
        $handle->image_y = 300;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $OFFER = new Offer($_POST['id']);

    $OFFER->title = $_POST['title'];
    $OFFER->description = $_POST['description'];
    $OFFER->price = $_POST['price'];
    $OFFER->discount = $_POST['discount'];
    $OFFER->type = $_POST['type'];
    $OFFER->url = $_POST['url'];
    $OFFER->member = 0;
    $OFFER->is_active = $_POST['active'];

    $VALID = new Validator();
    $VALID->check($OFFER, [
        'image_name' => ['required' => TRUE],
        'title' => ['required' => TRUE],
        'description' => ['required' => TRUE],
        'type' => ['required' => TRUE],
        'url' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $OFFER->update();

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

if (isset($_POST['arrange-data'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;

        $OFFER = Offer::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}