<?php
include_once './model/sanpham.php';

if (!isset($_POST['edit']) && isset($_GET['id'])) {
    $sanphamInfo = getSanPhamById($_GET['id']);
    include_once './view/sanpham/edit.php';
} else {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $view = $_POST['view'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $image = $_POST['image'];
    editSanPham($id, $name, $description ,$category_id, $image);
    $script = "<script> 
    alert('Sửa danh mục thành công!');
    window.location = 'index.php?action=listsanpham';
    </script>";
    echo $script;
}