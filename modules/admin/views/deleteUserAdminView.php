<?php
    $adminId = (int)($_GET['id']);
    delete_admin_by_id($adminId);
    load_view('adminUser');
    return;
?>