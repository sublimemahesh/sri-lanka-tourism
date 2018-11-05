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
                                    <div class="row verification-page-details resend-code hidden">

                                        <h2 class="verification-page-title">Resend Verification Code</h2>
                                        <hr class="verification-page-hr">

                                        <div class="col-md-12">
                                            <h4>Welcome <?php echo $VISITOR->first_name; ?>,</h4>
                                            <div class="row view-number">
                                                <div class="col-md-5 text-right">
                                                    <p>Your Contact Number </p>
                                                </div>
                                                <div  class="col-md-7"><span class="contact-number"> <?php echo $VISITOR->contact_number; ?></span></div>
                                            </div>
                                            <div class="row text-center">
                                                <form action="post-and-get/visitor.php" method="post">
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
                                                <form action="post-and-get/visitor.php" method="post">
                                                    <p class="p-hidden hidden">Oophs... Your contact number does not exist.</p>
                                                    <lable>Add New Contact Number</lable>
                                                    
                                                    <input type="text" name="contactno" id="contactno" class="form-control" placeholder="+94xxxxxxxxx"  autocomplete="off">
                                                    <input type="hidden" name="id" id="id" class="" value="<?php echo $_SESSION['id']; ?>">
                                                    <input type="hidden" name="existno" id="existno" class="" value="<?php echo $VISITOR->contact_number; ?>">
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

            </div>
        </div>


        <!-- Our Resort Values style-->  
        <?php include './footer.php' ?>

        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="post-and-get/js/visitor-profile.js" type="text/javascript"></script>
        <script src="js/verify-code.js" type="text/javascript"></script>
    </body> 
</html>
