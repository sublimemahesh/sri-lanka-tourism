<!DOCTYPE html>
<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$TOUR_PACKAGE = new TourPackage($id);
$TOUR_SUB_PHOTO = new TourSubSectionPhoto(NULL);
$tour_dates = TourSubSection::GetTourSubSectionByTourPackage($id);
?> 
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Tour Package Images || My Account || www.srilankatourism.travel</title>

        <!-- Bootstrap core CSS -->
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
            .form-horizontal {
                padding-bottom: 10px;
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
                                <div class="panel-heading">
                                    <i class="fa fa-save"></i>
                                    Manage Tour Itinerary - <?php echo $TOUR_PACKAGE->name; ?>
                                </div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 
                                                <!--                                                <form class="form-horizontal"  method="post" action="#" enctype="multipart/form-data" id="form-tours">-->
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                                                    <div class="body">
                                                        <div class="row clearfix">
                                                            <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                                                <div class="panel-group" role="tablist" aria-multiselectable="true">
                                                                    <?php
                                                                    foreach ($tour_dates as $key => $date) {
                                                                        ?>
                                                                        <form class="form-horizontal"  method="post" action="#" enctype="multipart/form-data" id="form-tours-<?php echo $date['sort']; ?>">
                                                                            <div class="panel panel-default">
                                                                                <a role="button">
                                                                                    <div class="panel-heading tab-panel-heading" role="tab" id="heading-<?php echo $date['sort']; ?>">
                                                                                        <h4 class="panel-title">
                                                                                            Day <?php echo $date['sort']; ?>
                                                                                        </h4>
                                                                                    </div>
                                                                                </a>
                                                                                <div id="collapse-<?php echo $date['sort']; ?>" class="tour-dates panel-collapse collapse <?php
                                                                                if ($key === 0) {
                                                                                    echo 'in';
                                                                                }
                                                                                ?>" role="tabpanel" aria-labelledby="heading-<?php echo $date['sort']; ?>" subid="<?php echo $date['id']; ?>" sort="<?php echo $date['sort']; ?>">
                                                                                    <div class="panel-body">

                                                                                        <div class="col-md-12">
                                                                                            <div class="bottom-top">
                                                                                                <label for="title">Title</label>
                                                                                            </div>
                                                                                            <div class="formrow">
                                                                                                <input type="text" id="title-<?php echo $date['sort']; ?>" class="form-control title" placeholder="Enter Title" autocomplete="off" name="title" required="true">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <div class="bottom-top">
                                                                                                <label for="description">Description</label>
                                                                                            </div>
                                                                                            <div class="formrow">
                                                                                                <textarea type="text" id="description-<?php echo $date['sort']; ?>" name="description" class="form-control description" placeholder="Please Enter Description"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <div class="bottom-top col-md-2">
                                                                                                <div class="formrow">
                                                                                                    <div class="uploadphotobx" id="uploadphotobx"> 
                                                                                                        <i class="fa fa-upload" aria-hidden="true"></i>
                                                                                                        <label class="uploadBox">Click here to Upload photo
                                                                                                            <input type="file" name="tour-sub-picture" id="tour-sub-picture-<?php echo $date['id']; ?>" class="tour-sub-picture" sort="<?php echo $date['sort']; ?>" value="" disabled="">
                                                                                                            <input type="hidden" name="upload-tour-sub-image" id="upload-tour-sub-image-<?php echo $date['sort']; ?>" value="TRUE"/>
                                                                                                            <input type="hidden"  name="sort" id="sort" value="<?php echo $date['sort']; ?>"/>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>


                                                                                            </div>
                                                                                            <div id="image-list-<?php echo $date['id']; ?>" class="image-list"></div>
                                                                                        </div>

                                                                                        <div class="col-md-6 col-xs-6 col-sm-6 text-left">
                                                                                            <a role="button" id="step-prev-<?php echo $date['sort'] - 1; ?>" class="btn btn-info tab-prev-button <?php
                                                                                            if ($key === 0) {
                                                                                                echo 'hidden';
                                                                                            }
                                                                                            ?>" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-<?php echo $date['sort']; ?>" sort="<?php echo $date['sort']; ?>">
                                                                                                << Previous
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-xs6 col-sm-6 text-right <?php
                                                                                        if (count($tour_dates) == $date['sort']) {
                                                                                            echo 'hidden';
                                                                                        } else {
                                                                                            echo 'visible';
                                                                                        }
                                                                                        ?>">
                                                                                            <a role="button" id="step-<?php echo $date['sort']; ?>" class="btn btn-info tab-next-button" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-<?php echo $date['sort']; ?>" sort="<?php echo $date['sort']; ?>">
                                                                                                Next >>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-xs-6 col-sm-6 text-right <?php
                                                                                        if (count($tour_dates) == $date['sort']) {
                                                                                            echo 'visible';
                                                                                        } else {
                                                                                            echo 'hidden';
                                                                                        }
                                                                                        ?>">
                                                                                            <div class="bottom-top">
                                                                                                <input type="hidden" id="oldDis" value=""/>

                                                                                                <input type="hidden" id="member" name="member" value="<?php echo $_SESSION['id']; ?>"/>
                                                                                                <input type="hidden" id="tour" name="tour" value="<?php echo $id; ?>"/>
                                                                                                <input type="hidden" id="toursubsection" name="toursubsection" value="<?php echo $date['id']; ?>"/>
                                                                                                <input type="hidden" id="tourdates" name="tourdates" value="<?php echo count($tour_dates); ?>"/>
                                                                                                <button id="create" name="add-transports" type="submit" class="btn btn-info tab-next-create" sort="<?php echo $date['sort']; ?>">Save All Details</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                        <?php
                                                                    }
                                                                    ?>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div> 
                                                <!--</form>-->
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

<!--        <script type="text/javascript" src="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-datepicker/js/bootstrap-datepicker.html"></script>
        <script type="text/javascript" src="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/date.html"></script>
        <script type="text/javascript" src="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/daterangepicker-2.html"></script>-->
        <script src="assets/plugins/jquery-steps/jquery.steps.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <!--<script src="js/post-transport-image.js" type="text/javascript"></script>-->
        <script src="assets/js/form-component.js"></script>    
        <script src="assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <script src="delete/js/tour-sub-section.js" type="text/javascript"></script>
        <script src="js/post-tour-package-images.js" type="text/javascript"></script>
        <script src="js/tour-subsection.js" type="text/javascript"></script>
        <script>
            //custom select box

//            $(function () {
//                $('select.styled').customSelect();
//            });

        </script>
        <script src="assets/tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
            $(document).ready(function () {
                var tourdates = $('#tourdates').val();
                var i;
                for (i = 1; i <= tourdates; i++) {
                    tinymce.init({
                        selector: "#description-" + i,
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
                }
            });


        </script>
    </body>
</html>