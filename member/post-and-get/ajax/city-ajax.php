<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');

if (!empty($_POST["keyword"])) {
    $CITY = new City(NULL);

    $result = $CITY->allCityByKeyword($_POST["keyword"]);
    header('Content-Type: application/json');

    echo json_encode($result);
    exit();
}

