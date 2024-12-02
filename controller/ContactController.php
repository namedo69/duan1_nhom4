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
include_once 'views/layout/header.php';
include_once 'views/contact.php';
include_once 'views/layout/footer.php';