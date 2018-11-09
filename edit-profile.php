<!DOCTYPE html>
<?php
include './class/include.php';
include './auth.php';
if (!isset($_SESSION)) {
    session_start();
}
$VISITOR = new Visitor($_SESSION['id']);
if (isset($_SESSION['isPhoneVerified'])) {
    $isPhoneVerified = $_SESSION['isPhoneVerified'];
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
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet"> 
        <link href="css/loading.css" rel="stylesheet" type="text/css"/>
        <style>
            .alert {
                margin-bottom: 0px;
            }
        </style>
    </head>
    <div class="loading" id="loading">Loading&#8230;</div>
    <body style="background-color: #FFF;">
        <!-- Our Resort Values style-->
        <?php include './header.php' ?>

        <div class="container">
            <div class="row top-bott20">
                <div class="col-md-12">
                    <?php
                    $vali = new Validator();
                    $vali->show_message();
                    ?>
                </div>
                <div class="col-md-12 verified-alert"></div>
                <div class="col-md-9">
                    <div class="panel panel-default margin-panel">

                        <div class="panel-heading"><i class="fa fa-user"></i>Edit Profile</div>
                        <div class="panel-body">  <div class="">

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 visitor-prof-margin text-center">  
                                            <form class="form-horizontal"  method="post" enctype="multipart/form-data" id="upForm">
                                                <input type="file" name="pro-picture" id="pro-picture" />
                                                <input type="hidden" name="upload-profile-image" id="upload-profile-image"/>
                                                <input type="hidden" name="visitor" id="visitor" value="<?php echo $VISITOR->id; ?>"/>
                                            </form>
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
                                                    <!--Full Name-->
                                                    <div class="">
                                                        <div class="bottom-top">First Name</div>
                                                        <div class="formrow">
                                                            <input type="text" name="first_name" class="form-control" placeholder="Please Enter Your Full Name"  value="<?php echo $VISITOR->first_name; ?>" required="TRUE">
                                                        </div>
                                                    </div>
                                                    <!--User Name-->
                                                    <div class="">
                                                        <div class="bottom-top">Second Name</div>
                                                        <div class="formrow">
                                                            <input type="text" name="second_name" class="form-control" placeholder="Please Second Name" required="TRUE" value="<?php echo $VISITOR->second_name; ?>">
                                                        </div>
                                                    </div>
                                                    <!--Email-->
                                                    <div class="">
                                                        <div class="bottom-top">Email</div>
                                                        <div class="formrow">
                                                            <input type="email" name="email" class="form-control" placeholder="Please Enter Your Email" required="TRUE" value="<?php echo $VISITOR->email; ?>">
                                                            <br>
                                                        </div>
                                                    </div>
                                                    <!--Contact No-->
                                                    <div class="">
                                                        <div class="bottom-top">Contact No</div>
                                                        <div class="formrow">
                                                            <input type="text" name="contact_number" class="form-control" placeholder="Please Enter Your Contact Number" required="TRUE" value="<?php echo $VISITOR->contact_number; ?>">
                                                        </div>
                                                    </div> 
                                                    <div class="">
                                                        <div class="bottom-top">Address</div>
                                                        <div class="formrow">
                                                            <input type="text" name="address" class="form-control" placeholder="Please Enter your Address" required="TRUE" value="<?php echo $VISITOR->address; ?>">
                                                        </div>
                                                    </div> 
                                                    <!--Date Of Birthday-->
                                                    <div class="">
                                                        <div class="bottom-top">City</div>
                                                        <div class="formrow">
                                                            <input type="text" name="city" class="form-control" placeholder="Please Enter city" required="TRUE" value="<?php echo $VISITOR->city; ?>">
                                                        </div>
                                                    </div> 

                                                </div> 
                                                <div class="row">
                                                    <div class="top-bott50">
                                                        <div class="bottom-top">
                                                            <input type="hidden" id="id" value="<?php echo $VISITOR->id; ?>" name="id"/>
                                                            <input type="hidden" id="isVerifiedContactNumber" value="<?php echo $isPhoneVerified; ?>" contactnumber="<?php echo $VISITOR->contact_number; ?>">
                                                            <button type="submit" name="update" class="btn btn-info center-block">Save Changes</button>
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
                        <li><a href="change-password.php"><i class="fa fa-lock" aria-hidden="true"></i> Change Password</a></li>
                        <li><a href="visitor-message.php"><i class="fa fa-comment" aria-hidden="true"></i> Messages</a></li>
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
        <script src="js/display-contact-number-verification-alert.js" type="text/javascript"></script>
    </body> 
</html>
