<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if ($_POST['save']) {

    header('Content-Type: application/json; charset=UTF8');
    $response = array();

    if (empty($_POST['f_name'])) {
        $response['status'] = 'error';
        $response['message'] = "Please enter your first name.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['s_name'])) {
        $response['status'] = 'error';
        $response['message'] = "Please enter your second name.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['email'])) {
        $response['status'] = 'error';
        $response['message'] = "Please enter your email.";
        echo json_encode($response);
        exit();
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $response['status'] = 'error';
        $response['message'] = "Please enter valid email.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['cnfemail'])) {
        $response['status'] = 'error';
        $response['message'] = "Please confirm your email.";
        echo json_encode($response);
        exit();
    } else if (!filter_var($_POST['cnfemail'], FILTER_VALIDATE_EMAIL)) {
        $response['status'] = 'error';
        $response['message'] = "Please enter valid email.";
        echo json_encode($response);
        exit();
    } else if ($_POST['email'] !== $_POST['cnfemail']) {
        $response['status'] = 'error';
        $response['message'] = "Your email and confirm email does not match.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['password'])) {
        $response['status'] = 'error';
        $response['message'] = "Please enter the password.";
        echo json_encode($response);
        exit();
    } else {
        $VISITOR = new Visitor(NULL);
        $result = $VISITOR->checkEmail($_POST['email']);
        if ($result) {
            $response['status'] = 'error';
            $response['message'] = "The email address you entered is already in use.";
            echo json_encode($response);
            exit();
        } else {
            $VISITOR = new Visitor(NULL);

            $pw = md5($_POST['password']);
            $email = $_POST['email'];

            $VISITOR->first_name = filter_input(INPUT_POST, 'f_name');
            $VISITOR->second_name = filter_input(INPUT_POST, 's_name');
            $VISITOR->email = $email;
            $VISITOR->password = $pw;
            $VISITOR->create();

            if ($VISITOR->id) {
                $VISITOR->login($VISITOR->email, $VISITOR->password);
                $response['status'] = 'success';
                echo json_encode($response);
            } else {
                $response['status'] = 'error';
                $response['message'] = "Oops. Something went wrong, Please try again.";
                echo json_encode($response);
                exit();
            }
        }
    }
}