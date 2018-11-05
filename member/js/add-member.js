
jQuery(document).ready(function () {

    $("#btnSubmit").click(function (e) {
        var datastring = $("#register").serialize();
        $.ajax({
            url: "post-and-get/ajax/check-member-email.php",
            cache: false,
            dataType: "json",
            type: "POST",
            data: datastring,
            success: function (result) {
                if (result.status === 'error') {
                    $('#message').text(result.message);
                    return false;
                } else if (result.status === 'success') {
                    window.location.replace('phone-verification-page.php');
                } else if (result.status === 'notdelivered') {
                    if (result.back === '') {
                        window.location.replace('profile.php?message=22');

                    } else {
                        window.location = result.back;
                    }
                } else if (result.status === 'registered') {
                    window.location.replace('forget-password.php?message=26');
                }
            }
        });
    });
});

////$(document).ready(function () {
//    $("form").submit(function (e) {
//
//
//        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
//        var email = $('#email').val();
//        var status = false;
//
//        if (!$('#name').val() || $('#name').val().length === 0) {
//            swal({
//                title: "Error!",
//                text: "Please enter your name",
//                type: 'error',
//                timer: 1000,
//                showConfirmButton: false
//            });
//            return false;
//        } else if (!$('#email').val() || $('#email').val().length === 0) {
//            swal({
//                title: "Error!",
//                text: "Please enter your email address",
//                type: 'error',
//                timer: 1000,
//                showConfirmButton: false
//            });
//            return false;
//        } else if (!emailReg.test($('#email').val())) {
//            swal({
//                title: "Error!",
//                text: "please enter a valid email",
//                type: 'error',
//                timer: 1000,
//                showConfirmButton: false
//            });
//            return false;
//        } else if (!$('#cnfemail').val() || $('#cnfemail').val().length === 0) {
//            swal({
//                title: "Error!",
//                text: "Please confirm your email address",
//                type: 'error',
//                timer: 1000,
//                showConfirmButton: false
//            });
//            return false;
//        } else if (!emailReg.test($('#cnfemail').val())) {
//            swal({
//                title: "Error!",
//                text: "please enter a valid email",
//                type: 'error',
//                timer: 1000,
//                showConfirmButton: false
//            });
//            return false;
//        } else if ($('#email').val() !== $('#cnfemail').val()) {
//            swal({
//                title: "Error!",
//                text: "Your email and confirm email does not match",
//                type: 'error',
//                timer: 1000,
//                showConfirmButton: false
//            });
//            return false;
//        } else if (!$('#contact_no').val() || $('#contact_no').val().length === 0) {
//            swal({
//                title: "Error!",
//                text: "Please Enter your contact number",
//                type: 'error',
//                timer: 1000,
//                showConfirmButton: false
//            });
//            return false;
//        } else if (!$('#password').val() || $('#password').val().length === 0) {
//            swal({
//                title: "Error!",
//                text: "Please Enter your password",
//                type: 'error',
//                timer: 1000,
//                showConfirmButton: false
//            });
//            return false;
//        } else if (!$('#password').val() || $('#password').val().length === 0) {
//            swal({
//                title: "Error!",
//                text: "Please Enter your password",
//                type: 'error',
//                timer: 1000,
//                showConfirmButton: false
//            });
//            return false;
//        } else {
//
//            $.ajax({
//                url: "post-and-get/ajax/check-member-email.php",
//                type: "POST",
//                data: {
//                    email: email
//                },
//                dataType: "JSON",
//                success: myCallback
//            });
//
//            function myCallback(jsonStr) {
//
//                if (jsonStr.status === true) {
//                    swal({
//                        title: "Error!",
//                        text: "The email address you entered already exists",
//                        type: 'error',
//                        timer: 1000,
//                        showConfirmButton: false
//                    });
//                } else {
//                    status = true;
//                }
//            }
//
//
//        }
//        
//        if (status) {
//            return true;
//        } else {
//            return false;
//        }
//
//    });
//});
// 