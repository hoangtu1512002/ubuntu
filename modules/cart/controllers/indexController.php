<?php

function construct() {
    load_model('index');
}

function indexAction() {
    load('helper','url');
    load('helper','format');
    if(isset($_SESSION['user'])){
        load_view('add');
    }else{
        redirect("?mod=users");
    }
}

function addAction() {

}

function editAction() {
   
}

function addCart($id){

    $item = get_list_product_by_id($id);

    $qty = 1;
    if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
        $qty = $_SESSION['cart']['buy'][$id]['qty']+1;
    }
    $_SESSION['cart']['buy'][$id] = [
        'id_product' => $item['id_product'],
        'name_product' => $item['name_product'],
        'price' => $item['price'],
        'image' => $item['image'],
        'qty' => $qty, // lưu tổng số sản phẩm trong cart.
        'sub_total' => $item['price'] * $qty // tổng giá của một sản phẩm.
    ];
    update_infor_cart();
}

function update_infor_cart() {
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

function get_list_buy_cart(){
    if(isset($_SESSION['cart'])) {
        foreach($_SESSION['cart']['buy'] as &$item){
            $item['url_del_cart']="?mod=cart&act=delete&id={$item['id_product']}";
            $item['url_del_cart_all']="?mod=cart&act=delete_all";
        }
        return $_SESSION['cart'];
    }
}

function delete_cart($id) {
    if(isset($_SESSION['cart'])){
        unset($_SESSION['cart']['buy'][$id]);
        update_infor_cart();      
    }
}

function delete_cart_all(){
    unset($_SESSION['cart']);
}

function update_cart($qty){
    foreach($qty as $id => $new_qty) {

        $_SESSION['cart']['buy'][$id]['qty'] = $new_qty;

        $_SESSION['cart']['buy'][$id]['sub_total'] = $new_qty * $_SESSION['cart']['buy'][$id]['price'];
    }
    update_infor_cart();
}
