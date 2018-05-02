<!DOCTYPE html>
<?php
include './class/include.php';
include './auth.php';
if (isset($_GET['visitor'])) {
    $VISITOR = $_GET['visitor'];
}
if (isset($_GET['rate'])) {
    $RATE = $_GET['rate'];
}

$TRANSPORT_RATE = new TransportRates($RATE);
$VISITOR = new Visitor($VISITOR);
$TRANSPORT = new Transports($TRANSPORT_RATE->transport_id);
$TRANSPORTS_PHOTO = new TransportPhoto(NULL);
$CONDITION = new VehicleCondition($TRANSPORT->condition);
$TYPE = new VehicleType($TRANSPORT->vehicle_type);
$FUEL_TYPE = new FuelType($TRANSPORT->fuel_type);

$CITY_FROM = new City($TRANSPORT_RATE->location_from);
$CITY_TO = new City($TRANSPORT_RATE->location_to);


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

                            <form method="post" action="post-and-get/transport-booking.php" enctype="multipart/form-data">

                                <div class="row panel panel-default booking-panel-default">
                                    <div class="col-md-6">
                                        <div class="bottom-top">Picking Up</div>
                                        <div class="formrow">
                                            <input type="text" readonly="true" name="first_name" class="form-control input-type-bottom" placeholder="Picking Up City"  value="<?php echo $CITY_FROM->name; ?>" required="TRUE">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="bottom-top">Dropping Off</div>
                                        <div class="formrow">
                                            <input type="text" readonly="true" name="first_name" class="form-control input-type-bottom" placeholder="Dropping Off City"  value="<?php echo $CITY_TO->name; ?>" required="TRUE">
                                        </div>
                                    </div>
                                </div>
                                <h4 class="booking-transports-title text-center">Your Details</h4>
                                <div class="row panel panel-default booking-panel-default">
                                    <div class="col-sm-12 col-md-12">
                                        <!--Full Name-->
                                        <div class="col-md-6">
                                            <div class="bottom-top">First Name</div>
                                            <div class="formrow">
                                                <input type="text" readonly="true" name="first_name" class="form-control input-type-bottom" placeholder="Please Enter Your Full Name"  value="<?php echo $VISITOR->first_name; ?>" required="TRUE">
                                            </div>
                                        </div>
                                        <!--User Name-->
                                        <div class="col-md-6">
                                            <div class="bottom-top">Second Name</div>
                                            <div class="formrow">
                                                <input type="text" readonly="true" name="second_name" class="form-control input-type-bottom" placeholder="Please Second Name" required="TRUE" value="<?php echo $VISITOR->second_name; ?>">
                                            </div>
                                        </div>
                                        <!--Email-->
                                        <div class="col-md-6">
                                            <div class="bottom-top">Email</div>
                                            <div class="formrow">
                                                <input type="email" readonly="true" name="email" class="form-control input-type-bottom" placeholder="-" required="TRUE" value="<?php echo $VISITOR->email; ?>">
                                                <br>
                                            </div>
                                        </div>
                                        <!--Contact No-->
                                        <div class="col-md-6">
                                            <div class="bottom-top">Contact No</div>
                                            <div class="formrow">
                                                <input type="text" readonly="true" name="contact_number" class="form-control input-type-bottom" placeholder="-" value="<?php echo $VISITOR->contact_number; ?>">
                                            </div>
                                        </div> 

                                    </div>

                                </div>

                                <h4 class="booking-transports-title text-center">Vehicle Booking Details</h4>
                                <div class="row panel panel-default booking-panel-default">
                                    <div class="col-sm-12 col-md-12">

                                        <div class="col-md-6">
                                            <div class="bottom-top">Number of Passengers</div>
                                            <div class="formrow">
                                                <input type="number" min="0" name="no_of_passengers" class="form-control input-type-bottom" placeholder="Maximum Number of Passengers" required="TRUE">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="bottom-top">Number of Baggage</div>
                                            <div class="formrow">
                                                <input type="number" min="0" name="no_of_baggage" class="form-control input-type-bottom" placeholder="Maximum Number of baggage" required="TRUE" value="<?php echo $VISITOR->second_name; ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="bottom-top">Booking Date</div>
                                            <div class="formrow">
                                                <input type="text"  name="date" class="form-control datepicker" value="<?php echo $today; ?>" required="TRUE">
                                                <br>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="bottom-top">Booking Time</div>
                                            <div class="formrow">
                                                <input type="time" name="time" style="line-height: 20px;" class="form-control" value="now">
                                                <br>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="bottom-top">Message</div>
                                            <div class="formrow">
                                                <textarea class="form-control input-type-bottom" name="message" rows="5"> </textarea>
                                                <br>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="top-bott50">
                                        <div class="bottom-top">
                                            <input type="hidden" id="visitor" value="<?php echo $VISITOR->id; ?>" name="visitor"/>
                                            <input type="hidden" id="transport_rate" value="<?php echo $TRANSPORT_RATE->id; ?>" name="transport_rate"/>
                                            <input type="hidden" id="date_time_booked" value="<?php echo $now; ?>" name="date_time_booked"/>
                                            <input type="submit" name="book" value="Book Now" class="btn btn-info center-block">
                                        </div>
                                    </div> 
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
                <div class="col-md-3">
                    <div class="row top-bott20">
                        <div class="panel panel-info margin-panel">
                            <div class="panel-heading">SELECTED VEHICLE</div>
                            <div class="panel-body">
                                <h4 class="booking-transports-title text-center"><?php echo $TRANSPORT->title; ?></h4>
                                <p class="text-center"><?php echo $CONDITION->name; ?></p>
                                <div class="transport-booking-img">
                                    <?php
                                    foreach ($TRANSPORTS_PHOTO->getTransportPhotosById($TRANSPORT->id) as $key => $TRANSPORTS_P) {
                                        if ($key == 1) {
                                            break;
                                        }
                                        ?>
                                        <img src="upload/transport/thumb/<?php echo $TRANSPORTS_P['image_name']; ?>" class="img img-responsive img-thumbnail" id="profil_pic"/>
                                        <?php
                                    }
                                    ?>
                                </div>

                                <ul class="list-group visitor-list-color">
                                    <li class="list-group-item"><b>Vehicle Type</b> : <?php echo $TYPE->name; ?></li> 
                                    <li class="list-group-item"><b>Registered Year</b> : <?php echo $TRANSPORT->registered_year; ?></li> 
                                    <li class="list-group-item"><b>Registered Number</b> : <?php echo $TRANSPORT->registered_number; ?></li> 
                                    <li class="list-group-item"><b>Fuel Type</b> : <?php echo $FUEL_TYPE->name; ?></li>
                                    <li class="list-group-item"><b>No of Passengers</b> : <?php echo $TRANSPORT->no_of_passangers; ?></li>
                                    <li class="list-group-item"><b>No of Baggage</b> : <?php echo $TRANSPORT->no_of_baggages; ?></li>
                                    <li class="list-group-item"><b>No of Doors</b> : <?php echo $TRANSPORT->no_of_doors; ?> </li>
                                    <li class="list-group-item"> <b>Air Conditioned</b> : <?php
                                        if ($TRANSPORT->ac == 1) {
                                            echo 'Yes';
                                        } else {
                                            echo 'No';
                                        }
                                        ?></li>
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

        <script>
            $(function () {
                var dateToday = new Date();
                /* global setting */
                var datepickersOpt = {
                    dateFormat: 'yy-mm-dd',
                    minDate: dateToday
                };

                $(".datepicker").datepicker($.extend(datepickersOpt));

            });

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



