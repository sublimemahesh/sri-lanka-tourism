$(document).ready(function () {

    $('#pro-picture').change(function () {

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


            },
            cache: false,
            contentType: false,
            processData: false
        });

    });
});