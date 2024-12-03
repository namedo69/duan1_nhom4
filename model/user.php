<?php
include_once 'pdo.php';

function userLogin($username, $password)
{
    return pdo_query_one("SELECT * FROM client WHERE `username` = '$username' AND `password` = '$password'");
}
function hasEmail($email){
 return pdo_query_one("SELECT * FROM client WHERE email = '$email'");
}
function userRegister($username, $password, $name, $email, $image, $role) {
    $sql = "INSERT INTO client (username, password, name, email, image, role) VALUES ('$username', '$password', '$name', '$email', '$image', '$role')";
    return pdo_execute($sql);
}


include_once 'pdo.php';

function listClient()
{
    $sql = 'select * from client';
    return pdo_query($sql);
}

function addClient($username, $password, $name, $email,$role ,$fileName)
{
   
  if($fileName==null){
    $sql = "INSERT INTO client (username, password, name, email,image,role) 
            VALUES ('$username', '$password', '$name', '$email','avatarDefault.jpg',$role)";
  } else {
    $sql = "INSERT INTO client (username, password, name, email,image,role) 
            VALUES ('$username', '$password', '$name', '$email','$fileName',$role)";
  }
    

    pdo_execute($sql);
}




function getClientById($id)
{
    $sql = "select * from client where client_id=$id";
    return pdo_query_one($sql);
}

function editClient($id, $username, $password, $name, $email, $role, $fileName, $address, $number, $birthday)
{
    if ($fileName == null) {
        // Cập nhật thông tin người dùng mà không thay đổi ảnh
        $sql = "UPDATE client 
                SET username = '$username', password = '$password', name = '$name', email = '$email', role = '$role', address = '$address', number = '$number', birthday = '$birthday' 
                WHERE client_id = '$id'";
        pdo_execute($sql);
    } else {
        // Cập nhật thông tin người dùng và thay đổi ảnh
        $sql = "UPDATE client 
                SET username = '$username', password = '$password', name = '$name', email = '$email', role = '$role', image = '$fileName', address = '$address', number = '$number', birthday = '$birthday' 
                WHERE client_id = '$id'";
        pdo_execute($sql);
    }
}



function changeStatusNguoiDung($id, $status)
{
    $sql = "update client set status = '$status' where client_id='$id'";
    pdo_execute($sql);
}