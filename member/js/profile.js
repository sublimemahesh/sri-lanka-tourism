$(document).ready(function () {

    $('#pro-picture').change(function () {
     
        var fi = document.getElementById('pro-picture'); // GET THE FILE INPUT.
        if (fi.files.length > 0) {
            for (var i = 0; i <= fi.files.length - 1; i++) {
                var fsize = fi.files.item(i).size;      // THE SIZE OF THE FILE.
                if (Math.round((fsize / 1024)) > 10000) {
                    swal({
                        title: "Error!",
                        text: "Image is too large and please upload a image size less than 10MB",
                        type: 'error',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    return false;
                }
            }
        }
        $('.box').jmspinner('large');
        $('.box').addClass('well');
        $('.box').css('z-index', '9999');

        var formData = new FormData($('#upForm')[0]);

        $.ajax({
            url: "post-and-get/ajax/profile.php",
            type: "POST",
            data: formData,
            async: false,
            dataType: 'json',
            success: function (mess) {

                $("#profil_pic").attr("src", "../upload/member/" + mess.filename);
                $("#profil_pic1").attr("src", "../upload/member/" + mess.filename);
                $('.box').jmspinner(false);
                $('.box').removeClass('well');
                $('.box').css('z-index', '-1111');

            },
            cache: false,
            contentType: false,
            processData: false
        });

    });
});