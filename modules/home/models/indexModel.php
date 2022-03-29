<?php

function get_all_products()
{

    $result = db_fetch_array("SELECT * FROM `product` LIMIT 6");

    return $result;
}
function get_num_rows_product()
{
    $result = db_num_rows("SELECT * FROM `product`");

    return $result;
}
function get_list_product($item_per_page, $current_page, $offset)
{
    $result = db_fetch_array("SELECT * FROM `product` LIMIT $item_per_page OFFSET $offset");

    return $result;
}

function pagenation($total_page, $current_page)
{
    if($current_page > 3){
        $first_page = 1;
        echo '<li class="page-item">
                <a class="page-link" href="?mod=home&page='.$first_page.'">
                    &laquo;
                </a>
            </li>';
    }

    for ($num = 1; $num <= $total_page; $num++) {

        if ($num != $current_page) {

            if ($num > $current_page - 3 & $num < $current_page + 3) {

                echo '<li class="page-item">
                        <a class="page-link" href="?mod=home&page=' . $num . '">
                            ' . $num . '
                        </a>
                    </li>';
            }
        } else {
            echo '<li class="page-item">
                    <a class="page-link active" href="?mod=home&page=' . $num . '">
                        ' . $num . '
                    </a>
                </li>';
        }
    }

    if($current_page < $total_page - 2){
        $end_page = $total_page;
        echo '<li class="page-item">
                <a class="page-link" href="?mod=home&page='.$end_page.'">
                    &raquo;
                </a>
            </li>';
    }
}





function get_category(){
    $result = db_fetch_array("SELECT * FROM `category` LIMIT 0,5");

    return $result;
}
function get_product_order_category($name){
    $result = 
    db_fetch_array("SELECT * FROM `product` INNER JOIN `category` on product.id_category = category.id_category WHERE category.name_category = '$name' LIMIT 4");
    return $result;
}
