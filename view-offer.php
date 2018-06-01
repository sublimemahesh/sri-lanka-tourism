<?php
include_once(dirname(__FILE__) . '/class/include.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
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
                            <?php foreach ($OFFER_OBJ = Offer::GetOfferByType($id) as $offer) { ?>

                                <div class="room-box row room-box-new animated-box" data-animation="fadeInUp">
                                    <div class="col-md-4 room-img" style=" background-color: #E6F9FF;">
                                        
                                            <img class=" vehicle-img" src="upload/offer/<?php echo $offer['image_name'] ?>"/>
                                        
                                    </div>

                                    <div class="r-sec col-md-8">
                                        <div class="col-md-8 m-sec">
                                            <div class="title-box">
                                                <div class="title"><?php echo $offer['title'] ?></div>
                                                <div class="">
                                                    <div title="Rated < out of 5" class="" >
                                                        <span class="str" style="color: #FF9800">


                                                        </span> 
                                                    </div>
    <!--                                                    <span class="brackets">(Based on 17 reviews)</span>-->
                                                </div>
                                            </div>
                                            <div class="amenities">
                                                <ul class="list-inline clearfix">
                                                    <li class="col-md-12">
                                                        <div class="title"> TITLE :</div>
                                                        <div class="value"><?php echo $offer['title']?></div>
                                                    </li>
                                                    <li class="col-md-12">
                                                        <div class="title">URL:</div>
                                                        <div class="value"><?php echo $offer['url']?></div>
                                                    </li>
                                                    <li class="col-md-12">
                                                        <div class="title">Description:</div>
                                                        <div class="value"><?php echo $offer['description']?></div>
                                                                
                                                        </div>
                                                        </div>
                                                        <div class="col-md-4 desc desc-price m-sec">
                                                            <div class="row driver m-sec">
                                                                <div class="profile col-md-5 col-xs-4 col-sm-4">
                                                                    <a href="member-view.php?id=" class="link">


                                                                    </a>
                                                                </div>
                                                                <div class="driver-name col-md-7 col-xs-8 col-sm-8"><div class="driver-name-posted">Posted by </div>
                                                                    <span class="driver-name-span">


                                                                    </span>

                                                                </div>


                                                            </div>
                                                            <div class="bottom-sec m-sec">
                                                                <div class="pointer"><strong class="price">LKR</strong></div>
                                                                <div class="btn-padding">
                                                                    <a href="transport-booking.php?rate=" class="more-info">Book Now</a> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        </div>
                                                    <?php } ?>


                                                    <div class="row">

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
