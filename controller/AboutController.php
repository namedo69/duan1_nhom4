<?php
include_once 'controller/CartController.php';
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    function countCartItems1() {
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            return count($_SESSION['cart']);
        }
        return 0;
    }
    
    // Kiểm tra session và tính toán số lượng sản phẩm
    $demsanpham = countCartItems1(); // Nếu giỏ hàng không có sản phẩm, sẽ trả về 0
    
} else {$demsanpham=0;}
include_once 'views/layout/header.php';
include_once 'views/about.php';
include_once 'views/layout/footer.php';