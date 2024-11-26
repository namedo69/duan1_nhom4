<?php

if (isset($_GET['act'])){
    switch ($_GET['act']) {
        case 'detail';
            include_once 'model/product.php';
            include_once 'model/comment.php';
                $productDetail = getProductByID($_GET['id']);
                $randomProduct = getRandomProduct($productDetail['category_id']);
                $incrementView = increaseView($_GET['id']);
                $listComment = listComments($_GET['id']);
                if (isset($_POST['comment']))
                {
                 $product_id = $_GET['id'];
                 $content = $_POST['content'];
                 addComment($_SESSION['user']['client_id'],$product_id, $content);
                 header("location: ?url=product&act=detail&id=".$_GET['id']);
                }
                include_once 'views/layout/header.php';
                include_once 'views/productDetail.php';
                include_once 'views/layout/footer.php';
                break;
        case 'listAll';
            include_once 'model/product.php';
            include_once 'model/category.php';
                $allProduct = getAllProduct();
                $listCategory = getAllCategory();
                $result = countProduct();
                $totalProduct = $result[0]['total'];
                include_once 'views/layout/header.php';
                include_once 'views/allProducts.php';
                include_once 'views/layout/footer.php';
                break;
        case 'search';
            include_once 'model/product.php';
            include_once 'model/category.php';
            $listCategory = getAllCategory();
            if (isset($_POST['keyword'])){
                header("location: ?url=product&act=search&keyword=".$_POST['keyword']);
            }
            $result = productSearch($_GET['keyword']);
            include_once 'views/layout/header.php';
            include_once 'views/productSearch.php';
            include_once 'views/layout/footer.php';
            break;
    }
}