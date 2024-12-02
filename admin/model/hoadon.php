<?php
include_once 'pdo.php';

function listHoaDon()
{
    $sql = 'select * from bill';
    return pdo_query($sql);
}
function changeStatusHoaDon($id, $status)
{
    // Lấy thời gian hiện tại
    $created_at = date('Y-m-d H:i:s'); // Định dạng thời gian theo kiểu MySQL

    // Cập nhật status và created_at
    $sql = "UPDATE bill SET status = '$status', created_at = '$created_at' WHERE id = '$id'";
    
    // Thực thi câu lệnh SQL
    pdo_execute($sql);
}

function getHoaDonById($id)
{
    $sql = "select * from bill where id = $id";
    return pdo_query_one($sql);
}

function getAllChiTietDonHang($id)
{
    $sql = "select * from bill_detail where bill_id = $id";
    return pdo_query($sql);
}
function changeStatus($id, $status)
{
    $sql = "update bill set status = '$status' where id ='$id'";
    pdo_execute($sql);
}