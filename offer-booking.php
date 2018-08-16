<!DOCTYPE html>
<?php
include './class/include.php';

if (isset($_GET['offer'])) {
    $id = $_GET['offer'];
}
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION["vislogin"])) {
    $_SESSION["back_url"] = 'http://www.srilankatourism.travel/offer-booking.php?offer=' . $id;
    redirect('visitor-login.php?message=24');
} else {
    $VISITOR = $_SESSION["id"];
}

$OFFER = new Offer($id);
$VISITOR = new Visitor($VISITOR);

$discount = $OFFER->discount;
$price = $OFFER->price;

$new_price = $price - (($discount / 100) * $price);

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
                            <div class="col-md-12">
                                <?php
                                if (isset($_GET['message'])) {
                                    $message = new Message($_GET['message']);
                                    ?>
                                    <div class="alert alert-success"><?php echo $message->description; ?></div>

                                    <?php
                                }
                                ?> 
                            </div>
                            <form method="post" action="post-and-get/offer-booking.php" enctype="multipart/form-data">


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
                                <h4 class="booking-transports-title text-center">Message</h4>


                                <div class = "row panel panel-default booking-panel-default">
                                    <div class = "col-sm-12 col-md-12">
                                        <div class = "col-md-12">
                                            <div class = "bottom-top">Message</div>
                                            <div class = "formrow">
                                                <textarea class = "form-control input-type-bottom" name="message" rows="5"> </textarea>
                                                <br>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class = "row">
                                    <div class = "top-bott50">
                                        <div class = "bottom-top">
                                            <input type="hidden" id="visitor" value="<?php echo $VISITOR->id; ?>" name="visitor"/>
                                            <input type="hidden" id="offer" value="<?php echo $OFFER->id; ?>" name="offer"/> 
                                            <input type="hidden" id="date_time_booked" value="<?php echo $now; ?>" name="date_time_booked"/>

                                            <input type="submit" id="book" name="book" value="Book Now" class="btn btn-info center-block">
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
                            <div class="panel-heading">SELECTED OFFER</div>
                            <div class="panel-body">
                                <h4 class="booking-transports-title text-center"><?php echo $OFFER->title; ?></h4>

                                <div class="transport-booking-img">

                                    <img src="upload/offer/<?php echo $OFFER->image_name ?>" class="img img-responsive img-thumbnail" id="profil_pic"/>

                                </div>

                                <ul class="list-group visitor-list-color">
                                    <li class="list-group-item"><b>Type</b> : <?php
                                        if ($OFFER->type == 1) {
                                            echo 'Taxi';
                                        }if ($OFFER->type == 2) {
                                            echo 'Tours';
                                        }if ($OFFER->type == 3) {
                                            echo 'Hotel';
                                        }
                                        ?></li> 
                                    <li class="list-group-item"><b>Old Price</b> : LKR <?php echo $OFFER->price; ?>.00</li> 
                                    <li class="list-group-item"><b>Discount</b> : <?php echo $OFFER->discount ?> %</li> 
                                    <li class="list-group-item"><b>New Price</b> :LKR <?php echo $new_price; ?>.00</li> 
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