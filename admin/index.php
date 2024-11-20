<?php

if (isset($_GET['action']) && $_GET['action'] != '') {
    $action = $_GET['action'];
    switch ($action) {
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
        case "listsanpham":
            include_once 'controller/sanpham/index.php';
            break;
        case "addsanpham":
            include_once 'controller/sanpham/add.php';
            break;
        case "editsanpham":
            include_once 'controller/sanpham/edit.php';
            break;

    }
} else {
    include_once 'controller/dashboard/index.php';
}