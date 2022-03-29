<?php

$search = isset($_GET['keyword']) ? $_GET['keyword'] : "";

$id_brand = (int)isset($_GET['id_brand']) ? $_GET['id_brand']: "";

$brands = get_brand($id_brand);

$item_per_page = 3;

$current_page = !empty($_GET['page']) ? $_GET['page'] : 1;

$offset = ($current_page - 1) * $item_per_page;

if ($id_brand) {

    foreach($brands as $brand) {
        $list_product =  get_product_by_brand_name($brand['brand_name'], $item_per_page,
        $current_page, $offset);
    
        $all_product = get_num_product_by_brand_id($brand['brand_name']);
    
        $total_page = ceil($all_product / $item_per_page);
    }

} 
else if($search){
    
    $list_product = search($search, $item_per_page, $current_page, $offset);

    $all_product = get_num_rows_product_search($search);

    $total_page = ceil($all_product / $item_per_page);
}

else {

    $list_product = get_list_product($item_per_page, $current_page, $offset);

    $all_product = get_num_rows_product();

    $total_page = ceil($all_product / $item_per_page);
}
?>

<?php
get_header();
get_contact();
get_header_template();
get_menu();



?>
<div class="content">
    <?php get_sidebar(); ?>
    <div class="content__product">
        <div class="content__product-container">
            <h2 class="content__product-title">Danh sách sản phẩm</h2>
            <nav class="key-search">từ khóa tìm kiếm là:
                <p><?= isset($_GET['keyword']) ? $_GET['keyword'] : "" ?></p>
            </nav>
            <div class="content__product-items">
                <?php if (!$list_product) : ?>
                    <h2 class="no__product">
                        Không có sản phẩm tìm kiếm vui lòng chọn các sản phẩm có sẵn khác
                    </h2>
                <?php else : ?>
                    <?php foreach ($list_product as $item) : ?>
                        <div class="content__product-item">
                            <a href="" class="content__product-img__link">
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
                <?php endif; ?>

                <!-- END PRODUCT ITEM -->
                <nav class="Page navigation example">
                    <ul class="pagination">
                        <?php pagenation($total_page, $current_page, $search) ?>
                    </ul>
                </nav>
                <!-- END PAGIN -->
            </div>
        </div>
    </div>
</div>
</div>



<?php
get_footer_template();
get_copyright();
get_footer();
?>