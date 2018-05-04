<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');

if (isset($_POST['add-article-type'])) {
    $ARTICLE_TYPE = new ArticleType(NULL);
    $VALID = new Validator();

    $ARTICLE_TYPE->name = filter_input(INPUT_POST, 'name');

    $dir_dest = '../../upload/article-type/';

    $handle = new Upload($_FILES['picture_name']);

    $imgName = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = Helper::randamId();
        $handle->image_x = 240;
        $handle->image_y = 440;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $ARTICLE_TYPE->picture_name = $imgName;

    $VALID->check($ARTICLE_TYPE, [
        'name' => ['required' => TRUE],
        'picture_name' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $ARTICLE_TYPE->create();

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

if (isset($_POST['edit-article-type'])) {
    
    $ARTICLE_TYPE = new ArticleType(NULL);

    $dir_dest = '../../upload/article-type/';
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
    }

    $ARTICLE_TYPE->id = $_POST['id'];
    $ARTICLE_TYPE->name = $_POST['name'];
    $ARTICLE_TYPE->picture_name = $_POST['oldImageName'];
    $ARTICLE_TYPE->sort = $_POST['sort'];

    $VALID = new Validator();
    $VALID->check($ARTICLE_TYPE, [
        'name' => ['required' => TRUE],
        'picture_name' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $ARTICLE_TYPE->update();

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