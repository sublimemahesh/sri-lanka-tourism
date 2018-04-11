
//--------------------------------------------------check one by one on blur--------------------------------------------------
jQuery(document).ready(function () {

    jQuery("#imageName").blur(function () {
        validateEmpty("imageName", "spanimageName");
    });

    jQuery("#name").blur(function () {
        validateEmpty("name", "spanname");
    });

    jQuery("#title").blur(function () {
        validateEmpty("title", "spantitle");
    });

    jQuery("#description").blur(function () {
        validateEmpty("comment", "spandescription");
    });



    jQuery("#captchacode").blur(function () {
        validateEmpty("captchacode", "capspan");
    });

    jQuery("#create").bind('click', function () {

        if (!validate()) {
            return;
        }

        jQuery("#checking").show();
        event();
    });



});


//--------------------------------------------------function to check button click --------------------------------------------------

function validate() {
    if (
            validateEmpty("imageName", "spanimageName") &
            validateEmpty("name", "spanname") &
            validateEmpty("title", "spantitle") &
            validateEmpty("comment", "spandescription") &
            validateEmpty("captchacode", "capspan")
            )
    {
        return true;
    } else {
        return false;
    }
}



//--------------------------------------------------Ajax call --------------------------------------------------




//-----------------   function to check empty -------------------------------------------------------

function validateEmpty(field, validatorspan)
{
    if (jQuery('#' + field).val().length != 0)
    {
        jQuery('#' + validatorspan).addClass("validated");
        jQuery('#' + validatorspan).removeClass("notvalidated");
        jQuery('#' + validatorspan).fadeIn('slow').fadeOut(3000);
        jQuery('#' + validatorspan).text("");

        return true;
    } else
    {
        jQuery('#' + validatorspan).addClass("notvalidated");
        jQuery('#' + validatorspan).removeClass("validated");
        jQuery('#' + validatorspan).fadeIn('slow').fadeOut(3000);
        jQuery('#' + validatorspan).text("This field can not be empty");

        return false;
    }
}

//--------------------------------------------------function to check email--------------------------------------------------

