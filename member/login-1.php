<?php
include_once(dirname(__FILE__) . '/../class/include.php');
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Login - www.srilankatourism.travel</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
        <link href="assets/css/custom-member-login.css" rel="stylesheet" type="text/css"/>
        <script src="https://apis.google.com/js/api:client.js"></script>
        <script src="js/google-login.js" type="text/javascript"></script>
    </head>

    <body style="background-color: #d7d7d7;">

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
                        <form action="post-and-get/member.php" method="POST">
                            <input type="text" class="form-control" name="useremail" placeholder="Email address" autofocus>
                            <br>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <label class="checkbox">
                                <span class="pull-right">
                                    <a href="forgot-password.php"> Forgot Password?</a>
                                </span>
                            </label>
                            <button class="btn btn-theme btn-block" name="login" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                            <hr>
                        </form>
                        <div class="login-social-link centered">
                            <p>or you can sign in via your social network</p>
                            <button class="fb btn btn-facebook social-log-buttons-1" id="fb-login" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
                              <button id="customBtn"  class="btn btn-danger social-log-buttons-1" type="submit"><i class="fa fa-google-plus"></i> Google</button>

                            <script>startApp();</script>  
                            <div class="text-danger" id="google-error-display"></div>

                           
                        </div>
                        <div class="registration">
                            Don't have an account yet?<br/>
                            <label class="checkbox">
                                <a  class="create-account" href="login.php"> Create an account</a>

                            </label>
                        </div>

                    </div>
                    <div>	  

                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>

        <script src="js/fb-login-scripts.js" type="text/javascript"></script>

    </body>

</html>