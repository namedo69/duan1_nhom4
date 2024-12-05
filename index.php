
<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$base_url = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER["REQUEST_URI"] . '?') . '/';
include_once 'config.php';
include_once 'model/pdo.php';
include_once 'model/category.php';

$getAllCategory = getAllCategory();
if (isset($_GET['url'])) {
    switch ($_GET['url']) {
        case 'page':
            include_once 'controller/HomeController.php';
            break;
        case 'user':
            include_once 'controller/UserController.php';
            break;
        case 'category':
            include_once 'controller/CategoryController.php';
            break;
        case 'product':
            include_once 'controller/ProductController.php';
            break;
        case 'cart':
            include_once 'controller/CartController.php';
            break;
        case 'contact':
            include_once 'controller/ContactController.php';
            break;
        case 'about':
            include_once 'controller/AboutController.php';
            break;
        case 'profile':
            include_once 'controller/ProfileController.php';
            break;
    }
} else {
    header('location: ?url=page&act=home');
}

