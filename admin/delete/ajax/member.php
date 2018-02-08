<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');


if ($_POST['option'] == 'delete') {
    $MEMBER = new Member($_POST['id']);
    unlink(Helper::getSitePath() . "upload/member/" . $MEMBER->profile_picture);
    $result = $MEMBER->delete();

    if ($result) {
        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}