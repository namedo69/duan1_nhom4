<?php
include_once './model/danhmuc.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];
    changeStatusDanhMuc($id, $status);

    if ($status == 0) {
        $script = "<script> 
        alert('Ẩn danh mục thành công!');
        window.location = 'index.php?action=listdanhmuc';
        </script>";
    } else {
        $script = "<script> 
        alert('Hiện danh mục thành công!');
        window.location = 'index.php?action=listdanhmuc';
        </script>";
    }

    echo $script;
}