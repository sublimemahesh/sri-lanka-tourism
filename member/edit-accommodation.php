<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$ACCOMODATION = new Accommodation($id);
$a_type = new AccommodationType($ACCOMODATION->type);
$city_name = new City($ACCOMODATION->city);
?> 
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Edit Accommodation - www.srilankatourism.travel</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-datepicker/css/datepicker.html" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/daterangepicker.html" />

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
                            $vali = new Validator();

                            $vali->show_message();
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-pencil"></i> Edit Accommodation</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 
                                                <form class="form-horizontal"  method="post" action="post-and-get/accommodation.php" enctype="multipart/form-data"> 
                                                    <div class="col-md-12">
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="Name">Name</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <input type="text" id="name" value="<?php echo $ACCOMODATION->name; ?>" name="name" class="form-control" placeholder="Please Enter Name">
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="Address">Address</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <input type="text" id="address" value="<?php echo $ACCOMODATION->address; ?>" name="address" class="form-control" placeholder="Please Enter Your Address">
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="Email">Email</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <input type="email" id="email" name="email" value="<?php echo $ACCOMODATION->email; ?>" class="form-control" placeholder="Please Enter Your Email Address">
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="Phone">Phone</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <input type="text" id="phone" name="phone" value="<?php echo $ACCOMODATION->phone; ?>" class="form-control" placeholder="Please Enter Your Phone Number">
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="Website">Website</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <input type="text" id="website" name="website" value="<?php echo $ACCOMODATION->website; ?>" class="form-control" placeholder="Please Enter Your Website">
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="Accomodation_type">Accomodation Type</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <select class="form-control" autocomplete="off" type="text" id="type" value="<?php echo $ACCOMODATION->type; ?>" autocomplete="off" name="type" required="TRUE">
                                                                    <option value="<?php echo $ACCOMODATION->type ?>"><?php echo $a_type->name ?></option>
                                                                    <?php foreach (AccommodationType::all() as $key => $type) {
                                                                        ?>
                                                                        <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option><?php
                                                                }
                                                                    ?>
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="city">City</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <select class="form-control" autocomplete="off" type="text" id="city" autocomplete="off" name="city" required="TRUE">
                                                                    <option value="<?php echo $ACCOMODATION->city ?>"><?php echo $city_name->name ?></option>
                                                                    <?php foreach (City::all() as $key => $city) {
                                                                        ?>
                                                                        <option value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option><?php
                                                                }
                                                                    ?>
                                                                </select>

                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="description">Description</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <textarea type="text" id="description" name="description" class="form-control" placeholder="Please Enter Description"><?php echo $ACCOMODATION->description ?></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="top-bott50">
                                                            <div class="bottom-top">
                                                                <input type="hidden" id="member" name="member" value="<?php echo $_SESSION['id']; ?>"/>
                                                                <input type="hidden" id="id" name="id" value="<?php echo $ACCOMODATION->id ?>"/>
                                                                <button name="update" type="submit" class="btn btn-info center-block">Update</button>
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
            </section>

            <?php
            include './footer.php';
            ?>
        </section>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


        <!--common script for all pages-->
        <script src="assets/js/common-scripts.js"></script>

        <!--script for this page-->
        <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

        <!--custom switch-->
        <script src="assets/js/bootstrap-switch.js"></script>

        <!--custom tagsinput-->
        <script src="assets/js/jquery.tagsinput.js"></script>

        <!--custom checkbox & radio-->

        <script type="text/javascript" src="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-datepicker/js/bootstrap-datepicker.html"></script>
        <script type="text/javascript" src="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/date.html"></script>
        <script type="text/javascript" src="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/daterangepicker-2.html"></script>

        <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>


        <script src="assets/js/form-component.js"></script>    


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


        </script>

    </body>

</html>
