<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');

if ($_POST['save']) {

    header('Content-Type: application/json; charset=UTF8');
    $response = array();
    if (isset($_POST['back_url'])) {
        $back = $_POST['back_url'];
    } else {
        $back = "";
    }

    if (empty($_POST['name'])) {
        $response['status'] = 'error';
        $response['message'] = "Please enter your name.";
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
        $response['message'] = "Please enter your contact number.";
        echo json_encode($response);
        exit();
    } else if (substr_count($_POST['contact_number'], '-') > 0 || substr_count($_POST['contact_number'], ' ') > 0 || substr_count($_POST['contact_number'], '(') > 0 || substr_count($_POST['contact_number'], ')') > 0) {
        $response['status'] = 'error';
        $response['message'] = "Please enter contact number without any characters except + as +123456789";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['password'])) {
        $response['status'] = 'error';
        $response['message'] = "Please enter the password.";
        echo json_encode($response);
        exit();
    } else {
        $MEMBER = new Member(NULL);
        $result = $MEMBER->checkEmail($_POST['email']);
        if ($result) {
            $response['status'] = 'registered';
            $response['message'] = "The email address you entered is already in use.";
            echo json_encode($response);
            exit();
        } else {

            $MEMBER = new Member(NULL);

            $pw = md5($_POST['password']);
            $email = $_POST['email'];
            $cemail = $_POST['cnfemail'];

            $MEMBER->name = filter_input(INPUT_POST, 'name');
            $MEMBER->email = $email;
            $MEMBER->contact_number = filter_input(INPUT_POST, 'contact_number');
            $MEMBER->password = $pw;
            $MEMBER->create();

            if ($MEMBER->id) {
                $login = $MEMBER->login($MEMBER->email, $MEMBER->password);
                if ($login) {
                    $mid = $MEMBER->id;
                    $phoneno = $MEMBER->contact_number;

                    $code = Member::generatePhoneNoVerifyCode($mid);
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
                        } else {
                            $_SESSION['back'] = '';
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
            } else {
                $response['status'] = 'error';
                $response['message'] = "Oops. Something went wrong, Please try again.";
                echo json_encode($response);
                exit();
            }
        }
    }
}


