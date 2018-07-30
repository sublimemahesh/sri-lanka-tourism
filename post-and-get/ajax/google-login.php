<?php
header('Content-Type: application/json; charset=UTF8');
include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['memberLogin'])) {

    $back = "";
    if (!isset($_SESSION)) {
        session_start();
    }
    if (isset($_SESSION['back_url'])) {
        $back = $_SESSION['back_url'];
    }


    $response = array();

    $visitorID = $_POST["userID"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $picture = $_POST["picture"];
    $password = $_POST["userID"];

    $VISITOR = New Visitor(NULL);

    $isFbIdIsEx = $VISITOR->isGoogleIdIsEx($visitorID);

    if ($isFbIdIsEx == false) {

        $res = $VISITOR->createByGoogle($name, $email, $picture, $visitorID, $password);

        if ($res === false) {
            $response['message'] = 'error-log';
            echo json_encode($response);
            exit();
        } else {
            if ($back <> '') {
                $response['message'] = 'success-cre';
                $response['back'] = $back;
                unset($_SESSION["back_url"]);
            } else {
                $response['message'] = 'success-cre';
                $response['back'] = '';
            }
            echo json_encode($response);
            exit();
        }
    } else {
        $res = $VISITOR->loginByGoogle($visitorID, $password);
        if ($res === false) {
            $response['message'] = 'error-log';
            echo json_encode($response);
            exit();
        } else {
            if ($back <> '') {
                $response['message'] = 'success-log';
                $response['back'] = $back;
                unset($_SESSION["back_url"]);
            } else {
                $response['message'] = 'success-log';
                $response['back'] = '';
            }
            echo json_encode($response);
            exit();
        }
    }
}