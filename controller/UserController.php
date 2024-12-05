<?php
include_once 'model/user.php';

if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'login':
            if (isset($_POST['username']) && isset($_POST['password'])) {
                // Gọi hàm userLogin để kiểm tra tài khoản, mật khẩu và trạng thái
                $result = userLogin($_POST['username'], $_POST['password']);
                
                if ($result) {
                    // Nếu tài khoản và mật khẩu đúng
                    $_SESSION['user'] = $result;
                    
                    // Kiểm tra status của người dùng
                    if ($_SESSION['user']['status'] == 0) {
                        // Nếu tài khoản bị khóa
                        unset($_SESSION['user']);
                        $script = "<script> 
                        alert('Tài khoản bị khóa rồi, liện hệ admin Lượng đập chai để được hỗ trợ!');
                        window.location = 'index.php?url=user&act=login';
                        </script>";
                        echo $script;   
                        exit;
                    } else {
                        // Nếu tài khoản còn hoạt động
                        $script = "<script> 
                        alert('Đăng nhập thành công!');
                        window.location = 'index.php?url=page&act=home';
                        </script>";
                        echo $script;
                        exit;  // Thêm exit để ngừng thực thi mã sau khi chuyển hướng
                    }
                } else {
                    // Nếu không thành công (sai tài khoản/mật khẩu)
                    $script = "<script> 
                    alert('Tài khoản hoặc mật khẩu không chính xác!');
                    window.location = 'index.php?url=user&act=login';
                    </script>";
                    echo $script; // Chuyển hướng lại trang đăng nhập
                    exit;
                }
            }
            
            // Kiểm tra giỏ hàng nếu cần
            include_once 'controller/CartController.php';
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                function countCartItems6() {
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        return count($_SESSION['cart']);
                    }
                    return 0;
                }
        
                // Kiểm tra session và tính toán số lượng sản phẩm
                $demsanpham = countCartItems6(); // Nếu giỏ hàng không có sản phẩm, sẽ trả về 0
            } else {
                $demsanpham = 0;
            }
        
            include_once 'views/layout/header.php';
            include_once 'views/login.php';
            include_once 'views/layout/footer.php';
            break;
        
        case 'register':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Lấy thông tin từ form
                $username = trim($_POST['username']);
                $password = trim($_POST['password']);
                $name = trim($_POST['name']);
                $email = trim($_POST['email']);
                
                // Kiểm tra xem email có tồn tại hay chưa
                if (hasEmail($name)) {
                    $script = "<script> 
                    alert('Tên tài khoản đã được đăng kí');
                    window.location = 'index.php?url=user&act=login';
                    </script>";
                    echo $script; // Chuyển hướng lại trang đăng nhập
                    exit;
                } else { 
                    $fileName = null;
                    if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
                        $filePath = 'admin/upload/AnhNhanBan/client/';
                
                        $fileName = date("Y_m_d_H_i_s") . $_FILES['image']['name'];
                        // Xóa file cũ nếu có. Gợi ý if (file_exist())
                        move_uploaded_file($_FILES['image']['tmp_name'], $filePath . $fileName);
                    // Kiểm tra nếu file đã tồn tại (tùy chọn: có thể thêm kiểm tra để xóa file cũ nếu cần)
                    if (file_exists($filePath . $image)) {
                        unlink($filePath . $image); // Xóa ảnh
                    }

                    }
                    addClient($username, $password, $name, $email,$fileName);
                    $script = "<script> 
                    alert('Đăng kí thành công!');
                    window.location = 'index.php?url=user&act=login';
                    </script>";
                    echo $script; // Chuyển hướng lại trang đăng nhập
                    exit;
                }

            }
            include_once 'controller/CartController.php';
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                function countCartItems7() {
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        return count($_SESSION['cart']);
                    }
                    return 0;
                }
                
                // Kiểm tra session và tính toán số lượng sản phẩm
                $demsanpham = countCartItems7(); // Nếu giỏ hàng không có sản phẩm, sẽ trả về 0
                
            } else {$demsanpham=0;}
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