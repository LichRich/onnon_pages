jQuery(document).ready(function () {
    /* ---------------------------------------------- /*
     * Masonry
    /* ---------------------------------------------- */
    $('#tablist li').click(function (e) {
        e.preventDefault();
        $('.masonry-container').masonry({itemSelector: '.cards'});
    });

    $('.carousel-indicators button').click(function (e) {
        e.preventDefault();
        $('.masonry-container').masonry({itemSelector: '.cards'});
    });

    /* ---------------------------------------------- /*
     * Scroll
    /* ---------------------------------------------- */
    $('.nav-items-go').click(function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $($(this).data('linkValue'))
                .offset()
                .top - $('#top-navbar').height()
        }, 0);
    });
});