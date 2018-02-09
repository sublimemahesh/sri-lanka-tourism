<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');

if ($_POST['option'] == 'delete') {

    $TOUR_PACKAGE = new TourPackage($_POST['id']);

    unlink(Helper::getSitePath() . "upload/tour-package/" . $TOUR_PACKAGE->picture_name);


    $result = $TOUR_PACKAGE->delete();

    if ($result) {

        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}