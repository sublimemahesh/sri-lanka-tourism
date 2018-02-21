<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['action'])) {

    $CITY = new City(NULL);

    $result = $CITY->GetCitiesByDistrict($_POST["distric"]);

    echo json_encode($result);
    header('Content-type: application/json');
    exit();
}

if (isset($_POST['actiongetSUB'])) {

    $SUBCAT = new Sub_category(NULL);

    $result = $SUBCAT->GetSubCategoryByCat($_POST["category"]);

    echo json_encode($result);
    header('Content-type: application/json');
    exit();
}




if (isset($_POST['actiongetBrand'])) {

    $BRAND = new Brand(NULL);

    $result = $BRAND->GetBrandBySubCat($_POST["subCategory"]);

    echo json_encode($result);
    header('Content-type: application/json');
    exit();
}


if (isset($_POST['upload-add-image'])) {

    $folder = '../../upload-files';
    $imgName = Helper::randamId();

    $handle = new Upload($_FILES['add-picture']);

    if ($handle->uploaded) {

        $handle->image_resize = true;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $imgName;
        $handle->image_watermark = '../../images/logo-watermark.png';

        $image_dst_x = $handle->image_dst_x;
        $image_dst_y = $handle->image_dst_y;
        $newSize = Helper::calImgResize(600, $image_dst_x, $image_dst_y);

        $image_x = (int) $newSize[0];
        $image_y = (int) $newSize[1];
        
        $handle->image_x = $image_x;
        $handle->image_y = $image_y;

        $handle->Process($folder);

        if ($handle->processed) {

            $handle1 = new Upload($_FILES['add-picture']);

            if ($handle1->uploaded) {

                $handle1->image_resize = true;
                $handle1->file_new_name_ext = 'jpg';
                $handle1->image_ratio_crop = 'C';
                $handle1->file_new_name_body = $imgName;
                $handle1->image_x = 300;
                $handle1->image_y = 220;

                $handle1->Process($folder . '/thumb');

                if ($handle1->processed) {

                    $handle1->Clean(); // we delete the temporary files

                    header('Content-Type: application/json');

                    $result = [
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
 



