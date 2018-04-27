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
$setLimit = 9;
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
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link href="css/search.css" rel="stylesheet" type="text/css"/>
        <link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/styles.css" rel="stylesheet" type="text/css"/>
        <link href="admin/plugins/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet"> 
    </head>
    <body>
        <!-- Our Resort Values style-->
        <?php
        include './header.php';
        ?>

        <div class="row background-image" style="background-image: url('images/hotel/sea.jpg');">
            <section>
                <div class="container inner-container1">
                    <div class="row">
                        <?php
                        foreach ($TOURS as $TOUR) {
                            $id = $TOUR['id'];
                            $result = TourSubSection::CountDaysInTour($id);
                            $days = $result['days'];
                            $night = (int) $days - 1;
                            ?>
                            <div class="col-md-4 main-pack">
                                <div class=" tour-photo polygon">
                                    <img src="upload/tour-package/<?php echo $TOUR['picture_name']; ?>" class="img-responsive image-back"/>
                                    <div class="nights text-center ">
                                        <?php
                                        if ($night < 10) {
                                            echo '0' . $night;
                                        } else {
                                            echo $night;
                                        }
                                        ?> <div class="text-night">
                                            Nights
                                        </div>
                                    </div>
                                    <div class="days">
                                        <?php
                                        if ($days < 10) {
                                            echo '0' . $days;
                                        } else {
                                            echo $days;
                                        }
                                        ?> <div class="text-days text-center">
                                            Days
                                        </div>
                                    </div>
                                </div>
                                <div class="triangle-topright" id="triangle-topright" >
                                    <div class="triangle-bottomright" id="triangle-bottomright" > </div>
                                    <div class="body-title text-uppercase">
                                        <span><?php echo $TOUR['name']; ?></span>
                                    </div>
                                    <div class="col-md-6 mid-section">
                                        <div class="body-description text-center">
                                            <div class="prices">
                                                <span>Starting From</span><br/>
                                                <span>LKR: <?php echo $TOUR['price']; ?>/=</span><br/>
                                            </div>
                                            <div class="more-details">
                                                <span><?php echo substr($TOUR['description'], 0, 60); ?></span>
                                            </div>
                                            <div class="contact-details">
                                                <h5>Contact</h5>
                                                <span class="mobile-numbers">911-34234517 / 911-234567</span><br/>
                                                <span class="text-center">MIN-2 PAX</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <?php
                        }
                        ?>

<!--                        <div class="col-md-4 main-pack">
                            <div class=" tour-photo polygon">
                                <img src="assets/img/tour/imgtour.jpg" class="img-responsive image-back"/>
                                <div class="nights text-center ">
                                    04 <div class="text-night">
                                        Nights
                                    </div>
                                </div>
                                <div class="days">
                                    05 <div class="text-days text-center">
                                        Days
                                    </div>
                                </div>
                            </div>
                            <div class="triangle-topright" id="triangle-topright" >
                                <div class="triangle-bottomright" id="triangle-bottomright" > </div>
                                <div class="body-title text-uppercase">
                                    <span>sri lanaka</span>
                                </div>
                                <div class="col-md-6 mid-section">
                                    <div class="body-description text-center">
                                        <div class="prices">
                                            <span>Starting From</span><br/>
                                            <span>LKR: 234566/=</span><br/>
                                        </div>
                                        <div class="more-details">
                                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit </span>
                                        </div>
                                        <div class="contact-details">
                                            <h5>Contact</h5>
                                            <span class="mobile-numbers">911-34234517 / 911-234567</span><br/>
                                            <span class="text-center">MIN-2 PAX</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>-->

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
