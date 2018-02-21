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

        <title>Forgot Password - www.srilankatourism.travel</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">

    </head>

    <body>

        <div id="login-page">
            <div class="container">

                <form id="sign_in" class="form-login" action="post-and-get/change-password.php" method="POST">

                    <!-- Modal1 -->

                    <div class="">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Please check your email</h4>
                            </div>

                            <div class="modal-body">
                                <?php
                                if (isset($_GET['message'])) {

                                    $MESSAGE = New Message($_GET['message']);
                                    ?>
                                    <div class="alert alert-<?php echo $MESSAGE->status; ?>" role = "alert">
                                        <?php echo $MESSAGE->description; ?>
                                    </div>
                                    <?php
                                }
                                ?>
                                <input type="text" name="code" placeholder="Password Reset code" autocomplete="off" class="form-control placeholder-no-fix"> 
                                <br>

                                <div>
                                    <input type="password" name="password" placeholder="New Password" autocomplete="off" class="form-control placeholder-no-fix">
                                </div>
                                <br>

                                <div>
                                    <input type="password" name="confirmpassword" placeholder="Confirm Password" autocomplete="off" class="form-control placeholder-no-fix">
                                </div>
                                <br>


                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-theme" name="PasswordReset" type="submit">SIGN IN</button>
                               
                            </div>
                        </div>
                    </div>

                    <!-- modal1 -->


                </form>	  	

            </div>
        </div>

        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
        <script>
            $.backstretch("assets/img/login-bg.jpg", {speed: 500});
        </script>


    </body>

</html>


