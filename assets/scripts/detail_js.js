jQuery(document).ready(function () {
    var card_captions = ['3D 모델링을 통한 홍보영상 제작', '다문화 청소년을 위한 진로잡지 제작', '순천향대학교 입주기업 협의회 계룡세계 군문화엑스포 홍보자료 제작', '순천향대학교 입주기업협의회 소개 영상 제작', '아산시 청년기업협의회 홍보자료 제작', '2021 아산시 혁신적인 청년창업가 선정', '금시세에 따라 제품의 가격이 변하는 웹서비스 구축', '충남테크노파크 수면산업 실증기반 지원센터 홍보자료 제작'];

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