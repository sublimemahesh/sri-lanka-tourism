<!DOCTYPE html>
<?php
include './class/include.php';

$previous = "javascript:history.go(-1)";
if (isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}

$tourid = $_GET['tourid'];
$rate = $_GET['rate'];
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
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet"> 
        <link href="css/visitor-custom.css" rel="stylesheet" type="text/css"/>


    </head>
    <body style="background-color: #d7d7d7;">
        <!-- Our Resort Values style-->
        <?php include './header.php' ?>

        <div id="login-page">
            <div class="container">

                <div class="form-login">
                    <h2 class="form-login-heading">sign in now</h2>
                    <div class="login-wrap">
                        <?php
                        if (isset($_GET['message'])) {
                            $message = new Message($_GET['message']);
                            ?>
                            <div class="alert alert-<?php echo $message->status; ?>"><?php echo $message->description; ?></div>

                            <?php
                        }
                        ?>
                        <form action="post-and-get/visitor.php" method="POST">
                            <input type="text" class="form-control" name="email" placeholder="Email address" autofocus>
                            <br>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <label class="checkbox">
                                <span class="pull-right">
                                    <a class="link" href="forget-password.php"> Forgot Password?</a>
                                </span>
                            </label>
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

                            <button class="btn btn-theme btn-block"  name="login" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                            <hr class="hr">
                        </form>
                        <div class="login-social-link centered">
                            <p class="font-padding">or you can sign in via your social network</p>
                            <button class="fb btn btn-facebook social-log-buttons-1" id="fb-login" type="submit"><i class="fa fa-facebook font-fb"></i> Facebook</button>
                            <button class="btn btn-danger social-log-buttons-1" type="submit"><i class="fa fa-google-plus"></i> Google</button>
                            <button class="btn btn-danger social-log-buttons-1" type="submit"><i class="fa fa-google-plus"></i> Google</button>
                        </div>
                        <hr class="hr">
                        <div class="registration">
                            <p class="font-padding">Don't have an account yet?</p>
                            <label class="checkbox">
                                <a class="link" href="visitor-register.php"> Create an account</a>

                            </label>
                        </div>

                    </div>
                    <div>	  

                    </div>
                </div>
            </div>
        </div>
        <!-- Our Resort Values style-->  
        <?php include './footer.php' ?>

        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="js/fb-login-scripts.js" type="text/javascript"></script>
    </body> 
</html>
