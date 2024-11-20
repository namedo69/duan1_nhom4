<?php
include_once './model/danhmuc.php';

if (!isset($_POST['add'])) {
    include_once './view/danhmuc/add.php';
} else {
    $name = $_POST['name'];
    addDanhMuc($name);
    $script = "<script> 
    alert('Thêm danh mục thành công!');
    window.location = 'index.php?action=listdanhmuc';
    </script>";
    echo $script;
}