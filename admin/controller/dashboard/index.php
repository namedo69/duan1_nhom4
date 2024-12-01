<?php
include_once './model/dashboard.php';
// Nếu cần dữ liệu ở data base thì gọi model
$listHoaDon = listHoaDon();
$listClient = listClient();
$listProduct = listProduct();
$listComment=listComment();
// Xử lý dữ liệu từ database về
$doanhthu=getMonthlyRevenue($listHoaDon);
$bill=countBill($listHoaDon);
$client=countClient($listClient);
$product=countProduct($listProduct);
// Ném qua view để hiển thị cho người dùng
include_once './view/dashboard/index.php';