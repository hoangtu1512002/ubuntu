<?php
function get_list_product($item_per_page, $current_page, $offset)
{
    $result = db_fetch_array("SELECT * FROM `product` LIMIT $item_per_page OFFSET $offset");

    return $result;
}

function search($keyword,$item_per_page, $current_page,$offset)
{
    $result = db_fetch_array("SELECT * FROM `product` WHERE `name_product` LIKE '%$keyword%' LIMIT $item_per_page OFFSET $offset");
    return $result;
}

function get_num_rows_product_search($keyword)
{
    $result = db_num_rows("SELECT * FROM `product` WHERE `name_product` LIKE '%$keyword%'");

    return $result;
}

function get_num_rows_product()
{
    $result = db_num_rows("SELECT * FROM `product`");

    return $result;
}

function pagenation($total_page, $current_page,$search)
{
    if ($current_page > 3) {
        $first_page = 1;
        echo '<li class="page-item">
                <a class="page-link" href="?mod=search&keyword='.$search.'&page=' . $first_page . '">
                    &laquo;
                </a>
            </li>';
    }

    for ($num = 1; $num <= $total_page; $num++) {

        if ($num != $current_page) {

            if ($num > $current_page - 3 & $num < $current_page + 3) {

                echo '<li class="page-item">
                        <a class="page-link" href="?mod=search&keyword='.$search.'&page=' . $num . '">
                            ' . $num . '
                        </a>
                    </li>';
            }
        } else {
            echo '<li class="page-item">
                    <a class="page-link active" href="?mod=search&keyword='.$search.'&page=' . $num . '">
                        ' . $num . '
                    </a>
                </li>';
        }
    }

    if ($current_page < $total_page - 2) {
        $end_page = $total_page;
        echo '<li class="page-item">
                <a class="page-link" href="?mod=search&keyword='.$search.'&page=' . $end_page . '">
                    &raquo;
                </a>
            </li>';
    }
}


function get_brand($id)
{
    $result = db_fetch_array("SELECT * FROM `brand` WHERE `brand_id` = '$id'");
    return $result;
}

function get_product_by_brand_name($name,$item_per_page, $current_page,$offset){
    $result = db_fetch_array("SELECT * FROM `product` 
    INNER JOIN `brand` 
    ON product.id_brand = brand.brand_id 
    WHERE brand.brand_name = '$name'
    AND `brand_name` LIKE '%$name%'
    LIMIT $item_per_page OFFSET $offset");
    return $result;
}

function get_num_product_by_brand_id($name){
    $result = db_num_rows("SELECT * FROM `product` INNER JOIN `brand` 
    ON product.id_brand = brand.brand_id WHERE brand.brand_name = '$name'");
    return $result;
}