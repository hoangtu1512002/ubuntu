<?php 
function get_product_by_brand_id($name){
    $result = db_num_rows("SELECT * FROM `product` INNER JOIN `brand` 
    ON product.id_brand = brand.brand_id WHERE brand.brand_name = $name");
    return $result;
}