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
            return false;
        } else if (!$('#name').val() || $('#name').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the tour title",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        } else if (!$('#price').val() || $('#price').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the price",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        } else if (!$('#picture_name').val() || $('#picture_name').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please select the main image",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        } else if ($('#picture_name').val()) {
            var fi = document.getElementById('picture_name'); // GET THE FILE INPUT.
        if (fi.files.length > 0) {
            for (var i = 0; i <= fi.files.length - 1; i++) {
                var fsize = fi.files.item(i).size;      // THE SIZE OF THE FILE.
                if (Math.round((fsize / 1024)) > 10000) {
                    swal({
                        title: "Error!",
                        text: "Image is too large and please upload a image size less than 10MB",
                        type: 'error',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    return false;
                }
            }
        }
        }else {
            return true;
        }

    });

});
 