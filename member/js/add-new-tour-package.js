$(document).ready(function () {

    $('#create').click(function () {
        var description = tinyMCE.get('description').getContent(), patt;
        patt = /^<p>(&nbsp;\s)+(&nbsp;)+<\/p>$/g;

        if (!$('#name').val() || $('#name').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter your tour package name",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false
        } else if (!$('#price').val() || $('#price').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter your tour package price",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false
        } else if (!$('#picture_name').val() || $('#picture_name').val().length === 0) {
            swal({
                title: "Error!",
                text: "please select at least one image of your tour package",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false
        } else if (description === '' || patt.test(content)) {
            swal({
                title: "Error!",
                text: "please enter tour package description",
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
 