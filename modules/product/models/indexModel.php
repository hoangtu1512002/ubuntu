<?php 

function get_product_by_id($id){
    $result = db_fetch_row("SELECT * FROM `product` WHERE `id_product` = '$id'");
    return $result;
}