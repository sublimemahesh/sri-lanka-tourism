<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$MEMBER = new Member($_SESSION['id']);
$count = MemberAndVisitorMessages::getCountOfUnReadMessagesByMember($MEMBER->id);
$DISTINCTVISITORS1 = MemberAndVisitorMessages::getDistinctVisitorsOfUnReadMessagesByMemberId($MEMBER->id);
?>
<header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
    <!--logo start-->
    <a href="index.php" class="logo hidden-sm hidden-xs"><b>www.srilankatourism.travel - Member Dashboard</b></a>
    <!--logo end-->
    <div class="pull-right top-menu nav notify-row">
        <ul class="nav top-menu">
            <li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="index.php">
                    <i class="fa fa-envelope"></i>
                    <span class="badge bg-theme"><?php echo $count; ?></span>
                </a>
                <ul class="dropdown-menu extended inbox">
                    <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                        <p class="green">You have <?php echo $count; ?> new messages</p>
                    </li>
                    <?php
                    $maxids1 = array();
                    foreach ($DISTINCTVISITORS1 as $distinctvisitor1) {
                        $max1 = MemberAndVisitorMessages::getUnReadMaxIDOfDistinctVisitor($distinctvisitor1['visitor'], $MEMBER->id);
                        array_push($maxids1, $max1['max']);
                    }
                    rsort($maxids1);
                    foreach ($maxids1 as $key => $maxid1) {
                        if ($key < 7) {
                            $MESSAGE1 = new MemberAndVisitorMessages($maxid1);
                            $countunreadmsgs = MemberAndVisitorMessages::getCountUnreadMessagesByVisitor($MESSAGE1->visitor, $MEMBER->id);
                            $VISI1 = new Visitor($MESSAGE1->visitor);
                            $result1 = getMessagedTime($MESSAGE1->date_and_time);
                            ?>
                            <li>
                                <a href="member-message.php?id=<?php echo $VISI1->id; ?>">
                                    <span class="photo">
                                        <?php
                                        if (empty($VISI1->image_name)) {
                                            ?> 
                                            <img src="../upload/visitor/member.png" class="img-circle img-thumbnail" width="60">
                                            <?php
                                        } else {

                                            if ($VISI1->facebookID && substr($VISI1->image_name, 0, 5) === "https") {
                                                ?>
                                                <img src="<?php echo $VISI1->image_name; ?>" class="img-circle img-thumbnail" width="60">
                                                <?php
                                            } elseif ($VISI1->googleID && substr($VISI1->image_name, 0, 5) === "https") {
                                                ?>
                                                <img src="<?php echo $VISI1->image_name; ?>" class="img-circle img-thumbnail" width="60">
                                                <?php
                                            } else {
                                                ?>
                                                <img src="../upload/visitor/<?php echo $VISI1->image_name; ?>" class="img-circle img-thumbnail" width="60">
                                                <?php
                                            }
                                        }
                                        ?>
                                    </span>
                                    <span class="subject">
                                        <span class="from"><?php echo $VISI1->first_name; ?></span>
                                        <span class="time"><?php echo $result1; ?></span>
                                    </span>
                                    <span class="message">
                                        <?php
                                        if (strlen($MESSAGE1->messages) > 30) {
                                            echo substr($MESSAGE1->messages, 0, 28) . '...';
                                        } else {
                                            echo $MESSAGE1->messages;
                                        }
                                        ?>
                                        <span class="badge bg-theme badge2"><?php echo $countunreadmsgs; ?></span>
                                    </span>
                                </a>
                            </li>
                            <?php
                        }
                    }
                    ?>
                    <li>
                        <a href="member-message.php">See all messages</a>
                    </li>
                </ul>
            </li>

            <li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="index.php">
                    <i class="fa fa-gear"></i>
                    <span class="badge bg-theme"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="profile.php" class="index-top-menu"><i class="index-top-menu-icon fa fa-user"></i>My Profile</a></li>
                    <li><a href="edit-profile.php" class="index-top-menu"><i class="index-top-menu-icon fa fa-pencil"></i>Edit Profile</a></li>
                    <li><a href="change-password.php" class="index-top-menu"><i class="index-top-menu-icon fa fa-edit"></i>Change Password</a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="post-and-get/logout.php" class="index-top-menu">
                            <i class="index-top-menu-icon fa fa-lock"></i>
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
                <p class="centered"><a href="./"><img src="../upload/member/member.png" class="img-circle" id="profil_pic1" width="60"></a></p>
                <?php
            } else {

                if ($MEMBER->facebookID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                    ?>
                    <p class="centered"><a href="./"><img src="<?php echo $MEMBER->profile_picture; ?>" id="profil_pic1" class="img-circle" width="60"></a></p>
                    <?php
                } elseif ($MEMBER->googleID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                    ?>
                    <p class="centered"><a href="./"><img src="<?php echo $MEMBER->profile_picture; ?>" id="profil_pic1" class="img-circle" width="60"></a></p>
                    <?php
                } else {
                    ?>
                    <p class="centered"><a href="./"><img src="../upload/member/<?php echo $MEMBER->profile_picture; ?>" id="profil_pic1" class="img-circle" width="60"></a></p>
                    <?php
                }
            }
            ?>


            <h5 class="centered"><?php echo $MEMBER->name; ?></h5>
            <h6  class="centered"><?php echo $MEMBER->email; ?></h6>

            <li class="sub-menu">
                <a href="./" >
                    <i class="fa fa-tachometer"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="profile.php" >
                    <i class="fa fa-user-circle"></i>
                    <span>Your Profile</span>
                </a> 
            </li>

            <li class="sub-menu">
                <a href="manage-transport.php" >
                    <i class="fa fa-taxi"></i>
                    <span>Transport</span>
                </a>
                <!--                <ul class="sub">
                                    <li><a  href="add-new-transport.php">Add New Transport</a></li>
                                    <li><a  href="manage-transport.php">Manage Transport</a></li>
                                </ul>-->
            </li>
            <li class="sub-menu">
                <a href="manage-accommodation.php" >
                    <i class="fa fa-bed"></i>
                    <span>Accommodation</span>
                </a>
                <!--                <ul class="sub">
                                    <li><a  href="add-new-accommodation.php">Add Accommodation</a></li>
                                    <li><a  href="manage-accommodation.php">Manage Accommodation</a></li>
                                </ul>-->
            </li>
            <li class="sub-menu">
                <a href="manage-tour-package.php" >
                    <i class="fa fa-suitcase"></i>
                    <span>Tour Packages</span>
                </a>
                <!--                <ul class="sub">
                                    <li><a  href="add-new-tour-package.php">Add New Tour Packages</a></li>
                                    <li><a  href="manage-tour-package.php">Manage Tour Packages</a></li>
                                </ul>-->
            </li> 
            <li class="sub-menu">
                <a href="manage-offer.php" >
                    <i class="fa fa-gift"></i>
                    <span>Offers</span>
                </a>
                <!--                <ul class="sub">
                                    <li><a  href="add-new-tour-package.php">Add New Tour Packages</a></li>
                                    <li><a  href="manage-tour-package.php">Manage Tour Packages</a></li>
                                </ul>-->
            </li> 
            <li class="sub-menu">
                <a href="member-message.php" >
                    <i class="fa fa-comment-o"></i>
                    <span>Messages</span>
                </a>
            </li> 
        </ul>
    </div>
