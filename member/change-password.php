<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$MEMBER = new Member($_SESSION['id']);
?> 
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Edit Profile - www.srilankatourism.travel</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-datepicker/css/datepicker.html" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/daterangepicker.html" />

        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <style>
            .img-thumbnail {
                max-width: 50% !important;
            }
        </style>
    </head> 
    <body> 
        <section id="container" > 
            <?php
            include './header-nav.php';
            ?>
            <!--main content start-->
            <section id="main-content">
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="row  top-bott20"> 
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

                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-pencil"></i> Change Password</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 

                                                <form method="post" action="post-and-get/change-password.php">
                                                    <div class="col-md-12">
                                                        <div class="">
                                                            <div class="bottom-top">User name</div>
                                                            <div class="formrow">
                                                                <input type="text" name="username" class="form-control" placeholder="Please Enter Your Full Name"  value="<?php echo $MEMBER->username; ?>" disabled="true">
                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <div class="bottom-top">Current Password</div>
                                                            <div class="formrow">
                                                                <input type="password" name="oldPass" class="form-control" placeholder="Enter Current Password" required="TRUE" value="">
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div class="bottom-top">New Password</div>
                                                            <div class="formrow">
                                                                <input type="password" name="newPass" class="form-control" placeholder="Enter New Password" required="TRUE" value="">
                                                            </div>
                                                        </div> 
                                                        <div class="">
                                                            <div class="bottom-top">Confirm Password</div>
                                                            <div class="formrow">
                                                                <input type="password" name="confPass" class="form-control" placeholder="Enter Confirm Password" required="TRUE" value="">
                                                            </div>
                                                        </div> 
                                                        <div class="top-bott50">
                                                            <div class="bottom-top">
                                                                <input type="hidden" id="oldDis" value=""/>

                                                                <input type="hidden" id="memeberId" name="memeberId" value="fds"/>
                                                                <button name="changePassword" type="submit" class="btn btn-info center-block">Change Password</button>
                                                                <input type="hidden" id="id" value="<?php echo $MEMBER->id; ?>" name="id"> 
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
                    </div>
                </div>
            </section>




            <?php
            include './footer.php';
            ?>
        </section>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


        <!--common script for all pages-->
        <script src="assets/js/common-scripts.js"></script>

        <!--script for this page-->
        <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

        <!--custom switch-->
        <script src="assets/js/bootstrap-switch.js"></script>

        <!--custom tagsinput-->
        <script src="assets/js/jquery.tagsinput.js"></script>

        <!--custom checkbox & radio-->

        <script type="text/javascript" src="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-datepicker/js/bootstrap-datepicker.html"></script>
        <script type="text/javascript" src="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/date.html"></script>
        <script type="text/javascript" src="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/daterangepicker-2.html"></script>

        <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>


        <script src="assets/js/form-component.js"></script>    


        <script>
            //custom select box

            $(function () {
                $('select.styled').customSelect();
            });

        </script>

    </body>

</html>
