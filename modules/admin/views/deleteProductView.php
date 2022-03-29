<?php 
    $idProduct = (int)$_GET['id'];
    $productImage = get_product_by_id($idProduct);
    unlink($productImage['image']);
    del_prodcut($idProduct);
    load_view('product');
    return;
?>