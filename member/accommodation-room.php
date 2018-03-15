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
                                <div class="panel-heading"><i class="fa fa-pencil"></i>Room</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">

                                            <div class="formpanel"> 
                                                <form class="form-horizontal"  method="post" action="post-and-get/room.php" enctype="multipart/form-data" id="form-room"> 
                                                    <div class="col-md-12">

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
                                                                <input type="number" min="0" id="number_of_room" class="form-control" placeholder="Enter Number of Rooms" autocomplete="off" name="number_of_room" required="TRUE">
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="Name">Number of Adults</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <input type="number" min="0" id="number_of_adults" class="form-control" placeholder="Enter Number of adults" autocomplete="off" name="number_of_adults" required="TRUE">
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="Name">Number of Children</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <input type="number" min="0" id="number_of_children" class="form-control" placeholder="Enter Number of Children" autocomplete="off" name="number_of_children" required="TRUE">
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="Name">Number of Extra Beds</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <input type="number" min="0" id="number_of_extra_bed" class="form-control" placeholder="Enter Number Of Extra Bed" autocomplete="off" name="number_of_extra_bed" required="TRUE">
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="Name">Extra Bed Price</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <input type="number" min="0" id="extra_bed_price" class="form-control" placeholder="Enter Extra Bed price" autocomplete="off" name="extra_bed_price" required="TRUE">
                                                            </div>
                                                        </div>
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
                                                        <div class="col-md-12">
                                                            <div class="bottom-top">
                                                                <label for="Description">Description</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <textarea id="description" name="description" class="form-control" rows="5"></textarea> 
                                                            </div>
                                                        </div>
                                                        <div class="top-bott50 col-md-12">
                                                            <div class="bottom-top">
                                                                <input type="hidden" value="<?php echo $id ?>" name="id" />
                                                                <button name="create" type="submit" class="btn btn-info center-block">Create</button>
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