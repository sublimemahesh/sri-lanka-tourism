<?php
include_once(dirname(__FILE__) . '/class/include.php');

if (!isset($_SESSION)) {
    session_start();
}

$SEARCH = new Search(NULL);

$keyword = NULL;
$type = NULL;
$district = NULL;
$city = NULL;

/* set page numbers */
if (isset($_GET["page"])) {
    $page = (int) $_GET["page"];
} else {
    $page = 1;
}
$setLimit = 10;
$pageLimit = ($page * $setLimit) - $setLimit;


/* search */
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}
if (isset($_GET['type'])) {
    $type = $_GET['type'];
}
if (isset($_GET['district'])) {
    $district = $_GET['district'];
}
if (isset($_GET['city'])) {
    $city = $_GET['city'];
}

$ACCOMMODATIONS = $SEARCH->GetAccommodationByKeywords($keyword, $type, $district, $city, $pageLimit, $setLimit);
$ACCOMMODATION_PHOTO = new AccommodationPhoto(NULL);
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
  <link href="css/accommodation.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <!-- Our Resort Values style-->
        <?php
        include './header.php';
        ?>

        <div class="row background-image" style="background-color: #fff;">
            <section id="rooms-section" class="row-view" >
                    <div class="col-md-9">
                        <?php
                        foreach ($ACCOMMODATIONS as $accommodation) {
                            $ACCOMMODATION_TYPE = new AccommodationType($accommodation['type']);
                            $MEMBER = new Member($accommodation['member']);
                            ?>
                            <div class="room">
                                <a href="accommodation-view.php?id=<?php echo $accommodation['id']; ?>" class="">
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

                                    <a href="member-view.php?id=<?php echo $MEMBER->id; ?>" class="link">
                                        <?php
                                        if (empty($MEMBER->profile_picture)) {
                                            ?> 
                                            <img src="upload/member/member.png" class="img img-responsive img-thumbnail" id="profil_pic" style="width: 70px;"/>
                                            <?php
                                        } else {

                                            if ($MEMBER->facebookID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                ?>
                                                <img src="<?php echo $MEMBER->profile_picture; ?>" class="img-responsive thumbnail" style="width: 70px;">
                                                <?php
                                            } else {
                                                ?>
                                                <img src="upload/member/<?php echo $MEMBER->profile_picture; ?>" class="img-responsive thumbnail" style="width: 70px;">
                                                <?php
                                            }
                                        }
                                        ?>
                                    </a>

                          <!--                                    <p>Price for 1 night</p>-->
                                    <a href="#" class="inn-room-book">Book Now</a> </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="row">
                            <?php $SEARCH->showPaginationAccommodation($keyword, $type, $district, $city, $setLimit, $page); ?>
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
     
        <script type="text/javascript">

            $(document).ready(function () {

                $('[data-toggle="tooltip"]').tooltip();

            });

        </script>
    </body> 

</html>
