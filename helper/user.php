<?php
function validateLogin($username, $password, $email)
{
    $error = [];
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
    return $error;
}


