<?php
include_once(dirname(__FILE__) . '/class/include.php');
?>
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
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet"> 

    </head>


    <!-- Our Resort Values style-->
    <?php
    include './header.php';
    ?>
    <div class="container">
        <div class="row background-image" style="background-color: #fff; ">
            <?php

            foreach ($ALL_TOUR_OBJ = TourType::all() as $tour_type) {
                ?>
                <div class="col-md-4 col-lg-4" style="margin-top: 30px;" >
                    <a href="view-tour-packages.php?type=<?php echo $tour_type['id']?> ">
                        <img src="upload/tour-type/thumb/<?php echo $tour_type['picture_name']?> "alt="" style="border-radius: 6px;"/>
                        <div class="erty" title="dfsf"><?php echo (strtoupper($tour_type['name']));?></div>
                    </a>
                </div>
                <?php
            }
            ?>


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



</html>
