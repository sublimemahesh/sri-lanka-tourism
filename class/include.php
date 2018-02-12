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
