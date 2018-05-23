<!DOCTYPE html>
<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$ROOM = new Room($id);
$ROOMPRICE = new RoomPrice(NULL);
$details = $ROOMPRICE->all();
$DifferentSeasons = $ROOMPRICE->getAllDistinctSeasons($id);
?> 

<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Accommodation Room Images || My Account || www.srilankatourism.travel</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>

        <style>
            .img-thumbnail {
                max-width: 50% !important;
            }
        </style>
    </head> 
    <body> 
        <div class="loading" id="loading">Loading&#8230;</div>
        <section id="container" > 
            <?php
            include './header-nav.php';
            ?>
            <!--main content start-->
            <section id="main-content">
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="row  top-bott20"> 

                            <?php
                            if (isset($_GET['message'])) {

                                $MESSAGE = New Message($_GET['message']);
                                ?>
                                <div class="alert alert-<?php echo $MESSAGE->status; ?>" role = "alert">
                                    <?php echo $MESSAGE->description; ?>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-save"></i> Manage Room Price - <?php echo $ROOM->name; ?></div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class = "col-md-12 text-left" style="margin-bottom: 25px;">
                                            <a class = "btn btn-info" href = "add-room-price.php?id=<?php echo $id; ?>&aid=<?php echo $id; ?>">Add New Price</a>
                                        </div>
                                        <div class="row mt">
                                            <div class="col-md-12">


                                                <?php
                                                if ($DifferentSeasons) {
                                                    ?>
                                                    <div class="content-panel">
                                                        <table class="table table-striped table-advance table-hover">
                                                            <h4>Price Seasons of <?php echo $ROOM->name; ?></h4>
                                                            <hr>
                                                            <thead>
                                                                <tr>
                                                                    <th>Start</th>
                                                                    <th class="hidden-phone">End</th>
                                                                    <th>Options</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                foreach ($DifferentSeasons as $key => $DifferentSeason) {
                                                                    ?>
                                                                    <tr id="row_<?php echo $DifferentSeason['id']; ?>" row_id="<?php echo $DifferentSeason['id']; ?>">
                                                                        <td><input column="start" class="update-price form-control" type="text"  value="<?php echo $DifferentSeason['start']; ?>" readonly="true"/></td>
                                                                        <td><input column="end" class="update-price form-control" type="text"  value="<?php echo $DifferentSeason['end']; ?>" readonly="true"/></td>
                                                                        <td>       
                                                                            <a href="manage-price.php?start=<?php echo $DifferentSeason['start']; ?>&end=<?php echo $DifferentSeason['end']; ?>" > <button class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></button></a> 
                                                                            <a href="#" class="delete-price-season" start="<?php echo $DifferentSeason['start']; ?>" end="<?php echo $DifferentSeason['end']; ?>" title="Delete Season" ><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o "></i></button></a> 
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div><!-- /content-panel -->
                                                    <?php
                                                } else {
                                                    ?>
                                                    No Price seasons yet
                                                    <?php
                                                }
                                                ?>

                                            </div><!-- /col-md-12 -->
                                        </div><!-- /row -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        </section>
                        <?php
                        include './footer.php';
                        ?>
                        </section>

                        <script src="assets/js/jquery.js"></script>
                        <script src="assets/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
                        <script src="assets/js/bootstrap.min.js"></script>
                        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
                        <script src="assets/js/jquery.scrollTo.min.js"></script>
                        <script src="assets/js/common-scripts.js"></script>

                        <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
                        <script src="assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
                        <script src="delete/js/price-season.js" type="text/javascript"></script>
                        <script>
                            $(function () {
                                var dateToday = new Date();
                                /* global setting */
                                var datepickersOpt = {
                                    dateFormat: 'yy-mm-dd',
                                    minDate: dateToday
                                };

                                $(".datepicker").datepicker($.extend(datepickersOpt));

                            });

                            //custom select box
                            $(function () {
                                $('select.styled').customSelect();
                            });
                        </script>

                        </body>

                        </html>