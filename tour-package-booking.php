<!DOCTYPE html>
<?php
include './class/include.php';
if (isset($_GET['tour'])) {
    $TOUR = $_GET['tour'];
}
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION["vislogin"])) {
    $_SESSION["back_url"] = 'http://www.srilankatourism.travel/tour-package-booking.php?tour=' . $TOUR;
    redirect('visitor-login.php?message=24');
} else {
    $VISITOR = $_SESSION["id"];
}

$VISITOR = new Visitor($VISITOR);

$TOURPACKAGE = new TourPackage($TOUR);
$TYPE = new TourType($TOURPACKAGE->tourtype);
$MEMBER = new Member($TOURPACKAGE->member);

$result = TourSubSection::CountDaysInTour($TOUR);
$days = $result['days'];
$nights = (int) $days - 1;

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
                <div class="col-sm-9">

                    <div class="body">

                        <div class="transport-booking-box margin-panel">
                            <?php
                            $vali = new Validator();
                            $vali->show_message();
                            ?>

                            <form method="post" action="post-and-get/tour-package-booking.php" enctype="multipart/form-data">

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
                                            </div>
                                        </div>
                                        <!--Contact No-->
                                        <div class="col-md-6">
                                            <div class="bottom-top">Contact No</div>
                                            <div class="formrow">
                                                <input type="text" readonly="true" name="contact_number" class="form-control input-type-bottom" placeholder="-" value="<?php echo $VISITOR->contact_number; ?>">
                                                <br />
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <h4 class="booking-transports-title text-center">Tour Package Booking Details</h4>
                                <div class="row panel panel-default booking-panel-default">
                                    <div class="col-sm-12 col-md-12">

                                        <div class="col-md-6">
                                            <div class="bottom-top">Number of Adults</div>
                                            <div class="formrow">
                                                <input type="number" min="0" name="no_of_adults" class="form-control input-type-bottom" placeholder="Number of Adults" required="TRUE">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="bottom-top">Number of Children</div>
                                            <div class="formrow">
                                                <input type="number" min="0" name="no_of_children" class="form-control input-type-bottom" placeholder="Number of Children" required="TRUE" value="<?php echo $VISITOR->second_name; ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="bottom-top">Start Date</div>
                                            <div class="formrow">
                                                <input type="text"  name="start_date" id="start_date" class="form-control datepicker" value="<?php echo $today; ?>" required="TRUE">
                                                <br>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="bottom-top">End Date</div>
                                            <div class="formrow">
                                                <input type="text" name="end_date" id="end_date" style="line-height: 20px;" class="form-control" value="<?php echo date('Y-m-d', strtotime($today . ' + ' . $nights . 'days')) ?>">
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
                                            <input type="hidden" id="tour_package" value="<?php echo $TOUR; ?>" name="tour_package"/>
                                            <input type="hidden" id="date_time_booked" value="<?php echo $now; ?>" name="date_time_booked"/>
                                            <input type="hidden" id="days" value="<?php echo $nights; ?>" name="days"/>
                                            <input type="hidden" readonly="true" name="price_per_person" class="form-control input-type-bottom" placeholder="Price Per Person"  value="<?php echo $TOURPACKAGE->price; ?>" required="TRUE">
                                            <input type="submit" name="book" value="Book Now" class="btn btn-info center-block">
                                        </div>
                                    </div> 
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

                <div class="col-sm-3">
                    <div class="row top-bott20">
                        <div class="panel panel-info margin-panel panel-responsive">
                            <div class="panel-heading">SELECTED TOUR PACKAGE</div>
                            <div class="panel-body">
                                <h4 class="booking-transports-title text-center"><?php echo $TOURPACKAGE->name; ?></h4>
<!--                                <p class="text-center"><?php echo $CONDITION->name; ?></p>-->
                                <div class="transport-booking-img">
                                    <img src="upload/tour-package/thumb/<?php echo $TOURPACKAGE->picture_name; ?>" class="img img-responsive img-thumbnail" id="profil_pic"/>
                                </div>

                                <ul class="list-group visitor-list-color">
                                    <li class="list-group-item"><b>Tour Type</b> : <?php echo $TYPE->name; ?></li> 
                                    <li class="list-group-item"><b>No of Days</b> : 
                                        <?php
                                        if ($days < 10) {
                                            echo '0' . $days;
                                        } else {
                                            echo $days;
                                        }
                                        ?>
                                    </li> 
                                    <li class="list-group-item"><b>No of Nights</b> : 
                                        <?php
                                        if ($nights < 10) {
                                            echo '0' . $nights;
                                        } else {
                                            echo $nights;
                                        }
                                        ?>
                                    </li> 
                                    <li class="list-group-item"><b>Price Per Person</b> : <?php echo 'LKR:' . $TOURPACKAGE->price . '/='; ?></li>
                                    <li class="list-group-item"><b>Member</b> : <?php echo $MEMBER->name; ?></li>
                                    <li class="list-group-item"><b>Description</b> : <?php echo $TOURPACKAGE->description; ?></li>
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
        <script src="js/custom.js" type="text/javascript"></script>
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



