/* SLIDER IMAGE */
$(document).ready(function() {
    $(".slider").owlCarousel({
        items: 1,
        loop: true,
        nav: true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        mouseDrag: false,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        smartSpeed: 900,
    });
});
/* ---------------------------------- */

$(document).ready(function() {
    $('.content__offer-items').owlCarousel({
        items: 3,
        dots: false,
        loop: true,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        smartSpeed: 900,
        lazyLoadEager: 3,
        nav: true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]
    });
});