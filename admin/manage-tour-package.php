<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$TOURP = new TourPackage(NULL)
?> 
﻿<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Manage Tour Package - www.srilankatourism.travel</title>
        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- JQuery DataTable Css -->
        <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        <!-- Custom Css -->
        <link href="css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="css/themes/all-themes.css" rel="stylesheet" />
    </head>

    <body class="theme-red">
        <?php
        include './navigation-and-header.php';
        ?>
        <section class="content">
            <div class="container-fluid"> 
                <!-- Manage Tour Package -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Manage Tour Package
                                </h2>
                                <ul class="header-dropdown">
                                    <li>
                                        <a href="create-tour-package.php">
                                            <i class="material-icons">add</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">

                                <div class="row clearfix">
                                    <?php
                                    $TOUR_PACKAGE = new TourPackage(NULL);
                                    foreach ($TOUR_PACKAGE->all() as $key => $tour) {
                                        ?>
                                        <div class="col-md-3 col-sm-6 col-xs-12 center-block" id="row_<?php echo $tour['id']; ?>">
                                            <p class="maxlinetitle"><?php echo $tour['sort']; ?></p>
                                            <img class="img-responsive" src="../upload/tour-package/<?php echo $tour["image_name"]; ?>" alt="">
                                            <p class="maxlinetitle ti-top"><b>Tour Name </b>: <?php echo $tour['name']; ?></p>

                                            <div class="d">
                                                <a href="edit-tour-package.php?id=<?php echo $tour['id']; ?>" class="op-link btn btn-sm btn-default">
                                                    <i class="glyphicon glyphicon-pencil"></i>
                                                </a>  
                                                <a href="#" class="delete-tour-package btn btn-sm btn-danger" data-id="<?php echo $tour['id']; ?>">
                                                    <i class="waves-effect glyphicon glyphicon-trash" data-type="cancel"></i>
                                                </a>  
        <!--                                        <a title="Tour day" href="view-tour-date.php?id=<?php echo $tour['id']; ?>" class="op-link btn btn-sm btn-default"><i class="glyphicon glyphicon-calendar">
                                                    </i> 
                                                </a> 
                                                <a title="Tour plan" href="view-add-tour-plan.php?id=<?php echo $tour['id']; ?>" class="op-link btn btn-sm btn-default"><i class="glyphicon glyphicon-list-alt"></i>
                                                </a> -->
                                            </div>
                                            <hr>
                                        </div>
                                        <?php
                                    }
                                    ?>  
                                </div>
                            </div>
                        </div>
                        <!-- #END# Manage District -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Jquery Core Js -->
        <script src="plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="plugins/bootstrap/js/bootstrap.js"></script>

        <!-- Select Plugin Js -->
        <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="plugins/node-waves/waves.js"></script>

        <!-- Jquery DataTable Plugin Js -->
        <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
        <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

        <script src="plugins/sweetalert/sweetalert.min.js"></script>
        <!-- Custom Js -->
        <script src="js/admin.js"></script>
        <script src="js/pages/tables/jquery-datatable.js"></script>

        <!-- Demo Js -->
        <script src="js/demo.js"></script>
        <script src="delete/js/district.js" type="text/javascript"></script>
    </body>

</html> 