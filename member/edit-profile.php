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


                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-pencil"></i> Change Your Details</div>
                                <div class="panel-body">


                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 

                                                <form method="post" action="post-and-get/member.php" enctype="multipart/form-data">
                                                    <div class="col-md-12 top-bott50">

                                                        <div class="col-md-8">

                                                            <div class="">
                                                                <div class="bottom-top">Full Name</div>
                                                                <div class="formrow">
                                                                    <input type="text" name="name" class="form-control" placeholder="Please Enter Your Full Name"  value="<?php echo $MEMBER->name; ?>" required="TRUE">
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <div class="bottom-top">User Name</div>
                                                                <div class="formrow">
                                                                    <input type="text" name="username" class="form-control" placeholder="Please Enter Your User Name" required="TRUE" value="<?php echo $MEMBER->username; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <div class="bottom-top">Email</div>
                                                                <div class="formrow">
                                                                    <input type="email" name="email" class="form-control" placeholder="Please Enter Your Email" required="TRUE" value="<?php echo $MEMBER->email; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <div class="bottom-top">Contact No</div>
                                                                <div class="formrow">
                                                                    <input type="text" name="contact_number" class="form-control" placeholder="Please Enter Your Contact Number" required="TRUE" value="<?php echo $MEMBER->contact_number; ?>">
                                                                </div>
                                                            </div> 


                                                        </div> 
                                                        <div class="col-md-4">
                                                            <div>
                                                                <div class="bottom-top">Change Your Profile Picture</div>
                                                                <div>
                                                                    <?php
                                                                    if (empty($MEMBER->profile_picture)) {
                                                                        ?>
                                                                        <img src="../upload/member/member.png" class="img img-responsive img-thumbnail"/> 
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <img src="../upload/member/<?php echo $MEMBER->profile_picture; ?>" class="img img-responsive img-thumbnail"/> 
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </div>

                                                                <input type="file" id="profile_picture" class="" name="profile_picture">

                                                                <input type="hidden" name="profile_picture_name" value="<?php echo $MEMBER->profile_picture; ?>"/> 
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="top-bott50">
                                                            <div class="bottom-top">
                                                                <input type="hidden" id="id" value="<?php echo $MEMBER->id; ?>" name="id"/>

                                                                <button type="submit" name="update" class="btn btn-info center-block">Save Changes</button>

                                                            </div>
                                                        </div> 
                                                    </div>
                                                </form>
                                                <br>

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

        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>

        <script src="assets/js/common-scripts.js"></script>

        <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

        <script src="assets/js/bootstrap-switch.js"></script>

        <script src="assets/js/jquery.tagsinput.js"></script>

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
