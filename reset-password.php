<!DOCTYPE html>
<?php
include './class/include.php';
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
    <body style="background-color: #d7d7d7;">
        <!-- Our Resort Values style-->
        <?php include './header.php' ?>

        <div id="login-page">
            <div class="container">

                <div class="form-login">
                    <h2 class="form-login-heading"> Reset Password Password?</h2>
                    <div class="login-wrap">
                        <?php
                        if (isset($_GET['message'])) {
                            $message = new Message($_GET['message']);
                            ?>
                            <div class="alert alert-<?php echo $message->status; ?>"><?php echo $message->description; ?></div>

                            <?php
                        }
                        ?>
                        <form class="" action="post-and-get/password-reset.php" method="POST">
                            <div class="modal-body">
                                <p><b>Please check your email</b></p>
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
                            <button class="btn btn-theme btn-block" type="submit" name="PasswordReset"><i class="fa fa-envelope-square"></i>Password Reset</button>
                        </form>
                        <hr class="hr">
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
