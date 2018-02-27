<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . './auth.php');
$TRANSPORTS = new Transports(NULL);
$transports = NULL;
if (isset($_GET['member'])) {
    $transports = $TRANSPORTS->getTransportsByMemberId($_GET['member']);
} else {
    $transports = $TRANSPORTS->all();
}
?> 
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Admin || Manage Transports</title>
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
        include 'navigation-and-header.php';
        ?>

        <section class="content">
            <div class="container-fluid"> 
                <!--                Manage Costomer -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Manage Transports
                                    <?php
                                    if (isset($_GET['member'])) {
                                        $MEM = new Member($_GET['member']);
                                        echo ': ' . $MEM->name;
                                    }
                                    ?>
                                </h2>
                                <ul class="header-dropdown">
                                    <li>
                                        <a href="create-transports.php">
                                            <i class="material-icons">add</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <div>
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Vehicle Type</th>
                                                    <th>Title</th> 
                                                    <th>Option</th>

                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Vehicle Type</th>
                                                    <th>Title</th>
                                                    <th>Option</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                               foreach ($transports as $key => $transport) {
                                                    ?>
                                                    <tr id="row_<?php echo $transport['id']; ?>">
                                                        <td><?php echo $transport['id']; ?></td> 
                                                        <td>
                                                            <?php
                                                            $VEHICLE_TYPE = new VehicleType($transport['vehicle_type']);
                                                            echo $VEHICLE_TYPE->name;
                                                            ?>
                                                        </td>

                                                        <td><?php echo $transport['title']; ?></td> 
                                                        <td>  

                                                            <a href="edit-transports.php?id=<?php echo $transport['id']; ?>" <button class="glyphicon glyphicon-pencil edit-btn"></button></a>
                                                            |  
                                                            <a href="#" > 
                                                                <button class="glyphicon glyphicon-trash delete-btn delete-transports" data-id="<?php echo $transport['id']; ?>"></button> 
                                                            </a>  
                                                            |  
                                                            <a href="view-transport-rates.php?id=<?php echo $transport['id']; ?>">
                                                                <button class="glyphicon glyphicon-indent-left arrange-btn"></button>
                                                            </a>
                                                            |
                                                            <a href="view-transport-photo.php?id=<?php echo $transport['id']; ?>">  <button class="glyphicon glyphicon-picture arrange-btn"></button></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>   
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--                 #END# Manage transports-->
                </div>
            </div>
        </section>

        <!-- Jquery Core Js -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/bootstrap/js/bootstrap.js"></script> 
        <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>
        <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
        <script src="plugins/node-waves/waves.js"></script>
        <script src="plugins/sweetalert/sweetalert.min.js"></script>
        <script src="js/admin.js"></script>
        <script src="js/pages/ui/dialogs.js"></script>
        <script src="js/demo.js"></script>
        <script src="delete/js/transports.js" type="text/javascript"></script>
    </body>

</html>