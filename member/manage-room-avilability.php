<!DOCTYPE html>
<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$year = $_GET['year'];
$month = $_GET['month'];
$strmonth = date("F", mktime(0, 0, 0, $month, 10));

$ROOM = new Room($id);

if (isset($_SESSION['isPhoneVerified'])) {
    $isPhoneVerified = $_SESSION['isPhoneVerified'];
}
$ACCOMMODATION = new Accommodation($ROOM->accommodation);
if ($_SESSION['id'] <> $ACCOMODATION->member) {
    if (Member::logOut()) {
        header('Location: login.php');
    } else {
        header('Location: ?error=2');
    }
}
?> 

<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Accommodation Room Images || My Account || www.srilankatourism.travel</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/calendar.css" rel="stylesheet" type="text/css"/>

        <style>
            .img-thumbnail {
                max-width: 50% !important;
            }
        </style>
    </head> 
    <body> 
        <div class="loading" id="loading">Loading&#8230;</div>
        <section id="container" > 
            <?php
            include './header-nav.php';
            ?>
            <!--main content start-->
            <section id="main-content">
                <div class="col-md-12 verified-alert"></div> 
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="row  top-bott20"> 
                            <?php
                            $vali = new Validator();
                            $vali->show_message();
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-save"></i> Manage Room Avilability - <?php echo $ROOM->name; ?></div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="row mt">
                                            <h2><?php echo $strmonth . " " . $year; ?></h2>
                                            <div class="row">
                                                <div class="calandar">
                                                    <div class="col-md-1">
                                                        <?php
                                                        $pev_month = date('m', strtotime($year . '-' . $month . '-01 -1 month'));

                                                        if ($pev_month == 01) {
                                                            $prev_year = $year - 1;
                                                        } else {
                                                            $prev_year = $year;
                                                        }
                                                        $para = "id=" . $ROOM->id . "&year=" . $prev_year . "&month=" . $pev_month;
                                                        ?>
                                                        <a class="arrows" id="left-arrow" href="manage-room-avilability.php?<?php echo $para; ?>"><i class="fa fa-angle-left" ></i></a>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <?php
                                                        $AVAILABILITY = new RoomAvailability(NULL);
                                                        $result = $AVAILABILITY->drawAvailabiltyCalendar($month, $year, $ROOM->id);
                                                        echo $result;
                                                        ?>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <?php
                                                        $next_month = date('m', strtotime($year . '-' . $month . '-01 +1 month'));

                                                        if ($next_month == 12) {
                                                            $next_year = $year + 1;
                                                        } else {
                                                            $next_year = $year;
                                                        }
                                                        $para = "id=" . $ROOM->id . "&year=" . $next_year . "&month=" . $next_month;
                                                        ?>
                                                        <a class="arrows" id="right-arrow" href="manage-room-avilability.php?<?php echo $para; ?>">
                                                            <i class="fa fa-angle-right"></i>
                                                        </a>
                                                        <input type="hidden" id="isVerifiedContactNumber" value="<?php echo $isPhoneVerified; ?>" contactnumber="<?php echo $MEMBER->contact_number; ?>">
                                                    </div>
                                                </div>
                                            </div><!-- /col-md-12 -->
                                        </div><!-- /row -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
            include './footer.php';
            ?>
        </section>
        <script src="assets/js/jquery.js"></script>
        <script src="assets/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/common-scripts.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <script src="assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <script src="js/room-availability.js" type="text/javascript"></script>
        <script src="js/display-contact-number-verification-alert.js" type="text/javascript"></script>
    </body>
</html>