<?php
include './class/include.php';
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['isPhoneVerified'])) {
    $isPhoneVerified = $_SESSION['isPhoneVerified'];
}
$memberid = '';
if (isset($_GET['id'])) {
    $memberid = $_GET['id'];
}
if (!isset($_SESSION["vislogin"])) {
    $site_link = "https://" . $_SERVER['HTTP_HOST'];
    $_SESSION["back_url"] = $site_link . '/visitor-message.php?id=' . $memberid;
    redirect('visitor-login.php?message=24');
} else {
    $visitorid = $_SESSION['id'];
}
$VISITOR = new Visitor($visitorid);
$MEM = new Member($memberid);
$DISTINCTMEMBERS = MemberAndVisitorMessages::getDistinctMembersByVisitorId($visitorid);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Chat with Driver || Sri Lanka || Tourism</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link href="css/search.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet">
        <link href="css/member-visitor-messages.css" rel="stylesheet" type="text/css"/>
        <style>
            @media (max-width: 360px) {
                #frame .content {
                    width: 262px;
                    min-width: 262px !important;
                }
            }
        </style>
    </head>
    <body>

        <?php
        include './header.php';
        ?>
        <div class="container-fluid">
            <div class="row background-image" style="background-image: url('images/hotel/back.jpg');">
                <div class="container">
                    <div class="col-md-12 verified-alert"></div>
                    <div id="frame">

                        <div id="sidepanel">

                            <div id="profile">
                                <div class="wrap">
                                    <?php
                                    if (empty($VISITOR->image_name)) {
                                        ?> 
                                        <img id="profile-img" src="upload/member/member.png" class="online" alt="" />
                                        <?php
                                    } else {

                                        if ($VISITOR->facebookID && substr($VISITOR->image_name, 0, 5) === "https") {
                                            ?>
                                            <img id="profile-img" src="<?php echo $VISITOR->image_name; ?>" class="online" alt="" />
                                            <?php
                                        } elseif ($VISITOR->googleID && substr($VISITOR->image_name, 0, 5) === "https") {
                                            ?>
                                            <img id="profile-img" src="<?php echo $VISITOR->image_name; ?>" class="online" alt="" />
                                            <?php
                                        } else {
                                            ?>
                                            <img id="profile-img" src="upload/visitor/<?php echo $VISITOR->image_name; ?>" class="online" alt="" />
                                            <?php
                                        }
                                    }
                                    ?>
                                    <p><?php echo $VISITOR->first_name . ' ' . $VISITOR->second_name; ?></p>
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
                                        <input name="twitter" type="text" value="<?php echo $VISITOR->email; ?>" />
                                        <label for="twitter"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></label>
                                        <input name="twitter" type="text" value="<?php echo $VISITOR->contact_number; ?>" />
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
                                    foreach ($DISTINCTMEMBERS as $distinctmember) {
                                        $max = MemberAndVisitorMessages::getMaxIDOfDistinctMember($distinctmember['member']);
                                        array_push($maxids, $max['max']);
//                                        return $maxids;
                                    }
                                    rsort($maxids);
                                    foreach ($maxids as $key => $maxid) {
                                        $MESSAGE = new MemberAndVisitorMessages($maxid);
                                        $MEMBER = new Member($MESSAGE->member);
                                        ?>
                                        <a href="visitor-message.php?id=<?php echo $MESSAGE->member; ?>">
                                            <li class="contact <?php
                                            if ($MESSAGE->member == $memberid) {
                                                echo 'active';
                                            }
                                            ?>">
                                                <div class="wrap">
    <!--//                                                    <span class="contact-status online"></span>-->
                                                    <?php
                                                    if (empty($MEMBER->profile_picture)) {
                                                        ?> 
                                                        <img src="upload/member/member.png" alt = "" />
                                                        <?php
                                                    } else {

                                                        if ($MEMBER->facebookID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                            ?>
                                                            <img src="<?php echo $MEMBER->profile_picture; ?>" alt = "" />
                                                            <?php
                                                        } elseif ($MEMBER->googleID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                            ?>
                                                            <img src="<?php echo $MEMBER->profile_picture; ?>" alt = "" />
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <img src = "upload/member/<?php echo $MEMBER->profile_picture; ?>" alt = ""/>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <div class = "meta">
                                                        <p class = "name"><?php echo $MEMBER->name; ?></p>
                                                        <p class="preview">
                                                            <?php
                                                            if ($MESSAGE->sender == 'visitor') {
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
                                    if (empty($MEM->profile_picture)) {
                                        ?> 
                                        <img src="upload/member/member.png" alt = "" />
                                        <?php
                                    } else {

                                        if ($MEM->facebookID && substr($MEM->profile_picture, 0, 5) === "https") {
                                            ?>
                                            <img src="<?php echo $MEM->profile_picture; ?>" alt = "" />
                                            <?php
                                        } elseif ($MEM->googleID && substr($MEM->profile_picture, 0, 5) === "https") {
                                            ?>
                                            <img src="<?php echo $MEM->profile_picture; ?>" alt = "" />
                                            <?php
                                        } else {
                                            ?>
                                            <img src = "upload/member/<?php echo $MEM->profile_picture; ?>" alt = ""/>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <p><?php echo $MEM->name; ?></p>
                                    <div class="social-media">

                                    </div>
                                </div>
                                <div class="messages">
                                    <ul>
                                        <?php
                                        $MESSAGES = MemberAndVisitorMessages::getMessagesByVisitorAndMemberASC($visitorid, $memberid);

                                        foreach ($MESSAGES as $msg) {
                                            if ($msg['sender'] == 'visitor') {
                                                ?>
                                                <li class="sent">
                                                    <?php
                                                    if (empty($VISITOR->image_name)) {
                                                        ?> 
                                                        <img src="upload/member/member.png" alt="" />
                                                        <?php
                                                    } else {

                                                        if ($VISITOR->facebookID && substr($VISITOR->image_name, 0, 5) === "https") {
                                                            ?>
                                                            <img src="<?php echo $VISITOR->image_name; ?>" alt="" />
                                                            <?php
                                                        } elseif ($VISITOR->googleID && substr($VISITOR->image_name, 0, 5) === "https") {
                                                            ?>
                                                            <img src="<?php echo $VISITOR->image_name; ?>" alt="" />
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <img src="upload/visitor/<?php echo $VISITOR->image_name; ?>" alt="" />
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
                                            } else if ($msg['sender'] == 'member') {
                                                ?>
                                                <li class="replies">
                                                    <?php
                                                    if (empty($MEM->profile_picture)) {
                                                        ?> 
                                                        <img src="upload/member/member.png" alt = "" />
                                                        <?php
                                                    } else {

                                                        if ($MEM->facebookID && substr($MEM->profile_picture, 0, 5) === "https") {
                                                            ?>
                                                            <img src="<?php echo $MEM->profile_picture; ?>" alt = "" />
                                                            <?php
                                                        } elseif ($MEM->googleID && substr($MEM->profile_picture, 0, 5) === "https") {
                                                            ?>
                                                            <img src="<?php echo $MEM->profile_picture; ?>" alt = "" />
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <img src = "upload/member/<?php echo $MEM->profile_picture; ?>" alt = ""/>
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
                                    <form id="send-message" method="post" enctype="multipart/form-data" action="post-and-get/visitor-messages.php">

                                        <input type="text" name="message" id="message" placeholder="Write your message..." autocomplete="off"/>

                                        <input type="hidden" name="member" value="<?php echo $memberid; ?>">
                                        <input type="hidden" name="visitor" id="visitor" value="<?php echo $_SESSION['id']; ?>">
                                        <input type="hidden" name="sender" value="visitor">
                                        <button type="submit" name="visitor-message" id="visitor-message" class="btn btn-info btn-position-rel">
                                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--<input type="hidden" id="isVerifiedContactNumber" value="<?php echo $isPhoneVerified; ?>" contactnumber="<?php echo $VISITOR->contact_number; ?>">-->
                    </div>

                </div>
            </div>
        </div>
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

        <?php include './footer.php'; ?>
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/member-visitor-messages.js" type="text/javascript"></script>
        <script src="js/visitor-message.js" type="text/javascript"></script>
        <script src="js/display-contact-number-verification-alert.js" type="text/javascript"></script>
    </body> 
</html>
