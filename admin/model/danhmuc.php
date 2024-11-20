<?php
include_once 'pdo.php';

function listDanhMuc()
{
    $sql = 'select * from category';
    return pdo_query($sql);
}

function addDanhMuc($name)
{
    $sql = "insert into category (name) values ('$name')";
    pdo_execute($sql);
}

function getDanhMucById($id)
{
    $sql = "select * from category where category_id=$id";
    return pdo_query_one($sql);
}

function editDanhMuc($id, $name)
{
    $sql = "update category set name = '$name' where category_id='$id'";
    pdo_execute($sql);
}

function changeStatus($id, $status)
{
    $sql = "update category set status = '$status' where category_id='$id'";
    pdo_execute($sql);
}