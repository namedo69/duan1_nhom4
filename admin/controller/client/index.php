<?php
include_once './model/client.php';
// Nếu cần dữ liệu ở data base thì gọi model
$listClient = listclient();
// Xử lý dữ liệu từ database về

// Ném qua view để hiển thị cho người dùng
include_once './view/client/index.php';