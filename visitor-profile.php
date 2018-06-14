<!DOCTYPE html>
<?php
include './class/include.php';
include './auth.php';


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
    </head>
    <div class="loading" id="loading">Loading&#8230;</div>
    <body style="background-color: #FFF;">
        <!-- Our Resort Values style-->
        <?php include './header.php' ?>

        <div class="container">
            <div class="row top-bott20">

                <div class="col-md-9">
                    <div class="panel panel-default margin-panel">
                        <div class="panel-heading"><i class="fa fa-user"></i>Visitor Profile</div>
                        <div class="panel-body">  <div class="">
                                <div class="col-md-12">
                                    <?php
                                    if (isset($_GET['message'])) {
                                        $message = new Message($_GET['message']);
                                        ?>
                                        <div class="alert alert-success"><?php echo $message->description; ?></div>

                                        <?php
                                    }
                                    ?> 
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-sm-3 col-md-4 visitor-prof-margin">  
                                            <?php
                                            if (empty($VISITOR->image_name)) {
                                                ?>
                                                <img src="upload/visitor/member.png" class="img img-responsive img-thumbnail" id="profil_pic"/>
                                                <?php
                                            } else {

                                                if ($VISITOR->facebookID && substr($VISITOR->image_name, 0, 5) === "https") {
                                                    ?>
                                                    <img src="<?php echo $VISITOR->image_name; ?>" class="img img-responsive img-thumbnail" id="profil_pic"/>
                                                <?php } else {
                                                    ?>
                                                    <img src="upload/visitor/<?php echo $VISITOR->image_name; ?>" class="img img-responsive img-thumbnail" id="profil_pic"/>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <form class="form-horizontal"  method="post" enctype="multipart/form-data" id="upForm">
                                                <input type="file" name="pro-picture" id="pro-picture" />
                                                <input type="hidden" name="upload-profile-image" id="upload-profile-image"/>
                                                <input type="hidden" name="visitor" id="visitor" value="<?php echo $VISITOR->id; ?>"/>
                                            </form>
                                        </div>
                                        <div class="col-sm-9 col-md-8">
                                            <ul class="list-group visitor-list-color">
                                                <li class="list-group-item"><b>First Name</b> : <?php echo $VISITOR->first_name; ?></li> 
                                                <li class="list-group-item"><b>Last Name</b> : <?php echo $VISITOR->second_name; ?></li> 
                                                <li class="list-group-item"><b>Email</b> : <?php echo $VISITOR->email; ?></li>
                                                <li class="list-group-item"><b>Contact No</b> : <?php echo $VISITOR->contact_number; ?></li>
                                                <li class="list-group-item"> <b>Address</b> : <?php echo $VISITOR->address; ?></li>
                                                <li class="list-group-item"> <b>City</b> : <?php echo $VISITOR->city; ?></li>
                                            </ul>
                                        </div>
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
