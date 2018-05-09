<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$TOUR_SUB = new TourSubSection($id);
$TOUR = new TourPackage($TOUR_SUB->tour);
?> 
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Tour Package Itinerary Images || My Account || www.srilankatourism.travel</title>

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
                                <div class="panel-heading"><i class="fa fa-save"></i> Manage Tour Itinerary Images - <?php echo $TOUR->name; ?> - <?php echo $TOUR_SUB->title; ?></div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel">  
                                                <div class="row clearfix">
                                                    <form class="form-horizontal"  method="post" id="form-new-tour-sub-section-photo" enctype="multipart/form-data">    
                                                        <div class="col-md-3">
                                                            <div class="formrow">
                                                                <div class="uploadbox uploadphotobx" id="uploadphotobx">
                                                                    <i class="fa fa-plus plus-icon" aria-hidden="true"></i>
                                                                    <label class="uploadBox">Click here to Upload photo
                                                                        <input type="file" name="tour-sub-picture" id="tour-sub-picture">
                                                                        <input type="hidden" name="upload-tour-sub-photo" id="upload-tour-sub-photo" value="TRUE">
                                                                        <input type="hidden" name="sub-section" id="sub-section" value="<?php echo $id; ?>">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>  
                                                    </form> 
                                                    <div id="image-list">
                                                        <?php
                                                        $TOUR_SUB_PHOTO = TourSubSectionPhoto::getTourSubSectionPhotosById($id);
                                                        if (count($TOUR_SUB_PHOTO) > 0) {
                                                            foreach ($TOUR_SUB_PHOTO as $key => $tour_sub_photo) {
                                                                ?>
                                                                <div class="col-md-3" style="padding-bottom: 15px" id="div_<?php echo $tour_sub_photo['id']; ?>"> 
                                                                    <img src="../upload/tour-package/sub-section/thumb/<?php echo $tour_sub_photo['image_name']; ?>" class="img-responsive ">    
                                                                  
                                                                    <a class="aa">
                                                                        <button class="delete-icon delete-tour-sub-photo btn btn-danger btn-md fa fa-trash-o" data-id="<?php echo $tour_sub_photo['id']; ?>"></button>
                                                                    </a>   
                                                                </div>

                                                                <?php
                                                            }
                                                        } else {
                                                            ?> 
                                                        <b id="empty-mess" style="padding-left: 15px;">No Tour Package Sub Section Images in the database.</b> 
                                                        <?php } ?> 
                                                    </div>
                                                </div> 
                                            </div>
                                        </div> 
                                        <div class="text-right">
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
        <script src="assets/js/common-scripts.js"></script>
        <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <script src="assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
        
        <script src="delete/js/tour-package-photo.js" type="text/javascript"></script>
        <script src="js/add-new-tour-sub-photo.js" type="text/javascript"></script>
        
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
