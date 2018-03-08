<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');

if (isset($_POST['upload-profile-image'])) {

    $folder = '../../../upload/member';
    $imgName = Helper::randamId();

    $handle = new Upload($_FILES['pro-picture']);

    if ($handle->uploaded) {

        $handle->image_resize = true;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $imgName;

        $handle->image_x = 250;
        $handle->image_y = 250;

        $handle->Process($folder);

        if ($handle->processed) {


            Member::ChangeProPic($_POST["member"], $handle->file_dst_name);
            header('Content-Type: application/json');

            $result = [
                "filename" => $handle->file_dst_name,
                "message" => 'success'
            ];
            echo json_encode($result);
            exit();
        } else {

            header('Content-Type: application/json');

            $result = [
                "message" => 'error'
            ];
            echo json_encode($result);
            exit();
        }
    } else {

        header('Content-Type: application/json');

        $result = [
            "message" => 'error'
        ];
        echo json_encode($result);
        exit();
    }
}
 



