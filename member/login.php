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

    </head>

    <body>

        <div id="login-page">
            <div class="container">

                <form class="form-login" action="">
                    <h2 class="form-login-heading">sign in now</h2>
                    <div class="login-wrap">
                        <input type="text" class="form-control" placeholder="User ID" autofocus>
                        <br>
                        <input type="password" class="form-control" placeholder="Password">
                        <label class="checkbox">
                            <span class="pull-right">
                                <a data-toggle="modal" href="login.html#myModal1"> Forgot Password?</a>

                            </span>
                        </label>
                        <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                        <hr>

                        <div class="login-social-link centered">
                            <p>or you can sign in via your social network</p>
                            <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
                            <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
                        </div>
                        <div class="registration">
                            Don't have an account yet?<br/>
                            <label class="checkbox">
                                <a data-toggle="modal" href="login-or-register.php#myModal"> Create an account</a>

                                </a>
                            </label>
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


