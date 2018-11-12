<?php

ini_set('display_errors', 1);
include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');


if ($_POST['option'] == 'delete') {
    $VISITOR = new Visitor($_POST['id']);
    
    if(empty($VISITOR->facebookID) && empty($VISITOR->googleID)) {
        unlink(Helper::getSitePath() . "upload/visitor/" . $VISITOR->image_name);
    }
    $result = $VISITOR->delete();

    if ($result) {
        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}