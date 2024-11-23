
<?php

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
    }
} else {
    header('location: ?url=page&act=home');
}

