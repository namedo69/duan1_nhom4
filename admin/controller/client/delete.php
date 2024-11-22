<?php
include_once './model/client.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];
    changeStatusNguoiDung($id, $status);

    if ($status == 0) {
        $script = "<script> 
        alert('Ẩn danh mục thành công!');
        window.location = 'index.php?action=listclient';
        </script>";
    } else {
        $script = "<script> 
        alert('Hiện danh mục thành công!');
        window.location = 'index.php?action=listclient';
        </script>";
    }

    echo $script;
}