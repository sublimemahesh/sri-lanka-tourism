<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');

$ROOMAVAILOBJ = new RoomAvailability($_POST['room']);
$date = $_POST['date'];
$room = $_POST['room'];
$availablenow = (int) $_POST['availablenow'];
$newrooms = (int) $_POST['newrooms'];

$setAv = $availablenow - $newrooms;

if ($ROOMAVAILOBJ->getAvailableRoomByDate($date, $room)) {

    $ROOMAVAILOBJ->updateAvailable($room, $date, $setAv);
    $data = array("status" => TRUE);
    header('Content-type: application/json');
    echo json_encode($data);
} else {
    $ROOMAVAILOBJ->setAvailable($room, $date, $setAv);
    $data = array("status" => TRUE);
    header('Content-type: application/json');
    echo json_encode($data);
}




