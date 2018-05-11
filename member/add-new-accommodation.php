<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
?> 
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Accommodation- www.srilankatourism.travel</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-datepicker/css/datepicker.html" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/daterangepicker.html" />
        <link href="assets/plugins/jquery-steps/jquery.steps.css" rel="stylesheet" type="text/css"/>
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
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
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-pencil"></i>Create Accommodation</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 

                                                <form class="form-horizontal"  method="post" action="post-and-get/accommodation.php" enctype="multipart/form-data" id="form-accommodation"> 
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="body">
                                                                <div class="row clearfix">
                                                                    <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                                                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                                            <div class="panel panel-default">
                                                                                <a role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                    <div class="panel-heading tab-panel-heading" role="tab" id="headingOne">
                                                                                        <h4 class="panel-title">
                                                                                            Your Accommodation Details
                                                                                        </h4>
                                                                                    </div>
                                                                                </a>
                                                                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                                                    <div class="panel-body">
                                                                                        <div class="">
                                                                                            <div class="bottom-top">
                                                                                                <label for="Name">Name</label>
                                                                                            </div>
                                                                                            <div class="formrow">
                                                                                                <input type="text" id="name" name="name" class="form-control" placeholder="Please Enter Name">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="">
                                                                                            <div class="bottom-top">
                                                                                                <label for="Address">Address</label>
                                                                                            </div>
                                                                                            <div class="formrow">
                                                                                                <input type="text" id="address" name="address" class="form-control" placeholder="Please Enter Your Address">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="">
                                                                                            <div class="bottom-top">
                                                                                                <label for="Email">Email</label>
                                                                                            </div>
                                                                                            <div class="formrow">
                                                                                                <input type="email" id="email" name="email" class="form-control" placeholder="Please Enter Your Email Address">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="">
                                                                                            <div class="bottom-top">
                                                                                                <label for="Phone">Phone</label>
                                                                                            </div>
                                                                                            <div class="formrow">
                                                                                                <input type="text" id="phone" name="phone" class="form-control" placeholder="Please Enter Your Phone Number">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="">
                                                                                            <div class="bottom-top">
                                                                                                <label for="Website">Website</label>
                                                                                            </div>
                                                                                            <div class="formrow">
                                                                                                <input type="text" id="website" name="website" class="form-control" placeholder="Please Enter Your Website">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="">
                                                                                            <div class="bottom-top">
                                                                                                <label for="Accomodation_type">Accomodation Type</label>
                                                                                            </div>
                                                                                            <div class="formrow">
                                                                                                <select class="form-control" autocomplete="off" type="text" id="type" autocomplete="off" name="type" required="TRUE">
                                                                                                    <option value=""> -- Please Select -- </option>
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
                                                                                                    <option value=""> -- Please Select -- </option>
                                                                                                    <?php foreach (City::all() as $key => $city) {
                                                                                                        ?>
                                                                                                        <option value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option><?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </select>

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12 text-right">
                                                                                            <a role="button" id="step-1" class="btn btn-info tab-next-button" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                                                                                                Next >>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel panel-default">
                                                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="false"
                                                                                   aria-controls="collapseTwo">
                                                                                    <div class="panel-heading tab-panel-heading" role="tab" id="headingTwo">
                                                                                        <h4 class="panel-title">
                                                                                            Accommodations Photos
                                                                                        </h4>
                                                                                    </div>
                                                                                </a>
                                                                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                                                    <div class="panel-body">
                                                                                        <div class="bottom-top col-md-2">
                                                                                            <div class="formrow">
                                                                                                <div class="uploadphotobx" id="uploadphotobx"> 
                                                                                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                                                                                    <label class="uploadBox">Click here to Upload photo
                                                                                                        <input type="file" name="accommodation-picture" id="accommodation-picture">
                                                                                                        <input type="hidden" name="upload-accommodation-image" id="upload-accommodation-image" value="TRUE"/>
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div id="image-list">
                                                                                        </div>
                                                                                        <div class="col-md-12 text-right">
                                                                                            <a role="button" id="step-2" class="btn btn-info tab-next-button" data-toggle="collapse" aria-expanded="true">
                                                                                                Next >>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel panel-default">
                                                                                <a class="collapsed" role="button" data-toggle="collapse"  href="#collapseThree" aria-expanded="false"
                                                                                   aria-controls="collapseThree">
                                                                                    <div class="panel-heading tab-panel-heading" role="tab" id="headingThree">
                                                                                        <h4 class="panel-title">
                                                                                            Accommodation Facilities
                                                                                        </h4>
                                                                                    </div>
                                                                                </a>
                                                                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                                                    <div class="panel-body">
                                                                                        <div class="table-responsive">
                                                                                            <div>
                                                                                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th>ID</th>
                                                                                                            <th>Name</th>
                                                                                                            <th>Option</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tfoot>
                                                                                                        <tr>
                                                                                                            <th>ID</th>
                                                                                                            <th>Name</th>
                                                                                                            <th>Option</th>
                                                                                                        </tr>
                                                                                                    </tfoot>
                                                                                                    <tbody>
                                                                                                        <?php
                                                                                                        $ACCOMODATION_GENERAL_FACILITY = new AccommodationGeneralFacilities(NULL);
                                                                                                        $ACCOMODATION_FACILITY_DETAILS = new AccommodationFacilityDetails(NULL);
                                                                                                        foreach ($ACCOMODATION_GENERAL_FACILITY->all() as $key => $accommodation_general_facility) {
                                                                                                            ?>
                                                                                                            <tr id="row_<?php echo $accommodation_general_facility['id']; ?>">
                                                                                                                <td><?php echo $accommodation_general_facility['sort']; ?></td> 
                                                                                                                <td><?php echo $accommodation_general_facility['name']; ?></td> 
                                                                                                                <td> 
                                                                                                                    <input  id="facility-check" value="<?php echo $accommodation_general_facility['id']; ?>" name="facility[]" type="checkbox">
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <?php
                                                                                                        }
                                                                                                        ?>   
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12 text-right">
                                                                                            <a role="button" id="step-3"class="btn btn-info tab-next-button" data-toggle="collapse" aria-expanded="true">
                                                                                                Next >>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel panel-default">
                                                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapseFour" aria-expanded="false"
                                                                                   aria-controls="collapseFour">
                                                                                    <div class="panel-heading tab-panel-heading" role="tab" id="headingFour">
                                                                                        <h4 class="panel-title">
                                                                                            Description
                                                                                        </h4>
                                                                                    </div>
                                                                                </a>
                                                                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                                                                    <div class="panel-body">
                                                                                        <div class="col-md-12">
                                                                                            <div class="bottom-top">
                                                                                                <label for="Description">Description</label>
                                                                                            </div>
                                                                                            <div class="formrow">
                                                                                                <textarea id="description" name="description" class="form-control" rows="5"></textarea> 
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="top-bott50 col-md-12">
                                                                                            <div class="bottom-top">
                                                                                                <input type="hidden" id="member" name="member" value="<?php echo $_SESSION['id']; ?>"/>
                                                                                                <button name="create" id="create" type="submit" class="btn btn-info center-block">Create</button>
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
        <script src="assets/plugins/jquery-steps/jquery.steps.js" type="text/javascript"></script>
        <script src="js/post-accommodation-image.js" type="text/javascript"></script>
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
        <script src="js/add-new-accommodation.js" type="text/javascript"></script>
        <script src="assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
    </body>

</html>
