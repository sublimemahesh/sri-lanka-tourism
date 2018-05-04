<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');

if ($_POST['option'] == 'delete') {

    $TRANSPORT_PHOTO = new TransportPhoto($_POST['id']);

    unlink(Helper::getSitePath() . "upload/transport/" . $TRANSPORT_PHOTO->image_name);
    unlink(Helper::getSitePath() . "upload/transport/thumb/" . $TRANSPORT_PHOTO->image_name);

    $result = $TRANSPORT_PHOTO->delete();

    if ($result) {

        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}