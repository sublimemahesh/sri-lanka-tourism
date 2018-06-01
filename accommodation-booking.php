<!DOCTYPE html>
<?php
include './class/include.php';
include './auth.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($_GET['visitor'])) {
    $VISITOR = $_GET['visitor'];
}
$ACCOMMODATION = new Accommodation($id);
$VISITOR = new Visitor($VISITOR);

$ROOM_OBJ = new Room(NULL);
$ROOMS = $ROOM_OBJ->getAccommodationRoomsById($id);

$ACCOMMODATION_PHOTO = new AccommodationPhoto(NULL);

$ROOM_PRICE_OBJ = new RoomPrice(NULL);

$ROOM_BASIS_OBJ = new RoomBasis(NULL);
$ROOM_BASIS = $ROOM_BASIS_OBJ->all();

$ROOM_AVILABILITY = new RoomAvailability(NULL);

$today = date("Y-m-d", time());
date_default_timezone_set('Asia/Colombo');
$now = date('Y-m-d H:i:s');
?>
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
        <link href="css/visitor-custom.css" rel="stylesheet" type="text/css"/>
        <link href="css/custom-styles.css" rel="stylesheet" type="text/css"/>
        <link href="assets/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet"> 
        <style>
            .form-options .one-half {
                width: 50%;
                float: left;
                padding-left: 15px;
                padding-right: 15px;
                margin-bottom: 22px;
            }
        </style>
    </head>
    <body style="background-color: #FFF;">
        <!-- Our Resort Values style-->
        <?php include './header.php' ?>
        <div class="container">
            <div class="row top-bott20">
                <div class="col-md-9">

                    <div class="body">

                        <div class="transport-booking-box margin-panel">
                            <?php
                            $vali = new Validator();
                            $vali->show_message();
                            ?>

                            <form method="post" action="post-and-get/accommodation-booking.php" enctype="multipart/form-data">


                                <h4 class="booking-transports-title text-center">Your Details</h4>
                                <div class="row panel panel-default booking-panel-default">
                                    <div class="col-sm-12 col-md-12">
                                        <!--Full Name-->
                                        <div class="col-md-6">
                                            <div class="bottom-top">First Name</div>
                                            <div class="formrow">
                                                <input type="text" readonly="true" name="first_name" id="first_name" class="form-control input-type-bottom" placeholder="Please Enter Your Full Name"  value="<?php echo $VISITOR->first_name; ?>" required="TRUE">
                                            </div>
                                        </div>
                                        <!--User Name-->
                                        <div class="col-md-6">
                                            <div class="bottom-top">Second Name</div>
                                            <div class="formrow">
                                                <input type="text" readonly="true" name="second_name" id="second_name" class="form-control input-type-bottom" placeholder="Please Second Name" required="TRUE" value="<?php echo $VISITOR->second_name; ?>">
                                            </div>
                                        </div>
                                        <!--Email-->
                                        <div class="col-md-6">
                                            <div class="bottom-top">Email</div>
                                            <div class="formrow">
                                                <input type="email" readonly="true" name="email" id="email" class="form-control input-type-bottom" placeholder="-" required="TRUE" value="<?php echo $VISITOR->email; ?>">
                                                <br>
                                            </div>
                                        </div>
                                        <!--Contact No-->
                                        <div class="col-md-6">
                                            <div class="bottom-top">Contact No</div>
                                            <div class="formrow">
                                                <input type="text" readonly="true" id="contact_number" name="contact_number" class="form-control input-type-bottom" placeholder="-" value="<?php echo $VISITOR->contact_number; ?>">
                                            </div>
                                        </div> 

                                    </div>

                                </div>
                                <h4 class="booking-transports-title text-center">Hotel Booking Details</h4>
                                <div class="row panel panel-default booking-panel-default">
                                    <div class="col-md-6">
                                        <div class="bottom-top">Arrival Date</div>
                                        <div class="formrow">
                                            <input type="text" name="checkin" id="checkin" class="form-control input-type-bottom" required="TRUE" value="<?php echo date("Y-m-d"); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="bottom-top">Departure Date</div>
                                        <div class="formrow">
                                            <?php
                                            $depdate = new DateTime();
                                            $depdate->add(new DateInterval('P1D'));
                                            $dep = $depdate->format('Y-m-d') . "";
                                            ?>
                                            <input type="text" name="checkout" id="checkout" value="<?php echo $dep; ?>" class="form-control input-type-bottom" required="TRUE">
                                        </div>
                                    </div>
                                    <input type="hidden" name="accommodation" id="accommodation" value="<?php echo $ACCOMMODATION->id; ?>">
                                    <?php
                                    foreach ($ROOMS as $ROOM) {
                                        ?>
                                        <input type="hidden" class="each-main-type" id="mainT-<?php echo $ROOM['id']; ?>" typeid="<?php echo $ROOM['id']; ?>"/>
                                        <div class="col-md-12">
                                            <h4 class="main-room-name"><?php echo $ROOM["name"]; ?></h4>
                                            <div id="main-room-tab-<?php echo $ROOM["id"]; ?>">
                                                <?php
                                                $date = date("Y-m-d");
                                                foreach ($ROOM_BASIS as $roombasis) {
                                                    $initial = 0;
                                                    $date = date("Y-m-d");
                                                    $bookedData = $ROOM_AVILABILITY->getByDateAndRoom($date, $ROOM['id']);
                                                    $booked = (int) $bookedData['booked_rooms'];
                                                    $totalbooked = $initial + $booked;
                                                    $totalRooms = (int) $ROOM['number_of_room'];
                                                    $available = $totalRooms - $totalbooked;
                                                    $price = $ROOM_PRICE_OBJ->getPrice($ROOM['id'], $roombasis['id'], $date);
                                                    ?>
                                                    <input type="hidden" class="each-main-type" id="mainT-<?php echo $ROOM['id']; ?>" typeid="<?php echo $ROOM['id']; ?>"/>
                                                    <div class="col-sm-3 col-xs-3 form-group">
                                                        <label><?php echo $roombasis['name']; ?></label>
                                                        <input type="hidden" id="<?php echo $roombasis['id']; ?>-available">
                                                        <small class="hidden"> - <span id="<?php echo $ROOM["id"]; ?>-available" class="mainid-<?php echo $ROOM['id']; ?>"><?php echo $available; ?></span> Rooms Available</small>
                                                        <select id="<?php echo $ROOM['id'] . '-' . $roombasis['id']; ?>" typename="<?php echo $ROOM['name']; ?>" basisname="<?php echo $roombasis['name']; ?>" rtype="<?php echo $ROOM['id']; ?>" rbasis="<?php echo $roombasis['id']; ?>" name="roomB[<?php echo $ROOM['id']; ?>][<?php echo $roombasis['id']; ?>]"  class="form-control prices-list maintype-of-<?php echo $ROOM['id'] ?> type-of-<?php echo $roombasis['id'] ?>">
                                                            <option selected="" value="0" each-price="0">- Please Select -</option>
                                                            <?php
                                                            for ($i = 1; $i <= $available; $i++) {
                                                                if ($i == 1) {
                                                                    $rm = 'Room';
                                                                } else {
                                                                    $rm = 'Rooms';
                                                                }
                                                                $eachPrice = $price['price'] * $i;
                                                                $eachPrice = number_format($eachPrice, 2, '.', '');
                                                                echo '<option value="' . $i . '" each-price="' . $eachPrice . '">' . $i . ' ' . $rm . ' - US$ ' . $eachPrice . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>



                                        <?php
                                    }
                                    ?>

                                </div>

                                <div class = "row panel panel-default booking-panel-default">
                                    <div class = "col-sm-12 col-md-12">

                                        <div class = "col-md-6">
                                            <div class = "bottom-top">Number of Adults</div>
                                            <div class = "formrow">
                                                <input type="number" min="0" name="no_of_passengers" id="no_of_passengers" class="form-control input-type-bottom" placeholder="Maximum Number of people" required = "TRUE">
                                            </div>
                                        </div>
                                        <div class = "col-md-6">
                                            <div class = "bottom-top">Number of Children</div>
                                            <div class = "formrow">
                                                <input type="number" min="0" name="no_of_baggage" class="form-control input-type-bottom" placeholder="Maximum Number of children" required ="TRUE">
                                            </div>
                                        </div>

                                        <div class = "col-md-12">
                                            <div class = "bottom-top">Message</div>
                                            <div class = "formrow">
                                                <textarea class = "form-control input-type-bottom" name = "message" rows = "5"> </textarea>
                                                <br>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class = "row">
                                    <div class = "top-bott50">
                                        <div class = "bottom-top">
                                            <input type="hidden" id="visitor" value="<?php echo $VISITOR->id; ?>" name="visitor"/>
                                            <input type="hidden" id="accommodation" value="<?php echo $ACCOMMODATION->id; ?>" name="transport_rate"/> 
                                            <input type="hidden" id="total" value="0.00" name="total"/>
                                            <input type="hidden" id="date_time_booked" value="<?php echo $now; ?>" name="date_time_booked"/>
                                           
                                            <input type="submit" id="book" name="book" value="Book Now" class="btn btn-info center-block">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
                <div class = "col-md-3">
                    <div class = "row top-bott20">
                        <div class = "panel panel-info margin-panel">
                            <div class = "panel-heading">Your choice</div>
                            <div class = "panel-body">
                                <h4 class = "booking-transports-title text-center"><?php echo $ACCOMMODATION->name;
                                    ?></h4>
<!--                                <p class="text-center"><?php echo $CONDITION->name; ?></p>-->
                                <div class="transport-booking-img">
                                    <?php
                                    foreach ($ACCOMMODATION_PHOTO->getAccommodationPhotosById($ACCOMMODATION->id) as $key => $ACCOMMODATION_P) {
                                        if ($key == 1) {
                                            break;
                                        }
                                        ?>
                                        <img src="upload/accommodation/thumb/<?php echo $ACCOMMODATION_P['image_name']; ?>" class="img img-responsive img-thumbnail" id="profil_pic"/>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <ul class="list-group visitor-list-color">
                                    <li class="list-group-item"><b>Website</b> : <?php echo $ACCOMMODATION->website; ?></li>
                                    <li class="list-group-item"><b>Contact Number</b> : <?php echo $ACCOMMODATION->phone; ?></li>
                                </ul>
                                <h4 class="booking-transports-title text-center">Your Price Summary</h4>
                                <ul class="list-group visitor-list-color">
                                    <li class="list-group-item">Number of Rooms <b><span id="selected-rooms">0</span></b> </li>
                                    <li class="list-group-item"><b>Total Amount: </b>LKR <span><span id="total-price">0</span>.00</span>  </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Our Resort Values style-->  
        <?php include './footer.php' ?>

        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="assets/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/booking.js" type="text/javascript"></script>
        <script src="js/accommodation-booking.js" type="text/javascript"></script>
        <script type="text/javascript">
            $("#checkin").click(function () {
                $('#checkin').focus();
            });

            $("#checkout").click(function () {
                $('#checkout').focus();
            });

            $(function () {

                /* global setting */
                var datepickersOpt = {
                    dateFormat: 'yy-mm-dd',
                    minDate: 0
                };

                $("#checkin").datepicker($.extend({
                    onSelect: function () {
                        var minDate = $(this).datepicker('getDate');
                        minDate.setDate(minDate.getDate() + 1); //add two days
                        $("#checkout").datepicker("option", "minDate", minDate);
                        setRooms();
                    },
                    dateFormat: 'yy-mm-dd'
                }, datepickersOpt));

                $("#checkout").datepicker($.extend({
                    onSelect: function () {
                        setRooms();
                    },
                    dateFormat: 'yy-mm-dd'
                }, datepickersOpt));
            });

        </script>






        <script>

            $(function () {
                $('input[type="time"][value="now"]').each(function () {
                    var d = new Date(),
                            h = d.getHours(),
                            m = d.getMinutes();
                    if (h < 10)
                        h = '0' + h;
                    if (m < 10)
                        m = '0' + m;
                    $(this).attr({
                        'value': h + ':' + m
                    });
                });
            });


        </script>
    </body> 
</html>