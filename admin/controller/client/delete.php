<?php
include_once './model/client.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];
    changeStatusNguoiDung($id, $status);

    if ($status == 0) {
        $script = "<script> 
        alert('Đã khóa người dùng!');
        window.location = 'index.php?action=listclient';
        </script>";
    } else {
        $script = "<script> 
        alert('Đã mở khóa người dùng!');
        window.location = 'index.php?action=listclient';
        </script>";
    }

    echo $script;
}