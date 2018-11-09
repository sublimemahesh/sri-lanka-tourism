<!DOCTYPE html>
<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$TOUR_PACKAGE = new TourPackage($id);
$TOUR_SUB_PHOTO = new TourSubSectionPhoto(NULL);

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

        <title>Tour Package Images || My Account || www.srilankatourism.travel</title>

        <!-- Bootstrap core CSS -->
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
                                <div class="panel-heading"><i class="fa fa-save"></i> Manage Tour Itinerary - <?php echo $TOUR_PACKAGE->name; ?></div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="row clearfix">
                                            <div class="col-md-3">
                                                <div class="formrow">
                                                    <a href="add-new-tour-package-sub-section.php?id=<?php echo $id; ?>">
                                                        <div class="uploadbox uploadphotobx" id="uploadphotobx">
                                                            <i class="fa fa-plus plus-icon" aria-hidden="true"></i>
                                                            <label class="uploadBox">Click here to create new date
                                                            </label>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>  
                                            <?php
                                            $TOUR_SUB = TourSubSection::GetTourSubSectionByTourPackage($id);
                                            if (count($TOUR_SUB) > 0) {
                                                foreach ($TOUR_SUB as $key => $tour_s) {
                                                    ?>
                                                    <div class="col-md-3" id="div_<?php echo $tour_s['id']; ?>">
        <!--                                                        <p class="maxlinetitle"><?php echo $tour_s['sort']; ?></p>-->
                                                        <div class="">
                                                            <?php
                                                            if (count($TOUR_SUB_PHOTO) > 0) {
                                                                foreach ($TOUR_SUB_PHOTO->getTourSubSectionPhotosById($tour_s['id']) as $key => $tour_sub_p) {
                                                                    if ($key == 1) {
                                                                        break;
                                                                    }
                                                                    ?>
                                                                    <div class="menu-button-hover">
                                                                        <div class="dropdown">
                                                                            <button class="dropbtn"><i class="fa fa-bars"></i></button>
                                                                            <div class="dropdown-content text-left">
                                                                                <a href="edit-tour-sub-section.php?id=<?php echo $tour_s['id']; ?>"><i class="hover-menu-icon fa fa-pencil"></i>Edit</a>
                                                                                <a href="add-new-tour-package-photo.php?id=<?php echo $tour_s['id']; ?>"><i class="hover-menu-icon fa fa-photo"></i>Manage photos</a>
                                                                                <a href="#" class="delete-tour-sub-section menu-hover-delete-font delete-accommodation" data-id="<?php echo $tour_s['id']; ?>"><i class="hover-menu-icon fa fa-file-text-o"></i>Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <img class="img-responsive" src="../upload/tour-package/sub-section/thumb/<?php echo $tour_sub_p['image_name']; ?>">
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?> 
                                                                <b style="padding-left: 15px;">No Accommodation Image.</b> 
                                                            <?php } ?>
                                                        </div> 
                                                        <p class="maxlinetitle"><?php echo $tour_s['title']; ?></p>
                                                    </div>
                                                    <?php
                                                }
                                            } else {
                                                ?> 

                                            <?php } ?> 
                                        </div>
                                        <div class="text-right">
                                            <a href="manage-tour-package.php"><button type="button" class="btn btn-round btn-info">Manage Tour Package</button></a>
                                        </div>
                                        <input type="hidden" id="isVerifiedContactNumber" value="<?php echo $isPhoneVerified; ?>" contactnumber="<?php echo $MEMBER->contact_number; ?>">
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
        <script src="js/display-contact-number-verification-alert.js" type="text/javascript"></script>
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
        <script src="assets/plugins/jquery-steps/jquery.steps.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <script src="js/post-transport-image.js" type="text/javascript"></script>
        <script src="assets/js/form-component.js"></script>    
        <script src="assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <script src="delete/js/tour-sub-section.js" type="text/javascript"></script>
        <script src="js/post-tour-package-images.js" type="text/javascript"></script>
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