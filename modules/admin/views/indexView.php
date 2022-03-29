<?php
    if(isset($_GET['act']) && $_GET['act']=='logout'){
        logout();
    }
?>

<?php
get_header();
?>

<div class="all">
    <div class="admin">
        <div class="admin__nav">
            <h1 class="admin__nav-title">ADMIN</h1>
            <ul class="admin__nav-item">
                <li class="admin__nav-list">
                    <a href="" class="admin__nav-link active">
                        <i class="fab fa-product-hunt"></i> Quản lý sản phẩm
                    </a>
                    <ul class="admin__menu-child active">
                        <li class="admin__menu-chile__list">
                            <a href="?mod=admin&act=product" class="admin__menu-chile__link">
                                &raquo; Danh sách sản phẩm
                            </a>
                        </li>
                        <li class="admin__menu-chile__list">
                            <a href="?mod=admin&act=category" class="admin__menu-chile__link">
                                &raquo; Danh mục sản phẩm
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="admin__nav-list">
                    <a href="" class="admin__nav-link">
                        <i class="fas fa-users"></i> Quản lý tài khoản
                    </a>
                    <ul class="admin__menu-child">
                        <li class="admin__menu-chile__list">
                            <a href="?mod=admin&act=adminuser" class="admin__menu-chile__link">
                                &raquo; Tài khoản admin
                            </a>
                        </li>
                        <li class="admin__menu-chile__list">
                            <a href="?mod=admin&act=user" class="admin__menu-chile__link">
                                &raquo; Tài khoản người dùng
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="admin__nav-list">
                    <a href="" class="admin__nav-link">
                        <i class="fas fa-calendar-week"></i> Quản lý đơn hàng
                    </a>
                    <ul class="admin__menu-child">
                        <li class="admin__menu-chile__list">
                            <a href="" class="admin__menu-chile__link">
                                &raquo; Đang chờ duyệt
                            </a>
                        </li>
                        <li class="admin__menu-chile__list">
                            <a href="" class="admin__menu-chile__link">
                                &raquo; Đang giao
                            </a>
                        </li>
                        <li class="admin__menu-chile__list">
                            <a href="" class="admin__menu-chile__link">
                                &raquo; Đã giao
                            </a>
                        </li>
                        <li class="admin__menu-chile__list">
                            <a href="" class="admin__menu-chile__link">
                                &raquo; Đã hủy
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="admin__nav-list">
                    <a href="" class="admin__nav-link">
                        <i class="fas fa-donate"></i> Quản lý doanh thu
                    </a>
                    <ul class="admin__menu-child">
                        <li class="admin__menu-chile__list">
                            <a href="" class="admin__menu-chile__link">
                                &raquo; hàng ngày
                            </a>
                        </li>
                        <li class="admin__menu-chile__list">
                            <a href="" class="admin__menu-chile__link">
                                &raquo; hàng tháng
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="admin__nav-list">
                    <a href="" class="admin__nav-link">
                        <i class="fas fa-warehouse"></i> Quản lý kho
                    </a>
                    <ul class="admin__menu-child">
                        <li class="admin__menu-chile__list">
                            <a href="" class="admin__menu-chile__link">
                                &raquo; kho 1
                            </a>
                        </li>
                        <li class="admin__menu-chile__list">
                            <a href="" class="admin__menu-chile__link">
                                &raquo; kho 2
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END ADMIN NAV -->
        <div class="admin__content">
            <div class="admin__content-sidebar">
                <P class="admin__content-account">xin chào <b><?=$_SESSION['admin']?></b> </p>
                <a href="?mod=admin&act=logout" class="admin__content-logout">[&#10140;]</a>
            </div>
            <!--  -->
            <!-- require -->
            <?php
                $act = !empty($_GET['act']) ? $_GET['act'] : "product";
                load_view("$act");
            ?>
        </div>
    </div>
</div>


<?php
get_footer();
?>