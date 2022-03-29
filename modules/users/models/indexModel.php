<?php
function get_users()
{
    $result = db_fetch_array("SELECT * FROM `user`");
    return $result;
}

function get_user_by_email($email)
{
    $result = db_fetch_row("SELECT * FROM `user` WHERE `email` = '$email'");
    return $result;
}

function update_otp_user($email, $otp_code)
{
    $table = "`user`";
    $where = "`email` = '$email'";
    db_update($table, $otp_code, $where);
}

function add_user($infor_user_admin)
{
    $table = "`user`";
    db_insert($table, $infor_user_admin);
}
