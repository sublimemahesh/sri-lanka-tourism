$(document).ready(function () {
    var isVerifiedContactNumber = $('#isVerifiedContactNumber').val();

    var html = '';
    if (isVerifiedContactNumber == 0) {

        html += '<div class="alert alert-danger alert-dismissible verify-link">';
        html += '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
        html += '<a href="phone-verification-page.php" class="">';
        html += '<i class="fa fa-info-circle info-icon"></i>';
        html += 'Your profile is not public. Please verify you contact number...';
        html += '</a>';
        html += '</div>';

        $('.verified-alert').empty();
        $('.verified-alert').append(html);

        $('.wrapper').css('margin-top', '0px');
        $('.verified-alert').addClass('verified-alert1');
    } else {
        $('.verified-alert').removeClass('verified-alert1');
    }
});

