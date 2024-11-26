<?php

if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'home':
            include_once 'model/product.php';

            $getNewProduct = getNewProduct(8);
            $getLatestProduct = getNewProduct(5);
            $getProductByView = getProductByView(5);
            $getMostComment = getMostCommentProduct(5);

            include_once 'views/layout/header.php';
            include_once 'views/home/index.php';
            include_once 'views/layout/footer.php';
            break;
    }
}

