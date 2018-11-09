$('document').ready(function () {

    if ($('#status').val() == 'true') {
        $('.resend-code').addClass('hidden');
        $('.update-contact-number').addClass('hidden');
        $('.add-contact-number').removeClass('hidden');

    } else if ($('#existno').val() == '') {
        $('.resend-code').addClass('hidden');
        $('.update-contact-number').removeClass('hidden');
        $('.add-contact-number').addClass('hidden');
        $('.p-hidden').removeClass('hidden');
    } else {
        $('.resend-code').removeClass('hidden');
    }

    $('.update_number').click(function () {
        $('.resend-code').addClass('hidden');
        $('.update-contact-number').removeClass('hidden');
        $('.p-hidden').addClass('hidden');
        $('.add-contact-number').addClass('hidden');
    });
});

