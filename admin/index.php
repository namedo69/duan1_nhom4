<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$base_url = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER["REQUEST_URI"] . '?') . '/';
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
    
            // client
            case "listclient":
                include_once 'controller/client/index.php';
                break;
            case "addclient":
                include_once 'controller/client/add.php';
                break;
            case "editclient":
                include_once 'controller/client/edit.php';
                break;
            case "deleteclient":
                include_once 'controller/client/delete.php';
                break;

            // order
            case "listhoadon":
                include_once 'controller/hoadon/index.php';
                break;
            case "trangthaihoadon":
                include_once 'controller/hoadon/edit.php';
                break;
            case "cthoadon":
                include_once 'controller/hoadon/cthoadon.php';
                break;
    }
} else {
    include_once 'controller/dashboard/index.php';
}