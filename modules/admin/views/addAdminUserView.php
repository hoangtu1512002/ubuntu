<?php
$otp = rand(10000, 99999);
if (isset($_POST['addUserAdmin'])) {
    $error = [];
    $username =  preg($_POST['username']);
    $password =  md5($_POST['password']);
    $email =  $_POST['email'];
    $check_user = check_user();

    if (empty($username)) {
        $error['username'] = "nhập tài khoản đăng nhập";
    } else {
        if ($username == $check_user['admin_username']) {
            $error['username'] = "tài khoản đã tồn tại";
        }
    }

    if (empty($password)) {
        $error['password'] = "vui lòng nhập mật khẩu";
    }

    if (empty($email)) {
        $error['email'] = 'nhập email đăng nhập';
    } else {
        if (!is_email($email)) {
            $error['email'] = $email . ' không phải email';
        } else {
            if ($email == $check_user['admin_email']) {
                $error['email'] = "email đã tồn tại";
            }
        }
    }

    if (!$error) {
        $inforUserAdmin = [
            'admin_id' => '',
            'admin_username' => $username,
            'admin_password' => $password,
            'admin_email' => $email,
            'admin_vefyfi_code' => $otp
        ];
        add_user_admin($inforUserAdmin);
        load_view('adminUser');
        return;
    }
}
?>

<form action="" method="POST" enctype="multipart/form-data">
    <label for="inputPassword5" class="form-label admin__title">Thêm tài khoản admin</label>
    <div class="form-group">
        <label for="" class="form-label" style="font-size:1.6rem;">Tên tài khoản</label>
        <input type="text" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="username" value="<?= !empty($username) ? $username : '' ?>">
        <p id="passwordHelpBlock" class="form-text">
            <?= !empty($error['username']) ? $error['username'] : "" ?>
        </p>
    </div>

    <div class="form-group">
        <label for="" class="form-label" style="font-size:1.6rem;">Mật khẩu</label>
        <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="password" value="<?= !empty($password) ? $password : '' ?>">
        <p id="passwordHelpBlock" class="form-text">
            <?= !empty($error['password']) ? $error['password'] : "" ?>
        </p>
    </div>

    <div class="form-group">
        <label for="" class="form-label" style="font-size:1.6rem;">Email</label>
        <input type="text" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="email" value="<?= !empty($email) ? $email : '' ?>">
        <p id="passwordHelpBlock" class="form-text">
            <?= !empty($error['email']) ? $error['email'] : "" ?>
        </p>
    </div>

    <input type="submit" class="btn btn__add-category" value="thêm tài khoản" name="addUserAdmin">
</form>