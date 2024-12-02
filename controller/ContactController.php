<?php
include_once 'model/contact.php';

if(isset($_POST['send'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    addContact($name, $email, $message);

    echo "<script>
    alert('Cảm ơn bạn đã liên hệ với chúng tôi!');
    window.location = '?url=page&act=home';
    </script>";
    exit;
}
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
include_once 'views/contact.php';
include_once 'views/layout/footer.php';