<?php
include_once(dirname(__FILE__) . '/class/include.php');
if (!isset($_SESSION)) {
    session_start();
}
$id = $_GET["id"];
$VIEW_TRANSPORTS = new Transports($id);
$TRANSPORTS = new Transports($id);
$TRANSPORTS_PHOTO = new TransportPhoto(NULL);
$TRANSPORT_RATE_OBJ = new TransportRates(NULL);
$TRANSPORT_RATE = $TRANSPORT_RATE_OBJ->GetTransportRatesByTransportId($id);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sri Lanka || Tourism</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link href="css/search.css" rel="stylesheet" type="text/css"/>
        <link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
        <!--<link href="css/style.css" rel="stylesheet" type="text/css"/>-->
        <link href="css/responsive-table.css" rel="stylesheet" type="text/css"/>
        <link href="visitor-feedback/validation-styles.css" rel="stylesheet" type="text/css"/>
        <link href="css/comments-style.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet"> 

        <style>
            .more-transport-container{
                margin-left: 10px;
                margin-right: 10px;
                margin-top: 5px;
                margin-bottom: 5px;
                border: 1px solid #c2d3d5;
            }
        </style>
    </head>
    <body>
        <!-- Our Resort Values style-->
        <?php
        include './header.php';
        ?>

        <div class="row" style="background-color: #fff;">
            <div class="container transport-container">
                <div class="col-md-8 p pro-details">

                    <div id="transport_photos" class="galleria-slider">
                        <?php
                        $VIEW_TRANSPORT = TransportPhoto::getTransportPhotosById($id);
                        foreach ($VIEW_TRANSPORT as $key => $img) {
                            $FUEL_TYPE = new FuelType($VIEW_TRANSPORTS->fuel_type);
                            $CONDITION = new VehicleCondition($VIEW_TRANSPORTS->condition);
                            ?>
                            <a href="upload/transport/<?php echo $img['image_name']; ?>">
                                <img src="upload/transport/thumb/<?php echo $img['image_name']; ?>" data-title="" >
                            </a>
                            <?php
                        }
                        ?>
                    </div> 
                    <div class="transport-description">
                        <span>
                            <?php echo $VIEW_TRANSPORTS->description; ?>
                        </span>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Picking Up</th>
                                <th>Dropping Off</th>
                                <th>Distance(KM)</th>
                                <th>Price(Rs)</th>
                                <th>Option</th>

                        <tbody>
                            <?php
                            foreach ($TRANSPORT_RATE as $transport_rate) {
                                $CITYFROM = new City($transport_rate['location_from']);
                                $CITYTO = new City($transport_rate['location_to']);
                                ?>
                                <tr>
                                    <td  data-column="Picking Up"><?Php echo $CITYFROM->name; ?></td>
                                    <td data-column="Dropping Off"><?Php echo $CITYTO->name; ?></td>
                                    <td data-column="Distance(KM)"><?Php echo $transport_rate['distance'] . ' KM'; ?></td>
                                    <td data-column="Price(Rs)"><?Php echo 'Rs.' . $transport_rate['price']; ?></td>
                                    <td> <a href="transport-booking.php?rate=<?php echo $transport_rate['id']; ?>&visitor=<?php echo $_SESSION['id']; ?>" class="transport-book-button">
                                            Book Now
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>


                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <h2 class="t-comment">Customer <b>Testimonials</b></h2>
                        <!-- Carousel indicators -->

                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>   


                        <!-- Wrapper for carousel items -->
                        <div class="carousel-inner">
                            <?php
                            $FEEDBACK = new Feedback(NULL);
                            $TRANSPORT_FEEDBACKS = $FEEDBACK->getFeedbackByTransportID($id);
                            $li = '';
                            foreach ($TRANSPORT_FEEDBACKS as $key => $transport_feedback) {
                                $VISITOR = new Visitor($transport_feedback['visitor']);
                                if ($key === 0) {
                                    $li .= ' <li data-target="#myCarousel" data-slide-to="' . $key . '" class="active">'
                                            . '</li>';
                                    ?>  
                                    <div class="item carousel-item active">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="testimonial">
                                                    <p><?php echo $transport_feedback['description']; ?></p>
                                                </div>
                                                <div class="media">
                                                    <div class="media-left d-flex mr-3">
                                                        <img src="upload/visitor/<?php echo $VISITOR->image_name ?>" alt=""/>										
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="overview">
                                                            <div class="name"><b><?php echo $VISITOR->first_name . ' ' . $VISITOR->second_name ?></b></div>
                                                            <div class="details"><?php echo $transport_feedback['title']; ?></div>
                                                            <div class="star-rating-t">
                                                                <ul class="list-inline">
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>										
                                                    </div>
                                                </div>
                                            </div>

                                        </div>			
                                    </div>
                                    <?php
                                } else {
                                    $li .= ' <li data-target="#myCarousel" data-slide-to="' . $key . '">'
                                            . '</li>';
                                    ?>
                                    <div class="item carousel-item">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="testimonial">
                                                    <p><?php echo $transport_feedback['description']; ?></p>
                                                </div>
                                                <div class="media">
                                                    <div class="media-left d-flex mr-3">
                                                        <img src="upload/visitor/<?php echo $VISITOR->image_name ?>" alt=""/>										
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="overview">
                                                            <div class="name"><b><?php echo $VISITOR->first_name . ' ' . $VISITOR->second_name ?></b></div>
                                                            <div class="details"><?php echo $transport_feedback['title']; ?></div>
                                                            <div class="star-rating-t">
                                                                <ul class="list-inline">
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>										
                                                    </div>
                                                </div>
                                            </div>

                                        </div>			
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <!-- Carousel controls -->
                        <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                            <i class="fa fa-chevron-left"></i>
                        </a>
                        <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                            <i class="fa fa-chevron-right"></i>
                        </a>
                        <div class="text-center">
                            <button type="submit" id="btn-add-comment" class="btn btn-info">
                                <i class="fa fa-plus"></i>  Add Your Comment
                            </button>
                        </div>

                        <?php
                        include './add-feedback.php';
                        ?>
                    </div>

                </div>
                <div class="col-md-4 ">
                    <div class="right-side">
                        <div class="transport-facilities details-vehical">

                            <div class=" ">
                                <h3 class="subtitle fancy"><span>Lorem</span></h3>
                                <div class="car-type text-uppercase"><strong> <?php echo $VIEW_TRANSPORTS->title; ?></strong></div>
                                <div class="car-name"><strong> <?php echo $CONDITION->name; ?></strong></div>
                                <div class="row facility-list">
                                    <div class="col-md-2 ">
                                        <img src="assets/img/transport/people.png" class="facility-img">
                                        <span><?php echo $VIEW_TRANSPORTS->no_of_passangers; ?></span>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="assets/img/transport/luggage.png"class="facility-img">
                                        <span><?php echo $VIEW_TRANSPORTS->no_of_baggages; ?></span>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="assets/img/transport/door.png"class="facility-img">
                                        <span><?php echo $VIEW_TRANSPORTS->no_of_doors; ?></span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php
                                        if ($TRANSPORTS->ac == 1) {
                                            ?>
                                            <img src="assets/img/transport/snow.png"class="facility-img">
                                            <span>Air Conditioned  </span>
                                            <?php
                                        } else {
                                            ?>
                                            <img src="assets/img/transport/snow.png"class="facility-img">
                                            <span>Non Air Conditioned </span>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="row car-details ">

                                    <div class="col-md-12 fuel-type">
                                        <span><strong>Fuel Type:</strong> <?php echo $FUEL_TYPE->name; ?> </span>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="more-transport">


                            <h3 class="subtitle fancy"><span>Other Transport</span></h3>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="more-transport-container">
                                        <img style="width: 30%;" src="upload/transport/thumb/-112524933121_78678207785_1524829818_n.jpg">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="more-transport-container">
                                        <img style="width: 30%;" src="upload/transport/thumb/-112880884_191090260022_1522838121_n.jpg">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="more-transport-container">
                                        <img style="width: 30%;" src="upload/transport/thumb/-15234980429_175968160477_1525149970_n.jpg">
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>


            </div>

        </div>

        <?php
        include './footer.php';
        ?>
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js" type="text/javascript"></script>
        <script src="js/jquery.flexslider.js" type="text/javascript"></script>
        <link href="galleria/themes/classic/galleria.classic.css" rel="stylesheet" type="text/css"/>
        <script src="js/galleria.js" type="text/javascript"></script>
        <script src="js/galleria.classic.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $('#transport_photos').galleria({
                responsive: true,
                height: 500,
                autoplay: 7000,
                lightbox: true,
                showInfo: true,

                //                imageCrop: true,
            });
        </script>
        <script>
            jQuery(document).ready(function () {
                jQuery('#btn-add-comment').click(function () {
                    jQuery("#myModal").modal('show');
                });

            });


            jQuery('#create').click(function (event) {

                event.preventDefault();

                var captchacode = jQuery('#captchacode').val();

                jQuery.ajax({
                    url: "visitor-feedback/captchacode.php",
                    cache: false,
                    dataType: "json",
                    type: "POST",
                    data: {
                        captchacode: captchacode

                    },
                    success: function (html) {
                        var status = html.status;
                        var msg = html.msg;

                        if (status == "incorrect") {

                            jQuery("#capspan").addClass("notvalidated");
                            jQuery("#capspan").html(msg);
                            jQuery("#capspan").show();
                            jQuery("#capspan").fadeOut(2000);

                        } else if (status == "correct") {
                            jQuery('#client-comment').submit();
                        }
                    }
                });
            });
        </script>

    </body> 

</html>


