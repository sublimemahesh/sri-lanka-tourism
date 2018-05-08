<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');

if ($_POST['option'] == 'delete') {

    $ARTICLE_PHOTO = new ArticlePhoto($_POST['id']);

    unlink(Helper::getSitePath() . "upload/article/" . $ARTICLE_PHOTO->image_name);
    unlink(Helper::getSitePath() . "upload/article/thumb/" . $ARTICLE_PHOTO->image_name);

    $result = $ARTICLE_PHOTO->delete();

    if ($result) {

        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}