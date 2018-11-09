<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['isPhoneVerified'])) {
    $isPhoneVerified = $_SESSION['isPhoneVerified'];
}
$visitorid = '';
if (isset($_GET['id'])) {
    $visitorid = $_GET['id'];
}

$memberid = $_SESSION['id'];

$MEMBER = new Member($memberid);
$VISITOR = new Visitor($visitorid);
$DISTINCTVISITORS = MemberAndVisitorMessages::getDistinctVisitorsByMemberId($memberid);

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>www.srilankatourism.travel</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">

        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

        <!-- Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Ruda:400,700,900" type="text/css">
        <link href="assets/css/member-visitor-messages.css" rel="stylesheet" type="text/css"/>
        <!-- Custom styles for this template --> 
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">

        <style>
            a, a:hover, a:focus {
                text-decoration: none;
                outline: none;
                color: #fff;
            }
            @media (max-width: 360px) {
                #frame .content {
                    width: 262px;
                    min-width: 262px !important;
                }
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
                <div class="col-md-12 verified-alert"></div> 
                <section class="wrapper">
                    <div id="frame">
                        <div id="sidepanel">
                            <div id="profile">
                                <div class="wrap">
                                    <?php
                                    if (empty($MEMBER->profile_picture)) {
                                        ?> 
                                        <img id="profile-img" src="../upload/member/member.png" class="online" alt="" />
                                        <?php
                                    } else {

                                        if ($MEMBER->facebookID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                            ?>
                                            <img id="profile-img" src="<?php echo $MEMBER->profile_picture; ?>" class="online" alt="" />
                                            <?php
                                        } elseif ($MEMBER->googleID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                            ?>
                                            <img id="profile-img" src="<?php echo $MEMBER->profile_picture; ?>" class="online" alt="" />
                                            <?php
                                        } else {
                                            ?>
                                            <img id="profile-img" src="../upload/member/<?php echo $MEMBER->profile_picture; ?>" class="online" alt="" />
                                            <?php
                                        }
                                    }
                                    ?>

                                    <p><?php echo $MEMBER->name; ?></p>
                                    <i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
                                    <div id="status-options">
                                        <ul>
                                            <li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>
                                            <li id="status-away"><span class="status-circle"></span> <p>Away</p></li>
                                            <li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>
                                            <li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>
                                        </ul>
                                    </div>
                                    <div id="expanded">
                                        <label for="twitter"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i></label>
                                        <input name="twitter" type="text" value="<?php echo $MEMBER->email; ?>" />
                                        <label for="twitter"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></label>
                                        <input name="twitter" type="text" value="<?php echo $MEMBER->contact_number; ?>" />
                                    </div>
                                </div>
                            </div>
