<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$TOUR_PACKAGE = new TourPackage(NULL);
$TOUR_PACKAGE_PHOTO = new TourSubSectionPhoto(NULL);
?> 
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Tour Package || My Accout ||  www.srilankatourism.travel</title>

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
                        <div class="top-bott20"> 
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-pencil"></i> manage Tour Package</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <?php
                                                        foreach ($TOUR_PACKAGE->all() as $key => $tour_pack) {
                                                            ?>
                                                            <div class="col-md-4 col-sm-6 col-xs-12 style-transport">
                                                                <div id="div_<?php echo $tour_pack['id']; ?>">
                                                                    <div><?php echo $tour_pack['id']; ?></div>

                                                                    <div><img class="img-responsive" src="../upload/tour-package/<?php echo $tour_pack['picture_name']; ?>"></div>
                                                                    <div><b>Name :</b> <?php echo $tour_pack['name']; ?></div> 
                                                                    <div><b>Price :</b> <?php echo $tour_pack['price']; ?></div> 
                                                                    <div>
                                                                        <a href="edit-tour-package.php?id=<?php echo $tour_pack['id']; ?>"><button class="btn btn-primary btn-xs fa fa-pencil"></button>
                                                                        </a> 
                                                                        |
                                                                        <a>
                                                                            <button class="delete-tour-package btn btn-danger btn-xs fa fa-trash-o" data-id="<?php echo $tour_pack['id']; ?>"></button>
                                                                        </a> 
                                                                        |
                                                                        <a href="add-new-tour-package-sub-section.php?id=<?php echo $tour_pack['id']; ?>">
                                                                            <button class="btn btn-success btn-xs fa fa-file-text-o"></button>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>  
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

        <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <script src="assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>

        <script src="delete/js/tour-package.js" type="text/javascript"></script>
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
