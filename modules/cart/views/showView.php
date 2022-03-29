<?php
$list_buy = get_list_buy_cart();
?>
<div class="cart">
    <div class="cart__content">
        <div class="cart__header">
            <a href="?mod=home" class="cart__header-home">Trang chủ &rsaquo;&rsaquo;</a>
            <p class="cart__header-title">Giỏ hàng</p>
        </div>
        <?php if (empty($list_buy['infor']['num_order'])) : ?>
            <div class="cart__no-product">
                <img src="public/images/mascot@2x.png" alt="">
                <p>Không có sản phẩm nào trong giỏ hàng của bạn.</p>
            </div>
        <?php else : ?>
            <div class="cart__pay">
                <form action="?mod=cart&act=update" method="POST">
                    <div class="cart__pay-header">
                        <ul class="cart__pay-item">
                            <li class="cart__pay-list">Sản phẩm</li>
                            <li class="cart__pay-list">Đơn giá</li>
                            <li class="cart__pay-list">Số lượng</li>
                            <li class="cart__pay-list">Thành tiền</li>
                            <li class="cart__pay-list">
                                <a href="?mod=cart&act=deleteall">
                                    <i class="fas fa-trash"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="cart__pay-content">
                        <?php foreach ($list_buy['buy'] as $item) : ?>
                            <div class="cart__pay-products">
                                <div class="cart__pay-product">
                                    <img src="<?= $item['image'] ?>" alt="">
                                    <a href="?mod=product&id=<?=$item['id_product']?>">
                                        <?= $item['name_product'] ?>
                                    </a>
                                </div>
                                <div class="cart__pay-price">
                                    <?= currency_format($item['price']) ?>
                                </div>
                                <div class="cart__pay-qty">
                                    <input type="number" name="qty[<?=$item['id_product']?>]" value="<?= $item['qty'] ?>" class="num-order" id="" min="1" max="10">
                                </div>
                                <div class="cart__total">
                                    <?= currency_format($item['sub_total']) ?>
                                </div>
                                <div class="cart_pay-del">
                                    <a href="<?= $item['url_del_cart'] ?>"><i class="fas fa-trash"></i></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="cart__sub-total">
                        <p>Tổng tiền:</p>
                        <span><?= currency_format($list_buy['infor']['total']) ?></span>
                    </div>


                    <div class="cart__infor">
                        <div class="section-detail">
                            <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng.</p>
                            <input type="submit" name="btn_update_cart" id="update-cart" value="Cập nhật giỏ hàng">
                        </div>
                    </div>
                </form>
            <?php endif; ?>
            </div>
    </div>
</div>