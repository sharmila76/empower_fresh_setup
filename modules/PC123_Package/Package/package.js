$(function() {
    var suits = [];
    $('#suits_and_packages .sortable-list').sortable({
        connectWith: '#suits_and_packages .sortable-list'
    });
    $('#add_package').click(function(e) {
        $(".sortable-item").children().each(function(i) {
            var name = $(this).text();
            suits.push(name);
        });
        $.ajax({
            type: "POST",
            url: "ajax.php",
            async: false,
            data: {"suits": suits},
            success: function(data) {
                $("#bodyCell").html(data);
            }
        });
    });
});


