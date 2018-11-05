<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . './auth.php');
$TRANSPORT_BOOKINGS = new TransportBooking(NULL);
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['isPhoneVerified'])) {
    $isPhoneVerified = $_SESSION['isPhoneVerified'];
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>www.srilankatourism.travel</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">

        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
        <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
        <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css"> 
        <script src="assets/js/chart-master/Chart.js"></script>

        <!-- Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Ruda:400,700,900" type="text/css">

        <!-- Custom styles for this template --> 
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">

    </head>

    <body>
        <section id="container" >

            <?php
            include './header-nav.php';
            ?>
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">

                    <div class="row">
                        <div class="col-lg-9 main-chart">
                            <div class="dashboard-container">
                                <div class="col-md-12 verified-alert"></div>
                                <div class="row margin-top-dashboard">
                                    <div class="col-md-4 mb">
                                        <div class="info-box bg-cyan hover-expand-effect">
                                            <div class="icon">
                                                <i class="fa fa-car"></i>
                                            </div>
                                            <div class="content">
                                                <div class="text">Bookings</div>
                                                <div class="number count-to" data-from="0" data-to="0" data-speed="1000" data-fresh-interval="20">0</div>
                                            </div>
                                        </div>
                                    </div><!-- /col-md-4 -->

                                    <div class="col-md-4 mb">
                                        <div class="info-box bg-cyan hover-expand-effect">
                                            <div class="icon">
                                                <i class="fa fa-bed"></i>
                                            </div>
                                            <div class="content">
                                                <div class="text">Bookings</div>
                                                <div class="number count-to" data-from="0" data-to="0" data-speed="1000" data-fresh-interval="20">0</div>
                                            </div>
                                        </div>
                                    </div><!-- /col-md-4 -->

                                    <div class="col-md-4 mb">
                                        <div class="info-box bg-cyan hover-expand-effect">
                                            <div class="icon">
                                                <i class="fa fa-suitcase"></i>
                                            </div>
                                            <div class="content">
                                                <div class="text">Bookings</div>
                                                <div class="number count-to" data-from="0" data-to="0" data-speed="1000" data-fresh-interval="20">0</div>
                                            </div>
                                        </div>
                                    </div><!-- /col-md-4 -->

                                </div><!-- /row -->


                                <div class="row mt">
                                    <!-- SERVER STATUS PANELS -->
                                    <div class="col-md-4 col-sm-4 mb">
                                        <a href="manage-transport.php">
                                            <div class="white-panel pnp">
                                                <div class="pnp-header">
                                                    <h5>TRANSPORTS</h5>
                                                </div>
                                                <div class="centered">
                                                    <img src="images/005-taxi.png" width="120">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4 col-sm-4 mb">
                                        <a href="manage-accommodation.php">
                                            <div class="white-panel pnp">
                                                <div class="pnp-header">
                                                    <h5>ACCOMMODATION</h5>
                                                </div>
                                                <div class="centered">
                                                    <img src="images/007-bed.png" width="120">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4 mb">
                                        <!-- WHITE PANEL - TOP USER -->
                                        <a href="manage-tour-package.php">
                                            <div class="white-panel pnp">
                                                <div class="pnp-header">
                                                    <h5>TOUR PACKAGES</h5>
                                                </div>
                                                <div class="centered">
                                                    <img src="images/006-map.png" width="120">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>               

                        <div class="col-lg-3 ds">
                            <!--COMPLETED ACTIONS DONUTS CHART-->
                            <h3>NOTIFICATIONS</h3>

                            <!-- First Action -->
                            <div class="desc">
                                <div class="thumb">
                                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                                </div>
                                <div class="details">
                                    <p><muted>2 Minutes Ago</muted><br/>
                                    <a href="#">James Brown</a> subscribed to your newsletter.<br/>
                                    </p>
                                </div>
                            </div>
                            <!-- Second Action -->
                            <div class="desc">
                                <div class="thumb">
                                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                                </div>
                                <div class="details">
                                    <p><muted>3 Hours Ago</muted><br/>
                                    <a href="#">Diana Kennedy</a> purchased a year subscription.<br/>
                                    </p>
                                </div>
                            </div>
                            <!-- Third Action -->
                            <div class="desc">
                                <div class="thumb">
                                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                                </div>
                                <div class="details">
                                    <p><muted>7 Hours Ago</muted><br/>
                                    <a href="#">Brandon Page</a> purchased a year subscription.<br/>
                                    </p>
                                </div>
                            </div>
                            <!-- Fourth Action -->
                            <div class="desc">
                                <div class="thumb">
                                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                                </div>
                                <div class="details">
                                    <p><muted>11 Hours Ago</muted><br/>
                                    <a href="#">Mark Twain</a> commented your post.<br/>
                                    </p>
                                </div>
                            </div>
                            <!-- Fifth Action -->
                            <div class="desc">
                                <div class="thumb">
                                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                                </div>
                                <div class="details">
                                    <p><muted>18 Hours Ago</muted><br/>
                                    <a href="#">Daniel Pratt</a> purchased a wallet in your store.<br/>
                                    </p>
                                </div>
                            </div>
                            <input type="hidden" id="isVerifiedContactNumber" value="<?php echo $isPhoneVerified; ?>" >
                        </div>
                    </div>
                </section>
            </section>
            <!--main content end-->
            <?php
            include './footer.php';
            ?>
        </section>

        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/jquery-1.8.3.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="assets/js/jquery.sparkline.js"></script>


        <!--common script for all pages-->
        <script src="assets/js/common-scripts.js"></script>

        <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
        <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

        <!--script for this page-->
        <script src="assets/js/sparkline-chart.js"></script>    
        <script src="assets/js/zabuto_calendar.js"></script>	
        <script src="js/display-contact-number-verification-alert.js" type="text/javascript"></script>
        <script type="application/javascript">
            $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
            $(this).hide();
            });

            $("#my-calendar").zabuto_calendar({
            action: function () {
            return myDateFunction(this.id, false);
            },
            action_nav: function () {
            return myNavFunction(this.id);
            },
            ajax: {
            url: "show_data.php?action=1",
            modal: true
            },
            legend: [
            {type: "text", label: "Special event", badge: "00"},
            {type: "block", label: "Regular event", }
            ]
            });
            });


            function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
            }
        </script>

    </body>
</html>
