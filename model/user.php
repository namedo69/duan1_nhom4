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

