<?php 
    load('helper','url');
    if(isset($_GET['search'])){
        redirect("?mod=search&keyword=".$_GET['search']);
    }
?>
<div class="menu">
    <div class="menu__content">
        <ul class="menu__content-item">
            <li class="menu__content-list">
                <a href="?mod=home" class="menu__content-link active">Trang chủ</a>
            </li>
            <li class="menu__content-list">
                <a href="" class="menu__content-link">
                    Cửa hàng <i class="fas fa-angle-down"></i></a>
                <ul class="menu__child">
                    <li class="menu__child-list">
                        <a href="" class="menu__child-link">Sản phẩm</a>
                    </li>
                    <li class="menu__child-list">
                        <a href="" class="menu__child-link">Chi tiết sản phẩm</a>
                    </li>
                    <li class="menu__child-list">
                        <a href="" class="menu__child-link">Thanh toán</a>
                    </li>
                    <li class="menu__child-list">
                        <a href="?mod=cart" class="menu__child-link active">Giỏ hàng</a>
                    </li>           
                    <li class="menu__child-list">
                        <a href="" class="menu__child-link">Đăng nhập</a>
                    </li>
                </ul>
            </li>
            <li class="menu__content-list">
                <a href="" class="menu__content-link">
                    blog <i class="fas fa-angle-down"></i></a>
                <ul class="menu__child">
                    <li class="menu__child-list">
                        <a href="" class="menu__child-link">Danh sách blog</a>
                    </li>
                    <li class="menu__child-list">
                        <a href="" class="menu__child-link">Blog cá nhân</a>
                    </li>
                </ul>
            </li>
            <li class="menu__content-list">
                <a href="" class="menu__content-link">404</a>
            </li>
            <li class="menu__content-list">
                <a href="" class="menu__content-link">contact</a>
            </li>
        </ul>
        <div class="menu__contact-search">
            <form action="" method="GET">
                <input type="text" name="search" placeholder="Tìm kiếm">
                <input type="submit" value="" hidden="true" id="btn__search">
                <label for="btn__search"><i class="fas fa-search"></i></label>
            </form>
        </div>
    </div>
</div>