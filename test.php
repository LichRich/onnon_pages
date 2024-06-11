{*** 주문서 작성 / 결제 | order/order.php ***}
{ # header }

<div class="content_box">
    <form id="frmOrder" name="frmOrder" action="./order_ps.php" method="post" target="ifrmProcess">
        <input type="hidden" name="csrfToken" value="{token}" />
        <input type="hidden" name="orderChannelFl" value="shop" />
        <input type="hidden" name="orderCountryCode" value="{=gd_isset(gMemberInfo['countryCode'])}" />
        <input type="hidden" name="orderZipcode" value="{=gd_isset(gMemberInfo['zipcode'])}" />
        <input type="hidden" name="orderZonecode" value="{=gd_isset(gMemberInfo['zonecode'])}" />
        <input type="hidden" name="orderState" value="{=gd_isset(gMemberInfo['state'])}" />
        <input type="hidden" name="orderCity" value="{=gd_isset(gMemberInfo['city'])}" />
        <input type="hidden" name="orderAddress" value="{=gd_isset(gMemberInfo['address'])}" />
        <input type="hidden" name="orderAddressSub" value="{=gd_isset(gMemberInfo['addressSub'])}" />
        <!--{ ? !gGlobal.isFront }-->
        <input type="hidden" name="orderPhonePrefixCode" value="kr" />
        <input type="hidden" name="orderPhonePrefix" value="82" />
        <input type="hidden" name="orderCellPhonePrefixCode" value="kr" />
        <input type="hidden" name="orderCellPhonePrefix" value="82" />
        <input type="hidden" name="receiverCountryCode" value="kr" />
        <input type="hidden" name="receiverPhonePrefixCode" value="kr" />
        <input type="hidden" name="receiverPhonePrefix" value="82" />
        <input type="hidden" name="receiverCellPhonePrefixCode" value="kr" />
        <input type="hidden" name="receiverCellPhonePrefix" value="82" />
        <input type="hidden" name="receiverState" value="" />
        <input type="hidden" name="receiverCity" value="" />
        <!--{ / }-->
        <input type="hidden" name="chooseMileageCoupon" value="{chooseMileageCoupon}" />
        <input type="hidden" name="chooseCouponMemberUseType" value="{=couponConfig['chooseCouponMemberUseType']}" />
        <input type="hidden" name="totalCouponGoodsDcPrice" value="{totalCouponGoodsDcPrice}" />
        <input type="hidden" name="totalCouponGoodsMileage" value="{totalCouponGoodsMileage}" />
        <input type="hidden" name="totalMemberDcPrice" value="{=totalMemberDcPrice}" />
        <input type="hidden" name="totalMemberOverlapDcPrice" value="{=totalMemberOverlapDcPrice}" />
        <input type="hidden" name="deliveryFree" value="{deliveryFree}" />
        <input type="hidden" name="totalDeliveryFreePrice" value="" />
        <input type="hidden" name="cartGoodsCnt" value="{cartGoodsCnt}" />
        <input type="hidden" name="cartAddGoodsCnt" value="{cartAddGoodsCnt}" />
        <input type="hidden" name="productCouponChangeLimitType" value="{productCouponChangeLimitType}" />
        <input type="hidden" name="deliveryVisit" value="n" />
        <input type="hidden" name="returnUrl" value="{returnUrl}" />

        <div class="order_wrap">
            <div class="order_tit">
                <h2>{=__('주문서작성/결제')}</h2>
                <ol>
                    <li><span>01</span> {=__('장바구니')} <span><img src="../img/member/icon_join_step_off.png" alt="{=__('장바구니')}{=__('완료')}"></span></li>
                    <li class="page_on"><span>02</span> {=__('주문서작성/결제')}<span><img src="../img/member/icon_join_step_on.png" alt="{=__('주문서작성/결제')}{=__('진행 중')}"></span></li>
                    <li><span>03</span> {=__('주문완료')}</li>
                </ol>
            </div>
            <!-- //order_tit -->

            <div class="order_cont">

                <div class="cart_cont_list">
                    <div class="order_cart_tit">
                        <h3>{=__('주문상세내역')}</h3>
                    </div>
                    <!-- //order_cart_tit -->

                    <div class="order_table_type">
                        <!-- 장바구니 상품리스트 시작 -->
                        <table>
                            <colgroup>
                                <col>					<!-- 상품명/옵션 -->
                                <col style="width:5%">  <!-- 수량 -->
                                <col style="width:10%"> <!-- 상품금액 -->
                                <col style="width:13%"> <!-- 할인/적립 -->
                                <col style="width:10%"> <!-- 합계금액 -->
                                <col style="width:10%"> <!-- 배송비 -->
                            </colgroup>
                            <thead>
                            <tr>
                                <th>{=__('상품/옵션 정보')}</th>
                                <th>{=__('수량')}</th>
                                <th>{=__('상품금액')}</th>
                                <!--{ ? !gGlobal.isFront }-->
                                <th>{=__('할인/적립')}</th>
                                <!--{ / }-->
                                <th>{=__('합계금액')}</th>
                                <!--{ ? !gGlobal.isFront }-->
                                <th>{=__('배송비')}</th>
                                <!--{ / }-->
                            </tr>
                            </thead>
                            <tbody>


                            <!--{ @ cartInfo }-->
                            <!--{ @ .value_ }-->
                            <!--{ @ ..value_ }-->
                            <tr class="order-goods-layout" data-goodsNo="{=...goodsNo}">
                                <td class="td_left">
                                    <input type="hidden" name="cartSno[]" value="{...sno}" />
                                    <input type="hidden" name="memberDcInfo[{...goodsNo}][{...optionSno}]" value='{...memberDcInfo}' />
                                    <input type="hidden" name="priceInfo[{...goodsNo}][{...optionSno}]" value='{...priceInfo}' />
                                    <input type="hidden" name="mileageInfo[{...goodsNo}][{...optionSno}]" value='{...mileageInfo}' />
                                    <input type="hidden" class="delivery-method-fl" value='{...deliveryMethodFl}' />
                                    <input type="hidden" class="visit-address-use-fl" value='{...goodsDeliveryVisitAddressUseFl}' />
                                    <input type="hidden" class="delivery-method-visit-area" value='{...deliveryMethodVisitArea}' />
                                    <div class="pick_add_cont">
                                        <span class="pick_add_img">
                                            <a href="../goods/goods_view.php?goodsNo={=...goodsNo}">{=...goodsImage}</a>
                                        </span>
                                        <div class="pick_add_info">

                                            <!--{ ? ...orderPossible === 'n' }-->
                                            <strong class="chk_none">{=__('구매 불가')}: {=...orderPossibleMessage}</strong>
                                            <!--{ / }-->
                                            <!--{ ? ...duplicationGoods === 'y' }-->
                                            <strong class="chk_none">{=__('중복 상품')}</strong>
                                            <!--{ / }-->

                                            <em><a href="../goods/goods_view.php?goodsNo={=...goodsNo}">{=...goodsNm}</a></em>

                                            <!--{ ? ...payLimitFl =='y' && is_array(...payLimit) }-->
                                            <div class="icon_pick_list">
                                                <!--{ @ ...payLimit }-->
                                                <!--{ ?....value_ =='pg' }-->
                                                <div class="icon_pg_over">
                                                    <img src="../img/icon/order/icon_settle_kind_{....value_}.png">
                                                    <div class="icon_pg_cont"></div>
                                                </div>
                                                <!--{ : }-->
                                                <img src="../img/icon/order/icon_settle_kind_{....value_}.png">
                                                <!--{ / }-->
                                                <!--{ / }-->
                                            </div>
                                            <!--{ / }-->
                                            <!-- //icon_pick_list -->

                                            <div class="pick_option_box">
                                                <!--{ @ ...option }-->
                                                <!--{ ? ....optionName }-->
                                                <span class="text_type_cont">{=....optionName} : {=....optionValue} <!--{ ? ((....index_ + 1) == ....size_) && ....optionPrice != 0 && optionPriceFl == 'y' }--><strong>(<!--{ ? ....optionPrice > 0 }-->+<!--{ / }-->{=gd_global_currency_display(....optionPrice)})</strong><!--{ / }--><!--{ ? empty(....optionSellStr) === false }-->[{=....optionSellStr}]<!--{ / }--><!--{ ? ((....index_ + 1) == ....size_) }--><!--{ ? empty(....optionDeliveryStr) === false }-->[{=....optionDeliveryStr}]<!--{ / }--><!--{ / }--></span>
                                                <!--{ / }-->
                                                <!--{ / }-->
                                            </div>

                                            <div class="pick_option_box">
                                                <!--{ @ ...optionText }-->
                                                <!--{ ? ....optionValue }-->
                                                <span class="text_type_cont">{=....optionName} : {=....optionValue} <!--{ ? ....optionTextPrice != 0 && optionPriceFl == 'y' }--><strong>(<!--{ ? ....optionTextPrice > 0 }-->+<!--{ / }-->{=gd_global_currency_display(....optionTextPrice)})</strong><!--{ / }--></span>
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
                                                    <b>{=....addGoodsNm}</b> <br> {=__('수량')} : {=....addGoodsCnt}{=__('개')} (+{=gd_global_currency_display((....addGoodsPrice * ....addGoodsCnt))})
                                                    <!--<a href="#;"><img src="../img/icon/etc/icon_order_cart_del.png" alt="삭제"></a>-->
                                                    <!--{ ? gGlobal.isFront }-->
                                                    <p class="add_currency">{=gd_global_add_currency_display((....addGoodsPrice * ....addGoodsCnt))}</p>
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
                                    </div>
                                </td>
                                <td>
                                    <!--{ ? empty(...goodsPriceString) === false }-->
                                    <strong class="order_sum_txt">{=...goodsPriceString}</strong>
                                    <!--{ : }-->
                                    <strong class="order_sum_txt <!--{ ? ...timeSaleFl }-->time_sale_cost<!--{ : }-->price<!--{ / }-->">{=gd_global_currency_display((...price['goodsPriceSum'] + ...price['optionPriceSum'] + ...price['optionTextPriceSum']))}</strong>
                                    <!--{ ? gGlobal.isFront }-->
                                    <p class="add_currency">{=gd_global_add_currency_display((...price['goodsPriceSum'] + ...price['optionPriceSum'] + ...price['optionTextPriceSum']))}</p>
                                    <!--{ / }-->
                                    <!--{ / }-->
                                </td>
                                <!--{ ? !gGlobal.isFront }-->
                                <td class="td_benefit">
                                    <ul class="benefit_list">
                                        <!--{ ? (...price['goodsDcPrice'] + ...price['memberDcPrice'] + ...price['memberOverlapDcPrice'] + ...price['couponGoodsDcPrice']) > 0 }-->
                                        <li class="benefit_sale">
                                            <em>{=__('할인')}</em>
                                            <!--{ ? ...price['goodsDcPrice'] > 0 }-->
                                            <span>{=__('상품')} <strong>-{=gd_global_currency_display(...price['goodsDcPrice'])}</strong></span>
                                            <!--{ / }-->
                                            <!--{ ? (...price['memberDcPrice'] + ...price['memberOverlapDcPrice']) > 0 }-->
                                            <span>{=__('회원')} <strong>-{=gd_global_currency_display(...price['memberDcPrice'] + ...price['memberOverlapDcPrice'])}</strong></span>
                                            <!--{ / }-->
                                            <!--{ ? ...price['couponGoodsDcPrice'] > 0 }-->
                                            <span>{=__('쿠폰')} <strong>-{=gd_global_currency_display(...price['couponGoodsDcPrice'])}</strong></span>
                                            <!--{ / }-->
                                        </li>
                                        <!--{ / }-->
                                        <!--{ ? mileage['useFl'] === 'y' && (...mileage['goodsMileage'] + ...mileage['memberMileage'] + ...mileage.couponGoodsMileage) > 0 }-->
                                        <li class="benefit_mileage js_mileage">
                                            <em>{=__('적립')}</em>
                                            <!--{ ? ...mileage['goodsMileage'] > 0 }-->
                                            <span>{=__('상품')} <strong>+{=gd_global_money_format(...mileage['goodsMileage'])}{=mileage.unit}</strong></span>
                                            <!--{ / }-->
                                            <!--{ ? ...mileage['memberMileage'] > 0 }-->
                                            <span>{=__('회원')} <strong>+{=gd_global_money_format(...mileage['memberMileage'])}{=mileage.unit}</strong></span>
                                            <!--{ / }-->
                                            <!--{ ? ...mileage.couponGoodsMileage > 0 }-->
                                            <span>{=__('쿠폰')} <strong>+{=gd_global_money_format(...mileage.couponGoodsMileage)}{=mileage.unit}</strong></span>
                                            <!--{ / }-->
                                        </li>
                                        <!--{ / }-->
                                    </ul>
                                </td>
                                <!--{ / }-->
                                <td>
                                    <strong class="order_sum_txt">{=gd_global_currency_display(...price['goodsPriceSubtotal'])}</strong>
                                    <!--{ ? gGlobal.isFront }-->
                                    <p class="add_currency">{=gd_global_add_currency_display(...price['goodsPriceSubtotal'])}</p>
                                    <!--{ / }-->
                                </td>
                                <!--{ ? !gGlobal.isFront }-->
                                <!--{ ? ...goodsDeliveryFl === 'y' }-->
                                <!--{ ? ...index_ == '0' }-->
                                <td class="td_delivery" rowspan="{=setDeliveryInfo[..key_]['goodsLineCnt']}">
                                    {=setDeliveryInfo[..key_]['goodsDeliveryMethod']}<br/>
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
                                    {=setDeliveryInfo[..key_][...goodsNo]['goodsDeliveryMethod']}<br/>
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
                                    <br/>
                                    ({setDeliveryInfo[..key_][...goodsNo]['goodsDeliveryMethodFlText']}-<!--{ ? setDeliveryInfo[..key_][...goodsNo]['goodsDeliveryCollectFl'] === 'later' && empty(setDeliveryInfo[..key_][...goodsNo]['goodsDeliveryCollectPrice']) === false }-->{=__('착불')}<!--{ : }-->{=__('선결제')}<!--{ / }-->)
                                    <!--{ / }-->
                                </td>
                                <!--{ / }-->
                                <!--{ : }-->
                                <td class="td_delivery">
                                    {=...goodsDeliveryMethod}<br/>
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
                            <!--{ / }-->

                            <!--{ ? empty(cartCnt) === true }-->
                            <tr>
                                <td colspan="6">
                                    <p class="no_data">{=__('장바구니에 담겨있는 상품이 없습니다.')}</p>
                                </td>
                            </tr>
                            <!--{ / }-->

                            </tbody>
                        </table>
                        <!-- 장바구니 상품리스트 끝 -->
                    </div>

                </div>
                <!-- //cart_cont_list -->

                <div class="btn_left_box">
                    <a href="./cart.php" class="shop_go_link"><em>&lt; {=__('장바구니 가기')}</em></a>
                </div>

                <div class="price_sum">
                    <div class="price_sum_cont">
                        <div class="price_sum_list">
                            <dl>
                                <dt>{=__('총 %s 개의 상품금액 %s', '<strong>' + cartCnt + '</strong>', '')}</dt>
                                <dd>{=gd_global_currency_symbol()}<strong>{=gd_global_money_format(totalGoodsPrice)}</strong>{=gd_global_currency_string()}</dd>
                            </dl>
                            <!--{ ? totalGoodsDcPrice > 0 }-->
                            <span><img src="../img/order/order_price_minus.png" alt="{=__('빼기')}" /></span>
                            <dl>
                                <dt>{=__('상품할인')}</dt>
                                <dd>{=gd_global_currency_symbol()}<strong>{=gd_global_money_format(totalGoodsDcPrice)}</strong>{=gd_global_currency_string()}</dd>
                            </dl>
                            <!--{ / }-->
                            <!--{ ? totalSumMemberDcPrice > 0 }-->
                            <span><img src="../img/order/order_price_minus.png" alt="{=__('빼기')}" /></span>
                            <dl>
                                <dt>{=__('회원할인')}</dt>
                                <dd>{=gd_global_currency_symbol()}<strong>{=gd_global_money_format(totalSumMemberDcPrice)}</strong>{=gd_global_currency_string()}</dd>
                            </dl>
                            <!--{ / }-->
                            <!--{ ? totalCouponGoodsDcPrice > 0 }-->
                            <span><img src="../img/order/order_price_minus.png" alt="{=__('빼기')}" /></span>
                            <dl>
                                <dt>{=__('쿠폰할인')}</dt>
                                <dd>{=gd_global_currency_symbol()}<strong>{=gd_global_money_format(totalCouponGoodsDcPrice)}</strong>{=gd_global_currency_string()}</dd>
                            </dl>
                            <!--{ / }-->
                            <!--{ ? totalMyappDcPrice > 0 }-->
                            <span><img src="../img/order/order_price_minus.png" alt="{=__('빼기')}" /></span>
                            <dl>
                                <dt>{=__('모바일앱')}</dt>
                                <dd>{=gd_global_currency_symbol()}<strong>{=gd_global_money_format(totalMyappDcPrice)}</strong>{=gd_global_currency_string()}</dd>
                            </dl>
                            <!--{ / }-->
                            <!--{ ? !gGlobal.isFront }-->
                            <span><img src="../img/order/order_price_plus.png" alt="{=__('더하기')}" /></span>
                            <dl>
                                <dt>{=__('배송비')}</dt>
                                <dd>{=gd_global_currency_symbol()}<strong>{=gd_global_money_format(totalDeliveryCharge)}</strong>{=gd_global_currency_string()}</dd>
                            </dl>
                            <!--{ / }-->
                            <span><img src="../img/order/order_price_total.png" alt="{=__('합계')}" /></span>
                            <dl class="price_total">
                                <dt>{=__('합계')}</dt>
                                <dd>{=gd_global_currency_symbol()}<strong>{=gd_global_money_format(totalSettlePrice)}</strong>{=gd_global_currency_string()}
                                    <!--{ ? gGlobal.isFront }-->
                                    <div class="add_currency">{=gd_global_add_currency_display(totalSettlePrice)}</div>
                                    <!--{ / }-->
                                </dd>
                            </dl>
                        </div>
                        <!--{ ? gd_is_login() === true && mileage['useFl'] == 'y' }-->
                        <em class="tobe_mileage js_mileage">{=__('적립예정')} {=mileage.name} : <span>{=gd_global_money_format(totalMileage)}</span> {=mileage.unit}</em>
                        <!--{ / }-->
                    </div>
                    <!-- //price_sum_cont -->
                </div>
                <!-- //price_sum -->

                <!-- 주문 간단 가입 시작 -->
                {=includeWidget('order/_simple_join.html')}
                <!-- 주문 간단 가입 끝 -->

                <!--{ ? giftConf.giftFl == 'y' && count(giftInfo) }-->
                <div class="order_freebie">
                    <div class="order_zone_tit">
                        <h4>{=__('사은품 선택')}<span>{=__('함께 받으실 사은품을 선택해주세요.')}</span></h4>
                    </div>
                    <div class="order_freebie_list">
                        <!--{ @ giftInfo }-->
                        <dl>
                            <!--{ @ .gift }-->
                            <!--{ ? ..total > 0 }-->
                            <dt>{giftInfo.title}<span>(<strong><!--{ ? ..selectCnt == 0 }-->{.total}<!--{ : }-->0<!--{ / }--></strong>/<!--{ ? ..selectCnt == 0 }-->{.total}<!--{ : }-->{..selectCnt}<!--{ / }-->)</span></dt>
                            <dd>
                                <div class="form_element">
                                    <ul>
                                        <!--{ @ ..multiGiftNo }-->
                                        <li>
                                            <input type="hidden" name="gift[{.key_}][{...index_}][goodsNo]" value="{.goodsNo}" />
                                            <input type="hidden" name="gift[{.key_}][{...index_}][scmNo]" value="{...scmNo}" />
                                            <input type="hidden" name="gift[{.key_}][{...index_}][selectCnt]" value="{..selectCnt}" class="gift_select_cnt" />
                                            <input type="hidden" name="gift[{.key_}][{...index_}][giveCnt]" value="{..giveCnt}" />
                                            <input type="hidden" name="gift[{.key_}][{...index_}][minusStockFl]" value="{...stockFl}" />
                                            <input type="checkbox" id="line{.key_}_gift{...index_}" name="gift[{.key_}][{...index_}][giftNo]" value="{...giftNo}" <!--{ ? ..selectCnt == 0 }--> checked="checked" readonly="readonly"<!--{ / }--> />
                                            <label for="line{.key_}_gift{...index_}" class="check_s <!--{ ? ..selectCnt == 0 }--> on<!--{ / }-->">
                                                <b>{...imageUrl}</b>
                                                <em>{...giftNm} <span>({=__('%s개', ..giveCnt)})</span></em>
                                                <span class="icon_freebie_check"><!-- 선택한경우 활성 --></span>
                                            </label>
                                        </li>
                                        <!--{ / }-->
                                    </ul>
                                </div>
                            </dd>
                            <!--{ / }-->
                            <!--{ / }-->
                        </dl>
                        <!--{ / }-->
                    </div>
                    <!-- //order_freebie_list -->
                </div>
                <!-- //order_freebie -->
                <!--{ / }-->

                <div class="order_view_info">
                    <!--{ ? gd_is_login() === false }-->
                    <!--{ ? gGlobal.isFront === false && guestUnder14Fl == 'y' }-->
                    <div class="join_agreement_box" style="margin-top:50px;">
                        <div class="form_element" id="termAgreeDiv">
                            <input type="checkbox" id="termAgree" name="termAgreeUnder14" class="require"/>
                            <label class="check" for="termAgree"> <h3 style="margin-left:10px;"><strong class="text_warning">(필수)</strong> 만 14세 이상입니다.</h3></label>
                        </div>
                    </div>
                    <!--{ / }-->
                    <!--{ ? hasScmGoods === false }-->
                    <div class="join_agreement_box" style="margin-top:30px;">
                        <div class="form_element">
                            <input type="checkbox" id="allAgree"/>
                            <label class="check" for="allAgree"> <h3 style="margin-left:10px;">{=__('%s 의 모든 약관을 확인 하고 전체 동의 합니다. (전체 동의에 선택항목도 포함됩니다.)', serviceInfo['mallNm'])}</h3></label>
                        </div>
                    </div>
                    <!--{ : }-->
                    <div class="join_agreement_box" style="margin-top:30px;">
                        <div class="form_element">
                            <input type="checkbox" id="allAgreeScm"/>
                            <label class="check" for="allAgreeScm"> <h3 style="margin-left:10px;">{=__('%s 의 모든 약관을 확인 하고 전체 동의 합니다. (전체 동의에 선택항목도 포함됩니다.)', serviceInfo['mallNm'])}</h3></label>
                        </div>
                    </div>
                    <!--{ / }-->

                    <div class="order_agree" style="margin-top:10px;">
                        <div class="order_zone_tit">
                            <h4>{=__('비회원 주문에 대한 개인정보 수집 이용 동의')}</h4>
                        </div>
                        <div class="order_agree_cont">
                            <div class="join_agreement_box">
                                <div class="agreement_box">
                                    {=nl2br(privateGuestOffer['content'])}
                                </div>
                                <!-- //agreement_box -->
                                <div class="form_element">
                                    <input type="checkbox" id="termAgree_guest" name="termAgreeGuest" class="require"/>
                                    <label for="termAgree_guest" class="check_s"><strong>({=__('필수')})</strong> {=__('비회원 개인정보 수집 이용에 대한 내용을 확인 하였으며 이에 동의 합니다.')}</label>
                                </div>
                            </div>
                        </div>
                        <!-- //order_agree_cont -->
                    </div>
                    <!-- //order_agree -->
                    <div class="order_agree">
                        <div class="order_zone_tit">
                            <h4>{=__('이용약관 동의')}</h4>
                        </div>
                        <div class="order_agree_cont">
                            <div class="join_agreement_box">
                                <div class="agreement_box">
                                    {=nl2br(agreementInfo['content'])}
                                </div>
                                <!-- //agreement_box -->
                                <div class="form_element">
                                    <input type="checkbox" id="termAgree_agreement" name="termAgreeAgreement" class="require"/>
                                    <label for="termAgree_agreement" class="check_s"><strong>({=__('필수')})</strong> {=__('이용약관에 대한 내용을 확인 하였으며 이에 동의 합니다.')}</label>
                                </div>
                            </div>
                        </div>
                        <!-- //order_agree_cont -->
                    </div>
                    <!-- //order_agree -->
                    <!--{ / }-->

                    <!--{ ? hasScmGoods }-->
                    <div class="order_agree">
                        <div class="order_zone_tit">
                            <h4>{=__('상품 공급사 개인정보 제공 동의')}</h4>
                        </div>
                        <div class="order_agree_cont">
                            <div class="join_agreement_box">
                                <div class="agreement_box">
                                    {=nl2br(privateProvider['content'])}
                                </div>
                                <!-- //agreement_box -->
                                <div class="form_element">
                                    <input type="checkbox" id="termAgree_privateProvider" name="termAgreePrivateProvider" class="require"/>
                                    <label for="termAgree_privateProvider" class="check_s"><strong>({=__('필수')})</strong> {=__('상품 공급사 개인정보 제공 동의에 대한 내용을 확인 하였으며 이에 동의 합니다.')}</label>
                                </div>
                            </div>
                        </div>
                        <!-- //order_agree_cont -->
                    </div>
                    <!-- //order_agree -->
                    <!--{ / }-->
                    <!--{ ? gd_is_login() === false && privateMarketingFl }-->
                    <div class="order_agree">
                        <div class="order_zone_tit">
                            <h4>{=privateMarketing['informNm']}</h4>
                        </div>
                        <div class="order_agree_cont">
                            <div class="join_agreement_box">
                                <div class="agreement_box">
                                    {=nl2br(privateMarketing['content'])}
                                </div>
                                <!-- //agreement_box -->
                                <div class="form_element">
                                    <input type="checkbox" id="termAgree_privateMarketing" name="termAgreePrivateMarketing"/>
                                    <label for="termAgree_privateMarketing" class="check_s"><strong>({=__('선택')})</strong> {=privateMarketing['informNm']}에 대한 내용을 확인 하였으며 이에 동의 합니다.</label>
                                </div>
                            </div>
                        </div>
                        <!-- //order_agree_cont -->
                    </div>
                    <!--{ / }-->

                    <div class="order_info">
                        <div class="order_zone_tit">
                            <h4>{=__('주문자 정보')}</h4>
                        </div>

                        <div class="order_table_type">
                            <table class="table_left">
                                <colgroup>
                                    <col style="width:15%;">
                                    <col style="width:85%;">
                                </colgroup>
                                <tbody>
                                <tr>
                                    <th scope="row"><span class="important">{=__('주문하시는 분')}</span></th>
                                    <td><input type="text" name="orderName" id="orderName" value="{? memberSessionName }{=memberSessionName}{ : }{=orderName}{ / }" data-pattern="{? gGlobal['isFront']}gdMemberNmGlobal{:}gdEngKor{/}" maxlength="20"/>
                                        <!--{ ? gGlobal.isFront === false && gd_is_login() === false && guestUnder14Fl == 's' }-->
                                        <!--{ ? gd_isset(memberSessionName) || gd_isset(memberSessionPhone) }-->
                                        <strong class="text_warning cert_ok">본인인증이 완료되었습니다.</strong>
                                        <!--{ : }-->
                                        <!--{ ? ipinFl === true || authCellphoneFl === true }-->
                                        <button type="button" class="btn_cert" id="btn_cert">본인인증</button>
                                        <strong class="text_warning" id="cert_txt">비회원으로 구매를 원하시면, 본인인증이 필요합니다.</strong>
                                        <!--{ / }-->
                                        <!--{ / }-->
                                            <!--{ ? ipinFl === true && authCellphoneFl === true }-->
                                            <div class="pop_cert_ly">
                                                <div class="wrap">
                                                    <strong>본인 인증방법 선택</strong>
                                                    <span class="btn_close"><img src="../img/common/layer/btn_layer_close.png" alt="{=__('닫기')}"></span>
                                                    <div class="btn_wrap">
                                                        <a href="javascript:authCellIpin()" class="btn_ly_ok">아이핀 본인 인증</a>
                                                        <a href="javascript:authCellPhone()" class="btn_ly_ok">휴대폰 본인인증</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--{ / }-->
                                        <!--{ / }-->
                                    </td>
                                </tr>
                                <!--{ ? isset(gMemberInfo['address']) === true && empty(gMemberInfo['address']) === false }-->
                                <tr>
                                    <th scope="row">{=__('주소')}</th>
                                    <td><!--{ ? empty(gMemberInfo['zonecode']) === false }-->
                                        [{=gd_isset(gMemberInfo['zonecode'])}]
                                        <!--{ / }-->
                                        {=gd_isset(gMemberInfo['address'])} {=gd_isset(gMemberInfo['addressSub'])}</td>
                                </tr>
                                <!--{ / }-->
                                <tr>
                                    <th scope="row">{=__('전화번호')}</th>
                                    <td>
                                        <!--{ ? gGlobal.isFront }-->
                                        {=gd_select_box('orderPhonePrefixCode', 'orderPhonePrefixCode', orderCountryPhone, null, gMemberInfo.phoneCountryCode, __('국가코드'), null, 'chosen-select')}
                                        <!--{ / }-->
                                        <input type="text" id="phoneNum" name="orderPhone" value="{=gd_isset(gMemberInfo['phone'])}" maxlength="20" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><span class="important">{=__('휴대폰 번호')}</span></th>
                                    <td>
                                        <!--{ ? gGlobal.isFront }-->
                                        {=gd_select_box('orderCellPhonePrefixCode', 'orderCellPhonePrefixCode', orderCountryPhone, null, gMemberInfo['cellPhoneCountryCode'], __('국가코드'), null, 'tune select-small')}
                                        <!--{ / }-->
                                        <input type="text" id="mobileNum" name="orderCellPhone" value="{? memberSessionPhone }{=memberSessionPhone}{ : }{=gd_isset(gMemberInfo['cellPhone'])}{ / }" maxlength="20" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><span class="important">{=__('이메일')}</span></th>
                                    <td class="member_email">
                                        <input type="text" name="orderEmail" value="{=gd_isset(gMemberInfo['email'])}" />

                                        <select id="emailDomain" class="chosen-select">
                                            <!--{ @ emailDomain }-->
                                            <option value="{=.key_}">{=.value_}</option>
                                            <!--{ / }-->
                                        </select>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- //order_info -->

                    <div class="delivery_info">
                        <div class="order_zone_tit">
                            <h4>{=__('배송정보')}</h4>
                            <!--{ ? isUseMultiShipping === true }-->
                            <span class="form_element" style="float:right; margin-bottom:5px;">
                                <input type="checkbox" id="multiShippingFl" name="multiShippingFl" value="y"/>
                                <label class="check-s" for="multiShippingFl">{=__('복수 배송지 이용')}</label>
                            </span>
                            <!--{ / }-->
                        </div>

                        <div class="order_table_type shipping_info">
                            <table class="table_left shipping_info_table">
                                <colgroup>
                                    <col style="width:15%;">
                                    <col style="width:85%;">
                                </colgroup>
                                <tbody>
                                <tr>
                                    <th scope="row">{=__('배송지 확인')}</th>
                                    <td>
                                        <div class="form_element">
                                            <ul>
                                                <!--{ ? gd_is_login() === true }-->
                                                <li>
                                                    <input type="radio" name="shipping" id="shippingBasic"/>
                                                    <label for="shippingBasic" class="choice_s">{=__('기본 배송지')}</label>
                                                </li>
                                                <li>
                                                    <input type="radio" name="shipping" id="shippingRecently"/>
                                                    <label for="shippingRecently" class="choice_s">{=__('최근 배송지')}</label>
                                                </li>
                                                <!--{ / }-->
                                                <li>
                                                    <input type="radio" name="shipping" id="shippingNew"/>
                                                    <label for="shippingNew" class="choice_s">{=__('직접 입력')}</label>
                                                </li>
                                                <li>
                                                    <input type="radio" name="shipping" id="shippingSameCheck"/>
                                                    <label for="shippingSameCheck" class="choice_s">{=__('주문자정보와 동일')}</label>
                                                </li>
                                            </ul>
                                            <!--{ ? gd_is_login() === true }-->
                                            <span class="btn_gray_list"><a href="#myShippingListLayer" class="btn_gray_small btn_open_layer js_shipping"><span>{=__('배송지 관리')}</span></a></span>
                                            <!--{ / }-->
                                            <input type="hidden" class="shipping-delivery-visit" value="n" />
                                        </div>
                                        <!--{ ? isUseMultiShipping === true }-->
                                        <span class="btn_gray_list"><a class="btn_gray_small shipping_add_btn dn" style="float:right; cursor:pointer;"><span>+ {=__('추가')}</span></a></span>
                                        <!--{ / }-->
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><span class="important">{=__('받으실분')}</span></th>
                                    <td><input type="text" name="receiverName" data-pattern="{? gGlobal['isFront']}gdMemberNmGlobal{:}gdEngKor{/}" maxlength="20"/></td>
                                </tr>
                                <!--{ ? gGlobal.isFront }-->
                                <tr>
                                    <th scope="row"><span class="important">{=__('국가')}</span></th>
                                    <td>{=gd_select_box('receiverCountryCode', 'receiverCountryCode', countryAddress, null, recommendCountryCode, __('=선택해주세요='), null, 'chosen-select')}</td>
                                </tr>
                                <tr>
                                    <th scope="row"><span class="important">{=__('도시')}</span></th>
                                    <td><input type="text" name="receiverCity" maxlength="20"/></td>
                                </tr>
                                <tr>
                                    <th scope="row"><span class="important">{=__('주/지방/지역')}</span></th>
                                    <td><input type="text" name="receiverState" maxlength="20"/></td>
                                </tr>
                                <tr>
                                    <th scope="row"><span class="important">{=__('주소1')}</span></th>
                                    <td><input type="text" name="receiverAddress"/></td>
                                </tr>
                                <tr>
                                    <th scope="row"><span class="important">{=__('주소2')}</span></th>
                                    <td><input type="text" name="receiverAddressSub"/></td>
                                </tr>
                                <tr>
                                    <th scope="row"><span class="important">{=__('우편번호')}</span></th>
                                    <td>
                                        <input type="text" name="receiverZonecode"/>
                                        <input type="hidden" name="receiverZipcode"/>
                                    </td>
                                </tr>
                                <!--{ : }-->
                                <tr>
                                    <th scope="row"><span class="important">{=__('받으실 곳')}</span></th>
                                    <td class="member_address">
                                        <div class="address_postcode">
                                            <input type="text" name="receiverZonecode" readonly="readonly" />
                                            <input type="hidden" name="receiverZipcode"/>
                                            <button type="button" class="btn_post_search" onclick="gd_postcode_search('receiverZonecode', 'receiverAddress', 'receiverZipcode');">{=__('우편번호검색')}</button>
                                        </div>
                                        <div class="address_input">
                                            <input type="text" name="receiverAddress" readonly="readonly"/>
                                            <input type="text" name="receiverAddressSub" />
                                        </div>
                                    </td>
                                </tr>
                                <!--{ / }-->
                                <tr>
                                    <th scope="row">{=__('전화번호')}</th>
                                    <td>
                                        <!--{ ? gGlobal.isFront }-->
                                        {=gd_select_box('receiverPhonePrefixCode', 'receiverPhonePrefixCode', countryPhone, null, null, __('국가코드'), null, 'chosen-select')}
                                        <!--{ / }-->
                                        <input type="text" id="receiverPhone" name="receiverPhone" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><span class="important">{=__('휴대폰 번호')}</span></th>
                                    <td>
                                        <!--{ ? gGlobal.isFront }-->
                                        {=gd_select_box('receiverCellPhonePrefixCode', 'receiverCellPhonePrefixCode', countryPhone, null, null, __('국가코드'), null, 'chosen-select')}
                                        <!--{ / }-->
                                        <input type="text" id="receiverCellPhone" name="receiverCellPhone"/>
                                        <!--{ ? gGlobal.isFront == false && useSafeNumberFl == 'y' }-->
                                        <span class="form_element td_chk">
                                            <input type="checkbox" id="receiverUseSafeNumberFl" name="receiverUseSafeNumberFl" value="w" checked="checked"/>
                                            <label for="receiverUseSafeNumberFl" class="check_s on"><em>{=__('안심번호 사용')}</em></label>
                                        </span>
                                        <div>{=__('안심번호 사용 체크 시 1회 성으로 가상의 번호인 안심번호(050*-0000-0000)를 부여합니다. 안심번호는 일정 기간이 지나면 자동으로 해지됩니다.')}</div>
                                        <!--{ / }-->
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">{=__('남기실 말씀')}</th>
                                    <td class="td_last_say"><input type="text" name="orderMemo"/></td>
                                </tr>
                                <!--{ ? gd_is_login() === true && !gGlobal.isFront }-->
                                <tr id="memberinfoApplyTr">
                                    <th scope="row">{=__('회원정보 반영')}</th>
                                    <td>
                                        <div class="form_element">
                                            <div id="memberinfoApplyTr1" class="member_info_delivery">
                                                <input type="checkbox" id="reflectApplyDelivery" name="reflectApplyDelivery" value="y" />
                                                <label for="reflectApplyDelivery" class="check_s"><em>{=__('나의 배송지에 추가합니다.')}</em></label>
                                            </div>
                                            <!--{ ? reflectApplyMemberUseFl }-->
                                            <div id="memberinfoApplyTr2" class="member_info_apply">
                                                <input type="checkbox" id="reflectApplyMember" name="reflectApplyMember" value="y"/>
                                                <label for="reflectApplyMember" class="check_s">{=__('위 내용을 회원정보에 반영합니다.')} <span>({=__('주소/전화번호/휴대폰번호')})</span></label>
                                            </div>
                                            <!--{ / }-->
                                        </div>
                                    </td>
                                </tr>
                                <!--{ / }-->
                                <tr class="orderVisitTr dn">
                                    <th scope="row">{=__('방문수령 정보')}</th>
                                    <td>
                                        <div class="table1">
                                            <table>
                                                <colgroup>
                                                    <col style="width:150px;">
                                                    <col>
                                                </colgroup>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">{=__('방문 수령지 주소')}</th>
                                                    <td>
                                                        <span class="delivery-method-visit-area-txt"></span>
                                                        <input type="hidden" name="visitAddress" value=""/>

                                                        <!--{ ? isUseMultiShipping === true }-->
                                                        <span class="btn_gray_list"><a class="btn_gray_small shipping-visit-add-btn dn" style="float:right; cursor:pointer;"><span>+ {=__('추가')}</span></a></span>
                                                        <!--{ / }-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><span class="important">{=__('방문자 정보')}</span></th>
                                                    <td>
                                                        방문자명 <input type="text" name="visitName" value="" class="text"/> 방문자연락처 <input type="text" name="visitPhone" value="" class="text"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">{=__('메모')}</th>
                                                    <td class="td_last_say">
                                                        <input type="text" name="visitMemo" maxlength="250"/>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                <!--{ ? isUseMultiShipping === true }-->
                                <tr class="select_goods_tr dn">
                                    <th scope="row">{=__('배송 상품')}</th>
                                    <td>
                                        <input type="hidden" name="selectGoods[0]" value=""/>
                                        <input type="hidden" name="multiDelivery[0]" value="0"/>
                                        <span class="btn_gray_list"><a href="#cartSelectGoods" class="btn_gray_small shipping_goods_select btn_open_layer" style="margin-bottom:5px;"><span>+ {=__('상품 선택')}</span></a></span>
                                        <div class="table1 type1 select_goods order_goods dn">
                                            <table class="check"></table>
                                        </div>
                                    </td>
                                </tr>
                                <!--{ / }-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- //delivery_info -->

                    <!--{ ? addFieldInfo.addFieldConf == 'y' }-->
                    <input type="hidden" name="addFieldConf" value="{=addFieldInfo.addFieldConf}" />
                    <div class="addition_info">
                        <div class="order_zone_tit">
                            <h4>{=__('추가 정보')}</h4>
                        </div>

                        <div class="order_table_type">
                            <table class="table_left">
                                <colgroup>
                                    <col style="width:15%;">
                                    <col style="width:85%;">
                                </colgroup>
                                <tbody>
                                <!--{ @ addFieldInfo.data }-->
                                <tr>
                                    <th>{=gd_isset(.orderAddFieldName)}</th>
                                </tr>
                                <tr>
                                    <td>{=gd_isset(.orderAddFieldHtml)}</td>
                                </tr>
                                <!--{ / }-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--{ / }-->
                    <!-- //addition_info -->

                    <div class="payment_info">
                        <div class="order_zone_tit">
                            <h4>{=__('결제정보')}</h4>
                        </div>

                        <div class="order_table_type">
                            <table class="table_left">
                                <colgroup>
                                    <col style="width:15%;">
                                    <col style="width:85%;">
                                </colgroup>
                                <tbody>
                                <tr>
                                    <th scope="row">Item total price</th>
                                    <td>
                                        <strong id="totalGoodsPrice" class="order_payment_sum">{=gd_global_currency_display(totalGoodsPrice)}</strong>
                                        <!--{ ? gGlobal.isFront }-->
                                        <span class="add_currency">{=gd_global_add_currency_display(totalGoodsPrice)}</span>
                                        <!--{ / }-->
                                    </td>
                                </tr>
                                <!--{ ? gGlobal.isFront }-->
                                <tr>
                                    <th scope="row">{=__('총 무게')}</th>
                                    <td>
                                        <p>
                                            <strong>{=number_format(totalDeliveryWeight.total, 2)}kg</strong>
                                            <span>( {=__('상품무게 %s kg + 박스무게 %s kg', number_format(totalDeliveryWeight.goods, 2), number_format(totalDeliveryWeight.box, 2))} )</span>
                                        </p>
                                    </td>
                                </tr>
                                <!--{ / }-->
                                <tr>
                                    <th scope="row">Shipping fee</th>
                                    <td>
                                        Buyer Charge
                                    </td>
                                </tr>
                                <tr id="rowDeliveryInsuranceFee" class="dn">
                                    <th scope="row">{=__('해외배송 보험료')}</th>
                                    <td>
                                        {=gd_global_currency_symbol()}<span id="deliveryInsuranceFee">0</span>{=gd_global_currency_string()}
                                        <!--{ ? gGlobal.isFront && gGlobal.useAddCurrency }-->
                                        {=gd_global_add_currency_symbol()}<span id="deliveryInsuranceFeeAdd" class="add_currency">0</span>{=gd_global_add_currency_string()}
                                        <!--{ / }-->
                                        <input type="hidden" name="deliveryInsuranceFee" value="0"/>
                                    </td>
                                </tr>
                                <tr id="rowDeliverAreaCharge" class="dn">
                                    <th scope="row">{=__('지역별 배송비')}</th>
                                    <td>
                                        {=gd_global_currency_symbol()}<span id="deliveryAreaCharge">0</span>{=gd_global_currency_string()}
                                        <input type="hidden" name="totalDeliveryCharge" value="{totalDeliveryCharge}"/>
                                        <input type="hidden" name="deliveryAreaCharge" value="0"/>
                                    </td>
                                </tr>
                                <tr style="display: none;">
                                    <th scope="row">{=__('할인 및 적립')}</th>
                                    <td>
                                        <ul class="order_benefit_list">
                                            <li class="order_benefit_sale">
                                                <em id="saleDefault">
                                                    {=__('할인')} : <strong>(-) {=gd_global_currency_symbol()}<b class="total-member-dc-price">{=gd_global_money_format(totalGoodsDcPrice + totalSumMemberDcPrice + totalCouponGoodsDcPrice + totalMyappDcPrice)}</b>{=gd_global_currency_string()}</strong>
                                                    <span>(
                                                    {=__('상품')} {=gd_global_currency_symbol()}{=gd_global_money_format(totalGoodsDcPrice)}{=gd_global_currency_string()}
                                                        <!--{ ? !gGlobal.isFront }-->
                                                    , {=__('회원')} {=gd_global_currency_symbol()}<span class="member-dc-price">{=gd_global_money_format(totalSumMemberDcPrice)}{=gd_global_currency_string()}</span>
                                                    , {=__('쿠폰')} {=gd_global_currency_symbol()}<span class="goods-coupon-dc-price">{=gd_global_money_format(totalCouponGoodsDcPrice)}</span>{=gd_global_currency_string()}
                                                        <!--{ / }-->
                                                        <!--{ ? totalMyappDcPrice > 0 }-->
                                                        ,{=__('모바일앱')} <span class="goods-myapp-dc-price">{=gd_global_currency_display(totalMyappDcPrice)}</span>
                                                        <!--{ / }-->
                                                    )</span>
                                                    <!--{ ? gGlobal.isFront && gGlobal.useAddCurrency }-->
                                                    <!--{ ? (totalGoodsDcPrice + totalSumMemberDcPrice + totalCouponGoodsDcPrice) != 0 }-->{=gd_global_add_currency_symbol()}<!--{ / }--><span class="total-member-dc-price-add" style="color: #717171;">{=gd_global_add_money_format(totalGoodsDcPrice + totalSumMemberDcPrice + totalCouponGoodsDcPrice + totalMyappDcPrice)}</span>{=gd_global_add_currency_string()}
                                                    <!--{ / }-->
                                                </em>
                                                <em id="saleWithoutMember" class="dn">
                                                    {=__('할인')} : <strong>(-) {=gd_global_currency_symbol()}<b class="total-member-dc-price-without-member">{=gd_global_money_format(totalGoodsDcPrice + totalCouponGoodsDcPrice + totalMyappDcPrice)}</b>{=gd_global_currency_string()}</strong>
                                                    <span>(
                                                    {=__('상품')} {=gd_global_currency_display(totalGoodsDcPrice)}
                                                        <!--{ ? !gGlobal.isFront }-->
                                                    , {=__('회원')} {=gd_global_currency_display(0)}
                                                    , {=__('쿠폰')} <span class="goods-coupon-dc-price-without-member">{=gd_global_money_format(totalCouponGoodsDcPrice)}</span>{=gd_global_currency_string()}</span>
                                                        <!--{ / }-->
                                                    <!--{ ? totalMyappDcPrice > 0 }-->,
                                                    {=__('모바일앱')} <span class="goods-myapp-dc-price">{=gd_global_currency_display(totalMyappDcPrice)}</span><!--{ / }-->
                                                    )</span>
                                                </em>
                                            </li>
                                            <!--{ ? gd_is_login() === true }-->
                                            <!--{ ? deliveryFree == 'y' && totalDeliveryCharge > 0 }-->
                                            <li class="sale">
                                                {=__('배송비 할인')} : <strong>(-) {=gd_global_currency_symbol()}<b class="delivery-free">0</b>{=gd_global_currency_string()}</strong> <span>({=__('회원등급 배송할인')})</span>
                                            </li>
                                            <!--{ / }-->
                                            <!--{ ? mileage.useFl === 'y' }-->
                                            <li class="order_benefit_mileage js_mileage">
                                                <em id="mileageDefault">
                                                    {=__('적립')} {=mileage.name} : <strong>(+) <b class="total-member-mileage">{=gd_global_money_format(totalMileage)}</b>{=mileage.unit}</strong>
                                                    <span>
                                                        (
                                                        {=__('상품')} <span class="goods-mileage">{=gd_global_money_format(totalGoodsMileage)}</span>{=mileage.unit},
                                                        {=__('회원')} <span class="member-mileage">{=gd_global_money_format(totalMemberMileage)}</span>{=mileage.unit},
                                                        {=__('쿠폰')} <span class="goods-coupon-add-mileage">{=gd_global_money_format(totalCouponGoodsMileage)}</span>{=mileage.unit}
                                                        )
                                                    </span>
                                                </em>
                                                <em id="mileageWithoutMember" class="js_mileage dn">
                                                    {=__('적립')} {=mileage.name} : <strong>(+) <b class="total-member-mileage-without-member">{=gd_global_money_format(totalGoodsMileage + totalCouponGoodsMileage)}</b>{=mileage.unit}</strong>
                                                    <span>
                                                        (
                                                        {=__('상품')} {=gd_global_money_format(totalGoodsMileage)}{=mileage.unit},
                                                        {=__('회원')} {=gd_global_money_format(0)}{=mileage.unit},
                                                        {=__('쿠폰')} <span class="goods-coupon-add-mileage-without-member">{=gd_global_money_format(totalCouponGoodsMileage)}</span>{=mileage.unit}
                                                        )
                                                    </span>
                                                </em>
                                            </li>
                                            <!--{ / }-->
                                        </ul>
                                    </td>
                                </tr>
                                <!--{ : }-->
                                <!--{ ? totalGoodsDcPrice > 0 }-->
                                <tr>
                                    <th scope="row">{=__('상품 할인')}</th>
                                    <td>
                                        {=gd_global_currency_display(totalGoodsDcPrice)}
                                    </td>
                                </tr>
                                <!--{ / }-->
                                <!--{ / }-->
                                <!--{ ? gd_is_login() === true }-->
                                <!--{ ? couponUse == 'y' && couponConfig['chooseCouponMemberUseType'] != 'member' }-->
                                <tr style="display: none;">
                                    <th scope="row">{=__('쿠폰 사용')}</th>
                                    <td>
                                        <input type="hidden" name="couponApplyOrderNo" value="" />
                                        <input type="hidden" name="totalCouponOrderDcPrice" value="" />
                                        <input type="hidden" name="totalCouponOrderPrice" value="" />
                                        <input type="hidden" name="totalCouponOrderMileage" value="" />
                                        <input type="hidden" name="totalCouponDeliveryDcPrice" value="" />
                                        <input type="hidden" name="totalCouponDeliveryPrice" value="" />
                                        <ul class="order_benefit_list order_coupon_benefits  dn">
                                            <li class="order_benefit_sale">
                                                <em>
                                                    {=__('주문할인')} : <strong>(-) {=gd_global_currency_symbol()}<b id="useDisplayCouponDcPrice">{=gd_global_money_format(0)}</b>{=gd_global_currency_string()}</strong>
                                                </em>
                                            </li>
                                            <li class="order_benefit_sale">
                                                <em>
                                                    {=__('배송비할인')} : <strong>(-) {=gd_global_currency_symbol()}<b id="useDisplayCouponDelivery">{=gd_global_money_format(0)}</b>{=gd_global_currency_string()}</strong>
                                                </em>
                                            </li>
                                            <li class="order_benefit_mileage js_mileage">
                                                <em>
                                                    {=__('적립')} {=mileage.name} : <strong>(+) <b id="useDisplayCouponMileage">{=gd_global_money_format(0)}</b>{=mileage.unit}</strong>
                                                </em>
                                            </li>
                                        </ul>
                                        <span class="btn_gray_list">
                                            <button type="button" href="#couponOrderApplyLayer" class="btn_gray_mid btn_open_layer" ><span>{=__('쿠폰 조회 및 적용')}</span></button>
                                        </span>
                                    </td>
                                </tr>
                                <!--{ / }-->
                                <!--{ ? mileageUse.payUsableFl === 'y' }-->
                                <tr>
                                    <th scope="row">{=mileage.name} {=__('사용')}</th>
                                    <td>
                                        <div class="order_money_use">
                                            <b><input type="text" name="useMileage" onblur="gd_mileage_use_check('y', 'y', 'y');" /> {=mileage.unit}</b>
                                            <div class="form_element">
                                                <input type="checkbox" id="useMileageAll" onclick="gd_mileage_use_all();"/>
                                                <label for="useMileageAll" class="check_s">{=__('전액 사용하기')}</label>
                                                <span class="money_use_sum">({=__('보유')} {=mileage.name} : {=gd_global_money_format(gMemberInfo.mileage)} {=mileage.unit})</span>
                                            </div>
                                            <em class="money_use_txt js-mileageInfoArea"></em>
                                        </div>
                                    </td>
                                </tr>
                                <!--{ / }-->
                                <!--{ ? depositUse.payUsableFl === 'y' }-->
                                <tr>
                                    <th scope="row">{=depositUse.name} {=__('사용')}</th>
                                    <td>
                                        <div class="order_money_use">
                                            <b><input type="text" name="useDeposit" onblur="gd_deposit_use_check();"/> {=depositUse.unit}</b>
                                            <div class="form_element">
                                                <input type="checkbox" id="useDepositAll" onclick="deposit_use_all();"/>
                                                <label for="useDepositAll" class="check_s">{=__('전액 사용하기')}</label>
                                                <span class="money_use_sum">({=__('보유')} {=depositUse.name} : {=gd_global_money_format(gMemberInfo.deposit)} {=depositUse.unit})</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <!--{ / }-->
                                <!--{ / }-->
                                <tr>
                                    <th scope="row">Final estimated amount</th>
                                    <td>
                                        <strong id="totalGoodsPrice" class="order_payment_sum">{=gd_global_currency_display(totalGoodsPrice)}</strong>
                                        <!--{ ? gGlobal.isFront }-->
                                        <span class="add_currency">{=gd_global_add_currency_display(totalGoodsPrice)}</span>
                                        <!--{ / }-->
                                        + Shipping fee
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- //payment_info -->

                    <div class="payment_progress">
                        <div class="order_zone_tit">
                            <h4>{=__('결제수단 선택 / 결제')}</h4>
                            <!--{ ? isset(settle.escrow) }-->
                            <p class="js_pay_content">{=dataEggBanner('order')}</p>
                            <!--{ / }-->
                        </div>

                        <div class="payment_progress_list">
                            <div class="js_pay_content">
                                <!-- N : 페이코결제 시작 -->
                                <!--{ ? isset(payco) }-->
                                <div id="settlekind_payco" class="payco_payment">
                                    <dl>
                                        <dt>
                                            {payco}
                                        </dt>
                                        <dd>
                                            <div class="form_element">
                                                <ul>
                                                    <!--{ @ settle.payco }-->
                                                    <!--{ ? .value_.useFl == 'y' }-->
                                                    <li>
                                                        <input type="radio" id="settleKind_payco_{=.key_}" name="settleKind" value="{=.key_}" onclick="gd_payco_toggle('{=.key_}');"/>
                                                        <label for="settleKind_payco_{=.key_}" class="choice_payco">
                                                            <span><img src="../img/order/payco_{=.key_}_icon.png" alt="{=.value_.name}"></span>
                                                        </label>
                                                    </li>
                                                    <!--{ / }-->
                                                    <!--{ / }-->
                                                </ul>
                                            </div>
                                        </dd>
                                    </dl>

                                </div>
                                <!-- //payco_payment -->
                                <!--{ / }-->
                                <!-- N : 페이코결제 끝 -->

                                <!--{ ? settle.general }-->
                                <!-- N : 일반결제 시작 -->
                                <div id="settlekind_general" class="general_payment">
                                    <dl>
                                        <dt>{=__('일반결제')}</dt>
                                        <dd>
                                            <div class="form_element">
                                                <ul class="payment_progress_select">
                                                    <!--{ @ settle.general }-->
                                                    <!--{ ? .value_.useFl == 'y' }-->
                                                    <li id="settlekindType_{=.key_}">
                                                        <input type="radio" id="settleKind_{=.key_}" name="settleKind" value="{=.key_}"/>
                                                        <label for="settleKind_{=.key_}" class="choice_s" style="color:#333">{=.value_.name}</label>
                                                    </li>
                                                    <!--{ / }-->
                                                    <!--{ / }-->
                                                </ul>
                                            </div>

                                            <!--{ ? isset(settle.general.gb) }-->
                                            <!-- N : 무통장입금 -->
                                            <div id="settlekind_general_gb" class="pay_bankbook_box">
                                                <!--{ ? isset(settle.general.gb) }-->
                                                <em class="pay_bankbook_txt">( {=__('%s 의 경우 입금확인 후부터 배송단계가 진행됩니다.', settle.general.gb.name)} )</em>
                                                <!--{ / }-->
                                                <ul>
                                                    <li>
                                                        <strong>{=__('입금자명')}</strong>
                                                        <input type="text" name="bankSender"/>
                                                    </li>
                                                    <li>
                                                        <strong>{=__('입금은행')}</strong>
                                                        <select name="bankAccount" class="chosen-select">
                                                            <option value="">{=__('선택하세요')}</option>
                                                            <!--{ @bank }-->
                                                            <option value="{.sno}">{.bankName} {.accountNumber} {.depositor}</option>
                                                            <!--{ / }-->
                                                        </select>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- //pay_bankbook_box -->
                                            <!--{ / }-->

                                            <!--{ ? isset(settle.general.pc) }-->
                                            <!-- 신용카드 컨텐츠 -->
                                            <div class="card" id="settlekind_general_pc"></div>
                                            <!-- //신용카드 컨텐츠 -->
                                            <!--{ / }-->

                                            <!--{ ? isset(settle.general.pb) }-->
                                            <!-- 계좌이체 컨텐츠 -->
                                            <div class="account-bank" id="settlekind_general_pb"></div>
                                            <!-- //계좌이체 컨텐츠 -->
                                            <!--{ / }-->

                                            <!--{ ? isset(settle.general.pv) }-->
                                            <!-- 가상계좌 컨텐츠 -->
                                            <div class="virtual-bank" id="settlekind_general_pv"></div>
                                            <!-- //가상계좌 컨텐츠 -->
                                            <!--{ / }-->

                                            <!--{ ? isset(settle.general.ph) }-->
                                            <!-- 휴대폰 컨텐츠 -->
                                            <div class="cellphone" id="settlekind_general_ph"></div>
                                            <!-- //휴대폰 컨텐츠 -->
                                            <!--{ / }-->

                                            <!--{ ? isset(settle.general.pe) }-->
                                            <!-- 페이코 포인트 -->
                                            <div class="payco-point" id="settlekind_general_pe"></div>
                                            <!-- //페이코 포인트 -->
                                            <!--{ / }-->

                                        </dd>
                                    </dl>
                                </div>
                                <!-- //general_payment -->
                                <!-- N : 일반결제 끝 -->
                                <!--{ / }-->

                                <!--{ ? settle.escrow }-->
                                <!-- N : 에스크로결제 시작 -->
                                <div id="settlekind_escrow" class="escrow_payment">
                                    <dl>
                                        <dt>{=__('에스크로결제')}</dt>
                                        <dd>
                                            <div class="form_element">
                                                <ul class="payment_progress_select">
                                                    <!--{ @ settle.escrow }-->
                                                    <!--{ ? .value_.useFl == 'y' }-->
                                                    <li>
                                                        <input type="radio" name="settleKind" id="settleKind_{=.key_}" value="{=.key_}"/>
                                                        <label for="settleKind_{=.key_}" class="choice_s">{=.value_.name}</label>
                                                    </li>
                                                    <!--{ / }-->
                                                    <!--{ / }-->
                                                </ul>
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                                <!-- //escrow_payment -->
                                <!-- N : 에스크로결제 끝 -->
                                <!--{ / }-->

                                <!--{ ? settle.overseas }-->
                                <!-- N : 해외PG 시작 -->
                                <div id="settlekind_overseas" class="pg_payment">
                                    <dl>
                                        <dt>{=__('해외PG')}</dt>
                                        <dd>
                                            <div class="form_element">
                                                <ul class="payment_progress_select">
                                                    <!--{ @ settle.overseas }-->
                                                    <!--{ ? .value_.useFl == 'y' }-->
                                                    <li>
                                                        <input type="radio" name="settleKind" id="settleKind_{=.key_}" value="{=.key_}"/>
                                                        <label for="settleKind_{=.key_}" class="choice_s">
                                                            <img src="/data/commonimg/overseas_{=.key_}_icon.png" alt="{=.value_.name}" title="{=.value_.name}">
                                                        </label>
                                                    </li>
                                                    <!--{ / }-->
                                                    <!--{ / }-->
                                                </ul>
                                            </div>
                                            <!-- N : 해외PG 승인금액 -->
                                            <div class="pay_pg_box">
                                                <!--{ @ settle.overseas }-->
                                                <!--{ ? .value_.useFl == 'y' }-->
                                                <ul id="settlekind_overseas_{.key_}" data-settle-currency="{=.value_.pgCurrency}" data-settle-symbol="{=.value_.pgSymbol}" data-settle-decimal="{=.value_.pgDecimal}" data-settle-format="{=.value_.pgDecimalFormat}">
                                                    <li>
                                                        <strong>{=.value_.name} {=__('승인금액')}</strong>
                                                        <em id="overseasSettelprice_{.key_}">0</em>
                                                    </li>
                                                </ul>
                                                <!--{ / }-->
                                                <!--{ / }-->
                                            </div>
                                            <!-- //pay_pg_box -->
                                        </dd>
                                    </dl>
                                </div>
                                <!-- //pg_payment -->
                                <!-- N : 해외PG 끝 -->
                                <!--{ / }-->
                            </div>
                            <!--{ ? false }-->
                            <!-- N : 현금영수증/계산서 발행 시작 -->
                            <div id="receiptSelect" class="cash_tax_get">
                                <dl>
                                    <dt>{=__('현금영수증/계산서 발행')}</dt>
                                    <dd>
                                        <div class="form_element">
                                            <ul class="payment_progress_select">
                                                <li id="nonReceiptView">
                                                    <input type="radio" id="receiptNon" name="receiptFl" value="n" onclick="gd_receipt_display();" />
                                                    <label for="receiptNon" class="choice_s on">
                                                        <div class="cash_receipt_non" style="color:#333">{=__('신청안함')}</div>
                                                        <div class="cash_receipt_pg" style="color:#333">{=__('현금영수증')} (※ {=__('결제창에서 신청')})</div>
                                                    </label>
                                                </li>
                                                <!--{ ? receipt['cashFl'] == 'y' }-->
                                                <li id="cashReceiptView">
                                                    <input type="radio" id="receiptCash" name="receiptFl" value="r" onclick="gd_receipt_display();" />
                                                    <label for="receiptCash" class="choice_s">{=__('현금영수증')}</label>
                                                </li>
                                                <!--{ / }-->
                                                <!--{ ? receipt['taxFl'] == 'y' }-->
                                                <li id="taxReceiptView">
                                                    <input type="radio" id="receiptTax" name="receiptFl" value="t" onclick="gd_receipt_display();" />
                                                    <label for="receiptTax" class="choice_s">{=__('세금계산서')}</label>
                                                    <!--{ ? memberInvoiceInfo['tax']['memberTaxInfoFl'] == 'y' }-->
                                                    <button class="tax_info_init dn btn_reset"><em>초기화</em></button>
                                                    <!--{ / }-->
                                                </li>
                                                <!--{ / }-->
                                            </ul>
                                        </div>
                                    </dd>
                                </dl>

                                <!--{ ? receipt['cashFl'] == 'y' }-->
                                <!-- N : 현금영수증 시작 -->
                                <div id="cash_receipt_info" class="cash_receipt_box js_receipt dn">
                                    <div class="form_element">
                                        <ul class="payment_progress_select">
                                            <input type="hidden" name="cashCertFl" value="c" />
                                            <li>
                                                <input type="radio" id="cashCert_d" name="cashUseFl" value="d" onclick="gd_cash_receipt_toggle();" checked="checked" />
                                                <label class="choice_s" for="cashCert_d">{=__('소득공제용')}</label>
                                            </li>
                                            <li>
                                                <input type="radio" id="cashCert_e" name="cashUseFl" value="e" onclick="gd_cash_receipt_toggle();" />
                                                <label class="choice_s" for="cashCert_e">{=__('지출증빙용')}</label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="cash_receipt_list">
                                        <dl id="certNoHp">
                                            <dt>{=__('휴대폰번호')}</dt>
                                            <dd><input type="text" name="cashCertNo[c]" class="number_only" value="{=str_replace('-', '', gd_isset(memberInvoiceInfo['cash']['cellPhone']))}" maxlength="11" /></dd>
                                        </dl>
                                        <dl id="certNoBno">
                                            <dt>{=__('사업자번호')}</dt>
                                            <dd><input type="text" name="cashCertNo[b]" class="number_only" value="{=str_replace('-', '', gd_isset(memberInvoiceInfo['cash']['cashBusiNo']))}" maxlength="10" /></dd>
                                        </dl>
                                    </div>
                                </div>
                                <!-- //cash_receipt_box -->
                                <!--{ / }-->

                                <!--{ ? receipt['taxFl'] == 'y' }-->
                                <!-- N : 세금 계산서 -->
                                <div id="tax_info" class="tax_invoice_box js_receipt dn">
                                    <div class="order_table_type">
                                        <table summary="{=__('세금계산서 입력폼입니다.')}" class="table_left">
                                            <colgroup>
                                                <col style="width:15%;">
                                                <col style="width:35%;">
                                                <col style="width:15%;">
                                                <col style="width:35%;">
                                            </colgroup>
                                            <tbody>
                                            <tr>
                                                <th scope="row">{=__('사업자번호')}</th>
                                                <td colspan="3"><input type="text" name="taxBusiNo" placeholder="- {=__('없이 입력하세요')}" value="{=str_replace('-', '', gd_isset(memberInvoiceInfo['tax']['taxBusiNo']))}" maxlength="10"/></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">{=__('회사명')}</th>
                                                <td><input type="text" name="taxCompany" value="{=gd_isset(memberInvoiceInfo['tax']['company'])}" maxlength="50" data-pattern="gdMemberNmGlobal"/></td>
                                                <th scope="row">{=__('대표자명')}</th>
                                                <td><input type="text" name="taxCeoNm" value="{=gd_isset(memberInvoiceInfo['tax']['ceo'])}"/></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">{=__('업태')}</th>
                                                <td><input type="text" name="taxService" value="{=gd_isset(memberInvoiceInfo['tax']['service'])}"/></td>
                                                <th scope="row">{=__('종목')}</th>
                                                <td><input type="text" name="taxItem" value="{=gd_isset(memberInvoiceInfo['tax']['item'])}"/></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">{=__('사업장주소')}</th>
                                                <td colspan="3" class="member_address">
                                                    <div class="address_postcode">
                                                        <input type="text" name="taxZonecode" value="{=gd_isset(memberInvoiceInfo['tax']['comZonecode'])}" readonly="readonly" />
                                                        <input type="hidden" name="taxZipcode" value="{=gd_isset(memberInvoiceInfo['tax']['comZipcode'])}"/>
                                                        <button type="button" onclick="gd_postcode_search('taxZonecode', 'taxAddress', 'taxZipcode');" class="btn_post_search">{=__('우편번호검색')}</button>
                                                    </div>
                                                    <div class="address_input">
                                                        <input type="text" name="taxAddress" value="{=gd_isset(memberInvoiceInfo['tax']['comAddress'])}"/>
                                                        <input type="text" name="taxAddressSub" value="{=gd_isset(memberInvoiceInfo['tax']['comAddressSub'])}"/>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!--{ ? taxInfo.eTaxInvoiceFl == 'y' }-->
                                            <tr>
                                                <th scope="row">{=__('발행 이메일')}</th>
                                                <td colspan="3" class="cash_receipt_email">
                                                    <input type="text" name="taxEmail" placeholder="{=__('미입력 시 주문자의 이메일로 발행')}" value="{=gd_isset(memberInvoiceInfo['tax']['email'])}" />
                                                    <select id="taxEmailDomain" class="chosen-select">
                                                        <!--{ @ emailDomain }-->
                                                        <option value="{=.key_}">{=.value_}</option>
                                                        <!--{ / }-->
                                                    </select>
                                                </td>
                                            </tr>
                                            <!--{ / }-->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- //tax_invoice_box -->
                                <!--{ / }-->

                            </div>
                            <!-- //cash_tax_get -->
                            <!-- N : 현금영수증/계산서 발행 끝-->
                            <!--{ / }-->

                        </div>
                        <!-- //payment_progress_list -->
                        <div class="payment_final">
                            <div class="payment_final_total">
                                <dl>
                                    <dt>estimated payment amount</dt>
                                    <dd>
                                    <span id="totalGoodsPrice" class="order_payment_sum"></span>{=gd_global_currency_display(totalGoodsPrice)}</strong> + Shipping Fee
                                    <!--{ ? gGlobal.isFront }-->
                                    <span class="add_currency">{=gd_global_add_currency_display(totalGoodsPrice)}  </span>
                                    <!--{ / }-->
                                   
</dd>

                                    <!-- <dd><span>{=gd_global_currency_symbol()}<strong id="totalSettlePriceView">{=gd_global_currency_display(totalGoodsPrice)}</strong>{=gd_global_add_currency_display(totalGoodsPrice)} </span></dd> -->
                              
                                </dl>
                             
                                <!--{ ? gGlobal.isFront && gGlobal.useAddCurrency }-->
                                <p class="add_currency">{=gd_global_add_currency_symbol()}<em id="totalAddSettlePriceView">{=gd_global_add_money_format(totalSettlePrice)}</em>{=gd_global_add_currency_string()}</p>
                                <!--{ / }-->
                            </div>
                            <!--{ ? orderPolicy.reagreeConfirmFl == 'y' }-->
                            <div class="payment_final_check">
                                <div class="form_element">
                                    <input type="checkbox" id="termAgree_orderCheck" class="require"/>
                                    <label for="termAgree_orderCheck" class="check_s"><em><b>({=__('필수')})</b>I have confirmed the ordered item payment information and agree to proceed with the order inquiry
                                    </em></label>
                                </div>
                            </div>
                            <!--{ / }-->
                            <!--{ ? settleOrderPossible }-->
                            <div class="btn_center_box">
                                <button class="btn_order_buy order-buy" ><em>Order Inquiry</em></button>
                            </div>
                            <!--{ : }-->
                            <strong class="chk_none">{=__('주문하시는 상품의 결제 수단이 상이 하여 결제가 불가능합니다.')}</strong>
                            <div class="btn_center_box">
                                <button class="btn_order_buy order-buy"><em>{=__('결제하기')}</em></button>
                            </div>
                            <!--{ / }-->
                        </div>
                        <!-- //payment_final -->

                    </div>
                    <!-- //payment_progress -->

                </div>
                <!-- //order_view_info -->
            </div>
            <!-- //order_cont -->
        </div>
        <!-- //order_wrap -->
    </form>
</div>
<!-- //content_box -->

<!-- 나의 배송지 관리 레이어 -->
<div id="myShippingListLayer" class="layer_wrap delivery_add_list_layer dn"></div>
<!-- //나의 배송지 관리 레이어 -->
<!--{ ? couponUse == 'y' }-->
<!-- 상품 쿠폰 적용하기 레이어 -->
<div id="couponApplyLayer" class="layer_wrap coupon_apply_layer dn"></div>
<!--//상품 쿠폰 적용하기 레이어 -->
<!-- 주문 쿠폰 적용하기 레이어 -->
<div id="couponOrderApplyLayer" class="layer_wrap coupon_apply_layer dn"></div>
<!--//주문 쿠폰 적용하기 레이어 -->
<!--{ / }-->
<!-- PG 결제 적용하기 레이어 -->
<div id="pgSettlementApplyLayer" class="layer_wrap pg_layer dn"></div>
<!--//PG 결제 적용하기 레이어 -->
<!--{ ? isUseMultiShipping === true }-->
<!-- 복수배송지 상품 선택 레이어 -->
<div id="cartSelectGoods" class="layer_wrap dn"></div>
<!--//복수배송지 상품 선택 레이어 -->
<script type="text/html" class="template" id="multiShippingRow">
    <table class="table_left shipping_info_table" style="margin-top:20px;">
        <colgroup>
            <col style="width:15%;">
            <col style="width:85%;">
        </colgroup>
        <tbody>
        <tr>
            <th scope="row">{=__('추가 배송지')}<span class="no"><%=no%></span></th>
            <td>
                <div class="form_element">
                    <ul>
                        <li>
                            <input type="radio" name="shippingAdd[<%=no%>]" id="shippingNewAdd<%=no%>"/>
                            <label class="choice_s on" for="shippingNewAdd<%=no%>">{=__('직접 입력')}</label>
                        </li>
                    </ul>
                    <!--{ ? gd_is_login() === true }-->
                    <span class="btn_gray_list"><a href="#myShippingListLayer" class="btn_gray_small btn_open_layer js_shipping" data-no="<%=no%>"><span>{=__('배송지 관리')}</span></a></span>
                    <!--{ / }-->
                    <input type="hidden" name="deliveryVisitAdd[<%=no%>]" class="shipping-delivery-visit" value="n" />
                </div>

                <span class="btn_gray_list"><a class="btn_gray_small shipping_remove_btn" style="float:right; cursor:pointer;"><span>- {=__('삭제')}</span></a></span>
            </td>
        </tr>
        <tr>
            <th scope="row"><span class="important">{=__('받으실분')}</span></th>
            <td>
                <input type="text" name="receiverNameAdd[<%=no%>]" value="" data-pattern="{? gGlobal['isFront']}gdMemberNmGlobal{:}gdEngKor{/}" maxlength="20" class="text" />
            </td>
        </tr>
        <!--{ ? gGlobal.isFront }-->
        <tr>
            <th scope="row"><span class="important">{=__('국가')}</span></th>
            <td>
                {=gd_select_box('receiverCountryCodeAdd[<%=no%>]', 'receiverCountryCodeAdd[<%=no%>]', countryAddress, null, recommendCountryCode, __('=선택해주세요='), null, 'tune select-small')}
            </td>
        </tr>
        <tr>
            <th scope="row"><span class="important">{=__('도시')}</span></th>
            <td>
                <input type="text" name="receiverCityAdd[<%=no%>]" value="" maxlength="20" class="text" />
            </td>
        </tr>
        <tr>
            <th scope="row"><span class="important">{=__('주/지방/지역')}</span></th>
            <td>
                <input type="text" name="receiverStateAdd[<%=no%>]" value="" maxlength="20" class="text" />
            </td>
        </tr>
        <tr>
            <th scope="row"><span class="important">{=__('주소1')}</span></th>
            <td>
                <input type="text" name="receiverAddressAdd[<%=no%>]" value="" class="text" />
            </td>
        </tr>
        <tr>
            <th scope="row"><span class="important">{=__('주소2')}</span></th>
            <td>
                <input type="text" name="receiverAddressSubAdd[<%=no%>]" value="" class="text" />
            </td>
        </tr>
        <tr>
            <th scope="row"><span class="important">{=__('우편번호')}</span></th>
            <td>
                <input type="text" name="receiverZonecodeAdd[<%=no%>]" value=""/>
                <input type="hidden" name="receiverZipcodeAdd[<%=no%>]" value=""/>
            </td>
        </tr>
        <!--{ : }-->
        <tr>
            <th scope="row"><span class="important">{=__('받으실 곳')}</span></th>
            <td class="member_address">
                <div class="address_postcode">
                    <input type="text" name="receiverZonecodeAdd[<%=no%>]" readonly="readonly" />
                    <input type="hidden" name="receiverZipcodeAdd[<%=no%>]"/>
                    <button type="button" data-no="<%=no%>" class="btn_post_search postcode_search post_search">{=__('우편번호검색')}</button>
                </div>
                <div class="address_input">
                    <input type="text" name="receiverAddressAdd[<%=no%>]" value="" readonly="readonly" class="text" />
                    <input type="text" name="receiverAddressSubAdd[<%=no%>]" value="" class="text" />
                </div>
            </td>
        </tr>
        <!--{ / }-->
        <tr>
            <th scope="row">{=__('전화번호')}</th>
            <td>
                <!--{ ? gGlobal.isFront }-->
                {=gd_select_box('receiverPhonePrefixCodeAdd[<%=no%>]', 'receiverPhonePrefixCodeAdd[<%=no%>]', countryPhone, null, null, __('국가코드'), null, 'tune select-small')}
                <!--{ / }-->
                <input type="text" id="receiverPhoneAdd[<%=no%>]" name="receiverPhoneAdd[<%=no%>]" value="" class="text" />
            </td>
        </tr>
        <tr>
            <th scope="row"><span class="important">{=__('휴대폰 번호')}</span></th>
            <td>
                <!--{ ? gGlobal.isFront }-->
                {=gd_select_box('receiverCellPhonePrefixCodeAdd[<%=no%>]', 'receiverCellPhonePrefixCodeAdd[<%=no%>]', countryPhone, null, null, __('국가코드'), null, 'tune select-small')}
                <!--{ / }-->
                <input type="text" id="receiverCellPhoneAdd[<%=no%>]" name="receiverCellPhoneAdd[<%=no%>]" value="" class="text" />
                <!--{ ? gGlobal.isFront == false && useSafeNumberFl == 'y' }-->
                <span class="form_element td_chk">
                    <input type="checkbox" id="receiverUseSafeNumberFlAdd<%=no%>" name="receiverUseSafeNumberFlAdd[<%=no%>]" value="w" checked="checked"/>
                    <label for="receiverUseSafeNumberFlAdd<%=no%>" class="check_s on"><em>{=__('안심번호 사용')}</em></label>
                </span>
                <div>{=__('안심번호 사용 체크 시 1회 성으로 가상의 번호인 안심번호(050*-0000-0000)를 부여합니다. 안심번호는 일정 기간이 지나면 자동으로 해지됩니다.')}</div>
                <!--{ / }-->
            </td>
        </tr>
        <tr>
            <th scope="row">{=__('남기실 말씀')}</th>
            <td>
                <input type="text" name="orderMemoAdd[<%=no%>]" value="" class="text" />
            </td>
        </tr>
        <!--{ ? gd_is_login() === true && !gGlobal.isFront }-->
        <tr>
            <th scope="row">{=__('회원정보 반영')}</th>
            <td>
                <div class="form_element">
                    <div class="member_info_delivery">
                        <input type="checkbox" name="reflectApplyDeliveryAdd[<%=no%>]" value="y" id="reflectApplyDeliveryAdd<%=no%>"/>
                        <label for="reflectApplyDeliveryAdd<%=no%>" class="check_s">{=__('나의 배송지에 추가합니다.')}</label><br />
                    </div>
                </div>
            </td>
        </tr>
        <!--{ / }-->
        <tr class="orderVisitTr dn">
            <th scope="row">{=__('추가 방문수령 정보')}<span class="no"><%=no%></span></th>
            <td>
                <div class="table1">
                    <table>
                        <colgroup>
                            <col style="width:150px;">
                            <col>
                        </colgroup>
                        <tbody>
                        <tr>
                            <th scope="row">{=__('방문 수령지 주소')}</th>
                            <td>
                                <span class="delivery-method-visit-area-txt"></span>
                                <input type="hidden" name="visitAddressAdd[<%=no%>]" value=""/>

                                <span class="btn_gray_list"><a class="btn_gray_small shipping-visit-remove-btn" style="float:right; cursor:pointer;"><span>- {=__('삭제')}</span></a></span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><span class="important">{=__('방문자 정보')}</span></th>
                            <td>
                                방문자명 <input type="text" name="visitNameAdd[<%=no%>]" value="" class="text"/> 방문자연락처 <input type="text" name="visitPhoneAdd[<%=no%>]" value="" class="text"/>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">{=__('메모')}</th>
                            <td class="td_last_say">
                                <input type="text" name="visitMemoAdd[<%=no%>]" maxlength="250"/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
        <tr class="select_goods_tr">
            <th scope="row">{=__('배송 상품')}</th>
            <td>
                <input type="hidden" name="selectGoods[<%=no%>]" value=""/>
                <input type="hidden" name="multiDelivery[<%=no%>]" value="0"/>
                <span class="btn_gray_list"><a href="#cartSelectGoods" class="btn_gray_small shipping_goods_select btn_open_layer" style="margin-bottom:5px;"><span>+ {=__('상품 선택')}</span></a></span>
                <div class="table1 type1 select_goods order_goods dn">
                    <table class="check"></table>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</script>
<!--{ / }-->


<script type="text/javascript" src="../js/jquery/jquery.textchange.js"></script>
<script type="text/javascript" src="../js/jquery/jquery.serialize.object.js"></script>
<script type="text/javascript" src="../js/jquery/validation/additional/businessnoKR.js"></script>
{=fbInitiateCheckoutScript}

<script type="text/javascript">
    <!--
    // 배송지 데이터 글로벌 선언
    var defaultShippingAddress = {defaultShippingAddress};
    var recentShippingAddress = {recentShippingAddress};
    // 마일리지 사용 정보
    var mileageUse = {
        'usableFl' : '{=mileageUse.usableFl}',
        'minimumHold' : parseInt('{=mileageUse.minimumHold}'),
        'minimumLimit' : parseInt('{=mileageUse.minimumLimit}'),
        'orderAbleLimit' : parseInt('{=mileageUse.orderAbleLimit}'),
        'orderAbleStandardPrice' : parseInt('{=mileageUse.orderAbleStandardPrice}'), // '최소 상품구매금액 제한' 을 비교하기 위한 계산된 구매금액
        'useDeliveryFl' : '{=mileageUse.useDeliveryFl}',
        'maximumLimit' : '{=mileageUse.maximumLimit}',
        'oriMaximumLimit' : parseInt('{=mileageUse.oriMaximumLimit}'), // 변형되지 않은 설정 그대로의 값 - %는 원으로 계산되어 나옴
    };

    $(document).ready(function(){

        $('input.number_only').on('keyup', function () {
            var value = $(this).val().replace(/[^0-9]/g, '');
            $(this).val(value);
        });

        $(document).on('click', '#pgSettlementApplyLayer .close', function(e){
            $(this).closest('.layer_wrap').addClass('dn');
            $('#layerDim').addClass('dn');
            //$('html').removeClass('oh-space');
            //$('#scroll-left, #scroll-right').removeClass('dim');
            $('.inipay_modal-backdrop').remove();
        });

        // 본인인증 레이어
        $("#contents .order_info .btn_cert").on('click',function(){
            <!--{ ? ipinFl === true && authCellphoneFl === true }-->
            $(".pop_cert_ly").show();
            $('#layerDim').removeClass('dn');
            <!--{ / }-->
            <!--{ ? ipinFl === true && authCellphoneFl === false}-->
            authCellIpin();
            <!--{ / }-->
            <!--{ ? ipinFl === false && authCellphoneFl === true}-->
            authCellPhone();
            <!--{ / }-->
        });
        $("#contents .pop_cert_ly .btn_close").on('click',function(){
            $(".pop_cert_ly").hide();
            $('#layerDim').addClass('dn');
        });
        <!--{? memberSessionName }-->
        if ($('input[name="orderName"]').val() != '') {
            $('input[name="orderName"]').prop('readonly', true);
            if($('input[name="orderName"]').prop('readonly') === true) {
                $('input[name="orderName"][readonly]').css('background', '#eeeeee');
            }
        }
        <!--{ / }-->
        <!--{? memberSessionPhone }-->
        if ($('input[name="orderCellPhone"]').val() != '') {
            $('input[name="orderCellPhone"]').prop('readonly', true);
            if($('input[name="orderCellPhone"]').prop('readonly') === true) {
                $('input[name="orderCellPhone"][readonly]').css('background', '#eeeeee');
            }
        }
        <!--{ / }-->



        <!--{ ? couponUse == 'y' }-->
        // 쿠폰 적용/변경 레이어
        $('.btn_open_layer').bind('click', function(e){
            if($(this).attr('href') == '#couponOrderApplyLayer') {
                // 마일리지 쿠폰 중복사용 체크
                var checkMileageCoupon = gd_choose_mileage_coupon('coupon');
                if (!checkMileageCoupon) {
                    return false;
                }

                var cartIdx = [];
                $('input[name="cartSno[]"]').each(function(idx){
                    cartIdx.push($(this).val());
                });
                var params = {
                    mode: 'coupon_apply_order',
                    cartSno: cartIdx,
                    couponApplyOrderNo: $('input:hidden[name="couponApplyOrderNo"]').val(),
                };
                $.ajax({
                    method: "POST",
                    cache: false,
                    url: "../order/layer_coupon_apply_order.php",
                    data: params,
                    success: function (data) {
                        $('#couponOrderApplyLayer').empty().append(data);
                        $('#couponOrderApplyLayer').find('>div').center();
                    },
                    error: function (data) {
                        alert(data);
                    }
                });
            }
        });
        <!--{ / }-->

        // 사은품 체크 및 체크된 수량 출력
        $('.order_freebie_list input[type=checkbox]').click(function(e){
            if($(this).prop('readonly') == false) {
                var selectCnt = $(this).closest('dl').find('.gift_select_cnt').val();
                var checkedCnt = $(this).closest('dl').find('input[type=checkbox]:checked').length;
                if (checkedCnt > selectCnt) {
                    alert("{사은품은 최대 " + selectCnt + "개만 선택하실 수 있습니다.");
                    $(this).prop('checked', false).next('label').removeClass('on');

                    return false;
                }
                $(this).closest('dd').prev('dt').find('strong').text(checkedCnt);
            }
        });

        // 배송지관리 이벤트
        $(document).on('click', '.btn_open_layer.js_shipping', function(e) {
            var shippingNo = '';
            $('#myShippingListLayer').empty();
            if (typeof $(this).data('no') != 'undefined') {
                shippingNo = $('.btn_open_layer.js_shipping').index(this);
            }

            $.get('../order/layer_shipping_address.php?shippingNo=' + shippingNo, function(data){
                $('#myShippingListLayer').append(data);
                $('#myShippingListLayer').find('>div').center();
            });
        });

        // 세금계산서 관련 체크용
        var checkTax = function() {
            if ($('#settleKind_gb').is(':checked') && $('#receiptTax').is(':checked')) {
                return true;
            }
            return false;
        }

        // 무통장입금 체크
        var checkBank = function() {
            if ($('#settleKind_gb').is(':checked') && parseInt($('input[name=settlePrice]').val()) > 0) {
                return true;
            }
            return false;
        }

        // 우편번호 체크를 위한 알파벳+숫자+띄어쓰기 체크
        $.validator.addMethod( "alphanumeric", function( value, element ) {
            return this.optional( element ) || /^[a-zA-Z0-9\s]+$/i.test( value );
        }, __("알파벳과 숫자로만 구성되어야 합니다.") );

        <!--{ ? receipt['taxFl'] == 'y'  && taxInfo.eTaxInvoiceFl == 'y' }-->
        $.validator.addMethod(
            'taxEmailChk', function (value, element) {
                if($('input[name=receiptFl]:checked').val() =='t' && $('input[name=taxEmail]').val() !=  '' && !$.validator.methods.email.call(this, $.trim(value), element)){
                    $.validator.messages.taxEmailChk =  __('[세금계산서] 발행 이메일을 정확하게 입력하여 주세요.');
                    return false;
                }
                return true;
            },'');
        <!--{ / }-->

        /*
         * 비회원 주문 전체 동의 체크박스 이벤트
         */
        <!--{ ? gd_is_login() === false }-->
        // 14세 동의 항목 체크박스 이벤트
        if ($("#termAgreeDiv").length > 0) {
            $('#termAgreeDiv :checkbox', $('#frmOrder')).change(function (e) {
                var $termsTarget = $(e.target), $termsLabel = $termsTarget.siblings('label');
                var isTermsTargetChecked = $termsTarget.prop('checked') === true;
                if (isTermsTargetChecked) {
                    $termsTarget.val('y');
                    $termsLabel.addClass('on');
                } else {
                    $termsTarget.val('n');
                    $termsLabel.removeClass('on');
                }
            });
        }
        <!--{ ? hasScmGoods === false }-->
        $('#allAgree', $('#frmOrder')).change(function (e) {
            e.preventDefault();
            var $target = $(e.target), $checkboxAgreement = $('#termAgree_agreement'),  $checkboxGuest = $('#termAgree_guest'), $labelAgree = $checkboxAgreement.siblings('label'), $labelGuest = $checkboxGuest.siblings('label'), $checkboxMarketing = $('#termAgree_privateMarketing'), $labelMarketing = $checkboxMarketing.siblings('label');
            if ($target.prop('checked') === true) {
                $checkboxAgreement.prop('checked', true).val('y');
                $labelAgree.addClass('on');
                $checkboxGuest.prop('checked', true).val('y');
                $labelGuest.addClass('on');
                <!--{ ? privateMarketingFl }-->
                $checkboxMarketing.prop('checked', true).val('y');
                $labelMarketing.addClass('on');
                <!--{ / }-->
            } else {
                $checkboxAgreement.prop('checked', false).val('n');
                $labelAgree.removeClass('on');
                $checkboxGuest.prop('checked', false).val('n');
                $labelGuest.removeClass('on');
                <!--{ ? privateMarketingFl }-->
                $checkboxMarketing.prop('checked', false).val('n');
                $labelMarketing.removeClass('on');
                <!--{ / }-->
            }
        });
        <!--{ : }-->
        $('#allAgreeScm', $('#frmOrder')).change(function (e) {
            e.preventDefault();
            var $target = $(e.target),$checkboxAgreement = $('#termAgree_agreement'),  $checkboxGuest = $('#termAgree_guest'), $labelAgree = $checkboxAgreement.siblings('label'), $labelGuest = $checkboxGuest.siblings('label'), $checkboxScm = $('#termAgree_privateProvider'), $labelScm = $checkboxScm.siblings('label'), $checkboxMarketing = $('#termAgree_privateMarketing'), $labelMarketing = $checkboxMarketing.siblings('label');
            if ($target.prop('checked') === true) {
                $checkboxAgreement.prop('checked', true).val('y');
                $labelAgree.addClass('on');
                $checkboxGuest.prop('checked', true).val('y');
                $labelGuest.addClass('on');
                $checkboxScm.prop('checked', true).val('y');
                $labelScm.addClass('on');
                <!--{ ? privateMarketingFl }-->
                $checkboxMarketing.prop('checked', true).val('y');
                $labelMarketing.addClass('on');
                <!--{ / }-->
            } else {
                $checkboxAgreement.prop('checked', false).val('n');
                $labelAgree.removeClass('on');
                $checkboxGuest.prop('checked', false).val('n');
                $labelGuest.removeClass('on');
                $checkboxScm.prop('checked', false).val('n');
                $labelScm.removeClass('on');
                <!--{ ? privateMarketingFl }-->
                $checkboxMarketing.prop('checked', false).val('n');
                $labelMarketing.removeClass('on');
                <!--{ / }-->
            }
        });
        <!--{ / }-->
        <!--{ / }-->

        var receiveFl = function () {
            if ($('input[name="deliveryVisit"]').val() == 'n' || $('input[name="deliveryVisit"]').val() == 'a') {
                return true;
            }
            return false;
        }

        var visitFl = function () {
            if ($('input[name="deliveryVisit"]').val() == 'y' || $('input[name="deliveryVisit"]').val() == 'a') {
                return true;
            }
            return false;
        }

        // 폼 체크
        $('#frmOrder').validate({
            onkeyup: onkeyup,
            invalidHandler: function(event, validator) {
                var errors = validator.numberOfInvalids();
                if (validator.errorList[0].element.id == 'termAgree') {
                    $("#termAgreeDiv").attr("tabindex", -1).focus();
                }

                if (errors) {
                    alert(validator.errorList[0].message);
                    validator.errorList[0].element.focus();
                }
            },
            submitHandler: function (form) {
                <!--{ ? giftConf.giftFl == 'y' }-->
                <!--{ @ giftInfo }-->
                <!--{ @ gift }-->
                <!--{ ? ..total > 0 }-->
                var selectCnt = $('input[type=checkbox][name*="gift[{.key_}]"]').closest('dl').find('.gift_select_cnt').val();
                if ($('input[type=checkbox][name*="gift[{.key_}]"]:checked').length < selectCnt) {
                    pass = false;
                    alert("사은품은 최소 " + selectCnt + "개 이상 선택하셔야 합니다.");
                    $('input[type=checkbox][name*="gift[{.key_}]"]').eq(0).focus();
                    return false;
                }
                <!--{ / }-->
                <!--{ / }-->
                <!--{ / }-->
                <!--{ / }-->

                <!--{ ? memberGuestAuthFl != 'y' }-->
                if ($(".btn_cert").length > 0 && $(".btn_cert").css('display') != "none") {
                    pass = false;
                    alert(__('본인인증을 진행해주세요.'));
                    $(".btn_cert").focus();
                    return false;
                }
                <!--{ / }-->
                

                <!--{ ? isUseMultiShipping === true }-->
                if ($('input[name="multiShippingFl"]').prop('checked') === true) {
                    var msg = '';
                    var cartGoodsCnt = 0;
                    var cartAddGoodsCnt = 0;

                    $('input[name^="selectGoods"]').each(function(index){
                        if (index > 0) {
                            var shippingDeliveryVisit = $('.shipping-delivery-visit').eq(index).val();

                            if (shippingDeliveryVisit != 'y') {
                                if (!$('input[name="receiverNameAdd[' + index + ']"]').val()) {
                                    $('input[name="receiverNameAdd[' + index + ']"]').focus();
                                    msg = __('받으실 분 정보를 입력해 주세요.');
                                    return false;
                                }
                                if (!$('input[name="receiverZonecodeAdd[' + index + ']"]').val()) {
                                    $('input[name="receiverZonecodeAdd[' + index + ']"]').focus();
                                    msg = __('받으실 곳 우편번호 정보를 입력해 주세요.');
                                    return false;
                                }
                                if (!$('input[name="receiverAddressAdd[' + index + ']"]').val()) {
                                    $('input[name="receiverAddressAdd[' + index + ']"]').focus();
                                    msg = __('받으실 곳 주소 정보를 입력해 주세요.');
                                    return false;
                                }
                                if (!$('input[name="receiverAddressSubAdd[' + index + ']"]').val()) {
                                    $('input[name="receiverAddressSubAdd[' + index + ']"]').focus();
                                    msg = __('받으실 곳 주소 정보를 입력해 주세요.');
                                    return false;
                                }
                                if (!$('input[name="receiverCellPhoneAdd[' + index + ']"]').val()) {
                                    $('input[name="receiverCellPhoneAdd[' + index + ']"]').focus();
                                    msg = __('받으실 분 휴대폰 번호 정보를 입력해 주세요.');
                                    return false;
                                }
                            }
                            if (shippingDeliveryVisit != 'n') {
                                if (!$('input[name="visitNameAdd[' + index + ']"]').val()) {
                                    $('input[name="visitNameAdd[' + index + ']"]').focus();
                                    msg = __('방문자명을 입력해 주세요.');
                                    return false;
                                }
                                if (!$('input[name="visitPhoneAdd[' + index + ']"]').val()) {
                                    $('input[name="visitPhoneAdd[' + index + ']"]').focus();
                                    msg = __('방문자연락처를 입력해 주세요.');
                                    return false;
                                }
                            }

                            for (var i = 0; i < index ; i++) {
                                var prevShippingDeliveryVisit = $('.shipping-delivery-visit').eq(i).val();
                                var prevReceiverZoneCode = $('input[name="receiverZonecodeAdd[' + i + ']"]').val();
                                var prevReceiverAddressSub = $('input[name="receiverAddressSubAdd[' + i + ']"]').val();

                                if (i == 0) {
                                    prevReceiverZoneCode = $('input[name="receiverZonecode"]').val();
                                    prevReceiverAddressSub = $('input[name="receiverAddressSub"]').val();
                                }

                                if (shippingDeliveryVisit != 'y' && prevShippingDeliveryVisit != 'y' && prevReceiverZoneCode == $('input[name="receiverZonecodeAdd[' + index + ']"]').val() && prevReceiverAddressSub == $('input[name="receiverAddressSubAdd[' + index + ']"]').val()) {
                                    msg = __('복수 배송지를 이용 시에는 동일 배송지를 선택할 수 없습니다.');
                                    return false;
                                }
                            }
                        }
                        if ($(this).val()) {
                            $.parseJSON($(this).val()).forEach(function(ele){
                                if (ele.goodsCnt > 0) {
                                    cartGoodsCnt += parseInt(ele.goodsCnt);
                                }
                                if (ele.addGoodsTotalCnt > 0) {
                                    cartAddGoodsCnt += parseInt(ele.addGoodsTotalCnt);
                                }
                            });
                        } else {
                            msg = __('배송지마다 최소 1개 이상의 주문상품이 선택되어야 합니다.');
                            return false;
                        }
                    });

                    if (msg) {
                        alert(msg);
                        return false;
                    }

                    if (cartGoodsCnt != $('input[name="cartGoodsCnt"]').val() || cartAddGoodsCnt != $('input[name="cartAddGoodsCnt"]').val()) {
                        alert(__('배송지가 설정되지 않은 주문상품이 존재합니다.'));
                        return false;
                    }
                }
                <!--{ / }-->

                var pass = true;
                $('input:checkbox[id*="termAgree_"].require').each(function (idx, item) {
                    var $item = $(item);
                    if (!$item.prop('checked')) {
                        pass = false;
                        alert("{=__('청약의사 재확인을 동의해 주셔야 주문을 진행하실 수 있습니다.')}");
                        return false;
                    }
                });
                // custom 해외 결제 pass 되게 하는 부분
                if (pass && $('input[name=settleKind]').length == 0 && $('#totalSettlePriceView').html() != '0') {
                    //alert(__('선택된 결제 수단이 없습니다.'));
                    return confirm("Complete the order form.");
                }

                // 쿠폰 사용기간 체크
                if ($('input[name="totalCouponGoodsDcPrice"]').val() > 0 || $('input[name="totalCouponGoodsMileage"]').val() > 0 || $('input[name="totalCouponOrderDcPrice"]').val() > 0 || $('input[name="totalCouponOrderMileage"]').val() > 0 || $('input[name="totalCouponDeliveryDcPrice"]').val() > 0) {
                    var chkCartSno = [];
                    var couponApplyOrderNo = $('input:hidden[name="couponApplyOrderNo"]').val();
                    $('input[name="cartSno[]"]').each(function(idx){
                        chkCartSno.push($(this).val());
                    });
                    var checkCouponType = false;
                    var totalCouponGoodsDcPrice = 0;
                    var totalCouponGoodsMileage = 0;
                    var totalCouponOrderDcPrice = 0;
                    var totalCouponOrderMileage = 0;
                    var totalCouponDeliveryDcPrice = 0;
                    var orderCouponApplyNoArr = new Array();
                    $.ajax({
                        method: "POST",
                        cache: false,
                        async: false,
                        url: "../order/cart_ps.php",
                        data: {mode: 'CheckCouponTypeArr', cartSno : chkCartSno, couponApplyOrderNo : couponApplyOrderNo },
                        success: function (data) {
                            checkCouponType = data.isSuccess;
                            // 쿠폰 금액 재정의
                            if (checkCouponType) {
                                // 상품쿠폰
                                if (data.memberCouponSalePrice > 0) {
                                    totalCouponGoodsDcPrice = parseInt($('input[name=totalCouponGoodsDcPrice]').val()) - data.memberCouponSalePrice;
                                }

                                if (data.memberCouponAddMileage > 0) {
                                    totalCouponGoodsMileage = parseInt($('input[name=totalCouponGoodsMileage]').val()) - data.memberCouponAddMileage;
                                }

                                // 주문 및 배송비쿠폰
                                if (data.setCouponApplyOrderNo || data.resetCouponApplyOrderNo) {
                                    $('input:hidden[name="couponApplyOrderNo"]').val(data.setCouponApplyOrderNo);
                                    orderCouponApplyNoArr = data.resetCouponApplyOrderNo.split('{c.INT_DIVISION}');
                                    $.each(orderCouponApplyNoArr, function (index, val) {
                                        if ($('#check'+val).data('type') == 'sale') {
                                            totalCouponOrderDcPrice = parseInt($('input[name=totalCouponOrderDcPrice]').val()) - parseInt($('#check'+val).data('price'));
                                        } else if ($('#check'+val).data('type') == 'add') {
                                            totalCouponOrderMileage = parseInt($('input[name=totalCouponOrderMileage]').val()) - parseInt($('#check'+val).data('price'));
                                        } else if ($('#check'+val).data('type') == 'delivery') {
                                            totalCouponDeliveryDcPrice = parseInt($('input[name=totalCouponDeliveryDcPrice]').val()) - parseInt($('#check'+val).data('price'));
                                        }
                                    });
                                }
                            }
                        },
                        error: function (e) {
                        }
                    });

                    if(checkCouponType) {
                        // 상품 적용쿠폰
                        if (totalCouponGoodsDcPrice > 0) {
                            $('input[name=totalCouponGoodsDcPrice]').val(totalCouponGoodsDcPrice);
                        }

                        if (totalCouponGoodsMileage > 0) {
                            $('input[name=totalCouponGoodsMileage]').val(totalCouponGoodsMileage);
                        }

                        if (orderCouponApplyNoArr) {
                            // 주문 적용쿠폰
                            if (totalCouponOrderDcPrice >= 0) {
                                $('input[name=totalCouponOrderDcPrice]').val(totalCouponOrderDcPrice);
                                $('input[name=totalCouponOrderPrice]').val(totalCouponOrderDcPrice);
                            }

                            if (totalCouponOrderMileage >= 0) {
                                $('input[name=totalCouponOrderMileage]').val(totalCouponOrderMileage);
                            }

                            // 배송비 적용쿠폰
                            if (totalCouponDeliveryDcPrice >= 0) {
                                $('input[name=totalCouponDeliveryPrice]').val(totalCouponDeliveryDcPrice);
                                $('input[name=totalCouponDeliveryDcPrice]').val(totalCouponDeliveryDcPrice);
                            }
                        }
                        gd_set_recalculation();
                        gd_set_real_settle_price();
                        alert('사용할 수 없는 쿠폰이 있어 제외 후 주문을 진행합니다.');
                    }
                }

                if (pass) {
                    $('.order-buy').attr("disabled",true);
                    $('.order-buy em').html("{=__('결제처리중')}");
                    $(document).on('click', '.layer_wrap .layer_close, .btn_box .btn_cancel', function(){
                        $('.order-buy').attr("disabled",false);
                        $('.order-buy em').html("{=__('결제하기')}");
                    });
                    form.target = 'ifrmProcess';
                    form.submit();
                }
            },
            rules: {
                <!--{ ? gd_is_login() == false }-->
                termAgreeGuest: 'required',
                termAgreeAgreement: 'required',
                termAgreePrivate: 'required',
                termAgreeUnder14: 'required',
                <!--{ / }-->
                <!--{? hasScmGoods}-->
                termAgreePrivateProvider: 'required',
                <!--{ / }-->
                orderName: 'required',
                orderCellPhone: 'required',
                orderEmail: {
                    required: true,
                    email: true
                },
                receiverName: {
                    required: receiveFl
                },
                receiverZonecode: {
                    required: receiveFl,
                    <!--{ ? !gGlobal.isFront }-->
                    number: true,
                    <!--{ : }-->
                    alphanumeric: true,
                    <!--{ / }-->
                },
                receiverAddress: {
                    required: receiveFl
                },
                receiverAddressSub: {
                    required: receiveFl
                },
                receiverCellPhone: {
                    required: receiveFl
                },
                visitName: {
                    required: visitFl
                },
                visitPhone: {
                    required: visitFl
                },
                bankSender: {
                    required: checkBank
                },
                bankAccount: {
                    required: checkBank
                },
                taxBusiNo: {
                    required: checkTax,
                    businessnoKR: checkTax
                },
                taxCompany: {
                    required: checkTax
                },
                taxCeoNm: {
                    required: checkTax
                },
                taxService: {
                    required: checkTax
                },
                taxItem: {
                    required: checkTax
                },
                <!--{ ? receipt['taxFl'] == 'y'  && taxInfo.eTaxInvoiceFl == 'y' }-->
                taxEmail: {
                    taxEmailChk: true
                },
                <!--{ / }-->
                taxAddress: {
                    required: checkTax
                }
            },
            messages: {
                <!--{ ? gd_is_login() == false }-->
                termAgreeGuest: {
                    required: "{=__('비회원 주문에 대한 개인정보 수집 이용에 동의해 주세요.')}"
                },
                termAgreeAgreement: {
                    required: "{=__('이용약관에 동의해 주세요.')}"
                },
                termAgreePrivate: {
                    required: "{=__('개인정보 수집 이용 약관에 동의해 주세요.')}"
                },
                termAgreeUnder14: {
                    required: "{=__('만 14세 이상임에 동의해 주세요.')}"
                },
                <!--{ / }-->
                <!--{? hasScmGoods}-->
                termAgreePrivateProvider: {
                    required: "{=__('상품 공급사 개인정보 제공에 동의해 주세요.')}"
                },
                <!--{ / }-->
                orderName: {
                    required: "{=__('주문하시는 분 정보를 입력해 주세요.')}"
                },
                orderCellPhone: {
                    required: "{=__('주문하시는 분 휴대폰 번호 정보를 입력해 주세요.')}"
                },
                orderEmail: {
                    required: "{=__('주문하시는 분 이메일 정보를 입력해 주세요.')}",
                    email: "{=__('이메일을 정확하게 입력해주세요.')}"
                },
                receiverName: {
                    required: "{=__('받으실 분 정보를 입력해 주세요.')}"
                },
                receiverZonecode: {
                    required: "{=__('받으실 곳 우편번호 정보를 입력해 주세요.')}",
                    <!--{ ? !gGlobal.isFront }-->
                    number: "{=__('숫자만 입력하실 수 있습니다.')}",
                    <!--{ : }-->
                    alphanumeric: "{=__('알파벳과 숫자로만 구성되어야 합니다.')}",
                    <!--{ / }-->
                },
                receiverAddress: {
                    required: "{=__('받으실 곳 주소 정보를 입력해 주세요.')}"
                },
                receiverAddressSub: {
                    required: "{=__('받으실 곳 주소 정보를 입력해 주세요.')}"
                },
                receiverCellPhone: {
                    required: "{=__('받으실 분 휴대폰 번호 정보를 입력해 주세요.')}"
                },
                visitName: {
                    required: "{=__('방문자명을 입력해 주세요.')}"
                },
                visitPhone: {
                    required: "{=__('방문자연락처를 입력해 주세요.')}"
                },
                bankSender: {
                    required: "{=__('입금자명을 입력해주세요.')}"
                },
                bankAccount: {
                    required: "{=__('입금은행을 선택해주세요.')}"
                },
                taxBusiNo: {
                    required: "{=__('[세금계산서] 사업자번호를 입력하세요.')}"
                },
                taxCompany: {
                    required: "{=__('[세금계산서] 회사명을 입력하세요.')}"
                },
                taxCeoNm: {
                    required: "{=__('[세금계산서] 대표자명을 입력하세요.')}"
                },
                taxService: {
                    required: "{=__('[세금계산서] 업태를 입력하세요.')}"
                },
                taxItem: {
                    required: "{=__('[세금계산서] 종목을 입력하세요.')}"
                },
                taxAddress: {
                    required: "{=__('[세금계산서] 사업장주소를 입력하세요.')}"
                }
            },
            focusInvalid: {
                receiverName: true,
                receiverZonecode: true,
                receiverAddress: true,
                receiverAddressSub: true,
                receiverCellPhone: true,
            }
        });

        if ($('input[name=settleKind]').length > 0) {
            // 일반결제 > 결제수단 선택 클릭 이벤트
            $('input[name=settleKind]').click(function(e){
                //페이코 결제가 아닐때 처리
                if ($(this).val().substring(0, 1) != 'f') {
                    gd_payment_reset();
                    gd_settlekind_selector($(this).val());
                }
            });
        }

        // 마일리지 체크 이벤트
        <!--{ ? gd_is_login() === true && mileageUse.payUsableFl != 'n' }-->
        gd_mileage_use_check('n', 'n', 'n');
        <!--{ / }-->
        $('input[name=useMileage]').blur(function(e){
            if (!_.isUndefined(e.isTrigger)) {
                gd_mileage_use_check('y', 'y', 'y');
            }
        });

        // 마일리지 쿠폰 중복사용 체크
        $('input[name=useMileage]').change(function (e) {
            // 마일리지 쿠폰 중복사용 체크
            e.preventDefault();
            gd_choose_mileage_coupon('mileage');
        });

        // 예치금 체크 이벤트
        $('input[name=useDeposit]').blur(function(e){
            if (!_.isUndefined(e.isTrigger)) {
                gd_deposit_use_check();
            }
        });

        // 배송지 선택
        $('input[name=shipping]:radio').click(function(e){
            switch ($(this).prop('id')) {
                // 기본배송지
                case 'shippingBasic':
                    if (!_.isEmpty(defaultShippingAddress)) {
                        gd_set_delivery_shipping_address(defaultShippingAddress);
                    } else {
                        alert("{=__('배송지관리 목록이 없습니다.')}");
                        return false;
                    }
                    break;

                // 최근 배송지
                case 'shippingRecently':
                    if (!_.isEmpty(recentShippingAddress)) {
                        gd_set_delivery_shipping_address(recentShippingAddress);
                    } else {
                        alert("{=__('최근 배송지가 없습니다.')}");
                        return false;
                    }
                    break;

                // 신규 배송지
                // 주문자정보와 동일
                case 'shippingNew':
                case 'shippingSameCheck':
                    gd_order_info_same();
                    break;
            }
            <!--{ ? gGlobal.isFront }-->
            gd_get_delivery_country_charge();
            <!--{ / }-->
            gd_reflect_apply_delivery($(this).prop('id'));
        });

        // 지역별 배송비 체크
        $(document).on('blur', 'input[name^=receiverAddressSub]', function(e){
            gd_get_delivery_area_charge();
        });

        // 해외 배송비 체크
        $('select[name=receiverCountryCode]').change(function(e){
            gd_get_delivery_country_charge();
        });

        // 페이지 로딩시 우선국가 지정으로 인해 배송비 체크
        if ($('select[name=receiverCountryCode]').val()) {
            $('select[name=receiverCountryCode]').trigger('change');
        }

        // 이메일 도메인 대입
        gd_select_email_domain('orderEmail');
        gd_select_email_domain('taxEmail','taxEmailDomain');
        $("#taxEmailDomain_chosen").width("120px");

        // 결제 방법 선택
        if ($('input[name=settleKind]').length > 0) {
            gd_settlekind_toggle();
        }

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

        // 기본배송비 설정에 따른 트리거 처리
        if (!_.isEmpty(defaultShippingAddress)) {
            $('#shippingBasic').prop('checked', true).trigger('click');
            gd_get_delivery_area_charge();
        } else {
            $('#shippingNew').prop('checked', true);
            $('label[for="shippingNew"]').addClass('on');
        }

        <!--{ ? receipt['taxFl'] == 'y' && memberInvoiceInfo['tax']['memberTaxInfoFl'] == 'y' }-->
        // 세금계산서 입력 정보 초기화
        $('.tax_info_init').on('click', function (e) {
            e.preventDefault();
            $('#tax_info').find('input').val('');
        });
        <!--{ / }-->

        gd_set_real_settle_price();
    });

    /**
     * 기본배송지 가져오기
     */
    function getDefaultShippingAddress()
    {
        return defaultShippingAddress;
    }

    /**
     * 기본배송지 설정하기
     */
    function gd_set_default_shipping_address(data)
    {
        defaultShippingAddress = data;
    }

    /**
     * 지역별 배송비 체크 (우편번호 팝업에서 콜백받는 함수)
     */
    function postcode_callback() {
        gd_get_delivery_area_charge();
    }

    /**
     * 주소에 따른 지역별 배송비 가져오기
     */
    function gd_get_delivery_area_charge() {
        var cartIdx = [];
        $('input[name="cartSno[]"]').each(function(idx){
            cartIdx.push($(this).val());
        });
        var params = {
            mode: 'check_area_delivery',
            cartSno: cartIdx,
            receiverAddress: $('input[name=receiverAddress]').val(),
            receiverAddressSub: $('input[name=receiverAddressSub]').val(),
            totalCouponOrderDcPrice: $('input:hidden[name="totalCouponOrderDcPrice"]').val(),
        };
        <!--{ ? isUseMultiShipping === true }-->
        if ($('input[name="multiShippingFl"]').prop('checked') === true) {
            params = {
                mode: 'check_multi_area_delivery',
                data: $('#frmOrder').serialize(),
                cartAllSno: cartIdx,
            };
        }
        <!--{ / }-->
        $.post('cart_ps.php', params, function(data){
            $('input[name=deliveryAreaCharge]').val(data.areaDelivery);
            gd_set_real_settle_price();

            <!--{ ? gd_is_login() === true && mileageUse.payUsableFl != 'n' }-->
            mileageUse = data.mileageUse;

            gd_mileage_use_check('y', 'n', 'n');
            <!--{ / }-->
        });
    }

    /**
     * 국가에 따른 해외 배송비 가져오기
     */
    function gd_get_delivery_country_charge()
    {
        // 국제 전화번호 셀렉트
        $('select[name=receiverPhonePrefixCode]').val($('select[name=receiverCountryCode]').val()).trigger('chosen:updated');
        $('select[name=receiverCellPhonePrefixCode]').val($('select[name=receiverCountryCode]').val()).trigger('chosen:updated');

        // 배송비 가져오기
        var cartIdx = [];
        $('input[name="cartSno[]"]').each(function(idx){
            cartIdx.push($(this).val());
        });
        var params = {
            mode: 'check_country_delivery',
            countryCode: $('select[name=receiverCountryCode]').val(),
            cartSno: cartIdx,
        };
        $.post('cart_ps.php', params, function(data){
            // 배송비 계산
            if (data.error === 1) {
                data.overseasDelivery = 0;
                data.overseasInsuranceFee = 0;
                alert(data.message);
            }

            $('#totalDeliveryCharge').text(gd_money_format(data.overseasDelivery));
            $('#totalDeliveryChargeAdd').text(gd_add_money_format(data.overseasDelivery));
            $('input[name=totalDeliveryCharge]').val(data.overseasDelivery);
            $('input[name=deliveryInsuranceFee]').val(data.overseasInsuranceFee);
            gd_set_real_settle_price();
        });
    }

    /**
     * 주문고객 정보와 배송지 정보 동일 처리
     */
    function gd_order_info_same()
    {
        var orderKey = new Array('orderName', 'orderCountryCode', 'orderZonecode', 'orderZipcode', 'orderState', 'orderCity', 'orderAddress', 'orderAddressSub', 'orderPhonePrefixCode', 'orderPhone', 'orderCellPhonePrefixCode', 'orderCellPhone');
        var receiverKey = new Array('receiverName', 'receiverCountryCode', 'receiverZonecode', 'receiverZipcode', 'receiverState', 'receiverCity', 'receiverAddress', 'receiverAddressSub', 'receiverPhonePrefixCode', 'receiverPhone', 'receiverCellPhonePrefixCode', 'receiverCellPhone');
        var sameCheck = $('#shippingSameCheck:checked').val();

        if (sameCheck == 'on') {
            var standardKey = orderKey;
        } else {
            var standardKey = receiverKey;
        }

        for (var i = 0; i < standardKey.length; i++) {
            var orderObj = $('select[name=\''+orderKey[i]+'\']:eq(0), input[name=\''+orderKey[i]+'\']:eq(0)');
            var receiverObj = $('select[name=\''+receiverKey[i]+'\']:eq(0), input[name=\''+receiverKey[i]+'\']:eq(0)');
            if (sameCheck == 'on') {
                if (_.isUndefined(orderObj.val())) {
                    continue;
                }

                // 값 입력
                receiverObj.val(orderObj.val());

                // 셀렉트박스 동적 업데이트 처리
                if (receiverObj[0].tagName == 'SELECT') {
                    receiverObj.trigger("chosen:updated");
                }

                if (receiverKey[i] == 'receiverZipcode' && orderObj.val() !='') {
                    $('input[name=receiverZipcode]').val(orderObj.val());
                }
            } else {
                if (_.isUndefined(receiverObj.val())) {
                    continue;
                }

                // 값 삭제
                receiverObj.val('');

                // 셀렉트박스 동적 업데이트 처리
                if (receiverObj[0].tagName == 'SELECT') {
                    receiverObj.trigger("chosen:updated");
                }
            }
        }

        <!--{ ? !gGlobal.isFront }-->
        // 지역별 배송비 실시간 추가
        $('input[name=receiverAddress], input[name=receiverAddressSub]').trigger('blur');
        <!--{ / }-->
    }

    /**
     * 배송지관리 주소 가져와 입력하기
     *
     * @param data
     */
    function gd_set_delivery_shipping_address(data, shippingNo)
    {
        if (!_.isUndefined(data.shippingName)) {
            var nameTails = '';
            if (shippingNo > 0) {
                nameTails = 'Add[' + shippingNo + ']';
            }

            $('input[name="receiverName' + nameTails + '"]').val(data.shippingName);
            $('input[name="receiverZonecode' + nameTails + '"]').val(data.shippingZonecode);
            $('select[name="receiverCountryCode' + nameTails + '"]').val(data.shippingCountryCode).trigger('chosen:updated');
            $('input[name="receiverCity' + nameTails + '"]').val(data.shippingCity);
            $('input[name="receiverState' + nameTails + '"]').val(data.shippingState);
            $('input[name="receiverAddress' + nameTails + '"]').val(data.shippingAddress);
            $('input[name="receiverAddressSub' + nameTails + '"]').val(data.shippingAddressSub);
            $('input[name="receiverPhonePrefixCode' + nameTails + '"]').val(data.shippingPhonePrefixCode).trigger('chosen:updated');
            $('input[name="receiverPhone' + nameTails + '"]').val(data.shippingPhone);
            $('input[name="receiverCellPhonePrefixCode' + nameTails + '"]').val(data.shippingCellPhonePrefixCode).trigger('chosen:updated');
            $('input[name="receiverCellPhone' + nameTails + '"]').val(data.shippingCellPhone);

            if (data.shippingZipcode !='') {
                $('input[name="receiverZipcode' + nameTails + '"]').val(data.shippingZipcode);
            }

            <!--{ ? !gGlobal.isFront }-->
            // 지역별 배송비 실시간 추가
            $('input[name="receiverAddress' + nameTails + '"], input[name="receiverAddressSub' + nameTails + '"]').trigger('blur');
            <!--{ : }-->
            // 해외배송비 체크
            $('select[name="receiverCountryCode' + nameTails + ']').trigger('change');
            <!--{ / }-->
        }
    }

    /**
     * 현재 결제 금액 체크
     * 우선순위 : 지역배송비 > 주문쿠폰 > 배송비쿠폰 > 마일리지 > 예치금
     *
     * @param exceptMode 제외할 모드
     */
    function gd_set_real_settle_price(exceptMode, isTax)
    {
        // 상품 금액
        var goodsPrice = parseFloat('{=totalGoodsPrice}');
        // 배송비
        <!--{?  gd_is_login() === true && productCouponChangeLimitType == 'n'}-->
        var deliveryPrice = parseFloat($('input[name=totalDeliveryCharge]').val());
        <!--{ : }-->
        var deliveryPrice = parseFloat('{=totalDeliveryCharge}');
        <!--{ / }-->
        <!--{ ? isUseMultiShipping === true }-->
        deliveryPrice = parseFloat(multiShippingPrice(deliveryPrice));
        <!--{ / }-->
        // 전체 금액
        var settlePrice = goodsPrice + deliveryPrice;
        // 상품 할인 차감
        var goodsDcPrice = parseFloat('{=totalGoodsDcPrice}');
        if (goodsDcPrice > 0) {
            settlePrice = settlePrice - goodsDcPrice;
        }
        // 상품 쿠폰 차감
        <!--{? gd_is_login() === true && productCouponChangeLimitType == 'n'}-->
            var goodsCouponDcPrice = parseFloat($('input[name=totalCouponGoodsDcPrice]').val());
        <!--{ : }-->
            var goodsCouponDcPrice = parseFloat('{=totalCouponGoodsDcPrice}');
        <!--{ / }-->
        if (goodsCouponDcPrice > 0) {
            settlePrice = settlePrice - goodsCouponDcPrice;
        }

        // 마이앱 할인 차감
        var myappDcPrice = parseFloat('{=totalMyappDcPrice}');
        if (myappDcPrice > 0) {
            settlePrice = settlePrice - myappDcPrice;
        }

        // 회원 할인 차감
        var totalMemberDcPrice = parseFloat($('input[name=totalMemberDcPrice]').val());
        var totalMemberOverlapDcPrice = parseFloat($('input[name=totalMemberOverlapDcPrice]').val());
        var totalSettlePrice = parseFloat(settlePrice) - totalMemberDcPrice - totalMemberOverlapDcPrice;

        // 실제 결제금액
        var realSettlePrice = totalSettlePrice;

        // 지역별 배송비 합산
        if ($('input[name=deliveryAreaCharge]').val() > 0) {
            var deliveryAreaCharge = parseInt($('input[name=deliveryAreaCharge]').val());
            realSettlePrice += deliveryAreaCharge;
            $('#deliveryAreaCharge').text(numeral(deliveryAreaCharge).format());
            $('#rowDeliverAreaCharge').removeClass('dn');
        } else {
            $('#deliveryAreaCharge').text(numeral(0).format());
            $('#rowDeliverAreaCharge').addClass('dn');
        }

        // 배송비 무료 차감
        <!--{ ? deliveryFree == 'y' }-->
        var deliveryFree = parseInt(deliveryPrice);
        $('.delivery-free').text(numeral(deliveryFree).format());
        $('input[name="totalDeliveryFreePrice"]').val(deliveryFree);
        realSettlePrice -= deliveryFree;
        <!--{ / }-->

        <!--{ ? gGlobal.isFront }-->
        // 해외 배송비 합산 (위에서 기본적으로 배송비가 포함되기 때문에 해외에서만 적용해야 함)
        if ($('input[name=totalDeliveryCharge]').val() > 0) {
            var deliveryOverseasCharge = parseInt($('input[name=totalDeliveryCharge]').val());
            realSettlePrice += deliveryOverseasCharge;
        }
        <!--{ / }-->

        // 해외배송 보험료 합산
        if ($('input[name=deliveryInsuranceFee]').val() > 0) {
            var deliveryInsuranceFee = parseInt($('input[name=deliveryInsuranceFee]').val());
            realSettlePrice += deliveryInsuranceFee;
            $('#deliveryInsuranceFee').text(gd_money_format(deliveryInsuranceFee));
            $('#deliveryInsuranceFeeAdd').text(gd_add_money_format(deliveryInsuranceFee));
            $('#rowDeliveryInsuranceFee').removeClass('dn');
        } else {
            $('#deliveryInsuranceFee').text(numeral(0).format());
            $('#rowDeliveryInsuranceFee').addClass('dn');
        }

        <!--{ ? couponUse == 'y' }-->
        if (exceptMode != 'coupon') {
            // 쿠폰기본설정에서 쿠폰만 사용일때 처리
            if ($('input[name="chooseCouponMemberUseType"]').val() == 'coupon' && $('input[name="couponApplyOrderNo"]').val() != '') {
                var memberDcPrice = totalMemberDcPrice + totalMemberOverlapDcPrice;
                if (memberDcPrice > 0) {
                    realSettlePrice += memberDcPrice;
                }
            }

            // 주문쿠폰 적용 금액
            if ($('input[name="totalCouponOrderDcPrice"]').val() > 0) {
                var originOrderPrice = {=totalGoodsPrice - totalGoodsDcPrice - totalCouponGoodsDcPrice} - totalMemberDcPrice - totalMemberOverlapDcPrice;
                var originOrderPriceWithoutMember = {=totalGoodsPrice - totalGoodsDcPrice - totalCouponGoodsDcPrice};
                // 쿠폰기본설정에서 쿠폰만 사용일때 처리
                if ($('input[name="chooseCouponMemberUseType"]').val() == 'coupon' && $('input[name="couponApplyOrderNo"]').val() != '') {
                    originOrderPrice = originOrderPriceWithoutMember;
                }

                if (!_.isUndefined(originOrderPrice) && $('input[name="totalCouponOrderPrice"]').val() > originOrderPrice) {
                    var useTotalCouponOrderDcPrice = parseFloat(originOrderPrice);
                } else {
                    var useTotalCouponOrderDcPrice = parseFloat($('input[name="totalCouponOrderPrice"]').val());
                }
                $('input[name="totalCouponOrderDcPrice"]').val(useTotalCouponOrderDcPrice);
                $('#useDisplayCouponDcPrice').text(numeral(useTotalCouponOrderDcPrice).format());
            } else {
                var useTotalCouponOrderDcPrice = 0;
            }

            // 배송비쿠폰 적용 금액
            if ($('input[name="totalCouponDeliveryDcPrice"]').val() > 0) {
                var originDeliveryCharge = numeral().unformat($('#totalDeliveryCharge').text()) + numeral().unformat($('#deliveryAreaCharge').text());
                if (!_.isUndefined($('input[name="deliveryFree"]')) && $('input[name="deliveryFree"]').val() == 'y') {
                    originDeliveryCharge -= numeral().unformat($('#totalDeliveryCharge').text());
                }
                if (!_.isUndefined(originDeliveryCharge) && $('input[name="totalCouponDeliveryPrice"]').val() > originDeliveryCharge) {
                    var useTotalCouponDeliveryDcPrice = parseFloat(originDeliveryCharge);
                } else {
                    var useTotalCouponDeliveryDcPrice = parseFloat($('input[name="totalCouponDeliveryPrice"]').val());
                }
                $('input[name="totalCouponDeliveryDcPrice"]').val(useTotalCouponDeliveryDcPrice);
                $('#useDisplayCouponDelivery').text(numeral(useTotalCouponDeliveryDcPrice).format());
            } else {
                var useTotalCouponDeliveryDcPrice = 0;
            }

            // 실 결제금액
            realSettlePrice -= (useTotalCouponOrderDcPrice + useTotalCouponDeliveryDcPrice);
        }
        <!--{ / }-->

        <!--{ ? gd_is_login() === true && mileageUse.payUsableFl != 'n' }-->
        if (exceptMode != 'mileage') {
            // 구매자가 작성한 마일리지 금액
            if ($('input[name=\'useMileage\']').val() > 0) {
                var useMileage = parseInt($('input[name=\'useMileage\']').val());
            } else {
                var useMileage = 0;
            }

            <!--{ ? mileageGiveExclude == 'n' }-->
            // 적립마일리지 지급 정책 안보이게 처리
            if (useMileage > 0) {
                $('.js_mileage').hide();
            } else {
                $('.js_mileage').show();
            }
            <!--{ / }-->

            realSettlePrice -= useMileage;
        }
        <!--{ / }-->

        <!--{ ? gd_is_login() === true && depositUse.payUsableFl != 'n' }-->
        if (exceptMode != 'deposit') {
            // 구매자가 작성한 예치금 금액
            if ($('input[name=\'useDeposit\']').val() > 0) {
                var useDeposit = parseInt($('input[name=\'useDeposit\']').val());
            } else {
                var useDeposit = 0;
            }
            realSettlePrice -= useDeposit;
        }
        <!--{ / }-->

        // 금액 화면 출력
        if (_.isUndefined(exceptMode)) {
            $('#totalSettlePrice').html(gd_money_format(realSettlePrice));
            $('#totalAddSettlePrice').html(gd_add_money_format(realSettlePrice));
            $('#totalSettlePriceView').html(gd_money_format(realSettlePrice));
            $('#totalAddSettlePriceView').html(gd_add_money_format(realSettlePrice));
            $('input[name=settlePrice]').val(realSettlePrice);

            // 해외PG 최종승인 금액 및 통화 설정
            var settleKind = $('input[name=settleKind]:checked').val();
            if (!_.isUndefined(settleKind)) {
                if (settleKind.substring(0, 1) == 'o') {
                    var selectedOverseasSettleKind = $('[id=settlekind_overseas_' + settleKind + ']');
                    var overseasSettlePrice = fx.convert($('input[name=settlePrice]').val(), {to: selectedOverseasSettleKind.data('settle-currency')});
                    var overseasDecimal = selectedOverseasSettleKind.data('settle-decimal');
                    var overseasDecimalFormat = selectedOverseasSettleKind.data('settle-format');
                    $('#overseasSettelprice_' + settleKind).html(selectedOverseasSettleKind.data('settle-symbol') + ' ' + numeral(overseasSettlePrice.toRealFixed(overseasDecimal, overseasDecimalFormat)).format('0,' + overseasDecimalFormat));
                    $('input[name=overseasSettlePrice]').val(overseasSettlePrice.toRealFixed(overseasDecimal, overseasDecimalFormat));
                    $('input[name=overseasSettleCurrency]').val(selectedOverseasSettleKind.data('settle-currency'));
                }
            }

            // 금액이 0원이 되는 경우에 대한 처리
            <!--{ ? receipt['taxZeroFl']  =='y' }-->
            if (realSettlePrice == 0) {
                $('.payment_progress .js_pay_content').hide();
                gd_receipt_selector('zero');
            } else {
                $('.payment_progress .js_pay_content').show();
                gd_receipt_selector();
            }
            <!--{ : }-->
            if (realSettlePrice == 0) {
                $('.payment_progress .payment_progress_list').hide();
            } else {
                $('.payment_progress .payment_progress_list').show();
            }
            <!--{ / }-->
        }

        // 세금계산서 가능여부 노출 (세금정보 조건에 따라 실결제금액이 0원인 경우 세금계산서 발행 불가 처리)
        var taxRealSettlePrice = realSettlePrice;
        var taxMileageFl = '{taxInfo.TaxMileageFl}',
            taxDepositFl = '{taxInfo.taxDepositFl}',
            taxDeliveryFl = '{taxInfo.taxDeliveryFl}';

        if (taxMileageFl == 'y') {
            taxRealSettlePrice += numeral().unformat($('input[name="useMileage"]').val());
        }

        if (taxDepositFl == 'y') {
            taxRealSettlePrice += numeral().unformat($('input[name="useDeposit"]').val());
        }

        if (taxDeliveryFl == 'n') {
            taxRealSettlePrice -= numeral().unformat($('#totalDeliveryCharge').text());
        }

        if (taxRealSettlePrice <= 0) {
            $('#taxReceiptView').hide();
        } else {
            $('#taxReceiptView').show();
        }

        return realSettlePrice;
    }

    <!--{ ? gd_is_login() === true && mileageUse.payUsableFl != 'n' }-->
    function gd_mileage_disable_check(disableValue)
    {
        if(disableValue === 'y'){
            //disable 처리
            $('input[name=\'useMileage\'], #useMileageAll').closest('span').addClass('disabled');
            $('input[name=\'useMileage\'], #useMileageAll').attr('disabled', 'disabled');
        }
        else {
            //disable 해제
            $('input[name=\'useMileage\'], #useMileageAll').closest('span').removeClass('disabled');
            $('input[name=\'useMileage\'], #useMileageAll').attr('disabled', false);
        }
    }

    /**
     * 마일리지 안내문구 출력
     */
    function gd_mileage_info_write(message)
    {
        var prefixMessage = "※ ";
        var addHtml = '<span>';
        for(i=0; i<message.length; i++) {
            addHtml += prefixMessage + message[i] + "<br/>";
        }
        addHtml += '</span>';
        $(".js-mileageInfoArea").html(addHtml);
    }

    /**
     * 마일리지 사용 제한 체크
     */
    function gd_mileage_use_check(setUseOption, setUseCheck, setUseCalculationFl)
    {
        mileageUse.minimumHold = parseInt(mileageUse.minimumHold);
        mileageUse.minimumLimit = parseInt(mileageUse.minimumLimit);
        mileageUse.orderAbleLimit = parseInt(mileageUse.orderAbleLimit);
        mileageUse.orderAbleStandardPrice = parseInt(mileageUse.orderAbleStandardPrice);
        mileageUse.maximumLimit = parseInt(mileageUse.maximumLimit);
        mileageUse.oriMaximumLimit = parseInt(mileageUse.oriMaximumLimit);

        // 회원 보유 마일리지
        var memMileage = parseInt('{=gMemberInfo.mileage}');

        // 현재 결제 금액
        var realSettlePrice = gd_set_real_settle_price('mileage');
        // 배송비가 제외된 금액 (할인등은 포함되어 있는 상태)
        var goodsPrice = gd_get_goodsSalesPrice(realSettlePrice);

        // 배송비 포함 여부를 통해 비교 결제금액을 정의
        if(mileageUse.useDeliveryFl === 'n'){
            var realSettleDeliveryPrice = goodsPrice;
        }
        else {
            var realSettleDeliveryPrice = realSettlePrice;
        }

        // 실제 사용할 수 있는 최소 마일리지
        var realMinMileage = parseInt(Math.min(mileageUse.minimumLimit, realSettleDeliveryPrice));

        // 실제 사용 할 수 있는 최대 마일리지 ( ex: 배송비를 제외한 상품 함계급액이 2000원, 회원 마일리지 5000원일시 2000원 까지 사용 가능)
        var realMaxMileage = parseInt(Math.min(mileageUse.maximumLimit, realSettleDeliveryPrice, memMileage));

        // 마일리지 사용 불가능한 상태의 input 을 입력방지
        if(mileageUse.usableFl === 'n'){
            gd_mileage_disable_check('y');
        }
        else {
            gd_mileage_disable_check('n');
        }

        // 마일리리 사용 가능, 사용 불가 이유 문구 출력 수정을 위함.
        var gdArrMileageWrite =  new Array();

        // 마일리지 "최소 상품구매금액 제한"에 따른 플래그값
        var fl = 'n';

        // 마일리지 "최소 상품구매금액 제한"에 따른 마일리지 사용 조건 체크
        if(mileageUse.orderAbleLimit > 0){
            // orderAbleStandardPrice : 기본설정의 구매금액 기준 + 사용설정의 할인금액 미포함, 포함 가격이 적용된 기준
            if(mileageUse.orderAbleStandardPrice < mileageUse.orderAbleLimit){
                fl = 'y';
            }
        }

        // *** 1. 보유 마일리지에 대한 제한조건 체크

        // 회원 보유 마일리지 체크
        if(memMileage < 1){
            gd_mileage_disable_check('y');
            return;
        }

        // 마일리지 사용설정 - 최소 보유마일리지 제한
        if(mileageUse.minimumHold > 0){
            // '회원 보유마일리지'가 '최소 보유마일리지 제한' 보다 작을 경우
            if(memMileage < mileageUse.minimumHold){
                if(mileageUse.minimumLimit <= mileageUse.minimumHold){
                    gdArrMileageWrite.push("{=__('%s%s이상 보유해야 사용이 가능합니다.', gd_global_money_format(mileageUse.minimumHold), mileage.unit)}");
                }
                else {
                    // '최소 사용마일리지 제한' > '최소 보유마일리지 제한' > 회원 보유 마일리지
                    gdArrMileageWrite.push("{=__('최소 %s%s이상 사용해야 합니다.', gd_global_money_format(mileageUse.minimumLimit), mileage.unit)}");
                }
                if(fl == 'y') {
                    gdArrMileageWrite.push(gd_mileage_goods_total_check_message());
                }
                gd_mileage_info_write(gdArrMileageWrite);
                gd_mileage_disable_check('y');
                return;
            }
        }

        // 마일리지 사용설정 - 최소 사용마일리지 제한
        if(mileageUse.minimumLimit > 0){
            // '회원 마일리지' 보다 '최소 사용마일리지 제한' 보다 작을 경우
            if(memMileage < mileageUse.minimumLimit){
                if(mileageUse.minimumHold <= mileageUse.minimumLimit){
                    gdArrMileageWrite.push("{=__('최소 %s%s이상 사용해야 합니다.', gd_global_money_format(mileageUse.minimumLimit), mileage.unit)}");
                }
                else {
                    // '최소 보유마일리지 제한' > '최소 사용마일리지 제한' > 회원 보유 마일리지
                    gdArrMileageWrite.push("{=__('%s%s이상 보유해야 사용이 가능합니다.', gd_global_money_format(mileageUse.minimumHold), mileage.unit)}");
                }
                if(fl == 'y') {
                    gdArrMileageWrite.push(gd_mileage_goods_total_check_message());
                }
                gd_mileage_info_write(gdArrMileageWrite);
                gd_mileage_disable_check('y');
                return;
            }
        }

        // 마일리지 사용설정 - 최소 사용마일리지 제한
        if(mileageUse.minimumLimit > 0){
            // 결제금액이 '최소 사용마일리지 제한' 보다 작을 경우
            if(realSettleDeliveryPrice < mileageUse.minimumLimit){
                var messageMaxMileage = memMileage;
                if(mileageUse.oriMaximumLimit > 0){
                    if(mileageUse.oriMaximumLimit > realSettleDeliveryPrice){
                        messageMaxMileage = Math.min(mileageUse.oriMaximumLimit, memMileage);
                    }
                }
                gdArrMileageWrite.push(__('%1$s%2$s부터 %3$s%4$s까지 사용 가능합니다.', [numeral(mileageUse.minimumLimit).format(), '{mileage.unit}', numeral(messageMaxMileage).format(), '{mileage.unit}']));
                if(fl == 'y') {
                    gdArrMileageWrite.push(gd_mileage_goods_total_check_message());
                }
                gd_mileage_info_write(gdArrMileageWrite);
                gd_mileage_disable_check('y');
                return;
            }
        }

        // *** 3. 사용가능 마일리지 범위 정보 노출

        if(realMinMileage > realMaxMileage){
            //최소 사용가능 마일리지가 최대 사용가능 마일리지보다 클때
            gdArrMileageWrite.push("{=__('마일리지 사용조건이 충족되지 않아 사용이 불가합니다.')}");
            gd_mileage_info_write(gdArrMileageWrite);
            gd_mileage_disable_check('y');
            return;
        }
        else if(realMinMileage === realMaxMileage){
            //최소 사용가능 마일리지가 최대 사용가능 마일리지와 같을때
            gdArrMileageWrite.push(__('%1$s%2$s만 사용 가능합니다.', [numeral(realMaxMileage).format(), '{mileage.unit}']));
            gd_mileage_disable_check('n');
            if(fl == 'y') {
                gdArrMileageWrite.push(gd_mileage_goods_total_check_message());
                gd_mileage_disable_check('y');
            }
            gd_mileage_info_write(gdArrMileageWrite);

        }
        else {
            //최소 사용가능 마일리지가 최대 사용가능 마일리지보다 작을때
            if(realMinMileage < 1){
                gdArrMileageWrite.push(__('%1$s%2$s까지 사용 가능합니다.', [numeral(realMaxMileage).format(), '{mileage.unit}']));
            }
            else {
                gdArrMileageWrite.push(__('%1$s%2$s부터 %3$s%4$s까지 사용 가능합니다.', [numeral(realMinMileage).format(), '{mileage.unit}', numeral(realMaxMileage).format(), '{mileage.unit}']));
            }
            gd_mileage_disable_check('n');
            if(fl == 'y') {
                gdArrMileageWrite.push(gd_mileage_goods_total_check_message());
                gd_mileage_disable_check('y');
            }
            gd_mileage_info_write(gdArrMileageWrite);

        }

        // *** 4. 사용가능 마일리지 범위 체크 및 결제금액 계산

        if(setUseOption === 'y'){
            var useMileage = parseInt($('input[name=\'useMileage\']').val());

            if(setUseCheck === 'y'){
                if(useMileage < realMinMileage){
                    gd_mileage_abort(__('%1$s 사용은 최소 %2$s%3$s입니다.', ['{mileage.name}', numeral(realMinMileage).format(), '{mileage.unit}']), realMinMileage);
                }
                if(useMileage > realMaxMileage){
                    gd_mileage_abort(__('%1$s 사용은 최대 %2$s%3$s입니다.', ['{mileage.name}', numeral(realMaxMileage).format(), '{mileage.unit}']), realMaxMileage);
                }
            }
            else {
                if(useMileage < realMinMileage){
                    $('input[name=\'useMileage\']').val(realMinMileage);
                }
                else if(useMileage > realMaxMileage){
                    $('input[name=\'useMileage\']').val(realMaxMileage);
                }
                else { }
            }

            if(setUseCalculationFl === 'y'){
                // 결제 금액 계산
                gd_set_recalculation();
                gd_set_real_settle_price();
            }
        }
    }

    /**
     * 마일리지 "최소 상품구매금액 제한" 문구 반복 출력을 위함.
     */
    function gd_mileage_goods_total_check_message()
    {
        return ("{=__('상품 합계 금액이 %s 이상인 경우에만 사용 가능합니다.', gd_global_currency_display(mileageUse.orderAbleLimit))}");
    }

    /**
     * 마일리지를 잘못 입력한 경우 처리
     */
    function gd_mileage_abort(message, useMileage)
    {
        // 경고출력
        if (!_.isUndefined(message) && message !== null) {
            alert(message);
        }

        // 값 대입
        if (_.isUndefined(useMileage)) {
            $('input[name=\'useMileage\']').val('');
        } else {
            $('input[name=\'useMileage\']').val(useMileage);
        }
    }

    /**
     * 마일리지 전액 사용하기
     */
    function gd_mileage_use_all()
    {
        // 마일리지 쿠폰 중복사용 체크
        var checkMileageCoupon = gd_choose_mileage_coupon('mileage');
        if (!checkMileageCoupon) {
            return false;
        }
        var allCheck = $('#useMileageAll:checked').val();

        // 현재 결제 금액
        var realSettlePrice = gd_set_real_settle_price('mileage');
        if(mileageUse.useDeliveryFl === 'n'){
            // 마일리지 사용의 배송비 제외 설정에 따른 배송비 체크
            realSettlePrice = gd_get_goodsSalesPrice(realSettlePrice);
        }

        var memberMileage = parseInt("{=gMemberInfo.mileage}");
        var checkMileage = Math.min(mileageUse.maximumLimit, realSettlePrice, memberMileage);

        if (allCheck == 'on') {
            $('input[name=\'useMileage\']').val(checkMileage);

            gd_mileage_use_check('y', 'y', 'y');
        }
        else {
            $('input[name=\'useMileage\']').val('');

            gd_set_recalculation();
            gd_set_real_settle_price();
        }
    }
    <!--{ / }-->

    <!--{ ? gd_is_login() === true && depositUse['payUsableFl'] != 'n' }-->
    /**
     * 예치금 사용 제한 체크
     */
    function gd_deposit_use_check()
    {
        // 예치금 작성한 금액이 있는지 체크
        if ($('input[name=\'useDeposit\']').val() < 0) {
            return;
        }

        // 현재 결제 금액
        var realSettlePrice = gd_set_real_settle_price('deposit');
        var memberDeposit = parseInt({=gMemberInfo.deposit});
        var ownDeposit = parseInt({=gMemberInfo.deposit});
        var checkDeposit = memberDeposit;

        if (realSettlePrice < memberDeposit) {
            checkDeposit = realSettlePrice;
        }
        if (realSettlePrice > ownDeposit) {
            checkDeposit = ownDeposit;
        }

        // 구매자가 작성한 예치금 금액
        var useDeposit = parseInt($('input[name=\'useDeposit\']').val());

        // 예치금 사용 제한 체크
        if (useDeposit > checkDeposit) {
            $('input[name=\'useDeposit\']').val(checkDeposit);
        }

        // 결제 금액 계산
        gd_set_real_settle_price();
    }

    /**
     * 예치금 전액 사용하기
     */
    function deposit_use_all()
    {
        // 현재 결제 금액
        var realSettlePrice = gd_set_real_settle_price('deposit');
        var allCheck = $('#useDepositAll:checked').val();
        var memberDeposit = parseInt({=gMemberInfo.deposit});
        var checkDeposit = memberDeposit;

        if (realSettlePrice < memberDeposit) {
            checkDeposit = realSettlePrice;
        }

        if (allCheck == 'on') {
            $('input[name=\'useDeposit\']').val(checkDeposit);
        } else {
            $('input[name=\'useDeposit\']').val('');
        }

        // 결제 금액 계산
        gd_set_real_settle_price();
    }
    <!--{ / }-->

    /**
     * 결제 방법에 따른 결제 수단
     */
    function gd_settlekind_toggle()
    {
        // 초기 결제수단 처리
        <!--{ ? gGlobal.isFront }-->
        var settleKind = $('#settlekind_overseas').find('input').first().val();
        $('#settlekind_overseas').find('input').first().prop('checked', true);
        $('label[for=settleKind_' + settleKind + ']').addClass('on')
        <!--{ : }-->
    <!--{ ? isset(settle.payco) }-->
        var settleKind = $('#settlekind_payco').find('input').first().val();
        gd_payco_toggle(settleKind);
        <!--{ : }-->
        var settleKind = $('#settlekind_general').find('input').first().val();
        $('#settlekind_general').find('input').first().prop('checked', true);
        $('label[for=settleKind_' + settleKind + ']').addClass('on')
        <!--{ / }-->
    <!--{ / }-->

    // 결제수단 선택
    gd_settlekind_selector(settleKind);
    }

    /**
     * 결제 수단을 초기화
     */
    function gd_payment_reset()
    {
        // 주문 채널을 기본 shop 으로 처리
        $('[name="orderChannelFl"]').val('shop');

    }

    /**
     * PAYCO 결제 클릭시
     */
    function gd_payco_toggle(settleKind)
    {
        // 초기화
        gd_payment_reset()

        // 주문 채널
        $('[name="orderChannelFl"]').val('payco');

        // 해당 주문 체크
        $('#settleKind_payco_' + settleKind).prop('checked', true).next('label').addClass('on');

        // 다른 주문 체크 해제
        $('label[for*=settleKind_][class="choice_s on"]').each(function(i, val) {
            $(this).removeClass('on');
        });


        // 결제방법 체크
        gd_settlekind_selector(settleKind);
    }

    /**
     * 결제수단 선택
     *
     * @param settleKind
     * @returns {boolean}
     */
    function gd_settlekind_selector(settleKind)
    {
        // 결제수단 값이 없는 경우 반드시 해당 settleKind를 radio 버튼에 checked 표기 해줘야 한다.
        // 만약 이부분 누락되면 결제수단 카드로 열리는 경우가 발생
        if (_.isUndefined(settleKind)) {
            settleKind = $('label[for*=settleKind_][class="choice_s on"]').prev('input[type=radio]').val();
            $('label[for*=settleKind_][class="choice_s on"]').prev('input[type=radio]').prop('checked', true);
        }

        // 결제수단 선택에 따른 입력 폼 전환
        $('[id*="settlekind_general_"]').hide();
        $('[id*="settlekind_overseas_"]').hide();

        if ($('[name="orderChannelFl"]').val() == 'shop') {
            // 일반 PG 안내 / 설정
            $('[id=settlekind_general_' + settleKind + ']').show();

            // 해외PG 최종승인 금액 및 통화 설정 (국가 변경시 배송비 실시간 적용 처리)
            if (settleKind.substring(0, 1) == 'o') {
                // 해외 PG 안내 / 설정
                $('[id=settlekind_overseas_' + settleKind + ']').show();
                gd_set_real_settle_price();
            }
        }

        // 영수증 선택 리셋
        gd_receipt_reset();

        <!--{ ? receipt['cashFl'] == 'y' || receipt['taxFl'] == 'y' }-->
        // 영수증 선택
        gd_receipt_selector();
        <!--{ / }-->
    }

    /**
     * 영수증 선택 리셋
     * - 우선 처리 모드에 따라서 영수증 종류 기본 선택 처리
     */
    function gd_receipt_reset()
    {
        // 선택된 결제 방법
        var strSettleKind = $('input[name=settleKind]:checked').val();

        // 현금영수증 (소득공제/지출증빙) 보이지 않도록 강제 처리
        $('input[name="receiptFl"]').prop('checked', false).next('label').removeClass('on');

        // 영수증 신청 안함 보이게 처리
        $('#nonReceiptView').show();

        // 사용 안함을 기본 체크 처리
        if (strSettleKind.substring(0, 1) != 'g' || '{=gd_isset(receipt['aboveFl'], 'n')}' == 'n'){
        $('#receiptNon').eq(0).prop('checked', true).next('label').addClass('on');
    }

        <!--{ ? receipt['aboveFl'] == 'r' || receipt['aboveFl'] == 't' }-->
        // 결제 방법의 코드가 일반 인 경우
        if (strSettleKind.substring(0, 1) == 'g') {
            // 영수증 신청 안함 안보이게 처리
            $('#nonReceiptView').hide();

            <!--{ ? receipt['aboveFl'] == 'r' }-->
            // 현금영수증을 기본 체크 처리
            $('#receiptCash').eq(0).prop('checked', true).next('label').addClass('on');
            <!--{ / }-->
        }

        <!--{ ? receipt['aboveFl'] == 't' }-->
        // 세금계산서를 기본 체크 처리
        var useReceiptCode = {receipt['useReceiptCode']};
        $.each(useReceiptCode, function(i, val) {
            if (strSettleKind == val) {
                $('#receiptNon').eq(0).prop('checked', false).next('label').removeClass('on');
                $('#receiptTax').eq(0).prop('checked', true).next('label').addClass('on');
                return false;
            }
        });
        <!--{ / }-->
        <!--{ / }-->
    }

    /**
     * 영수증 선택
     *
     * @param string mode 모드에 따른 처리 (null : 일반 처리, zero : 전액결제 처리)
     */
    function gd_receipt_selector(mode)
    {
        <!--{ ? receipt['cashFl'] == 'y' || receipt['taxFl'] == 'y' }-->
        var useReceiptCode = {receipt['useReceiptCode']};
        var useCashReceiptCode = 'gb';
        var strSettleKind = $('input[name=settleKind]:checked').val();

        $('#receiptSelect').hide();
        if (typeof strSettleKind != 'undefined') {
            $.each(useReceiptCode, function(i, val) {
                if (strSettleKind == val) {
                    $('#receiptSelect').show();
                    return false;
                }
            });
        }

        // 전액 결제인 경우 영수증 항목 보이기
        if (mode == 'zero') {
            $('#receiptSelect').show();
        }

        // 영수증 관련 선택
        gd_receipt_display();

        // 현금 영수증 설정 (무통장입금인 경우에만 출력, 계좌이체와 가상계좌는 PG사 창에서 처리)
        if (strSettleKind == useCashReceiptCode) {
            $('#cashReceiptView').show();
            $('.cash_receipt_non').show();
            $('.cash_receipt_pg').hide();
        } else {
            $('#cashReceiptView').hide();
            $('.cash_receipt_non').hide();
            $('.cash_receipt_pg').show();
        }

        // 전액 결제인 경우 영수증 항목 보이기
        if(mode == 'zero') {
            $('#cashReceiptView').hide();
            $('.cash_receipt_non').show();
            $('.cash_receipt_pg').hide();
        }

        <!--{ / }-->
    }

    <!--{ ? receipt['cashFl'] == 'y' || receipt['taxFl'] == 'y' }-->
    /**
     * 영수증 관련 선택
     *
     * @param string clearChecker 해제 관련
     */
    function gd_receipt_display()
    {
        var useCode = {
            t: 'tax_info',
            r: 'cash_receipt_info'
        };
        var checkedBox = $('input[name=receiptFl]:checked');
        var target = eval('useCode.' + checkedBox.val());

        $('.js_receipt').addClass('dn');
        $('#' + target).removeClass('dn');

        if (checkedBox.val() == 'r') {
            gd_cash_receipt_toggle();
        }

        <!--{ ? receipt['taxFl'] == 'y' && memberInvoiceInfo['tax']['memberTaxInfoFl'] == 'y' }-->
        $('.tax_info_init').addClass('dn');
        if (checkedBox.val() == 't') {
            $('.tax_info_init').removeClass('dn');
        }
        <!--{ / }-->
    }
    <!--{ / }-->

    /**
     * 현금영수증 인증방법 선택
     * (소득공제용 - 휴대폰 번호(c), 지출증빙용 - 사업자번호(b))
     */
    function gd_cash_receipt_toggle()
    {
        <!--{ ? receipt['cashFl'] == 'y' }-->
        var certCode = $('input[name=\'cashUseFl\']:checked').val();
        $('label[for=cashCert_' + certCode + ']').addClass('on');

        if (certCode == 'd') {
            $('input[name=\'cashCertFl\']').val('c');
            $('#certNoHp').show();
            $('#certNoBno').hide();
        } else {
            $('input[name=\'cashCertFl\']').val('b');
            $('#certNoHp').hide();
            $('#certNoBno').show();
        }
        <!--{ / }-->
    }

    /**
     * 주문시 Exception 발생하는 경우 결제버튼 복원
     */
    function callback_not_ordable()
    {
        $('.order-buy').prop("disabled", false);
        $('.order-buy em').html("{=__('결제하기')}");
    }

    /**
     * validator onkeyup 함수
     * @param element
     * @param event
     * @returns {boolean}
     */
    function onkeyup(element, event) {
        if (check_key_code2(event)) {
            return true;
        }
        if ($.isFunction(replace_keyup[$(element).data('pattern')])) {
            replace_keyup[$(element).data('pattern')](element);
        }
    }

    var regexp_test = function (string, pattern) {
        if (string === undefined || string.length < 1) {
            return false;
        }
        return pattern.test(string);
    };

    var replace_pattern = function (string, pattern, c) {
        if (string === undefined || string.length < 1) {
            return '';
        }
        return string.replace(pattern, c);
    };

    var replace_keyup = {
        gdEngNum: function (element) {
            element.value = replace_pattern(element.value, /[^\da-zA-Z]/g, '');
        },
        gdEngKor: function (element) {
            // IE11에서 초중종성 분리되는 현상때문에 test 후 replace 처리로 변경
            if (regexp_test(element.value, /[^a-zA-Zㄱ-ㅎㅏ-ㅣ가-힣\u119E\u11A2\u318D\u2022\u2025a\u00B7\uFE55]/)) {
                element.value = replace_pattern(element.value, /[^a-zA-Zㄱ-ㅎㅏ-ㅣ가-힣\u119E\u11A2\u318D\u2022\u2025a\u00B7\uFE55]/g, '');
            }
        },
        gdEngKorNum: function (element) {
            // IE11에서 초중종성 분리되는 현상때문에 test 후 replace 처리로 변경
            if (regexp_test(element.value, /[^a-zA-Zㄱ-ㅎㅏ-ㅣ가-힣0-9\u119E\u11A2\u318D\u2022\u2025a\u00B7\uFE55]/)) {
                element.value = replace_pattern(element.value, /[^a-zA-Zㄱ-ㅎㅏ-ㅣ가-힣0-9\u119E\u11A2\u318D\u2022\u2025a\u00B7\uFE55]/g, '');
            }

        },
        gdNum: function (element) {
            element.value = replace_pattern(element.value, /[^\d]/g, '');
        },
        gdEng: function (element) {
            element.value = replace_pattern(element.value, /[^a-zA-Z]/g, '');
        },
        gdKor: function (element) {
            if (regexp_test(element.value, /[^가-힣ㄱ-ㅎㅏ-ㅣ\u119E\u11A2\u318D\u2022\u2025a\u00B7\uFE55]/)) {
                element.value = replace_pattern(element.value, /[^가-힣ㄱ-ㅎㅏ-ㅣ\u119E\u11A2\u318D\u2022\u2025a\u00B7\uFE55]/g, '');
            }
        },
        gdMemberId: function (element) {
            element.value = replace_pattern(element.value, /[^\da-zA-Z\.\-_@]/g, '');
        },
        gdMemberNmGlobal: function (element) {
            // IE11에서 초중종성 분리되는 현상때문에 test 후 replace 처리로 변경
            if (regexp_test(element.value, /[\/\'\"\\\|]/)) {
                element.value = replace_pattern(element.value, /[\/\'\"\\\|]/g, '');
            }
        }
    };

    /**
     * jquery validation의 키 체크 함수
     * @param event
     * @returns {boolean}
     */
    function check_key_code2(event) {
        // Avoid revalidate the field when pressing one of the following keys
        /* Shift       => 16 Ctrl        => 17 Alt         => 18
         Caps lock   => 20 End         => 35 Home        => 36
         Left arrow  => 37 Up arrow    => 38 Right arrow => 39
         Down arrow  => 40 Insert      => 45 Num lock    => 144 AltGr key   => 225*/
        var excludedKeys = [
            16, 17, 18, 20, 35, 36, 37,
            38, 39, 40, 45, 144, 225
        ];

        return event.which === 9 || $.inArray(event.keyCode, excludedKeys) !== -1;
    }

    function gd_reflect_apply_delivery(mode) {
        switch (mode) {
            case 'shippingBasic':
                $('input[name="reflectApplyDelivery"]').prop('checked', false).closest('div').hide();
                break;
            default:
                $('input[name="reflectApplyDelivery"]').closest('div').show();
                break;
        }

        gd_display_memberinfo_apply();
    }

    /**
     * 마일리지 쿠폰 중복사용 체크
     */
    function gd_choose_mileage_coupon(type) {
        if (type == undefined) {
            return false;
        }

        // 마일리지 쿠폰 중복사용 체크
        if ($('input[name=chooseMileageCoupon]').length > 0) {
            if ($('input[name=chooseMileageCoupon]').val() == 'y') {
                if (type == 'mileage') {
                    // 마일리지 입력시 체크
                    if ($('input[name=totalCouponGoodsDcPrice]').length > 0 && $('input[name=totalCouponGoodsMileage]').length > 0) {
                        var totalCouponGoodsDcPrice = $('input[name=totalCouponGoodsDcPrice]').val();
                        var totalCouponGoodsMileage = $('input[name=totalCouponGoodsMileage]').val();

                        if (totalCouponGoodsDcPrice > 0 || totalCouponGoodsMileage > 0 || ($('input[name=couponApplyOrderNo]').val() != '' && $('input[name=couponApplyOrderNo]').length > 0)) {
                            alert('마일리지와 쿠폰은 동시에 사용하실 수 없습니다.');
                            $('input[name=useMileage]').val('');
                            $("#useMileageAll").attr('checked', false);
                            $('label[for=useMileageAll]').removeClass('on');
                            return false;
                        }
                    }
                } else {
                    // 쿠폰사용 클릭시 체크
                    if ($('input[name=useMileage]').val() != '' && $('input[name=useMileage]').val() != 0) {
                        alert('마일리지와 쿠폰은 동시에 사용하실 수 없습니다.');
                        return false;
                    }
                }
            }
        }

        return true;
    }

    // 주문서 변경에 따른 상품 금액 정보 변경 처리
    function gd_set_recalculation()
    {
        // 마일리지 사용시 / 주문쿠폰 적용시 재계산
        var cartIdx = [];
        $('input[name="cartSno[]"]').each(function(idx){
            cartIdx.push($(this).val());
        });
        $.ajax({
            method: "POST",
            data: {
                'mode': 'set_recalculation',
                'cartIdx': cartIdx,
                'totalCouponOrderDcPrice': $('input:hidden[name="totalCouponOrderDcPrice"]').val(),
                'deliveryFree': $('input:hidden[name="deliveryFree"]').val(),
                'useMileage': $('input[name="useMileage"]').val(),
                'totalDeliveryCharge' : $('input[name=totalDeliveryCharge]').val(),
                'deliveryAreaCharge' : $('input[name=deliveryAreaCharge]').val(),
            },
            cache: false,
            async: false,
            url: "../order/order_ps.php",
            success: function (data) {
                if (data) {
                    var totalGoodsDcPrice = data.totalGoodsDcPrice;
                    var totalSumMemberDcPrice = data.totalMemberDcPrice + data.totalMemberOverlapDcPrice;
                    var totalCouponGoodsDcPrice = data.totalCouponGoodsDcPrice;
                    var totalMemberMileage = data.totalMemberMileage;
                    var totalGoodsMileage = data.totalGoodsMileage;
                    var totalMileage = data.totalMileage;
                    var totalMyappDcPrice = data.totalMyappDcPrice;

                    var totalMemberDcPrice = totalGoodsDcPrice + totalSumMemberDcPrice + totalCouponGoodsDcPrice + totalMyappDcPrice;

                    $('input[name=totalMemberDcPrice]').val(data.totalMemberDcPrice);
                    $('input[name=totalMemberOverlapDcPrice]').val(data.totalMemberOverlapDcPrice);
                    $('input[name=totalMemberMileage]').val(data.totalMemberMileage);
                    $('input[name=totalCouponGoodsDcPrice]').val(totalCouponGoodsDcPrice);

                    <!--{ ? gGlobal.isFront }-->
                    totalSumMemberDcPrice = gd_money_format(totalSumMemberDcPrice);
                    totalMemberDcPrice = gd_money_format(totalMemberDcPrice);

                    var totalMemberDcPriceAdd = data.totalMemberDcPriceAdd;

                    totalMileage = gd_money_format(totalMileage);
                    totalGoodsMileage = gd_money_format(totalGoodsMileage);
                    totalMemberMileage = gd_money_format(totalMemberMileage);

                    $('.total-member-dc-price').html(totalMemberDcPrice);
                    $('.total-member-dc-price-add').html(totalMemberDcPriceAdd);
                    $('.member-dc-price').html(totalSumMemberDcPrice);
                    $('.total-member-mileage').html(totalMileage);
                    $('.goods-mileage').html(totalGoodsMileage);
                    $('.member-mileage').html(totalMemberMileage);
                    <!--{ : }-->

                    $('.total-member-dc-price').html(numeral(totalMemberDcPrice).format());
                    $('.member-dc-price').html(numeral(totalSumMemberDcPrice).format());
                    $('.total-member-mileage').html(numeral(totalMileage).format());
                    $('.goods-mileage').html(numeral(totalGoodsMileage).format());
                    $('.member-mileage').html(numeral(totalMemberMileage).format());
                    <!--{ / }-->

                    <!--{? gd_is_login() === true && productCouponChangeLimitType == 'n'}-->
                    var totalDeliveryCharge = data.totalDeliveryCharge;
                    $('.goods-coupon-dc-price').html(numeral(data.totalCouponGoodsDcPrice).format());
                    $('.goods-coupon-add-mileage').html(numeral(data.totalCouponGoodsMileage).format());

                    <!--{ ? couponUse == 'y' && couponConfig['chooseCouponMemberUseType'] != 'member' }-->
                    $('.goods-coupon-dc-price-without-member').html(numeral(data.totalCouponGoodsDcPrice).format());
                    $('.goods-coupon-add-mileage-without-member').html(numeral(data.totalCouponGoodsMileage).format());
                    $('.total-member-dc-price-without-member').html(numeral(data.totalGoodsDcPrice + data.totalCouponGoodsDcPrice + data.totalMyappDcPrice).format());
                    $('.total-member-mileage-without-member').html(numeral(totalMileage).format());
                    <!--{ / }-->

                    <!--{ ? deliveryFree != 'y' }-->
                    $('input[name=totalDeliveryCharge]').val(totalDeliveryCharge);
                    $('#totalDeliveryCharge').html(numeral(parseInt(totalDeliveryCharge)).format());
                    <!--{ / }-->
                    <!--{ / }-->

                    <!--{ ? gd_is_login() === true && mileageUse.payUsableFl != 'n' }-->
                    mileageUse = data.mileageUse;
                    <!--{ / }-->
                }
            }
        });
    }

    /**
     * 결제금액에서 상품금액만 구하기 (배송비 제외)
     * @param realSettlePrice
     * @returns {number|*}
     */
    function gd_get_goodsSalesPrice(realSettlePrice)
    {
        var deliveryFreePrice = parseInt($('input[name="totalDeliveryFreePrice"]').val());
        var deliveryPrice = 0;
        if (deliveryFreePrice > 0) {
            var deliveryAreaPrice = parseInt($('input[name="deliveryAreaCharge"]').val());
            var deliveryDcPrice = parseInt($('input[name="totalCouponDeliveryDcPrice"]').val());
            if (deliveryAreaPrice > 0) {
                deliveryPrice = deliveryPrice + deliveryAreaPrice;
            }
            if (deliveryDcPrice > 0) {
                deliveryPrice = deliveryPrice - deliveryDcPrice;
            }
        } else {
            var deliveryBasicPrice = parseInt($('input[name="totalDeliveryCharge"]').val());
            var deliveryAreaPrice = parseInt($('input[name="deliveryAreaCharge"]').val());
            var deliveryDcPrice = parseInt($('input[name="totalCouponDeliveryDcPrice"]').val());
            if (deliveryBasicPrice > 0) {
                deliveryPrice = deliveryPrice + deliveryBasicPrice;
            }
            if (deliveryAreaPrice > 0) {
                deliveryPrice = deliveryPrice + deliveryAreaPrice;
            }
            if (deliveryDcPrice > 0) {
                deliveryPrice = deliveryPrice - deliveryDcPrice;
            }
        }

        realSettlePrice = realSettlePrice - deliveryPrice;

        return realSettlePrice;
    }

    /**
     * 결제 페이지 호출 확인 후 결제
     */
    function pgSettleStartAfterCheck() {
        if (typeof pgSettleStart === 'function') {
            pgSettleStart();
        } else {
            console.log('pgSettle fail');
            return false;
        }
    }

    <!--{ ? (authData['useFl'] == 'y' && authData['useDataModifyFl'] == 'y') || (authData['useFlKcp'] == 'y' && authData['useDataModifyFlKcp'] == 'y') }-->
    $('input[name="reflectApplyMember"]').prop('checked', false).closest('div').hide();
    gd_display_memberinfo_apply();
    <!--{ / }-->

    function gd_display_memberinfo_apply() {
        if ($('#memberinfoApplyTr1').css('display') == 'none' && $('#memberinfoApplyTr2').css('display') == 'none') {
            $('#memberinfoApplyTr').css('display', 'none');
        } else {
            $('#memberinfoApplyTr').css('display', '');
        }
    }

    <!--{ ? isUseMultiShipping === true }-->
    var multiShippingPrice = function(deliveryPrice){
        if ($('input[name="multiShippingFl"]').prop('checked') === true) {
            var multiDelivery = 0;
            var multiShippingText = [];
            $('input[name^="multiDelivery"]').each(function(index){
                var value = $(this).val() ? $(this).val() : 0;
                var html = __('추가 배송지') + index + ' : ';
                if (index <= 0) {
                    html = __('메인 배송지') + ' : ';
                }
                multiShippingText.push(html + '{=gd_global_currency_symbol()}' + numeral(parseInt(value)).format() + '{=gd_global_currency_string()}');
                multiDelivery += parseInt(value);
            });
            $('.multi_shipping_text').html('(' + multiShippingText.join(', ') + ')');
        } else {
            $('.multi_shipping_text').empty();
            multiDelivery = deliveryPrice;
        }
        $('#totalDeliveryCharge').html(numeral(parseInt(multiDelivery)).format());
        $('input[name="totalDeliveryCharge"]').val(multiDelivery);

        return multiDelivery;
    }
    <!--{ / }-->

    var resetMileage = function() {
        var cartIdx = [];
        $('input[name="cartSno[]"]').each(function(idx){
            cartIdx.push($(this).val());
        });
        var param = {
            mode: 'set_mileage',
            cartSno: cartIdx,
            totalDeliveryCharge : $('input[name=totalDeliveryCharge]').val(),
            deliveryAreaCharge : $('input[name=deliveryAreaCharge]').val(),
            totalCouponOrderDcPrice: $('input:hidden[name="totalCouponOrderDcPrice"]').val(),
        };
        $.post('cart_ps.php', param, function(data){
            mileageUse = data.mileageUse;

            gd_mileage_use_check('n', 'n', 'n');
        });
    }

    function set_delivery_visit() {
        var deliveryVisitFl = false;
        var deliveryVisit = 'n';
        var visitAddressUseFl;
        var $infoArea = $('.shipping_info_table');
        $.each($("tr.order-goods-layout"), function () {
            if ($(this).find('.delivery-method-fl').val() == 'visit' && $(this).find('.visit-address-use-fl').val() == 'y') {
                deliveryVisitFl = true;
                if (visitAddressUseFl !== false) {
                    visitAddressUseFl = true;
                } else {
                    visitAddressUseFl = false;
                }
            } else {
                visitAddressUseFl = false;
            }
        });

        if (deliveryVisitFl === true) {
            var deliveryMethodVisitArea = '';
            var defaultDeliveryMethodVisitArea = '';
            var deliveryMethodVisitCnt = 0;
            $.each($('.delivery-method-fl'), function(key, target){
                if ($(target).val() == 'visit') {
                    if (!deliveryMethodVisitArea && $.trim($('.delivery-method-visit-area').eq(key).val())) {
                        deliveryMethodVisitArea = defaultDeliveryMethodVisitArea = $('.delivery-method-visit-area').eq(key).val();
                    } else {
                        deliveryMethodVisitCnt++;
                    }
                }
            });
            if (deliveryMethodVisitCnt > 0) {
                deliveryMethodVisitArea = deliveryMethodVisitArea + ' 외 ' + deliveryMethodVisitCnt + '건';
            }

            if (visitAddressUseFl === true) {
                $infoArea.find('tr:not(.orderVisitTr, .select_goods_tr)').addClass('dn');
                deliveryVisit = 'y';
            } else {
                $infoArea.find('tr:not(.orderVisitTr, .select_goods_tr)').removeClass('dn');
                deliveryVisit = 'a';
            }
            $infoArea.find('tr.orderVisitTr, tr.orderVisitTr tr').removeClass('dn');

            $('.delivery-method-visit-area-txt:eq(0)').html(deliveryMethodVisitArea);
            $('input[name="visitAddress"]').val(defaultDeliveryMethodVisitArea);
            $('input[name="visitName"]').val($('input[name="orderName"]').val());
            $('input[name="visitPhone"]').val($('input[name="orderCellPhone"]').val());
        } else {
            $infoArea.find('tr.orderVisitTr').addClass('dn');
            $infoArea.find('tr:not(.orderVisitTr, .select_goods_tr)').removeClass('dn');
            deliveryVisit = 'n';
        }

        $('input[name="deliveryVisit"]').val(deliveryVisit);

        <!--{ ? (authData['useFl'] == 'y' && authData['useDataModifyFl'] == 'y') || (authData['useFlKcp'] == 'y' && authData['useDataModifyFlKcp'] == 'y') }-->
        if (deliveryVisit != 'y') {
            $('input[name="reflectApplyMember"]').prop('checked', false).closest('span').hide();
            displayMemberinfoApply();
        }
        <!--{ / }-->

        return deliveryVisit;
    }
    set_delivery_visit();

    function set_shipping_delivery_visit(shippingNo) {
        var deliveryVisitFl = false;
        var deliveryVisit = 'n';
        var visitAddressUseFl;
        var $infoArea = $('.shipping_info_table:eq(' + shippingNo + ')');
        if ($('input[name="selectGoods[' + shippingNo + ']"]').val()) {
            var data = $.parseJSON($('input[name="selectGoods[' + shippingNo + ']"]').val());

            for (var i in data) {
                if (data[i]['goodsCnt'] > 0) {
                    if (data[i]['deliveryMethodFl'] == 'visit' && data[i]['visitAddressUseFl'] == 'y') {
                        deliveryVisitFl = true;
                        if (visitAddressUseFl !== false) {
                            visitAddressUseFl = true;
                        } else {
                            visitAddressUseFl = false;
                        }
                    } else {
                        visitAddressUseFl = false;
                    }
                }
            }
        } else {
            $.each($("tr.order-goods-layout"), function () {
                if ($(this).find('.delivery-method-fl').val() == 'visit') {
                    deliveryVisitFl = true;
                    if (visitAddressUseFl !== false && $(this).find('.visit-address-use-fl').val() == 'y') {
                        visitAddressUseFl = true;
                    } else {
                        visitAddressUseFl = false;
                    }
                } else {
                    visitAddressUseFl = false;
                }
            });
        }

        if (deliveryVisitFl === true) {
            var deliveryMethodVisitArea = '';
            var defaultDeliveryMethodVisitArea = '';
            var deliveryMethodVisitCnt = 0;
            for (var i in data) {
                if (data[i]['goodsCnt'] > 0 && data[i]['deliveryMethodFl'] == 'visit') {
                    if (!deliveryMethodVisitArea && $.trim(data[i]['deliveryMethodVisitArea'])) {
                        deliveryMethodVisitArea = defaultDeliveryMethodVisitArea = data[i]['deliveryMethodVisitArea'];
                    } else {
                        deliveryMethodVisitCnt++;
                    }
                }
            }
            if (deliveryMethodVisitCnt > 0) {
                deliveryMethodVisitArea += ' 외 ' + deliveryMethodVisitCnt + '건';
            }

            if (visitAddressUseFl === true) {
                $infoArea.find('tr:not(.orderVisitTr, .select_goods_tr, .add-select-goods-tr)').addClass('dn');
                deliveryVisit = 'y';
            } else {
                $infoArea.find('tr:not(.orderVisitTr, .select_goods_tr, .add-select-goods-tr)').removeClass('dn');
                deliveryVisit = 'a';
            }
            $infoArea.find('tr.orderVisitTr, tr.orderVisitTr tr').removeClass('dn');

            $infoArea.find('.delivery-method-visit-area-txt').html(deliveryMethodVisitArea);
            $infoArea.find('input[name^="visitAddress"]').val(defaultDeliveryMethodVisitArea);
        } else {
            $infoArea.find('tr.orderVisitTr').addClass('dn');
            $infoArea.find('tr:not(.orderVisitTr, .select_goods_tr)').removeClass('dn');
            deliveryVisit = 'n';
        }

        if (shippingNo == 0) {
            $('input[name="deliveryVisit"]').val(deliveryVisit);
            $('input[name="visitName"]').val($('input[name="orderName"]').val());
            $('input[name="visitPhone"]').val($('input[name="orderCellPhone"]').val());
        }
        $infoArea.find('.shipping-delivery-visit').val(deliveryVisit);

        return deliveryVisit;
    }

    function set_shipping_btn(shippingNo, deliveryVisit) {

        switch (deliveryVisit) {
            case 'y':
                if (shippingNo == 0) {
                    $('.shipping-add-btn').addClass('dn');
                    $('.shipping-visit-add-btn').removeClass('dn');
                } else {
                    $('.shipping-remove-btn:eq(' + (shippingNo - 1) + ')').addClass('dn');
                    $('.shipping-visit-remove-btn:eq(' + (shippingNo - 1) + ')').removeClass('dn');
                }
                break;
            case 'a':
            case 'n':
                if (shippingNo == 0) {
                    $('.shipping-add-btn').removeClass('dn');
                    $('.shipping-visit-add-btn').addClass('dn');
                } else {
                    $('.shipping-remove-btn:eq(' + (shippingNo - 1) + ')').removeClass('dn');
                    $('.shipping-visit-remove-btn:eq(' + (shippingNo - 1) + ')').addClass('dn');
                }
                break;
        }
    }

    // 14세 이상 동의 설정 사용 시 휴대폰 본인인증 호출
    function authCellPhone() {
        $(".pop_cert_ly").hide();
        $('#layerDim').addClass('dn');

        var protocol = location.protocol;
        var callbackUrl = "{=domainUrl}/member/authcellphone/dreamsecurity_result.php";
        window.open(protocol + "//hpauthdream.godo.co.kr/module/Mobile_hpauthDream_Main.php?callType=certGuest&returnUrl={=urlencode(returnUrl)}&shopUrl=" + callbackUrl + "&cpid={=authDataCpCode}", "auth_popup", "top=30, left=50, status=0, width=425, height=650");
    }

    // 14세 이상 동의 설정 사용 시 아이핀 본인인증 호출
    function authCellIpin() {
        $(".pop_cert_ly").hide();
        $('#layerDim').addClass('dn');

        var popupWindow = window.open("/member/ipin/ipin_main.php?callType=certGuest&returnUrl={=urlencode(returnUrl)}", "popupCertKey", "top=100, left=200, status=0, width=417, height=490");
    }
    //-->
</script>

{ # footer }