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
                        <a href="member-view.php?id=<?php echo $MEMBER->id; ?>" class="link">
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
                    <a href="transport-booking.php?rate=<?php echo $transport['transport_rate']; ?>&visitor=<?php echo $_SESSION['id']; ?>" class="more-info">Book Now</a> 
                </div>
            </div>
        </div>
    </div>
</div>