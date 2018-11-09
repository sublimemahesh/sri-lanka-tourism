<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$TRANSPORTS = new Transports($id);
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
        <title>Edit Transports - www.srilankatourism.travel</title>
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
                <div class="col-md-12 verified-alert"></div> 
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="row  top-bott20"> 
                            <?php
                            $vali = new Validator();

                            $vali->show_message();
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-pencil"></i> Edit Transports</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 

                                                <form class="form-horizontal" method="post" action="post-and-get/transports.php" enctype="multipart/form-data"> 
                                                    <div class="col-md-12">
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="vehicle_type">Vehicle Type</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <select class="form-control" id="vehicle_type" name="vehicle_type">
                                                                    <option value="<?php echo $TRANSPORTS->vehicle_type ?>">
                                                                        <?php
                                                                        $VEHICLE_TYPE = new VehicleType($TRANSPORTS->vehicle_type);
                                                                        echo $VEHICLE_TYPE->name;
                                                                        ?>
                                                                    </option>
                                                                    <?php foreach (VehicleType::all() as $key => $vehicle_t) {
                                                                        ?>
                                                                        <option value="<?php echo $vehicle_t['id']; ?>"><?php echo $vehicle_t['name']; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>

                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="title">Title</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <input type="text" id="title" name="title" class="form-control" placeholder="Please Enter Title" value="<?php echo $TRANSPORTS->title; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="registered_number">Registered Number</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <input type="text" id="registered_number" name="registered_number" class="form-control" placeholder="Please Enter Registered Number" value="<?php echo $TRANSPORTS->registered_number; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="registered_year">Registered Year</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <input type="text" id="registered_year" name="registered_year" class="form-control" placeholder="Please Enter Registered Year" value="<?php echo $TRANSPORTS->registered_year; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="fuel_type_id">Fuel Type</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <select class="form-control"  id="fuel_type_id" name="fuel_type_id">
                                                                    <option value="<?php echo $TRANSPORTS->fuel_type ?>">
                                                                        <?php
                                                                        $FUEL_TYPE = new FuelType($TRANSPORTS->fuel_type);
                                                                        echo $FUEL_TYPE->name;
                                                                        ?>
                                                                    </option>
                                                                    <?php foreach (FuelType::all() as $key => $fuel_t) {
                                                                        ?>
                                                                        <option value="<?php echo $fuel_t['id']; ?>"><?php echo $fuel_t['name']; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>

                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="condition_id">Budget Type</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <select class="form-control" id="condition_id"  name="condition_id">
                                                                    <option value="<?php echo $TRANSPORTS->condition ?>">
                                                                        <?php
                                                                        $VEHICLE_CONDITIONS = new VehicleCondition($TRANSPORTS->condition);
                                                                        echo $VEHICLE_CONDITIONS->name;
                                                                        ?>
                                                                    </option>
                                                                    <?php foreach (VehicleCondition::all() as $key => $condition) {
                                                                        ?>
                                                                        <option value="<?php echo $condition['id']; ?>"><?php echo $condition['name']; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>

                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="title">No of Passengers</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <select class="form-control place-select1 show-tick" id="no_of_passangers" value="<?php echo $TRANSPORTS->no_of_passangers; ?>" class="form-control" placeholder="Enter number of passengers" autocomplete="off" name="no_of_passangers">
                                                                    <option value="<?php echo $TRANSPORTS->no_of_passangers; ?>" selected="true"><?php echo $TRANSPORTS->no_of_passangers; ?></option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                    <option value="13">13</option>
                                                                    <option value="14">14</option>
                                                                    <option value="15">15</option>
                                                                    <option value="16">16</option>
                                                                    <option value="17">17</option>
                                                                    <option value="18">18</option>
                                                                    <option value="19">19</option>
                                                                    <option value="20">20</option>
                                                                    <option value="21">21</option>
                                                                    <option value="22">22</option>
                                                                    <option value="23">23</option>
                                                                    <option value="24">24</option>
                                                                    <option value="25">25</option>
                                                                    <option value="26">26</option>
                                                                    <option value="27">27</option>
                                                                    <option value="28">28</option>
                                                                    <option value="29">29</option>
                                                                    <option value="30">30</option>
                                                                    <option value="31">31</option>
                                                                    <option value="32">32</option>
                                                                    <option value="33">33</option>
                                                                    <option value="34">34</option>
                                                                    <option value="35">35</option>
                                                                    <option value="36">36</option>
                                                                    <option value="37">37</option>
                                                                    <option value="38">38</option>
                                                                    <option value="39">39</option>
                                                                    <option value="40">40</option>
                                                                    <option value="41">41</option>
                                                                    <option value="42">42</option>
                                                                    <option value="43">43</option>
                                                                    <option value="44">44</option>
                                                                    <option value="45">45</option>
                                                                    <option value="46">46</option>
                                                                    <option value="47">47</option>
                                                                    <option value="48">48</option>
                                                                    <option value="49">49</option>
                                                                    <option value="50">50</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="title">No of Baggages</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <select class="form-control place-select1 show-tick" id="no_of_baggages" placeholder="Enter number of baggages" autocomplete="off" name="no_of_baggages" >
                                                                    <option value="<?php echo $TRANSPORTS->no_of_baggages; ?>"><?php echo $TRANSPORTS->no_of_baggages; ?></option>
                                                                    <option value="1">1</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                    <option value="13">13</option>
                                                                    <option value="14">14</option>
                                                                    <option value="15">15</option>
                                                                    <option value="16">16</option>
                                                                    <option value="17">17</option>
                                                                    <option value="18">18</option>
                                                                    <option value="19">19</option>
                                                                    <option value="20">20</option>
                                                                    <option value="21">21</option>
                                                                    <option value="22">22</option>
                                                                    <option value="23">23</option>
                                                                    <option value="24">24</option>
                                                                    <option value="25">25</option>
                                                                    <option value="26">26</option>
                                                                    <option value="27">27</option>
                                                                    <option value="28">28</option>
                                                                    <option value="29">29</option>
                                                                    <option value="30">30</option>
                                                                    <option value="31">31</option>
                                                                    <option value="32">32</option>
                                                                    <option value="33">33</option>
                                                                    <option value="34">34</option>
                                                                    <option value="35">35</option>
                                                                    <option value="36">36</option>
                                                                    <option value="37">37</option>
                                                                    <option value="38">38</option>
                                                                    <option value="39">39</option>
                                                                    <option value="40">40</option>
                                                                    <option value="41">41</option>
                                                                    <option value="42">42</option>
                                                                    <option value="43">43</option>
                                                                    <option value="44">44</option>
                                                                    <option value="45">45</option>
                                                                    <option value="46">46</option>
                                                                    <option value="47">47</option>
                                                                    <option value="48">48</option>
                                                                    <option value="49">49</option>
                                                                    <option value="50">50</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="title">No of Doors</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <select class="form-control place-select1 show-tick" id="no_of_doors" placeholder="Enter number of doors" autocomplete="off" name="no_of_doors" >
                                                                    <option value="<?php echo $TRANSPORTS->no_of_doors; ?>"><?php echo $TRANSPORTS->no_of_doors; ?></option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="title">AC / non AC</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <select class="form-control" autocomplete="off" type="text" id="ac" autocomplete="off" name="ac">
                                                                    <?php
                                                                    if ($TRANSPORTS->ac == 1) {
                                                                        ?>
                                                                        <option value="1" selected="true">Air Conditioned</option>
                                                                        <option value="0">Non Air Conditioned</option>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <option value="0" selected="true">Non Air Conditioned</option>
                                                                        <option value="1">Air Conditioned</option>
                                                                        <?php
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
                                                                <textarea type="text" id="description" name="description" class="form-control" placeholder="Please Enter Description"><?php echo $TRANSPORTS->description; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="top-bott50">
                                                            <div class="bottom-top">
                                                                <input type="hidden" id="oldDis" value=""/>

                                                                <input type="hidden" id="member" name="member" value="<?php echo $_SESSION['id']; ?>"/>
                                                                <input type="hidden" id="id" value="<?php echo $TRANSPORTS->id; ?>" name="id"/>
                                                                <input type="hidden" id="isVerifiedContactNumber" value="<?php echo $isPhoneVerified; ?>" contactnumber="<?php echo $MEMBER->contact_number; ?>">
                                                                <button name="edit-transports" type="submit" class="btn btn-info center-block">Change</button>
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


        </script>

    </body>

</html>
