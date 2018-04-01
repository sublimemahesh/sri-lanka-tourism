<!-- Wrapper for slides -->
<div class="carousel-inner" role="listbox">
    <?php
    $sliderimg = getAllSlides();

    foreach ($sliderimg as $key => $slider) {
        if ($key == 0) {
            ?>
            <div class="item active">
                <img src="images/slider/<?php echo $slider["image_name"]; ?>" alt="Home Slider 1">
                <div class="carousel-caption content-slider">
                    <div class="container">
                        <h2><?php echo $slider['title']; ?></h2>
                        <p><?php echo $slider['description']; ?> </p>
                        <p><a href="tour_pacage_main.php" class="btn btn-slider">VIEW TOURS </a></p>
                    </div>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="item">
                <img src="images/slider/<?php echo $slider["image_name"]; ?>" alt="Home Slider 1">
                <div class="carousel-caption content-slider">
                    <div class="container">
                        <h2><?php echo $slider['title']; ?></h2>
                        <p><?php echo $slider['description']; ?> </p>
                        <p><a href="tour_pacage_main.php" class="btn btn-slider">VIEW TOURS </a></p>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>

</div>





<div class="row col-md-12">
                    <h1 class="text-center">Other Accommodation</h1> <div class="row">
                        <div id="carousel-example" class="carousel slide team team-web-view" data-ride="carousel">
                            <div class="carousel-line">
                                <div class="controls pull-right">
                                    <a class="left fa fa-angle-left btn" href="#carousel-example" data-slide="prev"></a><a class="right fa fa-angle-right btn " href="#carousel-example" data-slide="next"></a>
                                </div>
                            </div>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <?php
                                $OTHER_ACCOMMODATION = Accommodation::all();
                                foreach ($OTHER_ACCOMMODATION as $key => $other_accommodation) {
                                    if ($key == 0) {
                                        ?>
                                        <div class="item active">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="col-item">
                                                        <div class="photo-shadow"></div>
                                                        <div class="photo">
                                                            <?php
                                                            foreach ($ACCOMMODATION_PHOTO->getAccommodationPhotosById($other_accommodation['id']) as $key => $ACCOMMODATION_P) {
                                                                if ($key == 1) {
                                                                    break;
                                                                }
                                                                ?>
                                                                <img src="upload/accommodation/thumb/<?php echo $ACCOMMODATION_P['image_name']; ?>" alt="User one">
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="info">
                                                            <div class="name"><?php echo $other_accommodation['name']; ?></div>
                                                            <div class="degination">Director</div>
                                                            <div class="social-connect">
        <!--                                                                <a href="javascript:void(0);"><i class="fa fa-facebook"></i></a>
                                                                <a href="javascript:void(0);"><i class="fa fa-twitter"></i></a>
                                                                <a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a>
                                                                <a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a>-->
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="col-item">
                                                        <div class="photo-shadow"></div>
                                                        <div class="photo">
                                                            <?php
                                                            foreach ($ACCOMMODATION_PHOTO->getAccommodationPhotosById($other_accommodation['id']) as $key => $ACCOMMODATION_P) {
                                                                if ($key == 1) {
                                                                    break;
                                                                }
                                                                ?>
                                                                <img src="upload/accommodation/thumb/<?php echo $ACCOMMODATION_P['image_name']; ?>" alt="User one">
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="info">
                                                            <div class="name"><?php echo $other_accommodation['name']; ?></div>
                                                            <div class="degination">Expert Agent</div>
                                                            <div class="social-connect">
        <!--                                                                <a href="javascript:void(0);"><i class="fa fa-facebook"></i></a>
                                                                <a href="javascript:void(0);"><i class="fa fa-twitter"></i></a>
                                                                <a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a>
                                                                <a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a>-->
                                                            </div>
                                                            <div class="clearfix"></div>
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
                        </div>
                    </div>
                </div>