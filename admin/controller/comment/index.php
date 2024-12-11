<?php
include_once './model/comment.php';
include_once './model/client.php';
include_once './model/sanpham.php';
// Nếu cần dữ liệu ở data base thì gọi model
$listComment = listcomment();
$listSanPham = listSanPham();
$listClient = listClient();
// Xử lý dữ liệu từ database về

// Ném qua view để hiển thị cho người dùng
include_once './view/comment/index.php';