<?php
include_once(dirname(__FILE__) . '/class/include.php');
$id = $_GET["id"];
$VIEW_ACCOMMODATIONS = new Accommodation($id);
$ACCOMMODATIONS = new Accommodation($id);
$ACCOMMODATION_PHOTO = new AccommodationPhoto(NULL);
$ROOM_VIEW = new RoomFacility($id);
$ROOM_PHOTO = new RoomPhoto(NULL);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sri Lanka || Tourism</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/owl.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/owl.carousel.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link href="css/search.css" rel="stylesheet" type="text/css"/>
        <link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/styles.css" rel="stylesheet" type="text/css"/>
        <link href="css/style-2.css" rel="stylesheet" type="text/css"/>
        <link href="css/bicon.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet"> 
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
                        <div id="accommodation_photos" class="galleria-slider">
                            <?php
                            $VIEW_ACCOMMODATION = AccommodationPhoto::getAccommodationPhotosById($id);
                            foreach ($VIEW_ACCOMMODATION as $key => $accommodation) {
                                ?>
                                <a href="upload/accommodation/<?php echo $accommodation['image_name']; ?>">
                                    <img src="upload/accommodation/thumb/<?php echo $accommodation['image_name']; ?>" data-title="" >
                                </a>
                                <?php
                            }
                            ?>
                        </div> 
                        <div class="view-room-description">
                            <span>
                                <?php echo $VIEW_ACCOMMODATIONS->description; ?>
                            </span>
                        </div>

                        <div class="rooms-details">
                            <table class="table-responsive room-detail-table" style="background: #fff; color: #000;">
                                <tr style="background-color:#007bb5;">
                                    <th>Room Type</th>
                                    <th>No of Rooms</th>
                                    <th>No of Adult</th>
                                    <th>No of Child</th>
                                    <th>No of Extra Bed</th>
                                    <th>Extra Bed Price (US$)</th>
                                </tr>
                                <?php
                                $ROOM = Room::getAccommodationRoomsById($id);
                                foreach ($ROOM as $rooms) {
                                    ?>
                                    <tr class="facility-tr">
                                        <td>
                                            <button class="room-title-btn" id="room-title-<?php echo $rooms['id']; ?>">
                                                <?php echo $rooms['name']; ?>
                                            </button>
                                            <div id="room-slider-<?php echo $rooms['id']; ?>" class="modal">
                                                <div class="modal-content">
                                                    <span class="close">&times;</span>
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <div class="galleria-slider room-photos">
                                                                <?php
                                                                $VIEW_ROOMS = RoomPhoto::getRoomPhotosById($rooms['id']);
                                                                foreach ($VIEW_ROOMS as $key => $room_p) {
                                                                    ?>
                                                                    <a href="upload/accommodation/rooms/<?php echo $room_p['image_name']; ?>">
                                                                        <img src="upload/accommodation/rooms/thumb/<?php echo $room_p['image_name']; ?>" data-title="" >
                                                                    </a>
                                                                    <?php
                                                                }
                                                                ?>
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
                                                                    <?php
                                                                    $results = RoomFaciliityDetails::getFacilitiesByRoomId($rooms['id']);
                                                                    $resultroomfacilities = explode(",", $results['facility']);
                                                                    foreach ($resultroomfacilities as $key => $resultRoomFacility) {
                                                                        $RoomFacility = new RoomFacility($resultRoomFacility);
                                                                        ?>
                                                                        <div class="col-md-6">
                                                                            <li><?php echo $RoomFacility->name; ?></li>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                    ?>

                                                                </div>
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
                                                <?php
                                                $result = RoomFaciliityDetails::getFacilitiesByRoomId($rooms['id']);
                                                $resultroomfacility = explode(",", $result['facility']);
                                                foreach ($resultroomfacility as $key => $resultRoomFacility) {
                                                    $RoomFacilities = new RoomFacility($resultRoomFacility);
                                                    ?>
                                                    <div class="col-md-6">
                                                        <img src="assets/img/facility/parking-sign(1).png" alt=""/>
                                                        <span><?php echo $RoomFacilities->name; ?></span>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                        <td><?php echo $rooms['number_of_room']; ?></td>
                                        <td><?php echo $rooms['number_of_adults']; ?></td>
                                        <td><?php echo $rooms['number_of_children']; ?></td>
                                        <td><?php echo $rooms['number_of_extra_bed']; ?></td>
                                        <td><?php echo $rooms['extra_bed_price']; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
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
                                            <?php
                                            $result = AccommodationFacilityDetails::getFacilitiesByAccommodationId($id);
                                            $resultFacilities = explode(",", $result['facility']);
                                            foreach ($resultFacilities as $key => $resultFacility) {
                                                $Facility = new AccommodationGeneralFacilities($resultFacility);
                                                ?>
                                                <div class="col-md-6">
                                                    <img src="assets/img/facility/wifi.png">
                                                    <span><?php echo $Facility->name; ?></span>
                                                </div>
                                                <?php
                                            }
                                            ?>
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
                                                        <?php echo $VIEW_ACCOMMODATIONS->address; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-bar">
                                <div class="col-md-12 acc-comments">
                                    <h4 class="review">Reviews</h4>  
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
                </div>
                <div class="row">
                    <div class="more-rooms"> 
                        <h3 class="subtitle fancy"><span style="padding-bottom: 20px;">Other Accommodation</span></h3>
                        <div class="owl-carousel owl-theme">
                            <?php
                            $OTHER_ACCOMMODATION = Accommodation::all();
                            foreach ($OTHER_ACCOMMODATION as $key => $other_accommodation) {
                                ?>
                                <div class="item">
                                    <div class="box">
                                        <?php
                                        foreach ($ACCOMMODATION_PHOTO->getAccommodationPhotosById($other_accommodation['id']) as $key => $ACCOMMODATION_P) {
                                            if ($key == 1) {
                                                break;
                                            }
                                            ?>
                                            <img src="upload/accommodation/thumb/<?php echo $ACCOMMODATION_P['image_name']; ?>" alt="">
                                            <?php
                                        }
                                        ?>
                                        <div class="box-content">
                                            <h3 class="room-title"><?php echo $other_accommodation['name']; ?></h3>
                                            <span class="post">
                                                <?php echo substr($other_accommodation['description'], 0, 75) . '...'; ?>
                                            </span>
                                            <ul class="icon">
                                                <li><a href="accommodation-view.php?id=<?php echo $other_accommodation['id']; ?>" class="fa fa-eye" title="view more"></a></li>
                                            </ul>
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
            $('#accommodation_photos').galleria({
                responsive: true,
                width: 700,
                height: 500,
                autoplay: 7000,
                lightbox: true,
                showInfo: true,

                //                imageCrop: true,
            });
        </script>
        <script type="text/javascript">
            $('.room-photos').galleria({
                responsive: true,
                height: 500,
                autoplay: 7000,
                lightbox: true,
                showInfo: true,
                //                imageCrop: true,
            });
        </script>
        <script>

            $('.room-title-btn').click(function () {
                var roomTitleId = this.id;
                var roomId = roomTitleId.replace('room-title-', '');
                $('#room-slider-' + roomId).show();

            });

            $('.close').click(function () {
                $('.modal').hide();
            });

            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                }
            });
        </script> 
    </body> 

</html>