<!--                            <div id="search">
                                <label for="">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </label>
                                <input type="text" placeholder="Search contacts..." />
                            </div>-->
                            <div id="contacts">
                                <ul>
                                    <?php
                                    $maxids = array();
                                    foreach ($DISTINCTVISITORS as $distinctvisitor) {
                                        $max = MemberAndVisitorMessages::getMaxIDOfDistinctVisitor($distinctvisitor['visitor']);
                                        array_push($maxids, $max['max']);
//                                        return $maxids;
                                    }
                                    rsort($maxids);
                                    foreach ($maxids as $key => $maxid) {
                                        $MESSAGE = new MemberAndVisitorMessages($maxid);
                                        $VISI = new Visitor($MESSAGE->visitor);
                                        ?>
                                        <a href="member-message.php?id=<?php echo $MESSAGE->visitor; ?>">
                                            <li class="contact <?php
                                            if ($MESSAGE->visitor == $visitorid) {
                                                echo 'active';
                                            }
                                            ?>">
                                                <div class="wrap">
                                                    <?php
                                                    if (empty($VISI->image_name)) {
                                                        ?> 
                                                        <img src="../upload/member/member.png" alt = "" />
                                                        <?php
                                                    } else {

                                                        if ($VISI->facebookID && substr($VISI->image_name, 0, 5) === "https") {
                                                            ?>
                                                            <img src="<?php echo $VISI->image_name; ?>" alt = "" />
                                                            <?php
                                                        } elseif ($VISI->googleID && substr($VISI->image_name, 0, 5) === "https") {
                                                            ?>
                                                            <img src="<?php echo $VISI->image_name; ?>" alt = "" />
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <img src = "../upload/visitor/<?php echo $VISI->image_name; ?>" alt = ""/>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <div class = "meta">
                                                        <p class = "name"><?php echo $VISI->first_name . ' ' . $VISI->second_name; ?></p>
                                                        <p class="preview">
                                                            <?php
                                                            if ($MESSAGE->sender == 'member') {
                                                                ?>
                                                                <span>You: </span>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (strlen($MESSAGE->messages) > 30) {
                                                                echo substr($MESSAGE->messages, 0, 30) . '...';
                                                            } else {
                                                                echo $MESSAGE->messages;
                                                            };
                                                            ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                        </a>
                                        <?php
                                    }
                                    ?>


                                </ul>
                            </div>
<!--                            <div id="bottom-bar">
                                <button id="addcontact">
                                    <i class="fa fa-user-plus fa-fw" aria-hidden="true"></i>
                                    <span>Add contact</span>
                                </button>
                                <button id="settings">
                                    <i class="fa fa-cog fa-fw" aria-hidden="true"></i> 
                                    <span>Settings</span>
                                </button>
                            </div>-->
                        </div>
                        <div class="content">
                            <?php
                            if (isset($_GET['id'])) {
                                ?>
                                <div class="contact-profile">
                                    <?php
                                    if (empty($VISITOR->image_name)) {
                                        ?> 
                                        <img src="../upload/member/member.png" alt = "" />
                                        <?php
                                    } else {

                                        if ($VISITOR->facebookID && substr($VISITOR->image_name, 0, 5) === "https") {
                                            ?>
                                            <img src="<?php echo $VISITOR->image_name; ?>" alt = "" />
                                            <?php
                                        } elseif ($VISITOR->googleID && substr($VISITOR->image_name, 0, 5) === "https") {
                                            ?>
                                            <img src="<?php echo $VISITOR->image_name; ?>" alt = "" />
                                            <?php
                                        } else {
                                            ?>
                                            <img src = "../upload/visitor/<?php echo $VISITOR->image_name; ?>" alt = ""/>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <p><?php echo $VISITOR->first_name . ' ' . $VISITOR->second_name; ?></p>
                                    <div class="social-media">

                                    </div>
                                </div>
                                <div class="messages">
                                    <ul>
                                        <?php
                                        $MESSAGES = MemberAndVisitorMessages::getMessagesByVisitorAndMemberASC($visitorid, $memberid);

                                        foreach ($MESSAGES as $msg) {
                                            if ($msg['sender'] == 'member') {
                                                ?>
                                                <li class="sent">
                                                    <?php
                                                    if (empty($MEMBER->profile_picture)) {
                                                        ?> 
                                                        <img src="../upload/member/member.png" alt="" />
                                                        <?php
                                                    } else {

                                                        if ($MEMBER->facebookID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                            ?>
                                                            <img src="<?php echo $MEMBER->profile_picture; ?>" alt="" />
                                                            <?php
                                                        } elseif ($MEMBER->googleID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                            ?>
                                                            <img src="<?php echo $MEMBER->profile_picture; ?>" alt="" />
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <img src="../upload/member/<?php echo $MEMBER->profile_picture; ?>" alt="" />
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <p><?php echo $msg['messages']; ?>
                                                        <br />
                                                        <span class="sent">
                                                            <?php
                                                            $time = substr($msg['date_and_time'], 11, 19);
                                                            $vartime = change_time($time);
                                                            if (substr($msg['date_and_time'], 0, 4) < date('Y')) {
                                                                $date = strtotime(substr($msg['date_and_time'], 0, 10));
                                                                $vardate = date('F d, Y', $date);
                                                                echo $vardate . ' AT ' . $vartime;
                                                            } else if (substr($msg['date_and_time'], 0, 10) === date('Y-m-d', strtotime("-1 days"))) {
                                                                $date = strtotime(substr($msg['date_and_time'], 0, 10));
                                                                $vardate = date('D', $date);
                                                                echo $vardate . ' AT ' . $vartime;
                                                            } else if (substr($msg['date_and_time'], 0, 10) === date('Y-m-d')) {
                                                                echo $vartime;
                                                            } else {
                                                                $date = strtotime(substr($msg['date_and_time'], 0, 10));
                                                                $vardate = date('F d', $date);
                                                                echo $vardate . ' AT ' . $vartime;
                                                            }
                                                            ?>
                                                        </span>
                                                    </p>
                                                </li>
                                                <?php
                                            } else if ($msg['sender'] == 'visitor') {
                                                ?>
                                                <li class="replies">
                                                    <?php
                                                    if (empty($VISITOR->image_name)) {
                                                        ?> 
                                                        <img src="../upload/member/member.png" alt = "" />
                                                        <?php
                                                    } else {

                                                        if ($VISITOR->facebookID && substr($VISITOR->image_name, 0, 5) === "https") {
                                                            ?>
                                                            <img src="<?php echo $VISITOR->image_name; ?>" alt = "" />
                                                            <?php
                                                        } elseif ($VISITOR->googleID && substr($VISITOR->image_name, 0, 5) === "https") {
                                                            ?>
                                                            <img src="<?php echo $VISITOR->image_name; ?>" alt = "" />
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <img src = "../upload/visitor/<?php echo $VISITOR->image_name; ?>" alt = ""/>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <p><?php echo $msg['messages']; ?>
                                                        <br />
                                                        <span class="reply">
                                                            <?php
                                                            $time = substr($msg['date_and_time'], 11, 19);
                                                            $vartime = change_time($time);
                                                            if (substr($msg['date_and_time'], 0, 4) < date('Y')) {
                                                                $date = strtotime(substr($msg['date_and_time'], 0, 10));
                                                                $vardate = date('F d, Y', $date);
                                                                echo $vardate . ' AT ' . $vartime;
                                                            } else if (substr($msg['date_and_time'], 0, 10) === date('Y-m-d', strtotime("-1 days"))) {
                                                                $date = strtotime(substr($msg['date_and_time'], 0, 10));
                                                                $vardate = date('D', $date);
                                                                echo $vardate . ' AT ' . $vartime;
                                                            } else if (substr($msg['date_and_time'], 0, 10) === date('Y-m-d')) {
                                                                echo $vartime;
                                                            } else {
                                                                $date = strtotime(substr($msg['date_and_time'], 0, 10));
                                                                $vardate = date('F d', $date);
                                                                echo $vardate . ' AT ' . $vartime;
                                                            }
                                                            ?>
                                                        </span>
                                                    </p>

                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>

                                    </ul>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="contact-profile">

                                </div>
                                <?php
                            }
                            ?>
                            <div class="message-input">
                                <div class="wrap">
                                    <form id="send-message" method="post" enctype="multipart/form-data" action="post-and-get/member-messages.php">

                                        <input type="text" name="message" id="message" placeholder="Write your message..." autocomplete="off"/>

                                        <input type="hidden" name="member" value="<?php echo $_SESSION['id']; ?>">
                                        <input type="hidden" name="visitor" id="visitor" value="<?php echo $visitorid; ?>">
                                        <input type="hidden" name="sender" value="member">
                                        <input type="hidden" id="isVerifiedContactNumber" value="<?php echo $isPhoneVerified; ?>" contactnumber="<?php echo $MEMBER->contact_number; ?>">
                                        <button type="submit" name="member-message" id="member-message" class="btn btn-info btn-position-rel">
                                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                    </div>
                </section>
            </section>
            <?php

            function change_time($input_time) {

                $hours = substr($input_time, 0, 2);
                $mins = substr($input_time, 3, 2);

                if (($hours >= 12) && ($hours <= 24)) {
                    if (($hours == 24)) {
                        $new_hour = "00";
                        $part = "AM";
                    } else if ($hours == 12) {
                        $new_hour = $hours;
                        $part = "PM";
                    } else {
                        $new_hour = $hours - 12;
                        $part = "PM";
                    }
                } else {
                    $new_hour = $hours;
                    $part = "AM";
                }


                return $new_hour . ":" . $mins . " " . $part;
            }
            ?>
            <!--main content end-->
            <?php
            include './footer.php';
            ?>
        </section>

        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/jquery-1.8.3.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="assets/js/jquery.sparkline.js"></script>

        <!--common script for all pages-->
        <script src="assets/js/common-scripts.js"></script>
        <script src="js/member-message.js" type="text/javascript"></script>
        <script src="js/member-visitor-messages.js" type="text/javascript"></script>
        <script src="js/display-contact-number-verification-alert.js" type="text/javascript"></script>
    </body>
</html>
