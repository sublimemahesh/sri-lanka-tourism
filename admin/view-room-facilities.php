<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . './auth.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$ACCOMODATION_ROOM = new Room($id);
$ACCOMODATION_ROOM_FACILITY = new RoomFacility(NULL);
$ACCOMODATION_ROOM_DETAILS = new RoomFaciliityDetails(NULL);
?> 

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Add Room Facility - www.srilankatourism.travel</title>
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

        <!-- Sweet Alert Css -->
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
                <!-- Vertical Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2> 
                                    Facilities of <?php echo $ACCOMODATION_ROOM->name; ?> 
                                </h2>
                                <ul class="header-dropdown">
                                    <li class="">
                                        <a href="create-accommodation-rooms.php?id=<?php echo $ACCOMODATION_ROOM->id; ?>">
                                            <i class="material-icons">list</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <form class="form-horizontal"  method="post" action="post-and-get/room-facility-details.php" enctype="multipart/form-data"> 

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
                                            $result = RoomFaciliityDetails::getFacilitiesByRoomId($id);
                                            foreach ($ACCOMODATION_ROOM_FACILITY->all() as $key => $accommodation_room_facility) {
                                                ?>
                                                <tr id="row_<?php echo $accommodation_room_facility['id']; ?>">
                                                    <td><?php echo $accommodation_room_facility['sort']; ?></td> 
                                                    <td><?php echo $accommodation_room_facility['name']; ?></td> 
                                                    <td> 
                                                        <input  value="<?php echo $accommodation_room_facility['id']; ?>" <?php
                                                        $resultFacilities = explode(",", $result['facility']);
                                                        foreach ($resultFacilities as $items => $resultFacility) {
                                                            if ($resultFacility == $accommodation_room_facility['id']) {
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
                                        <input type="hidden" id="room_id" value="<?php echo $ACCOMODATION_ROOM->id; ?>" name="room_id"/>
                                        <input type="submit" name="create" class="btn btn-primary m-t-15 waves-effect" value="Save Changes"/>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Vertical Layout -->

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

        <!-- Custom Js -->
        <script src="js/admin.js"></script>

        <!-- Demo Js -->
        <script src="js/demo.js"></script>

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
        <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
        <script src="js/pages/ui/dialogs.js"></script>
        <script src="js/demo.js"></script>
        <script src="js/pages/tables/jquery-datatable.js"></script>

    </body>

</html>