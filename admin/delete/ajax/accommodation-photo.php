<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');

if ($_POST['option'] == 'delete') {

    $ACCOMODATION_PHOTO = new AccommodationPhoto($_POST['id']);

    unlink('../../../upload/accommodation/' . $ACCOMODATION_PHOTO->image_name);
    unlink('../../../upload/accommodation/thumb/' . $ACCOMODATION_PHOTO->image_name);

    $result = $ACCOMODATION_PHOTO->delete();


    if ($result) {

        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}