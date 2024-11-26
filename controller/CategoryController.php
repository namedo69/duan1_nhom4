<?php

if (isset($_GET['act'])){
    switch ($_GET['act']) {
        case 'detail';
            include_once 'model/category.php';
            include_once 'model/product.php';

            $listCategory = getAllCategory();
            $categoryDetail = getCategoryById($_GET['id']);
            $listProductByCategory = getProductByCategory($_GET['id']);
            include_once 'views/layout/header.php';
            include_once 'views/categoryDetail.php';
            include_once 'views/layout/footer.php';
    }
}