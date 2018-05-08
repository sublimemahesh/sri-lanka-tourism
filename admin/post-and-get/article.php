<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');


if (isset($_POST['add-article'])) {

    $ARTICLE = New Article(NULL);
    $VALID = new Validator();

    date_default_timezone_set('Asia/Colombo');

    $todayis = date("Y-m-d g:i:s");

    $ARTICLE->title = $_POST['title'];
    $ARTICLE->created_date = $_POST['created_date'] . $todayis;
    $ARTICLE->article_type = $_POST['article_type'];
    $ARTICLE->city = $_POST['city'];
    $ARTICLE->location = $_POST['location'];
    $ARTICLE->member = $_POST['member'];
    $ARTICLE->description = $_POST['description'];

    $VALID->check($ARTICLE, [
        'title' => ['required' => TRUE],
        'article_type' => ['required' => TRUE],
        'city' => ['required' => TRUE],
        'location' => ['required' => TRUE],
        'description' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $ARTICLE->create();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your data was saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ../view-article-photos.php?id=' . $ARTICLE->id);
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['edit-article'])) {

    $ARTICLE = New Article($_POST['id']);
    $VALID = new Validator();

    $ARTICLE->title = $_POST['title'];
    $ARTICLE->location = $_POST['location'];
    $ARTICLE->description = $_POST['description'];

    $VALID->check($ARTICLE, [
        'title' => ['required' => TRUE],
        'location' => ['required' => TRUE],
        'description' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $ARTICLE->update();

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



