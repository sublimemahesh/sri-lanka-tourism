<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from www.blacktie.co/demo/dashgum/form_component.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Feb 2018 07:15:01 GMT -->
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
                        <div class="row">
                            <div class="top-bott20">
                                <h2><i class="fa fa-pencil"></i> Change Your Details</h2>
                            </div>

                            <div class="body">
                                <div class="userccount">
                                    <div class="formpanel"> 

                                        <div>
                                            <div class="col-md-4 col-md-offset-4">
                                                <div class="bottom-top">Change Your Profile Picture</div>
                                                <img src="../upload/visitor/-574108304_190629032602_1518674405_n.jpg" class="img img-responsive img-thumbnail"/> 

                                                <form class="form-horizontal"  method="post" enctype="multipart/form-data" id="upForm">
                                                    <input type="file" name="pro-picture" id="pro-picture" />
                                                    <input type="hidden" name="upload-profile-image" id="upload-profile-image"/>
                                                    <input type="hidden" name="member" id="member" value="<?php echo $MEMBER->id; ?>"/>
                                                </form>
                                            </div>
                                        </div>

                                        <form method="post" action="post-and-get/member.php">
                                            <div class="col-md-12">
                                                <div class="">
                                                    <div class="bottom-top">Full Name</div>
                                                    <div class="formrow">
                                                        <input type="text" name="name" class="form-control" placeholder="Please Enter Your Full Name"  value="Mayomi" required="TRUE">
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="bottom-top">User Name</div>
                                                    <div class="formrow">
                                                        <input type="text" name="membername" class="form-control" placeholder="Please Enter Your USername" required="TRUE" value="msg">
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="bottom-top">Email</div>
                                                    <div class="formrow">
                                                        <input type="email" name="email" class="form-control" placeholder="Please Enter Your Email" required="TRUE" value="mayomi@gmail.com">
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="bottom-top">Contact No</div>
                                                    <div class="formrow">
                                                        <input type="text" name="contact" class="form-control" placeholder="Please Enter Your Contact Number" required="TRUE" value="0712211070">
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="bottom-top">District</div>
                                                    <div class="formrow">
                                                        <select class="form-control" name="district" id="district">
                                                            <option id="empty-dis">District</option>

                                                            <option value="vsv" selected>vbdf</option>   
                                                            <option value="vds">vsdvsv</option>   

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="bottom-top">District</div>
                                                    <div class="formrow">
                                                        <select class="form-control" name="city" id="city">
                                                            <option>City</option> 
                                                        </select>
                                                    </div>
                                                </div> 

                                                <div class="top-bott50">
                                                    <div class="bottom-top">
                                                        <input type="hidden" id="oldDis" value=""/>

                                                        <input type="hidden" id="memeberId" name="memeberId" value="fds"/>
                                                        <button type="button" class="btn btn-info center-block">UPDATE AND SAVE</button>
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