</aside>
<?php

function getMessagedTime($datetime) {
    date_default_timezone_set('Asia/Colombo');
    $today = new DateTime(date("Y-m-d"));
    $todaytime = new DateTime(date("H:i:s"));

    $arr = explode(' ', $datetime);
    $date1 = new DateTime(date($arr[0]));
    $time1 = new DateTime(date($arr[1]));

    $date = $today->diff($date1);
    $datediff = $date->format('%a');

    if ($datediff == 0) {

        $time = $todaytime->diff($time1);
        $timediff = $time->format('%h:%i:%s');
        $arr1 = explode(':', $timediff);
        if ($arr1[0] == 0) {
            $diff = $arr1[1] . ' min ago';
        } else {
            if ($arr1[0] == 1) {
                $diff = $arr1[0] . ' hour ago';
            } else {
                $diff = $arr1[0] . ' hours ago';
            }
        }
    } elseif ($datediff == 1 && $time1 > $todaytime) {
      
        
        
        $t = $todaytime->diff($time1);
        $timediff1 = $t->format('%h:%i:%s'); 
        $timediff1format = new DateTime($timediff1);
        $time3 = new DateTime('24:00:00');
        $time = $time3->diff($timediff1format);
        $timediff = $time->format('%h:%i:%s');
        $arr1 = explode(':', $timediff);
        $diff = $arr1[0] . ' hours ago';
    } elseif ($datediff == 1 && $time1 < $todaytime) {
        $diff = $datediff . ' day ago';
    } elseif ($datediff > 30) {
        $month = round($datediff / 30);

        if ($month >= 12) {

            $year = round($month / 12);
            if ($year == 1) {
                $diff = $year . ' year ago';
            } else {
                $diff = $year . ' years ago';
            }
        } elseif ($month == 1) {
            $diff = $month . ' month ago';
        } else {
            $diff = $month . ' months ago';
        }
    }
    return $diff;
}
?>