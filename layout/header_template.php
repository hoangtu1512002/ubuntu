<?php
if (isset($_GET['act']) && $_GET['act'] == 'logout') {
    load('helper', 'url');
    if (isset($_SESSION['user']) && $_SESSION['user'] != null) {
        unset($_SESSION['user']);
        redirect("?mod=home");
        return;
    }
}
?>
<header class="header">
    <div class="header__logo">
        <a href="?mod=home">
            <img src="public/images/logo.png" alt="" class="header__logo-img">
        </a>
    </div>
    <div class="header__menu">
        <ul class="header__menu-item">
            <li class="header__menu-list">
                <a href="" class="header__menu-link">
                    <i class="fas fa-user"></i> Tài khoản</a>
            </li>
            <li class="header__menu-list">
                <a href="" class="header__menu-link">
                    <i class="fas fa-star"></i> Yêu thích</a>
            </li>
            <li class="header__menu-list">
                <a href="" class="header__menu-link">
                    <i class="fas fa-crosshairs"></i> Thanh toán</a>
            </li>

            <li class="header__menu-list">
                <a href="?mod=cart" class="header__menu-link">
                    <i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
                <p id="num">
                    <?=isset($_SESSION['cart']['infor'])?$_SESSION['cart']['infor']['num_order']: "0" ?>
                </p>
            </li>

            <?php if (empty($_SESSION['user'])) : ?>
                <li class="header__menu-list">
                    <a href="?mod=users" class="header__menu-link">
                        <i class="fas fa-lock"></i>Đăng nhập
                    </a>
                    <ul class="header__menu-child">
                        <li class="header__menu-list">
                            <a href="?mod=users&act=register" class="header__menu-link header__menu-child__link">
                                <i class="fas fa-sign-out-alt"></i>Đăng kí
                            </a>
                        </li>
                    </ul>
                </li>
            <?php else: ?>
                <li class="header__menu-list">
                    <a href="" class="header__menu-link">
                        <i class="fas fa-user-circle"></i>
                        <?=$_SESSION['user'] ?>
                    </a>
                    <ul class="header__menu-child">
                        <li class="header__menu-list">
                            <a href="?mod=home&act=logout" class="header__menu-link header__menu-child__link">
                                <i class="fas fa-sign-out-alt"></i>Đăng xuất
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif ?>
        </ul>
    </div>
</header>