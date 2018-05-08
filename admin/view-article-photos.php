<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . './auth.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$ARTICLE = new Article($id);
?> 
<!DOCTYPE html>


<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Add Article Photos - www.srilankatourism.travel</title>
        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />
        <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet">
        <link href="css/themes/all-themes.css" rel="stylesheet" />
    </head>

    <body class="theme-red">
        <?php
        include './navigation-and-header.php';
        ?>

        <section class="content">
            <div class="container-fluid">
                <?php
                $vali = new Validator();
                $vali->show_message();
                ?>
                <!-- Vertical Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>Create Article Photo</h2>
                                <ul class="header-dropdown">
                                    <li class="">
                                        <a href="manage-article.php">
                                            <i class="material-icons">list</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <form class="form-horizontal"  method="post" action="post-and-get/article_photo.php" enctype="multipart/form-data"> 
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="image">Image</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="file" id="image" class="form-control" name="image" required="true">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="caption">Caption</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="caption" class="form-control" placeholder="Enter Image Caption" autocomplete="off" name="caption" required="true">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5"> 
                                            <input type="hidden" id="id" value="<?php echo $ARTICLE->id; ?>" name="id"/>
                                            <input type="submit" name="create" class="btn btn-primary m-t-15 waves-effect" value="create"/>
                                        </div>
                                    </div>
                                    <hr/>
                                </form>

                                <div class="row clearfix">
                                    <?php
                                    $ARTICLEPHOTOS = ArticlePhoto::getArticlePhotosById($id);
                                    if (count($ARTICLEPHOTOS) > 0) {
                                        foreach ($ARTICLEPHOTOS as $key => $img) {
                                            ?>
                                            <div class="col-md-3"  id="div_<?php echo $img['id']; ?>">
                                                <div class="photo-img-container">
                                                    <img src="../upload/article/thumb/<?php echo $img['image_name']; ?>" class="img-responsive ">
                                                </div>
                                                <div class="img-caption">
                                                    <p class="maxlinetitle"><?php echo $img['caption']; ?></p>
                                                    <div class="d">
                                                        <a href="#" class="delete-article-photo" data-id="<?php echo $img['id']; ?>">
                                                            <button class="glyphicon glyphicon-trash delete-btn"></button>
                                                        </a>
                                                        <a href="edit-article-photo.php?id=<?php echo $img['id']; ?>"> 
                                                            <button class="glyphicon glyphicon-pencil edit-btn"></button>
                                                        </a>
                                                        <a href="arrange-article-photos.php?id=<?php echo $id; ?>">  
                                                            <button class="glyphicon glyphicon-random arrange-btn"></button>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    } else {
                                        ?> 
                                        <b style="padding-left: 15px;">No Article photos in the database.</b> 
                                    <?php } ?> 

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Jquery Core Js -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/bootstrap/js/bootstrap.js"></script> 
        <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="plugins/node-waves/waves.js"></script>
        <script src="js/admin.js"></script>
        <script src="js/demo.js"></script>

        <script src="plugins/sweetalert/sweetalert.min.js"></script>
        <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
        <script src="js/pages/ui/dialogs.js"></script>
        <script src="js/demo.js"></script>
        <script src="delete/js/article-photo.js" type="text/javascript"></script>

    </body>

</html>