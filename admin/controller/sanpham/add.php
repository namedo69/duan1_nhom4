<?php
include_once './model/sanpham.php';

if (!isset($_POST['add'])) {
    include_once './view/sanpham/add.php';
} else {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $category_id = $_POST['category_id'];
    addProduct($name, $price, $description, $image,$category_id);
    $script = "<script> 
    alert('Thêm danh mục thành công!');
    window.location = 'index.php?action=listsanpham';
    </script>";
    echo $script;
}