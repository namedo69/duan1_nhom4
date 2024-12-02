<?php
include_once 'pdo.php';

function addCheckout($client_id, $name, $phone, $email, $address, $tongTien, $pay, $status)
{
    $thanhtoan=$tongTien+20000
    $sql = "INSERT INTO bill (client_id, name, phone, email, address, total, pay, status) VALUES ('$client_id', '$name', '$phone', '$email', '$address', '$thanhtoan', '$pay', '$status')";
    return pdo_execute_return_id($sql);
}

function addCheckoutDetail($bill_id, $product_id, $quantity, $price)
{
    $sql = "INSERT INTO bill_detail (bill_id, product_id, quantity, price) VALUES ('$bill_id', '$product_id', '$quantity', '$price')";
    return pdo_execute($sql);
}
