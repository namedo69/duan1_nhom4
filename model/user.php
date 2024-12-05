<?php
include_once 'pdo.php';

function userLogin($username, $password)
{
    return pdo_query_one("SELECT * FROM client WHERE `username` = '$username' AND `password` = '$password'");
}
function hasEmail($email){
 return pdo_query_one("SELECT * FROM client WHERE email = '$email'");
}
function userRegister($username, $password, $name, $email,$fileName) {
    // Thiết lập giá trị mặc định
    $role = 1;  // Vai trò mặc định là 1 (người dùng bình thường)
    $status = 1;  // Trạng thái mặc định là 1 (tài khoản hoạt động)
  // Ảnh đại diện mặc định

    // Chèn tài khoản mới vào cơ sở dữ liệu
    $sql = "INSERT INTO client (username, password, name, email, image, role, status,address, number, birthday) 
            VALUES ('$username', '$password', '$name', '$email', '$fileName', '$role', '$status','Chưa thêm','Chưa thêm','Chưa thêm')";
    return pdo_execute($sql);  // Gọi hàm để thực hiện câu lệnh SQL
}


function listClient()
{
    $sql = 'select * from client';
    return pdo_query($sql);
}

function addClient($username, $password, $name, $email,$fileName)
{
   
  if($fileName==null){
    $sql = "INSERT INTO client (username, password, name, email,image,address,birthday) 
            VALUES ('$username', '$password', '$name', '$email','avatarDefault.jpg','Chưa thêm','Chưa thêm')";
  } else {
    $sql = "INSERT INTO client (username, password, name, email,image) 
            VALUES ('$username', '$password', '$name', '$email','$fileName','Chưa thêm','Chưa thêm')";
  }
    

    pdo_execute($sql);
}




function getClientById($id)
{
    $sql = "select * from client where client_id=$id";
    return pdo_query_one($sql);
}

function editClient($id, $password, $name, $email,$fileName,$address,$number,$birthday)
{
    if ($fileName == null) {
        $sql = "update client set password='$password', name='$name',email='$email',address='$address',number='$number',birthday='$birthday' where client_id='$id'";
        pdo_execute($sql);
    } else {
        $sql = "update client set password='$password', name='$name',email='$email', address='$address',number='$number',birthday='$birthday', image='$fileName' where client_id='$id'";
        pdo_execute($sql);
}
}


function changeStatusNguoiDung($id, $status)
{
    $sql = "update client set status = '$status' where client_id='$id'";
    pdo_execute($sql);
}