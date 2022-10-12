$(document).ready(function() {
    // $(".row-list")
    $('#onandon').click(function(e) {
        e.preventDefault();
        goDetail();
    })
});

function goDetail(link = 'detail_page.html') {
    location.href = link;
}