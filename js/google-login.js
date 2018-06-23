/////**
//// * Handler for the signin callback triggered after the user selects an account.
//
//
//$('#google-login').click(function () {
//    function onSignInCallback(resp) {
//        gapi.client.load('plus', 'v1', apiClientLoaded);
//    }
//    /**
//     * Sets up an API call after the Google API client loads.
//     */
//    function apiClientLoaded() {
//        gapi.client.plus.people.get({userId: 'me'}).execute(handleEmailResponse);
//    }
//    /**
//     * Response callback for when the API client receives a response.
//     *
//     * @param resp The API response object with the user email and profile information.
//     */
//    function handleEmailResponse(resp) {
//        var primaryEmail;
//        var usrid;
//        var name;
//        var image;
//
//        for (var i = 0; i < resp.emails.length; i++) {
//            if (resp.emails[i].type === 'account')
//                primaryEmail = resp.emails[i].value;
//            usrid = resp.id;
//            name = resp.displayName;
//            image = resp.image.url;
//        }
////    document.getElementById('responseContainer').value = 'Primary email: ' +
////            image + '\n\nFull Response:\n' + JSON.stringify(resp);
//
//
//        $.ajax({
//            url: "post-and-get/ajax/google-login.php",
//            type: "POST",
//            data: {
//                userID: usrid,
//                name: name,
//                email: primaryEmail,
//                picture: image,
////            accessToken: primaryEmail,
////            expiresIn: expiresIn,
////            signedRequest: signedRequest,
////            status: status,
//                memberLogin: '1'
//            },
//            dataType: "JSON",
//            success: function (result) {
//                if (result.message === 'success-log') {
//
//                    if (result.back === '') {
//                        window.location.replace("visitor-profile.php");
//                    } else {
//                        window.location = result.back;
//                    }
//
//                } else if (result.message === 'success-cre') {
//                    if (result.back === '') {
//                        window.location.replace('visitor-profile.php?message=22');
//                    } else {
//                        window.location = result.back;
//                    }
//
//                }
//            }
//        });
//    }
//
//});
//
//
//
//
//
//
//
//$(document).ready(function () {
//    $('#google-sign-in').click(function () {
//
//
//    });
//});

window.onbeforeunload = function (e) {
    gapi.auth2.getAuthInstance().signOut();
};

function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
//    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
//    console.log('Name: ' + profile.getName());
//    console.log('Image URL: ' + profile.getImageUrl());
//    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.

    var primaryEmail;
    var usrid;
    var name;
    var small_image;
    var image;

    primaryEmail = profile.getEmail();
    usrid = profile.getId();
    name = profile.getName();
    small_image = profile.getImageUrl();
    image = small_image + '?sz=500';

    $.ajax({
        url: "post-and-get/ajax/google-login.php",
        type: "POST",
        data: {
            userID: usrid,
            name: name,
            email: primaryEmail,
            picture: image,
//            accessToken: primaryEmail,
//            expiresIn: expiresIn,
//            signedRequest: signedRequest,
//            status: status,
            memberLogin: '1'
        },
        dataType: "JSON",
        success: function (result) {
            if (result.message === 'success-log') {

                if (result.back === '') {
                    window.location.replace("visitor-profile.php");
                } else {
                    window.location = result.back;
                }

            } else if (result.message === 'success-cre') {
                if (result.back === '') {
                    window.location.replace('visitor-profile.php?message=22');
                } else {
                    window.location = result.back;
                }

            }
        }
    });

}


