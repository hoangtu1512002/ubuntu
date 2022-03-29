<?php
$id = (int)$_GET['id'];

$detail_product = infor_detail_product($id);


if (isset($_POST['addcart'])) {

    $qty = $_POST['qty'];

    $infor =  infor_cart($id, $qty);

    redirect("?mod=cart");
}


?>

<?php
get_header();
get_contact();
get_header_template();
?>

<div class="detail">
    <form action="" method="POST">
        <div class="detail__info">
            <div class="detail__product-title">
                <a href="?mod=home">Trang chủ &rsaquo;&rsaquo;</a>
                <p>Chi tiết sản phẩm</p>
            </div>
            <div class="detail__item">
                <div class="cart__buy">
                    <div class="detail__product">
                        <img src="<?= $detail_product['image'] ?>" alt="">
                    </div>
                    <div class="detail__product-detail">
                        <div class="name__product"><?= $detail_product['name_product'] ?></div>
                        <div class="price"><?= currency_format($detail_product['price']) ?></div>
                        <div class="detail__qty">
                            <label for="">Số lượng:</label><br>
                            <input type="number" value="<?= $detail_product['qty'] ?>" name="qty">
                        </div>
                        <div class="detail__cart">
                            <input type="submit" name="addcart" class="btn__add-cart" value="Chọn mua sản phẩm">
                        </div>
                        <div class="cart__discount">
                            <p>Miễn phí giao hàng toàn quốc, hỗ trợ hoàn tiền 15% với những đơn hàng từ
                            <nav>500000đ.</nav>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="cart__des">
                    <h1>Chi tiết sản phẩm</h1>
                    <p><?= $detail_product['des'] ?></p>
                </div>
            </div>
        </div>
    </form>
</div>


<?php
get_footer_template();
get_copyright();
get_footer();
?>