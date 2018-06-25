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
        <link href="css/offer-styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <!-- Our Resort Values style-->
        <?php
        include './header.php';
        ?>
        <section class="hotel-inner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="hotel-list-content">
                            <?php
                            foreach ($OFFER_OBJ = Offer::GetOfferByType($id) as $offer) {
                                $discount = $offer['discount'];
                                $price = $offer['price'];
                                $new_price = $price - (($discount / 100) * $price);
                                ?>
                                <div class="hotel-item">
                                    <div class="ribbon"><span><?php echo $offer['discount'] ?>% off</span></div>
                                    <!-- hotel Image-->
                                    <div class="hotel-image">
                                        <a href="#">
                                            <div class="img"><img src="upload/offer/<?php echo $offer['image_name'] ?>" alt="" class="img-responsive"></div>
                                        </a>
                                    </div>
                                    <!-- hotel body-->
                                    <div class="hotel-body">
                                        <!-- title-->
                                        <h3><?php echo $offer['title'] ?></h3>
                                        <!-- Text Intro-->
                                        <?php echo $offer['description'] ?>
                                    </div>
                                    <div class="hotel-right"> 
                                        <div class="hotel-person"><strike class="old-discount-price">LKR <?php echo $offer['price'] ?>.00</strike> <span class="color-blue">LKR <?php echo $new_price; ?>.00</span></div>
                                        <a class="thm-btn" href="#">Get your offer</a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!--        <div class="row background-image" style="background-color: #fff;">
                    <section id="rooms-section" class="row-view">
                        <div class="inner-container container">
                            <div class="room-container clearfix">
        
                                <div class="hotel-item">
                                     hotel Image
                                    <div class="hotel-image">
                                        <a href="#">
                                            <div class="img"><img src="upload/offer/-188812692_191014328214_1527844034_n.jpg" alt="" class="img-responsive"></div>
                                        </a>
                                    </div>
                                     hotel body
                                    <div class="hotel-body">
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                         title
                                        <h3>Tours in Greece</h3>
                                         Text Intro
                                        <p>Etiam maximus molestie accumsan. Sed metus sapien, fermentum nec lorem ac.</p>
                                        <div class="free-service">
                                            <i class="flaticon-television" data-toggle="tooltip" data-placement="top" title="" data-original-title="Plasma TV with cable chanels"></i>
                                            <i class="flaticon-swimmer" data-toggle="tooltip" data-placement="top" title="" data-original-title="Swimming pool"></i>
                                            <i class="flaticon-wifi" data-toggle="tooltip" data-placement="top" title="" data-original-title="Free wifi"></i>
                                            <i class="flaticon-weightlifting" data-toggle="tooltip" data-placement="top" title="" data-original-title="Fitness center"></i>
                                            <i class="flaticon-lemonade" data-toggle="tooltip" data-placement="top" title="" data-original-title="Restaurant"></i>
                                        </div>
                                    </div>
                                    <div class="hotel-right"> 
                                        <div class="hotel-person">from <span class="color-blue">$273</span> person</div>
                                        <a class="thm-btn" href="#">Details</a>
                                    </div>
                                </div>
        
        
        
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
                                                                                                                                                        <span class="brackets">(Based on 17 reviews)</span>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="amenities">
                                                                                                                                                <ul class="list-inline clearfix">
                                                                                                                                                    <li class="col-md-12">
                                                                                                                                                        <div class="title"> TITLE :</div>
                                                                                                                                                        <div class="value"><?php echo $offer['title'] ?></div>
                                                                                                                                                    </li>
                                                                                                                                                    <li class="col-md-12">
                                                                                                                                                        <div class="title">URL:</div>
                                                                                                                                                        <div class="value"><?php echo $offer['url'] ?></div>
                                                                                                                                                    </li>
                                                                                                                                                    <li class="col-md-12">
                                                                                                                                                        <div class="title">Description:</div>
                                                                                                                                                        <div class="value"><?php echo $offer['description'] ?></div>
                                                                                                                                                                
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
                </div>-->

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
