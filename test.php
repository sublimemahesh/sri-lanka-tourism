<?php
include_once(dirname(__FILE__) . '/class/include.php');
?>
<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
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
                        <div class="col-sm-12">
                            <div class="testimonial">
                                <p>fdghdhhh</p>
                            </div>
                            <div class="media">
                                <div class="media-left d-flex mr-3">
                                    <img src="upload/visitor/-535179229_190667961677_1524565790_n.jpg" alt=""/>										
                                </div>
                                <div class="media-body">
                                    <div class="overview">
                                        <div class="name"><b>hrthr</b></div>
                                        <div class="details">rhrthrh</div>
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
            <div class="text-center">
                <button type="submit" id="btn-add-comment" class="btn btn-info">
                    <i class="fa fa-plus"></i>  Add Your Comment
                </button>
            </div>

            <?php
            include './add-feedback.php';
            ?>
        </div>
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js" type="text/javascript"></script>
    </body>
</html>





