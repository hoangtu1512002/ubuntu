<?php
$otp = rand(10000, 99999);
$adminId = (int)$_GET['id'];
$adminUserUpdate = get_admin_by_id($adminId);

if (isset($_POST['updateUserAdmin'])) {
    $error = [];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];

    if (empty($username)) {
        $error['username'] = "nhập tài khoản đăng nhập";
    }

    if (empty($password)) {
        $error['password'] = "vui lòng nhập mật khẩu";
    }

    if (empty($email)) {
        $error['email'] = 'nhập email đăng nhập';
    } else {
        if (!is_email($email)) {
            $error['email'] = $email . ' không phải email';
        }
    }

    if (!$error) {
        $check_user = get_list_users();
        foreach ($check_user as $user) {
            if ($username == $user['admin_username']) {
                $error['username'] = 'Tài khoản đăng nhập này đã tồn tại';
            } 
            elseif($email == $user['admin_email']) {
                $error['email'] = 'email này đã tồn tại';
            }
            else {
                $inforUserAdmin = [
                    'admin_id' => '',
                    'admin_username' => $username,
                    'admin_password' => $password,
                    'admin_email' => $email,
                    'admin_vefyfi_code' => $otp
                ];
                update_admin_by_id($adminId,$inforUserAdmin);
                load_view('adminUser');
                return;
            }
        
        }
    }
}

?>

<form action="" method="POST" enctype="multipart/form-data">
    <label for="inputPassword5" class="form-label admin__title">Sửa tài khoản admin</label>
    <div class="form-group">
        <label for="" class="form-label" style="font-size:1.6rem;">Tên tài khoản</label>
        <input type="text" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="username" 
        value="<?=$adminUserUpdate['admin_username']?>">
        <p id="passwordHelpBlock" class="form-text">
            <?= !empty($error['username']) ? $error['username'] : "" ?>
        </p>
    </div>

    <div class="form-group">
        <label for="" class="form-label" style="font-size:1.6rem;">Mật khẩu</label>
        <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="password" 
        value="<?=$adminUserUpdate['admin_password']?>">
        <p id="passwordHelpBlock" class="form-text">
            <?= !empty($error['password']) ? $error['password'] : "" ?>
        </p>
    </div>

    <div class="form-group">
        <label for="" class="form-label" style="font-size:1.6rem;">Email</label>
        <input type="text" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="email" 
        value="<?=$adminUserUpdate['admin_email']?>">
        <p id="passwordHelpBlock" class="form-text">
            <?= !empty($error['email']) ? $error['email'] : "" ?>
        </p>
    </div>




    <input type="submit" class="btn btn__add-category" value="sửa tài khoản" name="updateUserAdmin">
</form>