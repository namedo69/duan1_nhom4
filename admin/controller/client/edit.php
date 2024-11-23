<<<<<<< HEAD

=======
>>>>>>> 05b28e66df54bf3bcd56ca94b678faec69d55d1e
<?php
include_once './model/client.php';

if (!isset($_POST['edit']) && isset($_GET['id'])) {
    $clientInfo = getClientById($_GET['id']);
    include_once './view/client/edit.php';
} else {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $fileName = null;
    if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
        $filePath = 'upload/client/';
        $fileName = date("Y_m_d_H_i_s") . $_FILES['image']['name'];
        // Xóa file cũ nếu có. Gợi ý if (file_exist())
        move_uploaded_file($_FILES['image']['tmp_name'], $filePath . $fileName);
    }
    editClient($id,$username, $password, $name, $email,$role ,$fileName);
    $script = "<script> 
    alert('Sửa thông tin người dùng thành công!');
    window.location = 'index.php?action=listclient';
    </script>";
    echo $script;
}
?>
