<?php
    if(isset($_GET['act'])&&$_GET['act'] == 'deleteall'){
        delete_cart_all();
        redirect("?mod=cart");
    }
?>
