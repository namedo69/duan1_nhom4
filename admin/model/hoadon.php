<?php
include_once 'pdo.php';

function listHoaDon()
{
    $sql = 'select * from bill';
    return pdo_query($sql);
}

function addHoaDon($name)
{
    $sql = "insert into order_admin_admin (name) values ('$name')";
    pdo_execute($sql);
}

function getHoaDonById($id)
{
    $sql = "select * from bill where order_admin_id=$id";
    return pdo_query_one($sql);
}

function changeStatus($id, $status)
{
    $sql = "update product set status = '$status' where product_id='$id'";
    pdo_execute($sql);
}

function changeStatusHoaDon($id, $status)
{
    $sql = "update bill set status = '$status' where order_admin_id='$id'";
    pdo_execute($sql);
}