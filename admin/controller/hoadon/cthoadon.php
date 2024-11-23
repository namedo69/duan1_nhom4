<?php
include_once "./model/hoadon.php";
include_once "./model/sanpham.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $hoaDonChiTiet = getHoaDonById($id);
    $hoaDonInfo = getAllChiTietDonHang($id);
    foreach ($hoaDonInfo as $key => $value) {
        $sanPhamInfo = getSanPhamById($value['product_id']);
        $hoaDonInfo[$key]['name'] = $sanPhamInfo['name'];
        $hoaDonInfo[$key]['image'] = $sanPhamInfo['image'];
    }
    include_once "./view/hoadon/cthoadon.php";
}