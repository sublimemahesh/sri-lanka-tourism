<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');

if ($_POST['option'] == 'delete') {

    $ROOM_PHOTO = new RoomPhoto($_POST['id']);
    unlink(Helper::getSitePath() . "upload/accommodation/rooms/" . $ROOM_PHOTO->image_name);
    unlink(Helper::getSitePath() . "upload/accommodation/rooms/thumb/" . $ROOM_PHOTO->image_name);
    $result = $ROOM_PHOTO->delete();

    if ($result) {

        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}

