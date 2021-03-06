<!DOCTYPE html>
<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$Aid = $_GET['aid'];
$ACCOMMODATION = new Accommodation($Aid);
$ROOM = new Room($id);
if (isset($_SESSION['isPhoneVerified'])) {
    $isPhoneVerified = $_SESSION['isPhoneVerified'];
}
if ($_SESSION['id'] <> $ACCOMMODATION->member) {
    if (Member::logOut()) {
        header('Location: login.php');
    } else {
        header('Location: ?error=2');
    }
}
?> 

<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Accommodation Room Images || My Account || www.srilankatourism.travel</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/Preloader/jm.spinner.css" rel="stylesheet" type="text/css"/>

        <style>
            .img-thumbnail {
                max-width: 50% !important;
            }
        </style>
    </head> 
    <body> 
        <div class="box"></div>  
        <section id="container" > 
            <?php
            include './header-nav.php';
            ?>
            <!--main content start-->
            <section id="main-content">
                <div class="col-md-12 verified-alert"></div> 
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="row  top-bott20"> 
                            <?php
                            $vali = new Validator();

                            $vali->show_message();
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-save"></i> Manage Room Photos - <?php echo $ROOM->name; ?></div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel">  
                                                <div class="row clearfix">
                                                    <form class="form-horizontal" method="post" id="form-new-room-photo" enctype="multipart/form-data"> 
                                                        <div class="col-md-3">
                                                            <div class="formrow">
                                                                <div class="uploadbox uploadphotobx" id="uploadphotobx">
                                                                    <i class="fa fa-plus plus-icon" aria-hidden="true"></i>
                                                                    <label class="uploadBox">Click here to Upload photo
                                                                        <input type="file" name="room-picture" id="room-picture">
                                                                        <input type="hidden" name="upload-room-photo" id="upload-room-photo" value="TRUE">
                                                                        <input type="hidden" name="room" id="room" value="<?php echo $id; ?>">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>  
                                                    </form>  
                                                    <div id="image-list">
                                                        <?php
                                                        $ROOM_PHOTOS = RoomPhoto::getRoomPhotosById($id);
                                                        if (count($ROOM_PHOTOS) > 0) {
                                                            foreach ($ROOM_PHOTOS as $key => $room_photo) {
                                                                ?>
                                                                <div class="col-md-3" style="padding-bottom: 15px" id="div_<?php echo $room_photo['id']; ?>"> 
                                                                    <img src="../upload/accommodation/rooms/thumb/<?php echo $room_photo['image_name']; ?>" class="img-responsive ">
                                                                    <p class="maxlinetitle"><?php echo $room_photo['caption']; ?></p>
                                                                    <a class="aa">
                                                                        <button class="delete-icon delete-room-photo btn btn-danger btn-md fa fa-trash-o" style="margin-bottom: 25px;" data-id="<?php echo $room_photo['id']; ?>"></button>
                                                                    </a> 
                                                                </div>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?> 
                                                            <b style="padding-left: 15px;">No Room Images in the database.</b> 
                                                        <?php } ?> 
                                                    </div>
                                                </div> 
                                            </div>
                                        </div> 
                                        <div class="text-right">
                                            <a href="manage-room.php?id=<?php echo $Aid; ?>"><button type="button" class="btn btn-round btn-info">Manage Rooms</button></a>
                                        </div>
                                        <input type="hidden" id="isVerifiedContactNumber" value="<?php echo $isPhoneVerified; ?>" contactnumber="<?php echo $MEMBER->contact_number; ?>">
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
        <script src="delete/js/room-photo.js" type="text/javascript"></script>
        <script src="js/add-room-photo.js" type="text/javascript"></script>
        <script src="js/display-contact-number-verification-alert.js" type="text/javascript"></script>
        <script src="plugins/Preloader/jm.spinner.js" type="text/javascript"></script>

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