<?php
include_once(dirname(__FILE__) . '/class/include.php');

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_GET["range"])) {
    $prices = split(";", $_GET['range']);
    $min = $prices[0];
    $max = $prices[1];
} else {
    $min = 0;
    $max = 1000000000;
}
$SEARCH = new Search(NULL);
$keyword = NULL;
$noofdates = NULL;
$type = NULL;
$pricefrom = NULL;
$priceto = NULL;
/* set page numbers */
if (isset($_GET["page"])) {
    $page = (int) $_GET["page"];
} else {
    $page = 1;
}
$setLimit = 12;
$pageLimit = ($page * $setLimit) - $setLimit;

/* search */
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}
if (isset($_GET['noofdates'])) {
    $noofdates = $_GET['noofdates'];
}
if (isset($_GET['type'])) {
    $type = $_GET['type'];
}
if (isset($_GET['pricefrom'])) {
    $pricefrom = $_GET['pricefrom'];
} else {
    $pricefrom = $min;
}
if (isset($_GET['priceto'])) {
    $priceto = $_GET['priceto'];
} else {
    $priceto = $max;
}
$TOURS = $SEARCH->GetToursByKeywords($keyword, $noofdates, $type, $pricefrom, $priceto, $pageLimit, $setLimit);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Tour Packages || Sri Lanka || Tourism</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="sri lanka tourism, tourism in sri lanka, Sri Lanka, tours in sri lanka, taxi in sri lanka, tourism sri lanka, rent a cars in sri lanka, tour packages in sri lanka, holiday in sri lanka, visit sri lanka, tour packages offers, offers in tour packages, articles in sri lanka, destination in sri lanka, tour plans for sri lanka, sri lanka tour plans, round tours in sri lanka, one day tour in sri lanka, wild life in sri lanka, scenic places in sri lanka, thills in sri lanka, heritage places in sri lanka, day tours, classic tours, wild tours, packages, packages in sri lanka, economic tour packages in sri lanka">
        <meta name="description" content="The team Sri Lanka Tourism crew is privileged to show you and to take you around the most beautiful places in Sri Lanka. You can Plan your tour with Sri Lanka Tourism and, tours are judiciously planned and customized to meet your needs. And also, Sri Lanka Tourism features well established taxi service and hotel service. So your trip will be everything you imagined and much more.">
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
    </head>
    <body>
        <!-- Our Resort Values style-->
        <?php
        include './header.php';
        ?>
        <div class="background-image" style="background-image: url('images/hotel/sea.jpg');">
            <section>
                <div class="container inner-container1 inner-tour-pack">
                    <?php
                    foreach ($TOURS as $TOUR) {
                        $id = $TOUR['id'];
                        $result = TourSubSection::CountDaysInTour($id);
                        $days = $result['days'];
                        $night = (int) $days - 1;

                        $MEMBER = new Member($TOUR['member']);
                        $TYPE = new TourType($TOUR['tour_type']);
                        ?>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="listing-box">
                                <div class="listing-box-thumb">
                                    <span class="price-list">USD <?php echo $TOUR['price']; ?></span>
                                    <img src="upload/tour-package/thumb/<?php echo $TOUR['picture_name']; ?>" alt="">
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
                                        <div class="tour-title"><a href="tour-package-view.php?id=<?php echo $TOUR['id']; ?>" title="">
                                                <?php
                                                if (strlen($TOUR['name']) > 27) {
                                                    echo substr($TOUR['name'], 0, 27) . '...';
                                                } else {
                                                    echo $TOUR['name'];
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
                                    <div class="col-md-6 col-sm-6 col-xs-6"><a href="tour-package-view.php?id=<?php echo $TOUR['id']; ?>">
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
                    ?>
                    <div class="row"></div>
                    <div class="row col-md-offset-3">
                        <?php Search::showPaginationTour($keyword, $noofdates, $type, $pricefrom, $priceto, $setLimit, $page); ?>
                    </div>
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