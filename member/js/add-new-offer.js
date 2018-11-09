$(document).ready(function () {

    $('#add-offer').click(function () {
        
   
        
//        var description = tinyMCE.get('description').getContent(), patt;
//        patt = /^<p>(&nbsp;\s)+(&nbsp;)+<\/p>$/g;

        if (!$('#offertype').val() || $('#offertype').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please select a offer type",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        } else if (!$('#title').val() || $('#title').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the offer title",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        } else if (!$('#url').val() || $('#url').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the url",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        } else if (!$('#image_name').val() || $('#image_name').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please select an image",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        } else if (!$('#price').val() || $('#price').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please add your price",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        }else if (!$('#discount').val() || $('#discount').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please add your discount",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        }else if (!$('#description').val() || $('#description').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please add your description",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        }else if ($('#image_name').val()) {
            var fi = document.getElementById('image_name'); // GET THE FILE INPUT.
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
