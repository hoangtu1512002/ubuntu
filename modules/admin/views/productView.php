<?php
    $products = get_all_products();
?>
<div class="admin__product">
    <h1 class="admin__product-title admin__title">danh sách sản phẩm</h1>
    <div class="admin__product-add">
        <a class="btn btn-primary admin__add" href="?mod=admin&act=addProduct" role="button">Thêm sản phẩm</a>
    </div>
    <div class="admin__product-head admin__head">
        <ul>
            <li class="admin__product-list">Stt</li>
            <li class="admin__product-list">Tên sản phẩm</li>
            <li class="admin__product-list">Giá tiền</li>
            <li class="admin__product-list">Mô tả</li>
            <li class="admin__product-list">Hình ảnh</li>
            <li class="admin__product-list">Quản lý</li>
        </ul>
    </div>
    <div class="admin__product-body">
        <div class="admin__product-body__item">
            <?php $index = 1?>
            <?php foreach ($products as $product): ?>
            <div class="admin__product-body__list">
                <li><?=$index++?></li>
                <li><?=$product['name_product']?></li>
                <li><?=$product['price']?></li>
                <li>
                    <p>
                        <?=$product['description_product']?>
                    </p>
                </li>
                <li>
                    <img src="<?=$product['image']?>" alt="">
                </li>
                <li>
                    <a href="?mod=admin&act=updateProduct&id=<?=$product['id_product']?>">
                        <i class="admin__update fas fa-pen-square"></i>
                    </a>
                    <a onclick="return del('<?= $product['name_product']?>')" href="?mod=admin&act=deleteProduct&id=<?=$product['id_product']?>">
                        <i class="admin__del fas fa-trash-alt"></i>
                    </a>
                </li>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>