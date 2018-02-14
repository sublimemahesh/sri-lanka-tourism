<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . './auth.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$TRANSPORTS = new Transports($id);
?> 
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Add New Transports Rates - www.srilankatourism.travel</title>
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
        <!-- Bootstrap Spinner Css -->
        <link href="plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">
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
                                <h2>Create Transports Rates</h2>
                                <ul class="header-dropdown">
                                    <li class="">
                                        <a href="manage-transports.php">
                                            <i class="material-icons">list</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <form class="form-horizontal"  method="post" action="post-and-get/transport-rates.php" enctype="multipart/form-data"> 
                                    <div class="row clearfix">

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="location_from">Location From</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group place-select">
                                                    <div class="form-line">
                                                        <select class="form-control place-select1 show-tick" autocomplete="off" type="text" id="location_from" autocomplete="off" name="location_from" required="TRUE">
                                                            <option value=""> -- Please Select -- </option>
                                                            <?php foreach (City::all() as $key => $location_from) {
                                                                ?>
                                                                <option value="<?php echo $location_from['id']; ?>"><?php echo $location_from['name']; ?></option><?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="location_to">Location To</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group place-select">
                                                    <div class="form-line">
                                                        <select class="form-control place-select1 show-tick" autocomplete="off" type="text" id="location_to" autocomplete="off" name="location_to" required="TRUE">
                                                            <option value=""> -- Please Select -- </option>
                                                            <?php foreach (City::all() as $key => $location_to) {
                                                                ?>
                                                                <option value="<?php echo $location_to['id']; ?>"><?php echo $location_to['name']; ?></option><?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="price">Price</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="price" class="form-control" placeholder="Enter Price" autocomplete="off" name="price" required="true">
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5"> 
                                            <input type="hidden" id="id" value="<?php echo $TRANSPORTS->id; ?>" name="id"/>
                                            <input type="submit" name="add-transport-rates" class="btn btn-primary m-t-15 waves-effect" value="create"/>
                                        </div>
                                    </div>
                                    <hr/>
                                </form>


                                <div class="body">
                                    <div class="table-responsive">
                                        <div>
                                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>From</th>
                                                        <th>To</th> 
                                                        <th>Price</th>
                                                        <th>Option</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>From</th>
                                                        <th>To</th> 
                                                        <th>Price</th>
                                                        <th>Option</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php
                                                    $TRANSPORT_RATES = TransportRates::GetTransportRatesByTransportId($id);
                                                    if (count($TRANSPORT_RATES) > 0) {
                                                        foreach ($TRANSPORT_RATES as $key => $transport_rates) {
                                                            ?>
                                                            <tr id="row_<?php echo $transport_rates['id']; ?>">
                                                                <td><?php echo $transport_rates['sort']; ?></td> 
                                                                <td>
                                                                    <?php
                                                                    $city = new City($transport_rates['location_from']);
                                                                    echo $city->name;
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    $CITY = new City($transport_rates['location_to']);
                                                                    echo $CITY->name;
                                                                    ?>
                                                                </td>
                                                                <td> $<?php echo $transport_rates['price']; ?></td>
                                                                <td> 
                                                                    <a href="#"> <button class="glyphicon glyphicon-trash delete-btn delete-transport-rates" data-id="<?php echo $transport_rates['id']; ?>"></button></a>
                                                                    <a href="edit-transport-rates.php?id=<?php echo $transport_rates['id']; ?>"> <button class="glyphicon glyphicon-pencil edit-btn"></button></a>
                                                                    <a href="arrange-transport-rates.php?id=<?php echo $id; ?>">  <button class="glyphicon glyphicon-random arrange-btn"></button></a>

                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?> 
                                                    <b style="padding-left: 15px;">No Transports Rates in the database.</b> 
                                                <?php } ?> 
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
        <script src="js/add-new-ad.js" type="text/javascript"></script>


        <script src="plugins/sweetalert/sweetalert.min.js"></script>
        <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
        <script src="js/pages/ui/dialogs.js"></script>
        <script src="js/demo.js"></script>
        <script src="tinymce/js/tinymce/tinymce.min.js"></script>
        <script src="delete/js/transport-rates.js" type="text/javascript"></script>
        <script>
            tinymce.init({
                selector: "#description",
                // ===========================================
                // INCLUDE THE PLUGIN
                // ===========================================

                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                // ===========================================
                // PUT PLUGIN'S BUTTON on the toolbar
                // ===========================================

                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
                // ===========================================
                // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
                // ===========================================

                relative_urls: false

            });


        </script>
    </body>

</html>