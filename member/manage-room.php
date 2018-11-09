<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$month = date('m');
$year = date('Y');
$ACCOMODATION = new Accommodation($id);
$ROOMS = Room::getAccommodationRoomsById($id);
$ROOM_PHOTO = new RoomPhoto(NULL);

if (isset($_SESSION['isPhoneVerified'])) {
    $isPhoneVerified = $_SESSION['isPhoneVerified'];
}
if ($_SESSION['id'] <> $ACCOMODATION->member) {
    if (Member::logOut()) {
        header('Location: login.php');
    } else {
        header('Location: ?error=2');
    }
}
?> 
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Manage Room || My Account ||  www.srilankatourism.travel</title>

        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/font-awesome.min.min.css" rel="stylesheet" type="text/css"/>
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
                <div class="col-md-12 verified-alert"></div> 
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="top-bott20">
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-pencil"></i>Manage Rooms - <?php echo $ACCOMODATION->name; ?></div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 
                                                <div class="row clearfix">
                                                    <div class="col-md-3">
                                                        <div class="formrow">
                                                            <a href="accommodation-room.php?id=<?php echo $id; ?>">
                                                                <div class="uploadbox2 uploadphotobx2" id="uploadphotobx">
                                                                    <i class="fa fa-plus plus-icon" aria-hidden="true"></i>
                                                                    <label class="uploadBox">Click here to add your room

                                                                    </label>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>  
                                                    <?php
                                                    foreach ($ROOMS as $key => $room) {
                                                        ?>
                                                        <div class="col-md-3 style-transport" id="div_<?php echo $room['id']; ?>">
                                                            <div class="room_all">
                                                                <?php
                                                                if (count($ROOM_PHOTO) > 0) {
                                                                    foreach ($ROOM_PHOTO->getRoomPhotosById($room['id']) as $key => $room_p) {
                                                                        if ($key == 1) {
                                                                            break;
                                                                        }
                                                                        ?>
                                                                        <div class="menu-button-hover">
                                                                            <div class="dropdown">
                                                                                <button class="dropbtn"><i class="fa fa-bars"></i></button>
                                                                                <div class="dropdown-content text-left">
                                                                                    <a href="edit-room.php?id=<?php echo $room['id']; ?>&aid=<?php echo $id; ?>"><i class="hover-menu-icon fa fa-pencil"></i>Edit</a>
                                                                                    <a href="add-room-photo.php?id=<?php echo $room['id']; ?>&aid=<?php echo $id; ?>"><i class="hover-menu-icon fa fa-photo"></i>Manage Photos</a>
                                                                                    <a href="room-facilities.php?id=<?php echo $room['id']; ?>"><i class="hover-menu-icon fa fa-check-square"></i>Manage Facilities</a>
                                                                                    <a href="manage-room-price-seasons.php?id=<?php echo $room['id']; ?>"><i class="hover-menu-icon fa fa-dollar"></i>Manage Price</a>
                                                                                    <a href="manage-room-avilability.php?id=<?php echo $room['id']; ?>&year=<?php echo $year; ?>&month=<?php echo $month; ?>"><i class="hover-menu-icon fa fa-calendar-check-o"></i>Manage Avilability</a>
                                                                                    <a href="#" class="menu-hover-delete-font delete-rooms" data-id="<?php echo $room['id']; ?>"><i class="hover-menu-icon fa fa-trash-o"></i>Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <img class="img-responsive" src="../upload/accommodation/rooms/thumb/<?php echo $room_p['image_name']; ?>">
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </div> 
                                                                <div><b>Title :</b> <?php echo $room['name']; ?></div>
                                                                <div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        } else {
                                                            ?> 
                                                            <b style="padding-left: 15px;">No Room Image.</b> 
                                                            <?php
                                                        }
                                                    }
                                                    ?>  
                                                    <input type="hidden" id="isVerifiedContactNumber" value="<?php echo $isPhoneVerified; ?>" >
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
        <script src="js/display-contact-number-verification-alert.js" type="text/javascript"></script>
        <script src="delete/js/rooms.js" type="text/javascript"></script>
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