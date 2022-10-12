$(document).ready(function () {
    $('#showcase > div').fadeIn();
    $('#showcase > div').css('display', 'flex');
    $('#showcase-captions').css('transform', 'translateX(4%)');
    $('#showcase-captions').css('-webkit-transform', 'translateX(4%)');
    $('#showcase-captions').css('-ms-transform', 'translateX(4%)');

    $('#go-search').click(function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $('#section-search-bar')
                .offset()
                .top - $('#top-navbar').height()
        }, 0);
    });

    $('#btn-search').click(function (e) {
        e.preventDefault();
        goList(searchKeyword);
    });
});

var searchKeyword = $('#search-bar').val();

function goList(link = 'list_view.html') {
    location.href = link;
}