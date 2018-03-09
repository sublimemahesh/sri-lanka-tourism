<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
//if (!Member::login()) {
//    redirect('login.php');
//}

$MEMBER = new Member($_SESSION['id']);
?>
<header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    <!--logo start-->
    <a href="index.html" class="logo"><b>Your Tourism Panel</b></a>
    <!--logo end-->
    <div class="pull-right top-menu nav notify-row">
        <ul class="nav top-menu">
            <li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="index.php">
                    <i class="fa fa-sign-out"></i>
                    <span class="badge bg-theme">o</span>
                </a>
                <ul class="dropdown-menu extended inbox">
                    <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                        <p class="green">You have 5 new messages</p>
                    </li>
                    <li>
                        <a href="index.html#">
                            <span class="photo"><img alt="avatar" src="assets/img/ui-zac.jpg"></span>
                            <span class="subject">
                                <span class="from">Zac Snider</span>
                                <span class="time">Just now</span>
                            </span>
                            <span class="message">
                                Hi mate, how is everything?
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="index.html#">
                            <span class="photo"><img alt="avatar" src="assets/img/ui-divya.jpg"></span>
                            <span class="subject">
                                <span class="from">Divya Manian</span>
                                <span class="time">40 mins.</span>
                            </span>
                            <span class="message">
                                Hi, I need your help with this.
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="index.html#">
                            <span class="photo"><img alt="avatar" src="assets/img/ui-danro.jpg"></span>
                            <span class="subject">
                                <span class="from">Dan Rogers</span>
                                <span class="time">2 hrs.</span>
                            </span>
                            <span class="message">
                                Love your new Dashboard.
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="index.html#">
                            <span class="photo"><img alt="avatar" src="assets/img/ui-sherman.jpg"></span>
                            <span class="subject">
                                <span class="from">Dj Sherman</span>
                                <span class="time">4 hrs.</span>
                            </span>
                            <span class="message">
                                Please, answer asap.
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="index.html#">See all messages</a>
                    </li>
                </ul>
            </li>

            <li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="index.php">
                    <i class="fa fa-gear"></i>
                    <span class="badge bg-theme"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="./">Home</a></li>
                    <li><a href="edit-profile.php">Edit Profile</a></li>
                    <li><a href="change-password.php">Change Password</a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="post-and-get/logout.php">

                            <span class="subject">
                                <span class="from"> Sign Out</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</header>
<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <?php
            if (empty($MEMBER->profile_picture)) {
                ?> 
                <p class="centered"><a href="./"><img src="../upload/member/member.png" class="img-circle" width="60"></a></p>
                <?php
            } else {
                ?>
                <p class="centered"><a href="./"><img src="../upload/member/<?php echo $MEMBER->profile_picture; ?>" id="profil_pic1" class="img-circle" width="60"></a></p>
                <?php
            }
            ?>
            <h5 class="centered"><?php echo $MEMBER->name; ?></h5>

            <li class="sub-menu">
                <a href="./" >
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="profile.php" >
                    <i class="fa fa-user"></i>
                    <span>Your Profile</span>
                </a>
                <!--                <ul class="sub">
                                    <li><a  href="profile.php">My Profile</a></li>
                                </ul>-->
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-car"></i>
                    <span>Transport</span>
                </a>
                <ul class="sub">
                    <li><a  href="add-new-transport.php">Add New Transport</a></li>
                    <li><a  href="manage-transport.php">Manage Transport</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-adn"></i>
                    <span>Accommodation</span>
                </a>
                <ul class="sub">
                    <li><a  href="add-new-accommodation.php">Add Accommodation</a></li>
                    <li><a  href="manage-accommodation.php">Manage Accommodation</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-tree"></i>
                    <span>Tour Packages</span>
                </a>
                <ul class="sub">
                    <li><a  href="add-new-tour-package.php">Add New Tour Packages</a></li>
                    <li><a  href="manage-tour-package.php">Manage Tour Packages</a></li>
                </ul>
            </li>
            <!--            <li class="sub-menu">
                            <a href="javascript:;" >
                                <i class="fa fa-tasks"></i>
                                <span>Forms</span>
                            </a>
                            <ul class="sub">
                                <li><a  href="form_component.html">Form Components</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" >
                                <i class="fa fa-th"></i>
                                <span>Data Tables</span>
                            </a>
                            <ul class="sub">
                                <li><a  href="basic_table.html">Basic Table</a></li>
                                <li><a  href="responsive_table.html">Responsive Table</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" >
                                <i class=" fa fa-bar-chart-o"></i>
                                <span>Charts</span>
                            </a>
                            <ul class="sub">
                                <li><a  href="morris.html">Morris</a></li>
                                <li><a  href="chartjs.html">Chartjs</a></li>
                            </ul>
                        </li>-->
        </ul>
    </div>
</aside>