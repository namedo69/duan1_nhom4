
<?php

include_once 'config.php';
include_once 'model/pdo.php';

if (isset($_GET['url'])) {
    switch ($_GET['url']) {
        case 'page':
            include_once 'controller/HomeController.php';
    }
} else {
    header('location: ?url=page&act=home');
}

