$(document).ready(function () {
    $('#btn-search').click(function (e) {
        e.preventDefault();
        goList(searchKeyword);
    });
});

var searchKeyword = $('#search-bar').val();

function goList(link = 'list_view.html') {
    location.href = link;
}