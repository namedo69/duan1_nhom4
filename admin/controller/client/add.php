<?php
include_once './model/client.php';

if (!isset($_POST['add'])) {
    include_once './view/client/add.php';
} else {
    // Lấy thông tin từ form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Xử lý ảnh
    $filePathOriginal = 'upload/AnhGoc/client/';
    $filePathDestination = 'upload/AnhNhanBan/client/';
    
    if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
        // Nếu người dùng chọn ảnh
        $fileName = date("Y_m_d_H_i_s") . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $filePathDestination . $fileName);
    } else {
        // Nếu người dùng không chọn ảnh
        $fileName = date("Y_m_d_H_i_s") . 'avatarDefault.jpg';
        $sourceFile = $filePathOriginal . 'avatarDefault.jpg';
        $destinationFile = $filePathDestination . $fileName;
        
        // Copy ảnh mặc định từ thư mục AnhGoc sang AnhNhanBan
        if (file_exists($sourceFile)) {
            copy($sourceFile, $destinationFile);
        } else {
            die("Ảnh mặc định không tồn tại trong thư mục: $filePathOriginal");
        }
    }

    // Gọi hàm thêm người dùng
    addClient($username, $password, $name, $email, $role, $fileName);
    $script = "<script> 
    alert('Thêm người dùng thành công!');
    window.location = 'index.php?action=listclient';
    </script>";
    echo $script;
}
