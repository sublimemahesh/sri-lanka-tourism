$(document).ready(function () {

    $('.tab-next-button').click(function (e) {

        var sort = $(this).attr('sort');
        var next = parseInt(sort) + 1;


        var description = tinyMCE.get('description-' + sort).getContent();
//        patt = /^<p>(&nbsp;\s)+(&nbsp;)+<\/p>$/g;

        if (!$('#title-' + sort).val() || $('#title-' + sort).val().length === 0) {

            swal({
                title: "Error!",
                text: "Please enter your title",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        } else if (description === '') {

            swal({
                title: "Error!",
                text: "Please enter tour subsection description",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        } else if (!$('.addedTag-' + sort).text() || $('.addedTag-' + sort).val().length === 0) {

            swal({
                title: "Error!",
                text: "Please select a location",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        } else {
            $('#collapse-' + sort).collapse("hide");
            $('#collapse-' + next).collapse("show");
            $.scrollTo(100, 0, "slow", "#collapse-" + next);

        }


    });

    $('.tab-prev-button').click(function () {
        
        var sort = $(this).attr('sort');
        var prev = parseInt(sort) - 1;

        $('#collapse-' + sort).collapse("hide");
        $('#collapse-' + prev).collapse("show");
        $.scrollTo(100, 0, "slow", "#collapse-" + prev);

    });

    $('.tab-next-create').click(function (e) {
        e.preventDefault();
        var sort = $(this).attr('sort');

        var description = tinyMCE.get('description-' + sort).getContent();
//        patt = /^<p>(&nbsp;\s)+(&nbsp;)+<\/p>$/g;

        if (!$('#title-' + sort).val() || $('#title-' + sort).val().length === 0) {

            swal({
                title: "Error!",
                text: "Please enter your title",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        } else if (description === '') {

            swal({
                title: "Error!",
                text: "Please enter tour subsection description",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        } else if (!$('.addedTag-' + sort).text() || $('.addedTag-' + sort).val().length === 0) {

            swal({
                title: "Error!",
                text: "Please select a location",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        } else {

            var data = [];
            var tourid, subid, title, description,tag, tags;

            $(".panel-group .panel .tour-dates").each(function (index) {
                tags = '';
                tourid = $(this).find('#tour').val();
                sort = $(this).attr('sort');
                subid = $(this).attr('subid');
                title = $(this).find('.title').val();
                description = tinyMCE.get('description-' + sort).getContent();
//                patt = /^<p>(&nbsp;\s)+(&nbsp;)+<\/p>$/g;

                $("#tags-" + sort + " .addedTag.saveValue").each(function (index) {
                    tag = $(this).find('.h-tags').val();
                    tags = tags + tag + ",";
                    
                });


                var lastIndex = tags.lastIndexOf(",")

                var tag1 = tags.substring(0, lastIndex);
//                var tag2 = tags.substring(lastIndex + 1);

                data.push({
                    tour: tourid,
                    id: subid,
                    title: title,
                    description: description,
                    tags: tag1
                });
            });

            submitFormData(data);

        }

    });

    function submitFormData(formData) {

        $.ajax({
            type: 'POST',
            data: {data: formData},
            cache: false,
            url: 'post-and-get/ajax/tour-subsection.php',
            success: function (result) {
                if (result) {
                    swal({
                        title: "Success!",
                        text: "Your data was saved successfully.",
                        type: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                } else {
                    swal({
                        title: "Error!",
                        text: "Please try again.",
                        type: 'error',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            }
        });
    }
    
    

});
 