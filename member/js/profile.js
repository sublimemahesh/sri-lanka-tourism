$(document).ready(function () {

    $('#pro-picture').change(function () {
        $('.box').jmspinner('large');
        $('.box').addClass('well');
        $('.box').css('z-index','9999');
        
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
                $('.box').css('z-index','-1111');

            },
            cache: false,
            contentType: false,
            processData: false
        });

    });
});