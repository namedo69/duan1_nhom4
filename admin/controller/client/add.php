<?php
include_once './model/client.php';

if (!isset($_POST['add'])) {
    include_once './view/client/add.php';
} else {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $fileName = null;
    if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
        $filePath = 'upload/client/';
        $fileName = date("Y_m_d_H_i_s") . $_FILES['image']['name'];
        // Xóa file cũ nếu có. Gợi ý if (file_exist())
        move_uploaded_file($_FILES['image']['tmp_name'], $filePath . $fileName);
    }
    addClient($username, $password, $name, $email,$role ,$fileName);
    $script = "<script> 
    alert('Thêm người dùng thành công!');
    window.location = 'index.php?action=listclient';
    </script>";
    echo $script;
}