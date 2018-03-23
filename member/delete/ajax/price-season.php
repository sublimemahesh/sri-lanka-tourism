<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');

$ROOMPRICEOBJ = new RoomPrice(NULL);

$start = $_POST['start'];
$end = $_POST['end'];

if ($ROOMPRICEOBJ->DeleteSeason($start, $end) === TRUE) {
    $data = array("status" => TRUE);
    header('Content-type: application/json');
    echo json_encode($data);
} else {
    $data = array("status" =>FALSE);
        header('Content-type: application/json');
        echo json_encode($data);
}

