{*** 장바구니 | order/cart.php ***} { # header }

<div class="content_box">
  <div class="order_wrap">
    <div class="order_tit">
      <h2>{=__('장바구니')}</h2>
      <ol>
        <li class="page_on">
          <span>01</span> {=__('장바구니')}
          <span><img src="../img/member/icon_join_step_on.png" alt="{=__('장바구니')}{=__('진행 중')}" /></span>
        </li>
        <li>
          <span>02</span> {=__('주문서작성/결제')}<span
            ><img src="../img/member/icon_join_step_off.png" alt="{=__('주문서작성/결제')}{=__('대기')}"
          /></span>
        </li>
        <li><span>03</span> {=__('주문완료')}</li>
      </ol>
    </div>
    <!-- //order_tit -->

    <div class="cart_cont">
      <form id="frmCart" name="frmCart" method="post" target="ifrmProcess">
        <input type="hidden" name="mode" value="" />
        <input type="hidden" name="cart[cartSno]" value="" />
        <input type="hidden" name="cart[goodsNo]" value="" />
        <input type="hidden" name="cart[goodsCnt]" value="" />
        <input type="hidden" name="cart[addGoodsNo]" value="" />
        <input type="hidden" name="cart[addGoodsCnt]" value="" />
        <!--{ ? couponUse == 'y' }-->
        <input type="hidden" name="cart[couponApplyNo]" value="" />
        <!--{ / }-->
        <input type="hidden" name="useBundleGoods" value="1" />
        <input type="hidden" name="ac_id" value="" />
        <!-- 장바구니 상품리스트 시작 -->

        <!--{ @ cartInfo }-->
        <div class="cart_cont_list">
          <div class="order_cart_tit">
            <!--{ ? cartScmCnt > 1 && !gGlobal.isFront }-->
            <h3>{=cartScmInfo[.key_]['companyNm']} {=__('배송상품')}</h3>
            <!--{ / }-->
          </div>
          <!-- //order_cart_tit -->

          <div class="order_table_type">
            <table>
              <colgroup>
                <col style="width: 3%" />
                <!-- 체크박스 -->
                <col />
                <!-- 상품명/옵션 -->
                <col style="width: 5%" />
                <!-- 수량 -->
                <col style="width: 10%" />
                <!-- 상품금액 -->
                <col style="width: 13%" />
                <!-- 할인/적립 -->
                <col style="width: 10%" />
                <!-- 합계금액 -->
                <!--{ ? !gGlobal.isFront }-->
                <col style="width: 10%" />
                <!-- 배송비 -->
                <!--{ / }-->
              </colgroup>
              <thead>
                <tr>
                  <th>
                    <div class="form_element">
                      <input
                        type="checkbox"
                        id="allCheck{.key_}"
                        class="gd_select_all_goods"
                        data-target-id="cartSno{.key_}_"
                        data-target-form="#frmCart"
                        checked="checked"
                      />
                      <label for="allCheck{.key_}" class="check_s on"></label>
                    </div>
                  </th>
                  <th>{=__('상품')}/{=__('옵션 정보')}</th>
                  <th>{=__('수량')}</th>
                  <th>{=__('상품금액')}</th>
                  <th>{=__('할인')}<!--{ ? !gGlobal.isFront }-->/{=__('적립')}<!--{ / }--></th>
                  <th>{=__('합계금액')}</th>
                  <!--{ ? !gGlobal.isFront }-->
                  <th>{=__('배송비')}</th>
                  <!--{ / }-->
                </tr>
              </thead>
              <tbody>
                <!--{ @ .value_ }-->
                <!--{ @ ..value_ }-->
                <tr>
                  <td class="td_chk">
                    <div class="form_element">
                      <input
                        type="checkbox"
                        id="cartSno{.key_}_{=...sno}"
                        name="cartSno[]"
                        value="{=...sno}"
                        checked="checked"
                        data-price="{=...price['goodsPriceSubtotal']}"
                        data-mileage="{=(...mileage.goodsMileage + ...mileage.memberMileage)}"
                        data-goodsdc="{=...price.goodsDcPrice}"
                        data-memberdc="{=(...price.memberDcPrice + ...price.memberOverlapDcPrice)}"
                        data-coupondc="{...price.couponGoodsDcPrice}"
                        data-possible="{=...orderPossible}"
                        data-goods-key="{=...goodsKey}"
                        data-goods-no="{=...goodsNo}"
                        data-goods-nm="{=gd_remove_only_tag(...goodsNm)}"
                        data-option-nm="{=...optionNm}"
                        data-fixed-sales="{=...fixedSales}"
                        data-sales-unit="{=...salesUnit}"
                        data-fixed-order-cnt="{=...fixedOrderCnt}"
                        data-min-order-cnt="{=...minOrderCnt}"
                        data-max-order-cnt="{=...maxOrderCnt}"
                        data-default-goods-cnt="{=...goodsCnt}"
                      />
                      <label for="cartSno{.key_}_{=...sno}" class="check_s on"></label>
                    </div>
                  </td>
                  <td class="td_left">
                    <div class="pick_add_cont">
                      <span class="pick_add_img">
                        <a href="../goods/goods_view.php?goodsNo={=...goodsNo}">{=...goodsImage}</a>
                      </span>
                      <div class="pick_add_info">
                        <!--{ ? ...orderPossibleMessageList }-->
                        <strong class="caution_msg1"
                          >{=__('구매 이용 조건 안내')}
                          <a class="normal_btn js_impossible_layer">
                            <em
                              >{=__('전체보기')}<img
                                class="arrow"
                                src="../img/etc/bl_arrow.png"
                                alt="{=__('구매조건 이용안내 상세')}"
                            /></em>
                          </a>
                          <div class="nomal_layer dn">
                            <div class="wrap">
                              <strong>{=__('결제 제한 조건 사유')}</strong>
                              <div class="list">
                                <table cellspacing="0" border="0">
                                  <!--{@ ...orderPossibleMessageList }-->
                                  <tr>
                                    <td class="strong">{=....value_}</td>
                                  </tr>
                                  <!--{/}-->
                                </table>
                              </div>
                              <button type="button" class="close js_impossible_layer" title="{=__('닫기')}">
                                {=__('닫기')}
                              </button>
                            </div>
                          </div>
                        </strong>

                        <!--{ / }-->
                        <!--{ ? ...duplicationGoods === 'y' }-->
                        <strong class="chk_none">{=__('중복 상품')}</strong>
                        <!--{ / }-->

                        <!--{ ? (couponUse == 'y' && couponConfig['chooseCouponMemberUseType'] != 'member') && ...couponBenefitExcept == 'n' }-->
                        <div id="coupon_apply_{...sno}" class="pick_btn_box">
                          <!--{ ? gd_is_login() === false }-->
                          <a href="#" class="btn_alert_login"
                            ><img src="../img/common/btn/btn_coupon_apply.png" alt="{=__('쿠폰적용')}"
                          /></a>
                          <!--{ : }-->
                          <!--{ ? ...memberCouponNo }-->
                          <a href="#" class="js_btn_coupon_cancel" data-cartsno="{...sno}"
                            ><img src="../img/common/btn/btn_coupon_cancel.png" alt="{=__('쿠폰취소')}"
                          /></a>
                          <a href="#couponApplyLayer" class="btn_open_layer" data-cartsno="{...sno}"
                            ><img src="../img/common/btn/btn_coupon_change.png" alt="{=__('쿠폰변경')}"
                          /></a>
                          <!--{ : }-->
                          <a href="#couponApplyLayer" class="btn_open_layer" data-cartsno="{...sno}"
                            ><img src="../img/common/btn/btn_coupon_apply.png" alt="{=__('쿠폰적용')}"
                          /></a>
                          <!--{ / }-->
                          <!--{ / }-->
                        </div>
                        <!--{ / }-->

                        <em><a href="../goods/goods_view.php?goodsNo={=...goodsNo}">{=...goodsNm}</a></em>

                        <!--{ ? ...payLimitFl =='y' && is_array(...payLimit) }-->
                        <div class="icon_pick_list">
                          <!--{ @ ...payLimit }-->
                          <!--{ ?....value_ =='pg' }-->
                          <div class="icon_pg_over">
                            <img src="../img/icon/order/icon_settle_kind_{....value_}.png" />
                            <div class="icon_pg_cont"></div>
                          </div>
                          <!--{ : }-->
                          <img src="../img/icon/order/icon_settle_kind_{....value_}.png" />
                          <!--{ / }-->
                          <!--{ / }-->
                        </div>
                        <!--{ / }-->
                        <!-- //icon_pick_list -->

                        <div class="pick_option_box">
                          <!--{ @ ...option }-->
                          <!--{ ? ....optionName }-->
                          <span class="text_type_cont"
                            >{=....optionName} : {=....optionValue}
                            <!--{ ? ((....index_ + 1) == ....size_) && ....optionPrice != 0 && optionPriceFl == 'y' }--><strong
                              >(<!--{ ? ....optionPrice > 0 }-->+<!--{ / }-->{=gd_global_currency_display(....optionPrice)})</strong
                            ><!--{ / }--><!--{ ? ((....index_ + 1) == ....size_) }--><!--{ ? empty(....optionSellStr) === false }--><strong
                              >[{=....optionSellStr}]</strong
                            ><!--{ / }--><!--{ ? empty(....optionDeliveryStr) === false }--><strong
                              >[{=....optionDeliveryStr}]</strong
                            ><!--{ / }--><!--{ / }--></span
                          >
                          <!--{ / }-->
                          <!--{ / }-->
                        </div>

                        <div class="pick_option_box">
                          <!--{ @ ...optionText }-->
                          <!--{ ? ....optionValue }-->
                          <span class="text_type_cont"
                            >{=....optionName} : {=....optionValue}
                            <!--{ ? ....optionTextPrice != 0 && optionPriceFl == 'y' }--><strong
                              >(<!--{ ? ....optionTextPrice > 0 }-->+<!--{ / }-->{=gd_global_currency_display(....optionTextPrice)})</strong
                            ><!--{ / }--></span
                          >
                          <!--{ / }-->
                          <!--{ / }-->
                        </div>
                      </div>
                    </div>
                    <!-- //pick_add_cont -->

                    <!--{ ? empty(...addGoods) === false }-->
                    <div class="pick_add_list">
                      <!--{ @ ...addGoods }-->
                      <div class="pick_add_cont">
                        <span class="pick_add_plus"><em>{=__('추가')}</em></span>
                        <span class="pick_add_img">{=....addGoodsImage}</span>
                        <div class="pick_add_info">
                          <em>
                            <b>{=....addGoodsNm}</b> <br />
                            {=__('수량')} : {=....addGoodsCnt}{=__('개')}
                            <!--{ ? empty(...goodsPriceString) === false }-->
                            (+{=gd_global_currency_display(0)})
                            <!--{ : }-->
                            (+{=gd_global_currency_display((....addGoodsPrice * ....addGoodsCnt))})
                            <p class="add_currency">
                              {=gd_global_add_currency_display((....addGoodsPrice * ....addGoodsCnt))}
                            </p>
                            <!--{ / }-->
                          </em>
                          <div class="pick_option_box">
                            <!--{ ? ....optionNm }-->
                            <span class="text_type_cont">{=__('옵션')} : {=....optionNm}</span>
                            <!--{ / }-->
                          </div>
                        </div>
                      </div>
                      <!--{ / }-->
                      <!-- //pick_add_cont -->
                    </div>
                    <!--{ / }-->
                    <!-- //pick_add_list -->
                  </td>
                  <td class="td_order_amount">
                    <div class="order_goods_num">
                      <strong>{=...goodsCnt}{=__('개')}</strong>
                      <div class="btn_gray_list">
                        <a
                          href="#optionViewLayer"
                          onclick="OrderCartBol()"
                          class="btn_gray_small btn_open_layer"
                          <!--{
                          ?
                          ...memberCouponNo
                          }--
                        >
                          data-coupon='use'
                          <!--{ : }-->
                          data-goodsno="{...goodsNo}" data-sno="{...sno}"
                          <!--{ / }-->><span>{=__('옵션/수량변경')}</span></a
                        >
                      </div>
                    </div>
                  </td>
                  <td>
                    <!--{ ? empty(...goodsPriceString) === false }-->
                    <strong class="order_sum_txt">{=...goodsPriceString}</strong>
                    <!--{ : }-->
                    <strong class="order_sum_txt <!--{ ? ...timeSaleFl }-->time_sale_cost<!--{ : }-->price<!--{ / }-->"
                      >{=gd_global_currency_display((...price['goodsPriceSum'] + ...price['optionPriceSum'] +
                      ...price['optionTextPriceSum']))}</strong
                    >
                    <p class="add_currency">
                      {=gd_global_add_currency_display((...price['goodsPriceSum'] + ...price['optionPriceSum'] +
                      ...price['optionTextPriceSum']))}
                    </p>
                    <!--{ / }-->
                  </td>
                  <td class="td_benefit">
                    <!--{ ? ...goodsPriceDisplayFl =='n'}-->
                    <div>-</div>
                    <!--{ : }-->
                    <ul class="benefit_list">
                      <!--{ ? gd_is_login() === true }-->
                      <!--{ ? (...price['goodsDcPrice'] + ...price['memberDcPrice'] + ...price['memberOverlapDcPrice'] + ...price['couponGoodsDcPrice']) > 0 }-->
                      <li class="benefit_sale">
                        <em>{=__('할인')}</em>
                        <!--{ ? ...price['goodsDcPrice'] > 0 }-->
                        <span
                          >{=__('상품')} <strong>-{=gd_global_currency_display(...price['goodsDcPrice'])}</strong></span
                        >
                        <!--{ / }-->
                        <!--{ ? (...price['memberDcPrice'] + ...price['memberOverlapDcPrice']) > 0 }-->
                        <span
                          >{=__('회원')}
                          <strong
                            >-{=gd_global_currency_display(...price['memberDcPrice'] +
                            ...price['memberOverlapDcPrice'])}</strong
                          ></span
                        >
                        <!--{ / }-->
                        <!--{ ? ...price['couponGoodsDcPrice'] > 0 }-->
                        <span
                          >{=__('쿠폰')}
                          <strong>-{=gd_global_currency_display(...price['couponGoodsDcPrice'])}</strong></span
                        >
                        <!--{ / }-->
                      </li>
                      <!--{ / }-->
                      <!--{ ? mileage.useFl === 'y' && (...mileage.goodsMileage + ...mileage.memberMileage + ...mileage.couponGoodsMileage) > 0 }-->
                      <li class="benefit_mileage">
                        <em>{=__('적립')}</em>
                        <!--{ ? ...mileage.goodsMileage > 0 }-->
                        <span
                          >{=__('상품')}
                          <strong>+{=gd_global_money_format(...mileage.goodsMileage)}{=mileage.unit}</strong></span
                        >
                        <!--{ / }-->
                        <!--{ ? ...mileage.memberMileage > 0 }-->
                        <span
                          >{=__('회원')}
                          <strong>+{=gd_global_money_format(...mileage.memberMileage)}{=mileage.unit}</strong></span
                        >
                        <!--{ / }-->
                        <!--{ ? ...mileage.couponGoodsMileage > 0 }-->
                        <span
                          >{=__('쿠폰')}
                          <strong
                            >+{=gd_global_money_format(...mileage.couponGoodsMileage)}{=mileage.unit}</strong
                          ></span
                        >
                        <!--{ / }-->
                      </li>
                      <!--{ / }-->
                      <!--{ : }-->
                      <!--{ ? (...price['goodsDcPrice']) > 0 }-->
                      <li class="benefit_sale">
                        <em>{=__('할인')}</em>
                        <!--{ ? ...price['goodsDcPrice'] > 0 }-->
                        <span
                          >{=__('상품')} <strong>-{=gd_global_currency_display(...price['goodsDcPrice'])}</strong></span
                        >
                        <!--{ / }-->
                      </li>
                      <!--{ / }-->
                      <!--{ / }-->
                    </ul>
                    <!--{ / }-->
                  </td>
                  <td>
                    <strong class="order_sum_txt">{=gd_global_currency_display(...price['goodsPriceSubtotal'])}</strong>
                    <p class="add_currency">{=gd_global_add_currency_display(...price['goodsPriceSubtotal'])}</p>
                  </td>
                  <!--{ ? !gGlobal.isFront }-->
                  <!--{ ? ...goodsDeliveryFl === 'y' }-->
                  <!--{ ? ...index_ == '0' }-->
                  <td class="td_delivery" rowspan="{=setDeliveryInfo[..key_]['goodsLineCnt']}">
                    {=setDeliveryInfo[..key_]['goodsDeliveryMethod']}<br />
                    <!--{ ? setDeliveryInfo[..key_]['fixFl'] === 'free' }-->
                    {=__('무료배송')}
                    <!--{ : }-->
                    <!--{ ? setDeliveryInfo[..key_]['goodsDeliveryWholeFreeFl'] === 'y' }-->
                    {=__('조건에 따른 배송비 무료')}
                    <!--{ ? empty(setDeliveryInfo[..key_]['goodsDeliveryWholeFreePrice']) === false }-->
                    <!--({=gd_global_currency_display(setDeliveryInfo[..key_]['goodsDeliveryWholeFreePrice'])})-->
                    <!--{ / }-->
                    <!--{ : }-->
                    <!--{ ? setDeliveryInfo[..key_]['goodsDeliveryCollectFl'] === 'later' }-->
                    <!--{ ? empty(setDeliveryInfo[..key_]['goodsDeliveryCollectPrice']) === false }-->
                    {=gd_global_currency_display(setDeliveryInfo[..key_]['goodsDeliveryCollectPrice'])}
                    <!--{ / }-->
                    <!--{ : }-->
                    <!--{ ? empty(setDeliveryInfo[..key_]['goodsDeliveryPrice']) === true }-->
                    {=__('무료배송')}
                    <!--{ : }-->
                    {=gd_global_currency_display(setDeliveryInfo[..key_]['goodsDeliveryPrice'])}
                    <!--{ / }-->
                    <!--{ / }-->
                    <!--{ / }-->
                    <!--{ / }-->

                    <!--{ ? empty(setDeliveryInfo[..key_]['goodsDeliveryMethodFlText']) === false }-->
                    <br />
                    ({setDeliveryInfo[..key_]['goodsDeliveryMethodFlText']}-<!--{ ? setDeliveryInfo[..key_]['goodsDeliveryCollectFl'] === 'later' && empty(setDeliveryInfo[..key_]['goodsDeliveryCollectPrice']) === false }-->{=__('착불')}<!--{ : }-->{=__('선결제')}<!--{ / }-->)
                    <!--{ / }-->
                  </td>
                  <!--{ / }-->
                  <!--{ : }-->
                  <!--{ ? ...sameGoodsDeliveryFl === 'y' }-->
                  <!--{ ? ...equalGoodsNo === true }-->
                  <td class="td_delivery" rowspan="{=setDeliveryInfo[..key_][...goodsNo]['goodsLineCnt']}">
                    {=setDeliveryInfo[..key_][...goodsNo]['goodsDeliveryMethod']}<br />
                    <!--{ ? setDeliveryInfo[..key_][...goodsNo]['fixFl'] === 'free' }-->
                    {=__('무료배송')}
                    <!--{ : }-->
                    <!--{ ? setDeliveryInfo[..key_][...goodsNo]['goodsDeliveryWholeFreeFl'] === 'y' }-->
                    {=__('조건에 따른 배송비 무료')}
                    <!--{ ? empty(setDeliveryInfo[..key_][...goodsNo]['goodsDeliveryWholeFreePrice']) === false }-->
                    <!--({=gd_global_currency_display(setDeliveryInfo[..key_][...goodsNo]['goodsDeliveryWholeFreePrice'])})-->
                    <!--{ / }-->
                    <!--{ : }-->
                    <!--{ ? setDeliveryInfo[..key_][...goodsNo]['goodsDeliveryCollectFl'] === 'later' }-->
                    <!--{ ? empty(setDeliveryInfo[..key_][...goodsNo]['goodsDeliveryCollectPrice']) === false }-->
                    {=gd_global_currency_display(setDeliveryInfo[..key_][...goodsNo]['goodsDeliveryCollectPrice'])}
                    <!--{ / }-->
                    <!--{ : }-->
                    <!--{ ? empty(setDeliveryInfo[..key_][...goodsNo]['goodsDeliveryPrice']) === true }-->
                    {=__('무료배송')}
                    <!--{ : }-->
                    {=gd_global_currency_display(setDeliveryInfo[..key_][...goodsNo]['goodsDeliveryPrice'])}
                    <!--{ / }-->
                    <!--{ / }-->
                    <!--{ / }-->
                    <!--{ / }-->

                    <!--{ ? empty(setDeliveryInfo[..key_][...goodsNo]['goodsDeliveryMethodFlText']) === false }-->
                    <br />
                    ({setDeliveryInfo[..key_][...goodsNo]['goodsDeliveryMethodFlText']}-<!--{ ? setDeliveryInfo[..key_][...goodsNo]['goodsDeliveryCollectFl'] === 'later' && empty(setDeliveryInfo[..key_][...goodsNo]['goodsDeliveryCollectPrice']) === false }-->{=__('착불')}<!--{ : }-->{=__('선결제')}<!--{ / }-->)
                    <!--{ / }-->
                  </td>
                  <!--{ / }-->
                  <!--{ : }-->
                  <td class="td_delivery">
                    {=...goodsDeliveryMethod}<br />
                    <!--{ ? ...goodsDeliveryFixFl === 'free' }-->
                    {=__('무료배송')}
                    <!--{ : }-->
                    <!--{ ? ...goodsDeliveryWholeFreeFl === 'y' }-->
                    {=__('조건에 따른 배송비 무료')}
                    <!--{ ? empty(...price['goodsDeliveryWholeFreePrice']) === false }-->
                    <!--<br/>({=gd_global_currency_display(...price['goodsDeliveryWholeFreePrice'])})-->
                    <!--{ / }-->
                    <!--{ : }-->
                    <!--{ ? ...goodsDeliveryCollectFl === 'later' }-->
                    <!--{ ? empty(...price['goodsDeliveryCollectPrice']) === false }-->
                    {=gd_global_currency_display(...price['goodsDeliveryCollectPrice'])}
                    <!--{ / }-->
                    <!--{ : }-->
                    <!--{ ? empty(...price['goodsDeliveryPrice']) === true }-->
                    {=__('무료배송')}
                    <!--{ : }-->
                    {=gd_global_currency_display(...price['goodsDeliveryPrice'])}
                    <!--{ / }-->
                    <!--{ / }-->
                    <!--{ / }-->
                    <!--{ / }-->

                    <!--{ ? empty(...goodsDeliveryMethodFlText) === false }-->
                    <br />
                    ({...goodsDeliveryMethodFlText}-<!--{ ? ...goodsDeliveryCollectFl === 'later' && empty(...price['goodsDeliveryCollectPrice']) === false }-->{=__('착불')}<!--{ : }-->{=__('선결제')}<!--{ / }-->)
                    <!--{ / }-->
                  </td>
                  <!--{ / }-->
                  <!--{ / }-->
                  <!--{ / }-->
                </tr>
                <!--{ / }-->
                <!--{ / }-->
              </tbody>

              <!--{ ? cartScmCnt > 1 && !gGlobal.isFront }-->
              <tfoot>
                <tr>
                  <td colspan="7">
                    <div class="price_sum">
                      <strong class="price_shop_neme">[{=cartScmInfo[.key_]['companyNm']} {=__('배송상품')}]</strong>

                      <div class="price_sum_cont">
                        <div class="price_sum_list">
                          <dl>
                            <dt>
                              {=__('총 %s개의 상품금액', '<strong>' + number_format(cartScmGoodsCnt[.key_]) + '</strong
                              >')}
                            </dt>
                            <dd>
                              {=gd_global_currency_symbol()}<strong>{=gd_global_money_format(totalScmGoodsPrice[.key_])}</strong>{=gd_global_currency_string()}
                            </dd>
                          </dl>
                          <!--{ ? totalScmGoodsDcPrice[.key_] > 0 }-->
                          <span><img src="../img/order/order_price_minus.png" alt="{=__('빼기')}" /></span>
                          <dl>
                            <dt>{=__('상품할인')}</dt>
                            <dd>
                              {=gd_global_currency_symbol()}<strong>{=gd_global_money_format(totalScmGoodsDcPrice[.key_])}</strong>{=gd_global_currency_string()}
                            </dd>
                          </dl>
                          <!--{ / }-->
                          <!--{ ? (totalScmMemberDcPrice[.key_] + totalScmMemberOverlapDcPrice[.key_]) > 0 }-->
                          <span><img src="../img/order/order_price_minus.png" alt="{=__('빼기')}" /></span>
                          <dl>
                            <dt>{=__('회원할인')}</dt>
                            <dd>
                              {=gd_global_currency_symbol()}<strong
                                >{=gd_global_money_format((totalScmMemberDcPrice[.key_] +
                                totalScmMemberOverlapDcPrice[.key_]))}</strong
                              >{=gd_global_currency_string()}
                            </dd>
                          </dl>
                          <!--{ / }-->
                          <!--{ ? totalScmCouponGoodsDcPrice[.key_] > 0 }-->
                          <span><img src="../img/order/order_price_minus.png" alt="{=__('빼기')}" /></span>
                          <dl>
                            <dt>{=__('쿠폰할인')}</dt>
                            <dd>
                              {=gd_global_currency_symbol()}<strong>{=gd_global_money_format(totalScmCouponGoodsDcPrice[.key_])}</strong>{=gd_global_currency_string()}
                            </dd>
                          </dl>
                          <!--{ / }-->
                          <!--{ ? totalScmMyappDcPrice[.key_] > 0 }-->
                          <span><img src="../img/order/order_price_minus.png" alt="{=__('빼기')}" /></span>
                          <dl>
                            <dt>{=__('모바일앱할인')}</dt>
                            <dd>
                              {=gd_global_currency_symbol()}<strong>{=gd_global_money_format(totalScmMyappDcPrice[.key_])}</strong>{=gd_global_currency_string()}
                            </dd>
                          </dl>
                          <!--{ / }-->
                          <!--{ ? !gGlobal.isFront }-->
                          <span><img src="../img/order/order_price_plus.png" alt="{=__('더하기')}" /></span>
                          <dl>
                            <dt>{=__('배송비')}</dt>
                            <dd>
                              {=gd_global_currency_symbol()}<strong>{=gd_global_money_format(totalScmGoodsDeliveryCharge[.key_])}</strong>{=gd_global_currency_string()}
                            </dd>
                          </dl>
                          <!--{ / }-->
                          <span><img src="../img/order/order_price_total.png" alt="{=__('합계')}" /></span>
                          <dl class="price_total">
                            <dt>{=__('합계')}</dt>
                            <dd>
                              {=gd_global_currency_symbol()}<strong class="total"
                                >{=gd_global_money_format(totalScmGoodsPrice[.key_] - totalScmGoodsDcPrice[.key_] -
                                totalScmMemberDcPrice[.key_] - totalScmMemberOverlapDcPrice[.key_] -
                                totalScmCouponGoodsDcPrice[.key_] + totalScmGoodsDeliveryCharge[.key_])}</strong
                              >{=gd_global_currency_string()}
                            </dd>
                          </dl>
                        </div>
                      </div>
                      <!-- //price_sum_cont -->
                    </div>
                    <!-- //price_sum -->
                  </td>
                </tr>
              </tfoot>
              <!--{ / }-->
            </table>
          </div>
        </div>
        <!--{ / }-->
        <!-- //cart_cont_list -->
        <!-- 장바구니 상품리스트 끝 -->

        <!--{ ? empty(cartCnt) === true }-->
        <p class="no_data">{=__('장바구니에 담겨있는 상품이 없습니다.')}</p>
        <!--{ / }-->
      </form>

      <div class="btn_left_box">
        <a href="{=shoppingUrl}" class="shop_go_link"><em>&lt; {=__('쇼핑 계속하기')}</em></a>
      </div>

      <div class="price_sum">
        <div class="price_sum_cont">
          <div class="price_sum_list">
            <dl>
              <dt>
                {=__('총 %s 개의 상품금액 %s', '<strong id="totalGoodsCnt">' + number_format(cartCnt) + '</strong>',
                '')}
              </dt>
              <dd>
                {=gd_global_currency_symbol()}<strong id="totalGoodsPrice"
                  >{=gd_global_money_format(totalGoodsPrice)}</strong
                >{=gd_global_currency_string()}
              </dd>
            </dl>
            <!--{ ? totalGoodsDcPrice > 0 }-->
            <span><img src="../img/order/order_price_minus.png" alt="{=__('빼기')}" /></span>
            <dl>
              <dt>{=__('상품할인')}</dt>
              <dd>
                {=gd_global_currency_symbol()}<strong id="totalGoodsDcPrice"
                  >{=gd_global_money_format(totalGoodsDcPrice)}</strong
                >{=gd_global_currency_string()}
              </dd>
            </dl>
            <!--{ / }-->
            <!--{ ? totalSumMemberDcPrice > 0 }-->
            <span><img src="../img/order/order_price_minus.png" alt="{=__('빼기')}" /></span>
            <dl>
              <dt>{=__('회원할인')}</dt>
              <dd>
                {=gd_global_currency_symbol()}<strong id="totalMinusMember"
                  >{=gd_global_money_format(totalSumMemberDcPrice)}</strong
                >{=gd_global_currency_string()}
              </dd>
            </dl>
            <!--{ / }-->
            <!--{ ? totalCouponGoodsDcPrice > 0 }-->
            <span><img src="../img/order/order_price_minus.png" alt="{=__('빼기')}" /></span>
            <dl>
              <dt>{=__('쿠폰할인')}</dt>
              <dd>
                {=gd_global_currency_symbol()}<strong id="totalCouponGoodsDcPrice"
                  >{=gd_global_money_format(totalCouponGoodsDcPrice)}</strong
                >{=gd_global_currency_string()}
              </dd>
            </dl>
            <!--{ / }-->
            <!--{ ? totalMyappDcPrice > 0 }-->
            <span><img src="../img/order/order_price_minus.png" alt="{=__('빼기')}" /></span>
            <dl>
              <dt>{=__('모바일앱할인')}</dt>
              <dd>
                {=gd_global_currency_symbol()}<strong id="totalMyappDcPrice"
                  >{=gd_global_money_format(totalMyappDcPrice)}</strong
                >{=gd_global_currency_string()}
              </dd>
            </dl>
            <!--{ / }-->
            <!--{ ? !gGlobal.isFront }-->
            <span><img src="../img/order/order_price_plus.png" alt="{=__('더하기')}" /></span>
            <dl>
              <dt>{=__('배송비')}</dt>
              <dd>
                {=gd_global_currency_symbol()}<strong id="totalDeliveryCharge"
                  >{=gd_global_money_format(totalDeliveryCharge)}</strong
                >{=gd_global_currency_string()}
              </dd>
            </dl>
            <!--{ / }-->
            <span><img src="../img/order/order_price_total.png" alt="{=__('합계')}" /></span>
            <dl class="price_total">
              <dt>{=__('합계')}</dt>
              <dd>
                {=gd_global_currency_symbol()}<strong id="totalSettlePrice"
                  >{=gd_global_money_format(totalSettlePrice)}</strong
                >{=gd_global_currency_string()}
                <!--{ ? gGlobal.isFront && gGlobal.useAddCurrency }-->
                <div class="add_currency">
                  {=gd_global_add_currency_symbol()}<em id="totalSettlePriceAdd"
                    >{=gd_global_add_money_format(totalSettlePrice)}</em
                  >{=gd_global_add_currency_string()}
                </div>
                <!--{ / }-->
              </dd>
            </dl>
          </div>
          <em id="deliveryChargeText" class="tobe_mileage"></em>
          <!--{ ? gd_is_login() === true && mileage.useFl == 'y' }-->
          <em class="tobe_mileage"
            >{=__('적립예정')} {=mileage.name} :
            <span id="totalGoodsMileage">{=gd_global_money_format(totalMileage)}</span> {=mileage.unit}</em
          >
          <!--{ / }-->
        </div>
        <!-- //price_sum_cont -->
      </div>
      <!-- //price_sum -->

      <!--{ ? cartCnt > 0 }-->
      <div class="btn_order_box">
        <span class="btn_left_box">
          <button type="button" class="btn_order_choice_del" onclick="gd_cart_process('cartDelete');">
            {=__('선택 상품 삭제')}
          </button>
          <button type="button" class="btn_order_choice_wish" onclick="gd_cart_process('cartToWish');">
            {=__('선택 상품 찜')}
          </button>
          <!--{ ? gd_is_plus_shop(c.PLUSSHOP_CODE_CARTESTIMATE) === true && estimateUseFl == 'y' }-->
          <button type="button" class="btn_order_choice_wish" onclick="gd_cart_estimate_print();">
            {=__('견적서 출력')}
          </button>
          <!--{ / }-->
        </span>
        <span class="btn_right_box">
          <button type="button" class="btn_order_choice_buy" onclick="gd_cart_process('orderSelect');">
            {=__('선택 상품 주문')}
          </button>
          <button type="button" class="btn_order_whole_buy" onclick="gd_order_all();">{=__('전체 상품 주문')}</button>
        </span>
      </div>
      <!-- //btn_order_box -->

      <div class="pay_box">
        <div class="payco_pay">{payco}</div>
        <div class="naver_pay">{naverPay}</div>
      </div>
      <!-- //pay_box -->
      <!--{ / }-->
    </div>
    <!-- //cart_cont -->
  </div>
  <!-- //order_wrap -->
</div>
<!-- //content_box -->

<!--{ ? couponUse == 'y' }-->
<!-- 쿠폰 적용하기 레이어 -->
<div id="couponApplyLayer" class="layer_wrap coupon_apply_layer dn"></div>
<!--//쿠폰 적용하기 레이어 -->
<!--{ / }-->

<!-- 옵션 변경하기 레이어 -->
<div id="optionViewLayer" class="layer_wrap dn"></div>
<!-- 옵션 변경하기 레이어 -->

<!--금시세 로딩바 구현-->
<style>
  #fog {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0.7;
    z-index: 9999;
    background: rgba(0, 0, 0, 0.7);
  }

  #loading {
    display: none;
    position: fixed;
    z-index: 10000;
    border: 4px solid #222;
    border-radius: 10px;
    top: 50%;
    overflow: hidden;
    left: 50%;
    margin-left: -37px;
    margin-top: -37px;
    background: #fff;
    height: 20%;
  }
</style>

<div id="loading" style="background: rgb(255, 255, 255)">
  <img src="../img/loading.gif" alt="" />
  <span style="position: absolute; width: 100%; top: 120px; text-align: center; left: 0"
    >금시세를<br />조회중입니다...</span
  >
</div>
<div id="fog"></div>

<script type="text/javascript">
  function openLoading() {
    $('#fog,#loading').show();
  }
  function closeLoading() {
    $('#fog,#loading').hide();
  }
</script>

<script type="text/javascript">
      let openbol = false;
      $(document).ready(function () {
          $('.js_impossible_layer').on('click', function(){
              $(".nomal_layer").addClass('dn');
              if ($(".nomal_layer").is(":hidden")) {
                  $(this).next(".nomal_layer").removeClass('dn');
              }
          });

          <!--{ ? couponUse == 'y' }-->
          // 쿠폰 적용/변경 레이어
          $('.btn_open_layer').bind('click', function(e){
              if($(this).attr('href') == '#couponApplyLayer') {
                  var params = {
                      mode: 'coupon_apply',
                      cartSno: $(this).data('cartsno'),
                  };
                  $.ajax({
                      method: "POST",
                      cache: false,
                      url: "../order/layer_coupon_apply.php",
                      data: params,
                      success: function (data) {
                          $('#couponApplyLayer').empty().append(data);
                          $('#couponApplyLayer').find('>div').center();
                      },
                      error: function (data) {
  //                        console.log(data);
                          alert(data);
                      }
                  });
              }
          });
          // 쿠폰 취소
          $('.js_btn_coupon_cancel').bind('click', function(e){
              var cartSno = $(this).data('cartsno');
              $('[name="cart[cartSno]"]').val(cartSno);
              $('#frmCart input[name=\'mode\']').val('couponDelete');
              $('#frmCart').attr('method', 'post');
              $('#frmCart').attr('target', 'ifrmProcess');
              $('#frmCart').attr('action', '../order/cart_ps.php');
              $('#frmCart').submit();

              return false;
          });
          <!--{ / }-->
          // 숫자 체크
          //$('input[name*=\'goodsCnt\']').number_only();


          <!--{ ? empty(cartCnt) === false }-->
          var totalDeliveryCharge = numeral().unformat($('#totalDeliveryCharge').text());
          // 선택한 상품에 따른 금액 계산
          $('#frmCart input:checkbox[name="cartSno[]"], .gd_select_all_goods').click(function () {
              // 체크박스 전체 선택상태에 따른 체크박스 변경처리
              var checkedCount = 0;
              var $eachCheckBox = $(this).closest('table').find('tbody input[name="cartSno[]"]:checkbox');
              // 전체 및 개별 상품 선택 처리
              if ($(this).hasClass('gd_select_all_goods')) {
                  var allCheckFl = $(this).prop('checked');
                  $eachCheckBox.each(function(){
                      $(this).prop('checked', allCheckFl);
                      if (allCheckFl) {
                          $('label[for=' + $(this).attr('id') + ']').addClass('on');
                      } else {
                          $('label[for=' + $(this).attr('id') + ']').removeClass('on');
                      }
                  });
              } else {
                  $eachCheckBox.each(function(idx){
                      if ($(this).prop('checked') === true) {
                          checkedCount++;
                      }
                  });
                  if ($eachCheckBox.length == checkedCount) {
                      $(this).closest('table').find('thead > tr > th:first-child input[id*=allCheck]').prop('checked', true);
                      $(this).closest('table').find('thead > tr > th:first-child label[for*=allCheck]').addClass('on');
                  } else {
                      $(this).closest('table').find('thead > tr > th:first-child input[id*=allCheck]').prop('checked', false);
                      $(this).closest('table').find('thead > tr > th:first-child label[for*=allCheck]').removeClass('on');
                  }
              }

              window.setTimeout(function(){
                  $.ajax({
                      method: "POST",
                      cache: false,
                      url: "../order/cart_ps.php",
                      data: "mode=cartSelectCalculation&" + $('#frmCart input:checkbox[name="cartSno[]"]:checked').serialize(),
                      dataType: 'json',
                      beforeSend: function(){
                          $('input[name="cartSno[]"], .gd_select_all_goods').prop('disabled', true);
                      }
                  }).success(function (data) {
                      $('#totalGoodsCnt').html(numeral(data.cartCnt).format('0,0'));
                      $('#totalGoodsPrice').html(gd_money_format(data.totalGoodsPrice));
                      $('#totalGoodsDcPrice').html(gd_money_format(data.totalGoodsDcPrice));
                      $('#totalMinusMember').html(gd_money_format(data.totalMemberDcPrice));
                      $('#totalCouponGoodsDcPrice').html(gd_money_format(data.totalCouponGoodsDcPrice));
                      $('#totalMyappDcPrice').html(gd_money_format(data.totalMyappDcPrice));
                      $('#totalSettlePrice').html(gd_money_format(data.totalSettlePrice));
                      $('#totalSettlePriceAdd').html(gd_add_money_format(data.totalSettlePrice));
                      $('#totalGoodsMileage').html(numeral(data.totalMileage).format());
                      $('#deliveryChargeText').html('');
                      $('#totalDeliveryCharge').html(gd_money_format(data.totalDeliveryCharge));
                      $('input[name="cartSno[]"], .gd_select_all_goods').prop('disabled', false);
                  }).error(function (e) {
                      alert(e);
                      $('input[name="cartSno[]"], .gd_select_all_goods').prop('disabled', false);
                  });
              }, 200);


          });

          <!--{ / }-->


          $('.btn_open_layer').bind('click', function(e){
              if($(this).attr('href') == '#optionViewLayer') {
                  if($(this).data('coupon') == 'use') {
                      alert("{=__('쿠폰 적용 취소 후 옵션 변경 가능합니다.')}");
                      return false;
                  } else {

                      // 로딩화면 show
                      openLoading()

                      var params = {
                          type : 'cart',
                          sno: $(this).data('sno'),
                          goodsNo: $(this).data('goodsno')
                      };

                      $.ajax({
                          method: "POST",
                          cache: false,
                          url: "../goods/layer_option.php",
                          data: params,
                          success: function (data) {
                              $('#optionViewLayer').empty().append(data);
                              $('#optionViewLayer').find('>div').center();
                          },
                          error: function (data) {
                              alert(data.message);

                          },
                          complete: function () {
                              // 로딩화면 hide
                              closeLoading();
                          }
                      });

                  }

              }
          });

          <!--{ ? isPayLimit > 0  }-->
          var adddHtml = '';
          adddHtml +=  "<strong>{=__('결제수단')}</strong>";
          adddHtml +=  "<ul>";
          <!--{ @ useSettleKindPg }-->
          adddHtml +=  "<li>{.value_}</li>";
          <!--{ / }-->
          adddHtml +=  "</ul>";
          $(adddHtml).appendTo('.icon_pg_cont');
          <!--{ : }-->
          $('.icon_pg_cont').addClass('dn');
          <!--{ / }-->

          {customReadyScript}

      });

      /**
       * 선택 상품 처리
       */
      function gd_cart_process(mode) {
          <!--{ ? empty(cartCnt) === true }-->
          alert("{=__('장바구니에 담겨있는 상품이 없습니다.')}");
          <!--{ : }-->
          // 선택한 상품 개수
          var checkedCnt = $('#frmCart  input:checkbox[name="cartSno[]"]:checked').length;

          // 모드에 따른 메시지 및 처리
          if (mode == 'cartDelete') {
              msg = "{=__('상품을 장바구니에서 삭제 하시겠습니까?')}";
          } else if (mode == 'cartToWish') {
              msg = "{=__('상품을 찜리스트에 담으시겠습니까?')}";
          } else if (mode == 'orderSelect') {
              msg = "{=__('상품만 주문합니다.')}";

              var alertMsg = gd_cart_cnt_info();
              if (alertMsg) {
                  alert(alertMsg);
                  return false;
              }

              // 구매 불가 체크
              var orderPossible = 'y';
              var chkCartSno = []; // 쿠폰 유효성 체크시 사용
              $('#frmCart  input:checkbox[name="cartSno[]"]:checked').each(function() {
                  if ($(this).data('possible') == 'n') {
                      orderPossible = 'n';
                  } else {
                      chkCartSno.push($(this).val());
                  }
              });
              if (orderPossible == 'n') {
                  alert("{=__('옵션 선택이 안된 상품이 존재합니다.%s장바구니 상품 옵션을 선택해주세요! ', '\n')}");
                  return false;
              }

              // 쿠폰 사용기간 체크
              if (mode == 'orderSelect' && $('.js_btn_coupon_cancel').length > 0) {
                  var checkCouponType = false;
                  $.ajax({
                      method: "POST",
                      cache: false,
                      async: false,
                      url: "../order/cart_ps.php",
                      data: {mode: 'CheckCouponTypeArr', cartSno : chkCartSno },
                      success: function (data) {
                          checkCouponType = data.isSuccess;
                      },
                      error: function (e) {
                      }
                  });

                  if(checkCouponType) {
                      alert('사용기간이 만료된 쿠폰이 포함되어 있어 제외 후 진행합니다.');
                  }
              }

              if (parseInt(checkedCnt) == parseInt({=cartCnt})) {
                  <!--{ ? gd_is_login() === false }-->
                  $('#frmCart input[name=\'mode\']').val(mode);
                  $('#frmCart').attr('method', 'post');
                  $('#frmCart').attr('target', 'ifrmProcess');
                  $('#frmCart').attr('action', '../order/cart_ps.php');
                  $('#frmCart').submit();
                  <!--{ : }-->
                  location.href='../order/order.php';
                  <!--{ / }-->
                  return true;
              }
          } else {
              return false;
          }

          if (checkedCnt == 0) {
              alert("{=__('선택하신 상품이 없습니다.')}");
              return false;
          } else {
              // 쿠폰 사용기간 체크
              if (mode == 'orderSelect' && $('.js_btn_coupon_cancel').length > 0) {
                  var checkCouponType = false;
                  $.ajax({
                      method: "POST",
                      cache: false,
                      async: false,
                      url: "../order/cart_ps.php",
                      data: {mode: 'CheckCouponTypeArr', cartSno : chkCartSno },
                      success: function (data) {
                          checkCouponType = data.isSuccess;
                      },
                      error: function (e) {
                      }
                  });

                  if(checkCouponType) {
                      alert('사용기간이 만료된 쿠폰이 포함되어 있어 제외 후 진행합니다.');
                  }
              }

              if (confirm(__('선택하신 %i개', checkedCnt) + <!--{ ? gGlobal.locale != 'ko' }--> ', ' + <!--{ / }--> msg) === true) {
                  $('#frmCart input[name=\'mode\']').val(mode);
                  $('#frmCart').attr('method', 'post');
                  $('#frmCart').attr('target', 'ifrmProcess');
                  $('#frmCart').attr('action', '../order/cart_ps.php');
                  $('#frmCart').submit();
              }
              return true;
          }
          <!--{ / }-->
      }

      /**
       * 전체 상품 주문
       *
       */
      function gd_order_all() {
          <!--{ ? empty(cartCnt) === true }-->
          alert("{=__('장바구니에 담겨있는 상품이 없습니다.')}");
          <!--{ : }-->
          var alertMsg = gd_cart_cnt_info('all');
          if (alertMsg) {
              alert(alertMsg);
              return false;
          }
          <!--{ ? orderPossible === true }-->
          // 쿠폰 유효성 체크시 사용
          var chkCartSno = [];
          $('#frmCart  input:checkbox[name="cartSno[]"]:checked').each(function() {
              chkCartSno.push($(this).val());
          });

          // 쿠폰 사용기간 체크
          if ($('.js_btn_coupon_cancel').length > 0) {
              var checkCouponType = false;
              $.ajax({
                  method: "POST",
                  cache: false,
                  async: false,
                  url: "../order/cart_ps.php",
                  data: {mode: 'CheckCouponTypeArr', cartSno : chkCartSno },
                  success: function (data) {
                      checkCouponType = data.isSuccess;
                  },
                  error: function (e) {
                  }
              });

              if(checkCouponType) {
                  alert('사용기간이 만료된 쿠폰이 포함되어 있어 제외 후 진행합니다.');
              }
          }
          <!--{ ? gd_is_login() === false }-->
          $('input[name="cartSno[]"]').prop('checked', true);
          $('#frmCart input[name=\'mode\']').val('orderSelect');
          $('#frmCart').attr('method', 'post');
          $('#frmCart').attr('target', 'ifrmProcess');
          $('#frmCart').attr('action', '../order/cart_ps.php');
          $('#frmCart').submit();
          <!--{ : }-->
          location.href='../order/order.php';
          <!--{ / }-->
          <!--{ : }-->
          <!--{ ? orderPossibleMessage }-->
          alert("{=__(orderPossibleMessage)}");
          <!--{ : }-->
          alert("{=__('옵션 선택이 안된 상품이 존재합니다.%s장바구니 상품 옵션을 선택해주세요! ', '\n')}");
          <!--{ / }-->
          <!--{ / }-->
          <!--{ / }-->
      }

      /**
       * 장바구니 비우기
       */

      function gd_cart_remove() {
          if (confirm("{=__('장바구니를 비우시겠습니까?')}") === true) {
              ifrmProcess.location.replace('./cart_ps.php?mode=remove');
          }
      }

      /**
       * 재고 체크
       *
       * @param intger stockLimit 현재 상품의 총 재고
       * @param intger thisCnt 현재 구매 수량
       * @param intger thisIndex 현재 상품의 index
       */
      function gd_stock_check(stockLimit, thisCnt, thisIndex) {
          if (stockLimit < thisCnt) {
              alert('재고가 부족합니다. 현재 ' + stockLimit + '개의 재고가 남아 있습니다.');
              $('input[name=\'goodsCnt[]\']').eq(thisIndex).val(stockLimit);
          }
      }


      /**
       * 옵션변경 처리
       *
       * @param string params 옵션변경정보
       * @param intger sno 장바구니 고유번호
       */
      function gd_option_view_result(params,sno) {

          params += "&mode=cartUpdate&sno="+sno;

          $.ajax({
              method: "POST",
              cache: false,
              url: "../order/cart_ps.php",
              data: params,
              success: function (data) {
                  document.location.reload();
              },
              error: function (data) {
                  alert(data.message);
              }
          });

      }

      function gd_cart_cnt_info(mode) {
          var target = 'input[name="cartSno[]"]';
          if (mode != 'all') target += ':checked';
          var stockCheckFl = false;
          var cartSno = [];

          var goodsCntData = [];
          $.each($(target), function(){
              var $goodsCnt = $(this);
              var goodsKey = $goodsCnt.data('goods-key');
              if (goodsCntData[goodsKey]) {
                  stockCheckFl = true;
                  goodsCntData[goodsKey] += $goodsCnt.data('default-goods-cnt');
              } else {
                  cartSno[goodsKey] = [];
                  goodsCntData[goodsKey] = $goodsCnt.data('default-goods-cnt');
              }
              cartSno[goodsKey].push($(this).val());
          });

          var msgByUnit = [];
          var msgByCnt = [];
          var msg;
          $.each(goodsCntData, function(index, value){
              if (_.isUndefined(value)) return true;

              var $data = $(target + '[data-goods-key="' + index + '"]');

              if ($data.data('fixed-sales') == 'goods') {
                  if (value % $data.data('sales-unit') > 0) {
                      msg = $data.data('goods-nm') + ' ' + $data.data('sales-unit') + __('개');
                      msgByUnit['goods'] = msgByUnit['goods'] ? msgByUnit['goods'] + '\n' + msg : msg;
                  }
              } else {
                  $.each($data, function(){
                      if ($(this).data('default-goods-cnt') % $(this).data('sales-unit') > 0) {
                          msg = $(this).data('goods-nm') + '(' + $(this).data('option-nm') + ')' + ' ' + $(this).data('sales-unit') + __('개');
                          msgByUnit['option'] = msgByUnit['option'] ? msgByUnit['option'] + '\n' + msg : msg;
                      }
                  });
              }
              if ($data.data('fixed-order-cnt') == 'goods') {
                  if ($data.data('min-order-cnt') > 1 && $data.data('min-order-cnt') > value) {
                      msg = __('%1$s 상품당 최소 %2$s개 이상', [$data.data('goods-nm'), $data.data('min-order-cnt')]);
                      msgByCnt['goods'] = msgByCnt['goods'] ? msgByCnt['goods'] + '\n' + msg : msg;
                  }
                  if ($data.data('max-order-cnt') > 0 && $data.data('max-order-cnt') < value) {
                      msg = __('%1$s 상품당 최대 %2$s개 이하', [$data.data('goods-nm'), $data.data('max-order-cnt')]);
                      msgByCnt['goods'] = msgByCnt['goods'] ? msgByCnt['goods'] + '\n' + msg : msg;
                  }
              } else if ($data.data('fixed-order-cnt') == 'id') {
                  var params = {
                          mode: 'check_memberOrderGoodsCount',
                          goodsNo: $data.data('goods-no'),
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

                          if ($data.data('min-order-cnt') > 1 && $data.data('min-order-cnt') > (value + data.count)) {
                              msg = __('%1$s ID당 최소 %2$s개 이상', [$data.data('goods-nm'), $data.data('min-order-cnt')]);
                              msgByCnt['id'] = msgByCnt['id'] ?  msgByCnt['id'] + '\n' + msg : msg;
                          } else if ($data.data('min-order-cnt') > 1 && $data.data('min-order-cnt') > value) {
                              msg = __('%1$s ID당 최소 %2$s개 이상', [$data.data('goods-nm'), $data.data('min-order-cnt')]);
                              msgByCnt['id'] = msgByCnt['id'] ?  msgByCnt['id'] + '\n' + msg : msg;
                          } else if ($data.data('max-order-cnt') > 0 && $data.data('max-order-cnt') < (value + data.count)) {
                              msg = __('%1$s ID당 최대 %2$s개 이하', [$data.data('goods-nm'), $data.data('max-order-cnt')]);
                              msgByCnt['id'] = msgByCnt['id'] ?  msgByCnt['id'] + '\n' + msg : msg;
                          } else if ($data.data('max-order-cnt') > 0 && $data.data('max-order-cnt') < value) {
                              msg = __('%1$s ID당 최대 %2$s개 이하', [$data.data('goods-nm'), $data.data('max-order-cnt')]);
                              msgByCnt['id'] = msgByCnt['id'] ?  msgByCnt['id'] + '\n' + msg : msg;
                          }
                      },
                      error: function (data) {
                          alert(data.message);
                      }
                  });
              } else {
                  $.each($data, function(){
                      if ($(this).data('min-order-cnt') > 1 && $(this).data('min-order-cnt') > $(this).data('default-goods-cnt')) {
                          msg = __('%1$s(%2$s) 옵션당 최소 %3$s개 이상', [$(this).data('goods-nm'), $(this).data('option-nm'), $(this).data('min-order-cnt')]);
                          msgByCnt['option'] = msgByCnt['option'] ?  msgByCnt['option'] + '\n' + msg : msg;
                      }
                      if ($(this).data('max-order-cnt') > 0 && $(this).data('max-order-cnt') < $(this).data('default-goods-cnt')) {
                          msg = __('%1$s(%2$s) 옵션당 최대 %3$s개 이하', [$(this).data('goods-nm'), $(this).data('option-nm'), $(this).data('max-order-cnt')]);
                          msgByCnt['option'] = msgByCnt['option'] ?  msgByCnt['option'] + '\n' + msg : msg;
                      }
                  });
              }
          });

          var alertMsg = [];
          var msg;
          if (msgByUnit['option']) {
              msg = __('옵션기준');
              msg += '\n';
              msg += __('%1$s단위로 묶음 주문 상품입니다.', msgByUnit['goods']);
              alertMsg.push(msg);
          }
          if (msgByUnit['goods']) {
              msg = __('상품기준');
              msg += '\n';
              msg += __('%1$s단위로 묶음 주문 상품입니다.', msgByUnit['goods']);
              alertMsg.push(msg);
          }
          if (alertMsg.length) {
              return alertMsg.join('\n\n');
          }

          if (msgByCnt['option']) {
              if (msgByCnt['goods'] || msgByCnt['id']) {
                  alertMsg.push(__('%1$s', msgByCnt['option']));
              } else {
                  alertMsg.push(__('%1$s구매가능합니다.', msgByCnt['option']));
              }
          }
          if (msgByCnt['goods']) {
              if (msgByCnt['id']) {
                  alertMsg.push(__('%1$s', msgByCnt['goods']));
              } else {
                  alertMsg.push(__('%1$s구매가능합니다.', msgByCnt['goods']));
              }
          }
          if (msgByCnt['id']) {
              alertMsg.push(__('%1$s구매가능합니다.', msgByCnt['id']));
          }
          if (alertMsg.length) {
              return alertMsg.join('\n');
          }
          if(stockCheckFl) {
              var _cartSno = null;
              for(var i in cartSno) {
                  if(cartSno[i].length > 1) {
                      if(_cartSno) _cartSno += ','+cartSno[i].join(',');
                      else _cartSno = cartSno[i].join(',');
                  }
              }
              if(_cartSno) {
                  $.ajax({
                      method: "POST",
                      cache: false,
                      url: "../order/cart_ps.php",
                      async: false,
                      data: {'mode': 'cartSelectStock', 'sno': _cartSno},
                      success: function (cnt) {
                          if (cnt) {
                              alertMsg.push(__('재고가 부족합니다. 현재 %s개의 재고가 남아 있습니다.', cnt));
                          }
                      },
                      error: function (data) {
                          alert(data.message);
                      }
                  });
              }
          }
          if (alertMsg.length) {
              return alertMsg.join('\n\n');
          }
      }

  	<!--{ ? gd_is_plus_shop(c.PLUSSHOP_CODE_CARTESTIMATE) === true && estimateUseFl == 'y' }-->
      /**
       * 선택 상품 견적서 출력
       */
      function gd_cart_estimate_print() {
          <!--{ ? empty(cartCnt) === true }-->
          alert("{=__('장바구니에 담겨있는 상품이 없습니다.')}");
          <!--{ : }-->
          // 선택한 상품 개수
          var checkedCnt = $('#frmCart').find('input:checkbox[name="cartSno[]"]:checked').length;

          var msg = "{=__('상품의 견적서를 출력하시겠습니까?')}";

          if (checkedCnt == 0) {
              alert("{=__('선택하신 상품이 없습니다.')}");
              return false;
          } else {
              if (confirm(__('선택하신 %i개', checkedCnt) + <!--{ ? gGlobal.locale != 'ko' }--> ', ' + <!--{ / }--> msg) === true) {
                  // 구매 불가 체크
                  var orderPossible = 'y';
                  $('#frmCart').find('input:checkbox[name="cartSno[]"]:checked').each(function() {
                      if ($(this).data('possible') == 'n') {
                          orderPossible = 'n';
                      }
                  });
                  if (orderPossible == 'n') {
                      alert("{=__('옵션 선택이 안된 상품이 존재합니다.%s장바구니 상품 옵션을 선택해주세요! ', '\n')}");
                      return false;
                  }

                  var estimatePrint = gd_popup({
                      target: 'cartEstimatePrint'
                      , url: ''
                      , width: 750
                      , height: 800
                      , resizable: 'yes'
                      , scrollbars: 'yes'
                      , menubar: 'yes'
                  });

                  $('#frmCart').find('input[name="mode"]').val('cartEstimate');
                  $('#frmCart').attr('method', 'post');
                  $('#frmCart').attr('target', 'cartEstimatePrint');
                  $('#frmCart').attr('action', '../order/cart_estimate.php');
                  $('#frmCart').submit();
                  estimatePrint.focus();
              }
          }
          <!--{ / }-->
      }
      <!--{ / }-->

      //-->
</script>
{=fbCartScript} { # footer }