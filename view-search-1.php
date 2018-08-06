<?php
include_once(dirname(__FILE__) . '/class/include.php');

if (!isset($_SESSION)) {
    session_start();
}

$SEARCH = new Search(NULL);
$keyword = NULL;
$type = NULL;


/* search */
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}
if (isset($_GET['type'])) {
    $type = $_GET['type'];
}

$TRANSPORTS_PHOTO = new TransportPhoto(NULL);
$SEARCHDETAILS = $SEARCH->searchByKeywordAndType($keyword, $type);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sri Lanka || Tourism</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/styles.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link href="css/search.css" rel="stylesheet" type="text/css"/>
        <link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
        <link href="admin/plugins/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet">
        <link href="css/tour-package-styles.css" rel="stylesheet" type="text/css"/>
        <link href="css/accommodation.css" rel="stylesheet" type="text/css"/>
        <link href="css/offer-styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <!-- Our Resort Values style-->
        <?php
        include './header.php';
        ?>

        <div>
            <!--        <div class="background-image" style="background-image: url('images/hotel/sea.jpg');">-->
            <section>
                <div id="rooms-section" class="row-view">
                    <div class="inner-container container">
                        <div class="room-container clearfix">
                            <div class="col-md-12">
                                <?php
                                if ($type == 'taxi') {
                                    foreach ($SEARCHDETAILS as $transport) {
//                            dd($transport);
                                        $FUEL_TYPE = new FuelType($transport['fuel_type']);

                                        $VEHICLE_TYPE = new VehicleType($transport['vehicle_type']);
                                        $MEMBER = new Member($transport['member']);
                                        $result = Feedback::getRatingByTransport($transport['id']);
                                        $rate_count = $result['rate_count'];
                                        $starNumber = round($result['rate_avg']);
                                        ?>
                                        <div class="room-box row room-box-new animated-box" data-animation="fadeInUp">
                                            <?php
                                            foreach ($TRANSPORTS_PHOTO->getTransportPhotosById($transport['id']) as $key => $TRANSPORTS_P) {
                                                if ($key == 1) {
                                                    break;
                                                }
                                                ?>
                                                <div class="col-md-4 room-img" style=" background-color: #E6F9FF;">
                                                    <a target="blank" href="transportation-view.php?id=<?php echo $transport['id']; ?>">
                                                        <img class=" vehicle-img" src="upload/transport/thumb/<?php echo $TRANSPORTS_P['image_name']; ?>"/>
                                                    </a>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                            <div class="r-sec col-md-8">
                                                <div class="col-md-8 m-sec">
                                                    <div class="title-box">
                                                        <div class="title"><?php echo $transport['title']; ?></div>
                                                        <div class="">
                                                            <div title="Rated <?php echo $starNumber; ?> out of 5" class="" >
                                                                <span class="str" style="color: #FF9800">
                                                                    <?php
                                                                    for ($x = 1; $x <= $starNumber; $x++) {
                                                                        echo '<i class="fa fa-star"></i>';
                                                                    }
//                                                                            if (strpos($starNumber, '.')) {
//                                                                                echo '<img src="path/to/half/star.png" />';
//                                                                                $x++;
//                                                                            }
                                                                    while ($x <= 5) {
                                                                        echo '<i class="fa fa-star-o"></i>';
                                                                        $x++;
                                                                    }
                                                                    ?>

                                                                </span> (<?php echo $rate_count; ?> Reviews)
                                                            </div>
                    <!--                                                        <span class="brackets">(Based on 17 reviews)</span>-->
                                                        </div>
                                                    </div>
                                                    <div class="amenities">
                                                        <ul class="list-inline clearfix">
                                                            <li class="col-md-12">
                                                                <div class="title">Vehicle Type :</div>
                                                                <div class="value"><?php echo $VEHICLE_TYPE->name; ?></div>
                                                            </li>
                                                            <li class="col-md-12">
                                                                <div class="title">Reg: No :</div>
                                                                <div class="value"><?php echo $transport['registered_number']; ?></div>
                                                            </li>
                                                            <li class="col-md-12">
                                                                <div class="title">Reg: Year :</div>
                                                                <div class="value"><?php echo $transport['registered_year']; ?></div>
                                                            </li>
                                                            <li class="col-md-12">
                                                                <div class="title">Fuel Type :</div>
                                                                <div class="value"><?php echo $FUEL_TYPE->name; ?></div>
                                                            </li>
                                                            <li class="col-md-12 col-xs-12 " style="margin-top:10px;">
                                                                <div style="width: 15%"> <img class="index-transport-ico icon-bottom" src="images/transport/passenges.png"><span class="transport-ico-txt style-e" ><?php echo $transport['no_of_passangers'] ?></span>
                                                                </div>
                                                                <div style="width: 15%">  <img class="index-transport-ico icon-bottom" src="images/transport/001-suitcase.png"><span class="transport-ico-txt style-e"  ><?php echo $transport['no_of_baggages'] ?></span>
                                                                </div>
                                                                <div style="width: 15%"><img class="index-transport-ico icon-bottom" src="images/transport/004-car.png" >
                                                                    <span class="transport-ico-txt style-e"   ><?php echo $transport['no_of_doors'] ?></span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <?php
                                                $TRANSPORT_RATE = new TransportRates($transport['transport_rate']);
                                                ?>
                                                <div class="col-md-4 desc desc-price m-sec">
                                                    <div class="row driver m-sec">
                                                        <div class="profile col-md-5 col-xs-4 col-sm-4">
                                                            <a href="member-view.php?id=<?php echo $MEMBER->id; ?>" class="link">
                                                                <?php
                                                                if (empty($MEMBER->id)) {
                                                                    ?>
                                                                    <img src="images/admin-member-img.png" class="img-circle img-responsive vis-member-border"/>
                                                                    <?php
                                                                } else {
                                                                    if (empty($MEMBER->profile_picture)) {
                                                                        ?> 
                                                                        <img src="upload/member/member.png" class="img-circle img-responsive vis-member-border"/>
                                                                        <?php
                                                                    } else {
                                                                        if ($MEMBER->facebookID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                                            ?>
                                                                            <img src="<?php echo $MEMBER->profile_picture; ?>" class="img-circle img-responsive vis-member-border">
                                                                            <?php
                                                                        } elseif ($MEMBER->googleID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                                            ?>
                                                                            <img src="<?php echo $MEMBER->profile_picture; ?>" class="img-circle img-responsive vis-member-border">
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <img src="upload/member/<?php echo $MEMBER->profile_picture; ?>" class="img-circle img-responsive vis-member-border">
                                                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                                ?>

                                                            </a>
                                                        </div>
                                                        <div class="driver-name col-md-7 col-xs-8 col-sm-8"><div class="driver-name-posted">Posted by </div>
                                                            <span class="driver-name-span">
                                                                <?php
                                                                echo substr($MEMBER->name, 0, 10);
                                                                if (strlen($MEMBER->name) > 10) {
                                                                    echo '...';
                                                                }
                                                                ?>

                                                            </span>

                                                        </div>


                                                    </div>

                                                    <div class="col-md-12  icon-bottom" >
                                                        <img src="images/get in.png" alt="" width="30px"/>&nbsp;:<b><?php
                                                            $cityfrom = new city($TRANSPORT_RATE->location_from);
                                                            echo substr($cityfrom->name, 0, 10);
                                                            echo'..';
                                                            ?></b><br>
                                                        <img src="images/getout.png" alt="" width="30px"/><b>&nbsp;:<?php
                                                            $cityto = new City($TRANSPORT_RATE->location_to);
                                                            echo substr($cityto->name, 0, 10);
                                                            echo'..';
                                                            ?></b>

                                                    </div>

                                                    <div class="bottom-sec2 m-sec col-md-12">
                                                        <div class="pointer"><strong class="price">LKR <?php echo $transport['transport_price']; ?></strong></div>
                                                        <div class="btn-padding">
                                                            <a href="transport-booking.php?rate=<?php echo $transport['transport_rate']; ?>" class="more-info2">Book Now</a> 
                                                        </div>
                                                    </div>


                                                </div>

                                            </div>
                                        </div>
                                        <?php
                                    }
                                } else if ($type == 'tour') {
                                    foreach ($SEARCHDETAILS as $searchdetail) {
                                        $id = $searchdetail['id'];
                                        $result = TourSubSection::CountDaysInTour($id);
                                        $days = $result['days'];
                                        $night = (int) $days - 1;

                                        $MEMBER = new Member($searchdetail['member']);
                                        $TYPE = new TourType($searchdetail['tour_type']);
                                        ?>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="listing-box">
                                                <div class="listing-box-thumb">
                                                    <span class="price-list">LKR <?php echo $searchdetail['price']; ?></span>
                                                    <img src="upload/tour-package/thumb/<?php echo $searchdetail['picture_name']; ?>" alt="">
                                                </div>
                                                <div class="listing-rate-share">
                                                    <a href="member-view.php?id=<?php echo $MEMBER->id; ?>" title="<?php echo $MEMBER->name; ?>">
                                                        <?php
                                                        if (empty($MEMBER->id)) {
                                                            ?>
                                                            <img src="images/admin-member-img.png" class="img-circle img-responsive vis-member-border"/>
                                                            <?php
                                                        } else {
                                                            if (empty($MEMBER->profile_picture)) {
                                                                ?> 
                                                                <img src="upload/member/member.png" class="img-circle img-responsive vis-member-border"/>
                                                                <?php
                                                            } else {
                                                                if ($MEMBER->facebookID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                                    ?>
                                                                    <img src="<?php echo $MEMBER->profile_picture; ?>" class="img-circle img-responsive vis-member-border">
                                                                    <?php
                                                                } elseif ($MEMBER->googleID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                                    ?>
                                                                    <img src="<?php echo $MEMBER->profile_picture; ?>" class="img-circle img-responsive vis-member-border">
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <img src="upload/member/<?php echo $MEMBER->profile_picture; ?>" class="img-circle img-responsive vis-member-border">
                                                                    <?php
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </a>
                                                    <div class="tour-type-name">
                                                        <?php
                                                        if (strlen($TYPE->name) > 9) {
                                                            echo substr($TYPE->name, 0, 9) . '...';
                                                        } else {
                                                            echo $TYPE->name;
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="tour-bottom-container">
                                                    <div style="padding: 0px 0px 10px 20px;">
                                                        <div class="tour-title"><a href="tour-package-view.php?id=<?php echo $searchdetail['id']; ?>" title="">
                                                                <?php
                                                                if (strlen($searchdetail['name']) > 27) {
                                                                    echo substr($searchdetail['name'], 0, 27) . '...';
                                                                } else {
                                                                    echo $searchdetail['name'];
                                                                }
                                                                ?>
                                                            </a></div>  
                                                        <div class="" style="color: #9aa590; margin-top: 5px;">
                                                            <span><i class="fa fa-clock-o"></i> 
                                                                <?php
                                                                if ($days == 0) {
                                                                    echo '1 Day';
                                                                } else {
                                                                    echo $days . ' Days - ' . $night . ' Nights';
                                                                }
                                                                ?>
                                                            </span>
                                                        </div>

                                                    </div>


                                                    <div class="col-md-6 col-sm-6 col-xs-6">

                                                        <div class="rated-list">
                                                            <?php
                                                            $star_result = Feedback::getRatingByTour1($id);
                                                            $rate_count = $star_result['rate_count'];
                                                            $starNumber = round($star_result['rate_avg']);

                                                            for ($x = 1; $x <= $starNumber; $x++) {
                                                                echo '<b class="fa fa-star"></b>';
                                                            }
                                                            while ($x <= 5) {
                                                                echo ' <b class="fa fa-star-o"></b>';
                                                                $x++;
                                                            }
                                                            ?>
                                                            <div>
                                                                (<?php echo $rate_count; ?> Reviews)
                                                            </div>

                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6"><a href="tour-package-view.php?id=<?php echo $searchdetail['id']; ?>">
                                                            <div class="tour-view-more-btn">
                                                                View More
                                                            </div>
                                                        </a>

                                                    </div>


                                                </div>


                                            </div>
                                        </div>

                                        <?php
                                    }
                                } else if ($type == 'hotel') {
                                    $ACCOMMODATION_PHOTO = new AccommodationPhoto(NULL);
                                        foreach ($SEARCHDETAILS as $accommodation) {
                            $ACCOMMODATION_TYPE = new AccommodationType($accommodation['type']);
                            $MEMBER = new Member($accommodation['member']);
                            ?>
                            <div class="room">
                                <a target="blank" href="accommodation-view.php?id=<?php echo $accommodation['id']; ?>" class="">
                                    <div class="ribbon ribbon-top-left"><span><?php echo $accommodation['name']; ?></span>
                                    </div>
                                    <!--ROOM IMAGE-->
                                    <div class="r1 r-com">
                                        <?php
                                        foreach ($ACCOMMODATION_PHOTO->getAccommodationPhotosById($accommodation['id']) as $key => $ACCOMMODATION_P) {
                                            if ($key == 1) {
                                                break;
                                            }
                                            ?> 
                                            <img src="upload/accommodation/thumb/<?php echo $ACCOMMODATION_P['image_name']; ?>">
                                            <?php
                                        }
                                        ?>

                                    </div>
                                    <!--ROOM RATING-->

                                    <div class="r2 r-com">
                                        <h4>
                                            <?php echo $ACCOMMODATION_TYPE->name; ?>  
                                        </h4>
                                        <div class="r2-ratt">
                                            <?php
                                            $result = Feedback::getRatingByAccommodation($accommodation['id']);
                                            $rate_count = $result['rate_count'];
                                            $starNumber = round($result['rate_avg']);

                                            for ($x = 1; $x <= $starNumber; $x++) {
                                                echo '<i class="fa fa-star"></i>';
                                            }
//                                                                            if (strpos($starNumber, '.')) {
//                                                                                echo '<img src="path/to/half/star.png" />';
//                                                                                $x++;
//                                                                            }
                                            while ($x <= 5) {
                                                echo '<i class="fa fa-star-o"></i>';
                                                $x++;
                                            }
                                            ?>
                                            <p class="review-no">(<?php echo $rate_count; ?>Reviews)</p>
                                        </div>
                                        <ul>
                                            <div class="r2-available">LKR 65546</div>
                                            <li></li>
                                            <li></li>
                                        </ul>
                                    </div>

                                    <!--ROOM AMINITIES-->
                                    <div class="r3 r-com">
                                        <ul class="accommodation-facilities">
                                            <?php
                                            $ALL_FACILITIES = AccommodationFacilityDetails::getFacilitiesByAccommodationId($accommodation['id']);

                                            $FACILITIES = explode(",", $ALL_FACILITIES['facility']);

                                            foreach ($FACILITIES as $key => $facility) {
                                                if ($key == 5) {
                                                    break;
                                                }
                                                $ACCOMMODATION_FACILITY = new AccommodationGeneralFacilities($facility);
                                                ?>
                                                <li><img src="upload/accommodation-facilities-icons/<?php echo $ACCOMMODATION_FACILITY->image_name ?>" style="width: 15px;">&nbsp;<?php echo $ACCOMMODATION_FACILITY->name ?></li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </a>
                                <!--ROOM BOOKING BUTTON-->
                                <div class="r5 r-com">

                                    <a target="blank" href="member-view.php?id=<?php echo $MEMBER->id; ?>" class="link">
                                        <?php
                                        if (empty($MEMBER->id)) {
                                            ?>
                                            <img src="images/admin-member-img.png" class="img-circle img-responsive vis-member-border" style="width: 70px"/>
                                            <?php
                                        } else {
                                            if (empty($MEMBER->profile_picture)) {
                                                ?> 
                                                <img src="upload/member/member.png" class="img-circle img-responsive vis-member-border" style="width: 70px"/>
                                                <?php
                                            } else {
                                                if ($MEMBER->facebookID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                    ?>
                                                    <img src="<?php echo $MEMBER->profile_picture; ?>" class="img-circle img-responsive vis-member-border" style="width: 70px">
                                                    <?php
                                                } elseif ($MEMBER->googleID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                    ?>
                                                    <img src="<?php echo $MEMBER->profile_picture; ?>" class="img-circle img-responsive vis-member-border" style="width: 70px">
                                                    <?php
                                                } else {
                                                    ?>
                                                    <img src="upload/member/<?php echo $MEMBER->profile_picture; ?>" class="img-circle img-responsive vis-member-border" style="width: 70px">
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </a>

                              <!--                                    <p>Price for 1 night</p>-->
                                    <a href="accommodation-booking.php?accommodation=<?php echo $accommodation['id'] ?>"><div class="inn-room-book">Book Now</div></a> </div>
                            </div>
                            <?php
                        }
                        
                                    
                                } else if ($type == 'offer') {
                                    foreach ($SEARCHDETAILS as $offer) {
                                $discount = $offer['discount'];
                                $price = $offer['price'];
                                $new_price = $price - (($discount / 100) * $price);
                                $MEMBER = new Member($offer['member']);
                                ?>
                                <div class="hotel-item">

                                    <div class="ribbon"><span><?php echo $offer['discount'] ?>% off</span></div>
                                    <!-- hotel Image-->
                                    <div class="hotel-image">
                                        <a href="#">
                                            <div class="img"><img src="upload/offer/<?php echo $offer['image_name'] ?>" alt="" class="img-responsive"></div>
                                        </a>
                                    </div>
                                    <!-- hotel body-->
                                    <div class="offer-body">
                                        <!-- title-->
                                        <h3><?php echo $offer['title'] ?></h3>
                                        <!-- Text Intro-->
                                        <?php echo $offer['description'] ?>
                                    </div>
                                    <div class="hotel-right"> 
                                        <div>
                                            <a target="blank" href="member-view.php?id=<?php echo $MEMBER->id; ?>" class="link">

                                                <?php
                                                if (empty($MEMBER->id)) {
                                                    ?>
                                                    <img src="images/admin-member-img.png" class="img-circle img-responsive vis-member-border offer-member-img"/>
                                                    <?php
                                                } else {
                                                    if (empty($MEMBER->profile_picture)) {
                                                        ?> 
                                                        <img src="upload/member/member.png" class="img-circle img-responsive vis-member-border offer-member-img"/>
                                                        <?php
                                                    } else {
                                                        if ($MEMBER->facebookID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                            ?>
                                                            <img src="<?php echo $MEMBER->profile_picture; ?>" class="img-circle img-responsive vis-member-border offer-member-img">
                                                            <?php
                                                        } elseif ($MEMBER->googleID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                            ?>
                                                            <img src="<?php echo $MEMBER->profile_picture; ?>" class="img-circle img-responsive vis-member-border offer-member-img">
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <img src="upload/member/<?php echo $MEMBER->profile_picture; ?>" class="img-circle img-responsive vis-member-border offer-member-img">
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </a>
                                        </div>

                                        <div class="hotel-person"><span class="color-blue">LKR <?php echo $new_price; ?>.00</span><strike class="old-discount-price">LKR <?php echo $offer['price'] ?>.00</strike> </div>
                                        <a class="thm-btn" href="offer-booking.php?offer=<?php echo $offer['id']; ?>">Get your offer</a>

                                        <a href="visitor-message.php?id=<?php echo $MEMBER->id; ?>" class="thm-btn thm-msg" title="Send Message">
                                            <i class="fa fa-comment-o"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php }
                                    
                                } else if ($type == 'article') {
                                    foreach ($SEARCHDETAILS as $ARTICLE) {
                            $id = $ARTICLE['id'];

                            $MEMBER = new Member($ARTICLE['member']);
                            $TYPE = new ArticleType($ARTICLE['article_type']);
                            $CITY = new City($ARTICLE['city']);


                            $ARTICLE_PHOTO = new ArticlePhoto(NULL);
                            $article_photos = $ARTICLE_PHOTO->getArticlePhotosById($id);
                            ?>
                            <div class="tour-pack1 col-md-3 col-sm-4">
                                <div class="tour-pack article-pack">
                                    <div class="tour-img">
                                        <?php
                                        foreach ($article_photos as $key => $img) {
                                            if ($key == 0) {
                                                ?>
                                                <img src="upload/article/thumb/<?php echo $img['image_name']; ?>" alt=""/>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="article-rate pull-right">
                                        <?php
                                        $starNumber = Feedback::getRatingByArticle($id);

                                        for ($x = 1; $x <= $starNumber; $x++) {
                                            echo '<i class="fa fa-star"></i>';
                                        }

                                        while ($x <= 5) {
                                            echo '<i class="fa fa-star-o"></i>';
                                            $x++;
                                        }
                                        ?>
                                    </div>
                                    <div class="tour-dtls">
                                        <div class="row">
                                            <a href="article-view.php?id=<?php echo $ARTICLE['id']; ?>" title="<?php echo $ARTICLE['title']; ?>">
                                                <div class="tour-title col-md-9 pull-left">
                                                    <?php
                                                    if (strlen($ARTICLE['title']) > 18) {
                                                        echo substr($ARTICLE['title'], 0, 17) . '...';
                                                    } else {
                                                        echo $ARTICLE['title'];
                                                    }
                                                    ?>
                                                </div>
                                            </a>
                                            <div class="mem-img col-md-3">
                                                <a href="member-view.php?id=<?php echo $MEMBER->id; ?>" class="link">
                                                    <?php
                                                    if (empty($MEMBER->profile_picture)) {
                                                        ?> 
                                                        <img src="upload/member/member.png" class="img img-responsive img-thumbnail pull-right" id="profil_pic"/>
                                                        <?php
                                                    } else {

                                                        if ($MEMBER->facebookID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                            ?>
                                                            <img src="<?php echo $MEMBER->profile_picture; ?>" class="img-responsive thumbnail pull-right">
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <img src="upload/member/<?php echo $MEMBER->profile_picture; ?>" class="img-responsive thumbnail pull-right">
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row article-city" title="<?php echo $CITY->name; ?>"><i class="fa fa-location-arrow"></i> City: 
                                            <?php
                                            if (strlen($CITY->name) > 20) {
                                                echo substr($CITY->name, 0, 18) . '...';
                                            } else {
                                                echo $CITY->name;
                                            }
                                            ?>
                                        </div>

                                        <div class="row tour-desc"><?php echo substr($ARTICLE['description'], 0, 90) . '...'; ?></div>
                                        <div class="row">
                                            <div class="tour-type pull-left hidden-md hidden-sm visible-lg visible-xs" title="<?php echo $TYPE->name; ?>"><i class="fa fa-certificate"></i> 
                                                <?php
                                                if (strlen($TYPE->name) > 8) {
                                                    echo substr($TYPE->name, 0, 10) . '...';
                                                } else {
                                                    echo $TYPE->name . ' Type';
                                                }
                                                ?>
                                            </div>
                                            <div class="tour-type pull-left visible-md visible-sm" title="<?php echo $TYPE->name; ?>"><i class="fa fa-certificate"></i> 
                                                <?php
                                                if (strlen($TYPE->name) > 4) {
                                                    echo substr($TYPE->name, 0, 6) . '...';
                                                } else {
                                                    echo $TYPE->name . ' Type';
                                                }
                                                ?>
                                            </div>
                                            <a href="article-view.php?id=<?php echo $ARTICLE['id']; ?>"><div class="tour-btn pull-right btn btn-sm blue">Read More<span class="glyphicon glyphicon-eye-open"></span></div></a>
                                        </div> 

                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                                } else if ($type == 'all') {
                                    
                                }
                                ?>
                            </div>
                        </div>
                    </div>


                    <div class="row"></div>

                </div>
            </section>  
        </div>


        <!-- Our Resort Values style-->  
        <?php
        include './footer.php';
        ?>
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="assets/js/helper.js" type="text/javascript"></script>
        <script src="assets/js/template.js" type="text/javascript"></script>
    </body> 

</html>
