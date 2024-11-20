<?php
include_once './model/sanpham.php';
// Nếu cần dữ liệu ở data base thì gọi model
$listSanPham = listSanPham();
// Xử lý dữ liệu từ database về

// Ném qua view để hiển thị cho người dùng
include_once './view/sanpham/index.php';