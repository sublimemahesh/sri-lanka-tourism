<?php
include './class/include.php';
if (!isset($_SESSION)) {
    session_start();
}
?>
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
    </head>
    <body>
        <!-- Our Resort Values style-->
        <?php
        include './header.php';
        ?>

        <div class="row background-image" style="background-image: url('images/hotel/Beach-Tours3.jpg');">
            <div class="container body-style">
                <div class="text-center">
                    <div class=" col-md-8 col-md-offset-2 hidden-sm hidden-xs">
                        <ul class="nav nav-pills">
                            <li class="btn-nav">
                                <a data-toggle="pill" href="#taxi" class="space-adjust">
                                    <div>
                                        <img src="images/frontal-taxi-cab.png" alt=""/>
                                        <span>Taxi</span>
                                    </div>
                                </a>
                            </li>
                            <li class="btn-nav ">
                                <a data-toggle="pill" href="#tour" class="space-adjust"> 
                                    <div>
                                        <img src="images/earth-paradise.png" alt=""/>
                                        <span>Tour</span>
                                    </div>
                                </a>
                            </li>
                            <li class="btn-nav">
                                <a data-toggle="pill" href="#hotel" class="space-adjust">
                                    <div>
                                        <img src="images/3d-building.png" alt=""/>
                                        <span>Hotel</span>
                                    </div>
                                </a>
                            </li>
                            <li class="btn-nav ">
                                <a data-toggle="pill" href="#offer" class="space-adjust">
                                    <div>
                                        <img src="images/discount(1).png" alt=""/>
                                        <span>Offer</span>
                                    </div>
                                </a>
                            </li>
                            <li class="btn-nav ">
                                <a data-toggle="pill" href="#booking" class="space-adjust">
                                    <div>
                                        <img src="images/learning.png" alt=""/>
                                        <span>Booking</span>
                                    </div>
                                </a>
                            </li>
                            <li class="btn-nav ">
                                <a data-toggle="pill" href="#sea" class="space-adjust">
                                    <div>
                                        <img src="images/icon/search11.png" alt=""/>
                                        <span>Search</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="mobile-section col-sm-12 col-xs-12 visible-xs visible-sm hidden-lg hidden-md">
                        <div class="mobile" style=" z-index: 900; position: relative;">
                            <div class="col-xs-2 mobile-view">
                                <a data-toggle="pill" href="#taxi">
                                    <div>
                                        <img src="images/frontal-taxi-cab.png" alt=""/>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-2 mobile-view">
                                <a data-toggle="pill" href="#tour"> 
                                    <div>
                                        <img src="images/earth-paradise.png" alt=""/>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-2 mobile-view">
                                <a data-toggle="pill" href="#hotel">
                                    <div>
                                        <img src="images/3d-building.png" alt=""/>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-2 mobile-view">
                                <a data-toggle="pill" href="#offer">
                                    <div>
                                        <img src="images/discount(1).png" alt=""/>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-2 mobile-view">
                                <a data-toggle="pill" href="#booking">
                                    <div>
                                        <img src="images/learning.png" alt=""/>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-2 mobile-view">
                                <a data-toggle="pill" href="#sea">
                                    <div>
                                        <img src="images/icon/search11.png" alt=""/>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 center-all">
                    <div class="tab-content">
                        <div id="taxi" class="tab-pane fade in active">
                            <h3>Taxi</h3>
                            <form method="get" action="transports.php" >
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                        <span>Picking Up</span>
                                        <input type="text" name="from" placeholder="city,airport or address" class="input-text">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                        <span>Dropping Off</span>
                                        <input type="text" name="to" placeholder="city,airport or address" class="input-text">
                                    </div>
                                </div>
                                <div class="row taxi-body">
                                    <div class="col-md-4 col-sm-6">
                                        <span>Vehicle Type</span>
                                        <select class="form-control" autocomplete="off" type="text" id="type" autocomplete="off" name="type">
                                            <option value="">All</option>
                                            <?php foreach (VehicleType::all() as $key => $vehicle_t) {
                                                ?>
                                                <option value="<?php echo $vehicle_t['id']; ?>"><?php echo $vehicle_t['name']; ?></option><?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                     <div class="col-md-4 col-sm-6">
                                        <span>Your Budget</span>
                                        <select class="form-control" autocomplete="off" type="text" id="condition" autocomplete="off" name="condition">
                                            <option value=""> --select-- </option>
                                            <?php foreach (VehicleCondition::all() as $key => $vehicle_c) {
                                                ?>
                                                <option value="<?php echo $vehicle_c['id']; ?>"><?php echo $vehicle_c['name']; ?></option><?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <span>Number of Passengers</span>
                                        <input type="text" name="passengers" placeholder="Minimum number of passangers" class="check-out">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 btn-search">
                                        <button class="btn-style">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="tour" class="tab-pane fade">
                            <h3>Tour</h3>
                            <div id="taxi" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                        <span>Flying From</span>
                                        <input type="text" name="piking-up" placeholder="city,airport or address" class="input-text">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                        <span>Flying To</span>
                                        <input type="text" name="dropping-off" placeholder="city,airport or address" class="input-text">
                                    </div>
                                </div>
                                <div class="row taxi-body">
                                    <div class="col-md-3 col-sm-6 col-xs-12 taxi-title">
                                        <span>Departing</span>
                                        <input type="text" name="check-out" placeholder="mm/dd/yy" class="check-out" id="datepicker2">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 taxi-title">
                                        <span>Returning</span>
                                        <input type="text" name="check-out" placeholder="mm/dd/yy" class="check-out" id="datepicker3">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 taxi-title">
                                        <span>Adult (18+)</span>
                                        <select name="adult" class="form-control" id="adult">
                                            <option value="" selected="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">6</option>
                                            <option value="">7</option>
                                            <option value="">8</option>
                                            <option value="">9</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 taxi-title">
                                        <span>Child (0 - 17)</span>
                                        <select name="adult" class="form-control" id="child">
                                            <option value="" selected="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                            <option value="">6</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 btn-search">
                                        <button class="btn-style">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="hotel" class="tab-pane fade">
                            <h3>Hotel</h3>
                            <div id="taxi" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                        <span>Destination</span>
                                        <input type="text" name="destination" placeholder="city,airport or address" class="input-text">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                        <span>Rooms</span>
                                        <select name="room" class="form-control" id="room">
                                            <option value="" selected="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row taxi-body">
                                    <div class="col-md-3 col-sm-6 col-xs-12 taxi-title">
                                        <span>check-in Date</span>
                                        <input type="text" name="check-in" placeholder="mm/dd/yy" class="check-in" id="datepicker4">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 taxi-title">
                                        <span>Check-out Date</span>
                                        <input type="text" name="check-out" placeholder="mm/dd/yy" class="check-out" id="datepicker5">
                                    </div>
                                    <div class="col-md-3  col-sm-6 col-xs-12 taxi-title">
                                        <span>Adult (18+)</span>
                                        <select name="adult" class="form-control" id="adult">
                                            <option value="" selected="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">6</option>
                                            <option value="">7</option>
                                            <option value="">8</option>
                                            <option value="">9</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 taxi-title">
                                        <span>Child (0 - 17)</span>
                                        <select name="adult" class="form-control" id="child">
                                            <option value="" selected="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                            <option value="">6</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 btn-search">
                                        <button class="btn-style">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="offer" class="tab-pane fade">
                            <h3>Offer</h3>
                            <div id="taxi" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                        <span>Picking Up</span>
                                        <input type="text" name="piking-up" placeholder="city,airport or address" class="input-text">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 taxi-title ">
                                        <span>Dropping Off</span>
                                        <input type="text" name="dropping-off" placeholder="city,airport or address" class="input-text">
                                    </div>
                                </div>
                                <div class="row taxi-body">
                                    <div class="col-md-3 col-sm-6 col-xs-12 taxi-title">
                                        <span>Pick-up Date</span>
                                        <input type="text" name="piking-up" placeholder="mm/dd/yy" class="input-text">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 taxi-title">
                                        <span>Time</span>
                                        <select class="form-control" id="sel-time">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 taxi-title offer-drop-off">
                                        <span>Drop-off Date</span>
                                        <input type="text" name="piking-up" placeholder="mm/dd/yy" class="input-text">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 taxi-title offer-time">
                                        <span>Time</span>
                                        <select class="form-control" id="sel-time">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 btn-search" class="input-text">
                                        <button class="btn-style">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="booking" class="tab-pane fade">
                            <h3>Booking</h3>
                            <div id="taxi" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                        <span>Picking Up</span>
                                        <input type="text" name="piking-up" placeholder="city,airport or address" class="input-text">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                        <span>Dropping Off</span>
                                        <input type="text" name="dropping-off" placeholder="city,airport or address" class="input-text">
                                    </div>
                                </div>
                                <div class="row taxi-body">
                                    <div class="col-md-3 col-sm-6 col-xs-12 taxi-title">
                                        <span>Pick-up Date</span>
                                        <input type="text" name="piking-up" placeholder="mm/dd/yy" class="input-text">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 taxi-title">
                                        <span>Time</span>
                                        <select class="form-control" id="sel-time">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 taxi-title book-drop-off">
                                        <span>Drop-off Date</span>
                                        <input type="text" name="piking-up" placeholder="mm/dd/yy" class="input-text">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 taxi-title book-time">
                                        <span>Time</span>
                                        <select class="form-control" id="sel-time">
                                            <option>00.00</option>
                                            <option>00.30</option>
                                            <option>01.00</option>
                                            <option>01.30</option>
                                            <option>02.00</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 btn-search">
                                        <button class="btn-style">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="sea" class="tab-pane fade">
                            <h3>Search</h3>
                            <div id="taxi" class="tab-pane fade in active">
                                <div class="row col-md-12 col-sm-12 search">
                                    <span class="search-que">What are you looking for ?</span>
                                    <div class="input-group custom-search-form">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">
                                                <span class="glyphicon glyphicon-search"></span>  
                                            </button>
                                        </span>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="row facts">
                                        <span class="fact-title">Things you can search for:</span>
                                        <ul class="" style="margin-top: 13px;">
                                            <li>Taxi</li>
                                            <li>Flights</li>
                                            <li>Hotels</li>
                                            <li>Things to do</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Resort Values style-->  
    <footer class="footer-style container-fluid"style="background-color: #003366; height: auto;">
        <div class="container">
            <div class="row footer-includes">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center footer-logo">
                    <img src="images/logo-intro.png" height="70px" alt="">
                </div>
                <div class="text-center" id="footer-link">
                    Copyright © 2017.<a target="_blank"  href="http://sublime.lk/">Sublime Holdings</a>.All rights reserved.
                </div>
                <div class="fbottom text-center">
                    <a href="#">Terms</a><span>|</span>
                    <a href="#">Privacy</a><span>|</span>
                    <a href="#">Contact Us</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script>
        $(function () {
            $("#datepicker").datepicker({
                autoclose: true,
                todayHighlight: true
            }).datepicker('update', new Date());
        });

        $(function () {
            $("#datepicker1").datepicker({
                autoclose: true,
                todayHighlight: true
            }).datepicker('update', new Date());
        });

        $(function () {
            $("#datepicker2").datepicker({
                autoclose: true,
                todayHighlight: true
            }).datepicker('update', new Date());
        });

        $(function () {
            $("#datepicker3").datepicker({
                autoclose: true,
                todayHighlight: true
            }).datepicker('update', new Date());
        });

        $(function () {
            $("#datepicker4").datepicker({
                autoclose: true,
                todayHighlight: true
            }).datepicker('update', new Date());
        });

        $(function () {
            $("#datepicker5").datepicker({
                autoclose: true,
                todayHighlight: true
            }).datepicker('update', new Date());
        });


    </script> 
</body> 

</html>
