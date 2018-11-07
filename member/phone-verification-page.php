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

        <title>Verify Contact Number - www.srilankatourism.travel</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">

        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-datepicker/css/datepicker.html" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/daterangepicker.html" />
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet"> 
        <link href="http://fonts.googleapis.com/css?family=Ruda:400,700,900" type="text/css">
        <!-- Custom styles for this template --> 
        <link href="assets/css/style.css" rel="stylesheet">
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
                                    <div class="row verification-page-details">

                                        <h2 class="verification-page-title">Verification of Your Contact Number</h2>
                                        <hr class="verification-page-hr">

                                        <div class="col-md-12">
                                            <h4>Welcome <?php echo $MEMBER->name; ?>,</h4>
                                            <p>To verify your contact number, please enter a verification PIN that was sent your mobile device.<br />
                                                If you have not received your PIN, please contact <b>071 080 1846</b> or <b>info@srilankatourism.lk</b>.
                                            </p>

                                            <h4>Your PIN</h4>
                                            <form action="post-and-get/phone-number-verification.php" method="post">
                                                <input type="number" name="verificationPIN" id="verificationPIN" class="form-control" autocomplete="off">
                                                <input type="submit" name="submitPIN" id="submitPIN" class="btn btn-danger">
                                            </form>
                                            <div class="">
                                                <h5>Don't receive a code? <a href='resend-code.php'>Resend code now.</a></h5>
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
        <script src="js/profile.js" type="text/javascript"></script>
        <script>
            //custom select box

            $(function () {
                $('select.styled').customSelect();
            });

        </script> 
    </body>


</html>
