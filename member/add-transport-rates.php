<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$TRANSPORTS = new Transports($id);
$TRANSPORT_RATES = TransportRates::GetTransportRatesByTransportId($id);

$RENT_A_CAR_OBJ = new RentACar(NULL);
$RENT_A_CAR = $RENT_A_CAR_OBJ->TransportExsist($id);
if ($RENT_A_CAR !== FALSE) {
    $PRICE_P_DAY = $RENT_A_CAR['price_per_day'];
    $PRICE_P_EX = $RENT_A_CAR['price_per_excess_mileage'];
} else {
    $PRICE_P_DAY = '';
    $PRICE_P_EX = '';
}
if (isset($_SESSION['isPhoneVerified'])) {
    $isPhoneVerified = $_SESSION['isPhoneVerified'];
}
if ($_SESSION['id'] <> $TRANSPORTS->member) {
    if (Member::logOut()) {
        header('Location: login.php');
    } else {
        header('Location: ?error=2');
    }
}
?> 

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Transports Rates || My Account || www.srilankatourism.travel</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
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

            .demo {
                padding: 30px;
                min-height: 280px;
            }

            .tab-content{
                padding: 10px;
            }


        </style>
    </head> 
    <body> 
        <section id="container" > 
            <?php
            include './header-nav.php';
            ?>
            <!--main content start-->
            <section id="main-content">
                <div class="col-md-12 verified-alert"></div> 
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="row  top-bott20"> 
                            <?php
                            $vali = new Validator();
                            $vali->show_message();
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-save"></i> Create Transport Rates : <?php echo $TRANSPORTS->title; ?></div>
                                <div class="panel-body">
                                    <div class="body">


                                        <div class="demo">
                                            <div role="tabpanel">

                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs nav-justified nav-tabs-dropdown" role="tablist">
                                                    <li role="presentation" class="active"><a href="#price1" aria-controls="home" role="tab" data-toggle="tab">Transport Rate</a></li>
                                                    <li role="presentation"><a href="#price2" aria-controls="profile" role="tab" data-toggle="tab">Self Drive Rates</a></li>

                                                </ul>

                                                <!-- Tab panes -->
                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane active" id="price1">

                                                        <div class="userccount">
                                                            <div class="formpanel"> 
                                                                <form class="form-horizontal"  method="post" action="post-and-get/transport-rate.php" enctype="multipart/form-data"> 
                                                                    <div class="col-md-12">

                                                                        <div class="">
                                                                            <div class="col-md-6">
                                                                                <div class="bottom-top">
                                                                                    <label for="location_from">Location From</label>
                                                                                    <div class="formrow">
                                                                                        <input type="text" autocomplete="off" id="from" placeholder="Please select start location" class="form-control">
                                                                                        <input type="hidden" name="from" value="" id="from-id" />
                                                                                        <div id="suggesstion-box">
                                                                                            <ul id="city-list-from" class="city-list"></ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="bottom-top">
                                                                                    <label for="location_to">Location To</label>
                                                                                    <div class="formrow">
                                                                                        <input type="text" id="to" autocomplete="off" placeholder="Please select end location" class="form-control">
                                                                                        <div id="suggesstion-box">
                                                                                            <ul id="city-list-to" class="city-list"></ul>
                                                                                        </div>
                                                                                        <input type="hidden" name="to" value="" id="to-id" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>


                                                                        <div class="">
                                                                            <div class="col-md-6">
                                                                                <div class="bottom-top">
                                                                                    <label for="distance">Distance(KM)</label>
                                                                                    <div class="formrow">
                                                                                        <input type="text" id="price" class="form-control" placeholder="Enter Distance" autocomplete="off" name="distance" required="true">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="bottom-top">
                                                                                    <label for="price">Price(USD)</label>
                                                                                    <div class="formrow">
                                                                                        <input type="text" id="price" class="form-control" placeholder="Enter Price" autocomplete="off" name="price" required="true">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="top-bott50">
                                                                                <div class="bottom-top">
                                                                                    <input type="hidden" id="id" class="form-control" placeholder="Enter id" autocomplete="off" name="id" required="true">
                                                                                    <input type="hidden" id="member" name="member" value="<?php echo $_SESSION['id']; ?>"/>
                                                                                    <input type="hidden" id="id" value="<?php echo $TRANSPORTS->id; ?>" name="id"/>
                                                                                    <input type="hidden" value="<?php echo $id ?>" name="id" />
                                                                                    <button name="add-transport-rate" type="submit" class="btn btn-info">Create</button>
                                                                                </div>
                                                                            </div>   
                                                                        </div>
                                                                    </div>   
                                                                </form>  


                                                            </div>
                                                        </div>
                                                        <div class="panel-heading"> Manage Transport Rates</div>
                                                        <div class="body">
                                                            <div class="table-responsive">
                                                                <div>
                                                                    <?php
                                                                    if (count($TRANSPORT_RATES) > 0) {
                                                                        ?>
                                                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>ID</th>
                                                                                    <th>From</th>
                                                                                    <th>To</th> 
                                                                                    <th>Distance</th>
                                                                                    <th>Price</th>
                                                                                    <th>Option</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <th>ID</th>
                                                                                    <th>From</th>
                                                                                    <th>To</th> 
                                                                                    <th>Distance</th>
                                                                                    <th>Price</th>
                                                                                    <th>Option</th>
                                                                                </tr>
                                                                            </tfoot>
                                                                            <tbody>
                                                                                <?php
                                                                                foreach ($TRANSPORT_RATES as $key => $transport_rates) {
                                                                                    $key++
                                                                                    ?>
                                                                                    <tr id="row_<?php echo $transport_rates['id']; ?>">
                                                                                        <td><?php echo $key; ?></td> 
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
                                                                                        <td><?php echo $transport_rates['distance']; ?> Km</td>
                                                                                        <td class="text-right"> USD. <?php echo $transport_rates['price']; ?>.00</td>
                                                                                        <td> 
                                                                                            <a href="#"> 
                                                                                                <button class="btn btn-danger btn-sm all-icon fa fa-trash-o delete-transport-rates" data-id="<?php echo $transport_rates['id']; ?>"></button>
                                                                                            </a> |

                                                                                            <a href="edit-transport-rate.php?id=<?php echo $transport_rates['id']; ?>">
                                                                                                <button class="btn btn-primary btn-sm all-icon fa fa-pencil"></button>
                                                                                            </a> 

                                                                                        </td>
                                                                                    </tr>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </tbody>
                                                                        </table>

                                                                    <?php } else {
                                                                        ?> 
                                                                        <b style="padding-left: 15px;">No Transports Rates in the database.</b> 
                                                                    <?php } ?> 

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane" id="price2">
                                                        <form class="form-horizontal"  method="post" action="post-and-get/rent-a-car.php"> 
                                                            <div class="col-md-12">
                                                                <div class="bottom-top">
                                                                    <label for="distance">Price per day(USD)</label>
                                                                    <div class="formrow">
                                                                        <input type="text" id="price_p_day" value="<?php echo $PRICE_P_DAY; ?>"  class="form-control" placeholder="Enter price" autocomplete="off" name="price_p_day" required="true">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="bottom-top">
                                                                    <label for="distance">Price per excess mileage(USD)</label>
                                                                    <div class="formrow">
                                                                        <input type="text" id="price_p_extra" value="<?php echo $PRICE_P_EX; ?>" class="form-control" placeholder="Enter price" autocomplete="off" name="price_p_extra" required="true">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="top-bott50">
                                                                    <div class="bottom-top">
                                                                        <input type="hidden" id="id" value="<?php echo $TRANSPORTS->id; ?>" name="id"/>
                                                                        <button name="update" type="submit" class="btn btn-info">Update</button>
                                                                        <input type="hidden" id="isVerifiedContactNumber" value="<?php echo $isPhoneVerified; ?>" >
                                                                    </div>
                                                                </div>   
                                                            </div>
                                                        </form>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
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
        <script src="assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/common-scripts.js"></script>
        <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

        <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <script src="assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <script src="delete/js/transport-rate.js" type="text/javascript"></script>
        <script src="js/city-from.js" type="text/javascript"></script>
        <script src="js/city-to.js" type="text/javascript"></script>
        <script src="js/display-contact-number-verification-alert.js" type="text/javascript"></script>
        <script>
            //custom select box

            $(function () {
                $('select.styled').customSelect();
            });

        </script>
        <script src="assets/tinymce/js/tinymce/tinymce.min.js"></script>
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

            //open and close tab menu
            $('.nav-tabs-dropdown')
                    .on("click", "li:not('.active') a", function (event) {
                        $(this).closest('ul').removeClass("open");
                    })
                    .on("click", "li.active a", function (event) {
                        $(this).closest('ul').toggleClass("open");
                    });
        </script>
    </body>

</html>
