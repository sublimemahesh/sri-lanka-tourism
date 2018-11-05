<!DOCTYPE html>
<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
//$Aid = $_GET['aid'];
$ROOM = new Room($id);
$ROOM_BASIS = RoomBasis::all();
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
                                <div class="panel-heading"><i class="fa fa-save"></i> Create Room Price - <?php echo $ROOM->name; ?></div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <form class="form-horizontal" action="post-and-get/room-price.php" method="POST" enctype="multipart/form-data">
                                                <div class="formpanel">  
                                                    <div class="panel-group">
                                                        <div class="panel panel-default">

                                                            <div class="panel-body">
                                                                <div class="col-md-6">
                                                                    Date From
                                                                    <input id="start" name="start" class="form-control datepicker" type="text" required="true"/>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    Date To
                                                                    <input id="end" name="end" class="form-control datepicker" type="text" required="true"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel panel-default"><div class="panel-body">
                                                                <div class="form-inline" >
                                                                    <?php
                                                                    foreach ($ROOM_BASIS as $roombasis) {
                                                                        ?> 

                                                                        <div class="col-md-12">
                                                                            <div class="bottom-top">
                                                                                <label for="Name"><?php echo $roombasis['name']; ?></label>
                                                                            </div>
                                                                            <div class="formrow col-md-6">
                                                                                <input min="0" type="number" style="width: 100%" class="form-control"  name="basis[<?php echo $roombasis['id']; ?>]" id="price">
                                                                                <input type="hidden" name="room" value="<?php echo $id; ?>">
                                                                            </div>
                                                                        </div>

                                                                        <?php
                                                                    }
                                                                    ?> 

                                                                </div> 
                                                            </div> 
                                                        </div>
                                                    </div> 
                                                    <!--                                                <div class="text-right">
                                                                                                        <a href="manage-room.php?id=<?php echo $Aid; ?>"><button type="button" class="btn btn-round btn-info">Manage Rooms</button></a>
                                                                                                    </div>-->
                                                    <div class="text-left">
                                                        <button type="submit" name="save" class="btn btn-round btn-info">Save</button>
                                                        <input type="hidden" id="isVerifiedContactNumber" value="<?php echo $isPhoneVerified; ?>" >
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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