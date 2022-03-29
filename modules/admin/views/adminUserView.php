<?php 
    $admin_users = get_list_users();
?>
<div class="admin__user">
    <h1 class="admin__user-title admin__title">các tài khoản admin</h1>
    <div class="admin__user-add">
        <a class="btn btn-primary admin__add" href="?mod=admin&act=addAdminUser" role="button">Thêm tài khoản admin</a>
    </div>
    <div class="admin__user-head admin__head">
        <ul>
            <li>Stt</li>
            <li>Tên tài khoản</li>
            <li>Mật khẩu</li>
            <li>Email</li>
            <li>Quản lý</li>
        </ul>
    </div>
    <div class="admin__user-body">
        <ul>
            <?php $index = 1 ?>
            <?php foreach ($admin_users as $admin_user):?>
                <div class="admin__user-body__list">
                    <li><?= $index++ ?></li>
                    <li><?= $admin_user['admin_username'] ?></li>
                    <li><?= $admin_user['admin_password'] ?></li>
                    <li><?= $admin_user['admin_email'] ?></li>
                    <li>
                        <a href="?mod=admin&act=updateUserAdmin&id=<?= $admin_user['admin_id'] ?>">
                            <i class="admin__update fas fa-pen-square"></i>
                        </a>
                        
                        <a onclick="return del('<?= $admin_user['admin_username']?>')"
                         href="?mod=admin&act=deleteUserAdmin&id=<?= $admin_user['admin_id'] ?>">
                            <i class="admin__del fas fa-trash-alt"></i>
                        </a>
                    </li>
                </div>
            <?php endforeach; ?>    
        </ul>
    </div>
</div>