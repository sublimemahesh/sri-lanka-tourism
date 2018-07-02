<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$MEMBER = new Member($_SESSION['id']);

$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
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

        <title>Edit Profile - www.srilankatourism.travel</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-datepicker/css/datepicker.html" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/daterangepicker.html" />
        <link href="assets/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
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
        <div class="loading" id="loading">Loading&#8230;</div>
        <section id="container" >

            <?php
            include './header-nav.php';
            ?>
            <!--main content start-->
            <section id="main-content">
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="row top-bott20">
                            <?php
                            if (isset($_GET['message'])) {

                                $MESSAGE = New Message($_GET['message']);
                                ?>
                                <div class="alert alert-<?php echo $MESSAGE->status; ?>" role = "alert">
                                    <?php echo $MESSAGE->description; ?>
                                </div>
                                <?php
                            }
                            ?>

                            <?php
                            $vali = new Validator();

                            $vali->show_message();
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-pencil"></i>Manage Your Driving License Photos</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 

                                                <div class="col-md-12 top-bott50">
                                                    <div class="col-md-6">
                                                        <div>
                                                            <div class="bottom-top">Front side of your driving license</div>
                                                            <?php
                                                            if (empty($MEMBER->licence_front)) {
                                                                ?>
                                                                <img src="images/front.jpg" class="img img-responsive" style="width: 100%" id="front_pic"/>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <img src="../upload/transport/licence/<?php echo $MEMBER->licence_front; ?>" class="img img-responsive" id="front_pic"/>
                                                                <?php
                                                            }
                                                            ?>
                                                            <form class="form-horizontal"  method="post" enctype="multipart/form-data" id="frontForm">
                                                                <input type="file" name="front-picture" id="front-picture" />
                                                                <input type="hidden" name="upload-front-image" id="upload-front-image"/>
                                                                <input type="hidden" name="member" id="member" value="<?php echo $MEMBER->id; ?>"/>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div>
                                                            <div class="bottom-top">Back side of your driving licence</div>
                                                            <?php
                                                            if (empty($MEMBER->licence_back)) {
                                                                ?>
                                                                <img src="images/back.jpg" class="img img-responsive" style="width: 100%" id="back_pic"/>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <img src="../upload/transport/licence/<?php echo $MEMBER->licence_back; ?>" class="img img-responsive" id="back_pic"/>
                                                                <?php
                                                            }
                                                            ?>
                                                            <form class="form-horizontal"  method="post" enctype="multipart/form-data" id="backForm">
                                                                <input type="file" name="back-picture" id="back-picture" />
                                                                <input type="hidden" name="upload-back-image" id="upload-back-image"/>
                                                                <input type="hidden" name="member" id="member" value="<?php echo $MEMBER->id; ?>"/>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-right">
                                                  <a href="<?= $previous ?>"><div name="create" class="btn btn-info">Continue > ></div> </a>
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
        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>

        <script src="assets/js/common-scripts.js"></script>

        <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

        <script src="assets/js/bootstrap-switch.js"></script>

        <script src="assets/js/jquery.tagsinput.js"></script>

        <script type="text/javascript" src="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-datepicker/js/bootstrap-datepicker.html"></script>
        <script type="text/javascript" src="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/date.html"></script>
        <script type="text/javascript" src="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/daterangepicker-2.html"></script>

        <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>

        <script src="assets/js/form-component.js"></script>    
        <script src="js/licence.js" type="text/javascript"></script>
    </body>

</html>
