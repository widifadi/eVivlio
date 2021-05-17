$(".search-box").keypress(function (e) {
    if (e.which == 13) {
        $("#search-button").click();
    }
});

<<<<<<< HEAD
$("#search-button").click(function() {

    var keyword = $(".search-box").val();

=======

$("#search-button").click(function(e) {
    var search_keyword = $(".search-box").val();

    window.location.href = 'search_results_page.php#'+ search_keyword;

    load_search_results(search_keyword);
});


// used if coming from front page
window.onload = function() {
    if (window.location.href.indexOf('search_results_page.php') > -1) {

        var keyword = decodeURIComponent(location.hash.slice(1));
        load_search_results(keyword);
    }
}


function load_search_results(keyword) {
>>>>>>> 6432971d6462cb05cd820a6fa29cee3e9cef74e6
    $.ajax({
        type: "POST",
        url: "../src/Search/search_function.php",
        data: { "keyword": keyword },
        success: function(response) {
<<<<<<< HEAD
            // window.location.href = 'search_results_page.php'
            console.log(response)

            var book_results = jQuery.parseJSON(response);

            $("#search-keyword").html(keyword); // TODO
=======
            var book_results = jQuery.parseJSON(response);

            $("#search-keyword").html(keyword);
>>>>>>> 6432971d6462cb05cd820a6fa29cee3e9cef74e6

            $.ajax({
                type: "POST",
                url: "../src/Search/search_results.php",
                data: { "book_results": book_results },
                success: function(results_response) {
<<<<<<< HEAD
                    console.log(results_response)
=======

                    $("#search-results-container").html(results_response);

>>>>>>> 6432971d6462cb05cd820a6fa29cee3e9cef74e6
                },
            });

        },
    });

<<<<<<< HEAD
});
=======
}
>>>>>>> 6432971d6462cb05cd820a6fa29cee3e9cef74e6
