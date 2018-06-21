<?php
include_once(dirname(__FILE__) . '/class/include.php');

if (!isset($_SESSION)) {
    session_start();
}

$id = $_GET["id"];
$ACCOMMODATIONS = new Accommodation($id);
$ACCOMMODATION_PHOTO = new AccommodationPhoto(NULL);
$ROOM_VIEW = new RoomFacility($id);
$ROOM_PHOTO = new RoomPhoto(NULL);
$MEMBER = new Member($ACCOMMODATIONS->member);
$ACCOMMODATION_TYPE = new AccommodationType($ACCOMMODATIONS->type);
$CITY = new City($ACCOMMODATIONS->city);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sri Lanka || Tourism</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link href="css/search.css" rel="stylesheet" type="text/css"/>
        <link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
        <!--<link href="css/style.css" rel="stylesheet" type="text/css"/>-->
        <link href="css/responsive-table.css" rel="stylesheet" type="text/css"/>
        <link href="visitor-feedback/validation-styles.css" rel="stylesheet" type="text/css"/>
        <link href="css/comments-style.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet"> 
        <link href="css/owl.carousel.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/accommodation-view.css" rel="stylesheet" type="text/css"/>
        <link href="css/responsive-table.css" rel="stylesheet" type="text/css"/>
    </head>
    <body style="background-color: #fff">
        <!-- Our Resort Values style-->
        <?php
        include './header.php';
        ?>
        <div id="page">
            <div class="page-header page-title-left page-title-pattern">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title hidden-sm hidden-xs"><?php echo $ACCOMMODATIONS->name ?></h1> 
                            <ul class="breadcrumb">
                                <li class="banner-bredcum-1">
                                    <a href="index.php">Home</a>
                                </li> 
                                <li class="active banner-bredcum-2">Accommodation</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
        </div>

        <div class="container transport-container">
            <div class="row">
                <div class="col-md-8">
                    <div id="accommodation_photos" class="galleria-slider">
                        <?php
                        $VIEW_ACCOMMODATION = AccommodationPhoto::getAccommodationPhotosById($id);
                        foreach ($VIEW_ACCOMMODATION as $key => $accommodation) {
                            ?>
                            <a href="upload/accommodation/<?php echo $accommodation['image_name']; ?>">
                                <img src="upload/accommodation/thumb/<?php echo $accommodation['image_name']; ?>" data-title="" >
                            </a>
                            <?php
                        }
                        ?>
                    </div>  
                </div>
                <div class="col-md-4">
                    <div class="sidebar">

                        <div class="widget-member">
                            <div class="row">
                                <p class="published-by">Published By</p>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-4">

                                    <a href="member-view.php?id=<?php echo $MEMBER->id; ?>" class="link">
                                        <?php
                                        if (empty($MEMBER->profile_picture)) {
                                            ?>
                                            <img src="upload/member/member.png" class="img img-responsive img-circle" id="profil_pic"/>
                                            <?php
                                        } else {
                                            if ($MEMBER->facebookID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                ?>
                                                <img src="<?php echo $MEMBER->profile_picture; ?>" class="img-responsive img-circle">
                                            <?php } else {
                                                ?>
                                                <img src="upload/member/<?php echo $MEMBER->profile_picture; ?>" class="img-responsive img-circle">
                                                <?php
                                            }
                                        }
                                        ?>
                                    </a>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <div class="member-name"><?php echo $MEMBER->name; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="jbside">
                        <ul class="jbdetail" style="margin-top: -9px;">
                            <div class="hp-review">
                                <div class="hp-review-right">
                                    <h5></h5>
                                    <?php
                                    $result = Feedback::getRatingByAccommodation($id);
                                    $rate_count = $result['rate_count'];
                                    $starNumber = round($result['rate_avg']);
                                    ?>
                                    <p><span><i class="fa fa-star" aria-hidden="true"></i><?php echo $starNumber; ?></span> Rating out of <?php echo $rate_count; ?> reviews</p>
                                </div>
                            </div>
                            <hr>
                            <li class="row">
                                <div class="col-md-12 col-xs-12 jb-title"><span style="margin-top: 20px;"> <?php echo $ACCOMMODATION_TYPE->name; ?></span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-3 col-xs-3">Location</div>
                                <div class="col-md-9 col-xs-9"><span><?php echo $CITY->name; ?></span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-3 col-xs-3">Website</div>
                                <div class="col-md-9 col-xs-9"><span><?php echo $ACCOMMODATIONS->website; ?></span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-3 col-xs-3">Email</div>
                                <div class="col-md-9 col-xs-9"><span><?php echo $ACCOMMODATIONS->email ?></span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-3 col-xs-3">Phone</div>
                                <div class="col-md-9 col-xs-9"><span><?php echo $ACCOMMODATIONS->phone; ?></span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-3 col-xs-3">Address</div>
                                <div class="col-md-9 col-xs-9"><span><?php echo $ACCOMMODATIONS->address; ?></span></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-8">
                    <div class="transport-description">
                        <span>
                            <?php echo $ACCOMMODATIONS->description; ?>
                        </span>
                    </div>
                    <div class="hp-section">
                        <div class="hp-sub-tit">
                            <h4><span>Our</span> Facilities</h4>
                        </div>
                        <div class="hp-amini">
                            <ul>

                                <?php
                                $ALL_FACILITIES = AccommodationFacilityDetails::getFacilitiesByAccommodationId($id);

                                $FACILITIES = explode(",", $ALL_FACILITIES['facility']);

                                foreach ($FACILITIES as $key => $facility) {
                                    $ACCOMMODATION_FACILITY = new AccommodationGeneralFacilities($facility);
                                    ?>
                                    <li><img src="upload/accommodation-facilities-icons/<?php echo $ACCOMMODATION_FACILITY->image_name ?>" alt=""> <?php echo $ACCOMMODATION_FACILITY->name ?></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="widget">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <h2 class="t-comment">Customer Testimonials</h2>
                                <!-- Carousel indicators -->

                                <!--                                <ol class="carousel-indicators">
                                                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                                                </ol>   -->


                                <!-- Wrapper for carousel items -->
                                <div class="carousel-inner">
                                    <?php
                                    $FEEDBACK = new Feedback(NULL);
                                    $ACCOMMODATION_FEEDBACKS = $FEEDBACK->getFeedbackByAccommodationID($id);
                                    $li = '';
                                    foreach ($ACCOMMODATION_FEEDBACKS as $key => $accommodation_feedback) {
                                        $VISITOR = new Visitor($accommodation_feedback['visitor']);
                                        if ($key === 0) {
                                            $li .= ' <li data-target="#myCarousel" data-slide-to="' . $key . '" class="active">'
                                                    . '</li>';
                                            ?>  
                                            <div class="item carousel-item active">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="testimonial">
                                                            <p><?php echo $accommodation_feedback['description']; ?></p>
                                                        </div>
                                                        <div class="media">
                                                            <div class="media-left d-flex mr-3">
                                                                <?php
                                                                if (empty($VISITOR->image_name)) {
                                                                    ?>
                                                                    <img src="upload/visitor/member.png"/>
                                                                    <?php
                                                                } else {

                                                                    if ($VISITOR->facebookID && substr($VISITOR->image_name, 0, 5) === "https") {
                                                                        ?>
                                                                        <img src="<?php echo $VISITOR->image_name; ?>"/>
                                                                    <?php } else {
                                                                        ?>
                                                                        <img src="upload/visitor/<?php echo $VISITOR->image_name; ?>"/>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>									
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="overview">
                                                                    <div class="name"><b><?php echo $VISITOR->first_name . ' ' . $VISITOR->second_name ?></b></div>
                                                                    <div class="details"><?php echo $accommodation_feedback['title']; ?></div>
                                                                    <div class="star-rating-t">
                                                                        <ul class="list-inline">



                                                                            <ul class="list-inline">
                                                                                <?php
                                                                                $starNumber = $accommodation_feedback['rate'];
                                                                                for ($x = 1; $x <= $starNumber; $x++) {
                                                                                    echo '<li class = "list-inline-item"><i class = "fa fa-star"></i></li>';
                                                                                }
//                                                                            if (strpos($starNumber, '.')) {
//                                                                                echo '<img src="path/to/half/star.png" />';
//                                                                                $x++;
//                                                                            }
                                                                                while ($x <= 5) {
                                                                                    echo '<li class = "list-inline-item"><i class = "fa fa-star-o"></i></li>';
                                                                                    $x++;
                                                                                }
                                                                                ?>
                                                                            </ul>
                                                                        </ul>
                                                                    </div>
                                                                </div>										
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>			
                                            </div>
                                            <?php
                                        } else {
                                            $li .= ' <li data-target="#myCarousel" data-slide-to="' . $key . '">'
                                                    . '</li>';
                                            ?>
                                            <div class="item carousel-item">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="testimonial">
                                                            <p><?php echo $accommodation_feedback['description']; ?></p>
                                                        </div>
                                                        <div class="media">
                                                            <div class="media-left d-flex mr-3">
                                                                <?php
                                                                if (empty($VISITOR->image_name)) {
                                                                    ?>
                                                                    <img src="upload/visitor/member.png"/>
                                                                    <?php
                                                                } else {
                                                                    if ($VISITOR->facebookID && substr($VISITOR->image_name, 0, 5) === "https") {
                                                                        ?>
                                                                        <img src="<?php echo $VISITOR->image_name; ?>"/>
                                                                    <?php } else {
                                                                        ?>
                                                                        <img src="upload/visitor/<?php echo $VISITOR->image_name; ?>"/>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="overview">
                                                                    <div class="name"><b><?php echo $VISITOR->first_name . ' ' . $VISITOR->second_name ?></b></div>
                                                                    <div class="details"><?php echo $accommodation_feedback['title']; ?></div>
                                                                    <div class="star-rating-t">
                                                                        <ul class="list-inline">
                                                                            <?php
                                                                            $starNumber = $accommodation_feedback['rate'];
                                                                            for ($x = 1; $x <= $starNumber; $x++) {
                                                                                echo '<li class = "list-inline-item"><i class = "fa fa-star"></i></li>';
                                                                            }
//                                                                            if (strpos($starNumber, '.')) {
//                                                                                echo '<img src="path/to/half/star.png" />';
//                                                                                $x++;
//                                                                            }
                                                                            while ($x <= 5) {
                                                                                echo '<li class = "list-inline-item"><i class = "fa fa-star-o"></i></li>';
                                                                                $x++;
                                                                            }
                                                                            ?>
                                                                        </ul>
                                                                    </div>
                                                                </div>										
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>			
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <!-- Carousel controls -->
                                <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                                    <i class="fa fa-chevron-left"></i>
                                </a>
                                <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                                    <i class="fa fa-chevron-right"></i>
                                </a>
                                <div class="add-comment-button">
                                    <a href="all-reviews.php?accommodation=<?php echo $id; ?>" class="btn btn-info btn-position-rel">
                                        <i class="fa fa-arrow-right"></i>  View All Reviews
                                    </a>
                                </div>
                                <?php
                                include './add-feedback.php';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row top-margin-30">
                <div class="col-md-12">

                    <div class="head-typo typo-com">
                        <h2>Rooms</h2>
                        <div class="row events">

                        </div>
                        <?php
                        $ROOM = Room::getAccommodationRoomsById($id);
                        foreach ($ROOM as $room) {
                            ?>
                            <div data-toggle="collapse" data-target="#demo_<?php echo $room['id']; ?>">
                                <!--EVENT-->
                                <div class="row events">
                                    <div class="room-title-btn" id="room-title-<?php echo $room['id']; ?>" >
                                        <div class="col-md-2">  

                                            <?php
                                            foreach ($ROOM_PHOTO->getRoomPhotosById($room['id']) as $key => $room_p) {
                                                if ($key == 1) {
                                                    break;
                                                }
                                                ?> 
                                                <img src="upload/accommodation/rooms/thumb/<?php echo $room_p['image_name']; ?>" alt="">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="col-md-8">
                                            <h3><?php echo $room['name']; ?></h3>
                                            <p>
                                                Number of Adults : <?php echo $room['number_of_adults']; ?>
                                            </p>
                                            <p>
                                                Number of Children : <?php echo $room['number_of_children']; ?>
                                            </p>
                                            <?php
                                            $ALL_FACILITIES = RoomFaciliityDetails::getFacilitiesByRoomId($room['id']);

                                            $FACILITIES = explode(",", $ALL_FACILITIES['facility']);

                                            foreach ($FACILITIES as $key => $facility) {

                                                $ROOM_FACILITY = new RoomFacility($facility);
                                                ?>
                                                <img style="width: 20px;" src="upload/room-facility-icons/<?php echo $ROOM_FACILITY->image_name; ?>">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-2 accommoadtion-register-button">
                                        <a href="accommodation-booking.php?accommodation=<?php echo $id; ?>" class="waves-effect waves-light event-regi">Book Now</a> 
                                    </div>

                                </div>
                            </div>
                            <div id="demo_<?php echo $room['id']; ?>" class="collapse room-border">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="galleria-slider room-photos">
                                            <?php
                                            $VIEW_ROOMS = RoomPhoto::getRoomPhotosById($room['id']);
                                            foreach ($VIEW_ROOMS as $key => $room_p) {
                                                ?>
                                                <a href="upload/accommodation/rooms/<?php echo $room_p['image_name']; ?>">
                                                    <img src="upload/accommodation/rooms/thumb/<?php echo $room_p['image_name']; ?>" data-title="" >
                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="hp-sub-tit">
                                            <h4><span>Room Price</span> for Today</h4>
                                        </div>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Basis</th>
                                                    <th>Price</th>
                                            <tbody>
                                                <?php
                                                $ROOM_PRICE_OBJ = new RoomPrice(NULL);
                                                $date = date("Y-m-d");
                                                $ROOM_PRICE = $ROOM_PRICE_OBJ->getTodayPriceByRoomId($room['id'], $date);
                                                foreach ($ROOM_PRICE as $room_price) {
                                                    $BASIS = new RoomBasis($room_price['basis']);
                                                    ?>
                                                    <tr>
                                                        <td data-column="Price"><?php echo $BASIS->name; ?></td>
                                                        <td data-column="Price">LKR <?php echo $room_price['price']; ?>.00</td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="hp-sub-tit">
                                            <h4><span>Description</span></h4>
                                        </div>
                                        <?php echo $room['description']; ?>
                                    </div>
                                </div>



                            </div>
                            <!--END EVENT-->
                            <?php
                        }
                        ?>
                    </div>




                </div>
            </div>

        </div>



        <?php
        include './footer.php';
        ?>
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js" type="text/javascript"></script>
        <script src="js/jquery.flexslider.js" type="text/javascript"></script>
        <link href="galleria/themes/classic/galleria.classic.css" rel="stylesheet" type="text/css"/>
        <script src="js/galleria.js" type="text/javascript"></script>
        <script src="js/galleria.classic.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                $("button").click(function () {
                    $("p").toggle();
                });
            });
        </script>
        <script type="text/javascript">
            $('#accommodation_photos').galleria({
                responsive: true,
                height: 500,
                autoplay: 7000,
                lightbox: true,
//                showInfo: true,

                //                imageCrop: true,
            });
        </script>
        <script type="text/javascript">
            $('.room-photos').galleria({
                responsive: true,
                height: 500,
                autoplay: 7000,
                lightbox: true,
//                showInfo: true,

                //                imageCrop: true,
            });
        </script>
        <script>

            $('.room-title-btn').click(function () {
                var roomTitleId = this.id;
                var roomId = roomTitleId.replace('room-title-', '');
                $('#room-slider-' + roomId).show();

            });

            $('.close').click(function () {
                $('.modal').hide();
            });

            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                }
            });
        </script> 
        <script>
            jQuery(document).ready(function () {
                jQuery('#btn-add-comment').click(function () {
                    jQuery("#myModalaccommodation").modal('show');
                });

            });


            jQuery('#create').click(function (event) {

                event.preventDefault();

                var captchacode = jQuery('#captchacode').val();

                jQuery.ajax({
                    url: "visitor-feedback/captchacode.php",
                    cache: false,
                    dataType: "json",
                    type: "POST",
                    data: {
                        captchacode: captchacode

                    },
                    success: function (html) {
                        var status = html.status;
                        var msg = html.msg;

                        if (status == "incorrect") {

                            jQuery("#capspan").addClass("notvalidated");
                            jQuery("#capspan").html(msg);
                            jQuery("#capspan").show();
                            jQuery("#capspan").fadeOut(2000);

                        } else if (status == "correct") {
                            jQuery('#client-comment').submit();
                        }
                    }
                });
            });
        </script>
    </body> 
</html>