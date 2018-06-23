var googleUser = {};
var startApp = function () {
    gapi.load('auth2', function () {
        // Retrieve the singleton for the GoogleAuth library and set up the client.
        auth2 = gapi.auth2.init({
            client_id: '911987649395-lsjuodldj81ip80fl21841h98dg5cekf.apps.googleusercontent.com',
            cookiepolicy: 'single_host_origin',
            // Request scopes in addition to 'profile' and 'email'
            //scope: 'additional_scope'
        });
        attachSignin(document.getElementById('customBtn'));
    });
};

function attachSignin(element) {
    console.log(element.id);
    auth2.attachClickHandler(element, {},
            function (googleUser) {
                var profile = googleUser.getBasicProfile();

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

                     
            }, function (error) {
        document.getElementById('google-error-display').innerText = "Something went wrong with google sign in";
//        JSON.stringify(error, undefined, 2);
    });
}
