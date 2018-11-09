<?php

include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
if (!isset($_SESSION)) {
    session_start();
}
$TRANSPORT_BOOKINGS = new TransportBooking(NULL);
if (isset($_SESSION['isPhoneVerified'])) {
    $isPhoneVerified = $_SESSION['isPhoneVerified'];
}
$memberid = $_SESSION['id'];
$MEMBER = new Member($memberid);
$DISTINCTVISITORS = MemberAndVisitorMessages::getDistinctVisitorsByMemberId($memberid);

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
                            <?php
                            $maxids = array();
                            foreach ($DISTINCTVISITORS as $distinctvisitor) {
                                $max = MemberAndVisitorMessages::getMaxIDOfDistinctVisitor($distinctvisitor['visitor']);
                                array_push($maxids, $max['max']);
//                                        return $maxids;
                            }
                            rsort($maxids);
                            foreach ($maxids as $key => $maxid) {
                                if ($key < 7) {
                                    $MESSAGE = new MemberAndVisitorMessages($maxid);
                                    $VISI = new Visitor($MESSAGE->visitor);
                                    $result = getMessagedTime($MESSAGE->date_and_time);
                                    ?>
                                    <div class="desc">
                                        <a href="member-message.php?id=<?php echo $VISI->id; ?>">

                                            <div class="thumb">
                                                <span class="">
                                                    <?php
                                                    if (empty($VISI->image_name)) {
                                                        ?> 
                                                        <img src="../upload/visitor/member.png" class="img-circle img-thumbnail" width="60">
                                                        <?php
                                                    } else {

                                                        if ($VISI->facebookID && substr($VISI->image_name, 0, 5) === "https") {
                                                            ?>
                                                            <img src="<?php echo $VISI->image_name; ?>" class="img-circle img-thumbnail" width="60">
                                                            <?php
                                                        } elseif ($VISI->googleID && substr($VISI->image_name, 0, 5) === "https") {
                                                            ?>
                                                            <img src="<?php echo $VISI->image_name; ?>" class="img-circle img-thumbnail" width="60">
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <img src="../upload/visitor/<?php echo $VISI->image_name; ?>" class="img-circle img-thumbnail" width="60">
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                        </a>
                                        <div class="details">
                                            <p><muted><?php echo $result; ?></muted><br/>
                                            <a href="member-message.php?id=<?php echo $VISI->id; ?>">
                                                <?php echo $VISI->first_name . ' ' . $VISI->second_name; ?>
                                            </a>
                                            <br/>
                                            <?php
                                            if (strlen($MESSAGE->messages) > 30) {
                                                echo substr($MESSAGE->messages,0,28) . '...';
                                            } else {
                                                echo $MESSAGE->messages;
                                            }
                                            ?>
                                            </p>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            <input type="hidden" id="isVerifiedContactNumber" value="<?php echo $isPhoneVerified; ?>" >
                        </div>
                    </div>
                </section>
            </section>
            <!--main content end-->

            <?php

            function getMessagedTime($datetime) {
                date_default_timezone_set('Asia/Colombo');
                $today = new DateTime(date("Y-m-d"));
                $todaytime = new DateTime(date("H:i:s"));

                $arr = explode(' ', $datetime);
                $date1 = new DateTime(date($arr[0]));
                $time1 = new DateTime(date($arr[1]));

                $date = $today->diff($date1);
                $datediff = $date->format('%a');

                if ($datediff == 0) {

                    $time = $todaytime->diff($time1);
                    $timediff = $time->format('%h:%i:%s');
                    $arr1 = explode(':', $timediff);
                    if ($arr1[0] == 0) {
                        $diff = $arr1[1] . ' min ago';
                    } else {
                        if ($arr1[0] == 1) {
                            $diff = $arr1[0] . ' hour ago';
                        } else {
                            $diff = $arr1[0] . ' hours ago';
                        }
                    }
                } elseif ($datediff == 1 && $time1 > $todaytime) {

                    $t = $todaytime->diff($time1);
                    $timediff1 = $t->format('%h:%i:%s');
                    $time3 = new DateTime('24:00:00');
                    $time = $time3->diff($timediff1);
                    $timediff = $time->format('%h:%i:%s');
                    $arr1 = explode(':', $timediff);
                    $diff = $arr1[0] . ' hours ago';
                } elseif ($datediff == 1 && $time1 < $todaytime) {
                    $diff = $datediff . ' day ago';
                } elseif ($datediff > 30) {
                    $month = round($datediff / 30);

                    if ($month >= 12) {

                        $year = round($month / 12);
                        if ($year == 1) {
                            $diff = $year . ' year ago';
                        } else {
                            $diff = $year . ' years ago';
                        }
                    } elseif ($month == 1) {
                        $diff = $month . ' month ago';
                    } else {
                        $diff = $month . ' months ago';
                    }
                }
                return $diff;
            }
            ?>
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
