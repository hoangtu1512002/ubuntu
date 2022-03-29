<?php
// register

$otp = rand(10000, 99999);

if (isset($_POST['register'])) {
    $errorMessage = [];
    $username = preg($_POST['username']);
    $email = $_POST['email'];
    if (empty($username)) {
        $errorMessage['username'] = "nhập tên tài khoản đăng kí và không có kí tự đăc biệt";
    }

    if (empty($email)) {
        $errorMessage['email'] = "vui lòng nhập email đăng kí";
    } else {
        if (!is_email($email)) {
            $errorMessage['email'] = "vui lòng nhập đúng email";
        } else {
            $check_user = get_users();
            foreach ($check_user as $user) {
                if ($email == $user['email']) {
                    $errorMessage['email'] = "email này đã tồn tại";
                }
            }
        }
    }

    if (!$errorMessage) {
        $infor_user = [
            'id' => '',
            'username' => $username,
            'email' => $email,
            'otp' => $otp,
        ];
        add_user($infor_user);
        load_view('login');
    }
}
?>


<!-- register form -->
<div id="form__register">
    <form action="" method="POST" class="form__register">
        <h1 class="form__title">Đăng kí</h1>
        <?php if (isset($error_register)) : ?>
            <p class="error__message" style="text-align: center">
                <?= $error_register ?>
            </p>
        <?php endif ?>
        <div class="form__group">
            <label for="">Tên tài khoản</label>
            <input type="text" class="form-control username" name="username" value="<?= !empty($username) ? $username : '' ?>">
            <p class="error__message">
                <?= !empty($errorMessage['username']) ? $errorMessage['username'] : "" ?>
            </p>
        </div>
        <div class="form__group">
            <label for="">Email:</label>
            <input type="text" class="form-control email" name="email" value="<?= !empty($email) ? $email : '' ?>">
            <p class="error__message">
                <?= !empty($errorMessage['email']) ? $errorMessage['email'] : "" ?>
            </p>
        </div>
        <div class="form__group form__center">
            <input type="submit" class="btn__login-otp" value="Đăng Kí" name="register">
        </div>
        <div class="form__action">
            <p>
                bằng việc đăng kí, bạn đã đồng ý với E-shopper
                <a href="">Điều khoản dịch vụ</a> &
                <a href="">chính sách bảo mật</a>
            </p>
        </div>

        <div class="form__action">
            <p>
                bạn đã có tài khoản?
                <a href="?mod=users&act=login">Đăng nhập</a>
            </p>
        </div>
    </form>
</div>