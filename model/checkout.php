<?php
include_once 'pdo.php';

function addCheckout($client_id, $name, $phone, $email, $address, $tongTien, $pay, $status)
{
    $sql = "INSERT INTO bill (client_id, name, phone, email, address, total, pay, status) VALUES ('$client_id', '$name', '$phone', '$email', '$address', '$tongTien', '$pay', '$status')";
    return pdo_execute_return_id($sql);
}

function addCheckoutDetail($bill_id, $product_id, $quantity, $price)
{
    $sql = "INSERT INTO bill_detail (bill_id, product_id, quantity, price) VALUES ('$bill_id', '$product_id', '$quantity', '$price')";
    return pdo_execute($sql);
}


function getBillByClientId()
{
    $clientId = $_SESSION['user']['client_id'];
    $sql = "SELECT * FROM bill WHERE client_id = $clientId";
    return pdo_query($sql);
}

function getAllChiTietDonHang($id)
{
    $sql = "select * from bill_detail where bill_id = $id";
    return pdo_query($sql);
}

function getSanPhamById($id)
{
    $sql = "select * from product where product_id=$id";
    return pdo_query_one($sql);
}
function getHoaDonById($id)
{
    $sql = "select * from bill where id = $id";
    return pdo_query_one($sql);
}