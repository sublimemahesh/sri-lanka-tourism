<?php
include_once(dirname(__FILE__) . '/class/include.php');
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_GET["transport"])) {

    $transport = $_GET["transport"];
    $TRANSPORT = new Transports($transport);
    $TRANSPORT_CONDITION = new VehicleCondition($TRANSPORT->condition);
    $TRANSPORT_TYPE = new VehicleType($TRANSPORT->vehicle_type);
    $FUEL_TYPE = new FuelType($TRANSPORT->fuel_type);

    $result = Feedback::getRatingByTransport($transport);
    $rate_count = $result['rate_count'];
    $starNumber = round($result['rate_avg']);
    $FEEDBACK = new Feedback(NULL);
    $TRANSPORT_FEEDBACKS = $FEEDBACK->getFeedbackByTransportID($transport);
}
if (isset($_GET["tour"])) {

    $tour = $_GET["tour"];
    $TOUR = new TourPackage($tour);
    $TOUR_TYPE = new TourType($TOUR->tourtype);
//    $FUEL_TYPE = new FuelType($TRANSPORT->fuel_type);
//
    $result = Feedback::getRatingByTour1($tour);
    $rate_count = $result['rate_count'];
    $starNumber = round($result['rate_avg']);
    $FEEDBACK = new Feedback(NULL);
    $TOUR_FEEDBACKS = $FEEDBACK->getFeedbackByTourPackageID($tour);
}
?>


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sri Lanka || Tourism</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <link href="css/all-reviews.css" rel="stylesheet" type="text/css"/>
    </head>


    <!-- Our Resort Values style-->
    <?php
    include './header.php';
    ?>


    <?php
    if (isset($_GET["transport"])) {
        ?>
        <div id="page">
            <div class="page-header page-title-left page-title-pattern">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title hidden-sm hidden-xs">All Reviews</h1> 
                            <ul class="breadcrumb">
                                <li class="banner-bredcum-1">
                                    <a href="index.php">Home</a>
                                </li> 
                                <li class="active banner-bredcum-2">All Reviews</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="container">
            <div class="row" style="background-color: #fff; ">
                <div class="container">

                    <div class="card">
                        <div class="container-fliud">
                            <div class="wrapper row">
                                <div class="preview col-md-3">

                                    <div class="preview-pic">
                                        <div class="tab-pane active" id="pic-1">
                                            <?php
                                            foreach (TransportPhoto::getTransportPhotosById($transport) as $key => $TRANSPORTS_P) {
                                                if ($key == 1) {
                                                    break;
                                                }
                                                ?>
                                                <img src="upload/transport/thumb/<?php echo $TRANSPORTS_P['image_name']; ?>" /></div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="row col-md-12">
                                        <h3 class="product-title"><?php echo $TRANSPORT->title; ?></h3>
                                        <div class="review-all-type"><?php echo $TRANSPORT_CONDITION->name; ?></div> 
                                    </div>



                                    <div class="all-rw-detail-container col-md-6">
                                        <div class="review-more-detail">Type:
                                            <span><?php echo $TRANSPORT_TYPE->name; ?></span>
                                        </div>
                                        <div class="review-more-detail">Registered No:
                                            <span><?php echo $TRANSPORT->registered_number; ?></span>
                                        </div>
                                        <div class="review-more-detail">Registered Year:
                                            <span><?php echo $TRANSPORT->registered_year; ?></span>
                                        </div>
                                        <div class="review-more-detail">Fuel Type: 
                                            <span><?php echo $FUEL_TYPE->name; ?></span>
                                        </div>

                                        <div class="review-icon-container">
                                            <span class="size" data-toggle="tooltip" title="small"> <img class="" src="images/transport/passenges.png"> <?php echo $TRANSPORT->no_of_passangers; ?></span>
                                            <span class="size" data-toggle="tooltip" title="medium"> <img class="" src="images/transport/001-suitcase.png"> <?php echo $TRANSPORT->no_of_baggages; ?></span>
                                            <span class="size" data-toggle="tooltip" title="large"> <img class="" src="images/transport/004-car.png"> <?php echo $TRANSPORT->no_of_doors; ?></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <h4>Average user rating</h4>
                                        <h2 class="bold padding-bottom-7"><?php echo $starNumber . '.0'; ?><small>/ 5</small></h2>
                                        <div class="room-star-rates">
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

                                        </div>
                                        <?php
                                        include './add-feedback.php';
                                        ?>
                                        <div class="action">
                                            <div class="add-to-cart btn btn-info btn-position-rel" id="btn-add-transport-comment">Add Your Comment</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="testimonials-acc">
                        <?php
                        if (!$TRANSPORT_FEEDBACKS) {
                            ?>

                            <p>No Reviews yet</p>

                            <?php
                        } else {
                            foreach ($TRANSPORT_FEEDBACKS as $key => $transport_feedback) {
                                $VISITOR = new Visitor($transport_feedback['visitor']);
                                ?>  
                                <div class = "active item testimonial-all-box">
                                    <div class = "carousel-info">
                                        <?php
                                        if (empty($VISITOR->image_name)) {
                                            ?>
                                            <img src="upload/visitor/member.png" class="pull-left"/>
                                            <?php
                                        } else {

                                            if ($VISITOR->facebookID && substr($VISITOR->image_name, 0, 5) === "https") {
                                                ?>
                                                <img src="<?php echo $VISITOR->image_name; ?>" class="pull-left"/>
                                            <?php } else {
                                                ?>
                                                <img alt="" src="upload/visitor/<?php echo $VISITOR->image_name; ?>" class="pull-left">
                                                <?php
                                            }
                                        }
                                        ?>	

                                        <div class = "pull-left">
                                            <span class = "testimonials-name"><?php echo $VISITOR->first_name . ' ' . $VISITOR->second_name ?></span>
                                            <div class="room-star-rates">
                                                <?php
                                                $starNumberVisitor = $transport_feedback['rate'];
                                                for ($x = 1; $x <= $starNumberVisitor; $x++) {
                                                    echo '<i class = "fa fa-star"></i>';
                                                }
//                                                                         
                                                while ($x <= 5) {
                                                    echo '<i class = "fa fa-star-o"></i>';
                                                    $x++;
                                                }
                                                ?>
                                            </div>
                                            <span class = "testimonials-post"><?php echo $transport_feedback['title']; ?></span>
                                        </div>
                                    </div>
                                    <blockquote><p><?php echo $transport_feedback['description']; ?></p></blockquote>
                                </div>
                                <?php
                            }
                        }
                        ?>



                    </div>

                </div> <!-- /container -->

            </div>            
        </div>
        <?php
    }
    ?>

    <?php
    if (isset($_GET["tour"])) {
        ?>
        <div id="page">
            <div class="page-header page-title-left page-title-pattern">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title hidden-sm hidden-xs">All Reviews</h1> 
                            <ul class="breadcrumb">
                                <li class="banner-bredcum-1">
                                    <a href="index.php">Home</a>
                                </li> 
                                <li class="active banner-bredcum-2">All Reviews</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="container">
            <div class="row" style="background-color: #fff; ">
                <div class="container">

                    <div class="card">
                        <div class="container-fliud">
                            <div class="wrapper row">
                                <div class="preview col-md-3">

                                    <div class="preview-pic">
                                        <div class="tab-pane active" id="pic-1">
                                            <img src="upload/tour-package/thumb/<?php echo $TOUR->picture_name; ?>" /></div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="row col-md-12">
                                        <h3 class="product-title"><?php echo $TOUR->name; ?></h3>
                                        <div class="review-all-type"><?php echo $TOUR_TYPE->name; ?></div> 
                                    </div>
                                    <div class="all-rw-detail-container col-md-6">
                                        <div class="review-more-detail">
                                            <span><?php echo $TOUR->description; ?></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <h4>Average user rating</h4>
                                        <h2 class="bold padding-bottom-7"><?php echo $starNumber . '.0'; ?><small>/ 5</small></h2>
                                        <div class="room-star-rates">
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

                                        </div>
                                        <?php
                                        include './add-feedback.php';
                                        ?>
                                        <div class="action">
                                            <div class="add-to-cart btn btn-info btn-position-rel" id="btn-add-tour-comment">Add Your Comment</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="testimonials-acc">
                        <?php
                        if (!$TOUR_FEEDBACKS) {
                            ?>

                            <p>No Reviews yet</p>

                            <?php
                        } else {
                            foreach ($TOUR_FEEDBACKS as $key => $tour_feedback) {
                                $VISITOR = new Visitor($tour_feedback['visitor']);
                                ?>  
                                <div class = "active item testimonial-all-box">
                                    <div class = "carousel-info">
                                        <?php
                                        if (empty($VISITOR->image_name)) {
                                            ?>
                                            <img src="upload/visitor/member.png" class="pull-left"/>
                                            <?php
                                        } else {

                                            if ($VISITOR->facebookID && substr($VISITOR->image_name, 0, 5) === "https") {
                                                ?>
                                                <img src="<?php echo $VISITOR->image_name; ?>" class="pull-left"/>
                                            <?php } else {
                                                ?>
                                                <img alt="" src="upload/visitor/<?php echo $VISITOR->image_name; ?>" class="pull-left">
                                                <?php
                                            }
                                        }
                                        ?>	

                                        <div class = "pull-left">
                                            <span class = "testimonials-name"><?php echo $VISITOR->first_name . ' ' . $VISITOR->second_name ?></span>
                                            <div class="room-star-rates">
                                                <?php
                                                $starNumberVisitor = $tour_feedback['rate'];
                                                for ($x = 1; $x <= $starNumberVisitor; $x++) {
                                                    echo '<i class = "fa fa-star"></i>';
                                                }
//                                                                         
                                                while ($x <= 5) {
                                                    echo '<i class = "fa fa-star-o"></i>';
                                                    $x++;
                                                }
                                                ?>
                                            </div>
                                            <span class="testimonials-post"><?php echo $tour_feedback['title']; ?></span>
                                        </div>
                                    </div>
                                    <blockquote><p><?php echo $tour_feedback['description']; ?></p></blockquote>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div> <!-- /container -->
            </div>            
        </div>
        <?php
    }
    ?>


    <!-- Our Resort Values style-->  
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
        jQuery(document).ready(function () {
            var log_stat = $('#login-stat').val();


            jQuery('#btn-add-transport-comment').click(function () {

                if (log_stat == '0') {
                    window.location = "visitor-login.php?message=24";
                } else {
                    jQuery("#myModal").modal('show');
                }


            });

            jQuery('#btn-add-tour-comment').click(function () {

                if (log_stat == '0') {
                    window.location = "visitor-login.php?message=24";
                } else {
                   jQuery("#myModaltour").modal('show');
                }


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


</html>
