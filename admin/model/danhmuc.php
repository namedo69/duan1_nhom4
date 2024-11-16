<?php 
include_once 'pdo.php';

function listDanhMuc() {
    $sql = 'select * from danh_muc';
    return pdo_query($sql);
}