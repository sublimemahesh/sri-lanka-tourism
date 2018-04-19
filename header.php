
<header class="main-header"> 
    <div class="container clearfix common-pad">
        <div class="row contact-head">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contact-row">
                <div class="contact-detail">
                    <i class="fa fa-phone">
                        <span class="details">0757522415</span>
                    </i>
                    <span class="separate hidden-sm hidden-xs">||</span>
                    <i class="fa fa-envelope-o hidden-sm hidden-xs">
                        <span class="details">srilankatourism.com</span>
                    </i>
                    <?php
                    if (isset($_SESSION["login"])) {
                        ?>
                        <div class="dropdown" style="float: right;">
                            <?php
                            $VISITOR = new Visitor($_SESSION['id']);
                            if (empty($VISITOR->image_name)) {
                                ?>
                                <a href="#" >
                                    <img class="add-user img-circle" id="visitor_pic" src="upload/visitor/member.png" alt="" />
                                </a>
                                <?php
                            } else {
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
                    } else {
                        ?>
                        <a href="visitor-login.php" ><img class="add-user" src="images/icon/user(1).png" alt="" /></a>
                        <a href="visitor-register.php"><img class="index" src="images/icon/user(2).png" alt=""/></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <hr style="padding-top: -10px !important;">
        <div class="row logo-section">
            <div class="col-sm-4 col-xs-4  hidden-md hidden-lg hidden-sm visible-xs logo-col">
                <img src="images/logo-intro2.png" alt="image" class="logo"/>
            </div>
            <div class="mobile-frnd  col-sm-8 col-xs-8 hidden-md hidden-lg hidden-sm visible-xs">
                <div class="sec-header sec-header-pad">
                    <h2>Sri Lanka Tourism</h2>
                    <h3>Plan your trip to Sri Lanka</h3>
                </div>
                <div class=" icon-row">
                    <div class="sec-header sec-header-pad">
                        <ul class="social-icon"> 
                            <li><a data-original-title="Facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a data-original-title="Twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a data-original-title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a data-original-title="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                            <li> <a href="member/index.php"><div class="button-member-mobile" style="vertical-align:middle"><span>Add Your Business</span></div></a> </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="row logo-section hidden-sm hidden-xs">
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <div class="sec-header sec-header-pad">
                    <h2>Sri Lanka Tourism</h2>
                    <h3>Plan your trip to Sri Lanka</h3>
                </div>
            </div>
            <div class="col-lg-2  text-center col-md-2 hidden-sm hidden-xs">
                <img src="images/logo-intro2.png" alt="image" class="logo"/>
            </div>
            <div class="col-lg-3 col-md-3  icon-row">
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
            <div class="col-lg-2 col-md-2">
                <a href="member/index.php"><div class="button-member" style="vertical-align:middle"><span>Add Your Business</span></div></a> 
            </div>
        </div> 
        <div class="row logo-section hidden-md hidden-lg hidden-xs visible-sm"> 
            <div class=" col-sm-4">
                <div class="sec-header sec-header-pad">
                    <h2>Sri Lanka Tourism</h2>
                    <h3>Plan your trip to Sri Lanka</h3>
                </div>
            </div>
            <div class="col-sm-4">
                <img src="images/logo-intro2.png" alt="image" class="logo"/>
            </div>
            <div class="col-sm-4  icon-row">
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
        </div>
    </div>
</header>
