<?php

include_once(dirname(__FILE__) . '/../class/include.php');


if (isset($_POST['register'])) {
    $VISITOR = new Visitor(NULL);
    $VALID = new Validator();


    $pw = md5($_POST['password']);
    $email = $_POST['email'];
    $cemail = $_POST['cnfemail'];



    if ($email == $cemail) {

        $VISITOR->first_name = filter_input(INPUT_POST, 'first_name');
        $VISITOR->second_name = filter_input(INPUT_POST, 'second_name');
        $VISITOR->email = $email;
        $VISITOR->contact_number = NULL;
        $VISITOR->city = NULL;
        $VISITOR->address = NULL;
        $VISITOR->image_name = NULL;
        $VISITOR->password = $pw;


        $VALID->check($VISITOR, [
            'first_name' => ['required' => TRUE],
            'second_name' => ['required' => TRUE],
            'email' => ['required' => TRUE],
            'password' => ['required' => TRUE]
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
        }
        header('Location: ../visitor-login.php?message=19');
    } else {
        header('Location: ../visitor-register.php?message=20');
    }
}

if (isset($_POST['login'])) {

    $VISITOR = new Visitor(NULL);

    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $password = md5(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
    $back = $_POST['back'];

    if ($VISITOR->login($email, $password)) {
        if (empty($back)) {
            header('Location: ../visitor-profile.php?message=5');
            exit();
        } else {
            redirect($back);
            exit();
        }

        
    } else {
        header('Location: ../visitor-login.php?message=21');
        exit();
    }
}

if (isset($_POST['update'])) {

    $VISITOR = new Visitor($_POST['id']);

    $VISITOR->first_name = mysql_real_escape_string($_POST['first_name']);
    $VISITOR->second_name = mysql_real_escape_string($_POST['second_name']);
    $VISITOR->email = filter_input(INPUT_POST, 'email');
    $VISITOR->contact_number = filter_input(INPUT_POST, 'contact_number');
    $VISITOR->city = filter_input(INPUT_POST, 'city');
    $VISITOR->address = filter_input(INPUT_POST, 'address');


    $VALID = new Validator();

    $VALID->check($VISITOR, [
        'first_name' => ['required' => TRUE],
        'second_name' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'contact_number' => ['required' => TRUE],
        'city' => ['required' => TRUE],
        'address' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $VISITOR->update();

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

if (isset($_POST['changePassword'])) {

    $OldPassOk = Visitor::checkOldPass($_POST["id"], $_POST["oldPass"]);
    if ($_POST["newPass"] === $_POST["confPass"]) {
        if ($OldPassOk) {
            $result = Visitor::changePassword($_POST["id"], $_POST["newPass"]);
            if ($result == 'TRUE') {
                header('location: ../change-password.php?message=4');
                exit();
            } else {
                header('location: ../change-password.php?message=14');
                exit();
            }
        } else {
            header('location: ../change-password.php?message=18');
            exit();
        }
    } else {
        header('location: ../change-password.php?message=17');
        exit();
    }
}
