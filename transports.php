<?php
include_once(dirname(__FILE__) . '/class/include.php');

$TRANSPORT = Transports::all();
$TRANSPORTS_PHOTO = new TransportPhoto(NULL);
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
                            $TRANSPORTS = Transports::all();
                            foreach ($TRANSPORTS as $transport) {
                                $FUEL_TYPE = new FuelType($transport['fuel_type']);
                                $VEHICLE_TYPE = new VehicleType($transport['vehicle_type']);
                                $MEMBER = new Member($transport['member']);
                                ?>
                                <div class="room-box row room-box-new animated-box" data-animation="fadeInUp">
                                    <?php
                                    foreach ($TRANSPORTS_PHOTO->getTransportPhotosById($transport['id']) as $key => $TRANSPORTS_P) {
                                        if ($key == 1) {
                                            break;
                                        }
                                        ?>
                                    <div class="col-md-4 room-img " style=" background-color: #E6F9FF;">
                                            <a href="transportation-view.php?id=<?php echo $transport['id']; ?>">
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

                                                <div class="row driver">
                                                    <div class="profile col-md-3">
                                                        <a href="" class="link">
                                                            <?php
                                                            if (empty($MEMBER->profile_picture)) {
                                                                ?>
                                                                <img src="upload/member/member.png" class="img img-responsive img-thumbnail" id="profil_pic"/>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <img src="upload/member/<?php echo $MEMBER->profile_picture; ?>" class="img-responsive thumbnail">
                                                                <?php
                                                            }
                                                            ?>
                                                        </a>
                                                    </div>
                                                    <div class="driver-name col-md-9 text-left"><?php echo $MEMBER->name; ?></div>

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
                                        <div class="col-md-4 desc desc-price">
                                            <div class="rates">
                                                <div title="Rated 5.00 out of 5" class="star-rating" >
                                                    <span class="width-80">
                                                        <strong class="rating">5.00 out of 5 </strong>
                                                    </span>
                                                </div>
                                                <span class="brackets">(Based on 17 reviews)</span>
                                            </div>
                                            <div class="bottom-sec">
                                                <div class="pointer"><strong class="price">US$ 350</strong></div>
                                                <div class="m-sec btn-padding">
                                                    <a href="transportation-view.php?id=<?php echo $transport['id']; ?>" class="more-info">Book Now</a> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    <?php
}
?>
                            <div class="col-md-3"></div>
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
        <script>
            $(function () {
                $("#datepicker").datepicker({
                    autoclose: true,
                    todayHighlight: true
                }).datepicker('update', new Date());
            });

            $(function () {
                $("#datepicker1").datepicker({
                    autoclose: true,
                    todayHighlight: true
                }).datepicker('update', new Date());
            });

            $(function () {
                $("#datepicker2").datepicker({
                    autoclose: true,
                    todayHighlight: true
                }).datepicker('update', new Date());
            });

            $(function () {
                $("#datepicker3").datepicker({
                    autoclose: true,
                    todayHighlight: true
                }).datepicker('update', new Date());
            });

            $(function () {
                $("#datepicker4").datepicker({
                    autoclose: true,
                    todayHighlight: true
                }).datepicker('update', new Date());
            });

            $(function () {
                $("#datepicker5").datepicker({
                    autoclose: true,
                    todayHighlight: true
                }).datepicker('update', new Date());
            });


        </script>
        <script>
            var $star_rating = $('.star-rating .fa');

            var SetRatingStar = function () {
                return $star_rating.each(function () {
                    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
                        return $(this).removeClass('fa-star-o').addClass('fa-star');
                    } else {
                        return $(this).removeClass('fa-star').addClass('fa-star-o');
                    }
                });
            };

            $star_rating.on('click', function () {
                $star_rating.siblings('input.rating-value').val($(this).data('rating'));
                return SetRatingStar();
            });

            SetRatingStar();
            $(document).ready(function () {

            });
        </script>
    </body> 

</html>
