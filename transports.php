<?php
include_once(dirname(__FILE__) . '/class/include.php');

if (!isset($_SESSION)) {
    session_start();
}

$SEARCH = new Search(NULL);
$TRANSPORTS_PHOTO = new TransportPhoto(NULL);
$from = NULL;
$to = NULL;
$type = NULL;
$condition = NULL;
$passengers = NULL;


/* set page numbers */
if (isset($_GET["page"])) {
    $page = (int) $_GET["page"];
} else {
    $page = 1;
}
$setLimit = 10;
$pageLimit = ($page * $setLimit) - $setLimit;

/* search */
if (isset($_GET['from'])) {
    $from = $_GET['from'];
}
if (isset($_GET['to'])) {
    $to = $_GET['to'];
}
if (isset($_GET['type'])) {
    $type = $_GET['type'];
}
if (isset($_GET['condition'])) {
    $condition = $_GET['condition'];
}
if (isset($_GET['passengers'])) {
    $passengers = $_GET['passengers'];
}

$TRANSPORTS = $SEARCH->GetTransportByLocationFromAndTo($from, $to, $type, $condition, $passengers, $pageLimit, $setLimit);
?>
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
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet"> 

    </head>
    <body>
        <!-- Our Resort Values style-->
        <?php
        include './header.php';
        ?>

        <div class="row background-image" style="background-color: #fff;">
            <section id="rooms-section" class="row-view">
                <div class="inner-container container">
                    <div class="room-container clearfix">
                        <div class="col-md-9">
                            <?php
                            foreach ($TRANSPORTS as $transport) {
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

                                                        </span> (<?php echo $rate_count;?> Reviews)
                                                    </div>
    <!--                                                    <span class="brackets">(Based on 17 reviews)</span>-->
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
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-4 desc desc-price m-sec">
                                            <div class="row driver m-sec">
                                                <div class="profile col-md-5 col-xs-4 col-sm-4">
                                                    <a href="member-view.php?id=<?php echo $MEMBER->id; ?>" class="link">
                                                        <?php
                                                        if (empty($MEMBER->profile_picture)) {
                                                            ?> 
                                                            <img src="upload/member/member.png" class="img img-responsive img-thumbnail" id="profil_pic"/>
                                                            <?php
                                                        } else {
                                                            if ($MEMBER->facebookID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                                ?>
                                                                <img src="<?php echo $MEMBER->profile_picture; ?>" class="img-responsive thumbnail">
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <img src="upload/member/<?php echo $MEMBER->profile_picture; ?>" class="img-responsive thumbnail">
                                                                <?php
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
                                            <div class="bottom-sec m-sec">
                                                <div class="pointer"><strong class="price">LKR <?php echo $transport['transport_price']; ?></strong></div>
                                                <div class="btn-padding">
                                                    <a href="transport-booking.php?rate=<?php echo $transport['transport_rate']; ?>&visitor=<?php echo $_SESSION['id']; ?>" class="more-info">Book Now</a> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="row">
                                <?php Search::showPagination($from, $to, $type, $condition, $passengers, $setLimit, $page); ?>
                            </div>
                        </div>

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
