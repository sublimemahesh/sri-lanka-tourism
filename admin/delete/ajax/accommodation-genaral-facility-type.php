<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');


if ($_POST['option'] == 'delete') {
    $ACCOMODATION_GENERAL_FACILITY = new AccommodationGeneralFacilities($_POST['id']);
    unlink('../../../upload/accommodation-facilities-icons/' . $ACCOMODATION_GENERAL_FACILITY->image_name);
    $result = $ACCOMODATION_GENERAL_FACILITY->delete();

    if ($result) {
        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}