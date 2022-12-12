jQuery(document).ready(function () {
    /* ---------------------------------------------- /*
     * Masonry
    /* ---------------------------------------------- */
    var $grid = $('.masonry-container').masonry({itemSelector: '.cards'});
    $grid.imagesLoaded().progress(function() {
        $grid.masonry();
    });

    $('#tablist li').click(function (e) {
        e.preventDefault();
        $('.masonry-container').masonry({itemSelector: '.cards'});
    });

    $('.carousel-indicators button').click(function (e) {
        e.preventDefault();
        $('.masonry-container').masonry({itemSelector: '.cards'});
    });

    $('.product-controls').click(function(e) {
        e.preventDefault();
        $('.masonry-container').masonry({itemSelector: '.cards'});
    })

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

    /* ---------------------------------------------- /*
     * Location
    /* ---------------------------------------------- */
    $('#prod_0').click(function (e) {
        location.href = "detail_item.html";
    });

});