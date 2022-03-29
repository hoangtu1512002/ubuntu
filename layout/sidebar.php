<?php
load('helper', 'category');
load('helper', 'brand');
load('helper', 'product');
$categorys = get_list_category();
$brand = get_list_brand();

?>
<div class="content__navbar">
    <div class="content__category">
        <h2 class="content__category-title">Danh mục sản phẩm</h2>
        <ul class="content__category-item">
            <?php foreach ($categorys as $category):?>
                <li class="content__category-list">
                    <a href="?mod=search&keyword=<?= $category['name_category'] ?>" class="content__category-link">
                        <?= $category['name_category'] ?>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
    <!-- END CATEGORY NAVBAR -->
    <div class="content__brand">
        <h2 class="content__brand-title">Thương hiệu</h2>
        <ul class="content__brand-item">
            <?php foreach ($brand as $item) : ?>
                <?php 
                    $name = $item['brand_name']; 
                    $product_by_brand_id = get_product_by_brand_id("'$name'");
                ?>
                <li class="content__brand-list">
                    <a href="?mod=search&keyword=<?=$item['brand_name']?>&id_brand=<?=$item['brand_id']?>" class="content__brand-link">
                        <?= $item['brand_name'] ?>
                        <nav class="content__brand-qty">(<?=$product_by_brand_id?>)</nav>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <!-- END BRAND NAVBAR -->
    <div class="content__price">
        <h2 class="content__price-title">Phạm vi giá</h2>
        <div class="content__price-range">
            <div class="content__slide-track">
                <div class="content__slide-thumb"></div>
                <div class="content__progess-bar"></div>
                <input type="range" class="content__slide-range" min="0" max="95" value="20">
            </div>
            <div class="content__value"></div>
        </div>
    </div>
    <!-- END CONTENT PRICE -->
    <div class="content__banner">
        <img src="public/images/shipping.jpg" alt="" class="content__banner-img">
    </div>
</div>