<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . './auth.php');

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

        <title>My Profile - www.srilankatourism.travel</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">

        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-datepicker/css/datepicker.html" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/daterangepicker.html" />

        <!-- Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Ruda:400,700,900" type="text/css">

        <!-- Custom styles for this template --> 
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
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
                                $message = new Message($_GET['message']);
                                ?>
                                <div class="alert alert-success"><?php echo $message->description; ?></div>

                                <?php
                            }
                            ?>

                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-user"></i>   My Profile</div>
                                <div class="panel-body">  <div class="body">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="row">
                                                <div class="col-sm-9 col-md-9">
                                                    <ul class="list-group">
                                                        <li class="list-group-item"><b>Name</b> : <?php echo $MEMBER->name; ?></li> 
                                                        <li class="list-group-item"><b>User Name</b> : <?php echo $MEMBER->username; ?></li> 
                                                        <li class="list-group-item"><b>Email</b> : <?php echo $MEMBER->email; ?></li>
                                                        <li class="list-group-item"><b>Contact No</b> : <?php echo $MEMBER->contact_number; ?></li>
                                                        <li class="list-group-item"> <b>Date Of Birthday</b> : <?php echo $MEMBER->date_of_birthday; ?></li>
                                                        <li class="list-group-item"> <b>Contact Number</b> : <?php echo $MEMBER->contact_number; ?></li>
                                                        <li class="list-group-item"> <b>Driving Licence Number</b> : <?php echo $MEMBER->driving_licence_number; ?></li>
                                                        <li class="list-group-item"> <b>Home Address</b> : <?php echo $MEMBER->home_address; ?></li>
                                                        <li class="list-group-item"> <b>City</b> :
                                                            <?php
                                                            $CITY = new City($MEMBER->city);
                                                            echo $CITY->name;
                                                            ?>
                                                        </li>
                                                        <!--<li class="list-group-item"> <b>Last Login</b> : </li>--> 
                                                    </ul>
                                                </div>

                                                <div class="col-sm-3 col-md-3">  
                                                    <?php
                                                    $MEMBER = new Member($_SESSION["id"]);
                                                    if (empty($MEMBER->profile_picture)) {
                                                        ?>
                                                        <img src="../upload/member/member.png" class="img img-responsive img-thumbnail" id="profil_pic"/>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <img src="../upload/member/<?php echo $MEMBER->profile_picture; ?>" class="img img-responsive img-thumbnail" id="profil_pic"/>
                                                        <?php
                                                    }
                                                    ?>
                                                    <form class="form-horizontal"  method="post" enctype="multipart/form-data" id="upForm">
                                                        <input type="file" name="pro-picture" id="pro-picture" />
                                                        <input type="hidden" name="upload-profile-image" id="upload-profile-image"/>
                                                        <input type="hidden" name="member" id="member" value="<?php echo $MEMBER->id; ?>"/>
                                                    </form>
                                                </div>

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
        <script src="js/profile.js" type="text/javascript"></script>
        <script>
            //custom select box

            $(function () {
                $('select.styled').customSelect();
            });

        </script>

    </body>

</html>
