<?php
include_once './model/comment.php';
// Nếu cần dữ liệu ở data base thì gọi model
$listComment = listcomment();
// Xử lý dữ liệu từ database về

// Ném qua view để hiển thị cho người dùng
include_once './view/comment/index.php';