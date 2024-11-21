<?php
include_once 'pdo.php';

function listClient()
{
    $sql = 'select * from client';
    return pdo_query($sql);
}

function addProduct($username, $password, $name, $email,$image,$role)
{
    // Câu lệnh SQL thêm sản phẩm mới vào bảng client
    $sql = "INSERT INTO client (username, password, name, email,image,role) 
            VALUES ('$username', '$password', '$name', '$email','$image',$role)";
    
    // Thực thi câu lệnh SQL với tham số
    pdo_execute($sql);
}




function getClientById($id)
{
    $sql = "select * from client where client_id=$id";
    return pdo_query_one($sql);
}

function editClient($id,$username, $password, $name, $email,$image,$role)
{
    $sql = "update client set username = '$username', password='$password', name='$name', email='$email',image='$image',role=$role where client_id='$id'";
    pdo_execute($sql);
}

function changeStatusNguoiDung($id, $status)
{
    $sql = "update client set status = '$status' where client_id='$id'";
    pdo_execute($sql);
}