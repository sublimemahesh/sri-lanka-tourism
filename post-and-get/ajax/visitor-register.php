<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if ($_POST['save']) {
    if (isset($_POST['back_url'])) {
        $back = $_POST['back_url'];
    } else {
        $back = "";
    }

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
    } else if (empty($_POST['contact_number'])) {
        $response['status'] = 'error';
        $response['message'] = "Please enter contact number.";
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
            $response['status'] = 'registered';
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
            $VISITOR->contact_number = filter_input(INPUT_POST, 'contact_number');
//            dd($VISITOR->contact_number);
            $VISITOR->create();


            if ($VISITOR->id) {
                $login = $VISITOR->login($VISITOR->email, $VISITOR->password);
                if ($login) {
                    $vid = $VISITOR->id;
                    $phoneno = $VISITOR->contact_number;
                    $code = Visitor::generatePhoneNoVerifyCode($vid);
                    $message = "Your Sri Lanka Tourism Verification code is " . $code;
                    $sendmsg = Helper::sendSMS($phoneno, $message);

                    if ($sendmsg) {
                        $response['status'] = 'success';

                        if (!isset($_SESSION)) {
                            session_start();
                        }
                        $_SESSION['registered'] = TRUE;
                        if ($back <> '') {
                            $_SESSION['back'] = $back;
                            unset($_SESSION["back_url"]);
                        }
                        echo json_encode($response);
                        exit();
                    } else {
                        $response['status'] = 'notdelivered';
                        if ($back <> '') {
                            $response['back'] = $back;
                        } else {
                            $response['back'] = '';
                        }
                    }
                    echo json_encode($response);
                    exit();
                }
//                if ($back <> '') {
//                    $response['status'] = 'success';
//                    $response['back'] = $back;
//                    unset($_SESSION["back_url"]);
//                } else {
//                    $response['status'] = 'success';
//                    $response['back'] = '';
//                }
//                echo json_encode($response);
            } else {
                $response['status'] = 'error';
                $response['message'] = "Oops. Something went wrong, Please try again.";
                echo json_encode($response);
                exit();
            }
        }
    }
}