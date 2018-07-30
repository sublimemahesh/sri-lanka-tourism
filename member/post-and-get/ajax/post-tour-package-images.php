<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');


//if($_POST['option'] == 'ADDIMAGE') {
//    $image = $_POST['image'];
//    dd($image);
//}


if (isset($_POST['upload-tour-sub-image'])) {

    $folder = '../../../upload/tour-package/sub-section/';
    $imgName = Helper::randamId();

    $handle = new Upload($_FILES['tour-sub-picture']);

    if ($handle->uploaded) {

        $handle->image_resize = true;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $imgName;
        $handle->image_watermark = '../../../images/watermark/watermark.png';

        $image_dst_x = $handle->image_dst_x;
        $image_dst_y = $handle->image_dst_y;
        $newSize = Helper::calImgResize(600, $image_dst_x, $image_dst_y);

        $image_x = (int) $newSize[0];
        $image_y = (int) $newSize[1];

        $handle->image_x = $image_x;
        $handle->image_y = $image_y;

        $handle->Process($folder);

        if ($handle->processed) {

            $handle1 = new Upload($_FILES['tour-sub-picture']);

            if ($handle1->uploaded) {

                $handle1->image_resize = true;
                $handle1->file_new_name_ext = 'jpg';
                $handle1->image_ratio_crop = 'C';
                $handle1->file_new_name_body = $imgName;
                $handle1->image_x = 300;
                $handle1->image_y = 260;

                $handle1->Process($folder . '/thumb');

                if ($handle1->processed) {
                    $info = getimagesize($handle->file_dst_pathname);
                    $img = $handle->file_dst_name;

                    $handle1->Clean();

                    $TOURSUBSECTIONPHOTOS = new TourSubSectionPhoto(NULL);
                    $TOURSUBSECTIONPHOTOS->image_name = $img;
                    $TOURSUBSECTIONPHOTOS->tour_sub_section = $_POST['toursubsection'];

                    $res = $TOURSUBSECTIONPHOTOS->create();
                    $id = $res->id;
                    $toursubsectionid = $res->tour_sub_section;

                    header('Content-Type: application/json');

                    $result = [
                        "id" => $id,
                        "toursubsection" => $toursubsectionid,
                        "filename" => $handle1->file_dst_name,
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

if ($_POST['option'] == 'DELETEIMAGE') {


    $TOURSUBSECTIONPHOTOS = new TourSubSectionPhoto($_POST['photoid']);
    unlink(Helper::getSitePath() . "upload/tour-package/sub-section/" . $TOURSUBSECTIONPHOTOS->image_name);
    unlink(Helper::getSitePath() . "upload/tour-package/sub-section/thumb/" . $TOURSUBSECTIONPHOTOS->image_name);
    $result = $TOURSUBSECTIONPHOTOS->delete();

    if ($result) {

        $data = array("status" => 'TRUE', "id" => $_POST['photoid'],"subid"=>$TOURSUBSECTIONPHOTOS->tour_sub_section);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}

if ($_POST['option'] == 'GETTOURSUBSECTIONDETAILS') {

    $TOURSUBSECTIONS = TourSubSection::GetTourSubSectionByTourPackage($_POST['tour']);
    
    echo json_encode($TOURSUBSECTIONS);
    exit();
}

if ($_POST['option'] == 'GETSUBSECTIONPHOTOS') {

    $TOURSUBSECTIONPHOTOS = TourSubSectionPhoto::getTourSubSectionPhotosById($_POST['subsection']);
    
    echo json_encode($TOURSUBSECTIONPHOTOS);
    exit();
}

if ($_POST['option'] == 'GETSUBSECTIONPHOTOCOUNT') {

    $TOURSUBSECTIONPHOTOS = TourSubSectionPhoto::getTourSubSectionPhotosById($_POST['subsection']);
    
    $arr = array();
    $count = count($TOURSUBSECTIONPHOTOS);
    
    $arr['count'] = $count;
    $arr['subid'] = $_POST['subsection'];
    
    echo json_encode($arr);
    exit();
}


