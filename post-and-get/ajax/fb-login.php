<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['memberLogin'])) {

    
    $visitorID = $_POST["userID"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $picture = $_POST["picture"];
    $password = substr(explode(".", $_POST["signedRequest"])[1], -7);

    $VISITOR = New Visitor(NULL);

    $isFbIdIsEx = $VISITOR->isFbIdIsEx($visitorID);


    if ($isFbIdIsEx == false) {
  
        $res = $VISITOR->createByFB($name, $email, $picture, $visitorID, $password);
      
//        if (!empty($res['email'])) {
//          
//            $member_id = $res['id'];
//            $member_name = $res['name'];
//            $member_email = $res['email'];
//            $isConfirmed = $res['isConfirmed'];
//
//            $HELPER = New Helper(Null);
//            $randomId = uniqid();
//
//            $MEMBERCONFIRMATION = New MemberConfirmation(NULL);
//            $result = $MEMBERCONFIRMATION->addNew($member_id, $randomId);
//            $sendmail = $MEMBERCONFIRMATION->sendMail($result);
//
//            $memberid = $sendmail["member_id"];
//            $membercode = $sendmail["code"];
//
//            $subject = 'Hi ' . $member_name;
//            $message = 'Help us secure your Siyal.lk account by verifying your email address (' . $member_email . '). <br><br> <a href="http://siyal.lk/verify-email.php?member=' . $memberid . '&&code=' . $membercode . '" target="blank"><font  style="color: #fff;background-color: #1400ff;padding: 8px;text-decoration: none;font-weight: 600;">Verify Email Address</font></a><br><br><br>Thanks.';
//            $Helper = new Helper();
//            $RESULT = $Helper->sendEmail($member_email, $memberid, $membercode, $subject, $message);
//             
//        }

        header('Content-Type: application/json');

        $result = [
            "message" => 'success-cr'
        ];

        echo json_encode($result);
        exit();
    } else {

        $res = $VISITOR->loginByFB($visitorID, $password);
 
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

