<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$VISITOR = new Visitor($id);
?> 
﻿<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Edit Visitor - www.srilankatourism.travel</title>

        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="css/themes/all-themes.css" rel="stylesheet" />
        <style>
            .view-edit-img {
                width: 300px;
            }
        </style>
    </head>

    <body class="theme-red">
        <?php
        include './navigation-and-header.php';
        ?>

        <section class="content">
            <div class="container-fluid"> 
                <!-- Body Copy -->
                <?php
                $vali = new Validator();

                $vali->show_message();
                ?>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Edit Visitor
                                </h2>

                            </div>
                            <div class="body row">
                                <form class="form-horizontal" method="post" action="post-and-get/visitor.php" enctype="multipart/form-data"> 
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="name">Name</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="name" class="form-control" placeholder="Enter Visitor name" autocomplete="off" name="name" required="TRUE" value="<?php echo $VISITOR->first_name; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="name">Email</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="email" id="email" class="form-control" placeholder="Enter Email" autocomplete="off" name="email" required="TRUE" value="<?php echo $VISITOR->email; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="name">Contact Number</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="contact_number" class="form-control" placeholder="Enter contact number" autocomplete="off" name="contact_number" required="TRUE" value="<?php echo $VISITOR->contact_number; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="image">Profile Picture</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="file" id="image" class="form-control" name="image" value="<?php echo $VISITOR->image_name; ?>">

                                                    <?php
                                                    if (empty($VISITOR->image_name)) {
                                                        ?>
                                                    <img src="../upload/visitor/member.png" id="image" class="view-edit-img img img-responsive img-thumbnail" name="image" alt="old image"/>
                                                        <?php
                                                    } else {

                                                        if ($VISITOR->facebookID && substr($VISITOR->image_name, 0, 5) === "https") {
                                                            ?>
                                                            <img src="<?php echo $VISITOR->image_name; ?>" id="image" class="view-edit-img img img-responsive img-thumbnail" name="image" alt="old image"/>
                                                            <?php
                                                        } elseif ($VISITOR->googleID && substr($VISITOR->image_name, 0, 5) === "https") {
                                                            ?>
                                                            <img src="<?php echo $VISITOR->image_name; ?>" id="image" class="view-edit-img img img-responsive img-thumbnail" name="image" alt="old image"/>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <img src="../upload/visitor/<?php echo $VISITOR->image_name; ?>" id="image" class="view-edit-img img img-responsive img-thumbnail" name="image" alt="old image"/>
                                                            <?php
                                                        }
                                                    }
                                                    ?>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="city">City</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group place-select">
                                                <div class="form-line">
                                                    <input type="text" id="city" name="city"  class="form-control" placeholder="Enter city" autocomplete="off" required="TRUE" value="<?php echo $VISITOR->city; ?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <div class="row clearfix">
                                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                                <input type="hidden" id="oldImageName" value="<?php echo $VISITOR->image_name; ?>" name="oldImageName"/>
                                                <input type="hidden" id="id" value="<?php echo $VISITOR->id; ?>" name="id"/>
        <!--                                            <input type="hidden" id="authToken" value="<?php echo $_SESSION["authToken"]; ?>" name="authToken"/>-->
                                                <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="update-visitor" value="update">Save Changes</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
        </section>

        <!-- Jquery Core Js -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/bootstrap/js/bootstrap.js"></script> 
        <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="plugins/node-waves/waves.js"></script>
        <script src="plugins/jquery-spinner/js/jquery.spinner.js"></script>
        <script src="js/admin.js"></script>
        <script src="js/demo.js"></script>
        <script src="tinymce/js/tinymce/tinymce.min.js"></script>
    </body>

</html>