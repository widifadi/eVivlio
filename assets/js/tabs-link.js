var url = document.URL;
var hash = url.substring(url.indexOf('#'));

/**
 * Add #[tab_name] to the URL for nav-pills tab
 * nav-pills on Admin Page
 */
$(".nav-pills").find("li a").each(function(key, val) {
    if (hash == $(val).attr('href')) {
        $(val).click();
    }
    
    $(val).click(function(ky, vl) {
        location.hash = $(this).attr('href');
    });
});