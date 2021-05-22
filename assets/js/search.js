// for pressing enter in input
$(".search-box").keypress(function (e) {
    if (e.which == 13) {
        e.preventDefault();

        var search_id = $(this).attr('id');
        var input_keyword = $("#" + search_id).val();
        submit_search(input_keyword);
    }
});

// for pressing search button
$(".search-btn").click(function(e) {
    var btn_id = $(this).attr('id');
    // get nearest input value of this button
    var frominput_keyword = $("#" + btn_id + "-box").val();
    submit_search(frominput_keyword);

});


function submit_search(keyword) {
    window.location.href = 'search_results_page.php?search='+ keyword;
}