<?php
include_once './model/client.php';

if (!isset($_POST['add'])) {
    include_once './view/client/add.php';
} else {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $image = $_POST['image'];
    $role = $_POST['role'];
    addProduct($username, $password, $name, $email,$image,$role);
    $script = "<script> 
    alert('Thêm người dùng thành công!');
    window.location = 'index.php?action=listclient';
    </script>";
    echo $script;
}