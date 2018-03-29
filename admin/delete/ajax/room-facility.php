<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');


if ($_POST['option'] == 'delete') {
    $ROOM_FACILITY = new RoomFacility($_POST['id']);
    unlink('../../../upload/room-facility-icons/' . $ROOM_FACILITY->image_name);
    $result = $ROOM_FACILITY->delete();

    if ($result) {
        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}