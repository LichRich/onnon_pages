jQuery(document).ready(function() {
    /* ---------------------------------------------- /*
     * Scroll
    /* ---------------------------------------------- */

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scroll-up').fadeIn();
        } else {
            $('.scroll-up').fadeOut();
        }
    });
    $('.scroll-up').click(function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 0);
    });
});

/* ---------------------------------------------- /*
 * Loading
/* ---------------------------------------------- */
$(window).on('load', function() {
    $('.loading').hide();
});