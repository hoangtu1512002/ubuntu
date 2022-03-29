<?php get_header() ?>
<!DOCTYPE html>
<html lang="en">


<body>
    <div id="user">
        <div class="user__logo">
            <a href="?mod=home">
                <img src="public/images/logo.png" alt="">
            </a>
            <h3 class="user__title">
                <?php 
                    $title = !empty($_GET['act']) && $_GET['act'] == "register" 
                    ? "Đăng kí": "Đăng nhập";
                    echo $title;
                ?>
            </h3>
        </div>
        <div class="user__content">
            <div class="user__form">
                <!-- require -->
                <?php
                    $act = !empty($_GET['act']) ? $_GET['act'] : "login";
                    load_view("$act");
                ?>

            </div>
        </div>
    </div>

    <?php
    get_footer_template();
    get_footer();

    ?>