<?php
include_once(dirname(__FILE__) . '/../class/include.php');

if (isset($_POST["actionMax"])) {
    
    $result = TourPackage::getMaxTourPrice();

    $max = $result['max'];
    header('Content-Type: application/json');

    echo json_encode($max);
    exit();
}

if (isset($_POST["actionMin"])) {
    
    $result = TourPackage::getMinTourPrice();

    $min = $result['min'];
    header('Content-Type: application/json');

    echo json_encode($min);
    exit();
}


