<!DOCTYPE html>
<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$start = $_GET['start'];
$end = $_GET['end'];

$ROOM_BASISOBJ = new RoomBasis(NULL);
$ROOMBASIS = $ROOM_BASISOBJ->all();

$ROOMPRICE = new RoomPrice(NULL);
$DETAILS = $ROOMPRICE->getAllFromDateRange($start, $end);

if (isset($_SESSION['isPhoneVerified'])) {
    $isPhoneVerified = $_SESSION['isPhoneVerified'];
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
                                <div class="panel-heading"><i class="fa fa-save"></i> Create Room Price</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="row mt">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="content-panel">
                                                    <?php
                                                    if ($DETAILS) {
                                                        ?>
                                                        <table class="table table-striped table-advance table-hover">
                                                            <h4><i class="fa fa-angle-right"></i>  From <?php echo $start; ?> To <?php echo $end; ?></h4>
                                                            <hr>
                                                            <thead>
                                                                <tr>
                                                                    <th>Basis</th>
                                                                    <th>Price(USD)</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                foreach ($DETAILS as $detail) {
                                                                    $basisA = $ROOM_BASISOBJ->getAllRoomBasisById($detail['basis']);
                                                                    $basisname = $basisA['name'];
                                                                    ?>
                                                                    <tr id="price-row-<?php echo $detail['id']; ?>">
                                                                        <td style="display: none;"><?php echo $detail['id']; ?></td>
                                                                        <td><?php echo $basisname; ?></td>
                                                                        <td><input id="price" column="price" class="update-price form-control" type="text" priceid="<?php echo $detail['id']; ?>" value="<?php echo $detail['price']; ?>"/></td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                        <?php
                                                    } else {
                                                        echo 'No Results in the Database';
                                                    }
                                                    ?>
                                                    <input type="hidden" id="isVerifiedContactNumber" value="<?php echo $isPhoneVerified; ?>" >
                                                </div><!-- /content-panel -->
                                            </div><!-- /col-md-12 -->
                                            <div class="col-md-2"></div>
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
        <script src="js/manage-prices.js" type="text/javascript"></script>
        <script src="js/display-contact-number-verification-alert.js" type="text/javascript"></script>
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

            //custom select box
            $(function () {
                $('select.styled').customSelect();
            });
        </script>
    </body>
</html>