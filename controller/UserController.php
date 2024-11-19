<?php
include_once 'model/user.php';

if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'login':
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $result = userLogin($_POST['username'], $_POST['password']);
                if ($result) {
                    $_SESSION['user'] = $result;
                    header('Location: ?url=page&act=home');
                } else {
                    $_SESSION['error'] = 'Sai tài khoản hoặc mật khẩu';
                }
            }
            include_once 'views/layout/header.php';
            include_once 'views/login.php';
            include_once 'views/layout/footer.php';
            break;
        case 'register':
            if (isset($_POST['submit'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $hasEmail = hasEmail($email);
                if ($hasEmail) {
                    $_SESSION['error'] = 'Email này đã được đăng kí!';
                } else {
                    $username = $email;
                    $image = 'default.png';
                    $role = 1;
                    userRegister($username, $password, $name, $email, $image, $role);
                    header('Location: ?url=user&act=login');
                }
            }
            include_once 'views/layout/header.php';
            include_once 'views/register.php';
            include_once 'views/layout/footer.php';
            break;
        case 'logout':
            unset($_SESSION['user']);
            header('Location: ?url=page&act=home');
            break;
    }
}