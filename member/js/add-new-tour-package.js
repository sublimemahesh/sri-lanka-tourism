$(document).ready(function () {

    $('#create').click(function () {
        
//        var description = tinyMCE.get('description').getContent(), patt;
//        patt = /^<p>(&nbsp;\s)+(&nbsp;)+<\/p>$/g;

        if (!$('#tourtype').val() || $('#tourtype').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please select a tour type",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false
        } else if (!$('#name').val() || $('#name').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the tour title",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false
        } else if (!$('#price').val() || $('#price').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the price",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false
        } else if (!$('#picture_name').val() || $('#picture_name').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please select the main image",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false
        } else if (!$('#description').val() || $('#description').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the short description",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        } else {
            return true;
        }

    });

});
 