<?php

$otp = rand(10000, 99999);

if (isset($_POST['loginOtp'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $errorMessage = validateLogin($username, $password, $email);

    if (!$errorMessage) {
        $password = md5($password);
        $user = get_list_user($username,$password,$email);

        if(!$user) {
            $error_login = "thông tin đăng nhập không chính xác";
        }else{
            $data = ['`admin_vefyfi_code`' => $otp];
            update_otp_admin($email, $data);
            send_email($username, $email, $otp);
        }
    }
}
if (isset($_POST['loginAdmin'])) {
    $otp_code = $_POST['otp'];
    $error = [];
    foreach ($users as $user) {
        if ($otp_code == "") {
            $error['otp'] = "vui lòng nhập mã xác thực";
        } else {
            if ($otp_code == $user['admin_vefyfi_code']) {
                $_SESSION['admin'] = $user['admin_username'];
                load_view('index');
                $data = ['`admin_vefyfi_code`' => $otp];
                update_otp_admin($user['admin_email'], $data);
                return;
            } else {
                $error['otp'] = "Mã xác thực đăng nhập không chính sác";
            }
        }
    }
}
?>
<?php
get_header();
?>
<div class="main">
    <div class="auth__form">
        <form action="" method="POST" class="form__login">
            <h1 class="form__title">Đăng nhập trang Admin</h1>
            <?php if (isset($error_login)) : ?>
                <p class="error__message" style="text-align: center"><?= $error_login ?></p>
            <?php endif ?>
            <div class="form__group">
                <label for="">Tên đăng nhập:</label>
                <input type="username" class="form-control username" name="username" value="<?= !empty($username) ? $username : '' ?>">
                <p class="error__message">
                    <?= !empty($errorMessage['username']) ? $errorMessage['username'] : "" ?>
                </p>
            </div>
            <div class="form__group">
                <label for="">Mật khẩu:</label>
                <input type="password" class="form-control password" name="password" value="<?= !empty($password) ? $password : '' ?>">
                <p class="error__message">
                    <?= !empty($errorMessage['password']) ? $errorMessage['password'] : "" ?>
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
                <input type="submit" class="btn__login-otp" value="Nhận mã OTP" name="loginOtp">
            </div>
        </form>
        <!-- ---- -->
        <form action="" method="POST" class="form__otp">
            <div class="form__group">
                <label for="">Mã OTP:</label>
                <input type="text" class="form-control" name="otp">
                <p class="error__message">
                    <?= !empty($error['otp']) ? $error['otp'] : "" ?>
                </p>
            </div>
            <div class="form__group form__center">
                <input type="submit" class="btn__login-admin" value="Đăng nhập" name="loginAdmin">
            </div>
        </form>
    </div>
</div>

<?php
get_footer();
?>