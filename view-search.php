<?php
include_once(dirname(__FILE__) . '/class/include.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sri Lanka || Tourism</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/styles.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link href="css/search.css" rel="stylesheet" type="text/css"/>
        <link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
        <link href="admin/plugins/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet">
        <link href="css/tour-package-styles.css" rel="stylesheet" type="text/css"/>
        <link href="css/view-search.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <!-- Our Resort Values style-->
        <?php
        include './header.php';
        ?>

        <div class="container inner-container1 inner-tour-pack">
            <!-- Nav tabs -->
            <div class="col-md-12">
                <ul class="nav nav-tabs nav-padding" role="tablist">
                    <li class="nav-item tab-style">
                        <a class="nav-link active" data-toggle="tab" href="#taxi" role="tab">Taxi</a>
                    </li>
                    <li class="nav-item tab-style">
                        <a class="nav-link" data-toggle="tab" href="#tours" role="tab">Tours</a>
                    </li>
                    <li class="nav-item tab-style">
                        <a class="nav-link" data-toggle="tab" href="#hotels" role="tab">Hotels</a>
                    </li>
                    <li class="nav-item tab-style">
                        <a class="nav-link" data-toggle="tab" href="#offers" role="tab">Offers</a>
                    </li>
                    <li class="nav-item tab-style">
                        <a class="nav-link" data-toggle="tab" href="#articles" role="tab">Articles</a>
                    </li>
                </ul>
            </div>

            <!-- Tab panes {Fade}  -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="taxi" name="taxi" role="tabpanel">
                    <div class="bs-callout bs-callout-danger">
                        <h4>Taxi</h4>
                    </div>
                </div>

                <div class="tab-pane fade" id="tours" name="tours" role="tabpanel">
                    <div class="bs-callout bs-callout-danger">
                        <h4>Tours</h4>
                    </div>
                </div>

                <div class="tab-pane fade" id="hotels" name="hotels" role="tabpanel">
                    <div class="bs-callout bs-callout-danger">
                        <h4>Hotels</h4> 
                    </div>
                </div>

                <div class="tab-pane fade" id="offers" name="offers" role="tabpanel">
                    <div class="bs-callout bs-callout-danger">
                        <h4>Offers</h4>
                    </div>
                </div>
                <div class="tab-pane fade" id="articles" name="articles" role="tabpanel">
                    <div class="bs-callout bs-callout-danger">
                        <h4>Articles</h4>
                    </div>
                </div>
            </div>
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
        <script src="js/view-search.js" type="text/javascript"></script>
    </body> 

</html>
