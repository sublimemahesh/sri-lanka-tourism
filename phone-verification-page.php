<!DOCTYPE html>
<?php
include './class/include.php';

if (!isset($_SESSION)) {
    session_start();
}
if (!Visitor::authenticate()) {
    redirect('visitor-login.php');
}
$VISITOR = new Visitor($_SESSION['id']);
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Verify Contact Number || Sri Lanka || Tourism</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link href="css/search.css" rel="stylesheet" type="text/css"/>
        <link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
        <link href="css/visitor-custom.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet"> 
        <link href="css/loading.css" rel="stylesheet" type="text/css"/>
    </head>
    <div class="loading" id="loading">Loading&#8230;</div>
    <body style="background-color: #FFF;">
        <!-- Our Resort Values style-->
        <?php include './header.php' ?>

        <div class="container">
            <div class="row top-bott20">

                <div class="col-md-12">
                    <div class="panel panel-default margin-panel">

                        <div class="panel-body">  <div class="">
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
                                <div class="col-md-12">
                                    <div class="row verification-page-details">
                                        <h2 class="verification-page-title">Verification of Your Contact Number</h2>
                                        <hr class="verification-page-hr">

                                        <div class="col-md-12">
                                            <h4>Welcome <?php echo $VISITOR->first_name; ?>,</h4>
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

            </div>
        </div>


        <!-- Our Resort Values style-->  
        <?php include './footer.php' ?>

        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="post-and-get/js/visitor-profile.js" type="text/javascript"></script>
    </body> 
</html>
