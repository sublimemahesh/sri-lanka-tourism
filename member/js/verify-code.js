$('document').ready(function () {
   
    if($('#existno').val()== '') {
        $('.resend-code').addClass('hidden');
        $('.update-contact-number').removeClass('hidden');
        $('.p-hidden').removeClass('hidden');
    } else {
         $('.resend-code').removeClass('hidden');
    }
    
    $('.update_number').click(function() {
        $('.resend-code').addClass('hidden');
        $('.update-contact-number').removeClass('hidden');
        $('.p-hidden').addClass('hidden');
    });
});

