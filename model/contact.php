<?php
include_once 'pdo.php';

function addContact($name, $email, $message)
{
    $sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";
    return pdo_execute($sql);
}
