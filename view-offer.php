<!DOCTYPE html>
<?php
include_once(dirname(__FILE__) . '/class/include.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$OFFER_OBJ = New Offer(null);
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Offers || Sri Lanka || Tourism</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="sri lanka tourism, tourism in sri lanka, Sri Lanka, offers, tour packages offers, tour offers, tour offers in sri lanka, pakage offers, package offers in sri lanka, trip offers in sri lanka, taxi offers, taxi offers in sri lanka, vehicle offers, transport offers, transport offers in sri lanka, hotel offers, hotel offers in sri lanka, accommodation offers in sri lanka, accommodation offers, villa offers, apartment offers, villa offers in sri lanka, tours in sri lanka, taxi in sri lanka, tourism sri lanka, Accommodations, Hotels, articles in sri lanka">
        <meta name="description" content="The team Sri Lanka Tourism crew is privileged to show you and to take you around the most beautiful places in Sri Lanka. You can Plan your tour with Sri Lanka Tourism and, tours are judiciously planned and customized to meet your needs. And also, Sri Lanka Tourism features well established taxi service and hotel service. So your trip will be everything you imagined and much more.">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link href="css/search.css" rel="stylesheet" type="text/css"/>
        <link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/styles.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet"> 
        <link href="css/offer-styles.css" rel="stylesheet" type="text/css"/>
        <style>
            .message-now-btn {
                width: 50px;
            }
        </style>
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
                            foreach ($OFFER_OBJ->GetActiveOfferByType($id) as $offer) {
                                $discount = $offer['discount'];
                                $price = $offer['price'];
                                $new_price = $price - (($discount / 100) * $price);
                                $MEMBER = new Member($offer['member']);
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
                                    <div class="offer-body">
                                        <!-- title-->
                                        <h3><?php echo $offer['title'] ?></h3>
                                        <!-- Text Intro-->
                                        <?php echo $offer['description'] ?>
                                    </div>
                                    <div class="hotel-right"> 
                                        <div>
                                            <a target="blank" href="member-view.php?id=<?php echo $MEMBER->id; ?>" class="link">
                                                <?php
                                                if (empty($MEMBER->id)) {
                                                    ?>
                                                    <img src="images/admin-member-img.png" class="img-circle img-responsive vis-member-border offer-member-img"/>
                                                    <?php
                                                } else {
                                                    if (empty($MEMBER->profile_picture)) {
                                                        ?> 
                                                        <img src="upload/member/member.png" class="img-circle img-responsive vis-member-border offer-member-img"/>
                                                        <?php
                                                    } else {
                                                        if ($MEMBER->facebookID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                            ?>
                                                            <img src="<?php echo $MEMBER->profile_picture; ?>" class="img-circle img-responsive vis-member-border offer-member-img">
                                                            <?php
                                                        } elseif ($MEMBER->googleID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                            ?>
                                                            <img src="<?php echo $MEMBER->profile_picture; ?>" class="img-circle img-responsive vis-member-border offer-member-img">
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <img src="upload/member/<?php echo $MEMBER->profile_picture; ?>" class="img-circle img-responsive vis-member-border offer-member-img">
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </a>
                                        </div>
                                        <div class="hotel-person"><span class="color-blue">USD <?php echo $new_price; ?>.00</span><strike class="old-discount-price">USD <?php echo $offer['price'] ?>.00</strike> </div>
                                        <a class="thm-btn" href="offer-booking.php?offer=<?php echo $offer['id']; ?>">Get your offer</a>
                                        <a href="visitor-message.php?id=<?php echo $MEMBER->id; ?>" class="thm-btn thm-msg" title="Send Message">
                                            <i class="fa fa-comment-o"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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