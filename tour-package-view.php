<?php
include_once(dirname(__FILE__) . '/class/include.php');

if (!isset($_SESSION)) {
    session_start();
}
$tourid = $_GET['id'];
$TOURPACK = new TourPackage($tourid);


$TOURSUBSECTION = new TourSubSection(NULL);
$subsections = $TOURSUBSECTION->GetTourSubSectionByTourPackage($tourid);

$PACKAGES = new TourPackage(NULL);
$packages = $PACKAGES->getTourPackagesByTourType($TOURPACK->tourtype);

$TOURPACKAGEFEEDBACK = new Feedback(NULL);
$feedbacks = $TOURPACKAGEFEEDBACK->getFeedbackByTourPackageID($tourid);

$count_feedbacks = count($feedbacks);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sri Lanka || Tourism</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/comments-style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link href="css/search.css" rel="stylesheet" type="text/css"/>
        <link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/styles.css" rel="stylesheet" type="text/css"/>
        <link href="css/slider/magnific.popup.css" rel="stylesheet" type="text/css"/>

        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet"> 
    </head>
    <body>
        <?php
        include './header.php';
        ?>

        <div class="row background-image" style="background-color: #fff;">
            <div class="container tour-view-container">
                <div class="col-md-9">
                    <div class="tourpack">
                        <h1><?php echo strtoupper($TOURPACK->name); ?></h1>
                        <span class="text-justify"><?php echo $TOURPACK->description; ?></span>

                    </div>
                    <?php
                    if ($subsections) {
                        foreach ($subsections as $subsection) {
                            $subsectionphotos = TourSubSectionPhoto::getTourSubSectionPhotosById($subsection['id']);
                            ?>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h4 class="tour-day"><?php echo $subsection['title']; ?></h4>
                                <hr class="style15">
                                <div class="view-tour-title">
        <!--                                    <strong>Day 01 - Start at Negombo</strong>-->
                                </div>
                                <div class="view-tour-description">
                                    <?php echo $subsection['description']; ?> 
                                </div>
                                <div class="locations">
                                    <span class="loc-title">Locations: </span>
                                    <?Php
                                    $locations = $subsection['locations'];
                                    $loc_arr = explode(',', $locations);

                                    for ($i = 0; $i < count($loc_arr); $i++) {
                                        $ARTICLES = new Article($loc_arr[$i]);
                                        if ($i == count($loc_arr) - 1) {
                                            ?>
                                            <span><a href="article-view.php?id=<?php echo $ARTICLES->id; ?>"><?php echo $ARTICLES->location; ?></a></span>

                                            <?php
                                        } else {
                                            ?>
                                            <span><a href="article-view.php?id=<?php echo $ARTICLES->id; ?>"><?php echo $ARTICLES->location; ?></a>, </span>

                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div>
                                    <?php
                                    foreach ($subsectionphotos as $subsectionphoto) {
                                        ?>
                                        <div class="col-md-3 view-image">
                                            <a href="upload/tour-package/sub-section/<?php echo $subsectionphoto['image_name']; ?>"  title="Single Room" class="popup-gallery">
                                                <img src="upload/tour-package/sub-section/thumb/<?php echo $subsectionphoto['image_name']; ?>" class="example-image img-responsive image11" alt="Owl Image">
                                                <div class="middle">
                                                    <i class="fa fa-search-plus"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <div class="nodata">
                            <?php
                            echo 'No Tour Itinerary Available';
                            ?>
                        </div>
                        <?php
                    }
                    ?>


                    <div class="row top-margin-30">
                        <div class="col-md-4 col-xs-4 col-md-offset-2 book-now-btn">
                            <a href="tour-package-booking.php?tour=<?php echo $tourid; ?>" class="button"><span>Book Now </span></a>
                        </div>
                        <div class="col-md-4 col-xs-4 book-now-btn">
                            <a href="visitor-message.php?id=<?php echo $TOURPACK->member; ?>" class="button">
                                <span>Message Now</span>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-12">			
                        <div id="myCarousel" class="carousel slide tour-package-testimonials" data-ride="carousel">
                            <h2 class="tt-comment">Customer <b>Testimonials</b></h2>
                            <!-- Carousel indicators -->
                            <ol class="carousel-indicators">
                                <?php
                                for ($x = 0; $x < $count_feedbacks; $x++) {
                                    ?>
                                    <li data-target="#myCarousel" data-slide-to="<?php echo $x; ?>" <?php
                                    if ($x == 0) {
                                        echo 'class="active"';
                                    }
                                    ?>></li>
                                        <?php
                                    }
                                    ?>
                            </ol>   
                            <!-- Wrapper for carousel items -->
                            <div class="carousel-inner">
                                <?php
                                $li = '';
                                foreach ($feedbacks as $key => $feedback) {

                                    $VISITOR = new Visitor($feedback['visitor']);

                                    if ($key === 0) {
                                        $li .= ' <li data-target="#myCarousel" data-slide-to="' . $key . '" class="active">'
                                                . '</li>';
                                        ?>
                                        <div class="item carousel-item active">
                                            <div class="col-sm-12">
                                                <div class="testimonial">
                                                    <p><?php echo $feedback['description']; ?></p>
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
                                                            <div class="name"><b><?php echo $VISITOR->first_name . ' ' . $VISITOR->second_name; ?></b></div>
                                                            <div class="details"><?php echo $feedback['title']; ?></div>
                                                            <div class="star-rating-t">
                                                                <ul class="list-inline">
                                                                    <?php
                                                                    $starNumber = $feedback['rate'];
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
                                        <?php
                                    } else {
                                        $li .= ' <li data-target="#myCarousel" data-slide-to="' . $key . '">'
                                                . '</li>';
                                        ?>
                                        <div class="item carousel-item">
                                            <div class="col-sm-12">
                                                <div class="testimonial">
                                                    <p><?php echo $feedback['description']; ?></p>
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
                                                            <div class="name"><b><?php echo $VISITOR->first_name . ' ' . $VISITOR->second_name; ?></b></div>
                                                            <div class="details"><?php echo $feedback['title']; ?></div>
                                                            <div class="star-rating-t">
                                                                <ul class="list-inline">
                                                                    <?php
                                                                    $starNumber = $feedback['rate'];
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
                                <a href="all-reviews.php?tour=<?php echo $tourid; ?>" class="btn btn-info btn-position-rel">
                                    <i class="fa fa-arrow-right"></i>  View All Reviews
                                </a>
                            </div>
                            <?php
                            include './add-feedback.php';
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 other-section">
                    <h2 class="other-tour">Other <b>Tour Packages</b></h2>
                    <?php
                    foreach ($packages as $package) {
                        ?>
                        <div class="col-md-12 col-xs-12 col-sm-6 other-packs">
                            <div class="hovereffect">
                                <img class="img-responsive" src="upload/tour-package/thumb/<?php echo $package['picture_name']; ?>" alt="">
                                <div class="overlay">
                                    <h2><?php echo $package['name']; ?></h2>
                                    <a class="info" href="tour-package-view.php?id=<?php echo $package['id']; ?>"><strong>view more</strong></a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>


        <?php
        include './footer.php';
        ?>
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!--        <link href="css/lightbox.min.css" rel="stylesheet" type="text/css"/>
                <script src="js/lightbox-plus-jquery.min.js" type="text/javascript"></script>
                <script src="js/jquery.flexslider.js" type="text/javascript"></script>-->

        <script src="js/slider/magnific.popup.min.js" type="text/javascript"></script>
        <script src="js/slider/custom.js" type="text/javascript"></script>
        <script>
            jQuery(document).ready(function () {
                jQuery('#btn-add-comment').click(function () {
                    jQuery("#myModaltour").modal('show');
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
            jQuery(document).ready(function () {
                jQuery('.btn-not-loging').click(function () {
                    jQuery("#myModal").modal('show');
                });


            });
        </script>
    </body> 

</html>
