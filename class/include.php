<?php

include_once(dirname(__FILE__) . '/Setting.php');
include_once(dirname(__FILE__) . '/Helper.php');
include_once(dirname(__FILE__) . '/Upload.php');
include_once(dirname(__FILE__) . '/Database.php');
include_once(dirname(__FILE__) . '/User.php');
include_once(dirname(__FILE__) . '/Message.php');
include_once(dirname(__FILE__) . '/Validator.php');
include_once(dirname(__FILE__) . '/District.php');
include_once(dirname(__FILE__) . '/City.php');
include_once(dirname(__FILE__) . '/AccommodationType.php');
include_once(dirname(__FILE__) . '/Accommodation.php');
include_once(dirname(__FILE__) . '/Member.php');
include_once(dirname(__FILE__) . '/TourPackage.php');
include_once(dirname(__FILE__) . '/ArticleType.php');
include_once(dirname(__FILE__) . '/Article.php');
include_once(dirname(__FILE__) . '/TourSubSection.php');
include_once(dirname(__FILE__) . '/TourSubSectionPhoto.php');
include_once(dirname(__FILE__) . '/AccommodationPhoto.php');
include_once(dirname(__FILE__) . '/VehicleType.php');
include_once(dirname(__FILE__) . '/Transports.php');
include_once(dirname(__FILE__) . '/AccommodationGeneralFacilities.php');
include_once(dirname(__FILE__) . '/TransportPhoto.php');
include_once(dirname(__FILE__) . '/TransportRates.php');
include_once(dirname(__FILE__) . '/offer.php');
include_once(dirname(__FILE__) . '/Visitor.php');
include_once(dirname(__FILE__) . '/Room.php');
include_once(dirname(__FILE__) . '/RoomFacility.php');
include_once(dirname(__FILE__) . '/RoomBasis.php');
include_once(dirname(__FILE__) . '/RoomPrice.php');
include_once(dirname(__FILE__) . '/AccommodationFacilityDetails.php');
include_once(dirname(__FILE__) . '/RoomFaciliityDetails.php');
include_once(dirname(__FILE__) . '/RoomPhoto.php');
include_once(dirname(__FILE__) . '/RoomAvailability.php');
include_once(dirname(__FILE__) . '/FuelType.php');
include_once(dirname(__FILE__) . '/VehicleCondition.php');
include_once(dirname(__FILE__) . '/Visitor.php');
include_once(dirname(__FILE__) . '/Search.php');

function dd($data) {
    var_dump($data);
    exit();
}

function redirect($url) {
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';

    echo $string;
    exit();
}
