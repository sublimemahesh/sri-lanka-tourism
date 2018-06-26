<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');


if ($_POST['option'] == 'delete') {
    $OFFER = new Offer($_POST['id']);


    $result = $OFFER->delete();
    unlink(Helper::getSitePath() . "upload/offer/" . $OFFER->image_name);
    unlink(Helper::getSitePath() . "upload/offer/thumb/" . $OFFER->image_name);
    if ($result) {
        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}