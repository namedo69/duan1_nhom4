<?php
include_once 'pdo.php';

function listSanPham()
{
    $sql = 'select * from product';
    return pdo_query($sql);
}

function addProduct($name, $price, $description, $image,$category_id)
{
    // Câu lệnh SQL thêm sản phẩm mới vào bảng product
    $sql = "INSERT INTO product (name, price, description, image,view,category_id) 
            VALUES ('$name', $price, '$description', '$image',0,$category_id)";
    
    // Thực thi câu lệnh SQL với tham số
    pdo_execute($sql);
}




function getSanPhamById($id)
{
    $sql = "select * from product where product_id=$id";
    return pdo_query_one($sql);
}

function editSanPham($id, $name, $description ,$category_id, $image)
{
    $sql = "update product set name = '$name', description='$description', category_id='$category_id', image='$image' where product_id='$id'";
    pdo_execute($sql);
}

function changeStatus($id, $status)
{
    $sql = "update product set status = '$status' where product_id='$id'";
    pdo_execute($sql);
}