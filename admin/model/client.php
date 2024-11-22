<?php
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

function editClient($id,$username, $password, $name, $email,$role ,$fileName)
{
    if ($fileName == null){
        $sql = "update client set username = '$username', password='$password', name='$name',email='$email', role='$role' where client_id='$id'";
    } else {
        $sql = "update client set username = '$username', password='$password', name='$name',email='$email', role='$role', image='$fileName' where client_id='$id'";
    }
    pdo_execute($sql);
}


function changeStatusNguoiDung($id, $status)
{
    $sql = "update client set status = '$status' where client_id='$id'";
    pdo_execute($sql);
}