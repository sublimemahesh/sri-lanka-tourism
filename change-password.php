<!DOCTYPE html>
<?php
include './class/include.php';
include './auth.php';
if (!isset($_SESSION)) {
    session_start();
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
        <link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
        <link href="css/visitor-custom.css" rel="stylesheet" type="text/css"/>
    </head>
    <body style="background-color: #FFF;">
        <!-- Our Resort Values style-->
        <?php include './header.php' ?>

        <div class="container">
            <div class="row top-bott20">
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
                <div class="col-md-9">
                    <div class="panel panel-default margin-panel">

                        <div class="panel-heading"><i class="fa fa-user"></i>Change Password</div>
                        <div class="panel-body">  <div class="body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 visitor-prof-margin text-center">  
                                            <?php
                                            if (empty($VISITOR->image_name)) {
                                                ?>
                                                <img src="upload/visitor/member.png" class="img img-responsive img-thumbnail" id="profil_pic"/>
                                                <?php
                                            } else {
                                                ?>
                                                <img src="upload/visitor/<?php echo $VISITOR->image_name; ?>" class="img img-responsive img-thumbnail" id="profil_pic"/>
                                                <?php
                                            }
                                            ?>

                                        </div>
                                        <form method="post" action="post-and-get/visitor.php" enctype="multipart/form-data">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <div class="formrow">
                                                            <input type="text" name="name" class="form-control" placeholder="Please Enter Your Full Name"  value="<?php echo $VISITOR->first_name; ?>" disabled="true">
                                                        </div>
                                                        <br>
                                                    </div>

                                                    <div class="">
                                                        <div class="bottom-top">Current Password</div>
                                                        <div class="formrow">
                                                            <input type="password" name="oldPass" class="form-control" placeholder="Enter Current Password" required="TRUE" value="">
                                                        </div>
                                                        <br>
                                                    </div>
                                                    <div class="">
                                                        <div class="bottom-top">New Password</div>
                                                        <div class="formrow">
                                                            <input type="password" name="newPass" class="form-control" placeholder="Enter New Password" required="TRUE" value="">
                                                        </div>
                                                        <br>
                                                    </div> 
                                                    <div class="">
                                                        <div class="bottom-top">Confirm Password</div>
                                                        <div class="formrow">
                                                            <input type="password" name="confPass" class="form-control" placeholder="Enter Confirm Password" required="TRUE" value="">
                                                        </div>
                                                        <br>
                                                        <br>
                                                    </div> 
                                                    <div class="top-bott50">
                                                        <div class="bottom-top">
                                                            <button name="changePassword" type="submit" class="btn btn-info center-block">Change Password</button>
                                                            <input type="hidden" id="id" value="<?php echo $VISITOR->id; ?>" name="id"> 
                                                        </div>
                                                    </div> 
                                                </div> 
                                            </div>
                                        </form>
                                    </div>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <ul class="usernavdash">
                        <li><a href="visitor-profile.php"><i class="fa fa-tachometer" aria-hidden="true"></i> My Profile</a></li>
                        <li><a href="edit-profile.php"><i class="fa fa-user" aria-hidden="true"></i> Edit Profile</a></li>
<!--                        <li><a href="manage-ads.php"><i class="fa fa-desktop" aria-hidden="true"></i> col 2</a>
                        </li><li><a href="manage-active-ads.php"><i class="fa fa-laptop" aria-hidden="true"></i> col 1</a></li>-->
                        <li><a href="change-password.php"><i class="fa fa-lock" aria-hidden="true"></i> Change Password</a></li>
                        <li><a href="post-and-get/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                    </ul>
                </div>

            </div>
        </div>


        <!-- Our Resort Values style-->  
        <?php include './footer.php' ?>

        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="post-and-get/js/visitor-profile.js" type="text/javascript"></script>
    </body> 
</html>
