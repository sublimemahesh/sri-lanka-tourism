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
    <body>
        <!-- Our Resort Values style-->
        <?php include './header.php' ?>

        <div class="row background-image" style="background-image: url('images/hotel/Beach-Tours3.jpg');">
            <div class="container" style="width:350px; padding: 20px">
                <div class="col-md-12 col-sm-12 center-all">
                    <div class="tab-content">
                        <div class="row">
                            <form class="form-horizontal form-login"  method="post" action="post-and-get/password-reset.php" enctype="multipart/form-data"> 

                                <div class="modal-content">

                                    <div class="modal-header">
                                        <a href="#"><button type="button" class="close">&times;</button></a>
                                        <h4 class="modal-title">Forget Password</h4>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        if (isset($_GET['message'])) {
                                            $message = new Message($_GET['message']);
                                            ?>
                                            <div class="alert alert-<?php echo $message->status; ?>"><?php echo $message->description; ?></div>
                                        <?php }
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

                                        <div class="modal-footer">
                                            <button class="btn btn-theme" name="PasswordReset" type="submit">Reset Password</button>
                                        </div>

                                    </div>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>

            <!-- Our Resort Values style-->  
            <?php include './footer.php' ?>

            <script src="js/jquery-2.2.4.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
    </body> 
</html>
