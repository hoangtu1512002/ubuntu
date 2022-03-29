<?php
    $categoryId = (int)($_GET['idCategory']);
    $check_product = check($categoryId);
    if($check_product != 0){
        echo '<script type="text/javascript">',
                'alert("danh mục này có sản phẩm không thể xóa");',
            '</script>';
        load_view('category');
        return;
    }else{
        delete_category_by_id($categoryId);
        load_view('category');
        return;
    }
?>