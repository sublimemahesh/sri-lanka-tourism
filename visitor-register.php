<!DOCTYPE html>
<?php
include './class/include.php';


if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION["vislogin"])) {
    redirect('visitor-profile.php');
}


$back_url = '';
if (isset($_SESSION["back_url"])) {
    $back_url = $_SESSION["back_url"];
}
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
        <link href="css/visitor-custom.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
        <script src="https://apis.google.com/js/api:client.js"></script>
        <script src="js/google-login.js" type="text/javascript"></script>
        <link href="plugins/tel-input/build/css/intlTelInput.css" rel="stylesheet" type="text/css"/>
        <!--
                <meta name="google-signin-client_id" content="911987649395-lsjuodldj81ip80fl21841h98dg5cekf.apps.googleusercontent.com">-->
        <!--        <script src = "https://plus.google.com/js/client:platform.js" async defer></script>-->
        <!--        <link href="css/custom-google-button.css" rel="stylesheet" type="text/css"/>-->
    </head>

    <body style="background-color: #efefef;">
        <!-- Our Resort Values style-->
        <?php include './header.php' ?>

        <div class="member-log-body">
            <div class="container">
                <div class="col-md-6">
                    <?php
                    if (isset($_GET['message'])) {
                        $message = new Message($_GET['message']);
                        ?>
                        <div class="alert alert-<?php echo $message->status; ?>"><?php echo $message->description; ?></div>

                        <?php
                    }
                    ?>
                    <div class="intro1 hidden-sm hidden-xs">Srilanka Tourism helps you to publish your business<br>
                    </div>
                    <img class="member-img hidden-sm hidden-xs"src="images/visitor/visitor.png">
                </div>
                <div class="col-md-6">
                    <div class="margin-l-20">
                        <p class="social-title-container">or you can sign in via your social network</p>
                        <div class="row">

                            <div class="col-md-4">
                                <button class="fb btn btn-facebook social-log-buttons" id="fb-login" type="submit"><i class="fa fa-facebook font-fb"></i> Facebook</button>
                            </div>
                            <div class="col-md-4">
                                <div id="google-button">
                                    <button id="customBtn"  class="btn btn-danger social-log-buttons" type="submit"><i class="fa fa-google-plus"></i> Google</button>
<!--                                    <span class="label">Sign in with:</span>
                                  <div >
                                      <span class="icon"></span>
                                      <span class="buttonText">Google</span>
                                  </div>-->
                                </div>
                                <script>startApp();</script>                    
                            </div>

                            <div class="col-md-4">
                            </div>
                        </div>
                        <div class="text-danger" id="google-error-display"></div>




                        <hr class="hr" style="margin-bottom: 0;">
                        <form method="post" id="register"> 
                            <div class="error-msg">
                                <div class="pull-left text-danger" id="message"></div>
                            </div>

                            <input id="f_name" name="f_name" placeholder="Enter Your First Name" autocomplete="off" class="inputbox" type="text">
                            <input id="s_name" name="s_name" placeholder="Enter Your Second Name" autocomplete="off" class="inputbox" type="text">
                            <input id="email" name="email" placeholder="Enter Your Email" autocomplete="off" class="inputbox" type="text">
                            <input id="cnfemail" name="cnfemail" placeholder="Confirm Email" autocomplete="off"class="inputbox" type="text">
                            <input id="contact_no" name="contact_number" autocomplete="off" class="inputbox" type="text">
                            <input id="password" name="password" placeholder="Enter Password" autocomplete="off" class="inputbox" type="password">

                            <div class="policy-container">
                                <p>
                                    By clicking Create an account, you agree to our Terms and conditions 
                                </p>
                            </div>
                            <input type="hidden" class="form-control"  name="back_url" value="<?php echo $back_url ?>">
                            <input type="hidden" name="save" value="save"/>
                            <div class="buttonreg" id="btnSubmit">Create an account</div>
                        </form>
                    </div>
                </div>
            </div>

        </div>


        <?php include './footer.php' ?>

        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="js/add-visitor.js" type="text/javascript"></script>
        <script src="js/fb-login-scripts.js" type="text/javascript"></script>
        <script src="plugins/tel-input/build/js/intlTelInput.js" type="text/javascript"></script>
        <script>
                                    $("#contact_no").intlTelInput({
                                        autoFormat: false,
                                        autoHideDialCode: false,
                                        responsiveDropdown: true
                                    });
        </script>
    </body> 


    <!--<a href="#" onclick="signOut();">Sign out</a>
    <script>
      function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
          console.log('User signed out.');
        });
      }
    </script>-->

</html>
