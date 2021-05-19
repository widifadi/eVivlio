var observer = new IntersectionObserver(function(entries) {
	if(entries[0].isIntersecting === true) {
		console.log('Element is fully visible in screen');
        $(".header-search").hide();
    } else {
        console.log('not visible');
        $(".header-search").show(500);
    }
}, { threshold: [1] });

observer.observe(document.querySelector(".page-search"));