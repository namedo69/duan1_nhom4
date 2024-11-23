<?php
include_once './model/hoadon.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];
    changeStatusHoaDon($id, $status);

    if ($status == 0) {
        $script = "<script> 
        alert('Thay đổi thành công!');
        window.location = 'index.php?action=listhoadon';
        </script>";
    } else {
        $script = "<script> 
        alert('Thay đổi thành công!');
        window.location = 'index.php?action=listhoadon';
        </script>";
    }

    echo $script;
}