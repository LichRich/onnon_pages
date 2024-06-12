{*** 상품상세화면 | goods/goods_view.php ***}
{ # header }
<style>
    .chosen-container .chosen-results {
        max-height:100px;
    }
    .radio_custom{
        cursor: pointer;
    }

    .visible{
        margin-top: 10px;
        visibility: visible;
        position: relative;
        transition: 0.5s ease;
    }
    .invisible{
        position: absolute;
        visibility: hidden;
        
      
    }
    .logo_quick{
        width: 85px;
     
    }
    .item_photo_box{
        min-width: 200px;
    min-height: 200px;
    }
	
	.custom_related > .item_basket_type > ul {
		justify-content: flex-start !important;

	}

	.custom_related > .item_basket_type > ul > li > .item_cont{
		width: 200px !important;

	}
    
</style>
<script type="text/javascript">

function goodViewSlider() {
  if (window.location.href.includes('goods_view')) {

    const container = document.getElementsByClassName('slick-track');
  
    if(container.length ===0) {
          return;
      }

    container[0].style.display = 'flex !important';
    container[0].style.width = '400px !important';
    container[0].style.justifyContent = 'space-around !important';
  } else {
    if(container.length ===0) {
          return;
      }
    container[0].style.display = '';
    container[0].style.width = '';
    container[0].style.justifyContent = '';
  }
}
// goodViewSlider()



  function handleClick(){
        
      
  
    setTimeout(()=>{
        const ele1 = document.getElementsByClassName('option_display_area')
       console.log(ele1)
        function repeat() {
            const ttt = document.getElementById('tttt')
        ttt.classList.remove('invisible')
        ttt.classList.add('visible')
        }
       
        if(ele1[0].childNodes[4]){
            console.log('first')
            repeat();
    } else {
        setTimeout(()=>{
            if(ele1[0].childNodes[4]){
            console.log('second')
            repeat()
        }
        },1000)
}
    },500)

    

  
}
    var bdGoodsQaId = '{bdGoodsQaId}';
    var bdGoodsReviewId = '{bdGoodsReviewId}';
    var goodsNo = '{goodsView.goodsNo}';
    var goodsViewController = new gd_goods_view();
    var goodsTotalCnt;
    var goodsOptionCnt = [];

    $(document).ready(function(){
        var parameters = {
            'setControllerName' : goodsViewController,
            'setOptionFl' : '{=goodsView["optionFl"]}',
            'setOptionTextFl'	: '{=goodsView["optionTextFl"]}',
            'setOptionDisplayFl'	: '{=goodsView["optionDisplayFl"]}',
            'setAddGoodsFl'	: '<!--{ ? is_array(goodsView["addGoods"]) }-->y<!--{ : }-->n<!--{ / }-->',
            'setIntDivision'	: '{=c.INT_DIVISION}',
            'setStrDivision'	: '{=c.STR_DIVISION}',
            'setMileageUseFl'	: '{=mileageData["useFl"]}',
            'setCouponUseFl'	: '{=couponUse}',
            'setMinOrderCnt'	: '{=goodsView["minOrderCnt"]}',
            'setMaxOrderCnt'	: '{=goodsView["maxOrderCnt"]}',
            'setStockFl'	: '{=gd_isset(goodsView["stockFl"])}',
            'setSalesUnit' : '{=gd_isset(goodsView["salesUnit"], 1)}',
            'setDecimal' : '{currency.decimal}',
            'setGoodsPrice' : '{=gd_isset(goodsView["goodsPrice"], 0)}',
            'setGoodsNo' : '{=goodsView["goodsNo"]}',
            'setMileageFl' : ' {=goodsView["mileageFl"]}',
            'setFixedSales' : '{=goodsView["fixedSales"]}',
            'setFixedOrderCnt' : '{=goodsView["fixedOrderCnt"]}',
            'setOptionPriceFl' : '{=optionPriceFl}',
            'setStockCnt' : '{=goodsView["stockCnt"]}'
        };
    

        goodsViewController.init(parameters);

        <!--{ ? goodsView['qrCodeFl'] == 'y' && goodsView['qrStyle'] == 'btn' }-->
        $('#qrCodeDownloadButton').on('click', function() {
            location.href = './goods_qr_code.php?goodsNo={=goodsView["goodsNo"]}&goodsName={=gd_htmlspecialchars_addslashes(goodsView["goodsNmDetail"])}';
        });
        <!--{ / }-->
      
        <!--{ ? goodsView['optionFl']== 'n' && goodsView['orderPossible'] == 'y' }-->
        goodsViewController.goods_calculate('#frmView', 1, 0, "{=gd_isset(goodsView['defaultGoodsCnt'])}", 200000, 300,200,100,200)
        <!--{ / }-->
           
        /* 상품 이미지 슬라이드 */
        $('.item_photo_info_sec .slider_goods_nav').slick({
            dots: false,
            centerMode: false,
            slidesToShow: 5,
            slidesToScroll: 1,
            prevArrow: $('.item_photo_info_sec .slick_goods_prev'),
            nextArrow: $('.item_photo_info_sec .slick_goods_next')
        });

        /* 줌레이어 상품 이미지 슬라이드 */
        $('.ly_slider_goods_nav').slick({
            dots: false,
            centerMode: false,
            vertical: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            prevArrow: $('.zoom_layer .slick_goods_prev'),
            nextArrow: $('.zoom_layer .slick_goods_next')
        });


        $('button.goods_cnt').on('click', function(e) {
            goodsViewController.count_change(this, 1);
        });

        $('button.add_goods_cnt').on('click', function(e) {
            goodsViewController.count_change(this);
        });


        <!--{ ? goodsView['benefitPossible'] == 'y' }-->
        gd_benefit_calculation();
        <!--{ / }-->

        <!--{ ? couponUse == 'y' }-->
        gd_open_layer();
        <!--{ / }-->

        <!--{ ? goodsView['imgDetailViewFl'] == 'y' }-->
        $("#mainImage img").data("image-zoom", $("#mainImage img").attr('src'));
//        $("#mainImage img").data("image-zoom", $("#testZoom img").attr('src'));
        $("#mainImage img").elevateZoom();
        <!--{ / }-->

        $('.btn_add_order').on('click', function(e){
			console.info("order!");
            gd_goods_order('d');
            return false;
        });

        $('.btn_add_wish').on('click', function(e){
            gd_goods_order('w');
            return false;
        });

        $('.btn_add_cart').on('click', function(e){
            gd_goods_order();
            return false;
        });

        //상품 재입고 알림 팝업 오픈
        <!--{ ? goodsView['restockUsableFl'] === 'y' && !gGlobal.isFront }-->
        $('.restockSelector').on('click', function(e) {
            window.open("./popup_goods_restock.php?goodsNo="+goodsNo, "popupRestock", "top=100, left=200, status=0, width=682px, height=600px");
            return false;
        });
        <!--{ / }-->

        <!--{ ? goodsReviewAuthList == 'y'}-->
        gd_load_goodsBoardList(bdGoodsReviewId, goodsNo);
        <!--{ / }-->

        <!--{ ? goodsQaAuthList == 'y'}-->
        gd_load_goodsBoardList(bdGoodsQaId, goodsNo);
        <!--{ / }-->

        // SNS 공유하기
        $('.target_sns_share').on('click', function() {
            if ($("#lySns").css("display") == 'block') {
                // 단축주소 가져오기
                $.ajax({
                    type: 'post',
                    url: './goods_ps.php',
                    async: true,
                    cache: true,
                    data: {
                        mode: 'get_short_url',
                        url: '{=snsShareUrl}'
                    },
                    success: function (data) {
                        var json = $.parseJSON(data);
                        $('.sns_copy_url > input').val(json.url);
                        $('.sns_copy_url > button').attr('data-clipboard-text', json.url);
                    }
                });
            }
        });

        <!--{ ? goodsView['timeSaleFl'] }-->
        $("#displayTimeSale").hide();
        gd_dailyMissionTimer("{=goodsView['timeSaleInfo']['timeSaleDuration']}");
        <!--{ / }-->

        var canGoodsReview = '{canGoodsReview}';
        var canPlusReview = '{plusReviewConfig.isShowGoodsPage}';
        var canGoodsQa = '{canGoodsQa}';
        var tabCount = 5;
        if (!canGoodsReview && canPlusReview != 'y') {
            $('.tab a[href=#reviews]').remove();
            $('#reviews').hide();
            tabCount-- ;
        }

        if (!canGoodsQa) {
            $('.tab a[href=#qna]').remove();
            $('#qna').hide();
            tabCount--;
        }
        if (tabCount < 5) {
            $('.multiple-topics .tab a').css('width', 100 / tabCount + '%');
        }

        $('.layer-cartaddconfirm').click(function(){
            location.href = '../order/cart.php';
        });

        // 배송비 항목을 노출 안함 설정하면 배송비 타입을 생성
        var deliveryCollectFl = "{=goodsView['delivery']['basic']['collectFl']}";
        if ($('#frmView [name="deliveryCollectFl"]').length > 0) {
            // 이미 존재 패스
        } else if (deliveryCollectFl == 'both') {
            // 선택은 패스
        } else {
            $('#frmView').append('<input type="hidden" name="deliveryCollectFl" value="' + deliveryCollectFl + '"/>');
        }

        $('.btn_move_cart').click(function() {
            location.href = '../order/cart.php';
        });

        $('.btn_move_wish').click(function() {
            location.href = '../mypage/wish_list.php';
        });

        //배송 방식에 따른 방문 수령지 노출 여부
        $(".js-deliveryMethodFl").change(function(){
            if($(this).val() === 'visit'){
                $(".js-deliveryMethodVisitArea").removeClass('dn');
            }
            else {
                $(".js-deliveryMethodVisitArea").addClass('dn');
            }
        });

        var test = document.getElementById('frmView')
		// console.info(test);
        goodsViewController.option_select2(test,0, 'test2','y','y');
        
        
        $("#custom_option_select").click(function () {
        //라디오 버튼 값을 가져온다.
        var optionCnt = $(
        '#frmView' + ' input[name="optionCntInput"]'
        ).val()
        
        goodsViewController.option_select3(test,optionCnt-1, 'test2','y');
        });

        

        {customReadyScript}
    });

    $(document).on('keydown focusout', 'input[name^=goodsCnt]', function(e){
        $(this).val($(this).val().replace(/[^0-9\-]/g,""));
    });

    /**
     * KC마크 인증정보창
     * @param string url KC인증번호검색 url
     * @return
     */
    function popupKcInfo(url) {
        var win = gd_popup({
            url: url
            , target: 'searchPop'
            , width: 750
            , height: 700
            , resizable: 'no'
            , scrollbars: 'yes'
        });
        win.focus();
        return win;
    }

    <!--{ ? couponUse == 'y' }-->
    // 쿠폰 오픈 레이어에 따른 분기
    function gd_open_layer() {
        $('.btn_open_layer').bind('click', function(e) {
            if ($(this).attr('href') == '#lyCouponDown') {
                gd_coupon_down();
            } else if ($(this).attr('href') == '#lyCouponApply') {
                gd_coupon_apply($(this).data('key'));
            }
        });
    }

    function gd_bind_coupon_cancel() {
        $('.btn_coupon_cancel').bind('click', function(e){
            $('.payco_pay').removeClass('dn');
            $('.naver_pay').removeClass('dn');
            gd_coupon_cancel($(this).data('key'), '');
        });
    }

    function gd_coupon_cancel(optionKey, typeCode) {
        $('#option_display_item_' + optionKey + ' input:hidden[name="couponApplyNo[]"]').val('');
        $('#option_display_item_' + optionKey + ' input:hidden[name="couponSalePriceSum[]"]').val('');
        $('#option_display_item_' + optionKey + ' input:hidden[name="couponAddPriceSum[]"]').val('');
        var couponApplyHtml = "<a href=\"#lyCouponApply\" class=\"btn_open_layer\" data-key=\""+optionKey+"\"><img src=\"../img/common/btn/btn_coupon_apply.png\" alt=\"{=__('쿠폰적용')}\"/></a>";
        $('#coupon_apply_' + optionKey).html(couponApplyHtml);
        if ($('#cart_tab_coupon_apply_'+optionKey).length) $('#cart_tab_coupon_apply_' + optionKey).html(couponApplyHtml);
        gd_open_layer();
        if (typeCode == 'noCalculation') {
            // 재계산 안함
        } else {
            gd_benefit_calculation();
        }
    }

    function gd_coupon_down() {
        $.ajax({
                method: "POST",
                cache: false,
                url: "../goods/layer_coupon_down.php",
                data: "goodsNo=" + {goodsView.goodsNo},
            success: function (data) {
            $('#lyCouponDown').empty().append(data);
            $('#lyCouponDown').find('>div').center();
        },
        error: function (data) {
            alert(data.message);
            gd_close_layer();
        }
    });
    }
    function gd_coupon_apply(optionKey) {
        var params = {
            mode: 'coupon_apply',
            goodsNo: {goodsView['goodsNo']},
            optionKey: optionKey,
            couponApplyNotNo: $('input:hidden[name="couponApplyNo[]"]').serializeArray(),
            couponApplyNo: $('#option_display_item_'+optionKey+' input:hidden[name="couponApplyNo[]"]').val(),
            goodsCnt: $('#option_display_item_'+optionKey+' input:text[name="goodsCnt[]"]').val(),
            goodsPriceSum: $('#option_display_item_'+optionKey+' input:hidden[name="goodsPriceSum[]"]').val(),
            optionPriceSum: $('#option_display_item_'+optionKey+' input:hidden[name="optionPriceSum[]"]').val(),
            optionTextPriceSum: $('#option_display_item_'+optionKey+' input:hidden[name="optionTextPriceSum[]"]').val(),
            addGoodsPriceSum: $('#option_display_item_'+optionKey+' input:hidden[name="addGoodsPriceSum[]"]').val(),
        };

        $.ajax({
            method: "POST",
            cache: false,
            url: "../goods/layer_coupon_apply.php",
            data: params,
            success: function (data) {
                $('#lyCouponApply').empty().append(data);
                $('#lyCouponApply').find('>div').center();
            },
            error: function (data) {
                alert(data.message);
                gd_close_layer();
            }
        });
    }
    <!--{ / }-->

    /**
     * 메인 이미지 변경
     *
     * @param string keyNo 상품 배열 키값
     */
    function gd_change_image(keyNo, type) {
        if (typeof keyNo == 'string') {
            var detailKeyID = new Array();
            <!--{ @ gd_isset(goodsView['image']['detail']['img']) }-->
            detailKeyID[{=.key_}] = "{=gd_htmlspecialchars_slashes(.value_, 'add')}";
            <!--{ / }-->

            var magnifyKeyID = new Array();
            <!--{ @ gd_isset(goodsView['image']['magnify']['img']) }-->
            magnifyKeyID[{=.key_}] = "{=gd_htmlspecialchars_slashes(.value_, 'add')}";
            <!--{ / }-->

            if (type == 'detail') {
                $('#mainImage').html(detailKeyID[keyNo]);
            } else {
                $('#magnifyImage').html(magnifyKeyID[keyNo]);
            }

            <!--{ ? goodsView['imgDetailViewFl'] == 'y' }-->
            $("#mainImage img").data("image-zoom", $("#mainImage img").attr('src'));
//            $("#mainImage img").data("image-zoom", $("#testZoom img").attr('src'));
            $("#mainImage img").elevateZoom();
            <!--{ / }-->
        }
    }

    /**
     * 총 합산
     */
    function gd_total_calculate() {
        var goodsPrice = parseFloat($('#frmView input[name="set_goods_price"]').val());

        //총합계 계산
        goodsTotalCnt =  0;
        $('#frmView input[name*="goodsCnt[]"]').each(function (index) {
            goodsTotalCnt += parseFloat($(this).val());
            goodsOptionCnt[index] = parseFloat($(this).val());
        });
        var goodsTotalPrice = goodsPrice * goodsTotalCnt;
        var setOptionPrice =  0;

        $('#frmView input[name*="optionPriceSum[]"]').each(function () {
            setOptionPrice += parseFloat($(this).val());
        });

        var setOptionTextPrice =  0;
        $('#frmView input[name*="optionTextPriceSum[]"]').each(function () {
            setOptionTextPrice += parseFloat($(this).val());
        });

        var setAddGoodsPrice =  0;
        $('#frmView input[name*="add_goods_total_price["]').each(function () {
            setAddGoodsPrice += parseFloat($(this).val());
        });

        $('#frmView input[name="set_option_price"]').val(setOptionPrice);
        $('#frmView input[name="set_option_text_price"]').val(setOptionTextPrice);
        $('#frmView input[name="set_add_goods_price"]').val(setAddGoodsPrice);

        var totalGoodsPrice = (goodsTotalPrice + setOptionPrice + setOptionTextPrice + setAddGoodsPrice).toFixed({currency.decimal});
        $('#frmView input[name="set_total_price"]').val(totalGoodsPrice);
        $(".goods_total_price").html("{=gd_global_currency_symbol()}" + gd_money_format(totalGoodsPrice) + "<b>{=gd_global_currency_string()}</b>");

        <!--{ ? addGlobalCurrency }-->
        $(".goods_total_price").append("<p class='add_currency'>{=gd_global_add_currency_symbol()} " + gd_add_money_format(totalGoodsPrice) + "{=gd_global_add_currency_string()}</p>");
        <!--{ / }-->

        gd_benefit_calculation();
    }

    /*
     * 혜택
     */
    function gd_benefit_calculation() {
        <!--{ ?  goodsView['goodsPriceDisplayFl'] =='n' }-->
        $('button.goods_cnt').attr('disabled', false);
        $('button.add_goods_cnt').attr('disabled', false);
        return false;
        <!--{ / }-->

        $('input[name="mode"]').val('get_benefit');
        var parameters = $("#frmView").serialize();

        if ($("#frmView input[name*='goodsNo']").length == 0) {
            parameters += "&goodsNo%5B%5D={goodsView['goodsNo']}&goodsCnt%5B%5D=1";
        }

        $.post('./goods_ps.php', parameters, function (data) {
            var getData = $.parseJSON(data);

            if(getData.totalDcPrice > 0 || getData.totalMileage > 0) {
                $(".item_discount_mileage").removeClass('dn');

                if(getData.totalDcPrice > 0 ) {
                    $(".item_discount_mileage span.item_discount").removeClass('dn');
                    $(".end_price dl.total_discount").removeClass('dn');
                    var tmp = new Array();
                    if (getData.goodsDcPrice) tmp.push("{=__('상품')} : " + " {=gd_global_currency_symbol()}" + gd_money_format(getData.goodsDcPrice) + "{=gd_global_currency_string()}");
                    if (getData.memberDcPrice) tmp.push("{=__('회원')} : " + " {=gd_global_currency_symbol()}" + gd_money_format(getData.memberDcPrice) + "{=gd_global_currency_string()}");
                    if (getData.couponDcPrice) tmp.push("{=__('쿠폰')} : " + " {=gd_global_currency_symbol()}" + gd_money_format(getData.couponDcPrice) + "{=gd_global_currency_string()}");

                    $(".benefit_price").html("(" + tmp.join() + ")");

                    $(".total_benefit_price").html("-{=gd_global_currency_symbol()}" + gd_money_format(getData.totalDcPrice) + "<b>{=gd_global_currency_string()}</b>");

                    <!--{ ? addGlobalCurrency }-->
                    $(".end_price .total_benefit_price").append("<p class='add_currency'>-{=gd_global_add_currency_symbol()} " + gd_add_money_format(getData.totalDcPrice) + "{=gd_global_add_currency_string()}</p>");
                    <!--{ / }-->

                    $("#set_dc_price").val(getData.totalDcPrice);

                } else {
                    $("#set_dc_price").val('0');
                    $(".item_discount_mileage span.item_discount").addClass('dn');
                    $(".end_price dl.total_discount").addClass('dn');
                }

                if(getData.totalMileage > 0 ) {
                    $(".item_discount_mileage span.item_mileage").removeClass('dn');
                    var tmp =new Array();
                    if (getData.goodsMileage) tmp.push("{=__('상품')} : " + gd_money_format(getData.goodsMileage) + "{=mileageData['unit']}");
                    if (getData.memberMileage) tmp.push("{=__('회원')} : " + gd_money_format(getData.memberMileage) + "{=mileageData['unit']}");
                    if (getData.couponMileage) tmp.push("{=__('쿠폰')} : " + gd_money_format(getData.couponMileage) + "{=mileageData['unit']}");
                    $(".benefit_mileage").html("("+tmp.join()+")");

                    $(".total_benefit_mileage").html("+" + gd_money_format(getData.totalMileage) + "{=mileageData['unit']}");
                } else {
                    $(".item_discount_mileage span.item_mileage").addClass('dn');
                }
            } else {
                $("#set_dc_price").val('0');
                $(".item_discount_mileage").addClass('dn');
                $(".end_price dl.total_discount").addClass('dn');
            }

            if ($('#frmView input[name="set_total_price"]').val().trim() == '0') {
                $(".total_price").html("{=gd_global_currency_symbol()}0<b>{=gd_global_currency_string()}</b>");
                <!--{ ? addGlobalCurrency }-->
                $(".total_price").append("<p class='add_currency'>{=gd_global_add_currency_symbol()} " + 0 + "{=gd_global_add_currency_string()}</p>");
                <!--{ / }-->
                if ($("#cart_tab_option").length) $("#cart_tab_option .total_benefit_price").html("{=gd_global_currency_symbol()}0<b>{=gd_global_currency_string()}</b>");

            } else {
                var totalPrice = parseFloat($('#frmView input[name="set_total_price"]').val()) - parseFloat(getData.totalDcPrice);
                $(".total_price").html(" {=gd_global_currency_symbol()} " + gd_money_format(totalPrice) + "<b>{=gd_global_currency_string()}</b>");

                <!--{ ? addGlobalCurrency }-->
                $(".total_price").append("<p class='add_currency'>{=gd_global_add_currency_symbol()} " + gd_add_money_format(totalPrice) + "{=gd_global_add_currency_string()}</p>");
                <!--{ / }-->
            }

            $('button.goods_cnt').attr('disabled', false);
            $('button.add_goods_cnt').attr('disabled', false);
            // 쿠폰 구매금액 제한에 따른 처리
            if (typeof getData.couponAlertKey == 'undefined') {
                // 구매 금액 제한에 걸리지 않음
            } else {
                gd_coupon_cancel(getData.couponAlertKey, 'noCalculation');
                alert("{=__('적용 쿠폰이 구매 금액 제한에 걸려 적용 쿠폰이 취소 되었습니다.')}");
            }
        });
    }


    /**
     * 바로구매, 장바구니, 상품 보관함
     *
     * @param string modeStr 처리 모드
     */
    var salesUnit = parseInt("{=gd_isset(goodsView['salesUnit'],1)}");
    var minOrderCnt = parseInt("{=gd_isset(goodsView['minOrderCnt'],1)}");
    var maxOrderCnt = parseInt("{=gd_isset(goodsView['maxOrderCnt'],0)}");
    function gd_goods_order(modeStr)
    {
        {customScript}
        $('#frmView input[name=\'cartMode\']').val(modeStr);

        if (modeStr == 'w') {
            <!--{ ? gd_is_login() === false }-->
            alert("{=__('로그인하셔야 본 서비스를 이용하실 수 있습니다.')}");
            document.location.href = "../member/login.php";
            return false;
            <!--{ : }-->

            var goodsNoCnt = $('#frmView input[name*="goodsNo[]"]').length;
            if(goodsNoCnt == 0) {
                $('#frmView input[name="cartMode"]').val('{=goodsView["goodsNo"]}');
            }

            $('#frmView input[name="mode"]').val('wishIn');
            $('#frmView').attr('action','../mypage/wish_list_ps.php');
            <!--{ / }-->
        } else {
            $('#frmView input[name="mode"]').val('cartIn');
            $('#frmView').attr('action','../order/cart_ps.php');

            <!--{ ? goodsView['optionFl'] == 'y'}-->
            var goodsInfo = $('#frmView input[name*=\'optionSno[]\']').length;
            <!--{ : }-->
            var goodsInfo = $('#frmView input[name="optionSnoInput"]').val();
            <!--{ / }-->

            if (goodsInfo == '') {
                alert("{=__('Please click the [Decision] to complete options selecting.')}");
                return false;
            }

            <!--{ ? gd_isset(goodsView['optionTextFl']) == 'y' }-->
            if(!goodsViewController.option_text_valid("#frmView")) {
                alert("{=__('입력 옵션을 확인해주세요.')}");
                return false;
            }
                <!--{ ? gd_isset(goodsView['stockFl']) == 'y' }-->
                var checkOptionCnt = goodsViewController.option_text_cnt_valid("#frmView");
                if(checkOptionCnt) {
                    alert(__('재고가 부족합니다. 현재 %s개의 재고가 남아 있습니다.', checkOptionCnt));
                    return false;
                }
                <!--{ / }-->
            <!--{ / }-->

            <!--{ ? goodsView['addGoods'] }-->
            //추가상품
            if(!goodsViewController.add_goods_valid("#frmView")) {
                alert("{=__('필수 추가 상품을 확인해주세요.')}");
                return false;
            }
            <!--{ / }-->

        }

        var submitFl = true;
        if (isNaN(goodsTotalCnt)) goodsTotalCnt = 1;
        if (_.isEmpty(goodsOptionCnt)) goodsOptionCnt[0] = 1;
        <!--{ ? goodsView['fixedSales'] == 'goods' }-->
        var perSalesCnt = goodsTotalCnt % salesUnit;

        if (perSalesCnt !== 0) {
            alert(__('%s개 단위로 묶음 주문 상품입니다.', salesUnit));
            submitFl = false;
        }
        <!--{ : }-->
        for (i in goodsOptionCnt) {
            if (isNaN(goodsOptionCnt[i])) goodsOptionCnt[i] = 0;
            var perSalesCnt = goodsOptionCnt[i] % salesUnit;

            if (perSalesCnt !== 0) {
                alert(__('%s개 단위로 묶음 주문 상품입니다.', salesUnit));
                submitFl = false;
                break;
            }
        }
        <!--{ / }-->

        if (submitFl == true) {
            <!--{ ? goodsView['fixedOrderCnt'] == 'goods'}-->
            var fixedAlertString = '상품당';
            <!--{ / }-->
            <!--{ ? goodsView['fixedOrderCnt'] == 'option'}-->
            var fixedAlertString = '옵션당';
            <!--{ / }-->
            <!--{ ? goodsView['fixedOrderCnt'] == 'id' }-->
            var fixedAlertString = 'ID당';
            <!--{ / }-->

            <!--{ ? goodsView['fixedOrderCnt'] == 'goods' || goodsView['fixedOrderCnt'] == 'id' }-->
            <!--{ ? goodsView['fixedOrderCnt'] == 'goods'}-->
            if (minOrderCnt > 1 && goodsTotalCnt < minOrderCnt) {
                alert(__('최소 구매 수량 미달 : ' + fixedAlertString + ' 최소 %s개 이상 구매가능합니다.', minOrderCnt));
                submitFl = false;
            } else if (maxOrderCnt > 0 && goodsTotalCnt > maxOrderCnt) {
                alert(__('최대 구매 수량 초과 : ' + fixedAlertString + ' 최대 %s개 이하 구매가능합니다.', maxOrderCnt));
                submitFl = false;
            }
            <!--{ / }-->
            <!--{ ? goodsView['fixedOrderCnt'] == 'id' }-->
            //ajax로 id구매카운트 체크
            var params = {
                mode: 'check_memberOrderGoodsCount',
                goodsNo: {=goodsView['goodsNo']},
            };
            $.ajax({
                method: "POST",
                async: false,
                cache: false,
                url: '../order/order_ps.php',
                data: params,
                success: function (data) {
                    // error 메시지 예외 처리용
                    if (!_.isUndefined(data.error) && data.error == 1) {
                        alert(data.message);
                        return false;
                    }

                    if (minOrderCnt > 1 && (goodsTotalCnt + data.count) < minOrderCnt) {
                        alert(__('최소 구매 수량 미달 : ' + fixedAlertString + ' 최소 %s개 이상 구매가능합니다.', minOrderCnt));
                        submitFl = false;
                    } else if (minOrderCnt > 1 && goodsTotalCnt < minOrderCnt) {
                        alert(__('최소 구매 수량 미달 : ' + fixedAlertString + ' 최소 %s개 이상 구매가능합니다.', minOrderCnt));
                        submitFl = false;
                    } else if (maxOrderCnt > 0 && (goodsTotalCnt + data.count) > maxOrderCnt) {
                        alert(__('최대 구매 수량 초과 : ' + fixedAlertString + ' 최대 %s개 이하 구매가능합니다.', maxOrderCnt));
                        submitFl = false;
                    } else if (maxOrderCnt > 0 && goodsTotalCnt > maxOrderCnt) {
                        alert(__('최대 구매 수량 초과 : ' + fixedAlertString + ' 최대 %s개 이하 구매가능합니다.', maxOrderCnt));
                        submitFl = false;
                    }
                },
                error: function (data) {
                    alert(data.message);
                    submitFl = false;
                }
            });
            <!--{ / }-->
            <!--{ : }-->
            for (i in goodsOptionCnt) {
                if (isNaN(goodsOptionCnt[i])) goodsOptionCnt[i] = 0;
                var perSalesCnt = goodsOptionCnt[i] % salesUnit;

                if (minOrderCnt > 1 && goodsOptionCnt[i] < minOrderCnt) {
                    alert(__('최소 구매 수량 미달 : ' + fixedAlertString + ' 최소 %s개 이상 구매가능합니다.', minOrderCnt));
                    submitFl = false;
                    break;
                } else if (maxOrderCnt > 0 && goodsOptionCnt[i] > maxOrderCnt) {
                    alert(__('최대 구매 수량 초과 : ' + fixedAlertString + ' 최대 %s개 이하 구매가능합니다.', maxOrderCnt));
                    submitFl = false;
                    break;
                }
            }
            <!--{ / }-->
        }

        if ((modeStr == 'd' || modeStr == 'pa') && submitFl === false) {
            return false;
        }

        if(modeStr == 'pa') {
            return true;
        }

        $('#frmView').attr('target','');

        // 쿠폰 사용기간 체크
        if ($('input:hidden[name="couponApplyNo[]"]').val()) {
            var checkCouponType = true;
            var couponApplyNo;
            $.ajax({
                method: "POST",
                cache: false,
                async: false,
                url: "../goods/goods_ps.php",
                data: {mode: 'goodsCheckCouponTypeArr', couponNo : $('input:hidden[name="couponApplyNo[]"]').val() },
                success: function (data) {
                    checkCouponType = data.isSuccess;
                    couponApplyNo = data.setCouponApplyNo.join('{c.INT_DIVISION}');
                },
                error: function (e) {
                }
            });

            if(!checkCouponType) {
                $('input:hidden[name="couponApplyNo[]"]').val(couponApplyNo);
                alert('사용기간이 만료된 쿠폰이 포함되어 있어 제외 후 진행합니다.');
            }
        }

        if (modeStr == 'w' || typeof modeStr == 'undefined') {
            var params = $("#frmView").serialize();

            if (modeStr == 'w') {
                var ajaxUrl = '../mypage/wish_list_ps.php';
                var target = $("#addWishLayer");
            } else {
                var ajaxUrl = '../order/cart_ps.php';
                var target = $("#addCartLayer");
            }

            $.ajax({
                method: "POST",
                cache: false,
                url: ajaxUrl,
                data: params,
                success: function (data) {
                    // error 메시지 예외 처리용
                    if (!_.isUndefined(data.error) && data.error == 1) {
                        alert(data.message);
                        return false;
                    }

                    <!--{ ? cartInfo.wishPageMoveDirectFl == 'y' || (cartInfo.wishPageMoveDirectFl == 'n' && cartInfo.moveWishPageDeviceFl == 'mobile') }-->
                    if (modeStr == 'w') {
                        location.href = "../mypage/wish_list.php";
                        return false;
                    }
                    <!--{ / }-->
                    <!--{ ? cartInfo.moveCartPageFl == 'y' || (cartInfo.moveCartPageFl == 'n' && cartInfo.moveCartPageDeviceFl == 'mobile') }-->
                    if (typeof modeStr == 'undefined') {
                        location.href = "../order/cart.php";
                        return false;
                    }
                    <!--{ / }-->
                    target.removeClass('dn');
                    $('#layerDim').removeClass('dn');
                    target.find('> div').center();
                },
                error: function (data) {
                    alert(data.message);
                }
            });
        } else {
            $('#frmView').submit();
        }
    }

    <!--{ ?goodsView['optionImagePreviewFl'] == 'y' }-->

    /**
     * 옵션 선택시 상세 이미지 변경
     *
     * @param integer optionNo 상품 배열 키값 (기본 0)
     */
    function gd_option_image_apply() {
        <!--{ ? goodsView['optionDisplayFl'] == 's' }-->
        var optionImgSrc = $('select[name="optionSnoInput"] option:selected').data('img-src');
        <!--{ : goodsView['optionDisplayFl'] == 'd' }-->
        var optionImgSrc = $('select[name="optionNo_0"] option:selected').data('img-src');
        <!--{ / }-->

        if(optionImgSrc && optionImgSrc !='blank') $("#mainImage img").attr("src",optionImgSrc);
    }
    <!--{ / }-->

    <!--{ ? goodsView['timeSaleFl'] }-->
    /**
     * 시간간격 카운트
     * @returns {String}
     */
    function gd_dailyMissionTimer(duration) {

        var timer = duration;
        var days, hours, minutes, seconds;

        var interval = setInterval(function(){
            days	= parseInt(timer / 86400, 10);
            hours	= parseInt(((timer % 86400 ) / 3600), 10);
            minutes = parseInt(((timer % 3600 ) / 60), 10);
            seconds = parseInt(timer % 60, 10);

            if(days == 0) {
                $('.time_day_view').hide();
            } else {
                days = days < 10 ? "0" + days : days;
                $('#displayTimeSaleDay').text(days);
            }

            hours 	= hours < 10 ? "0" + hours : hours;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            $('#displayTimeSaleTime').text(hours + " : " + minutes + " : " + seconds);

            $("#displayTimeSale").show();

            if (--timer < 0) {
                timer = 0;
                clearInterval(interval);
            }
        }, 1000);
    }
    <!--{ / }-->

    //-->
</script>
<script type="text/html" id="optionTemplate">
    <tbody id="option_display_item_<%=displayOptionkey%>">
    <tr class="check optionKey_<%=optionSno%>">
        <td class="cart_prdt_name">
            <input type="hidden" name="goodsNo[]" value="{=goodsView['goodsNo']}" />
            <input type="hidden" name="optionSno[]" value="<%=optionSno%>" />
            <input type="hidden" name="goodsPriceSum[]" value="0" />
            <input type="hidden" name="addGoodsPriceSum[]" value="0" />
            <input type="hidden" name="displayOptionkey[]" value="<%=displayOptionkey%>" />
            <!--{ ? couponUse == 'y' }-->
            <input type="hidden" name="couponApplyNo[]" value="" />
            <input type="hidden" name="couponSalePriceSum[]" value="" />
            <input type="hidden" name="couponAddPriceSum[]" value="" />
            <!--{ / }-->
            <div class="cart_tit_box">
                <strong class="cart_tit">
                    <span><%=optionName%></span>
                    <span><%=optionSellCodeValue%><%=optionDeliveryCodeValue%></span>
                    <!--{ ? couponUse == 'y' && couponConfig['chooseCouponMemberUseType'] != 'member' }-->
                    <span class="cart_btn_box">
                            <!--{ ? gd_is_login() === false }-->
                            <button type="button" class="btn_alert_login"><img src="../img/common/btn/btn_coupon_apply.png" alt="{=__('쿠폰적용')}"/></button>
                        <!--{ : }-->
                            <a href="#lyCouponApply" id="coupon_apply_<%=displayOptionkey%>" class="btn_open_layer" data-key="<%=displayOptionkey%>">
                                <img src="../img/common/btn/btn_coupon_apply.png" alt="{=__('쿠폰적용')}"/>
                            </a>
                        <!--{ / }-->
                        </span>
                    <!--{ / }-->
                    <span id="option_text_display_<%=displayOptionkey%>"></span>
                </strong>
            </div>
        </td>
        <td>
                <span class="count">
                    <span class="goods_qty">
                        <input type="text" class="text goodsCnt_<%=displayOptionkey%>" title="{=__('수량')}" name="goodsCnt[]" value="{=gd_isset(goodsView['defaultGoodsCnt'])}" data-value="{=gd_isset(goodsView['defaultGoodsCnt'])}" data-stock="<%=optionStock%>" data-key="<%=displayOptionkey%>" onchange="goodsViewController.input_count_change(this, '1');return false;" />
                        <span>
                            <button type="button" class="up goods_cnt" title="{=__('증가')}"  value="up{=c.STR_DIVISION}<%=displayOptionkey%>">{=__('증가')}</button>
                            <button type="button" class="down goods_cnt" title="{=__('감소')}"  value="dn{=c.STR_DIVISION}<%=displayOptionkey%>">{=__('감소')}</button>
                        </span>
                    </span>
                </span>
        </td>
        <td class="item_choice_price">
            <input type="hidden" name="option_price_<%=displayOptionkey%>" value="<%=optionPrice%>" />
            <input type="hidden" name="optionPriceSum[]" value="0" />
            {=gd_global_currency_symbol()}<strong class="option_price_display_<%=displayOptionkey%>"><%=optionPrice%></strong>{=gd_global_currency_string()}
        </td>
        <td>
            <button type="button" class="delete_goods" data-key="option_display_item_<%=displayOptionkey%>"><img src="../img/icon/shop_cart/ico_cart_del.png" alt="{=__('삭제')}"/></button>
        </td>
    </tr>
    </tbody>
</script>
<script type="text/html" id="addGoodsTemplate">
    <tr id="add_goods_display_item_<%=displayOptionkey%>_<%=displayAddGoodsKey%>" class="check item_choice_divide">
        <td class="cart_prdt_name">
            <div class="cart_tit_box">
                <input type="hidden" name="addGoodsNo[<%=optionIndex%>][]" value="<%=optionSno%>" data-group="<%=addGoodsGroup%>" />
                <strong class="item_choice_tit">
                    <em class="item_choice_photo"><%=addGoodsimge%></em><span><%=addGoodsName%></span>
                </strong>
            </div>
        </td>
        <td>
            <span class="count">
                <span class="goods_qty">
                    <input type="text" name="addGoodsCnt[<%=optionIndex%>][]" class="text addGoodsCnt_<%=displayOptionkey%>_<%=displayAddGoodsKey%>" title="{=__('수량')}" value="1"  data-key="<%=displayOptionkey%>{=c.INT_DIVISION}<%=displayAddGoodsKey%>"  data-value="1" data-stock-fl="<%=addGoodsStockFl%>"  data-stock="<%=addGoodsStock%>" onchange="goodsViewController.input_count_change(this);return false;"/>
                    <span>
                        <button type="button" class="up add_goods_cnt" title="{=__('증가')}"  value="up{=c.STR_DIVISION}<%=displayOptionkey%>{=c.INT_DIVISION}<%=displayAddGoodsKey%>">{=__('증가')}</button>
                        <button type="button" class="down add_goods_cnt" title="{=__('감소')}" value="dn{=c.STR_DIVISION}<%=displayOptionkey%>{=c.INT_DIVISION}<%=displayAddGoodsKey%>">{=__('감소')}</button>
                    </span>
                </span>
            </span>
        </td>
        <td class="item_choice_price">
            <input type="hidden" name="add_goods_price_<%=displayOptionkey%>_<%=displayAddGoodsKey%>" value="<%=addGoodsPrice%>" />
            <input type="hidden" name="add_goods_total_price[<%=optionIndex%>][]" value="" />
            {=gd_global_currency_symbol()}<strong class="add_goods_price_display_<%=displayOptionkey%>_<%=displayAddGoodsKey%>"></strong>{=gd_global_currency_string()}
        </td>
        <td>
            <button type="button" class="delete_add_goods" data-key="<%=displayOptionkey%>-<%=displayAddGoodsKey%>"><img src="../img/icon/shop_cart/ico_cart_del.png" alt="{=__('삭제')}"/></button>
        </td>
    </tr>
</script>

<div class="content_box">
    
    <div class="location_wrap">
        <div class="location_cont">
            <em><a href="#" class="local_home">HOME</a></em>
            <!--{ @ goodsCategoryList }-->
            <!--{ ? .cateNm }-->
            <span>&nbsp;&gt;&nbsp;</span>
            <div class="location_select">
                <div class="location_tit"><a href="#"><span>{=.cateNm}</span></a></div>
                <ul style="display:none;">
                    <!--{ @ .data }-->
                    <li><a href="./goods_list.php?cateCd={..key_}"><span>{=..value_}</span></a></li>
                    <!--{ / }-->
                </ul>
            </div>
            <!--{ / }-->
            <!--{ / }-->
        </div>
    </div>
    <!-- //location_wrap -->
    <!-- 상품 상단 -->
    <div class="item_photo_info_sec">
        
        <div class="item_photo_view_box">
            <div class="item_photo_view">
                <div class="item_photo_big">
                    <span class="img_photo_big"><a href="#lyZoom" id="mainImage" <!--{ ? gd_isset(goodsView['magnifyImage']) == 'y' }-->class="zoom_layer_open btn_open_layer"<!--{ / }-->>{=goodsView['image']['detail']['img'][0]}</a></span>
                    <a href="#lyZoom" class="btn_zoom zoom_layer_open btn_open_layer"><img src="../img/icon/goods_icon/icon_zoom.png" alt="{=__('이미지 확대 보기')}"></a>
                </div>
                <div id="testZoom" style="display:none">
                    {=goodsView['image']['magnify']['img'][0]}
                </div>
                <!-- //item_photo_big -->
                <!--{ ? in_array('goodsColor',displayAddField) }-->
                {=goodsView['goodsColor']}
                <!--{ / }-->
                <div class="item_photo_slide">
                    <button type="button" class="slick_goods_prev"><img src="../img/icon/shop_cart/btn_slide_prev.png" alt="{=__('이전 상품 이미지')}"/></button>
                    <ul class="slider_wrap slider_goods_nav">
                        <!--{ @ gd_isset(goodsView['image']['detail']['thumb']) }-->
                        <li><a href="javascript:gd_change_image('{=.key_}', 'detail');">{=.value_}</a></li>
                        <!--{ / }-->
                    </ul>
                    <button type="button" class="slick_goods_next"><img src="../img/icon/shop_cart/btn_slide_next.png" alt="{=__('다음 상품 이미지')}"/></button>
                </div>
                <!-- //item_photo_slide -->
            </div>
            <!-- //item_photo_view -->
        </div>
        <!-- //item_photo_view_box -->

        <form name="frmView" id="frmView" method="post">
            <input type="hidden" name="mode" value="cartIn" />
            <input type="hidden" name="scmNo" value="{=goodsView['scmNo']}" />
            <input type="hidden" name="cartMode" value="" />
            <input type="hidden" name="set_goods_price" value="{=gd_global_money_format(gd_isset(goodsView['goodsPrice'], 0), false)}" />
            <input type="hidden" id="set_goods_fixedPrice" name="set_goods_fixedPrice" value="{=gd_isset(goodsView['fixedPrice'], 0)}" />
            <input type="hidden" name="set_goods_mileage" value="{=gd_isset(goodsView['goodsMileageBasic'], 0)}" />
            <input type="hidden" name="set_goods_stock" value="{=gd_isset(goodsView['stockCnt'], 0)}" />
            <input type="hidden" name="set_coupon_dc_price" value="{=gd_isset(goodsView['goodsPrice'], 0)}" />
            <input type="hidden" id="set_goods_total_price" name="set_goods_total_price" value="0" />
            <input type="hidden" id="set_option_price" name="set_option_price" value="0" />
            <input type="hidden" id="set_option_text_price" name="set_option_text_price" value="0" />
            <input type="hidden" id="set_add_goods_price" name="set_add_goods_price" value="0" />
            <input type="hidden" name="set_total_price" value="{=gd_global_money_format(gd_isset(goodsView['goodsPrice'], 0), false)}" />
            <input type="hidden" name="mileageFl" value="{=goodsView['mileageFl']}" />
            <input type="hidden" name="mileageGoods" value="{=goodsView['mileageGoods']}" />
            <input type="hidden" name="mileageGoodsUnit" value="{=goodsView['mileageGoodsUnit']}" />
            <input type="hidden" name="goodsDiscountFl" value="{=goodsView['goodsDiscountFl']}" />
            <input type="hidden" name="goodsDiscount" value="{=goodsView['goodsDiscount']}" />
            <input type="hidden" name="goodsDiscountUnit" value="{=goodsView['goodsDiscountUnit']}" />
            <input type="hidden" name="taxFreeFl" value="{=goodsView['taxFreeFl']}" />
            <input type="hidden" name="taxPercent" value="{=goodsView['taxPercent']}" />
            <input type="hidden" name="scmNo" value="{=goodsView['scmNo']}" />
            <input type="hidden" name="brandCd" value="{=goodsView['brandCd']}" />
            <input type="hidden" name="cateCd" value="{=goodsView['cateCd']}" />
            <input type="hidden" id="set_dc_price" value="0" />
            <input type="hidden" id="goodsOptionCnt" value="1" />
            <input type="hidden" name="optionFl" value="{=goodsView['optionFl']}" />
            <!--{ ? goodsView['timeSaleFl'] }-->
            <!--{ ? goodsView['timeSaleInfo']['mileageFl'] == 'n' }-->
            <input type="hidden" name="goodsMileageExcept" value="y" />
            <!--{ / }-->
            <!--{ ? goodsView['timeSaleInfo']['memberDcFl'] == 'n' }-->
            <input type="hidden" name="memberBenefitExcept" value="y" />
            <!--{ / }-->
            <!--{ ? goodsView['timeSaleInfo']['couponFl'] == 'n' }-->
            <input type="hidden" name="couponBenefitExcept" value="y" />
            <!--{ / }-->
            <!--{ / }-->
            <input type="hidden" name="goodsDeliveryFl" value="{=goodsView['delivery']['basic']['goodsDeliveryFl']}" />
            <input type="hidden" name="sameGoodsDeliveryFl" value="{=goodsView['delivery']['basic']['sameGoodsDeliveryFl']}" />
            <input type="hidden" name="useBundleGoods" value="1" />
            <input type="hidden" name="ac_id" value="" />
            <div class="item_info_box">
                <!--{ ? goodsView['timeSaleFl'] }-->
                <div id="displayTimeSale" class="time_sale" style="display:none">
                    <strong class="time_sale_num">{=goodsView['timeSaleInfo']['benefit']}<span>%</span> <span class="skip">{=__('타임세일')}</span></strong>
                    <strong class="time_day">
                        <span id="displayTimeSaleDay" class="time_day_view"></span><b>{=__('일')}</b>
                        <span id="displayTimeSaleTime"></span>
                    </strong>
                    <!--{ ? goodsView['timeSaleInfo']['orderCntDisplayFl'] == 'y' }-->
                    <strong class="time_now_order">{=__('현재')} <span>{=number_format(goodsView['timeSaleInfo']['orderCnt'])}</span>{=__('개 구매')}</strong>
                    <!--{ / }-->
                </div>
                <!--{ / }-->
                <!-- //time_sale -->
                <div class="item_tit_detail_cont">
                    <div class="item_detail_tit">
                   
                        <!--{ ? in_array('goodsIcon',displayAddField) && goodsView['goodsIcon'] }-->
                        <div class="prd_icon">{=goodsView['goodsIcon']}</div>
                        <!--{ / }-->
                        <h3><!--{ ? goodsView['timeSaleFl'] && goodsView['timeSaleInfo']['goodsNmDescription']}-->[{=goodsView['timeSaleInfo']['goodsNmDescription']}]<!--{ / }-->{=gd_isset(goodsView['goodsNmDetail'])}</h3>
                        <div class="btn_layer btn_qa_share_box">
                            <!--{ ? goodsView['qrCodeFl'] == 'y' }-->
                            <span class="btn_gray_list"><a href="#lyQrcode" class="btn_gray_mid"><em>{=__('QR 코드')}</em></a></span>
                            <!--{ / }-->
                            <!--{ ? snsShareUseFl }-->
                            <span class="btn_gray_list target_sns_share"><a href="#lySns" class="btn_gray_mid"><em>{=__('공유')}</em></a></span>
                            <!--{ / }-->
                            <!--{ ? goodsView['qrCodeFl'] == 'y' }-->
                            <div id="lyQrcode" class="layer_area" style="display:none;">
                                <div class="ly_wrap qrcode_layer">
                                    <div class="ly_tit">
                                        <strong>{=__('QR 코드')}</strong>
                                    </div>
                                    <div class="ly_cont">
                                        <div class="qrcode_list">
                                            <div class="qrcode_img_box">
                                                <strong><img src="{goodsView['qrCodeImage']}" id="qrCodeImage"  alt="{=__('QR 코드 이미지')}" /></strong>
                                                <!--{ ? goodsView['qrStyle'] == 'btn' }-->
                                                <span class="btn_gray_list"><a href="#download" id="qrCodeDownloadButton" class="btn_gray_mid"><em class="icon_download">{=__('QR코드 저장하기')}</em></a></span>
                                                <!--{ / }-->
                                            </div>
                                            <dl>
                                                <dt>{=__('QR코드 인식방법')}</dt>
                                                <dd>
                                                    01 {=__('QR코드 앱 다운로드')}<br />
                                                    02 {=__('스마트폰으로 QR코드 인식')}<br />
                                                    03 {=__('쇼핑몰 상품페이지로 이동')}
                                                </dd>
                                            </dl>
                                            <dl>
                                                <dt>{=__('QR코드란?')}</dt>
                                                <dd>{=__('QR코드(QR code)는 흑백격자무늬 패턴으로 %s정보를 나타내는 매트릭스 형식의 바코드입니다.', '<br />')}</dd>
                                            </dl>
                                        </div>
                                    </div>
                                    <!-- //ly_cont -->
                                    <a href="#close" class="ly_close"><img src="../img/common/layer/btn_layer_close.png" alt="{=__('닫기')}"></a>
                                </div>
                                <!-- //ly_wrap -->
                            </div>
                            <!-- //layer_area -->
                            <!--{ / }-->

                            <!--{ ? snsShareUseFl }-->
                            <div id="lySns" class="layer_area" style="display:none;">
                                <div class="ly_wrap sns_layer">
                                    <div class="ly_tit">
                                        <strong>SNS {=__('공유하기')}</strong>
                                    </div>
                                    <div class="ly_cont">
                                        <div class="sns_list">
                                            <ul>
                                                <!--{ @ snsShareButton }-->
                                                {.value_}
                                                <!--{ / }-->
                                            </ul>
                                            <!--{ ? snsShareUrl }-->
                                            <div class="sns_copy_url">
                                                <input type="text" value="{snsShareUrl}"/>
                                                <button type="button" class="gd_clipboard" title="{=__('상품주소')}" data-clipboard-text="{snsShareUrl}"><em>{=__('URL복사')}</em></button>
                                            </div>
                                            <!--{ / }-->
                                        </div>
                                    </div>
                                    <!-- //ly_cont -->
                                    <a href="#close" class="ly_close"><img src="../img/common/layer/btn_layer_close.png" alt="{=__('닫기')}"></a>
                                </div>
                                <!-- //ly_wrap -->
                            </div>
                            <!-- //layer_area -->
                            <!--{ / }-->
                        </div>
                        <!-- //btn_qa_share_box -->
                    </div>
                    <div class="item_detail_list">
                       
                   
                       
                        <!--{ @ displayField }-->
                        <!--{ ? .value_ : 'shortDescription' }-->
                        <!--{ ? gd_isset(goodsView['shortDescription']) }-->
                        <dl>
                            <dt>{=__('짧은설명')}</dt>
                            <dd>{goodsView['shortDescription']}</dd>
                        </dl>
                        <!--{ / }-->
                        <!--{ : 'fixedPrice' }-->
                        <!--{ ? gd_isset(goodsView['fixedPrice']) > 0  && goodsView['goodsPriceDisplayFl'] =='y' }-->
         
                        <!--{ / }-->
                        
                        <!--{ : 'couponPrice' }-->
                        <!--{ ? gd_isset(goodsView['couponPrice']) > 0 && couponUse == 'y'  && goodsView['goodsPriceDisplayFl'] =='y' }-->
                        <dl class="item_price">
                            <dt>{=__('쿠폰적용가')}</dt>
                            <dd>
                                <strong>{=gd_global_currency_symbol()}{=gd_global_money_format(goodsView['couponPrice'])}</strong><strong>{=gd_global_currency_string()}</strong>
                                <strong class="item_apply">( -{=gd_global_money_format(goodsView['couponSalePrice'])}{=gd_global_currency_string()}<!--{ ? in_array('dcRate', displayAddField) && gd_isset(goodsView['couponDcRate']) }-->, {=goodsView['couponDcRate']}%<!--{ / }-->)</strong>
                            </dd>
                        </dl>
                        <!--{ / }-->
                        <!--{ : 'myCouponPrice' }-->
                        <!--{ ? gd_isset(goodsView['myCouponSalePrice']) > 0 && couponUse == 'y'  && goodsView['goodsPriceDisplayFl'] =='y' }-->
                        <dl class="item_price">
                            <dt>{=__('내 쿠폰적용가')}</dt>
                            <dd>
                                <strong>{=gd_global_currency_symbol()}{=gd_global_money_format(goodsView['myCouponSalePrice'])}</strong><strong>{=gd_global_currency_string()}</strong>
                                <strong class="item_apply">( -{=gd_global_money_format(goodsView['myCouponPrice'])}{=gd_global_currency_string()}<!--{ ? in_array('dcRate', displayAddField) && gd_isset(goodsView['myCouponDcRate']) }-->, {=goodsView['myCouponDcRate']}%<!--{ / }-->)</strong>
                            </dd>
                        </dl>
                        <!--{ / }-->
                        <!--{ : 'goodsPrice' }-->
                        <dl class="<!--{ ? goodsView['timeSaleFl'] }-->time_sale_price<!--{ : }-->item_price<!--{ / }-->">
                            <dt><!--{ ? goodsView['timeSaleFl'] }-->{=__('타임세일가')}<!--{ : }-->Price<!--{ / }--></dt>
                            <dd>
                                <!--{ ? goodsView['soldOut'] == 'y' && soldoutDisplay.soldout_price == 'text' }-->
                                <strong>{=soldoutDisplay.soldout_price_text}</strong>
                                <!--{ : goodsView['soldOut'] == 'y' && soldoutDisplay.soldout_price == 'custom'}-->
                                <img src="{soldoutDisplay.soldout_price_img}" alt="{=__('품절')}">
                                <!--{ : }-->
                                <!--{ ? goodsView['goodsPriceString'] != '' }-->
                                <strong>{goodsView['goodsPriceString']}</strong>
                                <!--{ : }-->
                                <!--{ ? goodsView['timeSaleFl'] && goodsView['timeSaleInfo']['goodsPriceViewFl'] == 'y' && goodsView['oriGoodsPrice'] > 0 }-->
                                <del>{=gd_global_currency_symbol()}{=gd_global_money_format(goodsView['oriGoodsPrice'])}{=gd_global_currency_string()}</del>
                                <!--{ / }-->
                                <strong><!--{ ? goodsView['timeSaleFl'] }--><img src="../img/icon/goods_icon/icon_time.png" alt="{=__('타임세일가')}"><!--{ / }-->{=goodsPriceTag}{=gd_global_currency_symbol()}{=gd_global_money_format(goodsView['goodsPrice'])}{=goodsPriceTag2}</strong>{=gd_global_currency_string()}
                                <!-- 글로벌 참조 화폐 임시 적용 -->
                                <!--{ ? addGlobalCurrency }-->
                                <em class="add_currency">{=goodsPriceTag}{=gd_global_add_currency_display(goodsView['goodsPrice'])}{=goodsPriceTag2}</em>
                                <!--{ / }-->
                                <!--{ / }-->
                                <!--{ / }-->
                            </dd>
                        </dl>
                        <!--{ : 'goodsDiscount' }-->
                        <!--{ ? goodsView['dcPrice'] > 0 }-->
                        <dl class="item_price">
                            <dt>{=__('할인적용가')}</dt>
                            <dd>
                                <strong>{=gd_global_currency_symbol()}{=gd_global_money_format(goodsView['goodsPrice'] - goodsView['dcPrice'])}</strong>{=gd_global_currency_string()}
                                <!--{ ? addGlobalCurrency }-->
                                <em class="add_currency">{=gd_global_add_currency_display(goodsView['goodsPrice'] - goodsView['dcPrice'])}</em>
                                <!--{ / }-->
                                <!--{ ? in_array('dcRate', displayAddField) && gd_isset(goodsView['goodsDcRate']) }--> <strong class="item_apply">({=goodsView['goodsDcRate']}%)</strong><!--{ / }-->
                            </dd>
                        </dl>
                        <!--{ / }-->
                        <!--{ : 'maxOrderCnt' }-->
                  
                        <!--{ : 'benefit' }-->
                        <dl class="item_discount_mileage dn">
                            <dt>{=__(displayDefaultField[.value_])}</dt>
                            <dd>
                                <span class="item_discount">{=__('할인')} : <strong class="total_benefit_price"></strong> <strong class="benefit_price item_apply"></strong></span>
                                <span class="item_mileage">{=__('적립')} {=gd_display_mileage_name()} : <strong class="total_benefit_mileage"></strong> <strong class="benefit_mileage item_apply"></strong></span>
                            </dd>
                        </dl>
                        <!--{ : 'couponDownload' }-->
                        <!--{ ? empty(couponArrData) === false }-->
                        <dl>
                            <dt>{=__(displayDefaultField[.value_])}</dt>
                            <!--{ ? gd_is_login() === false }-->
                            <dd><span class="btn_gray_list"><a href="#;" id="lnCouponDown" class="btn_gray_small btn_alert_login"><em class="icon_download">{=__('쿠폰 다운받기')}</em></a></span></dd>
                            <!--{ : }-->
                            <dd><span class="btn_gray_list"><a href="#lyCouponDown" class="btn_gray_small btn_open_layer"><em class="icon_download">{=__('쿠폰 다운받기')}</em></a></span></dd>
                            <!--{ / }-->
                        </dl>
                        <!--{ / }-->
                        
                        <!--{ : 'delivery' }-->
                        <!--{ ? !gGlobal.isFront }-->
               
                        
            
                        <!--{ / }-->
                        <!--{ : 'goodsWeight' }-->
                        <!--{ ? gd_isset(goodsView['goodsWeight']) > 0 && gd_isset(goodsView['goodsVolume']) > 0 }-->
                        <dl>
                            <dt style="width: 85px;">{=__(displayDefaultField[.value_])}</dt>
                            <dd>{=goodsView['goodsWeight']}{=weight.unit} / {=goodsView['goodsVolume']}{=gd_isset(volume.unit, '㎖')}</dd>
                        </dl>
                        <!--{ : }-->
                        <!--{ ? gd_isset(goodsView['goodsWeight']) > 0 }-->
                        <dl>
                            <dt>Standard weight</dt>
                            <dd>{=goodsView['goodsWeight']}{=weight.unit}</dd>
                        </dl>
                        <!--{ / }-->
                        <!--{ ? gd_isset(goodsView['goodsVolume']) > 0 }-->
                        <dl>
                            <dt>{=__(displayDefaultField[.value_])}</dt>
                            <dd>{=goodsView['goodsVolume']}{=gd_isset(volume.unit, '㎖')}</dd>
                        </dl>
                        <!--{ / }-->
                        <!--{ / }-->
                        <!--{ : 'addInfo' }-->
                        <!--{ ? empty(goodsView['addInfo']) === false }-->
                        <!--{ @ goodsView['addInfo'] }-->
                        <dl>
                            <dt>{=..infoTitle}</dt>
                            <dd>{=..infoValue}</dd>
                        </dl>
                        <!--{ / }-->
                        <!--{ / }-->
                        <!--{ : 'effectiveStartYmd' }-->
                        <!--{ ? (goodsView['effectiveStartYmd'] != '0000-00-00 00:00:00' && goodsView['effectiveStartYmd']) || (goodsView['effectiveEndYmd'] != '0000-00-00 00:00:00' && goodsView['effectiveEndYmd']) }-->
                        <dl>
                            <dt>{=__(displayDefaultField[.value_])}</dt>
                            <dd>
                                <!--{ ? goodsView['effectiveStartYmd'] != '0000-00-00 00:00:00' && goodsView['effectiveStartYmd'] }-->
                                {=gd_date_format(__('Y년 m월 d일'), goodsView['effectiveStartYmd'])}
                                <!--{ / }-->
                                <!--{ ? goodsView['effectiveEndYmd'] != '0000-00-00 00:00:00' && goodsView['effectiveEndYmd'] }-->
                                ~ {=gd_date_format(__('Y년 m월 d일'), goodsView['effectiveEndYmd'])}
                                <!--{ / }-->
                            </dd>
                        </dl>
                        <!--{ / }-->
                        <!--{ : 'salesStartYmd' }-->
                        <!--{ ? (goodsView['salesStartYmd'] != '0000-00-00 00:00:00' && goodsView['salesStartYmd']) || (goodsView['salesEndYmd'] != '0000-00-00 00:00:00' && goodsView['salesEndYmd']) }-->
                        <dl>
                            <dt>{=__(displayDefaultField[.value_])}</dt>
                            <dd>
                                <!--{ ? goodsView['salesStartYmd'] != '0000-00-00 00:00:00' && goodsView['salesStartYmd'] }-->
                                {=gd_date_format(__('Y년 m월 d일'), goodsView['salesStartYmd'])}
                                <!--{ / }-->
                                <!--{ ? goodsView['salesEndYmd'] != '0000-00-00 00:00:00' && goodsView['salesEndYmd'] }-->
                                ~ {=gd_date_format(__('Y년 m월 d일'), goodsView['salesEndYmd'])}
                                <!--{ / }-->
                            </dd>
                        </dl>
                        <!--{ / }-->
                        <!--{ : 'salesUnit' }-->
                        <!--{ ? gd_isset(goodsView['salesUnit']) > 1 }-->
                        <dl>
                            <dt>{=__(displayDefaultField[.value_])}</dt>
                            <dd>{=__('%s개', number_format(goodsView['salesUnit']))}</dd>
                        </dl>
                        <!--{ / }-->
                        <!--{ : 'totalStock' }-->
                        <!--{ ? goodsView['stockFl'] == 'y' }-->
                      
                        <!--{ / }-->
                        <!--{ : }-->
                        <!--{ ? gd_isset(goodsView[.value_]) }-->
                        <dl>
                            <dt>{=__(displayDefaultField[.value_])}</dt>
                            <dd>{=goodsView[.value_]}</dd>
                        </dl>
                        <!--{ / }-->
                        <!--{ / }-->
                        <!--{ / }-->
                        <!--{ ? naverPay }-->
                        <dl id="naver-mileage-accum" style="display: none;">
                            <dt>{=__('네이버')}&nbsp;&nbsp;<br/>{=__('마일리지')}</dt>
                            <dd><span id="naver-mileage-accum-rate"></span> {=__('적립')}</dd>
                        </dl>
                        <!--{ / }-->
                        {=myappGoodsBenefitMessage}
                        <!--{ ? goodsView['optionFl'] == 'y' || goodsView['optionTextFl'] == 'y' || goodsView['addGoods'] }-->
                        <div class="item_add_option_box">
                            <!--{ ? goodsView['optionFl'] == 'y' }-->
                            <!--{ ? goodsView['optionDisplayFl'] == 's' }-->
                            <dl>
                                <dt><!--{ ? goodsView['optionEachCntFl'] == 'one' && empty(goodsView['optionName']) === false }-->{=goodsView['optionName']}<!--{ : }-->{=__('옵션 선택')}<!--{ / }--></dt>
                                <dd>
                                    <select name="optionSnoInput" class="chosen-select" <!--{ ?goodsView['orderPossible'] == 'y' }-->onchange="<!--{ ?goodsView['optionImagePreviewFl'] == 'y' }-->gd_option_image_apply();<!--{ / }-->goodsViewController.option_price_display(this);"<!--{ : }-->disabled="disabled"<!--{ / }-->>
                                    <option value="">
                                        =
                                        <!--{ ? goodsView['optionEachCntFl'] == 'many' && empty(goodsView['optionName']) === false }-->{=goodsView['optionName']}
                                        <!--{ : }-->{=__('옵션')}
                                        <!--{ / }--> : {=__('가격')}
                                        <!--{ ? in_array('optionStock',displayAddField) }-->: {=__('재고')}<!--{ / }-->
                                        =
                                    </option>
                                    <!--{ @ goodsView['option'] }-->
                                    <!--{ ? .optionViewFl =='y' }-->
                                    <option <!--{ ? goodsView['optionIcon']['goodsImage'] }--><!--{ ? .optionImage }-->data-img-src="{=.optionImage}"  <!--{ : }-->data-img-src="blank"<!--{ / }--> <!--{ / }--> value="{=.sno}{=c.INT_DIVISION}{=gd_global_money_format(.optionPrice,false)}{=c.INT_DIVISION}{=.mileage}{=c.INT_DIVISION}{=.stockCnt}{=c.STR_DIVISION}{.optionValue}<!--{ ? (goodsView['stockFl'] == 'y' && .optionSellFl == 't') }-->{=c.STR_DIVISION}<!--{=optionSoldOutCode[.optionSellCode]}--><!--{ / }--><!--{ ? .optionDeliveryFl == 't' && optionDeliveryDelayCode[.optionDeliveryCode] != '' }-->{=c.STR_DIVISION}<!--{=optionDeliveryDelayCode[.optionDeliveryCode]}--><!--{ / }-->"<!--{ ? (goodsView['stockFl'] == 'y' && goodsView['stockCnt'] <  goodsView['minOrderCnt']) || (goodsView['stockFl'] == 'y' && goodsView['fixedOrderCnt'] == 'option' && .stockCnt < goodsView['minOrderCnt']) || (goodsView['stockFl'] == 'y' && .stockCnt == '0') || .optionSellFl =='n' || .optionSellFl =='t' }-->disabled="disabled"
                                    <!--{ / }-->alt="{=.optionValue}"> {=.optionValue}
                                    <!--{ ? gd_isset(.optionPrice) != '0' }--> : {=gd_global_currency_symbol()}<!--{ ? gd_isset(.optionPrice) > 0 }-->+<!--{ / }-->{=gd_global_money_format(.optionPrice)}{=gd_global_currency_string()}<!--{ / }-->
                                    <!--{ ? (.optionSellFl == 't') }-->[<!--{=optionSoldOutCode[.optionSellCode]}-->]
                                    <!--{ : (goodsView['stockFl'] == 'y' && .stockCnt == '0') || .optionSellFl ==  'n' }-->[<!--{=optionSoldOutCode['n']}-->]
                                    <!--{ : }-->
                                    <!--{ ? in_array('optionStock',displayAddField) && goodsView['stockFl'] == 'y' }--> : {=number_format(.stockCnt)}{=__('개')}
                                    <!--{ / }-->
                                    <!--{ / }-->
                                    <!--{ ? .optionDeliveryFl == 't' && optionDeliveryDelayCode[.optionDeliveryCode] != '' }-->[<!--{=optionDeliveryDelayCode[.optionDeliveryCode]}-->]
                                    <!--{ / }-->
                                    </option>
                                    <!--{ / }-->
                                    <!--{ / }-->
                                    </select>
                                </dd>
                            </dl>
                            <!--{ : goodsView['optionDisplayFl'] == 'd' }-->
                            <!--{ @ goodsView['optionName'] }-->
                            <!--{ ? .index_ == 0 }-->
                            <input type="hidden" name="optionSnoInput" value="" />
                            <input type="hidden" name="optionCntInput" value="{=.size_}" />
                            <!--{ / }-->
                            <dl >
                                <dt>{=.value_}</dt>
                                <dd id='test_{=.index_}'>
                                    
                                    <!--{ ? .index_ == 0 }-->
                                    
                                    <!--{ @ goodsView['optionDivision'] }-->
                                    
                                    <input type='radio' id="optionNo_{=.index_}_{=..index_}" class="test" name="optionNo_{=.index_}" value="{=..value_}" <!--{ ? (goodsView['stockFl'] == 'y' && goodsView['stockCnt'] < goodsView['minOrderCnt']) || (goodsView['stockFl'] == 'y' && goodsView['fixedOrderCnt'] == 'option' && isset(goodsView['optionDivisionStock']) && goodsView['optionDivisionStock'][..key_]['stockCnt'] < goodsView['minOrderCnt']) || (goodsView['stockFl'] == 'y' && goodsView['optionDivisionStock'][..key_]['stockCnt'] == '0') || goodsView['optionDivisionStock'][..key_]['optionSellFl'] ==  'n' || goodsView['optionDivisionStock'][..key_]['optionSellFl'] ==  't' }--> disabled="disabled"<!--{ / }--> >    
                                    <label class="test2 radio_custom" for="optionNo_{=.index_}_{=..index_}">{=..value_}</label>
                                    <!--{ / }-->
                                    <!--{ / }-->
                                    
                                </dd>
                            </dl>
                            <div id="iconImage_{=.index_}" class="option_icon"></div>
                            <!--{ / }-->
                            <!--{ / }-->
                            <!--{ / }-->
                            <section class="gridTem">
                                <button type='button' class="cart_finish_button" id='custom_option_select' onclick="handleClick()">Decision</button>
                            </section>
                      
                            <!--{ ? goodsView['addGoods'] }-->
                            <!--{ @ goodsView['addGoods'] }-->
                            <dl>
                                <dt>
                                    {=.title}<!--{ ? .mustFl =='y' }--><strong> ({=__('필수')})</strong><input type="hidden" name="addGoodsInputMustFl[]" value="{.key_}"/><!--{ / }-->
                                </dt>
                                <dd>
                                    <select name="addGoodsInput{.key_}" class="chosen-select" onchange="goodsViewController.add_goods_select(this)" data-key="{.key_}"<!--{ ? goodsView['orderPossible'] != 'y' }--> disabled="disabled"<!--{ / }-->>
                                    <option value="">{=__('추가상품')}</option>
                                    <!--{ @ .addGoodsList }-->
                                    <option
                                    <!--{ ? .addGoodsImageFl=='y' }-->
                                    <!--{ ? ..imageSrc }-->
                                    data-img-src="{..imageSrc}"
                                    <!--{ : }-->
                                    data-img-src="blank"
                                    <!--{ / }-->
                                    <!--{ / }-->value="{=..addGoodsNo}{=c.INT_DIVISION}{=..goodsPrice}{=c.STR_DIVISION}{=..goodsNm}
                                    <!--{ ? ..optionNm }-->({=..optionNm})<!--{ / }-->
                                    {=c.STR_DIVISION}{=rawurlencode(gd_html_add_goods_image(..addGoodsNo, ..imageNm, ..imagePath, ..imageStorage, 30, ..goodsNm, '_blank'))}{=c.STR_DIVISION}{=.key_}{=c.STR_DIVISION}{=..stockUseFl}{=c.STR_DIVISION}{=..stockCnt}"
                                    <!--{ ? ..soldOutFl =='y' || (..stockUseFl =='1' && ..stockCnt == '0')  }-->
                                    disabled="disabled"
                                    <!--{ / }--> alt="{=..goodsNm}{=..optionNm}">{=..goodsNm}
                                    <!--{ ? ..optionNm || gd_isset(..goodsPrice) != '0' || (..soldOutFl =='y' || (..stockUseFl =='1' && ..stockCnt == '0')) }-->
                                    (
                                    <!--{ ? ..optionNm }-->
                                    {=..optionNm}
                                    <!--{ ? gd_isset(..goodsPrice) != '0' || (..soldOutFl =='y' || (..stockUseFl =='1' && ..stockCnt == '0')) }-->
                                    /
                                    <!--{ ? gd_isset(..goodsPrice) != '0'  }-->
                                    {=gd_global_currency_symbol()}
                                    <!--{ ? gd_isset(..goodsPrice) > 0   }-->+<!--{ / }-->{=gd_global_money_format(..goodsPrice)}{=gd_global_currency_string()}
                                    <!--{ ? ..soldOutFl =='y' || (..stockUseFl =='1' && ..stockCnt == '0') }--> / {=__('품절')}<!--{ / }-->
                                    <!--{ : }-->
                                    {=__('품절')}
                                    <!--{ / }-->
                                    <!--{ / }-->
                                    <!--{ : gd_isset(..goodsPrice) != '0' || (..soldOutFl =='y' || (..stockUseFl =='1' && ..stockCnt == '0')) }-->
                                    <!--{ ? gd_isset(..goodsPrice) != '0' }-->
                                    {=gd_global_currency_symbol()}
                                    <!--{ ? gd_isset(..goodsPrice) > 0 }-->+<!--{ / }-->{=gd_global_money_format(..goodsPrice)}{=gd_global_currency_string()}
                                    <!--{ ? ..soldOutFl =='y' || (..stockUseFl =='1' && ..stockCnt == '0') }--> / {=__('품절')}<!--{ / }-->
                                    <!--{ : }-->
                                    {=__('품절')}
                                    <!--{ / }-->
                                    <!--{ : }-->
                                    {=__('품절')}
                                    <!--{ / }-->
                                    )
                                    <!--{ / }--></option>

                                    <!--{ / }-->
                                    </select>
                                </dd>
                            </dl>
                            <!--{ / }-->
                            <!--{ / }-->
                        </div>
                        <!-- //item_add_option_box -->
                        <!--{ / }-->
                    </div>

                    <!-- //item_detail_list -->
                    <!--{ ?goodsView['orderPossible'] == 'n' }-->
                    <div class="order_goods"></div>
                    <div class="btn_choice_box btn_restock_box">
                        <!--{ ?goodsView['restockUsableFl'] === 'y' && !gGlobal.isFront }-->
                        <button type="button" class="btn_restock_notice_v2 restockSelector">{=__('재입고알림')}</button>
                        <!--{ / }-->
                        <button type="button" class="btn_add_soldout" disabled="disabled">{=__('구매 불가')}</button>
                    </div>
                    <!--{ : }-->
                    <!--{ ? goodsView['optionFl'] == 'y' }-->
                    <div class="option_total_display_area item_choice_list">
                        <table class="option_display_area" border="0" cellpadding="0" cellspacing="0">
                            <colgroup>
                                <col width="330px">
                                <col>
                                <col width="80px">
                                <col width="40px">
                            </colgroup>
                        </table>

                        <!--{ ? goodsView['optionTextFl'] == 'y' }-->
                            <!--{ @ goodsView['optionText'] }-->
                            <dl  id='tttt' class="invisible">
                                <!--{ ? .index_ == 0 }-->
                                <input type="hidden" id="optionTextCnt" value="{=.size_}" />
                                <!--{ / }-->
                                <dt>
                                    <input type="hidden" name="optionTextMust_{=.index_}" value="{=.mustFl}" />
                                    <input type="hidden" name="optionTextLimit_{=.index_}" value="{=.inputLimit}" />
                                    <span class="optionTextNm_{=.index_}">{=.optionName}<!--{ ? .mustFl == 'y' }--><strong> ({=__('필수')})</strong><!--{ / }--></span>
                                </dt>
                                <dd>
                                    <input type="hidden" name="optionTextSno_{=.index_}" value="{=.sno}"/>
                                    <input type="text" name="optionTextInput_{=.index_}" value="" size="30" placeholder="Standard" class="text" onkeydown="goodsViewController.enterKey(this)" onkeyup="goodsViewController.max_length_alert(this)" maxlength="50"<!--{ ? goodsView['orderPossible'] != 'y' }--> disabled="disabled"<!--{ / }-->/>
                                    <input type="hidden" value="{=.addPrice}"/>
                                    <!--{ ? .addPrice != 0 }-->
                                    <strong>※ {=__('작성시 %s%s%s 추가', gd_global_currency_symbol(), gd_global_money_format(.addPrice), gd_global_currency_string())}</strong>
                                    <!--{ / }-->
                                </dd>
                                <section class="gridTem" style="position:relative; top:10px; margin-bottom: 10px;">
                        		<button type='button' class="cart_finish_button" id='custom_option_select' onclick="goodsViewController.option_text_select(this)">Decision Size</button>
							</section>
                            </dl>
						
                            <!--{ / }-->
                            <!--{ / }-->


                        <div class="item_price_cont">
                            
                            <div class="end_price item_tatal_box" style="display:none">
                                <dl class="total_goods">
                                    <dt>{=__('총 상품금액')}</dt>
                                    <dd><strong class="goods_total_price"></strong></dd>
                                </dl>
                                <dl class="total_discount">
                                    <dt>{=__('총 할인금액')}</dt>
                                    <dd><strong class="total_benefit_price"></strong></dd>
                                </dl>
                                <dl class="total_amount">
                                    <dt>{=__('총 합계금액')}</dt>
                                    <dd><strong class="total_price"></strong></dd>
                                </dl>
                            </div>
                            <!-- //item_tatal_box -->
                        </div>
                        <!-- //item_price_cont -->
                    </div>
                    
                 
                    <!--{ : }-->
                    <div class="item_choice_list">
                        <table class="option_display_area" border="0" cellpadding="0" cellspacing="0">
                            <colgroup>
                                <col width="330px" />
                                <col />
                                <col width="80px" />
                                <col width="40px" />
                            </colgroup>
                            <tbody id="option_display_item_0">
                            <tr class="check optionKey_0">
                                <td class="cart_prdt_name">
                                    <input type="hidden" name="goodsNo[]" value="{=goodsView['goodsNo']}" />
                                    <input type="hidden" name="optionSno[]" value="{=gd_isset(goodsView['option'][0]['sno'])}" />
                                    <input type="hidden" name="goodsPriceSum[]" value="0" />
                                    <input type="hidden" name="addGoodsPriceSum[]" value="0" />
                                    <!--{ ? couponUse == 'y' }-->
                                    <input type="hidden" name="couponApplyNo[]" value="" />
                                    <input type="hidden" name="couponSalePriceSum[]" value="" />
                                    <input type="hidden" name="couponAddPriceSum[]" value="" />
                                    <!--{ / }-->
                                    <div class="cart_tit_box">
                                        <strong class="cart_tit">
                                            <span>{=gd_isset(goodsView['goodsNmDetail'])}</span>
                                            <!--{ ? couponUse == 'y' && couponConfig['chooseCouponMemberUseType'] != 'member'}-->
                                            <span class="cart_btn_box">
                                                    <!--{ ? gd_is_login() === false }-->
                                                    <button type="button" class="btn_alert_login"><img src="../img/common/btn/btn_coupon_apply.png" alt="{=__('쿠폰적용')}"/></button>
                                                <!--{ : }-->
                                                    <a href="#lyCouponApply" id="coupon_apply_0" class="btn_open_layer" data-key="0">
                                                        <img src="../img/common/btn/btn_coupon_apply.png" alt="{=__('쿠폰적용')}"/>
                                                    </a>
                                                <!--{ / }-->
                                                </span>
                                            <!--{ / }-->
                                            <span id="option_text_display_0"></span></span>
                                        </strong>
                                    </div>
                                    <!-- //cart_tit_box -->
                                </td>
                                <!-- //cart_prdt_name -->
                                <td>
                                        <span class="count">
                                            <span class="goods_qty">
                                                <input type="text" name="goodsCnt[]" class="text goodsCnt_0" title="{=__('수량')}" value="{=gd_isset(goodsView['defaultGoodsCnt'])}" data-key="0" data-value="{=gd_isset(goodsView['defaultGoodsCnt'])}" data-stock="{=goodsView['totalStock']}" onchange="goodsViewController.input_count_change(this, '1');return false;" />
                                                <span>
                                                    <button type="button" class="up goods_cnt" title="{=__('증가')}"  value="up{=c.STR_DIVISION}0">{=__('증가')}</button>
                                                    <button type="button" class="down goods_cnt" title="{=__('감소')}" value="dn{=c.STR_DIVISION}0">{=__('감소')}</button>
                                                </span>
                                            </span>
                                        </span>
                                    <!-- //count -->
                                </td>
                                <td class="item_choice_price">
                                    <input type="hidden" name="optionPriceSum[]"value="{=gd_isset(goodsView['option'][0]['optionPrice'], 0)}" />
                                    <input type="hidden" name="option_price_0" value="{=gd_isset(goodsView['option'][0]['optionPrice'], 0)}" />
                                    {=gd_global_currency_symbol()}<strong class="option_price_display_0">{=gd_global_money_format(gd_isset(goodsView['option'][0]['optionPrice'],0),false)}</strong>{=gd_global_currency_string()}
                                </td>
                                <!-- //item_choice_price -->
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="item_price_cont">
                            <div class="end_price item_tatal_box">
                                <dl class="total_goods">
                                    <dt>{=__('총 상품금액')}</dt>
                                    <dd><strong class="goods_total_price"></strong></dd>
                                </dl>
                                <dl class="total_discount">
                                    <dt>{=__('총 할인금액')}</dt>
                                    <dd><strong class="total_benefit_price"></strong></dd>
                                </dl>
                                <dl class="total_amount">
                                    <dt>{=__('총 합계금액')}</dt>
                                    <dd><strong class="total_price"></strong></dd>
                                </dl>
                            </div>
                            <!-- //item_tatal_box -->
                        </div>
                        <!-- //item_price_cont -->
                    </div>
                    <!-- //item_choice_list -->
                    <!--{ / }-->
                    <div class="btn_choice_box">
                        <!--{ ?goodsView['restockUsableFl'] === 'y' && !gGlobal.isFront }-->
                        <button type="button" class="btn_restock_notice_v1 restockSelector">{=__('재입고알림')}</button>
                        <!--{ / }-->
                        <div <!--{ ?goodsView['restockUsableFl'] === 'y' && !gGlobal.isFront }-->class="restock"<!--{ / }-->><!-- N:재입고 알림이 있을 때는 restock 클래스를 div에 같이 넣어주세요 -->
                        <button id="cartBtn" type="button" class="btn_add_cart">{=__('장바구니')}</button>
                        <button id="wishBtn" type="button" class="btn_add_wish">{=__('찜하기')}</button>
                        <button type="button" class="btn_add_order">{=__('바로 구매')}</button>
                    </div>
                </div>
                <!-- //btn_choice_box -->
                <div class="pay_box">
                    <div class="payco_pay">
                        {payco}
                    </div>
                    <div class="naver_pay">
                        {naverPay}
                    </div>
                </div>
                <!-- //pay_box -->
                <!--{ / }-->
            </div>
            <!-- //item_tit_detail_cont -->
    </div>
    <!-- //item_info_box -->
    </form>
</div>
<!-- //item_photo_info_sec -->
<!-- //상품 상단 끝 -->
<!-- 상품상세 -->
<div class="item_goods_sec">
    <!--{ ? relation.relationFl != 'n' }-->
            <div class="detail_explain_box" >
                <h3>{=__('관련 상품')}</h3>
                <div class="goods_list">
                    <div class="goods_list_cont">
                        <!--{ ? widgetGoodsList }-->
                        <!-- 추천상품 -->
                        {=includeWidget('goods/_goods_display.html')}
                        <!-- 추천상품 -->
                        <!--{ / }-->
                    </div>
                </div>
            </div>
            <!--{ / }-->
    <div id="detail">
        <div class="item_goods_tab">
            <ul>
                <li class="on"><a href="#detail">{=__('상품상세정보')}</a></li>
                <li><a href="#delivery">{=__('배송안내')}</a></li>
                <li><a href="#exchange">{=__('교환 및 반품안내')}</a></li>
                <li><a href="#qna">{=__('상품문의')} <strong>({goodsQaCount})</strong></a></li>
            </ul>
        </div>
        <!-- //item_goods_tab -->
        <div class="detail_cont">
            <h3>{=__('상품상세정보')}</h3>
            <div class="detail_explain_box">
                <div class="image-manual"><!-- 이미지 --></div>
                <div class="txt-manual">
                    <!-- 상품상세 공통정보 관리를 상세정보 상단에 노출-->
                    
                    <pre style="font-size: 11pt; font-family: arial; color: rgb(0, 0, 0);">{=gd_isset(goodsView['commonContent'])}{=gd_isset(goodsView['goodsDescription'])}</pre>
                    
                </div>
                <!--{ ? goodsView['externalVideoFl'] =='y'  && goodsView['externalVideoUrl'] }-->
                <div style="padding:10px 0;text-align:center" id="external-video">
                    {=gd_youtube_player(goodsView['externalVideoUrl'], goodsView['externalVideoWidth'], goodsView['externalVideoHeight'])}
                </div>
                <!--{ / }-->
            </div>
            <!-- //detail_explain_box -->
            <!--{ ? goodsView['goodsMustInfo'] }-->
            <h3>{=__('상품필수 정보')}</h3>
            <div class="detail_info_box">
                <div class="datail_table">
                    <table class="left_table_type">
                        <colgroup>
                            <col />
                            <col />
                        </colgroup>
                        <tbody>
                        <!--{ @ goodsView['goodsMustInfo'] }-->
                        <tr>
                            <!--{ @ .value_ }-->
                            <th style="width:20%">{..value_['infoTitle']}</th>
                            <td <!--{ ? (count(.value_) == 1) }-->colspan="3" style="width:80%"<!--{ : }-->style="width:30%"<!--{ / }-->>{..value_['infoValue']}</td>
                            <!--{ / }-->
                        </tr>
                        <!--{ / }-->
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- //detail_info_box -->
            <!--{ / }-->
        
        </div>
        <!-- //detail_cont -->
    </div>
    <!-- //#detail -->
    <div id="delivery">
        <div class="item_goods_tab">
            <ul>
                <li><a href="#detail">{=__('상품상세정보')}</a></li>
                <li class="on"><a href="#delivery">{=__('배송안내')}</a></li>
                <li><a href="#exchange">{=__('교환 및 반품안내')}</a></li>
                <li><a href="#qna">{=__('상품문의')} <strong>({goodsQaCount})</strong></a></li>
            </ul>
        </div>
        <!-- //item_goods_tab -->
        <!--{ ? infoDelivery }-->
        <div class="delivery_cont">
            <h3>{=__('배송안내')}</h3>
            <div class="admin_msg">{infoDelivery}</div>
        </div>
        <!-- //delivery_cont -->
        <!--{ / }-->
    </div>
    <!-- //#delivery -->
    <div id="exchange">
        <div class="item_goods_tab">
            <ul>
                <li><a href="#detail">{=__('상품상세정보')}</a></li>
                <li><a href="#delivery">{=__('배송안내')}</a></li>
                <li class="on"><a href="#exchange">{=__('교환 및 반품안내')}</a></li>
                <li><a href="#qna">{=__('상품문의')} <strong>({goodsQaCount})</strong></a></li>
            </ul>
        </div>
        <!-- //item_goods_tab -->
        <div class="exchange_cont">
            <!--{ ? infoExchange }-->
            <h3>{=__('교환 및 반품안내')}</h3>
            <div class="admin_msg">
                {infoExchange}
            </div>
            <!--{ / }-->
            <!--{ ? infoRefund }-->
            <h3>{=__('환불안내')}</h3>
            <div class="admin_msg">
                {infoRefund}
            </div>
            <!--{ / }-->
            <!--{ ? infoAS }-->
            <h3>{=__('AS안내')}</h3>
            <div class="admin_msg">
                {infoAS}
            </div>
            <!--{ / }-->
        </div>
        <!-- //exchange_cont -->
    </div>
    <!-- //#exchange -->
    <div id="reviews">
        <div class="item_goods_tab">
            <ul>
                <li><a href="#detail">{=__('상품상세정보')}</a></li>
                <li><a href="#delivery">{=__('배송안내')}</a></li>
                <li><a href="#exchange">{=__('교환 및 반품안내')}</a></li>
                <li><a href="#qna">{=__('상품문의')} <strong>({goodsQaCount})</strong></a></li>
            </ul>
        </div>
        <!-- //item_goods_tab -->

        <!--{ ? plusReviewConfig.isShowGoodsPage == 'y' }-->
        <div class="plus_reivew">
            {=includeFile(includePlusReviewFile)}
        </div>
        <!--{ / }-->

        <!--{ ? goodsReviewAuthList == 'y' }-->
        <div class="reviews_cont">
            <h3>{=__('상품후기')}</h3>
            <div id="ajax-goods-{bdGoodsReviewId}-list"></div>
            <div class="btn_reviews_box">
                <a href="../board/list.php?bdId={bdGoodsReviewId}" class="btn_reviews_more">{=__('상품후기 전체보기')}</a>
                <a href="javascript:gd_open_write_popup('{bdGoodsReviewId}', '{goodsView.goodsNo}')" class="btn_reviews_write">{=__('상품후기 글쓰기')}</a>
            </div>
            <!-- //btn_reviews_box -->
        </div>
        <!-- //reviews_cont -->
        <!--{/}-->
    </div>
    <!-- //#reviews -->
    <div id="qna">
        <div class="item_goods_tab">
            <ul>
                <li><a href="#detail">{=__('상품상세정보')}</a></li>
                <li><a href="#delivery">{=__('배송안내')}</a></li>
                <li><a href="#exchange">{=__('교환 및 반품안내')}</a></li>
                <li class="on"><a href="#qna">{=__('상품문의')} <strong>({goodsQaCount})</strong></a></li>
            </ul>
        </div>
        <!-- //item_goods_tab -->
        <div class="qna_cont">
            <h3>{=__('상품Q%sA', '&amp;')}</h3>
            <div id="ajax-goods-{bdGoodsQaId}-list"></div>
            <div class="btn_qna_box">
                <a href="../board/list.php?bdId={bdGoodsQaId}" class="btn_qna_more">{=__('상품문의 전체보기')}</a>
                <a href="javascript:gd_open_write_popup('{bdGoodsQaId}', '{goodsView.goodsNo}')" class="btn_qna_write">{=__('상품문의 글쓰기')}</a>
            </div>
            <!-- //btn_qna_box -->
        </div>
        <!-- //qna_cont -->
    </div>
    <!-- //qna -->
</div>
<!-- //item_goods_sec -->
<!-- //상품상세 끝 -->
</div>

<div id="lyZoom" class="layer_wrap zoom_layer dn">
    <div class="layer_wrap_cont">
        <div class="ly_tit">
            <h4>{=__('이미지 확대보기')}<span>{=goodsView['goodsNm']}</span></h4>
        </div>
        <div class="ly_cont">
            <div class="item_photo_view_box">
                <div class="item_photo_view">
                    <div class="item_photo_big" id="magnifyImage">
                        <span class="img_photo_big">{=goodsView['image']['magnify']['img'][0]}</span>
                    </div>
                    <!-- //item_photo_big -->
                    <div class="item_photo_slide">
                        <button type="button" class="slick_goods_prev"><img src="../img/common/btn/btn_vertical_prev.png" alt="{=__('이전 상품 이미지')}"/></button>
                        <ul class="slider_wrap ly_slider_goods_nav">
                            <!--{ @ gd_isset(goodsView['image']['magnify']['thumb']) }-->
                            <li><a href="javascript:gd_change_image('{=.key_}','magnify');">{=.value_}</a></li>
                            <!--{ / }-->
                        </ul>
                        <button type="button" class="slick_goods_next"><img src="../img/common/btn/btn_vertical_next.png" alt="{=__('다음 상품 이미지')}"/></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- //ly_cont -->
        <a href="#close" class="ly_close layer_close"><img src="../img/common/layer/btn_layer_close.png" alt="{=__('닫기')}"></a>
    </div>
    <!-- //layer_wrap_cont -->
</div>
<!-- // zoom_layer -->

<div id="lyPassword" class="layer_wrap password_layer js_password_layer dn" style="height: 226px">
    <div class="layer_wrap_cont">
        <div class="ly_tit">
            <h4>{=__('비밀번호 인증')}</h4>
        </div>
        <div class="ly_cont">
            <div class="scroll_box">
                <p>{=__('글 작성시 설정한 비밀번호를 입력해 주세요.')}</p>
                <input type="password" name="writerPw" class="text" autocomplete="off"/>
            </div>
            <!-- // -->
            <div class="btn_center_box">
                <button type="button" class="btn_ly_password js_submit"><strong>{=__('확인')}</strong></button>
            </div>
        </div>
        <!-- //ly_cont -->
        <a href="#close" class="ly_close layer_close"><img src="../img/common/layer/btn_layer_close.png" alt="{=__('닫기')}"></a>
    </div>
    <!-- //layer_wrap_cont -->
</div>
<!-- //password_layer -->

<div id="addCartLayer" class="layer_wrap dn">
    <div class="box add_cart_layer" style="position: absolute; margin: 0px; top: 279.5px; left: 651px;">
        <div class="view">
            <h2>{=__('장바구니 담기')}</h2>
            <div class="scroll_box">
                <p class="success"><strong>{=__('상품이 장바구니에 담겼습니다.')}</strong><br>{=__('바로 확인하시겠습니까?')}</p>
            </div>
            <div class="btn_box">
                <button type="button" class="btn_cancel"><span>{=__('취소')}</span></button>
                <button type="button" class="btn_confirm btn_move_cart"><span>{=__('확인')}</span></button>
            </div>
            <!-- //btn_box -->
            <button title="{=__('닫기')}" class="close layer_close" type="button">{=__('닫기')}</button>
        </div>
    </div>
</div>
<!--//addCartLayer -->
<div id="addWishLayer" class="layer_wrap dn">
    <div class="box add_wish_layer" style="position: absolute; margin: 0px; top: 279.5px; left: 651px;">
        <div class="view">
            <h2>{=__('찜 리스트 담기')}</h2>
            <div class="scroll_box">
                <p class="success"><strong>{=__('상품이 찜 리스트에 담겼습니다.')}</strong><br>{=__('바로 확인하시겠습니까?')}</p>
            </div>
            <div class="btn_box">
                <button type="button" class="btn_cancel"><span>{=__('취소')}</span></button>
                <button type="button" class="btn_confirm btn_move_wish"><span>{=__('확인')}</span></button>
            </div>
            <!-- //btn_box -->
            <button title="{=__('닫기')}" class="close layer_close" type="button">{=__('닫기')}</button>
        </div>
    </div>
</div>
<!--//addWishLayer -->
<!--{ ? couponUse == 'y' }-->
<!-- 쿠폰 다운받기 레이어 -->
<div id="lyCouponDown" class="layer_wrap coupon_down_layer dn" style="top:0px; left:0px;"></div>
<!--//쿠폰 다운받기 레이어 -->
<!-- 쿠폰 적용하기 레이어 -->
<div id="lyCouponApply" class="layer_wrap coupon_apply_layer dn" style="top:0px; left:0px;"></div>
<!--//쿠폰 적용하기 레이어 -->
<!--{ / }-->
<!--//일반게시판 레이어 --><div id="lyWritePop" class="layer_wrap board_write_layer dn"></div>
<!--//플러스리뷰 레이어 --><div id="writePop" class="layer_wrap plus_review_edit_layer dn"></div>

<script type="text/javascript" src="\{=c.PATH_SKIN}js/gd_board_goods.js" charset="utf-8"></script>

{=fbGoodsViewScript}
{ # footer }