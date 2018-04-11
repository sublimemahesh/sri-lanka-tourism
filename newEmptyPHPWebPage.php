<div class="container">
                    <div class="row">
                        <div class="col-md-12" data-wow-delay="0.3s">
                            <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                                <div class="carousel-inner text-center"> 
                                    <?php
                                    $COMMENTS = getTestimonials();
                                    $li = '';
                                    foreach ($COMMENTS AS $key => $comment) {
                                        if ($key == 5)
                                            break;
                                        if ($key === 0) {
                                            $li .= '<li data-target="#quote-carousel" data-slide-to="' . $key . ' " class="active">'
                                                    . '<img class="img-responsive " src="images/testimonials/thumb/' . $comment['image_name'] . '" alt=""> '
                                                    . '</li>';
                                            ?>                          
                                            <div class="item active">
                                                <blockquote>
                                                    <div class="row">
                                                        <div class="col-sm-8 col-sm-offset-2"> 
                                                            <p><?php echo $comment["message"]; ?></p>
                                                            <small> <h4><a href="#"><?php echo $comment["name"]; ?></a></h4></small>
                                                        </div>
                                                    </div>
                                                </blockquote>
                                            </div>

                                            <?php
                                        } else {
                                            $li .= '<li data-target="#quote-carousel" data-slide-to="' . $key . ' "><img class="img-responsive " src="images/testimonials/thumb/' . $comment['image_name'] . '" alt=""> </li>';
                                            ?>
                                            <div class="item">
                                                <blockquote>
                                                    <div class="row">
                                                        <div class="col-sm-8 col-sm-offset-2"> 
                                                            <p><?php echo $comment["message"]; ?></p>
                                                            <small> <h4><a href="#"><?php echo $comment["name"]; ?></a></h4></small>
                                                        </div>
                                                    </div>
                                                </blockquote>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <ol class="carousel-indicators">
                                    <?php
                                    echo $li;
                                    ?>
                                </ol>
                                <!--                                 Carousel Buttons Next/Prev -->
                                <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                                <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>




