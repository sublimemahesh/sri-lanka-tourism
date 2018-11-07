<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$OFFER = new Offer($id);
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

        <title>Edit Offer - www.srilankatourism.travel</title>

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
                                <div class="panel-heading"><i class="fa fa-pencil"></i> Edit Offer - <?php echo $OFFER->title; ?></div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 

                                                <form class="form-horizontal" method="post" action="post-and-get/offer.php" enctype="multipart/form-data"> 
                                                    <div class="col-md-12">
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="type">Type</label>
                                                            </div>
                                                            <div class="">
                                                                <select class="form-control" name="type">
                                                                    <option <?php
                                                                    if ($OFFER->type == 1) {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="1">Taxi</option>
                                                                    <option <?php
                                                                    if ($OFFER->type == 2) {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="2">Tours</option>
                                                                    <option <?php
                                                                    if ($OFFER->type == 3) {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="3">Hotel</option>
                                                                </select>
                                                            </div>
                                                            <div class="">
                                                                <div class="bottom-top">
                                                                    <label for="name">Title</label>
                                                                </div>
                                                                <div class="">
                                                                    <input type="text" id="title" name="title" value="<?php echo $OFFER->title; ?>" class="form-control" placeholder="Please enter title">
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <div class="bottom-top">
                                                                    <label for="picture_name">Picture</label>
                                                                </div>
                                                                <div class="">
                                                                    <input type="file" id="image_name" class="form-control" name="image_name" value="<?php echo $OFFER->image_name; ?>">
                                                                    <img src="../upload/offer/<?php echo $OFFER->image_name; ?>" id="image" class="view-edit-img img img-responsive img-thumbnail" alt="old image">
                                                                    <input type="hidden" id="oldImageName" value="<?php echo $OFFER->image_name; ?>" name="oldImageName"/>
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <div class="bottom-top">
                                                                    <label for="url">URL</label>
                                                                </div>
                                                                <div class="">
                                                                    <input type="text" id="url" value="<?php echo $OFFER->url; ?>" class="form-control" placeholder="Please enter URL" autocomplete="off" name="url">
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <div class="bottom-top">
                                                                    <label for="price">Price(USD)</label>
                                                                </div>
                                                                <div class="">
                                                                    <input type="text" id="price" value="<?php echo $OFFER->price; ?>" class="form-control" placeholder="Please enter price" autocomplete="off" name="price">
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <div class="bottom-top">
                                                                    <label for="discount">Discount(%)</label>
                                                                </div>
                                                                <div class="">
                                                                    <input type="text" id="discount" value="<?php echo $OFFER->discount; ?>" class="form-control" placeholder="Please enter discount" autocomplete="off" name="discount">
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <div class="bottom-top">
                                                                    <label for="description">Description</label>
                                                                </div>
                                                                <div class="">
                                                                    <textarea name="description" id="description" class="form-control" rows="5"><?php echo $OFFER->description; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="top-bott50">
                                                                <div class="bottom-top">
                                                                    <input type="hidden" id="id" value="<?php echo $OFFER->id; ?>" name="id"/>
                                                                    <input type="hidden" id="member" name="member" value="<?php echo $_SESSION['id']; ?>"/>
                                                                    <input type="hidden" id="isVerifiedContactNumber" value="<?php echo $isPhoneVerified; ?>" >
                                                                    <input type="submit" id="edit-offer" name="edit-offer" class="btn btn-info center-block" value="Edit offer"/>
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