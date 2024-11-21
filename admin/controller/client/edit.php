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
    $email = $_POST['email'];
    $image = $_POST['image'];
    $role = $_POST['role'];
    editClient($id,$username, $password, $name, $email,$image,$role);

    $script = "<script> 
    alert('Sửa thông tin người dùng thành công!');
    window.location = 'index.php?action=listclient';
    </script>";
    echo $script;
}