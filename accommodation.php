<?php
include_once(dirname(__FILE__) . '/class/include.php');


$ACCOMMODATION_PHOTO = new AccommodationPhoto(NULL);
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

    </head>
    <body>
        <!-- Our Resort Values style-->
        <?php
        include './header.php';
        ?>

        <div class="row background-image" style="background-image: url('images/hotel/car.jpg');">
            <section id="rooms-section" class="row-view">
                <div class="inner-container container">
                    <div class="room-container clearfix">
                        <div class="col-md-9">
                            <?php
                            $ACCOMMODATIONS = Accommodation::all();
                            foreach ($ACCOMMODATIONS as $accommodation) {
                                ?>
                                <div class="room-box1 row animated-box animated-border" >
                                    <div class="col-md-3 room-img1 acc-image">
                                        <a href="accommodation-view.php?id=<?php echo $accommodation['id']; ?>" class="">
                                            <?php
                                            foreach ($ACCOMMODATION_PHOTO->getAccommodationPhotosById($accommodation['id']) as $key => $ACCOMMODATION_P) {
                                                if ($key == 1) {
                                                    break;
                                                }
                                                ?> 
                                                <img src="upload/accommodation/thumb/<?php echo $ACCOMMODATION_P['image_name']; ?>" class="thumbnail img-responsive accommodation-photo">
                                                <?php
                                            }
                                            ?>
                                        </a>
                                    </div>
                                    <div class="r-sec col-md-9">
                                        <div class="col-md-8 m-sec">
                                            <div class="title-box row">
                                                <div class="title col-md-6"><?php echo $accommodation['name']; ?></div>
                                                <div class="rate-line col-md-4">
                                                    <div class="star-rating star-rate" >
                                                        <span class="width-60">
                                                            <strong class="rating">3.00 out of 3 </strong>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 like">
                                                    <i class="fa fa-thumbs-up"></i>
                                                </div>
                                            </div>
                                            <div class="row location-details">
                                                <div class="location icons col-md-5">
                                                    <i class="fa fa-map-marker"></i>
                                                    <a href="" class="link-sec">Show on Map</a>
                                                </div>
                                                <div class="direction icons col-md-7">
                                                    <i class="fa fa-globe"></i>
                                                    <span class="text-d"><?php echo $accommodation['website']; ?></span>
                                                </div>
                                            </div>
                                            <div class="details">
                                                <?php echo substr($accommodation['description'],0,100).'..'; ?>
                                            </div>
                                            <div class="row facilities align-center">
                                                <div class="col-md-2 ">
                                                    <a href="#" data-toggle="tooltip" title="Spa">
                                                        <img src="assets/img/hotel/f1.png" class="img-responsive thumbnail">
                                                    </a>
                                                </div>
                                                <div class="col-md-2 img2">
                                                    <a href="#" data-toggle="tooltip" title="Restuarent">
                                                        <img src="assets/img/hotel/f2.png" class="img-responsive thumbnail">
                                                    </a>
                                                </div>
                                                <div class="col-md-2 img3">
                                                    <a href="#" data-toggle="tooltip" title="Beach">
                                                        <img src="assets/img/hotel/f5.png" class="img-responsive thumbnail">
                                                    </a>
                                                </div>
                                                <div class="col-md-2 img4">
                                                    <a href="#" data-toggle="tooltip" title="Private Pool">
                                                        <img src="assets/img/hotel/f4.png" class="img-responsive thumbnail">
                                                    </a>
                                                </div>
                                                <div class="col-md-2 img5">
                                                    <a href="#" data-toggle="tooltip" title="Garden">
                                                        <img src="assets/img/hotel/f6.png" class="img-responsive thumbnail"> 
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4 desc ">
                                            <div class="row">
                                                <div class="grade col-md-7" >
                                                    <strong class="">Excellent</strong>
                                                    <span class="brackets bottom-word">(reviews)</span>
                                                </div>
                                                <div class="score-review col-md-5">
                                                    <span class="score-rate">8.6</span>
                                                </div>
                                            </div>
                                            <div class="m-sec view-price text-center">
                                                <a href="accommodation-view.php?id=<?php echo $accommodation['id']; ?>" class="more-info1">View More</a> 
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

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


        <script type="text/javascript">

            $(document).ready(function () {

                $('[data-toggle="tooltip"]').tooltip();

            });

        </script>


    </body> 

</html>
