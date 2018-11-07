<!DOCTYPE html>
<?php
include './class/include.php';
$id = $_GET["id"];
$MEMBER = new Member($id);
$CITY = new City($MEMBER->city);
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Member View || Sri Lanka || Tourism</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="sri lanka tourism, tourism in sri lanka, Sri Lanka, members of sri lanka tourism, tours in sri lanka, taxi in sri lanka, tourism sri lanka, rent a cars in sri lanka, transports in sri lanka, transport ways in sri lanka, sri lanka transports, vehicles in sri lanka, tour packages in sri lanka, holiday in sri lanka, visit sri lanka, accommodations sri lanka, hotels in sri lanka, Accommodations, Hotels, tour packages offers, taxi offers, transport offers, articles in sri lanka">
        <meta name="description" content="The team Sri Lanka Tourism crew is privileged to show you and to take you around the most beautiful places in Sri Lanka. You can Plan your tour with Sri Lanka Tourism and, tours are judiciously planned and customized to meet your needs. And also, Sri Lanka Tourism features well established taxi service and hotel service. So your trip will be everything you imagined and much more.">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link href="css/search.css" rel="stylesheet" type="text/css"/>
        <link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
        <link href="css/visitor-custom.css" rel="stylesheet" type="text/css"/>
        <link href="css/custom-styles.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet"> 
    </head>
    <body style="background-color: #FFF !important;">
        <!-- Our Resort Values style-->
        <?php include './header.php' ?>
        <div class="container">
            <div class="row top-bott20">
                <div class="col-md-12">
                    <div class="public-member-box margin-panel">
                        <h4 class="public-member-title">Member Details</h4>
                        <div class="panel panel-default margin-panel">
                            <div class="panel-body">  
                                <div class="col-sm-12 col-md-12">
                                    <div class="row">
                                        <div class="col-sm-9 col-md-9">
                                            <ul class="list-group">
                                                <li class="list-group-item"><b>Name</b> : <?php echo $MEMBER->name; ?></li> 
                                                <li class="list-group-item"><b>Email</b> : <?php echo $MEMBER->email; ?></li>
                                                <li class="list-group-item"><b>Contact No</b> : <?php echo $MEMBER->contact_number; ?></li>
                                                <li class="list-group-item"> <b>Date Of Birth</b> : <?php echo $MEMBER->date_of_birthday; ?></li>
                                                <li class="list-group-item"> <b>Home Address</b> : <?php echo $MEMBER->home_address; ?></li>
                                                <li class="list-group-item"> <b>City</b> :
                                                    <?php
                                                    echo $CITY->name;
                                                    ?>
                                                </li>
                                                <li class="list-group-item"> <b>Speak Languages</b> :
                                                    <?php
                                                    if (!empty($MEMBER->languages)) {
                                                        $current_languages = explode(",", $MEMBER->languages);
                                                        $resultstr = array();

                                                        foreach ($current_languages as $lang_id) {
                                                            $language = new Languages($lang_id);
                                                            $resultstr[] = $language->name;
                                                        }
                                                        echo implode(",", $resultstr);
                                                    } else {
                                                        echo '';
                                                    }
                                                    ?>
                                                </li>
                                                <li class="list-group-item"> <b>About Member</b> : <?php echo $MEMBER->about_me; ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3 col-md-3 margin-top-40">  
                                            <?php
                                            if (empty($MEMBER->id)) {
                                                ?>
                                                <img src="images/admin-member-img.png"  class="img-responsive thumbnail"/>
                                                <?php
                                            } else {
                                                if (empty($MEMBER->profile_picture)) {
                                                    ?> 
                                                    <img src="upload/member/member.png" class="img-responsive thumbnail" />
                                                    <?php
                                                } else {
                                                    if ($MEMBER->facebookID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                        ?>
                                                        <img src="<?php echo $MEMBER->profile_picture; ?>" class="img-responsive thumbnail" >
                                                        <?php
                                                    } elseif ($MEMBER->googleID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                        ?>
                                                        <img src="<?php echo $MEMBER->profile_picture; ?>" class="img-responsive thumbnail">
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <img src="upload/member/<?php echo $MEMBER->profile_picture; ?>" class="img-responsive thumbnail">
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>   	
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Resort Values style-->  
        <?php include './footer.php' ?>
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
    </body> 
</html>