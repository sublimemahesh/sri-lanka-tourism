<!DOCTYPE html>
<?php
include './class/include.php';

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION["vislogin"])) {
    redirect('visitor-profile.php');
}

$back_url = '';
if (isset($_SESSION["back_url"])) {
    $back_url = $_SESSION["back_url"];
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
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet"> 
        <link href="css/visitor-custom.css" rel="stylesheet" type="text/css"/>
        <script src="https://apis.google.com/js/api:client.js"></script>
        <script src="js/google-login.js" type="text/javascript"></script>
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

                            <input type="hidden" class="form-control"  name="back_url" value="<?php echo $back_url ?>">


                            <button class="btn btn-theme btn-block"  name="login" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                            <hr class="hr">
                        </form>
                        <div class="login-social-link centered">
                            <p class="font-padding">or you can sign in via your social network</p>
                            <button class="fb btn btn-facebook social-log-buttons-1" id="fb-login" type="submit"><i class="fa fa-facebook font-fb"></i> Facebook</button>

                            <button id="customBtn"  class="btn btn-danger social-log-buttons-1" type="submit"><i class="fa fa-google-plus"></i> Google</button>

                            <script>startApp();</script>  
                            <div class="text-danger" id="google-error-display"></div>
                        </div>
                        <hr class="hr">
                        <div class="registration create-ac-register">
                            <p class="font-padding">Don't have an account yet?</p>
                            <label class="checkbox">
                                <a class="link create-account" href="visitor-register.php"> Create an account</a>
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
