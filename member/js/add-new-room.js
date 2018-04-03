$(document).ready(function () {
    $('#step-1').click(function () {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if (!$('#name').val() || $('#name').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter your room name",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#number_of_room').val() || $('#number_of_room').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the number of rooms",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#number_of_adults').val() || $('#number_of_adults').val().length === 0) {
            swal({
                title: "Error!",
                text: "please enter the number of adults per room",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#number_of_children').val() || $('#number_of_children').val().length === 0) {
            swal({
                title: "Error!",
                text: "please enter the number of children per room",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });

        } else if (!$('#number_of_extra_bed').val() || $('#number_of_extra_bed').val().length === 0) {
            swal({
                title: "Error!",
                text: "please enter the number of extra beds",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#extra_bed_price').val() || $('#extra_bed_price').val().length === 0) {
            swal({
                title: "Error!",
                text: "please enter the extra bed price",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else {
            $('#collapseOne').collapse("hide");
            $('#collapseTwo').collapse("show");
        }
    });

    $('#step-2').click(function () {
        if (!$('#room-picture').val() || $('#room-picture').val().length === 0) {
            swal({
                title: "Error!",
                text: "please upload at least one of your room image",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else {
            $('#collapseTwo').collapse("hide");
            $('#collapseThree').collapse("show");
        }
    });

    $('#step-3').click(function () {

        checked = $("input[type=checkbox]:checked").length;

        if (checked < 1) {
            swal({
                title: "Error!",
                text: "please select at least one facility",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else {
            $('#collapseThree').collapse("hide");
            $('#collapseFour').collapse("show");
        }
    });

    $('#create').click(function () {
        var description = tinyMCE.get('description').getContent(), patt;
        patt = /^<p>(&nbsp;\s)+(&nbsp;)+<\/p>$/g;
        if (description === '' || patt.test(content)) {
            swal({
                title: "Error!",
                text: "please enter Room description",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        }
    });
});
 