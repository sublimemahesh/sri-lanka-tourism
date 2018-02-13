<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');


if ($_POST['option'] == 'delete') {
    $VEHICLE_TYPE = new VehicleType($_POST['id']);

    $result = $VEHICLE_TYPE->delete();

    if ($result) {
        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}