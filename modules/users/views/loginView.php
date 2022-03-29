<?php

$errorMessage = [];


$otp = rand(10000, 99999);

if (isset($_POST['loginOtp'])) {

    $email = $_POST['email'];

    if (empty($email)) {
        $errorMessage['email'] = "vui lòng nhập email của bạn";
    } else {
        if (!is_email($email)) {
            $errorMessage['email'] = $email . " không phải email";
        }
    }

    if (!$errorMessage) {

        $account = get_user_by_email($email);

        if (!$account) {
            $error_login = "thông tin đăng nhập không chính xác";
        } else {
            $username = $account['username'];
            $data = ['`otp`' => $otp];
            update_otp_user($email, $data);
            send_email($username, $email, $otp);
        }
    }
}

if (isset($_POST['login'])) {
    $data = get_users();
    $otp_code = $_POST['otp'];
    $error = [];
    if ($otp_code == "") {
        $error['otp'] = "vui lòng nhập mã xác thực";
    }

    if (!$error) {
        foreach ($data as $user) {
            if ($otp_code === $user['otp']) {
                $_SESSION['user'] = $user['username'];
                $data = ['`otp`' => $otp];
                update_otp_user($user['email'], $data);
                redirect("?mod=home");
                return;
            } else {
                $error['otp'] = "Mã xác thực đăng nhập không chính sác";
            }
        }
    }
}
?>

<div id="form__login">
    <form action="" method="POST" class="form__login form__login-user">
        <h1 class=" form__title ">Đăng nhập</h1>
        <?php if (isset($error_login)) : ?>
            <p class="error__message " style="text-align: center ">
                <?= $error_login ?>
            </p>
        <?php endif ?>
        <div class="form__group ">
            <label for=" ">Email:</label>
            <input type="text" class="form-control email" id="email" name="email" value="<?= !empty($email) ? $email : '' ?>">
            <p class="error__message">
                <?= !empty($errorMessage['email']) ? $errorMessage['email'] : "" ?>
            </p>
        </div>
        
        <div class="form__group form__center">
            <input type="submit" class="btn__login-otp" value="Nhận mã OTP" name="loginOtp" id="getotp">
        </div>
    </form>

    <!-- form otp -->
    <form action="" method="POST" class="form__otp form__otp-user">
        <div class="form__group">
            <label for="">Mã OTP:</label>
            <input type="text" class="form-control" name="otp">
            <p class="error__message">
                <?= !empty($error['otp']) ? $error['otp'] : "" ?>
            </p>
        </div>
        <div class="form__group form__center">
            <input type="submit" class="btn__login-admin" value="Đăng nhập" name="login">
        </div>

        <div class="form__action">
            <p>bạn chưa có tài khoản?
                <a href="?mod=users&act=register" class="register-link">Đăng kí ngay</a>
            </p>
        </div>
    </form>
</div>