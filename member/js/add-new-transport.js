$(document).ready(function () {
    $('#step-1').click(function () {

        if (!$('#vehicle_type').val() || $('#vehicle_type').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please select your vehicle type",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#title').val() || $('#title').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter your title",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#registered_number').val() || $('#registered_number').val().length === 0) {
            swal({
                title: "Error!",
                text: "please enter the registerd number of the vehicle",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });

        } else if (!$('#registered_year').val() || $('#registered_year').val().length === 0) {
            swal({
                title: "Error!",
                text: "please enter the registerd year of the vehicle",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });

        } else if (!$('#fuel_type_id').val() || $('#fuel_type_id').val().length === 0) {
            swal({
                title: "Error!",
                text: "please select your fuel type",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else {
            $('#collapseOne').collapse("hide");
            $('#collapseTwo').collapse("show");
            $.scrollTo(100, 0, "slow", "#collapseTwo");
        }
    });

    $('#step-2').click(function () {
        if (!$('#condition_id').val() || $('#condition_id').val().length === 0) {
            swal({
                title: "Error!",
                text: "please select vehicle budget",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#no_of_passangers').val() || $('#no_of_passangers').val().length === 0) {
            swal({
                title: "Error!",
                text: "please enter the number of passengers",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#no_of_baggages').val() || $('#no_of_baggages').val().length === 0) {
            swal({
                title: "Error!",
                text: "please enter the number of baggage",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#no_of_doors').val() || $('#no_of_doors').val().length === 0) {
            swal({
                title: "Error!",
                text: "please enter the number of doors",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });

        } else if (!$('#ac').val() || $('#ac').val().length === 0) {
            swal({
                title: "Error!",
                text: "please select air conditioned or not",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });

        } else {
            $('#collapseTwo').collapse("hide");
            $('#collapseThree').collapse("show");
            $.scrollTo(100, 0, "slow", "#collapseThree");
        }
    });



    $('#step-3').click(function () {
        if (!$('#transport-picture').val() || $('#transport-picture').val().length === 0) {
            swal({
                title: "Error!",
                text: "please upload your vehicle image",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else {
            $('#collapseThree').collapse("hide");
            $('#collapseFour').collapse("show");
            $.scrollTo(100, 0, "slow", "#collapseThree");
        }
    });

    $('#create').click(function () {
        var description = tinyMCE.get('description').getContent(), patt;
        patt = /^<p>(&nbsp;\s)+(&nbsp;)+<\/p>$/g;
        if (description === '' || patt.test(content)) {
            swal({
                title: "Error!",
                text: "please enter vehicle description",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        }
    });
});
 