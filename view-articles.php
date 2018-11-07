<?php
include_once(dirname(__FILE__) . '/class/include.php');
if (!isset($_SESSION)) {
    session_start();
}
$SEARCH = new Search(NULL);
$keyword = NULL;
$type = NULL;
$city = NULL;
/* set page numbers */
if (isset($_GET["page"])) {
    $page = (int) $_GET["page"];
} else {
    $page = 1;
}
$setLimit = 12;
$pageLimit = ($page * $setLimit) - $setLimit;
/* search */
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}
if (isset($_GET['type'])) {
    $type = $_GET['type'];
}
if (isset($_GET['article-city'])) {
    $city = $_GET['article-city'];
}
$ARTICLES = $SEARCH->GetArticlesByKeywords($keyword, $type, $city, $pageLimit, $setLimit);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Article || Sri Lanka || Tourism</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="sri lanka tourism, tourism in sri lanka, Sri Lanka, articles in sri lanka, destinations in sri lanka, visiting places in sri lanka, places in sri lanka, attractions in sri lanka, beautiful places in sri lanka, tours in sri lanka, taxi in sri lanka, tourism sri lanka, rent a cars in sri lanka, tour packages in sri lanka, holiday in sri lanka, visit sri lanka, ">
        <meta name="description" content="The team Sri Lanka Tourism crew is privileged to show you and to take you around the most beautiful places in Sri Lanka. You can Plan your tour with Sri Lanka Tourism and, tours are judiciously planned and customized to meet your needs. And also, Sri Lanka Tourism features well established taxi service and hotel service. So your trip will be everything you imagined and much more.">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link href="css/search.css" rel="stylesheet" type="text/css"/>
        <link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/styles.css" rel="stylesheet" type="text/css"/>
        <link href="admin/plugins/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet">
        <style>
            @media (max-width: 480px) {
                .carousel .testimonial {
                    margin: 0px;
                }
            }
        </style>
    </head>
    <body>
        <!-- Our Resort Values style-->
        <?php
        include './header.php';
        ?>
        <div class="row background-image" style="background-image: url('images/hotel/sea.jpg');">
            <section>
                <div class="container inner-container1 inner-tour-pack">
                    <div class="row">
                        <?php
                        foreach ($ARTICLES as $ARTICLE) {
                            $id = $ARTICLE['id'];
                            $MEMBER = new Member($ARTICLE['member']);
                            $TYPE = new ArticleType($ARTICLE['article_type']);
                            $CITY = new City($ARTICLE['city']);
                            $ARTICLE_PHOTO = new ArticlePhoto(NULL);
                            $article_photos = $ARTICLE_PHOTO->getArticlePhotosById($id);
                            ?>
                            <div class="tour-pack1 col-md-3 col-sm-4">
                                <div class="tour-pack article-pack">
                                    <div class="tour-img">
                                        <?php
                                        foreach ($article_photos as $key => $img) {
                                            if ($key == 0) {
                                                ?>
                                                <img src="upload/article/thumb/<?php echo $img['image_name']; ?>" alt=""/>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="article-rate pull-right">
                                        <?php
                                        $starNumber = Feedback::getRatingByArticle($id);

                                        for ($x = 1; $x <= $starNumber; $x++) {
                                            echo '<i class="fa fa-star"></i>';
                                        }

                                        while ($x <= 5) {
                                            echo '<i class="fa fa-star-o"></i>';
                                            $x++;
                                        }
                                        ?>
                                    </div>
                                    <div class="tour-dtls">
                                        <div class="row">
                                            <a href="article-view.php?id=<?php echo $ARTICLE['id']; ?>" title="<?php echo $ARTICLE['title']; ?>">
                                                <div class="tour-title col-md-9 pull-left">
                                                    <?php
                                                    if (strlen($ARTICLE['title']) > 18) {
                                                        echo substr($ARTICLE['title'], 0, 17) . '...';
                                                    } else {
                                                        echo $ARTICLE['title'];
                                                    }
                                                    ?>
                                                </div>
                                            </a>
                                            <div class="mem-img col-md-3">
                                                <a href="member-view.php?id=<?php echo $MEMBER->id; ?>" class="link">
                                                    <?php
                                                    if (empty($MEMBER->profile_picture)) {
                                                        ?> 
                                                        <img src="upload/member/member.png" class="img img-responsive img-thumbnail pull-right" id="profil_pic"/>
                                                        <?php
                                                    } else {

                                                        if ($MEMBER->facebookID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                            ?>
                                                            <img src="<?php echo $MEMBER->profile_picture; ?>" class="img-responsive thumbnail pull-right">
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <img src="upload/member/<?php echo $MEMBER->profile_picture; ?>" class="img-responsive thumbnail pull-right">
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row article-city" title="<?php echo $CITY->name; ?>"><i class="fa fa-location-arrow"></i> City: 
                                            <?php
                                            if (strlen($CITY->name) > 20) {
                                                echo substr($CITY->name, 0, 18) . '...';
                                            } else {
                                                echo $CITY->name;
                                            }
                                            ?>
                                        </div>

                                        <div class="row tour-desc"><?php echo substr($ARTICLE['description'], 0, 90) . '...'; ?></div>
                                        <div class="row">
                                            <div class="tour-type pull-left hidden-md hidden-sm visible-lg visible-xs" title="<?php echo $TYPE->name; ?>"><i class="fa fa-certificate"></i> 
                                                <?php
                                                if (strlen($TYPE->name) > 8) {
                                                    echo substr($TYPE->name, 0, 10) . '...';
                                                } else {
                                                    echo $TYPE->name . ' Type';
                                                }
                                                ?>
                                            </div>
                                            <div class="tour-type pull-left visible-md visible-sm" title="<?php echo $TYPE->name; ?>"><i class="fa fa-certificate"></i> 
                                                <?php
                                                if (strlen($TYPE->name) > 4) {
                                                    echo substr($TYPE->name, 0, 6) . '...';
                                                } else {
                                                    echo $TYPE->name . ' Type';
                                                }
                                                ?>
                                            </div>
                                            <a href="article-view.php?id=<?php echo $ARTICLE['id']; ?>"><div class="tour-btn pull-right btn btn-sm blue">Read More<span class="glyphicon glyphicon-eye-open"></span></div></a>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="row col-md-offset-3">
                        <?php Search::showPaginationArticle($keyword, $type, $city, $setLimit, $page); ?>
                    </div>
                </div>
            </section>  
        </div>
        <!-- Our Resort Values style-->  
        <?php
        include './footer.php';
        ?>
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="assets/js/helper.js" type="text/javascript"></script>
        <script src="assets/js/template.js" type="text/javascript"></script>
    </body> 
</html>