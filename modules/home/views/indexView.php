<?php
// số sản phẩm trên 1 trang
$item_per_page = 6;

$current_page = !empty($_GET['page']) ? $_GET['page'] : 1;

$offset = ($current_page - 1) * $item_per_page;

$list_product = get_list_product($item_per_page, $current_page, $offset);
// lấy số bản ghi
$all_product = get_num_rows_product();
// Tính số trang
$total_page = ceil($all_product / $item_per_page);

$product = get_all_products();

$categoryid = get_category();


?>

<?php
get_header();
get_contact();
get_header_template();
get_menu();
get_slide();
?>

<div class="content">
    <?php get_sidebar(); ?>
    <div class="content__product">
        <div class="content__product-container">
            <h2 class="content__product-title">Danh sách sản phẩm</h2>
            <div class="content__product-items">
                <?php foreach ($list_product as $item) : ?>
                    <div class="content__product-item">
                        <a href="?mod=product&id=<?=$item['id_product']?>" class="content__product-img__link">
                            <img src="<?= $item['image'] ?>" alt="" class="content__product-img img-product">
                        </a>
                        <h4 class="content__product-price price-product">
                            <?= currency_format($item['price']) ?></h4>
                        <p class="content__product-name name-product"><?= $item['name_product'] ?></p>
                        <a href="?mod=cart&id=<?= $item['id_product'] ?>" class="content__product-add__cart btn__add-cart">
                            <i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng
                        </a>
                    </div>
                <?php endforeach; ?>
                <!-- END PRODUCT ITEM -->
                <nav class="Page navigation example">
                    <ul class="pagination">
                        <?php pagenation($total_page, $current_page) ?>
                    </ul>
                </nav>
                <!-- END PAGIN -->
            </div>
        </div>
        <!-- END CONTENT PRODUCT ITEM -->
        <div class="content__tab-menu">
            <ul class="content__tab-bar">
                <?php foreach ($categoryid as $index => $category) : ?>
                    <li class="content__tab-list">
                        <a href="#tab<?= $category['id_category'] ?>" class="content__tab-link <?= $index == 0 ? "active" : "" ?>" data-toggle="tab">
                            <?= $category['name_category'] ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <!-- END CONTEN TAB BAR -->
            <?php foreach ($categoryid as $index => $category) : ?>
                <div class="content__tab-items <?= $index == 0 ? "active" : "" ?>" id="tab<?= $category['id_category'] ?>">
                    <?php
                    $name = $category['name_category'];
                    $products = get_product_order_category($name);
                    ?>
                    <?php if (isset($products)) : ?>
                        <?php foreach ($products as $item) : ?>
                            <div class="content__tab-item">
                                <a href="" class="content__tab-img__link">
                                    <img src="<?= $item['image'] ?>" alt="" class="content__tabt-img img-product">
                                </a>
                                <h4 class="content__tab-price price-product">
                                    <?= currency_format($item['price']) ?>
                                </h4>
                                <p class="content__tab-name name-product">
                                    <?= $item['name_product'] ?>
                                </p>
                                <a href="?mod=cart&id=<?= $item['id_product'] ?>" class="product__tab-add__cart btn__add-cart">
                                    <i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng
                                </a>
                            </div>
                        <?php endforeach ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
            <!-- END CONTEN TAB ITEMS -->
        </div>
        <!-- END CONTENT TAB MENU -->
        <div class="content__offer">
            <h1 class="content__offer-title">Được đề xuất</h1>
            <div class="content__offer-items owl-carousel owl-theme">
                <?php foreach ($product  as $item) : ?>
                    <div class="content__offer-item">
                        <a href="" class="content__offer-img__link">
                            <img src="<?= $item['image'] ?>" alt="" class="content__offer-img img-product">
                        </a>
                        <h4 class="content__offer-price price-product">
                            <?= currency_format($item['price']) ?></h4>
                        <p class="content__offer-name name-product"><?= $item['name_product'] ?></p>
                        <a href="?mod=cart&id=<?= $item['id_product'] ?>" class="content__offer-add__cart btn__add-cart">
                            <i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer_template();
get_copyright();
get_footer();
?>