<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');

if ($_POST['option'] == 'delete') {

    $TOUR_SUB_PHOTO = new TourSubSectionPhoto($_POST['id']);
    unlink(Helper::getSitePath() . "upload/tour-package/sub-section/gallery/" . $TOUR_SUB_PHOTO->image_name);
    unlink(Helper::getSitePath() . "upload/tour-package/sub-section/gallery/thumb/" . $TOUR_SUB_PHOTO->image_name);
    $result = $TOUR_SUB_PHOTO->delete();

    if ($result) {

        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}

