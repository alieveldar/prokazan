$(document).ready(function() {
    $(".NewsSend").on("click", function(event) {
        var name = $(".JournalistName").val();
        var news = $(".NewsText").val();
        var picture = $("#sortpicture").prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', picture);
        form_data.append('name', name);
        form_data.append('text', news);
        $.ajax({
            url: 'uploadnews.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(data) {
                toastr.info(data);
                $(".JournalistName").val("");
                $(".NewsText").val("");
                $("#sortpicture").val("");
            }

        });
    });

    $(".DeletteNews").on("click", function(event) {
        var NewsId = $(event.target).data("id");
        $.post("deletenews.php", { id: NewsId})
            .done(function(data) {
                toastr.info(data);
                $(".article" + NewsId).hide();
            });
    });
});