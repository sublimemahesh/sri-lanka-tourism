<?php
include './class/include.php';
if (!isset($_SESSION)) {
    session_start();
}

$TOURTYPES = TourType::all();
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
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet"> 
        <link href="css/price-range/normalize.css" rel="stylesheet" type="text/css"/>
        <link href="css/price-range/ion.rangeSlider.css" rel="stylesheet" type="text/css"/>
        <link href="css/price-range/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <!-- Our Resort Values style-->
        <?php
        include './header.php';
        ?>

        <div class="row background-image" style="background-image: url('images/hotel/back.jpg');">
            <div class="container body-style">
                <div class="text-center">
                    <div class=" col-md-12 hidden-sm hidden-xs">

                        <ul class="nav nav-pills center-block" style="width:650px;">

                            <li class="btn-nav">
                                <a data-toggle="pill" href="#taxi" class="space-adjust top-link-button">
                                    <div>
                                        <img src="images/frontal-taxi-cab.png" alt=""/>
                                        <span class="select-ico-title">Taxi</span>
                                    </div>
                                </a>
                            </li>
                            <li class="btn-nav ">
                                <a data-toggle="pill" href="#tour" class="space-adjust top-link-button"> 
                                    <div>
                                        <img src="images/earth-paradise.png" alt=""/>
                                        <span class="select-ico-title">Tour</span>
                                    </div>
                                </a>
                            </li>
                            <li class="btn-nav">
                                <a data-toggle="pill" href="#hotel" class="space-adjust top-link-button">
                                    <div>
                                        <img src="images/3d-building.png" alt=""/>
                                        <span class="select-ico-title">Hotel</span>
                                    </div>
                                </a>
                            </li>
                            <li class="btn-nav ">
                                <a data-toggle="pill" href="#offer" class="space-adjust top-link-button">
                                    <div>
                                        <img src="images/discount(1).png" alt=""/>
                                        <span class="select-ico-title">Offer</span>
                                    </div>
                                </a>
                            </li>
                            <li class="btn-nav ">
                                <a data-toggle="pill" href="#booking" class="space-adjust top-link-button">
                                    <div>
                                        <img src="images/learning.png" alt=""/>
                                        <span class="select-ico-title">Booking</span>
                                    </div>
                                </a>
                            </li>
                            <li class="btn-nav ">
                                <a data-toggle="pill" href="#sea" class="space-adjust top-link-button">
                                    <div>
                                        <img src="images/icon/search11.png" alt=""/>
                                        <span class="select-ico-title">Article</span>
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
                                        <img src="images/frontal-taxi-cab.png" alt="" class="mobile-view-ico"/>
                                        <span class="select-ico-title">Taxi</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-2 mobile-view">
                                <a data-toggle="pill" href="#tour"> 
                                    <div>
                                        <img src="images/earth-paradise.png" alt="" class="mobile-view-ico"/>
                                        <span class="select-ico-title">Tour</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-2 mobile-view">
                                <a data-toggle="pill" href="#hotel">
                                    <div>
                                        <img src="images/3d-building.png" alt="" class="mobile-view-ico"/>
                                        <span class="select-ico-title">Hotel</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-2 mobile-view">
                                <a data-toggle="pill" href="#offer">
                                    <div>
                                        <img src="images/discount(1).png" alt="" class="mobile-view-ico"/>
                                        <span class="select-ico-title">Offer</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-2 mobile-view">
                                <a data-toggle="pill" href="#booking">
                                    <div>
                                        <img src="images/learning.png" alt="" class="mobile-view-ico"/>
                                        <span class="select-ico-title">Booking</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-2 mobile-view">
                                <a data-toggle="pill" href="#sea">
                                    <div>
                                        <img src="images/icon/search11.png" alt="" class="mobile-view-ico"/>
                                        <span class="select-ico-title">Article</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 center-all">
                    <div class="tab-content">
                        <div id="taxi" class="tab-pane fade in active">
                            <h3 class="select-op-header text-center">Taxi</h3>
                            <form method="get" name="form" action="transports.php" >
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                        <span class="span-style">Picking Up</span>
                                        <input type="text" autocomplete="off" id="from" placeholder="please select picking up city" class="input-text">
                                        <div id="suggesstion-box">
                                            <ul id="city-list-from" class="city-list"></ul>
                                        </div>
                                        <input type="hidden" name="from" value="" id="from-id" />
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                        <span class="span-style">Dropping Off</span>
                                        <input type="text" id="to" autocomplete="off" placeholder="please select dropping down city" class="input-text">
                                        <div id="suggesstion-box">
                                            <ul id="city-list-to" class="city-list"></ul>
                                        </div>
                                        <input type="hidden" name="to" value="" id="to-id" />
                                    </div>
                                </div>
                                <div class="row taxi-body">
                                    <div class="col-md-4 col-sm-6">
                                        <span class="span-style">Vehicle Type</span>
                                        <select class="form-control margin-bot-18 taxi-combo" autocomplete="off" type="text" id="type" autocomplete="off" name="type">
                                            <option value="">All</option>
                                            <?php foreach (VehicleType::all() as $key => $vehicle_t) {
                                                ?>
                                                <option value="<?php echo $vehicle_t['id']; ?>"><?php echo $vehicle_t['name']; ?></option><?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <span class="span-style">Your Budget</span>
                                        <select class="form-control margin-bot-18 taxi-combo" autocomplete="off" type="text" id="condition" autocomplete="off" name="condition">
                                            <option value=""> --select-- </option>
                                            <?php foreach (VehicleCondition::all() as $key => $vehicle_c) {
                                                ?>
                                                <option value="<?php echo $vehicle_c['id']; ?>"><?php echo $vehicle_c['name']; ?></option><?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <span class="span-style">Number of Passengers</span>
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
                            <h3 class="select-op-header text-center">Tour</h3>
                            <form method="get" name="form" action="view-tour-packages.php" >
                                <div id="taxi" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                            <span class="span-style">Tour</span>
                                            <input type="text" name="keyword" placeholder="Tour Name" class="input-text">
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                            <span class="span-style">Number of Dates</span>
                                            <input type="text" name="noofdates" placeholder="" class="input-text">
                                        </div>
                                    </div>
                                    <div class="row taxi-body">

                                        <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                            <span class="span-style">Tour Type</span>
                                            <select name="type" class="form-control taxi-combo" id="tourtypes">
                                                <option value="" selected="">-- Please select a tour type--</option>
                                                <?php
                                                foreach ($TOURTYPES as $TOURTYPE) {
                                                    ?>
                                                    <option value="<?php echo $TOURTYPE['id']; ?>"><?php echo $TOURTYPE['name']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                            <span class="span-style">Price</span>
                                            <div>
                                                <input type="text" id="range" value="" name="range" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 btn-search">
                                            <button class="btn-style">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </form>
                        </div>
                        <div id="hotel" class="tab-pane fade">
                            <h3 class="select-op-header text-center">Hotel</h3>
                            <div id="taxi" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                        <span class="span-style">Destination</span>
                                        <input type="text" name="destination" placeholder="city,airport or address" class="input-text">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                        <span class="span-style">Rooms</span>
                                        <select name="room" class="form-control taxi-combo" id="room">
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
                                        <span class="span-style">check-in Date</span>
                                        <input type="text" name="check-in" placeholder="mm/dd/yy" class="check-in" id="datepicker4">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 taxi-title">
                                        <span class="span-style">Check-out Date</span>
                                        <input type="text" name="check-out" placeholder="mm/dd/yy" class="check-out" id="datepicker5">
                                    </div>
                                    <div class="col-md-3  col-sm-6 col-xs-12 taxi-title">
                                        <span class="span-style">Adult (18+)</span>
                                        <select name="adult" class="form-control taxi-combo" id="adult">
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
                                        <span class="span-style">Child (0 - 17)</span>
                                        <select name="adult" class="form-control taxi-combo" id="child">
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
                            <h3 class="select-op-header text-center">Offer</h3>
                            <div id="taxi" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                        <span class="span-style">Picking Up</span>
                                        <input type="text" name="piking-up" placeholder="city,airport or address" class="input-text">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 taxi-title ">
                                        <span class="span-style">Dropping Off</span>
                                        <input type="text" name="dropping-off" placeholder="city,airport or address" class="input-text">
                                    </div>
                                </div>
                                <div class="row taxi-body">
                                    <div class="col-md-3 col-sm-6 col-xs-12 taxi-title">
                                        <span class="span-style">Pick-up Date</span>
                                        <input type="text" name="piking-up" placeholder="mm/dd/yy" class="input-text">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 taxi-title">
                                        <span class="span-style">Time</span>
                                        <select class="form-control taxi-combo" id="sel-time">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 taxi-title offer-drop-off">
                                        <span class="span-style">Drop-off Date</span>
                                        <input type="text" name="piking-up" placeholder="mm/dd/yy" class="input-text">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 taxi-title offer-time">
                                        <span class="span-style">Time</span>
                                        <select class="form-control taxi-combo" id="sel-time">
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
                            <h3 class="select-op-header text-center">Booking</h3>
                            <div id="taxi" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                        <span class="span-style">Picking Up</span>
                                        <input type="text" name="piking-up" placeholder="city,airport or address" class="input-text">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 taxi-title">
                                        <span class="span-style">Dropping Off</span>
                                        <input type="text" name="dropping-off" placeholder="city,airport or address" class="input-text">
                                    </div>
                                </div>
                                <div class="row taxi-body">
                                    <div class="col-md-3 col-sm-6 col-xs-12 taxi-title">
                                        <span class="span-style">Pick-up Date</span>
                                        <input type="text" name="piking-up" placeholder="mm/dd/yy" class="input-text">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 taxi-title">
                                        <span class="span-style">Time</span>
                                        <select class="form-control taxi-combo" id="sel-time">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 taxi-title book-drop-off">
                                        <span class="span-style">Drop-off Date</span>
                                        <input type="text" name="piking-up" placeholder="mm/dd/yy" class="input-text">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 taxi-title book-time">
                                        <span class="span-style">Time</span>
                                        <select class="form-control taxi-combo" id="sel-time">
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
                            <h3 class="select-op-header text-center">Search</h3>
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
    <?php include './footer.php'; ?>
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="js/city-from.js" type="text/javascript"></script>
    <script src="js/city-to.js" type="text/javascript"></script>
    <script src="js/price-range/ion.rangeSlider.js" type="text/javascript"></script>
    <script src="js/price-range.js" type="text/javascript"></script>
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
