<?php
include_once "./model/hoadon.php";
include_once "./model/sanpham.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $hoaDonChiTiet = getHoaDonById($id);
    $hoaDonInfo = getAllChiTietDonHang($id);
    foreach ($hoaDonInfo as $key => $item) {
        $sanPhamInfo = listSanPham($item['product_id']);
    }
    include_once "./view/hoadon/cthoadon.php";
}