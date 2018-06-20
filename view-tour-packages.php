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

        <style>
            @media (max-width: 480px) {
                .carousel .testimonial {
                    margin: 0px;
                }
            }
        </style>
    </head>
    <body>
        <!-- Our Resort Values style-->
        <?php
        include './header.php';
        ?>

        <div class="row background-image" style="background-image: url('images/hotel/sea.jpg');">
            <section>
                <div class="container inner-container1 inner-tour-pack">
                    <div class="row">
                        <?php
                        foreach ($TOURS as $TOUR) {
                            $id = $TOUR['id'];
                            $result = TourSubSection::CountDaysInTour($id);
                            $days = $result['days'];
                            $night = (int) $days - 1;

                            $MEMBER = new Member($TOUR['member']);
                            $TYPE = new TourType($TOUR['tour_type']);
                            ?>
                            <div class="tour-pack1 col-md-3 col-sm-4">
                                <div class="tour-pack">
                                    <div class="tour-img">
                                        <img src="upload/tour-package/thumb/<?php echo $TOUR['picture_name'];?>" alt=""/>
                                    </div>
                                    <div class="tour-duration">
                                        <div class="tour-days pull-left">
                                            <i class="fa fa-sun-o"></i> 
                                            <?php
                                            if ($days < 10) {
                                                echo '0' . $days;
                                            } else {
                                                echo $days;
                                            }
                                            ?>
                                        </div>
                                        <div class="tour-nights pull-right">
                                            <i class="fa fa-moon-o"></i>
                                            <?php
                                            if ($night < 10) {
                                                echo '0' . $night;
                                            } else {
                                                echo $night;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="tour-dtls">
                                        <div class="row">
                                            <a href="tour-package-view.php?id=<?php echo $TOUR['id']; ?>" title="<?php echo $TOUR['name']; ?>">
                                                <div class="tour-title col-md-9 pull-left">
                                                    <?php
                                                    if (strlen($TOUR['name']) > 18) {
                                                        echo substr($TOUR['name'], 0, 17) . '...';
                                                    } else {
                                                        echo $TOUR['name'];
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
                                        <div class="row">
                                            <div class="tour-price pull-left"><i class="fa fa-dollar"></i> LKR <?php echo $TOUR['price']; ?>/=</div>
                                            <div class="tour-rate pull-right">
                                                <?php
                                                $starNumber = Feedback::getRatingByTour($id);

                                                for ($x = 1; $x <= $starNumber; $x++) {
                                                    echo '<i class="fa fa-star"></i>';
                                                }

                                                while ($x <= 5) {
                                                    echo '<i class="fa fa-star-o"></i>';
                                                    $x++;
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <div class="row tour-desc"><?php echo substr($TOUR['description'], 0, 85) . '...'; ?></div>
                                        <div class="row">
                                            <div class="tour-type pull-left" title="<?php echo $TYPE->name . ' Type'; ?>">
                                                <i class="fa fa-certificate"></i> 
                                                <?php
                                                if (strlen($TYPE->name) > 8) {
                                                    echo substr($TYPE->name, 0, 10) . '...';
                                                } else {
                                                    echo $TYPE->name . ' Type';
                                                }
                                                ?>
                                            </div>
                                            <a href="tour-package-view.php?id=<?php echo $TOUR['id']; ?>"><div class="tour-btn pull-right btn btn-sm blue">Read More<span class="glyphicon glyphicon-eye-open"></span></div></a>
                                        </div> 

                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

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
