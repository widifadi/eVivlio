$(".search-box").keypress(function (e) {
    if (e.which == 13) {
        $("#search-button").click();
    }
});

$("#search-button").click(function() {

    var keyword = $(".search-box").val();

    $.ajax({
        type: "POST",
        url: "../src/Search/search_function.php",
        data: { "keyword": keyword },
        success: function(response) {
            // window.location.href = 'search_results_page.php'
            console.log(response)

            var book_results = jQuery.parseJSON(response);

            $("#search-keyword").html(keyword); // TODO

            $.ajax({
                type: "POST",
                url: "../src/Search/search_results.php",
                data: { "book_results": book_results },
                success: function(results_response) {
                    console.log(results_response)
                },
            });

        },
    });

});
