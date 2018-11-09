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
    </head>

    <body style="background-color: #d7d7d7;">
        <div class="header-base">
            <div class="container">
                <div class="col-md-6">
                    <img class="memeber-hed-logo hidden-sm hidden-xs" src="../images/logo-intro2.png">
                </div>
                <div class="col-md-6">
                    <form action="post-and-get/member.php" method="POST">
                        <div class="col-md-5">
                            <div class="member-reg-login-container">
                                <div class="">Email Address<br>
                                    <input class="member-log-txtbox" name="useremail" autocomplete="false" placeholder="Email address" type="email" required="true"><br>
                                    <input type="checkbox">keep me logged in
                                </div>
                            </div>

                        </div>
                        <div class="col-md-5">
                            <div class="member-reg-login-container">
                                <div class="">Password<br>
                                    <input class="member-log-txtbox" name="password" type="password" placeholder="Password"required="true"><br>
                                    <div class="forget-password-link">
                                        <a href="forgot-password.php"> <p>Forgotten your password?</p></a>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="col-md-2">
                            <div class="member-login-btn-container">
                                <input class="btn btn-sm member-login-btn" name="login" value="Login"type="submit">
                            </div>

                        </div>

                    </form>
                </div>
            </div>

        </div>
        <div id="login-page">
            <div class="container">

                <div class="form-login">
                    <h2 class="form-login-heading">	
                        Forgotten Password?</h2>
                    <div class="login-wrap">
                        <?php
                        if (isset($_GET['message'])) {
                            $message = new Message($_GET['message']);
                            ?>
                            <div class="alert alert-<?php echo $message->status; ?>"><?php echo $message->description; ?></div>

                            <?php
                        }
                        ?>
                        <form class="" action="post-and-get/reset-password.php" method="POST">
                            <div class="modal-body">
                                <p><b>Enter your e-mail address below to reset your password.</b></p>
                                <input type="email" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                            </div> 
                            <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-envelope-square"></i>SEND EMAIL</button>
                        </form>
                        <hr>
                        <div class="login-social-link centered">
                            <p>or you can sign in via your social network</p>
                            <button class="fb btn btn-facebook social-log-buttons-1" id="fb-login" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
                            <button class="btn btn-twitter social-log-buttons-1" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
                            <button class="btn btn-danger social-log-buttons-1" type="submit"><i class="fa fa-google-plus"></i> Google</button>
                        </div>
                        <div class="registration">
                            Don't have an account yet?<br/>
                            <label class="checkbox">
                                <a class="create-account" href="login.php"> Create an account</a>

                            </label>
                        </div>

                    </div>
                    <div>	  

                    </div>
                </div>
            </div>
        </div>
        <div class="login-footer">
        </div>
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>

        <script src="js/fb-login-scripts.js" type="text/javascript"></script>

    </body>

</html>
