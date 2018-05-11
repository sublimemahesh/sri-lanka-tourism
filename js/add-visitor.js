jQuery(document).ready(function () {

    $("#btnSubmit").click(function (e) {
        var datastring = $("#register").serialize();
        $.ajax({
            url: "post-and-get/ajax/visitor-register.php",
            cache: false,
            dataType: "json",
            type: "POST",
            data: datastring,
            success: function (result) {

                if (result.status === 'error') {
                    $('#message').text(result.message);
                    return false;
                } else if (result.status === 'success') {
                    if (result.back === '') {
                        window.location.replace('visitor-profile.php?message=22');
                        
                    } else {
                        window.location = result.back;
                    }

                }
            }
        });
    });
});
