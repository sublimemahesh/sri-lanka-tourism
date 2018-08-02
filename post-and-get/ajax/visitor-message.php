<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if($_POST['option'] == 'GETDISTINCTMEMBER') {
    $visitor = $_POST['visitorid'];
    
    $DISTINCTMEMBERS = MemberAndVisitorMessages::getDistinctMembersByVisitorId($visitor);
    
    
    
}


<?php
                                    foreach ($DISTINCTMEMBERS as $distinctmember) {
                                        $MEMBER = new Member($distinctmember['member']);
                                        $msg = MemberAndVisitorMessages::getLatestMessageByVisitorAndMember($visitorid, $distinctmember['member']);
                                        ?>
                                        <a href="visitor-message.php?id=<?php echo $distinctmember['member']; ?>"><li class="contact">
                                                <div class="wrap">
                                                    <!--<span class="contact-status online"></span>-->
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
                                                            if ($msg['sender'] == 'visitor') {
                                                                ?>
                                                                <span>You: </span>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (strlen($msg['messages']) > 30) {
                                                                echo substr($msg['messages'], 0, 30) . '...';
                                                            } else {
                                                                echo $msg['messages'];
                                                            };
                                                            ?></p>
                                                    </div>
                                                </div>
                                            </li></a>
                                        <?php
                                    }
                                    ?>

