<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$ACCOMODATION = new Accommodation(NULL)
?> 
﻿<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Manage Accommodation- www.srilankatourism.travel</title>
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
                <?php
                $vali = new Validator();

                $vali->show_message();
                ?>
                <!-- Manage Districts -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Manage Accommodation
                                </h2>
                                <ul class="header-dropdown">
                                    <li>
                                        <a href="create-accommodation.php">
                                            <i class="material-icons">add</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <!-- <div class="table-responsive">-->
                                <div>
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th> 
<!--                                                <th>Email</th>-->
                                                <th>Website</th>
                                                <th>Type</th>
                                                <th>City</th>
                                                <th>Member</th>
                                                <th>Rank</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th> 
<!--                                                <th>Email</th>-->
                                                <th>Website</th>
                                                <th>Type</th>
                                                <th>City</th>
                                                <th>Member</th>
                                                <th>Rank</th>
                                                <th>Options</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                            <?php
                                            foreach ($ACCOMODATION->all() as $key => $accommodation) {
                                                $accommodation_type = new AccommodationType($accommodation['type']);
                                                $city = new City($accommodation['city']);
                                                $member = new Member($accommodation['member']);
                                                ?>
                                                <tr id="row_<?php echo $accommodation['id']; ?>">

                                                    <td><?php echo $accommodation['id']; ?></td> 
                                                    <td><?php echo substr($accommodation['name'], 0, 30); ?></td> 
    <!--                                                    <td><?php echo substr($accommodation['email'], 0, 15); ?></td> -->
                                                    <td><?php echo substr($accommodation['website'], 0, 15); ?></td> 
                                                    <td><?php echo substr($accommodation_type->name, 0, 30); ?></td> 
                                                    <td><?php echo substr($city->name, 0, 30); ?></td>
                                                    <td><?php echo substr($member->name, 0, 30); ?></td>
                                                    <td><?php echo substr($accommodation['rank'], 0, 30); ?></td>
                                                    <td> 
                                                        <a href="edit-accommodation.php?id=<?php echo $accommodation['id']; ?>" class="op-link btn btn-sm btn-default"><i class="glyphicon glyphicon-pencil"></i></a>  

                                                        <a href="#" class="delete-accommodation btn btn-sm btn-danger" data-id="<?php echo $accommodation['id']; ?>">
                                                            <i class="glyphicon glyphicon-trash" data-type="cancel"></i>
                                                        </a>
                                                        <a href="view-accommodation-photos.php?id=<?php echo $accommodation['id']; ?>" class="op-link btn btn-sm btn-default"><i class="glyphicon glyphicon-picture"></i></a>
                                                        <a href="create-accommodation-rooms.php?id=<?php echo $accommodation['id']; ?>" class="op-link btn btn-sm btn-default"><i class="glyphicon glyphicon-bed"></i></a> 
                                                        <a href="view-accommodation-facilities.php?id=<?php echo $accommodation['id']; ?>" class="op-link btn btn-sm btn-default"><i class="glyphicon glyphicon-ok"></i></a> 
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>   
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Manage District -->

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
        <script src="delete/js/accommodation.js" type="text/javascript"></script>
    </body>

</html> 