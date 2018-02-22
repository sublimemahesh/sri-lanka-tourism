<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$ACCOMODATION = new Accommodation($id);
$ACCOMODATION_GENERAL_FACILITY = new AccommodationGeneralFacilities(NULL);
$ACCOMODATION_FACILITY_DETAILS = new AccommodationFacilityDetails(NULL);
?> 
﻿<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>View Room Facilities - www.srilankatourism.travel</title>
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
        <style>
            [type="checkbox"]:not(:checked), [type="checkbox"]:checked {
                left: -9999px;
                opacity: 1;
                position: inherit;
            }
        </style>
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
                                    Facilities of <?php echo $ACCOMODATION->name; ?> 
                                </h2>
                                <ul class="header-dropdown">
                                    <li>
                                        <a href="create-accommodation-general-facilities-types.php">
                                            <i class="material-icons">add</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <!-- <div class="table-responsive">-->
                                <div>
                                    <form  method="post" action="post-and-get/accommodation-facilities-details.php" enctype="multipart/form-data">
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th> 
                                                    <th>Options</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th> 
                                                    <th>Options</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>

                                                <?php
                                                $result = AccommodationFacilityDetails::getFacilitiesByAccommodationId($id);
                                                foreach ($ACCOMODATION_GENERAL_FACILITY->all() as $key => $accommodation_general_facility) {
                                                    ?>
                                                    <tr id="row_<?php echo $accommodation_general_facility['id']; ?>">
                                                        <td><?php echo $accommodation_general_facility['sort']; ?></td> 
                                                        <td><?php echo $accommodation_general_facility['name']; ?></td> 
                                                        <td> 
                                                            <input  value="<?php echo $accommodation_general_facility['id']; ?>" <?php
                                                            $resultFacilities = explode(",", $result['facility']);
                                                            foreach ($resultFacilities as $items => $resultFacility) {
                                                                if ($resultFacility == $accommodation_general_facility['id']) {
                                                                    echo 'checked';
                                                                }
                                                            }
                                                                ?> name="facility[]" type="checkbox">
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>   
                                                </tbody>
                                            </table>
                                            <div class="text-center"> 
                                                <input type="hidden" id="accommodation_id" value="<?php echo $ACCOMODATION->id; ?>" name="accommodation_id"/>
                                            <input type="submit" name="create" class="btn btn-primary m-t-15 waves-effect" value="Save Changes"/>
                                        </div>
                                    </form>

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
        <script src="delete/js/accommodation-genaral-facility-type.js" type="text/javascript"></script>
    </body>

</html> 