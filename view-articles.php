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
        <title>Sri Lanka || Tourism</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                                    <div class="tour-dtls">
                                        <div class="row">
                                            <a href="#" title="<?php echo $ARTICLE['title']; ?>">
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
                                                <img src="upload/member/<?php echo $MEMBER->profile_picture; ?>" class="thumbnail  pull-right" title="<?php echo $MEMBER->name; ?>" alt=""/>
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
                                        <div class="row article-location" title="<?php echo $ARTICLE['location']; ?>"><i class="fa fa-location-arrow"></i> Location: 
                                            <?php
                                            if (strlen($ARTICLE['location']) > 20) {
                                                echo substr($ARTICLE['location'], 0, 17) . '...';
                                            } else {
                                                echo $ARTICLE['location'];
                                            }
                                            ?>
                                        </div>

                                        <div class="row tour-desc"><?php echo substr($ARTICLE['description'], 0, 90) . '...'; ?></div>
                                        <div class="row">
                                            <div class="tour-type pull-left" title="<?php echo $TYPE->name; ?>"><i class="fa fa-certificate"></i> 
                                                <?php
                                                if (strlen($TYPE->name) > 13) {
                                                    echo substr($TYPE->name, 0, 10) . '...';
                                                } else {
                                                    echo $TYPE->name;
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
