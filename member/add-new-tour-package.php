<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$TOURTYPES = new TourType(NULL);
$types = $TOURTYPES->all();

?> 
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Add New Tour Package|| My Account || www.srilankatourism.travel</title>

        <link href="assets/css/bootstrap.css" rel="stylesheet">

        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-datepicker/css/datepicker.html" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/daterangepicker.html" />

        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
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
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="row  top-bott20"> 

                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-pencil"></i> Create Tour Package</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 
                                                <form class="form-horizontal"  method="post" action="post-and-get/tour-package.php" enctype="multipart/form-data"> 
                                                    <div class="col-md-12">
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="tourtype">Tour Type</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <select name="tourtype" id="tourtype" class="form-control">
                                                                    <option>Please select a tour type</option>
                                                                    <?php
                                                                    foreach ($types as $type) {
                                                                        ?>
                                                                        <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="name">Name</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <input type="text" id="name" name="name" class="form-control" placeholder="Please Enter Title">
                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="price">Price</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <input type="text" id="price" class="form-control" placeholder="Enter price" autocomplete="off" name="price">
                                                            </div>

                                                        </div>

                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="picture_name">Picture</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <input type="file" id="picture_name" class="form-control" name="picture_name">
                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="description">Description</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <textarea type="text" id="description" name="description" class="form-control" placeholder="Please Enter Description"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="top-bott50">
                                                            <div class="bottom-top">
                                                                <input type="hidden" id="member" name="member" value="<?php echo $_SESSION['id']; ?>"/>
                                                                <input type="submit" id="create" name="add-tour-package" class="btn btn-info center-block" value="Add tour package"/>
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

        <script src="js/add-new-tour-package.js" type="text/javascript"></script>
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
