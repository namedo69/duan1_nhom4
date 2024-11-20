<?php
include_once './model/danhmuc.php';

if (!isset($_POST['edit']) && isset($_GET['id'])) {
    $danhMucInfo = getDanhMucById($_GET['id']);
    include_once './view/danhmuc/edit.php';
} else {
    $name = $_POST['name'];
    $id = $_POST['id'];
    editDanhMuc($id, $name);
    $script = "<script> 
    alert('Sửa danh mục thành công!');
    window.location = 'index.php?action=listdanhmuc';
    </script>";
    echo $script;
}