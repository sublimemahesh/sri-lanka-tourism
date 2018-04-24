<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$TOUR_PACKAGE = new TourPackage($id);
$TOUR_SUB_PHOTO = new TourSubSectionPhoto(NULL);
?> 
<!DOCTYPE html>
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
        <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
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
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="row  top-bott20"> 
                            <?php
                            $vali = new Validator();

                            $vali->show_message();
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-save"></i> Create Tour Sub Section Package</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 
                                                <form class="form-horizontal"  method="post" action="post-and-get/tour-package-sub-section.php" enctype="multipart/form-data" id="form-tour-sub-section-package"> 
                                                    <div class="col-md-12">
                                                        <div class="bottom-top">
                                                            <label for="title">Title</label>
                                                        </div>
                                                        <div class="formrow">
                                                            <input type="text" id="caption" class="form-control" placeholder="Enter Title" autocomplete="off" name="title" required="true">
                                                        </div>
                                                    </div>
                                                    <div class="bottom-top col-md-2">
                                                        <div class="formrow">
                                                            <div class="uploadphotobx" id="uploadphotobx"> 
                                                                <i class="fa fa-upload" aria-hidden="true"></i>
                                                                <label class="uploadBox">Click here to Upload photo
                                                                    <input type="file" name="tour-sub-picture" id="tour-sub-picture">
                                                                    <input type="hidden" name="upload-tour-sub-image" id="upload-tour-sub-image" value="TRUE"/>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="image-list"></div>
                                                    <div class="col-md-12">
                                                        <div class="bottom-top">
                                                            <label for="description">Description</label>
                                                        </div>
                                                        <div class="formrow">
                                                            <textarea type="text" id="description" name="description" class="form-control" placeholder="Please Enter Description"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="top-bott50 col-md-12">
                                                        <div class="bottom-top">
                                                            <input type="hidden" id="id" class="form-control" autocomplete="off" name="id" required="true">
                                                            <input type="hidden" id="member" name="member" value="<?php echo $_SESSION['id']; ?>"/>
                                                            <input type="hidden" value="<?php echo $id ?>" name="id"/>
                                                            <button name="create-tour-sub-section" id="create" type="submit" class="btn btn-info center-block">Create</button>
                                                        </div>
                                                    </div> 

                                                </form>  
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <a href="manage-tour-package.php"><button type="button" class="btn btn-round btn-info">Manage Tour Package</button></a>
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
        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>

        <script src="js/add-new-tour-subsection.js" type="text/javascript"></script>
        <script src="assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>

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