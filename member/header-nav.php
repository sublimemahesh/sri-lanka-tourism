<?php
//
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
                        <p class="green">Your Account</p>
                    </li>
                    <li>
                        <a href="profile.php">

                            <?php
                            if (empty($MEMBER->profile_picture)) {
                                ?> 
                                <span class="photo"><img alt="avatar" src="../upload/member/member.png"></span>
                                <?php
                            } else {
                                ?>
                                <span class="photo"><img alt="avatar" src="../upload/member/<?php echo $MEMBER->profile_picture; ?>"></span>
                                <?php
                            }
                            ?>


                            <span class="subject">
                                <span class="from"> My Profile</span>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="../index.php">
                            <span class="photo"><img alt="avatar" src="../images/3d-building.png"></span>
                            <span class="subject">
                                <span class="from"> My Ads</span>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="../index.php">
                            <span class="photo"><img alt="avatar" src="../upload/visitor/-574108304_190629032602_1518674405_n.jpg"></span>
                            <span class="subject">
                                <span class="from"> My Rates</span>
                            </span>
                            <span class="message">
                                *******
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="post-and-get/logout.php">
                            <span class="photo"><img alt="avatar" src="../upload/visitor/-574108304_190629032602_1518674405_n.jpg"></span>
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
                <p class="centered"><a href="./"><img src="../upload/member/<?php echo $MEMBER->profile_picture; ?>" class="img-circle" width="60"></a></p>
                <?php
            }
            ?>
            <h5 class="centered"><?php echo $MEMBER->name; ?></h5>


            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-user"></i>
                    <span>Account</span>
                </a>
                <ul class="sub">
                    <li><a  href="profile.php">My Profile</a></li>
                    <li><a  href="edit-profile.php">Edit Profile</a></li>
                    <li><a  href="change-password.php">Change Password</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-cogs"></i>
                    <span>Components</span>
                </a>
                <ul class="sub">
                    <li><a  href="calendar.html">Calendar</a></li>
                    <li><a  href="gallery.html">Gallery</a></li>
                    <li><a  href="todo_list.html">Todo List</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-book"></i>
                    <span>Extra Pages</span>
                </a>
                <ul class="sub">
                    <li><a  href="blank.html">Blank Page</a></li>
                    <li><a  href="login.php">Login</a></li>
                    <li><a  href="lock_screen.html">Lock Screen</a></li>
                </ul>
            </li>
            <li class="sub-menu">
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
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>