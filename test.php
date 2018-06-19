<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sri Lanka || Tourism</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/owl.carousel.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link href="css/search.css" rel="stylesheet" type="text/css"/>
        <link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet"> 
        <link href="css/price-range/normalize.css" rel="stylesheet" type="text/css"/>
        <link href="css/price-range/ion.rangeSlider.css" rel="stylesheet" type="text/css"/>
        <link href="css/price-range/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css"/>
        <link href="css/index-accommodation-all.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>      

        <div class="container-fluid h-st1" >
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="pull-left">
                            <div class="contact-detail">
                                <i class="fa fa-phone">
                                    <span class="details">0757522415</span>
                                </i>
                                <span class="separate hidden-sm hidden-xs">||</span>
                                <i class="fa fa-envelope-o hidden-sm hidden-xs">
                                    <span class="details">srilankatourism.com</span>
                                </i>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_SESSION["login"])) {
                        ?>
                        <div class="dropdown" style="float: right;">
                            <?php
                            $VISITOR = new Visitor($_SESSION['id']);
                            if (empty($VISITOR->image_name)) {
                                ?>
                                <div class="visitor-login-name">
                                    <?php echo 'Hi ' . $VISITOR->first_name . '..'; ?>
                                </div>
                                <img class="img-circle add-user-logged" id="visitor_pic" src="upload/visitor/member.png" alt="" />
                                <div class="dropdown-content">
                                    <a href="visitor-profile.php">
                                        <i class="fa fa-user"></i>
                                        My profile
                                    </a>
                                    <a href="post-and-get/logout.php">
                                        <i class="fa fa-power-off"></i>
                                        Log out
                                    </a>
                                </div>
                            </div>
                            <?php
                        } else {
                            if ($VISITOR->facebookID && substr($VISITOR->image_name, 0, 5) === "https") {
                                ?>

                                <div class="visitor-login-name">
                                    <?php echo 'Hi ' . $VISITOR->first_name . '..'; ?>
                                </div>
                                <img class="img-circle add-user-logged" id="visitor_pic" src="<?php echo $VISITOR->image_name; ?>" alt="" />
                                <div class="dropdown-content">
                                    <a href="visitor-profile.php">
                                        <i class="fa fa-user"></i>
                                        My profile
                                    </a>
                                    <a href="post-and-get/logout.php">
                                        <i class="fa fa-power-off"></i>
                                        Log out
                                    </a>
                                </div>
                            </div>
                        <?php } else {
                            ?>
                            <div class="visitor-login-name">
                                <?php echo 'Hi ' . $VISITOR->first_name . '..'; ?>
                            </div>
                            <img class="img-circle add-user-logged" id="visitor_pic" src="upload/visitor/<?php echo $VISITOR->image_name; ?>" alt="" />
                            <div class="dropdown-content">
                                <a href="visitor-profile.php">
                                    <i class="fa fa-user"></i>
                                    My profile
                                </a>
                                <a href="post-and-get/logout.php">
                                    <i class="fa fa-power-off"></i>
                                    Log out
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                }
            } else {
                ?>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="pull-right">
                    <a href="visitor-login.php" ><img class="add-user" src="images/icon/user(1).png" alt="" /></a>
                    <a href="visitor-register.php"><img class="user-t" src="images/icon/user(2).png" alt="" /></a>
                </div>
            </div>
        </div>
        <hr style="padding-top: -10px !important;">
        <div class=" hidden-sm hidden-xs " >
            <div class="col-md-5 p-o">
                <div class="sec-header sec-header-pad">
                    <a class="head-link-hover" href="index.php">
                        <h2>Sri Lanka Tourism</h2>
                        <h3>Plan your trip to Sri Lanka</h3>
                    </a>
                </div>
            </div>
            <div class="hidden-md hidden-lg">
                <div class="sec-header sec-header-pad">
                    <a class="head-link-hover" href="index.php">
                        <h2>Sri Lanka Tourism</h2>
                        <h3>Plan your trip to Sri Lanka</h3>
                    </a>
                </div>
            </div>
            <div class="col-md-2 ">
                <a href="index.php">
                    <img src="images/logo-intro2.png" alt="image" class="logo" id="logo1"/>  
                </a>
            </div>

            <div class="col-md-3">
                <div class="sec-header sec-header-pad">
                    <ul class="social-icon">
                        <h4>Follow us</h4>
                        <a data-original-title="Facebook" href="#"><i class="fa fa-facebook"></i></a>
                        <a data-original-title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                        <a data-original-title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                        <a data-original-title="instagram" href="#"><i class="fa fa-instagram"></i></a>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="sec-header sec-header-pad ">
                    <ul>
                        <li> 
                            <a class="head-link-hover" href="member/index.php">
                                <div class="c-button-member-mobile add-your" >
                                    <span>Add Your Business</span>
                                </div>
                            </a>
                        </li>
                    </ul> 
                </div>
            </div>

        </div>
        <div class=" hidden-lg hidden-md visible-sm visible-xs">
            <div class="row">
                <div class=" col-xs-4 col-sm-4 p-o">
                    <a href="index.php">
                        <img src="images/logo-intro2.png" alt="image" class="logo"/>  
                    </a>
                </div>
                <div class="col-xs-8 col-sm-8 p-o">

                    <div class="sec-header sec-header-pad c-sec-header-pad">
                        <a class="head-link-hover" href="index.php">
                            <h2>Sri Lanka Tourism</h2>
                            <h3>Plan your trip to Sri Lanka</h3>
                        </a>
                        <br>
                        <div class="c-padding">
                            <h4 class="hidden-sm hidden-xs">Follow us</h4>
                            <a data-original-title="Facebook" href="#"><i class="fa fa-facebook"></i></a>
                            <a data-original-title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                            <a data-original-title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                            <a data-original-title="instagram" href="#"><i class="fa fa-instagram"></i></a>

                            <a href="member/index.php">
                                <div class="c-button-member-mobile add-your" >
                                    <span>Add Your Business</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
