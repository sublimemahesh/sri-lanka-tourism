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



