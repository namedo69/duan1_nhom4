<?php
include_once './model/sanpham.php';
include_once './model/danhmuc.php';
if (!isset($_POST['add'])) {
    $listDanhMuc = listDanhMuc();
    include_once './view/sanpham/add.php';
} else {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $fileName = null;
    if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
        $filePath = 'upload/';
        $fileName = date("Y_m_d_H_i_s") . $_FILES['image']['name'];
        // Xóa file cũ nếu có. Gợi ý if (file_exist())
        move_uploaded_file($_FILES['image']['tmp_name'], $filePath . $fileName);
    }
    addProduct($name, $price, $description, $image,$category_id);
    $script = "<script> 
    alert('Thêm sản phẩm thành công!');
    window.location = 'index.php?action=listsanpham';
    </script>";
    echo $script;
}