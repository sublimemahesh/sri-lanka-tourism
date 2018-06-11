<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$ACCOMODATION = new Accommodation($id);
$ROOMS = Room::getAccommodationRoomsById($id);
$ROOM_PHOTO = new RoomPhoto(NULL);
$ROOM_FACILITY = new RoomFacility(NULL);
$ROOM_FACILITY_DETAILS = new RoomFaciliityDetails(NULL);
?> 
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Accommodation Room - www.srilankatourism.travel</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-datepicker/css/datepicker.html" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/daterangepicker.html" />
        <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
        <script src="assets/plugins/jquery-steps/jquery.steps.js" type="text/javascript"></script>
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
                                <div class="panel-heading"><i class="fa fa-pencil"></i>Add Room - <?php echo $ACCOMODATION->name; ?></div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 
                                                <form class="form-horizontal"  method="post" action="post-and-get/room.php" enctype="multipart/form-data" id="form-room"> 
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="body">
                                                                <div class="row clearfix">
                                                                    <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                                                        <div class="panel-group"  role="tablist" aria-multiselectable="true">
                                                                            <div class="panel panel-default">
                                                                                <a role="button" data-toggle="collapse" aria-expanded="true">
                                                                                    <div class="panel-heading tab-panel-heading" role="tab" id="headingOne">
                                                                                        <h4 class="panel-title">
                                                                                            Your Room Details
                                                                                        </h4>
                                                                                    </div>
                                                                                </a>
                                                                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                                                    <div class="panel-body">
                                                                                        <div class="">
                                                                                            <div class="bottom-top">
                                                                                                <label for="Name">Name</label>
                                                                                            </div>
                                                                                            <div class="formrow">
                                                                                                <input type="text" id="name" class="form-control" placeholder="Enter Name" autocomplete="off" name="name" required="true">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="">
                                                                                            <div class="bottom-top">
                                                                                                <label for="Name">Number of Rooms</label>
                                                                                            </div>
                                                                                            <div class="formrow">
                                                                                                <select class="form-control" name="number_of_room" id="number_of_room">
                                                                                                    <option>- Add Number of Rooms - </option>
                                                                                                    <option value="1">1</option>
                                                                                                    <option value="2">2</option>
                                                                                                    <option value="3">3</option>
                                                                                                    <option value="4">4</option>
                                                                                                    <option value="5">5</option>
                                                                                                    <option value="6">6</option>
                                                                                                    <option value="7">7</option>
                                                                                                    <option value="8">8</option>
                                                                                                    <option value="9">9</option>
                                                                                                    <option value="10">10</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="">
                                                                                            <div class="bottom-top">
                                                                                                <label for="Name">Number of Adults</label>
                                                                                            </div>
                                                                                            <div class="formrow">
                                                                                                <select class="form-control" name="number_of_adults" id="number_of_adults">
                                                                                                    <option>- Add Number of Adults - </option>
                                                                                                    <option value="1">1</option>
                                                                                                    <option value="2">2</option>
                                                                                                    <option value="3">3</option>
                                                                                                    <option value="4">4</option>
                                                                                                    <option value="5">5</option>
                                                                                                    <option value="6">6</option>
                                                                                                    <option value="7">7</option>
                                                                                                    <option value="8">8</option>
                                                                                                    <option value="9">9</option>
                                                                                                    <option value="10">10</option>
                                                                                                </select>                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="">
                                                                                            <div class="bottom-top">
                                                                                                <label for="Name">Number of Children</label>
                                                                                            </div>
                                                                                            <div class="formrow">
                                                                                                <select class="form-control" name="number_of_children" id="number_of_children">
                                                                                                    <option>- Add Number of Children - </option>
                                                                                                    <option value="1">1</option>
                                                                                                    <option value="2">2</option>
                                                                                                    <option value="3">3</option>
                                                                                                    <option value="4">4</option>
                                                                                                    <option value="5">5</option>
                                                                                                    <option value="6">6</option>
                                                                                                    <option value="7">7</option>
                                                                                                    <option value="8">8</option>
                                                                                                    <option value="9">9</option>
                                                                                                    <option value="10">10</option>
                                                                                                </select>                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="">
                                                                                            <div class="bottom-top">
                                                                                                <label for="Name">Number of Extra Beds</label>
                                                                                            </div>
                                                                                            <div class="formrow">
                                                                                                <select class="form-control" name="number_of_extra_bed" id="number_of_extra_bed">
                                                                                                    <option>- Add Number of Extra Beds - </option>
                                                                                                    <option value="1">1</option>
                                                                                                    <option value="2">2</option>
                                                                                                    <option value="3">3</option>
                                                                                                    <option value="4">4</option>
                                                                                                    <option value="5">5</option>
                                                                                                    <option value="6">6</option>
                                                                                                    <option value="7">7</option>
                                                                                                    <option value="8">8</option>
                                                                                                    <option value="9">9</option>
                                                                                                    <option value="10">10</option>
                                                                                                </select>                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="">
                                                                                            <div class="bottom-top">
                                                                                                <label for="Name">Extra Bed Price</label>
                                                                                            </div>
                                                                                            <div class="formrow">
                                                                                                <input type="number" min="0" id="extra_bed_price" class="form-control" placeholder="Enter Extra Bed price" autocomplete="off" name="extra_bed_price" required="TRUE">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12 text-right">
                                                                                            <a role="button" id="step-1" class="btn btn-info tab-next-button" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                                                                                                Next >>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel panel-default">
                                                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"  aria-expanded="false"
                                                                                   >
                                                                                    <div class="panel-heading tab-panel-heading" role="tab" id="headingTwo">
                                                                                        <h4 class="panel-title">

                                                                                            Room Photos

                                                                                        </h4>
                                                                                    </div>
                                                                                </a>
                                                                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                                                    <div class="panel-body">
                                                                                        <div class="row">
                                                                                            <div class="bottom-top col-md-2">
                                                                                                <div class="formrow">
                                                                                                    <div class="uploadphotobx" id="uploadphotobx"> 
                                                                                                        <i class="fa fa-upload" aria-hidden="true"></i>
                                                                                                        <label class="uploadBox">Click here to Upload photo
                                                                                                            <input type="file" name="room-picture" id="room-picture">
                                                                                                            <input type="hidden" name="upload-room-image" id="upload-room-image" value="TRUE"/>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div id="image-list">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-xs-6 col-sm-6 text-left">
                                                                                            <a role="button" id="step-prev-1" class="btn btn-info tab-next-button" data-toggle="collapse" aria-expanded="true" aria-controls="collapseTwo">
                                                                                                << Previous
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-xs-6 col-sm-6 text-right">
                                                                                            <a role="button" id="step-2" class="btn btn-info tab-next-button" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                                                                                                Next >>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel panel-default">
                                                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="false"
                                                                                   >
                                                                                    <div class="panel-heading tab-panel-heading" role="tab" id="headingThree">
                                                                                        <h4 class="panel-title">
                                                                                            Facilities
                                                                                        </h4>
                                                                                    </div>
                                                                                </a>
                                                                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                                                    <div class="panel-body">
                                                                                        <div class="table-responsive">
                                                                                            <div>
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
                                                                                                        foreach ($ROOM_FACILITY->all() as $key => $room_facility) {
                                                                                                            ?>
                                                                                                            <tr id="row_<?php echo $room_facility['id']; ?>">
                                                                                                                <td><?php echo $room_facility['sort']; ?></td> 
                                                                                                                <td><?php echo $room_facility['name']; ?></td> 
                                                                                                                <td> 
                                                                                                                    <input  value="<?php echo $room_facility['id']; ?>" <?php
                                                                                                                    $resultFacilities = explode(",", $result['facility']);
                                                                                                                    foreach ($resultFacilities as $items => $resultFacility) {
                                                                                                                        if ($resultFacility == $room_facility['id']) {
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

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-xs-6 col-sm-6 text-left">
                                                                                            <a role="button" id="step-prev-2" class="btn btn-info tab-next-button" data-toggle="collapse" aria-expanded="true" aria-controls="collapseTwo">
                                                                                                << Previous
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-xs-6 col-sm-6 text-right">
                                                                                            <a role="button" id="step-3" class="btn btn-info tab-next-button" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                                                                                                Next >>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel panel-default">
                                                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="false"
                                                                                   >
                                                                                    <div class="panel-heading tab-panel-heading" role="tab" id="headingFour">
                                                                                        <h4 class="panel-title">
                                                                                            Description
                                                                                        </h4>
                                                                                    </div>
                                                                                </a>
                                                                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                                                                    <div class="panel-body">
                                                                                        <div class="col-md-12">
                                                                                            <div class="bottom-top">
                                                                                                <label for="Description">Description</label>
                                                                                            </div>
                                                                                            <div class="formrow">
                                                                                                <textarea id="description" name="description" class="form-control" rows="5"></textarea> 
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-xs-6 col-sm-6 text-left">
                                                                                            <a role="button" id="step-prev-3" class="btn btn-info tab-next-button" data-toggle="collapse" aria-expanded="true" aria-controls="collapseTwo">
                                                                                                << Previous
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-xs-6 col-sm-6 text-right">
                                                                                            <div class="">
                                                                                                <input type="hidden" value="<?php echo $id ?>" name="id" />
                                                                                                <input name="create" id="create" type="submit" class="btn btn-info tab-next-create" value="Save All Details">
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
                                                </form>
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

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="js/add-new-room.js" type="text/javascript"></script>
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
        <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <script src="assets/js/form-component.js"></script>    
        <script src="assets/plugins/jquery-steps/jquery.steps.min.js" type="text/javascript"></script>
        <script src="assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <script src="delete/js/rooms.js" type="text/javascript"></script>
        <script src="js/post-room-image.js" type="text/javascript"></script>
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