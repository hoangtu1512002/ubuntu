<?php
    function get_list_product() {
        $result = db_fetch_array("SELECT * FROM `product`");
        return $result;
    }

    function get_list_product_by_id($id){
        $result = db_fetch_row("SELECT * FROM `product` WHERE `id_product` = '$id'");
        return $result;
    }
?>