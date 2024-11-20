<?php

if (isset($_GET['action']) && $_GET['action'] != '') {
    $action = $_GET['action'];
    switch ($action) {
            // danh mục
        case "listdanhmuc":
            include_once 'controller/danhmuc/index.php';
            break;
        case "adddanhmuc":
            include_once 'controller/danhmuc/add.php';
            break;
        case "editdanhmuc":
            include_once 'controller/danhmuc/edit.php';
            break;
        case "deletedanhmuc":
            include_once 'controller/danhmuc/delete.php';
            break;

            // sản phẩm
        case "listsanpham":
            include_once 'controller/sanpham/index.php';
            break;
        case "addsanpham":
            include_once 'controller/sanpham/add.php';
            break;
        case "editsanpham":
            include_once 'controller/sanpham/edit.php';
            break;
        case "deletesanpham":
            include_once 'controller/sanpham/delete.php';
            break;

            // comment
        case "listcomment":
            include_once 'controller/comment/index.php';
            break;
        case "deletecomment":
            include_once 'controller/comment/delete.php';
            break;
    

    }
} else {
    include_once 'controller/dashboard/index.php';
}