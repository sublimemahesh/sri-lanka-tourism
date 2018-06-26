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
        <title>Register - www.srilankatourism.travel</title>
        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
        <link href="assets/css/custom-member-login.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/h-f-styles.css" rel="stylesheet" type="text/css"/>
        <script src="https://apis.google.com/js/api:client.js"></script>
        <script src="js/google-login.js" type="text/javascript"></script>

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
                    <img class="member-img hidden-sm hidden-xs"src="../images/member/img.png">
                </div>
                <div class="col-md-6">
                    <div class="margin-l-20">
                        <div class="">
                            <p>or you can sign in via your social network</p>
                            <button class="fb btn btn-facebook social-log-buttons" id="fb-login" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
                            <button class="btn btn-twitter social-log-buttons" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
                            <button id="customBtn"  class="btn btn-danger social-log-buttons" type="submit"><i class="fa fa-google-plus"></i> Google</button>

                            <script>startApp();</script>  
                            <div class="text-danger" id="google-error-display"></div>

<!--                            <button class="btn btn-danger social-log-buttons" data-onsuccess="onSignIn" type="submit"><i class="fa fa-google-plus"></i> Google</button>-->
                        </div>
                        <hr style="margin-bottom: 0;">
                        <form method="post" id="register"> 
                            <div class="error-msg">
                                <div class="pull-left text-danger" id="message"></div>
                            </div>

                            <input id="name" name="name" placeholder="Enter Your Name" autocomplete="off" class="inputbox" type="text">
                            <input id="email" name="email" placeholder="Enter Your Email" autocomplete="off" class="inputbox" type="text">
                            <input id="cnfemail" name="cnfemail" placeholder="Confirm Email" autocomplete="off"class="inputbox" type="text">
                            <input id="contact_no" name="contact_number" placeholder="Enter Your Phone Number" autocomplete="off" class="inputbox" type="text">
                            <input id="password" name="password" placeholder="Enter Password" autocomplete="off" class="inputbox" type="password">

                            <div class="policy-container">
                                By clicking Create an account, you agree to our Terms and conditions
                            </div>
                            <input type="hidden" name="save" value="save"/>
                            <div class="buttonreg" id="btnSubmit">Create an account</div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
      <?php
                    include './index-footer.php';
              ?> 
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="js/add-member.js" type="text/javascript"></script>
        <script src="js/fb-login-scripts.js" type="text/javascript"></script>
        <script src="https://apis.google.com/js/platform.js" async defer></script>


    </body>

</html>