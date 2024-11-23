<?php
include_once './model/sanpham.php';
include_once './model/danhmuc.php';
if (!isset($_POST['edit']) && isset($_GET['id'])) {
    $sanphamInfo = getSanPhamById($_GET['id']);
    $listDanhMuc = listDanhMuc();
    include_once './view/sanpham/edit.php';
} else {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $fileName = null;
    if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
        $filePath = 'upload/product/';
        $fileName = date("Y_m_d_H_i_s") . $_FILES['image']['name'];
        // Xóa file cũ nếu có. Gợi ý if (file_exist())
        move_uploaded_file($_FILES['image']['tmp_name'], $filePath . $fileName);
    }
    editSanPham($id, $name, $fileName,  $price, $description ,$category_id);
    $script = "<script> 
    alert('Sửa danh mục thành công!');
    window.location = 'index.php?action=listsanpham';
    </script>";
    echo $script;
}