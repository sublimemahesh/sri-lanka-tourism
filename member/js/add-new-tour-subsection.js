$(document).ready(function () {

    $('#create').click(function () {
        var description = tinyMCE.get('description').getContent(), patt;
        patt = /^<p>(&nbsp;\s)+(&nbsp;)+<\/p>$/g;

        if (!$('#caption').val() || $('#caption').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter your tour subsection title",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false
        } 
//        else if (!$('#duration').val() || $('#duration').val().length === 0) {
//            swal({
//                title: "Error!",
//                text: "Please enter duration",
//                type: 'error',
//                timer: 2000,
//                showConfirmButton: false
//            });
//            return false
//        }
        else if (!$('#tour-sub-picture').val() || $('#tour-sub-picture').val().length === 0) {
            swal({
                title: "Error!",
                text: "please select at least one image",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false
        } else if (description === '' || patt.test(content)) {
            swal({
                title: "Error!",
                text: "please enter tour subsection description",
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
 