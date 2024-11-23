<?php
include_once 'pdo.php';

function listSanPham()
{
    $sql = 'select * from product';
    return pdo_query($sql);
}

function addProduct($name, $price, $description, $fileName,$category_id)
{
    // Câu lệnh SQL thêm sản phẩm mới vào bảng product
    $sql = "INSERT INTO product (name, price, description, image,view,category_id) 
            VALUES ('$name', $price, '$description', '$fileName',0,$category_id)";
    
    // Thực thi câu lệnh SQL với tham số
    pdo_execute($sql);
}




function getSanPhamById($id)
{
    $sql = "select * from product where product_id=$id";
    return pdo_query_one($sql);
}


function editSanPham($id, $name, $fileName,  $price, $description ,$category_id)
{
    if ($fileName == null) {
        $sql = "update product set name = '$name', price = '$price', description = '$description' , category_id = '$category_id' where product_id='$id'";
    } else {
        $sql = "update product set name = '$name', price = '$price', description = '$description' , category_id = '$category_id', image = '$fileName' where product_id='$id'";
    }
    pdo_execute($sql);
}

function changeStatusSanPham($id, $status)
{
    $sql = "update product set status = '$status' where product_id='$id'";
    pdo_execute($sql);
}