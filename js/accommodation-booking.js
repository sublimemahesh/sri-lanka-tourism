$(document).ready(function () {
    $(".prices-list").change(function () {

        $(".each-main-type").each(function (index) {
            var typeOfThis = $(this).attr('typeid');
            var rooms = 0;
            $(".mainid-" + typeOfThis).each(function (index) {
                rooms = $(this).text();
            });
            rooms = parseInt(rooms);
            
        });
    });
}
);