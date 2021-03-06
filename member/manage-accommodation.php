<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$ACCOMODATION = new Accommodation(NULL);
$accommodations = $ACCOMODATION->getAccommodationByMemberId($_SESSION['id']);
$ACCOMODATION_PHOTO = new AccommodationPhoto(NULL);

if (isset($_SESSION['isPhoneVerified'])) {
    $isPhoneVerified = $_SESSION['isPhoneVerified'];
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

        <title>Manage Accommodation || My Account ||  www.srilankatourism.travel</title>

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
                            <?php
                            $vali = new Validator();
                            $vali->show_message();
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-pencil"></i>Accommodation</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 
                                                <div class="row clearfix">
                                                    <div class="col-md-3">
                                                        <div class="formrow">
                                                            <a href="add-new-accommodation.php">
                                                                <div class="uploadbox1 uploadphotobx1" id="uploadphotobx">
                                                                    <i class="fa fa-plus plus-icon" aria-hidden="true"></i>
                                                                    <label class="uploadBox">Click here to add your accommodation
                                                                    </label>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>  
                                                    <div id="image-list">
                                                        <?php
                                                        foreach ($accommodations as $key => $accommodation) {
                                                            ?>
                                                            <div class="col-md-3" style="padding-bottom: 15px" id="div_<?php echo $accommodation['id']; ?>"> 
                                                                <div class="">
                                                                    <?php
                                                                    if (count($ACCOMODATION_PHOTO) > 0) {
                                                                        foreach ($ACCOMODATION_PHOTO->getAccommodationPhotosById($accommodation['id']) as $key => $accommodation_p) {
                                                                            if ($key == 1) {
                                                                                break;
                                                                            }
                                                                            ?>
                                                                            <div class="menu-button-hover">
                                                                                <div class="dropdown">
                                                                                    <button class="dropbtn"><i class="fa fa-bars"></i></button>
                                                                                    <div class="dropdown-content text-left">
                                                                                        <a href="edit-accommodation.php?id=<?php echo $accommodation['id']; ?>"><i class="hover-menu-icon fa fa-pencil"></i>Edit</a>
                                                                                        <a href="add-accommodation-photo.php?id=<?php echo $accommodation['id']; ?>"><i class="hover-menu-icon fa fa-photo"></i>Manage Photos</a>
                                                                                        <a href="accommodation-facilities.php?id=<?php echo $accommodation['id']; ?>"><i class="hover-menu-icon fa fa-check-square"></i>Manage Facilities</a>
                                                                                        <a href="manage-room.php?id=<?php echo $accommodation['id']; ?>"><i class="hover-menu-icon fa fa-bed"></i>Manage Rooms</a>
                                                                                        <a href="#" class="menu-hover-delete-font delete-accommodation" data-id="<?php echo $accommodation['id']; ?>"><i class="hover-menu-icon fa fa-trash-o"></i>Delete</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <img class="img-responsive" src="../upload/accommodation/thumb/<?php echo $accommodation_p['image_name']; ?>">
                                                                            <?php
                                                                        }
                                                                    } else {
                                                                        ?> 
                                                                        <b style="padding-left: 15px;">No Accommodation Image.</b> 
                                                                    <?php } ?>
                                                                </div> 
                                                                <div><b>Title :</b> <?php echo $accommodation['name']; ?></div>
                                                                <div>
                                                                    <!--
                                                                                                                                        <a title="Edit Accommodation" href=""><button class="btn btn-primary btn-xs all-icon fa fa-pencil"></button>
                                                                                                                                        </a> 
                                                                                                                                        |
                                                                                                                                        <a title="Delete Accommodation">
                                                                                                                                            <button class="delete-accommodation btn btn-danger btn-xs all-icon fa fa-trash-o" ></button>
                                                                                                                                        </a> 
                                                                                                                                        |
                                                                                                                                        <a title="Add Your Accommodation Photo" href="">
                                                                                                                                            <button class="btn btn-success btn-xs all-icon fa fa-photo"></button>
                                                                                                                                        </a> 
                                                                                                                                        |
                                                                                                                                        <a title="Add Your Accommodation Facilities" href="">
                                                                                                                                            <button class="btn btn-warning btn-xs all-icon fa fa-check-square"></button>
                                                                                                                                        </a> 
                                                                                                                                                                                                            |
                                                                                                                                                                                                            <a title="Add Your Accommodation No Of Rooms" href="accommodation-room.php?id=<?php echo $accommodation['id']; ?>">
                                                                                                                                                                                                            <button class="btn btn-facebook btn-xs all-icon fa fa-th-list"></button>
                                                                                                                                                                                                            </a> 
                                                                                                                                        |
                                                                                                                                        <a title="Accommodation Rooms" href="">
                                                                                                                                            <button class="btn btn-facebook btn-xs all-icon fa fa-bed"></button>
                                                                                                                                        </a> -->
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?> 
                                                        <input type="hidden" id="isVerifiedContactNumber" value="<?php echo $isPhoneVerified; ?>" contactnumber="<?php echo $MEMBER->contact_number; ?>">
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
        <script src="js/display-contact-number-verification-alert.js" type="text/javascript"></script>
        <script src="delete/js/accommmodation.js" type="text/javascript"></script>
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
