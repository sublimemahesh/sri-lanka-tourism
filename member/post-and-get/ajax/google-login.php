<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');

if (isset($_POST['memberLogin'])) {

    $userID = $_POST["userID"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $picture = $_POST["picture"];
    $password = $_POST["userID"];

    $MEMBER = New Member(NULL);

    $isFbIdIsEx = $MEMBER->isGoogleIdIsEx($userID);

    if ($isFbIdIsEx == false) {

        $res = $MEMBER->createByGoogle($name, $email, $picture, $userID, $password);
        
        header('Content-Type: application/json');

        $result = [
            "message" => 'success-cr'
        ];

        echo json_encode($result);
        exit();
    } else {

        $res = $MEMBER->loginByGoogle($userID, $password);

        if ($res === false) {

            header('Content-Type: application/json');

            $result = [
                "message" => 'error-log'
            ];

            echo json_encode($result);
            exit();
        } else {

            header('Content-Type: application/json');

            $result = [
                "message" => 'success-log'
            ];

            echo json_encode($result);
            exit();
        }
    }
}