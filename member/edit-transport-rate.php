<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$TRANSPORT_RATES = new TransportRates($id);
$TRANSPORTS = new Transports($TRANSPORT_RATES->transport_id);
$CITYFROM = new City($TRANSPORT_RATES->location_from);
$CITYTO = new City($TRANSPORT_RATES->location_to);
if (isset($_SESSION['isPhoneVerified'])) {
    $isPhoneVerified = $_SESSION['isPhoneVerified'];
}
if ($_SESSION['id'] <> $TRANSPORTS->member) {
    if (Member::logOut()) {
        header('Location: login.php');
    } else {
        header('Location: ?error=2');
    }
}
?>

<!DOCTYPE html>
<html lang = "en">

    <head>
        <meta charset = "utf-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta name = "description" content = "">
        <meta name = "author" content = "Dashboard">
        <meta name = "keyword" content = "Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>My Account || Edit Transport Rate || www.srilankatourism.travel</title>

        <!--Bootstrap core CSS -->
        <link href = "assets/css/bootstrap.css" rel = "stylesheet">
        <!--external css-->
        <link href = "assets/font-awesome/css/font-awesome.css" rel = "stylesheet" />
        <link rel = "stylesheet" type = "text/css" href = "../../../blacktie.co/demo/dashgum/assets/js/bootstrap-datepicker/css/datepicker.html" />
        <link rel = "stylesheet" type = "text/css" href = "../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/daterangepicker.html" />

        <!--Custom styles for this template -->
        <link href = "assets/css/style.css" rel = "stylesheet">
        <link href = "assets/css/style-responsive.css" rel = "stylesheet">
        <link href = "assets/css/custom.css" rel = "stylesheet" type = "text/css"/>
        <style>
            .img-thumbnail {
                max-width: 50%!important;
            }
        </style>
    </head>
    <body>
        <section id = "container" >
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
                                <div class="panel-heading"><i class="fa fa-pencil"></i>Edit Transport Rates</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 
                                                <form class="form-horizontal" method="post" action="post-and-get/transport-rate.php" enctype="multipart/form-data"> 
                                                    <div class="col-md-12">
                                                        <div class="">
                                                            <div class="col-md-6">
                                                                <div class="bottom-top">
                                                                    <label for="location_from">Location From</label>
                                                                    <div class="formrow">
                                                                        <input type="text" autocomplete="off" id="from" value="<?php echo $CITYFROM->name; ?>" placeholder="please select picking up city" class="form-control">
                                                                        <input type="hidden" name="from" value="<?php echo $TRANSPORT_RATES->location_from; ?>" id="from-id" />
                                                                        <div id="suggesstion-box">
                                                                            <ul id="city-list-from" class="city-list"></ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="bottom-top">
                                                                    <label for="location_to">Location To</label>
                                                                    <div class="formrow">
                                                                        <input type="text" id="to" autocomplete="off" value="<?php echo $CITYTO->name; ?>"  placeholder="please select dropping down city" class="form-control">
                                                                        <div id="suggesstion-box">
                                                                            <ul id="city-list-to" class="city-list"></ul>
                                                                        </div>
                                                                        <input type="hidden"  value="<?php echo $TRANSPORT_RATES->location_to; ?>" name="to"  id="to-id" />
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="">
                                                            <div class="col-md-6">
                                                                <div class="bottom-top">
                                                                    <label for="distance">Distance</label>
                                                                    <div class="formrow">
                                                                        <input type="text" id="price" value="<?php echo $TRANSPORT_RATES->distance; ?>" class="form-control" placeholder="Enter Distance" autocomplete="off" name="distance" required="true">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="bottom-top">
                                                                    <label for="price">Price(USD)</label>
                                                                    <div class="formrow">
                                                                        <input type="text" id="price" value="<?php echo $TRANSPORT_RATES->price; ?>" class="form-control" placeholder="Enter Price" autocomplete="off" name="price" required="true">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="top-bott50">
                                                            <div class="bottom-top">
                                                                <input type="hidden" id="id" value="<?php echo $TRANSPORT_RATES->id; ?>" name="id"/>
                                                                <input type="hidden" id="authToken" value="<?php echo $_SESSION["id"]; ?>" name="memeber"/>
                                                                <input type="hidden" id="isVerifiedContactNumber" value="<?php echo $isPhoneVerified; ?>" contactnumber="<?php echo $MEMBER->contact_number; ?>">
                                                                <button name="update-transport-rate" type="submit" class="btn btn-info center-block">Change</button>
                                                            </div>
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
                </div>
            </section>

            <?php
            include './footer.php';
            ?>
        </section>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


        <!--common script for all pages-->
        <script src="assets/js/common-scripts.js"></script>

        <!--script for this page-->
        <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

        <!--custom switch-->
        <script src="assets/js/bootstrap-switch.js"></script>

        <!--custom tagsinput-->
        <script src="assets/js/jquery.tagsinput.js"></script>

        <!--custom checkbox & radio-->

        <script type="text/javascript" src="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-datepicker/js/bootstrap-datepicker.html"></script>
        <script type="text/javascript" src="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/date.html"></script>
        <script type="text/javascript" src="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/daterangepicker-2.html"></script>
        <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <script src="assets/js/form-component.js"></script>    
        <script src="js/city-from.js" type="text/javascript"></script>
        <script src="js/city-to.js" type="text/javascript"></script>
        <script src="js/display-contact-number-verification-alert.js" type="text/javascript"></script>
        <script>
            //custom select box

            $(function () {
                $('select.styled').customSelect();
            });

        </script>
        <script src="assets/tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: "#description",
                // ===========================================
                // INCLUDE THE PLUGIN
                // ===========================================

                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                // ===========================================
                // PUT PLUGIN'S BUTTON on the toolbar
                // ===========================================

                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
                // ===========================================
                // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
                // ===========================================

                relative_urls: false

            });


        </script>

    </body>

</html>
