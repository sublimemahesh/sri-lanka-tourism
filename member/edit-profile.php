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

                            <?php
                            $vali = new Validator();

                            $vali->show_message();
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
                                                            <!--Full Name-->
                                                            <div class="">
                                                                <div class="bottom-top">Full Name</div>
                                                                <div class="formrow">
                                                                    <input type="text" name="name" class="form-control" placeholder="Please Enter Your Full Name"  value="<?php echo $MEMBER->name; ?>" required="TRUE">
                                                                </div>
                                                            </div>
                                                            <!--User Name-->
                                                            <div class="">
                                                                <div class="bottom-top">User Name</div>
                                                                <div class="formrow">
                                                                    <input type="text" name="username" class="form-control" placeholder="Please Enter Your User Name" required="TRUE" value="<?php echo $MEMBER->username; ?>">
                                                                </div>
                                                            </div>
                                                            <!--Email-->
                                                            <div class="">
                                                                <div class="bottom-top">Email</div>
                                                                <div class="formrow">
                                                                    <input type="email" name="email" class="form-control" placeholder="Please Enter Your Email" required="TRUE" value="<?php echo $MEMBER->email; ?>">
                                                                </div>
                                                            </div>
                                                            <!--Contact No-->
                                                            <div class="">
                                                                <div class="bottom-top">Contact No</div>
                                                                <div class="formrow">
                                                                    <input type="text" name="contact_number" class="form-control" placeholder="Please Enter Your Contact Number" required="TRUE" value="<?php echo $MEMBER->contact_number; ?>">
                                                                </div>
                                                            </div> 
                                                            <!--NIC Number-->
                                                            <div class="">
                                                                <div class="bottom-top">NIC Number</div>
                                                                <div class="formrow">
                                                                    <input type="text" name="nic_number" class="form-control" placeholder="Please Enter Your NIC Number" required="TRUE" value="<?php echo $MEMBER->nic_number; ?>">
                                                                </div>
                                                            </div> 
                                                            <!--Date Of Birthday-->
                                                            <div class="">
                                                                <div class="bottom-top">Date Of Birthday</div>
                                                                <div class="formrow">
                                                                    <input type="text" name="date_of_birthday" class="form-control" placeholder="Please Enter Date Of Birthday" required="TRUE" value="<?php echo $MEMBER->date_of_birthday; ?>">
                                                                </div>
                                                            </div> 
                                                            <!--Driving Licence Number-->
                                                            <div class="">
                                                                <div class="bottom-top">Driving Licence Number</div>
                                                                <div class="formrow">
                                                                    <input type="text" name="driving_licence_number" class="form-control" placeholder="Please Enter Driving Licence Number" required="TRUE" value="<?php echo $MEMBER->driving_licence_number; ?>">
                                                                </div>
                                                            </div>
                                                            <!--Home Address-->
                                                            <div class="">
                                                                <div class="bottom-top">Home Address</div>
                                                                <div class="formrow">
                                                                    <input type="text" name="home_address" class="form-control" placeholder="Please Enter Home Address" required="TRUE" value="<?php echo $MEMBER->home_address; ?>">
                                                                </div>
                                                            </div>
                                                            <!--City-->
                                                            <div class="">
                                                                <div class="bottom-top">
                                                                    <label for="city">City</label>
                                                                </div>
                                                                <div class="formrow">
                                                                    <select class="form-control" type="text" id="city" autocomplete="off" name="city">
                                                                        <option value="<?php $MEMBER->id ?>" class="active light-c">
                                                                            <?php
                                                                            $CITY = new City($MEMBER->city);
                                                                            echo $CITY->name;
                                                                            ?>
                                                                        </option>
                                                                        <?php foreach (City::all() as $key => $city) {
                                                                            ?>
                                                                            <option value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </select>
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
