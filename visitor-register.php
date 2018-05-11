<!DOCTYPE html>
<?php
include './class/include.php';

$previous = "javascript:history.go(-1)";
if (isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
if (isset($_GET['tourid'])) {
    $tourid = $_GET['tourid'];
} elseif (isset($_GET['rate'])) {
    $rate = $_GET['rate'];
}
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sri Lanka || Tourism</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link href="css/search.css" rel="stylesheet" type="text/css"/>
        <link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
        <link href="css/visitor-custom.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet"> 
    </head>
    <body style="background-color: #efefef;">
        <!-- Our Resort Values style-->
        <?php include './header.php' ?>



        <div class="member-log-body">
            <div class="container">
                <div class="col-md-6">
                    <?php
                    if (isset($_GET['message'])) {
                        $message = new Message($_GET['message']);
                        ?>
                        <div class="alert alert-<?php echo $message->status; ?>"><?php echo $message->description; ?></div>

                        <?php
                    }
                    ?>
                    <div class="intro1 hidden-sm hidden-xs">Srilanka Tourism helps you to publish your business<br>
                    </div>
                    <img class="member-img hidden-sm hidden-xs"src="images/visitor/visitor.png">
                </div>
                <div class="col-md-6">
                    <div class="margin-l-20">
                        <div class="">
                            <p class="social-title-container">or you can sign in via your social network</p>
                            <button class="fb btn btn-facebook social-log-buttons" id="fb-login" type="submit"><i class="fa fa-facebook font-fb"></i> Facebook</button>
                            <button class="btn btn-danger social-log-buttons" type="submit"><i class="fa fa-google-plus"></i> Google</button>
                            <button class="btn btn-danger social-log-buttons" type="submit"><i class="fa fa-google-plus"></i> Google</button>
                        </div>
                        <hr class="hr" style="margin-bottom: 0;">
                        <form method="post" id="register"> 
                            <div class="error-msg">
                                <div class="pull-left text-danger" id="message"></div>
                            </div>

                            <input id="f_name" name="f_name" placeholder="Enter Your First Name" autocomplete="off" class="inputbox" type="text">
                            <input id="s_name" name="s_name" placeholder="Enter Your Second Name" autocomplete="off" class="inputbox" type="text">
                            <input id="email" name="email" placeholder="Enter Your Email" autocomplete="off" class="inputbox" type="text">
                            <input id="cnfemail" name="cnfemail" placeholder="Confirm Email" autocomplete="off"class="inputbox" type="text">
                            <input id="password" name="password" placeholder="Enter Password" autocomplete="off" class="inputbox" type="password">

                            <div class="policy-container">
                                <p>
                                    By clicking Create an account, you agree to our Terms and conditions 
                                </p>
                            </div>
                            <?php
                            if (isset($_GET['back'])) {
                                if ($_GET['back'] === 'true') {
                                    ?>
                                    <input type="hidden" class="form-control" name="back" value="<?php echo $previous; ?>">
                                    <?php
                                } elseif ($_GET['back'] === 'tour') {
                                    ?>
                                    <!--<input type="hidden" class="form-control" name="back" value="https://localhost/sri-lanka-tourism/tour-package-booking.php?id=<?php echo $tourid; ?>">-->
                                    <input type="hidden" class="form-control" name="back" value="https://www.srilankatourism.travel/tour-package-booking.php?id=<?php echo $tourid; ?>">
                                    <?php
                                } elseif ($_GET['back'] === 'transport') {
                                    ?>
                                    <!--<input type="hidden" class="form-control" name="back" value="http://localhost/sri-lanka-tourism/transport-booking.php?rate=<?php echo $rate; ?>">-->
                                    <input type="hidden" class="form-control" name="back" value="https://www.srilankatourism.travel/transport-booking.php?rate=<?php echo $rate; ?>">
                                    <?php
                                }
                            }
                            ?>
                            <input type="hidden" name="save" value="save"/>
                            <div class="buttonreg" id="btnSubmit">Create an account</div>
                        </form>
                    </div>
                </div>
            </div>

        </div>


        <?php include './footer.php' ?>

        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="js/add-visitor.js" type="text/javascript"></script>
        <script src="js/fb-login-scripts.js" type="text/javascript"></script>
    </body> 
</html>
