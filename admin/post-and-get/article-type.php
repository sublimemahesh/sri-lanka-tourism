<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');

if (isset($_POST['add-article-type'])) {
    $ARTICLE_TYPE = new ArticleType(NULL);
    $VALID = new Validator();

    $ARTICLE_TYPE->name = filter_input(INPUT_POST, 'name');

    $VALID->check($ARTICLE_TYPE, ['name' =>
            ['required' => TRUE]
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

    $ARTICLE_TYPE->id = $_POST['id'];
    $ARTICLE_TYPE->name = $_POST['name'];

    $VALID = new Validator();
    $VALID->check($ARTICLE_TYPE, ['name' =>
            ['required' => TRUE]
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