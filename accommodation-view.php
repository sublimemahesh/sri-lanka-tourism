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
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/bicon.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <!-- Our Resort Values style-->
        <?php
        include './header.php';
        ?>

        <div class="row" style="background-color: #f8f1f1;">
            <div class="container transport-container">
                <div class="row">
                    <div class="col-md-8 p pro-details">
                        <div id="galleria" class="galleria-slider">
                            <a href="assets/img/rooms/1.jpg">
                                <img src="assets/img/rooms/1r.jpg" data-title="" >
                            </a>
                            <a href="assets/img/rooms/2.jpg">
                                <img src="assets/img/rooms/2r.jpg" data-title="" >
                            </a>
                            <a href="assets/img/rooms/3.jpg">
                                <img src="assets/img/rooms/3r.jpg" data-title="" >
                            </a>
                            <a href="assets/img/rooms/4.jpg">
                                <img src="assets/img/rooms/4r.jpg" data-title="" >
                            </a>
                            <a href="assets/img/rooms/5.jpg">
                                <img src="assets/img/rooms/5r.jpg" data-title="" >
                            </a>
                        </div> 
                        <div class="view-room-description">
                            <span>
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                Donec quam felis, ultricies nec, pellentesque eu, pretium quis,
                                sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec.
                            </span>
                        </div>

                        <div class="rooms-details">
                            <table class="table-responsive room-detail-table" style="background: #fff; color: #000;">
                                <tr style="background-color:#007bb5;">
                                    <th>Room Type</th>
                                    <th>Sleeps</th>
                                    <th>Today's Price</th>
                                    <th>Your Choice</th>
                                </tr>
                                <tr>
                                    <td>
                                        <button class="room-slide-btn" id="myBtn">Room name</button>
                                        <div id="myModal" class="modal">
                                            <div class="modal-content">
                                                <span class="close">&times;</span>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div id="galleria1" class="galleria-slider">
                                                            <a href="assets/img/rooms/1.jpg">
                                                                <img src="assets/img/rooms/1r.jpg" data-title="" >
                                                            </a>
                                                            <a href="assets/img/rooms/2.jpg">
                                                                <img src="assets/img/rooms/2r.jpg" data-title="" >
                                                            </a>
                                                            <a href="assets/img/rooms/3.jpg">
                                                                <img src="assets/img/rooms/3r.jpg" data-title="" >
                                                            </a>
                                                            <a href="assets/img/rooms/4.jpg">
                                                                <img src="assets/img/rooms/4r.jpg" data-title="" >
                                                            </a>
                                                            <a href="assets/img/rooms/5.jpg">
                                                                <img src="assets/img/rooms/5r.jpg" data-title="" >
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 inner-facility-section">
                                                         <div class="inner-top-title">
                                                             <img src="assets/img/facility/bathtub.png" alt=""/>
                                                            <span>Private Bathroom</span>
                                                        </div>
                                                        <div class="room-area">
                                                            <strong>Room Size</strong><span> 60m<sup>2</sup></span>
                                                        </div>
                                                        <div class="row">
                                                            <strong class="inner-facility-title">Room Facilities:</strong>
                                                            <div class="list-of-facilities">
                                                                <div class="col-md-6">
                                                                    <li>Mosquito net</li>
                                                                    <li>Wardrobe/ Closet</li>
                                                                    <li>Drying rack for clothing</li>
                                                                    <li>Hairdryer</li>
                                                                    <li>Bathrobe</li>
                                                                    <li>Free toiletries</li>
                                                                    <li>Toilet</li>
                                                                    <li>Private bathroom</li>
                                                                    <li>Bathtub or shower</li>
                                                                    <li>Toilet paper</li>
                                                                    <li>Dining area</li>
                                                                    <li>Dining table</li>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <li>Toilet</li>
                                                                    <li>Private bathroom</li>
                                                                    <li>Bathtub or shower</li>
                                                                    <li>Toilet paper</li>
                                                                    <li>Dining area</li>
                                                                    <li>Dining table</li>
                                                                    <li>Mosquito net</li>
                                                                    <li>Wardrobe/ Closet</li>
                                                                    <li>Drying rack for clothing</li>
                                                                    <li>Hairdryer</li>
                                                                    <li>Bathrobe</li>
                                                                    <li>Free toiletries</li>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="parking">
                                                            <img src="assets/img/facility/parking-sign(1).png" alt=""/>
                                                            <span>Free Private Parking</span>
                                                        </div>
                                                        <div class="inner-sub">
                                                            <span style="color: red;">In high demand!</span>
                                                            
                                                        </div>
                                                        <div class="inner-booked">
                                                            <span>Recently booked or not</span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tr-facility">
                                            <table class="inner-table">
                                                <tr>
                                                    <td><img src="assets/img/facility/parking-sign(1).png" alt=""/</td>
                                                    <td>Free Parking</td>
                                                    <td><img src="assets/img/facility/bathtub.png" alt=""/</td>
                                                    <td>Free Parking</td>
                                                </tr>
                                                <tr>
                                                    <td><img src="assets/img/facility/breakfast-time.png" alt=""/</td>
                                                    <td>Free Parking</td>
                                                    <td><img src="assets/img/facility/computer-screen.png" alt=""/</td>
                                                    <td>Free Parking</td>
                                                </tr>
                                                <tr>
                                                    <td><img src="assets/img/facility/parking-sign(1).png" alt=""/</td>
                                                    <td>Free Parking</td>
                                                    <td><img src="assets/img/facility/parking-sign(1).png" alt=""/</td>
                                                    <td>Free Parking</td>
                                                </tr>
                                                <tr>
                                                    <td><img src="assets/img/facility/parking-sign(1).png" alt=""/</td>
                                                    <td>Free Parking</td>
                                                    <td><img src="assets/img/facility/parking-sign(1).png" alt=""/</td>
                                                    <td>Free Parking</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                    <td>hrtshr</td>
                                    <td>hrtshr</td>
                                    <td>hrtshr</td>
                                </tr>
                                <tr>
                                    <td>
                                         <button class="room-slide-btn" id="myBtn">Room name</button>
                                        <div id="myModal" class="modal">
                                            <div class="modal-content">
                                                <span class="close">&times;</span>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div id="galleria1" class="galleria-slider">
                                                            <a href="assets/img/rooms/1.jpg">
                                                                <img src="assets/img/rooms/1r.jpg" data-title="" >
                                                            </a>
                                                            <a href="assets/img/rooms/2.jpg">
                                                                <img src="assets/img/rooms/2r.jpg" data-title="" >
                                                            </a>
                                                            <a href="assets/img/rooms/3.jpg">
                                                                <img src="assets/img/rooms/3r.jpg" data-title="" >
                                                            </a>
                                                            <a href="assets/img/rooms/4.jpg">
                                                                <img src="assets/img/rooms/4r.jpg" data-title="" >
                                                            </a>
                                                            <a href="assets/img/rooms/5.jpg">
                                                                <img src="assets/img/rooms/5r.jpg" data-title="" >
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 inner-facility-section">
                                                         <div class="inner-top-title">
                                                             <img src="assets/img/facility/bathtub.png" alt=""/>
                                                            <span>Private Bathroom</span>
                                                        </div>
                                                        <div class="room-area">
                                                            <strong>Room Size</strong><span> 60m<sup>2</sup></span>
                                                        </div>
                                                        <div class="row">
                                                            <strong class="inner-facility-title">Room Facilities:</strong>
                                                            <div class="list-of-facilities">
                                                                <div class="col-md-6">
                                                                    <li>Mosquito net</li>
                                                                    <li>Wardrobe/ Closet</li>
                                                                    <li>Drying rack for clothing</li>
                                                                    <li>Hairdryer</li>
                                                                    <li>Bathrobe</li>
                                                                    <li>Free toiletries</li>
                                                                    <li>Toilet</li>
                                                                    <li>Private bathroom</li>
                                                                    <li>Bathtub or shower</li>
                                                                    <li>Toilet paper</li>
                                                                    <li>Dining area</li>
                                                                    <li>Dining table</li>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <li>Toilet</li>
                                                                    <li>Private bathroom</li>
                                                                    <li>Bathtub or shower</li>
                                                                    <li>Toilet paper</li>
                                                                    <li>Dining area</li>
                                                                    <li>Dining table</li>
                                                                    <li>Mosquito net</li>
                                                                    <li>Wardrobe/ Closet</li>
                                                                    <li>Drying rack for clothing</li>
                                                                    <li>Hairdryer</li>
                                                                    <li>Bathrobe</li>
                                                                    <li>Free toiletries</li>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="parking">
                                                            <img src="assets/img/facility/parking-sign(1).png" alt=""/>
                                                            <span>Free Private Parking</span>
                                                        </div>
                                                        <div class="inner-sub">
                                                            <span style="color: red;">In high demand!</span>
                                                            
                                                        </div>
                                                        <div class="inner-booked">
                                                            <span>Recently booked or not</span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tr-facility">
                                            <table class="inner-table">
                                                <tr>
                                                    <td><img src="assets/img/facility/parking-sign(1).png" alt=""/</td>
                                                    <td>Free Parking</td>
                                                    <td><img src="assets/img/facility/bathtub.png" alt=""/</td>
                                                    <td>Free Parking</td>
                                                </tr>
                                                <tr>
                                                    <td><img src="assets/img/facility/breakfast-time.png" alt=""/</td>
                                                    <td>Free Parking</td>
                                                    <td><img src="assets/img/facility/computer-screen.png" alt=""/</td>
                                                    <td>Free Parking</td>
                                                </tr>
                                                <tr>
                                                    <td><img src="assets/img/facility/parking-sign(1).png" alt=""/</td>
                                                    <td>Free Parking</td>
                                                    <td><img src="assets/img/facility/parking-sign(1).png" alt=""/</td>
                                                    <td>Free Parking</td>
                                                </tr>
                                                <tr>
                                                    <td><img src="assets/img/facility/parking-sign(1).png" alt=""/</td>
                                                    <td>Free Parking</td>
                                                    <td><img src="assets/img/facility/parking-sign(1).png" alt=""/</td>
                                                    <td>Free Parking</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                    <td>hrtshr</td>
                                    <td>hrtshr</td>
                                    <td>hrtshr</td>
                                </tr>


                            </table>
                        </div>

                    </div>
                    <div class="col-md-4 ">
                        <div class="right-side">
                            <div class="view-room-facilities acc-room">
                                <div class="row">
                                    <div class="acc-right-side">
                                        <h4><span>Facilities</span></h4>
                                        <div class="col-md-12 table-responsive">
                                            <table class="table acc-table">
                                                <tbody class="facility-table">
                                                    <tr>
                                                        <td><img src="assets/img/facility/wifi.png"></td>
                                                        <td>Donec pede justo</td>
                                                        <td><img src="assets/img/facility/parking-sign(1).png"></td>
                                                        <td>Donec pede justo</td>

                                                    </tr>
                                                    <tr>
                                                        <td><img src="assets/img/facility/sunbed.png"></td>
                                                        <td>Fringilla vel</td>
                                                        <td><img src="assets/img/facility/no-smoking-sign.png"></td>
                                                        <td>Fringilla vel</td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="assets/img/facility/family.png"></td>
                                                        <td>Aliquet nec</td>
                                                        <td><img src="assets/img/facility/breakfast-time.png"></td>
                                                        <td>Aliquet nec</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="acc-contact-details">
                                            <div class="col-md-12 static-map-sec">
                                                <a href="">
                                                    <div class="col-md-12 static-map">
                                                        <img src="assets/img/facility/staticmap.png" class="img-responsive thumbnail">
                                                        <div class="view-map-btn">
                                                            <input type="button" name="map" value="Show Map">
                                                        </div>
                                                    </div>
                                                    <span class="map-marker">
                                                        <li class="fa fa-map-marker"></li>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="col-md-12 static-add-sec">
                                                <h4>Location Details</h4>
                                                <div class="acc-address col-md-12">
                                                    <div class="col-md-1 address-map-mark">
                                                        <li class="fa fa-map-marker"></li>
                                                    </div>
                                                    <div class="col-md-10 acc-location-details">
                                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                                        Aenean commodo ligula eget,
                                                        Aenean massa.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-bar">
                                <div class="col-md-12 acc-comments">
                                    <h4>Happy Clients</h4>  
                                    <div class="testimonials-acc">
                                        <div class="active item">
                                            <div class="carousel-info">
                                                <img alt="" src="http://keenthemes.com/assets/bootsnipp/img1-small.jpg" class="pull-left">
                                                <div class="pull-left">
                                                    <span class="testimonials-name">Lina Mars</span>
                                                    <div class=" room-star-rates">
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star "></span>
                                                    </div>
                                                    <span class="testimonials-post">Commercial Director</span>
                                                </div>
                                            </div>
                                            <blockquote><p>Denim you probably haven't heard of. Lorem ipsum dolor met consectetur adipisicing sit amet, consectetur adipisicing elit, of them jean shorts sed magna aliqua. Lorem ipsum dolor met.</p></blockquote>

                                        </div>
                                    </div>
                                    <div class="testimonials-acc">
                                        <div class="active item">
                                            <div class="carousel-info">
                                                <img alt="" src="http://keenthemes.com/assets/bootsnipp/img1-small.jpg" class="pull-left">
                                                <div class="pull-left">
                                                    <span class="testimonials-name">Lina Mars</span>
                                                    <div class=" room-star-rates">
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star "></span>
                                                    </div>
                                                    <span class="testimonials-post">Commercial Director</span>
                                                </div>
                                            </div>
                                            <blockquote><p>Denim you probably haven't heard of. Lorem ipsum dolor met consectetur adipisicing sit amet, consectetur adipisicing elit, of them jean shorts sed magna aliqua. Lorem ipsum dolor met.</p></blockquote>

                                        </div>
                                    </div>
                                    <div class="testimonials-acc">
                                        <div class="active item">
                                            <div class="carousel-info">
                                                <img alt="" src="http://keenthemes.com/assets/bootsnipp/img1-small.jpg" class="pull-left">
                                                <div class="pull-left">
                                                    <span class="testimonials-name">Lina Mars</span>
                                                    <div class=" room-star-rates">
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star "></span>
                                                    </div>
                                                    <span class="testimonials-post">Commercial Director</span>
                                                </div>
                                            </div>
                                            <blockquote><p>Denim you probably haven't heard of. Lorem ipsum dolor met consectetur adipisicing sit amet, consectetur adipisicing elit, of them jean shorts sed magna aliqua. Lorem ipsum dolor met.</p></blockquote>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="more-rooms">
                            <div class="row" >
                                <h3 class="subtitle fancy"><span style="padding-bottom: 20px;">Other Accommodation</span></h3>
                                <div class="col-md-3">
                                    <div class="box">
                                        <img src="assets/img/rooms/1.jpg" alt="">
                                        <div class="box-content">
                                            <h3 class="room-title">title</h3>
                                            <span class="post">
                                                fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, 
                                            </span>
                                            <ul class="icon">
                                                <li><a href="#" class="fa fa-eye" title="view more"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="box">
                                        <img src="assets/img/rooms/2.jpg" alt="">
                                        <div class="box-content">
                                            <h3 class="room-title">title</h3>
                                            <span class="post">
                                                fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, 
                                            </span>
                                            <ul class="icon">
                                                <li><a href="#" class="fa fa-eye" title="view more"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="box">
                                        <img src="assets/img/rooms/3.jpg" alt="">
                                        <div class="box-content">
                                            <h3 class="room-title">title</h3>
                                            <span class="post">
                                                fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, 
                                            </span>
                                            <ul class="icon">
                                                <li><a href="#" class="fa fa-eye" title="view more"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="box">
                                        <img src="assets/img/rooms/4.jpg" alt="">
                                        <div class="box-content">
                                            <h3 class="room-title">title</h3>
                                            <span class="post">
                                                fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, 
                                            </span>
                                            <ul class="icon">
                                                <li><a href="#" class="fa fa-eye" title="view more"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
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
            <script type="text/javascript">
                $('#galleria1').galleria({
                    responsive: true,
                    height: 500,
                    autoplay: 7000,
                    lightbox: true,
                    showInfo: true,
                    //                imageCrop: true,
                });
            </script>
            <script>
                // Get the modal
                var modal = document.getElementById('myModal');

                // Get the button that opens the modal
                var btn = document.getElementById("myBtn");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks the button, open the modal 
                btn.onclick = function () {
                    modal.style.display = "block";
                }

                // When the user clicks on <span> (x), close the modal
                span.onclick = function () {
                    modal.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function (event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            </script>

    </body> 

</html>


