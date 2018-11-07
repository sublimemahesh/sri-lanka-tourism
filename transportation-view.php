<?php
include './class/include.php';
if (!isset($_SESSION)) {
    session_start();
}
$id = $_GET["id"];
$TRANSPORTS = new Transports($id);
$TRANSPORTS_PHOTO = new TransportPhoto(NULL);
$TRANSPORT_RATE_OBJ = new TransportRates(NULL);
$TRANSPORT_RATE = $TRANSPORT_RATE_OBJ->GetTransportRatesByTransportId($id);
$RENT_A_CAR_OBJ = new RentACar(NULL);
$RENT_A_CAR = $RENT_A_CAR_OBJ->TransportExsist($id);
$MEMBER = new Member($TRANSPORTS->member);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $TRANSPORT->title; ?> || Transports || Sri Lanka || Tourism</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="sri lanka tourism, tourism in sri lanka, Sri Lanka, <?php echo $TRANSPORT->title; ?>, tours in sri lanka, taxi in sri lanka, tourism sri lanka, rent a cars in sri lanka, transports in sri lanka, transport ways in sri lanka, sri lanka transports, vehicles in sri lanka, self driving vehicles, vehicle with chauffeur diver, luxuary vehicles, economy vehicles, hiring vehicles, hiring taxi">
        <meta name="description" content="The team Sri Lanka Tourism crew is privileged to show you and to take you around the most beautiful places in Sri Lanka. You can Plan your tour with Sri Lanka Tourism and, tours are judiciously planned and customized to meet your needs. And also, Sri Lanka Tourism features well established taxi service and hotel service. So your trip will be everything you imagined and much more.">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link href="css/search.css" rel="stylesheet" type="text/css"/>
        <link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
        <link href="css/responsive-table.css" rel="stylesheet" type="text/css"/>
        <link href="visitor-feedback/validation-styles.css" rel="stylesheet" type="text/css"/>
        <link href="css/comments-style.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet"> 
        <link href="css/owl.carousel.min.css" rel="stylesheet" type="text/css"/>
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
                            <h1 class="title hidden-sm hidden-xs"><?php echo $TRANSPORTS->title; ?></h1> 
                            <ul class="breadcrumb">
                                <li class="banner-bredcum-1">
                                    <a href="index.php">Home</a>
                                </li> 
                                <li class="active banner-bredcum-2">Transports</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="container transport-container">
            <div class="col-md-12">
                <?php
                $vali = new Validator();
                $vali->show_message();
                ?>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div id="transport_photos" class="galleria-slider">
                        <?php
                        $VIEW_TRANSPORT = TransportPhoto::getTransportPhotosById($id);
                        foreach ($VIEW_TRANSPORT as $key => $img) {
                            $FUEL_TYPE = new FuelType($TRANSPORTS->fuel_type);
                            $CONDITION = new VehicleCondition($TRANSPORTS->condition);
                            ?>
                            <a href="upload/transport/<?php echo $img['image_name']; ?>">
                                <img src="upload/transport/thumb/<?php echo $img['image_name']; ?>" data-title="" >
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
                                        if (empty($MEMBER->id)) {
                                            ?>
                                            <img src="images/admin-member-img.png"  class="img-responsive img-circle"/>
                                            <?php
                                        } else {
                                            if (empty($MEMBER->profile_picture)) {
                                                ?> 
                                                <img src="upload/member/member.png" class="img-responsive img-circle" />
                                                <?php
                                            } else {
                                                if ($MEMBER->facebookID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                    ?>
                                                    <img src="<?php echo $MEMBER->profile_picture; ?>" class="img-responsive img-circle" >
                                                    <?php
                                                } elseif ($MEMBER->googleID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                    ?>
                                                    <img src="<?php echo $MEMBER->profile_picture; ?>" class="img-responsive img-circle">
                                                    <?php
                                                } else {
                                                    ?>
                                                    <img src="upload/member/<?php echo $MEMBER->profile_picture; ?>" class="img-responsive img-circle">
                                                    <?php
                                                }
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
                        <h3>About This Vehicle</h3>
                        <ul class="jbdetail">
                            <li class="row">
                                <div class="col-md-12 col-xs-12 jb-title"><span> <?php echo $TRANSPORTS->title; ?></span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-12 cox-xs-12 rate-star">
                                    <?php
                                    $result = Feedback::getRatingByTransport($id);
                                    $rate_count = $result['rate_count'];
                                    $starNumber = round($result['rate_avg']);

                                    for ($x = 1; $x <= $starNumber; $x++) {
                                        echo '<i class="fa fa-star"></i>';
                                    }
                                    while ($x <= 5) {
                                        echo '<i class="fa fa-star-o"></i>';
                                        $x++;
                                    }
                                    ?> (<?php echo $rate_count; ?> Reviews)
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6">Condition</div>
                                <div class="col-md-6 col-xs-6"><span><?php echo $CONDITION->name; ?></span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6">Fuel Type</div>
                                <div class="col-md-6 col-xs-6"><span><?php echo $FUEL_TYPE->name; ?></span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-9 col-xs-9">No of passengers</div>
                                <div class="col-md-3 col-xs-3"><span><?php echo $TRANSPORTS->no_of_passangers; ?></span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6">No of baggage</div>
                                <div class="col-md-6 col-xs-6"><span><?php echo $TRANSPORTS->no_of_baggages; ?></span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6">No of doors</div>
                                <div class="col-md-6 col-xs-6"><span><?php echo $TRANSPORTS->no_of_doors; ?></span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6">Air Conditioned</div>
                                <div class="col-md-6 col-xs-6"> <?php
                                    if ($TRANSPORTS->ac == 1) {
                                        ?>
                                        <span>Yes</span>
                                        <?php
                                    } else {
                                        ?>
                                        <span>No</span>
                                        <?php
                                    }
                                    ?></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="transport-description">
                        <span >
                            <p class="p-font" ><?php echo $TRANSPORTS->description; ?></p>
                        </span>
                    </div>
                    <?php
                    if ($RENT_A_CAR !== FALSE) {
                        ?>
                        <h4 class="text-left text-bottom "><b>Self drive</b></h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="n-font" >Price Per Day</th>
                                    <th class="n-font" >Price Per Excess Mileage</th>
                            <tbody>
                                <tr>
                                    <td data-column="Price Per Day" class="n-font"><b>USD <?Php echo $RENT_A_CAR['price_per_day']; ?></b></td>
                                    <td data-column="Price Per Excess Mileage" class="n-font"><b>USD <?Php echo $RENT_A_CAR['price_per_excess_mileage']; ?></b></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                    }
                    ?>
                    <h4 class="text-left text-bottom " ><b>With Driver</b></h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="n-font" >Picking Up</th>
                                <th class="n-font" >Dropping Off</th>
                                <th class="n-font" >Distance(KM)</th>
                                <th class="n-font" >Price(USD)</th>
                                <th class="n-font" >Option</th>
                        <tbody>
                            <?php
                            foreach ($TRANSPORT_RATE as $transport_rate) {
                                $rate = $transport_rate['id'];
                                $CITYFROM = new City($transport_rate['location_from']);
                                $CITYTO = new City($transport_rate['location_to']);
                                ?>
                                <tr>
                                    <td data-column="Picking Up" class="n-font"><b><?Php echo $CITYFROM->name; ?></b></td>
                                    <td data-column="Dropping Off" class="n-font"><b><?Php echo $CITYTO->name; ?></b></td>
                                    <td data-column="Distance(KM)" class="n-font"><b><?Php echo $transport_rate['distance'] . ' KM'; ?></b></td>
                                    <td data-column="Price(USD)" class="n-font"><b><?Php echo 'USD ' . $transport_rate['price']; ?></b></td>
                                    <td> 
                                        <a href="transport-booking.php?rate=<?php echo $transport_rate['id']; ?>" class="transport-book-button">
                                            Book Now
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="widget">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <h2 class="t-comment">Customer Reviews</h2>
                                <!-- Wrapper for carousel items -->
                                <div class="carousel-inner">
                                    <?php
                                    $FEEDBACK = new Feedback(NULL);
                                    $TRANSPORT_FEEDBACKS = $FEEDBACK->getFeedbackByTransportID($id);
                                    $li = '';
                                    if (!$TRANSPORT_FEEDBACKS) {
                                        ?>
                                        <div class="no-reviews">
                                            <p>No Reviews yet</p>
                                        </div>
                                        <?php
                                    } else {
                                        foreach ($TRANSPORT_FEEDBACKS as $key => $transport_feedback) {
                                            $VISITOR = new Visitor($transport_feedback['visitor']);
                                            if ($key === 0) {
                                                $li .= ' <li data-target="#myCarousel" data-slide-to="' . $key . '" class="active">'
                                                        . '</li>';
                                                ?>  
                                                <div class="item carousel-item active">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="testimonial">
                                                                <p><?php echo $transport_feedback['description']; ?></p>
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
                                                                        <div class="details"><?php echo $transport_feedback['title']; ?></div>
                                                                        <div class="star-rating-t">
                                                                            <ul class="list-inline">
                                                                                <?php
                                                                                $starNumber = $transport_feedback['rate'];
                                                                                for ($x = 1; $x <= $starNumber; $x++) {
                                                                                    echo '<li class = "list-inline-item"><i class = "fa fa-star"></i></li>';
                                                                                }
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
                                            } else {
                                                $li .= ' <li data-target="#myCarousel" data-slide-to="' . $key . '">'
                                                        . '</li>';
                                                ?>
                                                <div class="item carousel-item">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="testimonial">
                                                                <p><?php echo $transport_feedback['description']; ?></p>
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
                                                                        <div class="details"><?php echo $transport_feedback['title']; ?>
                                                                            <div class="star-rating-t">
                                                                                <ul class="list-inline">
                                                                                    <?php
                                                                                    $starNumber = $transport_feedback['rate'];
                                                                                    for ($x = 1; $x <= $starNumber; $x++) {
                                                                                        echo '<li class = "list-inline-item"><i class = "fa fa-star"></i></li>';
                                                                                    }
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
                                                </div>
                                                <?php
                                            }
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
                                    <a href="all-reviews.php?transport=<?php echo $id; ?>" class="btn btn-info btn-position-rel">
                                        <i class="fa fa-arrow-right"></i>  View All Reviews
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row top-margin-30">
                <div class="col-md-12 col-md-offset-4 message-now">
                    <a href="visitor-message.php?id=<?php echo $TRANSPORTS->member; ?>" class="btn btn-info btn-lg col-md-4 message-now-btn">
                        <i class="fa fa-comment-o"></i> Message Now
                    </a>
                </div>
            </div>
            <div class="row top-margin-30">
                <hr>
                <div class="col-md-12">
                    <p class="subtitle-more more-t"><span>More Transports</span></p>
                    <div class="owl-carousel tour-slider" id="transport-carousel">
                        <?php
                        $TRANSPORT = $TRANSPORTS->all();
                        foreach ($TRANSPORT as $transport) {
                            $transport_photos = $TRANSPORTS_PHOTO->getTransportPhotosById($transport['id']);
                            $condition = new VehicleCondition($transport['condition']);
                            $vehicle_type = new VehicleType($transport['vehicle_type']);
                            $fuel_type = new FuelType($transport['fuel_type'])
                            ?>
                            <div  class="index-transport-container" style="background-color: #ececec;">
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
                                            ?></div>
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
                                            <i class="fa fa-long-arrow-right"></i></a>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
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
        <script type="text/javascript">
            $('#transport_photos').galleria({
                responsive: true,
                height: 500,
                autoplay: 7000,
                lightbox: true,
                showInfo: true
            });
        </script>
        <script>
            jQuery(document).ready(function () {
                jQuery('#btn-add-comment').click(function () {
                    jQuery("#myModal").modal('show');
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
        <script>
            $(document).ready(function () {
                $('#transport-carousel').owlCarousel({
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
                        600: {
                            items: 3,
                            nav: true
                        },
                        1000: {
                            items: 5,
                            nav: true,
                            loop: true
                        }
                    }
                });
            });
        </script>
        <script>
            jQuery(document).ready(function () {
                jQuery('.btn-not-loging').click(function () {
                    jQuery("#myModalTransport").modal('show');
                });
            });
        </script>
    </body> 
</html>