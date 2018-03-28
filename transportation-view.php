<?php
include_once(dirname(__FILE__) . '/class/include.php');
$id = $_GET["id"];
$VIEW_TRANSPORTS = new Transports($id);
$TRANSPORTS = new Transports($id);
$TRANSPORTS_PHOTO = new TransportPhoto(NULL);
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
        <link href="assets/css/styles.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/comments-style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <!-- Our Resort Values style-->
        <?php
        include './header.php';
        ?>

        <div class="row" style="background-color: #fff;">
            <div class="container transport-container">
                <div class="row">
                    <div class="col-md-8 p pro-details">
                        <div id="galleria" class="galleria-slider">
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
                    </div>
                    <div class="col-md-4 ">
                        <div class="right-side">
                            <div class="transport-facilities details-vehical">
                                <div class="row">
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
                            </div>
                            <div class="more-transport">
                                <div class="row" >
                                    <h3 class="subtitle fancy"><span>Other Transport</span></h3>

                                    <?php
                                    $OTHER_TRANSPORT = Transports::all();
                                    foreach ($OTHER_TRANSPORT as $other_transports) {
                                        ?>
                                        <div class="car-pack col-md-12">
                                            <div class="col-md-4 hover01">
                                                <?php
                                                foreach ($TRANSPORTS_PHOTO->getTransportPhotosById($other_transports['id']) as $key => $TRANSPORTS_P) {
                                                    if ($key == 1) {
                                                        break;
                                                    }
                                                    ?>
                                                    <figure><img src="upload/transport/thumb/<?php echo $TRANSPORTS_P['image_name']; ?>" alt="" class="img-responsive" style="width: 100px; height: 75px;"/></figure>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="transports-desc">
                                                    <?php echo substr($other_transports ['description'], 0, 75) . '...'; ?>
                                                </div>
                                                <div class="t-more text-center">
                                                    <a href="transportation-view.php?id=<?php echo $other_transports['id']; ?>" class="btn btn-sm blue">
                                                        <span class="fa fa-eye"></span>View
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12">			
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
                            <div class="item carousel-item active">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="testimonial">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante.</p>
                                        </div>
                                        <div class="media">
                                            <div class="media-left d-flex mr-3">
                                                <img src="assets/img/comments/2.jpg" alt=""/>										
                                            </div>
                                            <div class="media-body">
                                                <div class="overview">
                                                    <div class="name"><b>Paula Wilson</b></div>
                                                    <div class="details">Media Analyst / SkyNet</div>
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
                                    <div class="col-sm-6">
                                        <div class="testimonial">
                                            <p>Vestibulum quis quam ut magna consequat faucibu. Eget mi suscipit tincidunt. Utmtc tempus dictum. Pellentesque virra. Quis quam ut magna consequat faucibus quam.</p>
                                        </div>
                                        <div class="media">
                                            <div class="media-left d-flex mr-3">
                                                <img src="assets/img/comments/1.jpg" alt=""/>
                                            </div>
                                            <div class="media-body">
                                                <div class="overview">
                                                    <div class="name"><b>Antonio Moreno</b></div>
                                                    <div class="details">Web Developer / SoftBee</div>
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
                            <div class="item carousel-item">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="testimonial">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante.</p>
                                        </div>
                                        <div class="media">
                                            <div class="media-left d-flex mr-3">										
                                                <img src="assets/img/comments/2.jpg" alt=""/>
                                            </div>
                                            <div class="media-body">
                                                <div class="overview">
                                                    <div class="name"><b>Michael Holz</b></div>
                                                    <div class="details">Web Developer / DevCorp</div>											
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
                                    <div class="col-sm-6">
                                        <div class="testimonial">
                                            <p>Vestibulum quis quam ut magna consequat faucibu. Eget mi suscipit tincidunt. Utmtc tempus dictum. Pellentesque virra. Quis quam ut magna consequat faucibus quam.</p>
                                        </div>
                                        <div class="media">
                                            <div class="media-left d-flex mr-3">
                                                <img src="assets/img/comments/3.jpg" alt=""/>
                                            </div>
                                            <div class="media-body">
                                                <div class="overview">
                                                    <div class="name"><b>Mary Saveley</b></div>
                                                    <div class="details">Graphic Designer / MarsMedia</div>
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
                            <div class="item carousel-item">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="testimonial">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante.</p>
                                        </div>
                                        <div class="media">
                                            <div class="media-left d-flex mr-3">
                                                <img src="assets/img/comments/2.jpg" alt=""/>
                                            </div>
                                            <div class="media-body">
                                                <div class="overview">
                                                    <div class="name"><b>Martin Sommer</b></div>
                                                    <div class="details">SEO Analyst / RealSearch</div>
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
                                    <div class="col-sm-6">
                                        <div class="testimonial">
                                            <p>Vestibulum quis quam ut magna consequat faucibu. Eget mi suscipit tincidunt. Utmtc tempus dictum. Pellentesque virra. Quis quam ut magna consequat faucibus quam.</p>
                                        </div>
                                        <div class="media">
                                            <div class="media-left d-flex mr-3">
                                                <img src="assets/img/comments/2.jpg" alt=""/>										
                                            </div>
                                            <div class="media-body">
                                                <div class="overview">
                                                    <div class="name"><b>John Williams</b></div>
                                                    <div class="details">Web Designer / UniqueDesign</div>
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
                        </div>
                        <!-- Carousel controls -->
                        <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                            <i class="fa fa-chevron-left"></i>
                        </a>
                        <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                            <i class="fa fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>                                		                            
</div>
</div>


<!-- Our Resort Values style-->  
<?php
include './footer.php';
?>
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.flexslider.js" type="text/javascript"></script>
<link href="css/galleria.classic.css" rel="stylesheet" type="text/css"/>
<script src="js/galleria.js" type="text/javascript"></script>
<script src="js/galleria.classic.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $('#galleria').galleria({
        responsive: true,
        height: 500,
        autoplay: 7000,
        lightbox: true,
        showInfo: true,
//                imageCrop: true,
    });
</script>
</body> 

</html>

