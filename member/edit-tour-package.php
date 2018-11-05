<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($_SESSION['isPhoneVerified'])) {
    $isPhoneVerified = $_SESSION['isPhoneVerified'];
}
$TOUR_PACKAGE = new TourPackage($id);

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

        <title>Edit Tour Package - www.srilankatourism.travel</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-datepicker/css/datepicker.html" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/daterangepicker.html" />

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
                        <div class="row  top-bott20"> 
                            <?php
                            $vali = new Validator();

                            $vali->show_message();
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-pencil"></i> Edit Tour Package - <?php echo $TOUR_PACKAGE->name; ?></div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 

                                                <form class="form-horizontal" method="post" action="post-and-get/tour-package.php" enctype="multipart/form-data"> 
                                                    <div class="col-md-12">

                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="tourtype">Tour Type</label>
                                                            </div>
                                                            <div class="">
                                                                <select name="tourtype" id="tourtype" class="form-control">
                                                                    <option value="">Please select a tour type</option>
                                                                    <?php
                                                                    foreach ($types as $type) {
                                                                        ?>
                                                                        <option value="<?php echo $type['id']; ?>" <?php
                                                                        if ($TOUR_PACKAGE->tourtype === $type['id']) {
                                                                            echo 'selected';
                                                                        }
                                                                        ?>>
                                                                                    <?php echo $type['name']; ?>
                                                                        </option>
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
                                                            <div class="">
                                                                <input type="text" id="title" name="name" class="form-control" placeholder="Please Enter Name" value="<?php echo $TOUR_PACKAGE->name; ?>" >
                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="price">Price</label>
                                                            </div>
                                                            <div class="">
                                                                <input type="text" id="price" name="price" class="form-control" placeholder="Please Enter Price" value="<?php echo $TOUR_PACKAGE->price; ?>" >
                                                            </div>
                                                        </div>


                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="picture_name">Image</label>
                                                            </div>
                                                            <div class="">
                                                                <input type="file" id="image" class="form-control" value="<?php echo $TOUR_PACKAGE->picture_name; ?>"  name="picture_name">
                                                                <img src="../upload/tour-package/<?php echo $TOUR_PACKAGE->picture_name; ?>" id="image" class="view-edit-img img img-responsive img-thumbnail" name="picture_name" alt="old image" style="margin-top:7px;">
                                                            </div>
                                                        </div>


                                                        <div class="">
                                                            <input type="hidden" name="description"  value="-">
                                                        </div>

                                                        <div class="top-bott50">
                                                            <div class="bottom-top">
                                                                <input type="hidden" id="oldDis" value=""/>

                                                                <input type="hidden" id="member" name="member" value="<?php echo $_SESSION['id']; ?>"/>
                                                                <input type="hidden" id="id" value="<?php echo $TOUR_PACKAGE->id; ?>" name="id"/>
                                                                <input type="hidden" id="oldImageName" value="<?php echo $TOUR_PACKAGE->picture_name; ?>" name="oldImageName"/>
                                                                <input type="hidden" id="isVerifiedContactNumber" value="<?php echo $isPhoneVerified; ?>" >
                                                                <button name="edit-tour-package" type="submit" class="btn btn-info center-block">Change</button>
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
        <script src="js/display-contact-number-verification-alert.js" type="text/javascript"></script>
        <script>
            //custom select box

            $(function () {
                $('select.styled').customSelect();
            });

        </script>


    </body>

</html>
