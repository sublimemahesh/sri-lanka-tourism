<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$TRANSPORTS = new Transports($id);
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

        <title>Transports Images || My Account || www.srilankatourism.travel</title>

        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/Preloader/jm.spinner.css" rel="stylesheet" type="text/css"/>
    </head> 
    <body> 
        <div class="box"></div>  
        <section id="container" > 
            <?php
            include './header-nav.php';
            ?>
            <!--main content start-->
            <section id="main-content">
                <div class="col-md-12 verified-alert"></div> 
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="row top-bott20"> 
                            <?php
                            $vali = new Validator();

                            $vali->show_message();
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-save"></i> Create Transport Images</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel">  
                                                <div class="row clearfix">
                                                    <form class="form-horizontal" method="post" id="form-new-transport-photo" enctype="multipart/form-data"> 
                                                        <div class="col-md-3">
                                                            <div class="formrow">
                                                                <div class="uploadbox uploadphotobx" id="uploadphotobx">
                                                                    <i class="fa fa-plus plus-icon" aria-hidden="true"></i>
                                                                    <label class="uploadBox">Click here to Upload photo
                                                                        <input type="file" name="transport-picture" id="transport-picture">
                                                                        <input type="hidden" name="upload-transport-photo" id="upload-transport-photo" value="TRUE">
                                                                        <input type="hidden" name="transport" id="transport" value="<?php echo $id; ?>">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>  
                                                    </form>  
                                                    <div id="image-list">
                                                        <?php
                                                        $TRANSPORT_PHOTOS = TransportPhoto::getTransportPhotosById($id);
                                                        if (count($TRANSPORT_PHOTOS) > 0) {
                                                            foreach ($TRANSPORT_PHOTOS as $key => $transport_photo) {
                                                                ?>
                                                                <div class="col-md-3" style="padding-bottom: 15px" id="div_<?php echo $transport_photo['id']; ?>"> 
                                                                    <img src="../upload/transport/thumb/<?php echo $transport_photo['image_name']; ?>" class="img-responsive ">
                                                                    <p class="maxlinetitle"><?php echo $transport_photo['caption']; ?></p>
                                                                    <a class="aa">
                                                                        <button class="delete-icon delete-transports-photo btn btn-danger btn-md fa fa-trash-o" style="margin-bottom: 25px;" data-id="<?php echo $transport_photo['id']; ?>"></button>
                                                                    </a> 
                                                                </div>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?> 
                                                            <b style="padding-left: 15px;">No Transport Images in the database.</b> 
                                                        <?php } ?> 
                                                    </div>
                                                </div> 
                                            </div>
                                        </div> 
                                        <div class="text-right">
                                            <a href="manage-transport.php"><button type="button" class="btn btn-round btn-info">Manage Transport</button></a>
                                        </div>
                                        <input type="hidden" id="isVerifiedContactNumber" value="<?php echo $isPhoneVerified; ?>" >
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
        <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <script src="assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>

        <script src="delete/js/transports-photo.js" type="text/javascript"></script>
        <script src="js/add-transport-photo.js" type="text/javascript"></script>
        <script src="js/display-contact-number-verification-alert.js" type="text/javascript"></script>
        <script src="plugins/Preloader/jm.spinner.js" type="text/javascript"></script>
        <script>

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
