<?php
include './class/include.php';
if (!isset($_SESSION)) {
    session_start();
}
$TRANSPORTSOBJ = new Transports(NULL);
$TRANSPORTS_PHOTO = new TransportPhoto(NULL);
$TRANSPORT_RATEOBJ = new TransportRates(NULL);
$ACCOMMODATION_OBJ = new Accommodation(NULL);
$ACCOMMODATION_PHOTO = new AccommodationPhoto(NULL);
$ACCOMMODATION_TYPEOBJ = new AccommodationType(NULL);
$DISTRICT_OBJ = new District(NULL);
$DISTRICT = $DISTRICT_OBJ->all();
$ACCOMMODATION_TYPE = $ACCOMMODATION_TYPEOBJ->all();
$TOURTYPES = TourType::all();
$ARTICLETYPES = ArticleType::all();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sri Lanka || Tourism</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="sri lanka tourism, tourism in sri lanka, Sri Lanka, tours in sri lanka, taxi in sri lanka, tourism sri lanka, rent a cars in sri lanka, transports in sri lanka, transport ways in sri lanka, sri lanka transports, vehicles in sri lanka, tour packages in sri lanka, holiday in sri lanka, visit sri lanka, accommodations sri lanka, hotels in sri lanka, Accommodations, Hotels, tour packages offers, taxi offers, transport offers, articles in sri lanka">
        <meta name="description" content="Tourism in Sri Lanka is growing rapidly. For centuries, Sri Lanka has been a popular place of attraction for foreign travelers. The team Sri Lanka Tourism crew is privileged to show you and to take you around the most beautiful places in Sri Lanka. You can Plan your tour with Sri Lanka Tourism and, tours are judiciously planned and customized to meet your needs. And also, Sri Lanka Tourism features well established taxi service and hotel service. So your trip will be everything you imagined and much more.">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/owl.carousel.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link href="css/search.css" rel="stylesheet" type="text/css"/>
        <link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet"> 
        <link href="css/price-range/normalize.css" rel="stylesheet" type="text/css"/>
        <link href="css/price-range/ion.rangeSlider.css" rel="stylesheet" type="text/css"/>
        <link href="css/price-range/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css"/>
        <link href="css/index-accommodation-all.css" rel="stylesheet" type="text/css"/>
    </head>
    <style>
        .owl -carousel.owl -stage, .owl -carousel.owl -drag.owl -item{
            -ms-touch-action: auto;
            touch-action: auto;
        }
    </style>
    <body>
        <!-- Our Resort Values style-->
        <?php
        include './header.php';
        ?>
        <div class="container-fluid">
            <div class="row background-image" style="background-image: url('images/hotel/back.jpg');">
                <div class="container body-style">
                    <div class=" text-center">
                        <div class=" col-md-12 hidden-sm hidden-xs">
                            <ul class="nav nav-pills center-block" style="width:650px;">
                                <li class="btn-nav">
                                    <a data-toggle="pill" href="#taxi" class="space-adjust top-link-button">
                                        <div>
                                            <img src="images/frontal-taxi-cab.png" alt=""/>
                                            <span class="select-ico-title">Taxi</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="btn-nav ">
                                    <a data-toggle="pill" href="#tour" class="space-adjust top-link-button"> 
                                        <div>
                                            <img src="images/earth-paradise.png" alt=""/>
                                            <span class="select-ico-title">Tours</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="btn-nav">
                                    <a data-toggle="pill" href="#hotel" class="space-adjust top-link-button">
                                        <div>
                                            <img src="images/3d-building.png" alt=""/>
                                            <span class="select-ico-title">Hotels</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="btn-nav ">
                                    <a data-toggle="pill" href="#offer" class="space-adjust top-link-button">
                                        <div>
                                            <img src="images/discount(1).png" alt=""/>
                                            <span class="select-ico-title">Offers</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="btn-nav ">
                                    <a data-toggle="pill" href="#article" class="space-adjust top-link-button">
                                        <div>
                                            <img src="images/learning.png" alt=""/>
                                            <span class="select-ico-title">Articles</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="btn-nav ">
                                    <a data-toggle="pill" href="#sea" class="space-adjust top-link-button">
                                        <div>
                                            <img src="images/icon/search11.png" alt=""/>
                                            <span class="select-ico-title">Search</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mobile-section col-sm-12 col-xs-12 visible-xs visible-sm hidden-lg hidden-md">
                            <div class="mobile" style=" z-index: 900; position: relative;">
                                <div class="col-xs-2 mobile-view padding-l">
                                    <a data-toggle="pill" href="#taxi">
                                        <div>
                                            <img src="images/frontal-taxi-cab.png" alt="" class="mobile-view-ico"/>
                                            <span class="select-ico-title">Taxi</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-2 mobile-view padding-l">
                                    <a data-toggle="pill" href="#tour"> 
                                        <div>
                                            <img src="images/earth-paradise.png" alt="" class="mobile-view-ico"/>
                                            <span class="select-ico-title">Tour</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-2 mobile-view padding-l">
                                    <a data-toggle="pill" href="#hotel">
                                        <div>
                                            <img src="images/3d-building.png" alt="" class="mobile-view-ico"/>
                                            <span class="select-ico-title">Hotel</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-2 mobile-view padding-l">
                                    <a data-toggle="pill" href="#offer">
                                        <div>
                                            <img src="images/discount(1).png" alt="" class="mobile-view-ico"/>
                                            <span class="select-ico-title">Offer</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-2 mobile-view padding-l">
                                    <a data-toggle="pill" href="#article">
                                        <div>
                                            <img src="images/learning.png" alt="" class="mobile-view-ico"/>
                                            <span class="select-ico-title">Article</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-2 mobile-view padding-l">
                                    <a data-toggle="pill" href="#sea">
                                        <div>
                                            <img src="images/icon/search11.png" alt="" class="mobile-view-ico"/>
                                            <span class="select-ico-title">Search</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 center-all">
                        <div class="tab-content">
                            <div id="taxi" class="tab-pane fade in active">
                                <h3 class="select-op-header text-center text-top">Taxi</h3>
                                <form method="get" name="form" action="transports.php" >
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-12 taxi-title">
                                            <span class="span-style">With Driver or Self Drive</span>
                                            <select class="form-control margin-bot-18 taxi-combo" autocomplete="off" id="driver" type="text" name="driver" autocomplete="off">
                                                <option value="with_driver">With Driver</option>
                                                <option value="self_driver">Self Drive</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 taxi-title">
                                            <span class="span-style">Picking Up</span>
                                            <input type="text" autocomplete="off" id="from" placeholder="Please Select Pick Up City" class="input-text">
                                            <div id="suggesstion-box">
                                                <ul id="city-list-from" class="city-list"></ul>
                                            </div>
                                            <input type="hidden" name="from" value="" id="from-id" />
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 taxi-title" id="dropping_off">
                                            <span class="span-style">Dropping Off</span>
                                            <input type="text" id="to" autocomplete="off" placeholder="Please Select Drop down city" class="input-text">
                                            <div id="suggesstion-box">
                                                <ul id="city-list-to" class="city-list"></ul>
                                            </div>
                                            <input type="hidden" name="to" value="" id="to-id" />
                                        </div>
                                    </div>
                                    <div class="row taxi-body">
                                        <div class="col-md-4 col-sm-6">
                                            <span class="span-style">Vehicle Type</span>
                                            <select class="form-control margin-bot-18 taxi-combo" autocomplete="off" type="text" id="type" autocomplete="off" name="type">
                                                <option value="">All</option>
                                                <?php foreach (VehicleType::all() as $key => $vehicle_t) {
                                                    ?>
                                                    <option value="<?php echo $vehicle_t['id']; ?>"><?php echo $vehicle_t['name']; ?></option><?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <span class="span-style">Your Budget</span>
                                            <select class="form-control margin-bot-18 taxi-combo" autocomplete="off" type="text" id="condition" autocomplete="off" name="condition">
                                                <option value=""> --select-- </option>
                                                <?php foreach (VehicleCondition::all() as $key => $vehicle_c) {
                                                    ?>
                                                    <option value="<?php echo $vehicle_c['id']; ?>"><?php echo $vehicle_c['name']; ?></option><?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <span class="span-style">Number of Passengers</span>
                                            <input type="text" name="passengers" placeholder="Minimum Number of Passangers" class="check-out">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 btn-search">
                                            <button class="btn-style">Search</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="owl-carousel tour-slider" id="transport-slider">
                                    <?php
                                    $TRANSPORT = $TRANSPORTSOBJ->all();
                                    foreach ($TRANSPORT as $transport) {
                                        $transport_photos = $TRANSPORTS_PHOTO->getTransportPhotosById($transport['id']);
                                        $condition = new VehicleCondition($transport['condition']);
                                        $vehicle_type = new VehicleType($transport['vehicle_type']);
                                        $fuel_type = new FuelType($transport['fuel_type'])
                                        ?>
                                        <div  class="index-transport-container">
                                            <?php
                                            foreach ($transport_photos as $key => $transport_photo) {
                                                if ($key == 0) {
                                                    ?>
                                                    <a href="transportation-view.php?id=<?php echo $transport['id']; ?>">
                                                        <span class="price">
                                                            <?php
                                                            $result = Feedback::getRatingByTransport($transport['id']);
                                                            $rate_count = $result['rate_count'];
                                                            $starNumber = round($result['rate_avg']);

                                                            for ($x = 1; $x <= $starNumber; $x++) {
                                                                echo '<i class="fa fa-star"></i>';
                                                            }
                                                            while ($x <= 5) {
                                                                echo '<i class="fa fa-star-o"></i>';
                                                                $x++;
                                                            }
                                                            ?>
                                                        </span>
                                                        <img src="upload/transport/thumb/<?php echo $transport_photo['image_name'] ?>" alt=""/>
                                                    </a>

                                                    <?php
                                                }
                                            }
                                            ?>
                                            <div class="transport-bot-container">  
                                                <a href="transportation-view.php?id=<?php echo $transport['id']; ?>">
                                                    <div class="transport-bot-title"> <?php
                                                        echo substr($transport['title'], 0, 23);
                                                        if (strlen($transport['title']) > 23) {
                                                            echo '...';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="vehicle-options-container">
                                                        <div class="col-md-12">
                                                            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                                                                <img class="index-transport-ico" src="images/transport/passenges.png"><div>
                                                                    <span class="transport-ico-txt"><?php echo $transport['no_of_passangers'] ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                                                                <img class="index-transport-ico" src="images/transport/001-suitcase.png"><div>
                                                                    <span class="transport-ico-txt"><?php echo $transport['no_of_baggages'] ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                                                                <img class="index-transport-ico" src="images/transport/004-car.png"><div>
                                                                    <span class="transport-ico-txt"><?php echo $transport['no_of_doors'] ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="vehicle-options-bottom">
                                                        <div class="vehicle-options-heading">Vehicle Type : <?php echo $vehicle_type->name ?></div>
                                                        <div class="vehicle-options-heading">Registered Year :  <?php echo $transport['registered_year'] ?></div>
                                                        <div class="vehicle-options-heading">Fuel Type : <?php echo $fuel_type->name; ?></div>
                                                        <div class="vehicle-options-heading">Air Conditioned : 
                                                            <?php
                                                            if ($transport['ac'] == 1) {
                                                                ?>
                                                                <span>yes</span>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <span>no</span>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="vehicle-options-heading">Condition : <?php
                                                            echo substr($condition->name, 0, 13);
                                                            if (strlen($condition->name) > 13) {
                                                                echo '...';
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="read_more">
                                                    <a href="transportation-view.php?id=<?php echo $transport['id']; ?>" class="read_more_button">View More
                                                        <i class="fa fa-long-arrow-right"></i>
                                                    </a>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 btn-search">
                                        <a href="transports.php"><button class="btn-style">View All</button></a> 
                                    </div>
                                </div>
                            </div>
                            <div id="tour" class="tab-pane fade">
                                <h3 class="select-op-header text-center">Tour</h3>
                                <form method="get" name="form" action="view-tour-packages.php" >
                                    <div id="taxi" class="tab-pane fade in active">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                                <span class="span-style">Tour</span>
                                                <input type="text" name="keyword" placeholder="Tour Name" class="input-text">
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                                <span class="span-style">Number of Dates</span>
                                                <input type="number" name="noofdates" placeholder="" class="input-text" min="0">
                                            </div>
                                        </div>
                                        <div class="row taxi-body">
                                            <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                                <span class="span-style">Tour Type</span>
                                                <select name="type" class="form-control taxi-combo" id="tourtypes">
                                                    <option value="" selected="">-- Please select a tour type--</option>
                                                    <?php
                                                    foreach ($TOURTYPES as $TOURTYPE) {
                                                        ?>
                                                        <option value="<?php echo $TOURTYPE['id']; ?>"><?php echo $TOURTYPE['name']; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                                <span class="span-style">Price</span>
                                                <div>
                                                    <input type="text" id="range" value="" name="range" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 btn-search">
                                                <button class="btn-style">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="owl-carousel tour-slider" id="tour-slider">
                                    <?php
                                    foreach ($TOURTYPES as $TOURTYPE) {
                                        ?>
                                        <div>
                                            <a href="view-tour-packages.php?type=<?php echo $TOURTYPE['id']; ?>">
                                                <img src="upload/tour-type/<?php echo $TOURTYPE['picture_name']; ?>" alt=""/>
                                                <?php
                                                if (strlen($TOURTYPE['name']) > 12) {
                                                    ?>
                                                    <div class="tour-heading pull-left" title="<?php echo strtoupper($TOURTYPE['name']); ?>"><?php echo substr(strtoupper($TOURTYPE['name']), 0, 11) . '...'; ?></div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="tour-heading tour-heading1 pull-left" title="<?php echo strtoupper($TOURTYPE['name']); ?>"><?php echo strtoupper($TOURTYPE['name']); ?></div>
                                                    <?php
                                                }
                                                ?>
                                                <div class="tour-arrow tour-arrow1 white pull-right"><img src="images/icon/arrow2.png" alt=""/></div>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 btn-search btn-view">
                                        <a href="view-alltour.php"><button class="btn-style">View All</button></a> 
                                    </div>
                                </div>
                            </div>
                            <div id="hotel" class="tab-pane fade">
                                <h3 class="select-op-header text-center">Hotel</h3>
                                <form method="get" name="form" action="accommodation.php" >
                                    <div id="taxi" class="tab-pane fade in active">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                                <span class="span-style">Hotel Name</span>
                                                <input type="text" name="keyword"  placeholder="Hotel Name" class="input-text">
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                                <span class="span-style">Accommodation type</span>
                                                <select name="type" class="form-control taxi-combo">
                                                    <option value="" selected="">-- Please select a accommodation type--</option>
                                                    <?php
                                                    foreach ($ACCOMMODATION_TYPE as $accommodation_type) {
                                                        ?>
                                                        <option value="<?php echo $accommodation_type['id']; ?>"><?php echo $accommodation_type['name']; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                                <span class="span-style">District</span>
                                                <select name="district" class="form-control taxi-combo">
                                                    <option value="" selected="">-- Please select a District--</option>
                                                    <?php
                                                    foreach ($DISTRICT as $district) {
                                                        ?>
                                                        <option value="<?php echo $district['id']; ?>"><?php echo $district['name']; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                                <span class="span-style">City</span>

                                                <input type="text" autocomplete="off" id="city" placeholder="please select your city" class="input-text">
                                                <div id="suggesstion-box">
                                                    <ul id="city-list" class="city-list"></ul>
                                                </div>
                                                <input type="hidden" name="city" value="" id="city-id"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 btn-search">
                                                <button class="btn-style">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="owl-carousel accommodation-slider" id="accommodation-slider">
                                    <?php
                                    $ACCOMMODATION = $ACCOMMODATION_OBJ->all();
                                    foreach ($ACCOMMODATION as $accommodation) {
                                        $accommodation_photos = $ACCOMMODATION_PHOTO->getAccommodationPhotosById($accommodation['id']);
                                        $accommodation_type = new AccommodationType($accommodation['type']);
                                        $accommodaation_city = new City($accommodation['city']);
                                        ?>
                                        <div class="rh-mf-30">
                                            <div class="rh rh-feature-box">
                                                <a href="accommodation-view.php?id=<?php echo $accommodation['id']; ?>">
                                                    <div class="rh-img">
                                                        <?php
                                                        foreach ($accommodation_photos as $key => $accommodation_photo) {
                                                            if ($key == 0) {
                                                                ?>
                                                                <img src="upload/accommodation/thumb/<?php echo $accommodation_photo['image_name'] ?>" alt="feature_1">
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </a>
                                                <div class="feature-detail">
                                                    <div class="index-ac-title-container" style="height: 45px;">
                                                        <h4><a href="accommodation-view.php?id=<?php echo $accommodation['id']; ?>"><?php
                                                                echo substr($accommodation['name'], 0, 40);
                                                                if (strlen($accommodation['name']) > 40) {
                                                                    echo '...';
                                                                }
                                                                ?>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div class="rating-star">
                                                        <ul>
                                                            <?php
                                                            $result = Feedback::getRatingByAccommodation($accommodation['id']);
                                                            $rate_count = $result['rate_count'];
                                                            $starNumber = round($result['rate_avg']);

                                                            for ($x = 1; $x <= $starNumber; $x++) {
                                                                echo '<li><i class="fa fa-star" aria-hidden="true"></i></li>';
                                                            }
                                                            while ($x <= 5) {
                                                                echo '<li><i class="fa fa-star-o" aria-hidden="true"></i></li>';
                                                                $x++;
                                                            }
                                                            ?>
                                                        </ul>
                                                        <span><?php echo $rate_count; ?> Reviews</span>
                                                    </div>
                                                    <div class="ac-type">
                                                        <?php echo $accommodation_type->name; ?>
                                                    </div>
                                                    <div class="rh rh-city">
                                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                        <p><?php echo $accommodaation_city->name; ?></p>
                                                    </div>
                                                    <div class="foot-detail-container">
                                                        <div class="facilities-cont">
                                                            <?php
                                                            $ALL_FACILITIES = AccommodationFacilityDetails::getFacilitiesByAccommodationId($accommodation['id']);

                                                            $FACILITIES = explode(",", $ALL_FACILITIES['facility']);

                                                            foreach ($FACILITIES as $key => $facility) {
                                                                if ($key == 6) {
                                                                    break;
                                                                }
                                                                $ACCOMMODATION_FACILITY = new AccommodationGeneralFacilities($facility);
                                                                ?>
                                                                <div class="col-md-4 col-xs-4 col-sm-4 facility-ico">
                                                                    <img class="facility-ico-img" src="upload/accommodation-facilities-icons/<?php echo $ACCOMMODATION_FACILITY->image_name ?>">
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="text-center">
                                                            <a href="accommodation-view.php?id=<?php echo $accommodation['id']; ?>" class="ar-button">View More</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 btn-search">
                                        <a href="accommodation.php"><button class="btn-style">View All</button></a> 
                                    </div>
                                </div>
                            </div>
                            <div id="offer" class="tab-pane fade">
                                <h3 class="select-op-header text-center">Offers</h3>
                                <a href="view-offer.php?id=1"><div class="col-md-4 col-lg-4">
                                        <img src="images/offers/kdh.jpg" alt="" width="100%"/>
                                        <div class="offer-heading pull-left" title="TAXI"><b>TAXI</b></div>
                                        <div class="tour-arrow offer-arrow white pull-right"><img src="images/icon/arrow2.png" alt=""/></div>
                                    </div>
                                </a>
                                <a href="view-offer.php?id=2"> <div class="col-md-4 col-lg-4">
                                        <img src="images/offers/BACKPACKERS-ARE-WELCOME-TO-YATOURS-IN-SRI-LANKA-new.jpg" alt="" width="100%"/>
                                        <div class="offer-heading pull-left" title="TOURS"><b>TOURS</b></div>
                                        <div class="tour-arrow offer-arrow white pull-right"><img src="images/icon/arrow2.png" alt=""/></div>
                                    </div>
                                </a>
                                <a href="view-offer.php?id=3">
                                    <div class="col-md-4 col-lg-4">
                                        <img src="images/offers/017_thaprobaneNight.jpg" alt="" width="100%"/>
                                        <div class="offer-heading pull-left" title="TRAVEL"><b>HOTEL</b></div>
                                        <div class="tour-arrow offer-arrow white pull-right"><img src="images/icon/arrow2.png" alt=""/></div>
                                    </div>
                                </a>

                            </div>
                            <div id="article" class="tab-pane fade">
                                <h3 class="select-op-header text-center">Article</h3>
                                <form method="get" name="form" action="view-articles.php" >
                                    <div id="taxi" class="tab-pane fade in active">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 taxi-title">
                                                <span class="span-style">Keyword</span>
                                                <input type="text" name="keyword" placeholder="Article title" class="input-text">
                                            </div>
                                        </div>
                                        <div class="row taxi-body">

                                            <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                                <span class="span-style">Article Type</span>
                                                <select class="form-control taxi-combo" id="type" name="type">
                                                    <option value=""> --Please Select a article type-- </option>
                                                    <?php
                                                    foreach ($ARTICLETYPES as $article) {
                                                        ?>
                                                        <option value="<?php echo $article['id']; ?>"><?php echo $article['name']; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                                <span class="span-style">Location</span>
                                                <input type="text" autocomplete="off" id="article-city" placeholder="please select a city" class="input-text">
                                                <div id="suggesstion-box">
                                                    <ul id="article-city-list" class="city-list"></ul>
                                                </div>
                                                <input type="hidden" name="article-city" value="" id="article-city-id"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 btn-search">
                                                <button class="btn-style">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="owl-carousel article-slider" id="article-slider">
                                    <?php
                                    foreach ($ARTICLETYPES as $ARTICLETYPE) {
                                        ?>
                                        <div>
                                            <a href="view-articles.php?type=<?php echo $ARTICLETYPE['id']; ?>" title="<?php echo $ARTICLETYPE['name']; ?>">
                                                <img src="upload/article-type/<?php echo $ARTICLETYPE['picture_name']; ?>" alt=""/>
                                                <?php
                                                if (strlen($ARTICLETYPE['name']) > 10) {
                                                    ?>
                                                    <div class="article-heading pull-left" title="<?php echo strtoupper($ARTICLETYPE['name']); ?>"><?php echo substr(strtoupper($ARTICLETYPE['name']), 0, 9) . '...'; ?></div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="article-heading pull-left" title="<?php echo strtoupper($ARTICLETYPE['name']); ?>"><?php echo strtoupper($ARTICLETYPE['name']); ?></div>
                                                    <?php
                                                }
                                                ?>
                                                <div class="article-arrow white pull-right"><img src="images/icon/arrow2.png" alt=""/></div>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 btn-search btn-view1">
                                        <a href="view-articles.php"><button class="btn-style">View All</button></a> 
                                    </div>
                                </div>
                            </div>
                            <div id="sea" class="tab-pane fade">
                                <h3 class="select-op-header text-center">Search</h3>
                                <form method="get" name="form" action="view-search.php">
                                    <div id="taxi" class="tab-pane fade in active">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                                <span class="span-style">What are you looking for</span>
                                                <input type="text" name="keyword" placeholder="What are you looking for" class="input-text" autocomplete="off">
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                                <span class="span-style">Types</span>
                                                <select name="type" class="form-control taxi-combo" id="tourtypes" required>
                                                    <option value="all" selected>All</option>
                                                    <option value="taxi">Taxi</option>
                                                    <option value="tour">Tours</option>
                                                    <option value="hotel">Hotels</option>
                                                    <option value="offer">Offers</option>
                                                    <option value="article">Articles</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 btn-search">
                                                <button class="btn-style">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Resort Values style-->  
        <?php include './footer.php'; ?>
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="js/city-for-article.js" type="text/javascript"></script>
        <script src="js/city-to.js" type="text/javascript"></script>
        <script src="js/city-from.js" type="text/javascript"></script>
        <script src="js/city.js" type="text/javascript"></script>
        <script src="js/price-range/ion.rangeSlider.js" type="text/javascript"></script>
        <script src="js/price-range.js" type="text/javascript"></script>
        <script src="js/owl.carousel.min.js" type="text/javascript"></script>
        <script>
            $(function () {
                $("#datepicker").datepicker({
                    autoclose: true,
                    todayHighlight: true
                }).datepicker('update', new Date());
            });
            $(function () {
                $("#datepicker1").datepicker({
                    autoclose: true,
                    todayHighlight: true
                }).datepicker('update', new Date());
            });
            $(function () {
                $("#datepicker2").datepicker({
                    autoclose: true,
                    todayHighlight: true
                }).datepicker('update', new Date());
            });
            $(function () {
                $("#datepicker3").datepicker({
                    autoclose: true,
                    todayHighlight: true
                }).datepicker('update', new Date());
            });
            $(function () {
                $("#datepicker4").datepicker({
                    autoclose: true,
                    todayHighlight: true
                }).datepicker('update', new Date());
            });
            $(function () {
                $("#datepicker5").datepicker({
                    autoclose: true,
                    todayHighlight: true
                }).datepicker('update', new Date());
            });
        </script> 
        <script>
            $(document).ready(function () {

                $('#tour-slider').owlCarousel({
                    loop: true,
                    margin: 10,
                    responsiveClass: true,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    Vertical: true,
                    mouseDrag: true,
                    touchDrag: true,
                    animateOut: 'slideOutUp',
                    animateIn: 'slideInUp',
                    responsive: {
                        0: {
                            items: 1,
                            nav: true,
                            Vertical: true,
                            mouseDrag: true,
                            touchDrag: true,
                        },
                        400: {
                            items: 2,
                            nav: true
                        },
                        600: {
                            items: 3,
                            nav: true,
                            Vertical: true,
                            mouseDrag: true,
                            touchDrag: true,
                            animateOut: 'slideOutUp',
                            animateIn: 'slideInUp'

                        },
                        1000: {
                            items: 3,
                            nav: true,
                            loop: true
                        },
                        1200: {
                            items: 5,
                            nav: true,
                            loop: true
                        }
                    }

                });
                $('#accommodation-slider').owlCarousel({

                    loop: true,
                    margin: 10,
                    responsiveClass: true,
                    autoplay: true,
                    autoplayTimeout: 2000,
                    autoplayHoverPause: true,
                    responsive: {
                        0: {
                            items: 1,
                            nav: true
                        },
                        400: {
                            items: 2,
                            nav: true
                        },
                        600: {
                            items: 3,
                            nav: true
                        },
                        1000: {
                            items: 3,
                            nav: true,
                            loop: true
                        },
                        1200: {
                            items: 4,
                            nav: true,
                            loop: true
                        }
                    }
                });
                $('#transport-slider').owlCarousel({

                    loop: true,
                    margin: 10,
                    responsiveClass: true,
                    autoplay: true,
                    autoplayTimeout: 2000,
                    autoplayHoverPause: true,
                    responsive: {
                        0: {
                            items: 1,
                            nav: true
                        },
                        400: {
                            items: 2,
                            nav: true
                        },
                        600: {
                            items: 2,
                            nav: true
                        },
                        1000: {
                            items: 3,
                            nav: true,
                            loop: true
                        },
                        1200: {
                            items: 5,
                            nav: true,
                            loop: true
                        }
                    }
                });
                $('#article-slider').owlCarousel({
                    loop: true,
                    margin: 10,
                    responsiveClass: true,
                    autoplay: true,
                    autoplayTimeout: 2000,
                    autoplayHoverPause: true,
                    nav: true,
                    responsive: {
                        0: {
                            items: 1,
                            nav: true
                        },
                        400: {
                            items: 2,
                            nav: true
                        },
                        600: {
                            items: 3,
                            nav: true
                        },
                        1000: {
                            items: 3,
                            nav: true,
                            loop: true
                        },
                        1200: {
                            items: 5,
                            nav: true,
                            loop: true
                        }
                    }
                });
            });
        </script>
        <script type="text/javascript">
            $(function () {
                $("#driver").change(function () {
                    if ($(this).val() == "self_driver") {
                        $("#dropping_off").hide();
                    } else {
                        $("#dropping_off").show();
                    }
                });
            });
        </script>
    </body> 
</html>
