<!DOCTYPE html>
<?php
include_once(dirname(__FILE__) . '/../class/include.php');

if (!isset($_SESSION)) {
    session_start();
}
if (!Member::authenticate()) {
    redirect('login.php');
}
$MEMBER = new Member($_SESSION['id']);
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Resend Verification Code - www.srilankatourism.travel</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">

        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-datepicker/css/datepicker.html" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/daterangepicker.html" />

        <!-- Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Ruda:400,700,900" type="text/css">

        <!-- Custom styles for this template --> 
        <link href="assets/css/style.css" rel="stylesheet">

        <link href="../plugins/tel-input/build/css/intlTelInput.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style-responsive.css" rel="stylesheet">
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
                        <div class="panel panel-default margin-panel">

                            <div class="panel-body">
                                <div class="">
                                    <div class="col-md-12">
                                        <?php
                                        if (isset($_GET['message'])) {
                                            $message = new Message($_GET['message']);
                                            ?>
                                            <div class="alert alert-<?php echo $message->status; ?>"><?php echo $message->description; ?></div>

                                            <?php
                                        }
                                        ?> 
                                    </div>
                                    <div class="row verification-page-details resend-code hidden">

                                        <h2 class="verification-page-title">Resend Verification Code</h2>
                                        <hr class="verification-page-hr">

                                        <div class="col-md-12">
                                            <h4>Welcome <?php echo $MEMBER->name; ?>,</h4>
                                            <div class="row view-number">
                                                <div class="col-md-5 col-sm-5 col-xs-12 resend-contact-title">
                                                    <p>Your Contact Number </p>
                                                </div>
                                                <div  class="col-md-7 col-sm-7 col-xs-12 resend-contact-no"><span class="contact-number"> <?php echo $MEMBER->contact_number; ?></span></div>
                                            </div>
                                            <div class="row text-center">
                                                <form action="post-and-get/member.php" method="post">
                                                    <input type="hidden" name="id" id="id" class="" value="<?php echo $_SESSION['id']; ?>" autocomplete="off">
                                                    <input type="submit" name="resendCode" id="resendCode" class="btn btn-info" value="Resend Code">
                                                </form>
                                            </div>
                                            <h5>* Is this contact number incorrect? <a href="#" class="update_number">Update number</a></h5>
                                        </div>
                                    </div>

                                    <div class="row verification-page-details update-contact-number hidden">
                                        <h2 class="verification-page-title">Update Contact Number & Resend Verification Code</h2>
                                        <hr class="verification-page-hr">

                                        <div class="col-md-12">
                                            <div class="row view-number">
                                                <form action="post-and-get/member.php" method="post">
                                                    <p class="p-hidden hidden">Oophs... Your contact number does not exist.</p>
                                                    <lable>Add New Contact Number</lable>

                                                    <input type="text" name="contactno" id="contactno" class="form-control" placeholder="+94xxxxxxxxx" autocomplete="off">
                                                    <input type="hidden" name="id" id="id" class="" value="<?php echo $_SESSION['id']; ?>">
                                                    <input type="hidden" name="existno" id="existno" class="" value="<?php echo $MEMBER->contact_number; ?>">
                                                    <input type="submit" name="updatenumber" id="updatenumber" class="btn btn-danger" value="Update & Resend Code">
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
        <script src="js/verify-code.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <script src="assets/js/form-component.js"></script>    
        <script src="js/profile.js" type="text/javascript"></script>
        <script src="../plugins/tel-input/build/js/intlTelInput.js" type="text/javascript"></script>
        <script>
            $("#contactno").intlTelInput({
                autoFormat: false,
                autoHideDialCode: false
            });
        </script>
        <script>
            $(document).ready(function () {
                var width = $(window).width();

                if (width == 320) {
                    $('.country-list').css('width', '154px');
                } else if (width > 320 && width < 576) {
                    $('.country-list').css('width', '194px');
                } else if (width > 640 && width < 998) {
                    $('.country-list').css('width', '335px');
                }

            });
        </script>
        <script>
            //custom select box

            $(function () {
                $('select.styled').customSelect();
            });

        </script> 
    </body>


</html>
