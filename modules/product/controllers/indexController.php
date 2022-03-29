<?php

function construct() {
    load_model('index');
}

function indexAction() {
    load('helper','format');
    load('helper','url');
    load_view('index');
}

function addAction() {

}

function editAction() {
   
}

function infor_detail_product($id){

    $item = get_product_by_id($id);

    $qty = 1;

    $infor = [
        'id_product' => $item['id_product'],
        'name_product' => $item['name_product'],
        'price' => $item['price'],
        'image' => $item['image'],
        'des' => $item['description_product'],
        'qty' => $qty,
    ];

    return $infor;
}

function infor_cart($id,$qty){

    $item = get_product_by_id($id);

    if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
        $qty = $_SESSION['cart']['buy'][$id]['qty']+$qty;
    }
    $_SESSION['cart']['buy'][$id] = [
        'id_product' => $item['id_product'],
        'name_product' => $item['name_product'],
        'price' => $item['price'],
        'image' => $item['image'],
        'qty' => $qty,
        'sub_total' => $item['price'] * $qty
    ];

    update_cart();
}

function update_cart() {
    if(isset($_SESSION['cart'])){
        // các sản phẩm
        $number_order = 0;
        // giá các sản phẩm
        $total = 0;

        foreach($_SESSION['cart']['buy'] as $item) {
            // tổng sản phẩm
            $number_order = $number_order + $item['qty'];
            // tổng giá
            $total = $total + $item['sub_total'];
        }
        // lưu các thông tin tổng hợp từ giỏ hàng.
        $_SESSION['cart']['infor'] = [
            'num_order' => $number_order,
            'total' => $total,
        ];
    }
}


