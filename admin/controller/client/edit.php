<?php
include_once './model/client.php';

if (!isset($_POST['edit']) && isset($_GET['id'])) {
    $clientInfor = getClientById($_GET['id']);
    include_once './view/client/edit.php';
} else {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $clientInfor = getClientById($_POST['id']);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $fileName = null;
    if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
        $filePath = 'upload/AnhNhanBan/client/';
 
        $fileName = date("Y_m_d_H_i_s") . $_FILES['image']['name'];
        // Xóa file cũ nếu có. Gợi ý if (file_exist())
        move_uploaded_file($_FILES['image']['tmp_name'], $filePath . $fileName);
       // Kiểm tra nếu file đã tồn tại (tùy chọn: có thể thêm kiểm tra để xóa file cũ nếu cần)
       unlink($filePath . $clientInfor['image']);

    }

    editClient($id,$username, $password, $name, $email,$role ,$fileName);
    $script = "<script> 
    alert('Sửa thông tin người dùng thành công!');
    window.location = 'index.php?action=listclient';
    </script>";
    echo $script;
}
?>
