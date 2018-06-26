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
                                    <div class="hotel-body">
                                        <!-- title-->
                                        <h3><?php echo $offer['title'] ?></h3>
                                        <!-- Text Intro-->
                                        <?php echo $offer['description'] ?>
                                    </div>
                                    <div class="hotel-right"> 
                                        <div>
                                            <a target="blank" href="member-view.php?id=<?php echo $MEMBER->id; ?>" class="link">
                                            <?php
                                            if (empty($MEMBER->profile_picture)) {
                                                ?> 
                                                <img src="upload/member/member.png" class="img-responsive thumbnail offer-member-img"/>
                                                <?php
                                            } else {

                                                if ($MEMBER->facebookID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                    ?>
                                                    <img src="<?php echo $MEMBER->profile_picture; ?>" class="img-responsive thumbnail offer-member-img">
                                                    <?php
                                                } else {
                                                    ?>
                                                    <img src="upload/member/<?php echo $MEMBER->profile_picture; ?>" class="img-responsive thumbnail offer-member-img">
                                                    <?php
                                                }
                                            }
                                            ?>
                                            </a>
                                        </div>

                                        <div class="hotel-person"><span class="color-blue">LKR <?php echo $new_price; ?>.00</span><strike class="old-discount-price">LKR <?php echo $offer['price'] ?>.00</strike> </div>
                                        <a class="thm-btn" href="offer-booking.php?offer=<?php echo $offer['id']; ?>">Get your offer</a>
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
