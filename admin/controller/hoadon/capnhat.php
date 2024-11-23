<?php
include_once "./model/hoadon.php";
if (isset($_POST['status']) && isset($_POST['id'])) {
    $status = $_POST['status'];
    $id = $_POST['id'];
    changeStatus($id, $status);
    echo '<script> alert("Cập nhật đơn hàng thành công"); </script>';
    echo '<script> window.location.replace("http://localhost/duan1_nhom4/admin/index.php?action=listhoadon"); </script>';
}