<?php

if (isset($_GET['act'])){
    switch ($_GET['act']) {
            case 'detail':
                include_once 'model/user.php';
                include_once 'model/checkout.php';
                $getBillByClientId=getBillByClientId();

                $clientInfor = getClientById($_SESSION['user']['client_id']);
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
                include_once 'views/profile.php';
                include_once 'views/layout/footer.php';
           
            case 'billdetail':
                if (isset($_GET['id'])) {
                include_once 'model/checkout.php';
                $id=$_GET['id'];
                $hoaDonChiTiet = getHoaDonById($id);
                $hoaDonInfo = getAllChiTietDonHang($id);
                foreach ($hoaDonInfo as $key => $value) {
                    $sanPhamInfo = getSanPhamById($value['product_id']);
                    $hoaDonInfo[$key]['name'] = $sanPhamInfo['name'];
                    $hoaDonInfo[$key]['image'] = $sanPhamInfo['image'];
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
                include_once 'views/billdetail.php';
                include_once 'views/layout/footer.php';
            }

            case 'edit':
                include_once 'model/user.php';
                if (!isset($_GET['id']) && isset($_GET['act'])) {
                    include_once 'model/checkout.php';
                    $getBillByClientId=getBillByClientId();
    
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
                    include_once 'views/profile.php';
                    include_once 'views/layout/footer.php';
                } else {
                    if ($_GET['url'] == 'profile' && $_GET['act'] == 'edit') {
                        if (isset($_POST['update'])) {
                            $name = $_POST['name'];
                            $id = $_POST['id'];
                            $clientInfor = getClientById($_POST['id']);
                            $password = $_POST['password'];
                            $email = $_POST['email'];
                            $address = $_POST['address'];
                            $number = $_POST['number'];
                            $birthday = $_POST['birthday'];
                            $fileName = null;
                            if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
                                $filePath = 'admin/upload/AnhNhanBan/client/';
                        
                                $fileName = date("Y_m_d_H_i_s") . $_FILES['image']['name'];
                                // Xóa file cũ nếu có. Gợi ý if (file_exist())
                                move_uploaded_file($_FILES['image']['tmp_name'], $filePath . $fileName);
                            // Kiểm tra nếu file đã tồn tại (tùy chọn: có thể thêm kiểm tra để xóa file cũ nếu cần)
                            if (isset($clientInfor['image']) && file_exists($filePath . $clientInfor['image'])) {
                                unlink($filePath . $clientInfor['image']);
                            }
                            }

                            editClient($id, $password, $name, $email,$fileName,$address,$number,$birthday);
                            $script = "<script> 
                            alert('Sửa thông tin người dùng thành công!');
                            window.location = 'index.php?url=profile&act=detail';
                            </script>";
                            echo $script;
                        }
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
                    include_once 'views/editprofile.php';
                    include_once 'views/layout/footer.php';
                }
               
    }
}