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

    </head>

    <body>

        <div id="login-page">
            <div class="container">

                <!-- Modal login-->
                <form class="form-horizontal form-login"  method="post" action="post-and-get/member.php" enctype="multipart/form-data"> 

                    <div class="">
                        <div class="modal-content">

                            <div class="modal-header">
                                <a href="login.php"><button type="button" class="close">&times;</button></a>
                                <h4 class="modal-title">Create Account</h4>
                            </div>
                            <div class="modal-body">
                                <?php
                                if (isset($_GET['message'])) {
                                    $message = new Message($_GET['message']);
                                    ?>
                                    <div class="alert alert-<?php echo $message->status; ?>"><?php echo $message->description; ?></div>

                                    <?php
                                }
                                ?>
                                <p>Enter your details</p>
                                <div>
                                    <input type="text" name="name" placeholder="Full Name" autocomplete="off" class="form-control placeholder-no-fix">
                                </div>
                                <br>

                                <div>
                                    <input type="text" name="username" placeholder="User Name" autocomplete="off" class="form-control placeholder-no-fix">
                                </div>
                                <br>

                                <div>
                                    <input type="email" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                                </div>
                                <br>

                                <div>
                                    <input type="email" name="cnfemail" placeholder="Confirm Email" autocomplete="off" class="form-control placeholder-no-fix">
                                </div>
                                <br>

                                <div>
                                    <input type="text" name="contact_number" placeholder="Contact Number" autocomplete="off" class="form-control placeholder-no-fix">
                                </div>
                                <br>

                                <div>
                                    <input type="password" name="password" placeholder="Enter Password" autocomplete="off" class="form-control placeholder-no-fix">
                                </div>
                                <br>

                                <div>
                                    <input type="password" name="confirm_password" placeholder="Confirm Password" autocomplete="off" class="form-control placeholder-no-fix">
                                </div>
                                <br>

                                <div class="formrow">
                                    <input type="checkbox" value="agree text c" name="cagree">
                                    Remember Me
                                </div>

                            </div>
                            <div class="modal-footer">
                                <input class="btn btn-theme" type="submit" value="Register" name="register">
                            </div>
                        </div>
                    </div>

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


