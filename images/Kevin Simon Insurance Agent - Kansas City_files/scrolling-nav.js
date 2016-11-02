//jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
        $('.logo-img').addClass('hide');
        $('.small-menu').removeClass('hide');
        $('.small-menu').addClass('show');
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
        $('.logo-img').removeClass('hide');
        $('.small-menu').removeClass('show');
        $('.small-menu').addClass('hide');
    }
});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});
