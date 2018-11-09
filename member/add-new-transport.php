<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$MEMBER = new Member($_SESSION['id']);

if (isset($_SESSION['isPhoneVerified'])) {
    $isPhoneVerified = $_SESSION['isPhoneVerified'];
}
if (empty($MEMBER->licence_front) || empty($MEMBER->licence_back)) {
    redirect('manage-licence-photos.php?message=27');
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

        <title>Add New Transport - www.srilankatourism.travel</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" /> 
        <link href="assets/plugins/jquery-steps/jquery.steps.css" rel="stylesheet" type="text/css"/>
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
        <link href="plugins/Preloader/jm.spinner.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
        <style>
            .img-thumbnail {
                max-width: 50% !important;
            }
        </style>

        
    </head> 
    <body> 
        
        <div class="box"></div>  
        <section id="container" > 
            <?php
            include './header-nav.php';
            ?>
            <!--main content start-->
            <section id="main-content">
                <div class="col-md-12 verified-alert"></div> 
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="row top-bott20">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-plus"></i> 
                                    Add New Vehicle
                                </div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 
                                                <form class="form-horizontal"  method="post" action="post-and-get/transports.php" enctype="multipart/form-data" id="form-transport"> 
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                                                        <div class="body">
                                                            <div class="row clearfix">
                                                                <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                                                    <div class="panel-group" role="tablist" aria-multiselectable="true">
                                                                        <div class="panel panel-default">
                                                                            <a role="button" data-toggle="collapse">
                                                                                <div class="panel-heading tab-panel-heading" role="tab" id="headingOne">
                                                                                    <h4 class="panel-title">
                                                                                        Vehicle Details
                                                                                    </h4>
                                                                                </div>
                                                                            </a>
                                                                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                                                <div class="panel-body">

                                                                                    <div class="col-md-12">
                                                                                        <div class="bottom-top">
                                                                                            <label for="vehicle_type">Vehicle Type</label>
                                                                                        </div>
                                                                                        <div class="formrow">
                                                                                            <select class="form-control" autocomplete="off" type="text" id="vehicle_type" autocomplete="off" name="vehicle_type" required="TRUE">
                                                                                                <option value=""> -- Select your vehicle type -- </option>
                                                                                                <?php foreach (VehicleType::all() as $key => $vehicle) {
                                                                                                    ?>
                                                                                                    <option value="<?php echo $vehicle['id']; ?>"><?php echo $vehicle['name']; ?></option><?php
                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-12">
                                                                                        <div class="bottom-top">
                                                                                            <label for="title">Title</label>
                                                                                        </div>
                                                                                        <div class="formrow">
                                                                                            <input type="text" id="title" name="title" class="form-control" placeholder="Enter a title for your service">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-12">
                                                                                        <div class="bottom-top">
                                                                                            <label for="registered_number">Registered Number</label>
                                                                                        </div>
                                                                                        <div class="formrow">
                                                                                            <input type="text" id="registered_number" name="registered_number" class="form-control" placeholder="Enter registered number of the vehicle">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-12">
                                                                                        <div class="bottom-top">
                                                                                            <label for="registered_year">Registered Year</label>
                                                                                        </div>
                                                                                        <div class="formrow">
                                                                                            <select id="registered_year" name="registered_year" class="form-control">
                                                                                                <option value="">-- Please select --</option>
                                                                                                <option value="2018">2018</option>
                                                                                                <option value="2017">2017</option>
                                                                                                <option value="2016">2016</option>
                                                                                                <option value="2015">2015</option>
                                                                                                <option value="2014">2014</option>
                                                                                                <option value="2013">2013</option>
                                                                                                <option value="2012">2012</option>
                                                                                                <option value="2011">2011</option>
                                                                                                <option value="2010">2010</option>
                                                                                                <option value="2009">2009</option>
                                                                                                <option value="2008">2008</option>
                                                                                                <option value="2007">2007</option>
                                                                                                <option value="2006">2006</option>
                                                                                                <option value="2005">2005</option>
                                                                                                <option value="2004">2004</option>
                                                                                                <option value="2003">2003</option>
                                                                                                <option value="2002">2002</option>
                                                                                                <option value="2001">2001</option>
                                                                                                <option value="2000">2000</option>
                                                                                                <option value="1999">1999</option>
                                                                                                <option value="1998">1998</option>
                                                                                                <option value="1997">1997</option>
                                                                                                <option value="1996">1996</option>
                                                                                                <option value="1995">1995</option>
                                                                                                <option value="1994">1994</option>
                                                                                                <option value="1993">1993</option>
                                                                                                <option value="1992">1992</option>
                                                                                                <option value="1991">1991</option>
                                                                                                <option value="1990">1990</option>
                                                                                                <option value="1989">1989</option>
                                                                                                <option value="1988">1988</option>
                                                                                                <option value="1987">1987</option>
                                                                                                <option value="1986">1986</option>
                                                                                                <option value="1985">1985</option>
                                                                                                <option value="1984">1984</option>
                                                                                                <option value="1983">1983</option>
                                                                                                <option value="1982">1982</option>
                                                                                                <option value="1981">1981</option>
                                                                                                <option value="1980">1980</option>
                                                                                                <option value="1979">1979</option>
                                                                                                <option value="1978">1978</option>
                                                                                                <option value="1977">1977</option>
                                                                                                <option value="1976">1976</option>
                                                                                                <option value="1975">1975</option>
                                                                                                <option value="1974">1974</option>
                                                                                                <option value="1973">1973</option>
                                                                                                <option value="1972">1972</option>
                                                                                                <option value="1971">1971</option>
                                                                                                <option value="1970">1970</option>
                                                                                                <option value="1969">1969</option>
                                                                                                <option value="1968">1968</option>
                                                                                                <option value="1967">1967</option>
                                                                                                <option value="1966">1966</option>
                                                                                                <option value="1965">1965</option>
                                                                                                <option value="1964">1964</option>
                                                                                                <option value="1963">1963</option>
                                                                                                <option value="1962">1962</option>
                                                                                                <option value="1961">1961</option>
                                                                                                <option value="1960">1960</option>
                                                                                                <option value="1959">1959</option>
                                                                                                <option value="1958">1958</option>
                                                                                                <option value="1957">1957</option>
                                                                                                <option value="1956">1956</option>
                                                                                                <option value="1955">1955</option>
                                                                                                <option value="1954">1954</option>
                                                                                                <option value="1953">1953</option>
                                                                                                <option value="1952">1952</option>
                                                                                                <option value="1951">1951</option>
                                                                                                <option value="1950">1950</option>
                                                                                                <option value="1949">1949</option>
                                                                                                <option value="1948">1948</option>
                                                                                                <option value="1947">1947</option>
                                                                                                <option value="1946">1946</option>
                                                                                                <option value="1945">1945</option>
                                                                                                <option value="1944">1944</option>
                                                                                                <option value="1943">1943</option>
                                                                                                <option value="1942">1942</option>
                                                                                                <option value="1941">1941</option>
                                                                                                <option value="1940">1940</option>
                                                                                                <option value="1939">1939</option>
                                                                                                <option value="1938">1938</option>
                                                                                                <option value="1937">1937</option>
                                                                                                <option value="1936">1936</option>
                                                                                                <option value="1935">1935</option>
                                                                                                <option value="1934">1934</option>
                                                                                                <option value="1933">1933</option>
                                                                                                <option value="1932">1932</option>
                                                                                                <option value="1931">1931</option>
                                                                                                <option value="1930">1930</option>
                                                                                                <option value="1929">1929</option>
                                                                                                <option value="1928">1928</option>
                                                                                                <option value="1927">1927</option>
                                                                                                <option value="1926">1926</option>
                                                                                                <option value="1925">1925</option>
                                                                                                <option value="1924">1924</option>
                                                                                                <option value="1923">1923</option>
                                                                                                <option value="1922">1922</option>
                                                                                                <option value="1921">1921</option>
                                                                                                <option value="1920">1920</option>
                                                                                                <option value="1919">1919</option>
                                                                                                <option value="1918">1918</option>
                                                                                                <option value="1917">1917</option>
                                                                                                <option value="1916">1916</option>
                                                                                                <option value="1915">1915</option>
                                                                                                <option value="1914">1914</option>
                                                                                                <option value="1913">1913</option>
                                                                                                <option value="1912">1912</option>
                                                                                                <option value="1911">1911</option>
                                                                                                <option value="1910">1910</option>
                                                                                                <option value="1909">1909</option>
                                                                                                <option value="1908">1908</option>
                                                                                                <option value="1907">1907</option>
                                                                                                <option value="1906">1906</option>
                                                                                                <option value="1905">1905</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-12">
                                                                                        <div class="bottom-top">
                                                                                            <label for="fuel_type_id">Fuel Type</label>
                                                                                        </div>
                                                                                        <div class="formrow">
                                                                                            <select class="form-control" autocomplete="off" type="text" id="fuel_type_id" autocomplete="off" name="fuel_type_id" required="TRUE">
                                                                                                <option value=""> -- Select the fuel type of the vehicle -- </option>
                                                                                                <?php foreach (FuelType::all() as $key => $fuel_type) {
                                                                                                    ?>
                                                                                                    <option value="<?php echo $fuel_type['id']; ?>"><?php echo $fuel_type['name']; ?></option><?php
                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div> 
                                                                                    <div class="col-md-12 text-right">
                                                                                        <a id="step-1" role="button"  class="btn btn-info tab-next-button" data-toggle="collapse" aria-expanded="true">
                                                                                            Next >>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="panel panel-default">
                                                                            <a role="button">
                                                                                <div class="panel-heading tab-panel-heading" role="tab" id="headingOne">
                                                                                    <h4 class="panel-title">
                                                                                        Vehicle Condition & Facilities
                                                                                    </h4>
                                                                                </div>
                                                                            </a>
                                                                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                                                <div class="panel-body">

                                                                                    <div class="col-md-12">
                                                                                        <div class="bottom-top">
                                                                                            <label for="condition_id">Vehicle Budget</label>
                                                                                        </div>
                                                                                        <div class="formrow">
                                                                                            <select class="form-control" autocomplete="off" type="text" id="condition_id" autocomplete="off" name="condition_id" required="TRUE">
                                                                                                <option value=""> -- Select the vehicle Budget -- </option>
                                                                                                <?php foreach (VehicleCondition::all() as $key => $vehicle_c) {
                                                                                                    ?>
                                                                                                    <option value="<?php echo $vehicle_c['id']; ?>"><?php echo $vehicle_c['name']; ?></option><?php
                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div class="bottom-top">
                                                                                            <label for="no_of_passengers">Number of Passengers</label>
                                                                                        </div>
                                                                                        <div class="formrow">
                                                                                            <select class="form-control place-select1 show-tick" autocomplete="off" type="text" id="no_of_passangers" autocomplete="off" required="TRUE" name="no_of_passangers" >
                                                                                                <option value=""> -- Please select -- </option>
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
                                                                                    <div class="col-md-12">
                                                                                        <div class="bottom-top">
                                                                                            <label for="No_of_Baggages">No of Baggage</label>
                                                                                        </div>
                                                                                        <div class="formrow">
                                                                                            <select class="form-control place-select1 show-tick" id="no_of_baggages" placeholder="Enter maximum number of Baggage" autocomplete="off" name="no_of_baggages" >
                                                                                                <option value=""> -- Please select -- </option>
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
                                                                                    <div class="col-md-12">
                                                                                        <div class="bottom-top">
                                                                                            <label for="No_of_Doors">No of Doors</label>
                                                                                        </div>
                                                                                        <div class="formrow">
                                                                                            <select class="form-control place-select1 show-tick" id="no_of_doors" placeholder="Enter number of door" autocomplete="off" name="no_of_doors">
                                                                                                <option value=""> -- Please select -- </option>
                                                                                                <option value="1">1</option>
                                                                                                <option value="2">2</option>
                                                                                                <option value="3">3</option>
                                                                                                <option value="4">4</option>
                                                                                                <option value="5">5</option>
                                                                                                <option value="6">6</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div class="bottom-top">
                                                                                            <label for="No_of_Doors">Air Conditioned</label>
                                                                                        </div>
                                                                                        <div class="formrow">
                                                                                            <select class="form-control place-select1 show-tick" autocomplete="off" type="text" id="ac" autocomplete="off" name="ac" required="TRUE">
                                                                                                <option value=""> -- Please select -- </option>
                                                                                                <option value="1">Air Conditioned</option>
                                                                                                <option value="0">Non Air Conditioned</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6 col-xs-6 col-sm-6 text-left">
                                                                                        <a role="button" id="step-prev-1" class="btn btn-info tab-next-button" data-toggle="collapse" aria-expanded="true" aria-controls="collapseTwo">
                                                                                            << Previous
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-6 col-xs6 col-sm-6 text-right">
                                                                                        <a role="button" id="step-2" class="btn btn-info tab-next-button" data-toggle="collapse" aria-expanded="true" aria-controls="collapseTwo">
                                                                                            Next >>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="panel panel panel-default">
                                                                            <a class="collapsed" role="button" data-toggle="collapse" aria-expanded="false">
                                                                                <div class="panel-heading tab-panel-heading" role="tab" id="headingTwo">
                                                                                    <h4 class="panel-title">
                                                                                        Vehicle Photos
                                                                                    </h4>
                                                                                </div>
                                                                            </a>
                                                                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                                                <div class="panel-body">
                                                                                    <div class="row">
                                                                                        <div class="bottom-top col-md-2">
                                                                                            <div class="formrow">
                                                                                                <div class="uploadphotobx" id="uploadphotobx"> 
                                                                                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                                                                                    <label class="uploadBox">Click here to Upload photo
                                                                                                        <input type="file" name="transport-picture" id="transport-picture">
                                                                                                        <input type="hidden" name="upload-transport-image" id="upload-transport-image" value="TRUE"/>
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div id="image-list" style="padding-bottom: 10px;">
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-md-6 col-xs-6 col-sm-6 text-left">
                                                                                        <a role="button" id="step-prev-2" class="btn btn-info tab-next-button" data-toggle="collapse" aria-expanded="true" aria-controls="collapseTwo">
                                                                                            << Previous
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-6 col-xs-6 col-sm-6 text-right">
                                                                                        <a role="button" id="step-3" class="btn btn-info tab-next-button" data-toggle="collapse"  aria-expanded="true" aria-controls="collapseThree">
                                                                                            Next >>
                                                                                        </a>
                                                                                    </div>


                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="panel panel panel-default">
                                                                            <a class="collapsed" role="button" data-toggle="collapse"aria-expanded="false">
                                                                                <div class="panel-heading tab-panel-heading" role="tab" id="headingThree">
                                                                                    <h4 class="panel-title">
                                                                                        Description
                                                                                    </h4>
                                                                                </div>
                                                                            </a>
                                                                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                                                                <div class="panel-body">
                                                                                    <div class="col-md-12">
                                                                                        <div class="bottom-top">
                                                                                            <label for="description">Please enter more information about your service</label>
                                                                                        </div>
                                                                                        <div class="formrow">
                                                                                            <textarea type="text" id="description" name="description" class="form-control" placeholder="Please enter more information about your service"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6 col-xs-6 col-sm-6 text-left">
                                                                                        <a role="button" id="step-prev-3" class="btn btn-info tab-next-button" data-toggle="collapse" aria-expanded="true" aria-controls="collapseTwo">
                                                                                            << Previous
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-6 col-xs-6 col-sm-6 text-right">
                                                                                        <div class="bottom-top">
                                                                                            <input type="hidden" id="oldDis" value=""/>

                                                                                            <input type="hidden" id="member" name="member" value="<?php echo $_SESSION['id']; ?>"/>
                                                                                            <button id="create" name="add-transports" type="submit" class="btn btn-info tab-next-create">Save All Details</button>
                                                                                            <input type="hidden" id="isVerifiedContactNumber" value="<?php echo $isPhoneVerified; ?>" contactnumber="<?php echo $MEMBER->contact_number; ?>">
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
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <!--common script for all pages-->
        <script src="assets/js/common-scripts.js"></script>
        <!--script for this page-->
        <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
        <!--custom switch-->
        <script src="assets/js/bootstrap-switch.js"></script>
        <!--custom tagsinput-->
        <script src="assets/js/jquery.tagsinput.js"></script>
        <!--custom checkbox & radio--> 
        <script src="assets/plugins/jquery-steps/jquery.steps.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <script src="js/post-transport-image.js" type="text/javascript"></script>
        <script src="assets/js/form-component.js"></script>    
        <script src="js/display-contact-number-verification-alert.js" type="text/javascript"></script>
        <script src="plugins/Preloader/jm.spinner.js" type="text/javascript"></script>
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
        <script src="js/add-new-transport.js" type="text/javascript"></script>
        <script src="assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
    </body>

</html>
