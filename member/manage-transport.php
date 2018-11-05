<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

if (isset($_SESSION['isPhoneVerified'])) {
    $isPhoneVerified = $_SESSION['isPhoneVerified'];
}
$TRANSPORTS = new Transports(NULL);
$TRANSPORTS_PHOTO = new TransportPhoto(NULL);
?> 
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <title>Manage Transports || My Accout ||  www.srilankatourism.travel</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet">
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
        <section id="container" > 
            <?php
            include './header-nav.php';
            ?>
            <!--main content start-->
            <section id="main-content">
                <div class="col-md-12 verified-alert"></div> 
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="top-bott20"> 
                            <?php
                            $vali = new Validator();
                            $vali->show_message();
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-pencil"></i> manage Transport</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-3">
                                                            <div class="formrow">
                                                                <a href="add-new-transport.php">
                                                                    <div class="uploadbox uploadphotobx" id="uploadphotobx">
                                                                        <i class="fa fa-plus plus-icon" aria-hidden="true"></i>
                                                                        <label class="uploadBox">Click here to add new vehicle
                                                                        </label>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div> 
                                                        <div id="image-list">
                                                            <?php
                                                            foreach ($TRANSPORTS->getTransportsByMemberId($_SESSION['id']) as $key => $vehicle_t) {
                                                                ?> 
                                                                <div class="col-md-3" id="div_<?php echo $vehicle_t['id']; ?>">
                                                                    <div class="formrow">
                                                                        <div>
                                                                            <?php
                                                                            if (count($TRANSPORTS_PHOTO) > 0) {
                                                                                foreach ($TRANSPORTS_PHOTO->getTransportPhotosById($vehicle_t['id']) as $key => $TRANSPORTS_P) {
                                                                                    if ($key == 1) {
                                                                                        break;
                                                                                    }
                                                                                    ?>
                                                                                    <div class="menu-button-hover">
                                                                                        <div class="dropdown">
                                                                                            <button class="dropbtn"><i class="fa fa-bars"></i></button>
                                                                                            <div class="dropdown-content text-left">
                                                                                                <a href="edit-transport.php?id=<?php echo $vehicle_t['id']; ?>"><i class="hover-menu-icon fa fa-pencil"></i>Edit</a>
                                                                                                <a href="add-transport-photo.php?id=<?php echo $vehicle_t['id']; ?>"><i class="hover-menu-icon fa fa-photo"></i>Manage Photos</a>
                                                                                                <a href="add-transport-rates.php?id=<?php echo $vehicle_t['id']; ?>"><i class="hover-menu-icon fa fa-star"></i>Manage Rates</a>
                                                                                                <a href="#" class="menu-hover-delete-font delete-transports" data-id="<?php echo $vehicle_t['id']; ?>"><i class="hover-menu-icon fa fa-trash-o"></i>Delete</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <img class="img-responsive" src="../upload/transport/thumb/<?php echo $TRANSPORTS_P['image_name']; ?>">
                                                                                    <?php
                                                                                }
                                                                            } else {
                                                                                ?> 
                                                                                <b style="padding-left: 15px;">No Transport Image.</b> 
                                                                            <?php } ?>
                                                                        </div> 
                                                                        <div>
                                                                            <b>Title :</b> <?php echo $vehicle_t['title']; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>  
                                                            <input type="hidden" id="isVerifiedContactNumber" value="<?php echo $isPhoneVerified; ?>" >
                                                        </div>
                                                    </div>  
                                                </div>  
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

        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/common-scripts.js"></script>
        <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="js/display-contact-number-verification-alert.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <script src="assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <script src="delete/js/transports.js" type="text/javascript"></script>
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
