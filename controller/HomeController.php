<?php

if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'home':
            include_once 'model/product.php';

            $getNewProduct = getNewProduct();
            $getLatestProduct = getNewProduct();
            $getProductByView = getProductByView();
            $getMostComment = getMostCommentProduct();
            include_once 'controller/CartController.php';
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                function countCartItems2() {
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        return count($_SESSION['cart']);
                    }
                    return 0;
                }
                
                // Kiểm tra session và tính toán số lượng sản phẩm
                $demsanpham = countCartItems2(); // Nếu giỏ hàng không có sản phẩm, sẽ trả về 0
                
            } else {$demsanpham=0;}
            include_once 'views/layout/header.php';
            include_once 'views/home/index.php';
            include_once 'views/layout/footer.php';
            break;
    }
}

