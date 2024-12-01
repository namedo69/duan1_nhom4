<?php

 if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
     function countCartItems() {
         if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
             return count($_SESSION['cart']);
         }
         return 0;
     }
     
     // Kiểm tra session và tính toán số lượng sản phẩm
     $demsanpham = countCartItems(); // Nếu giỏ hàng không có sản phẩm, sẽ trả về 0
     
 } else {$demsanpham=0;}
if (isset($_GET['act'])){
    switch ($_GET['act']) {
        case 'addToCart':
            if (isset($_GET['id'])){
                $id = $_GET['id'];
                $quantity = 1;
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                    $_SESSION['cart'][] = [
                        'id' => $id,
                        'quantity' => $quantity
                    ];
                } else {
                    $tonTaiTrongGioHang = false;
                    foreach ($_SESSION['cart'] as $key => $value) {
                        if ($id == $value['id']) {
                            $tonTaiTrongGioHang = true;
                            $_SESSION['cart'][$key]['quantity'] += 1;
                        }
                    }
                    if ($tonTaiTrongGioHang == false) {
                        $_SESSION['cart'][] = [
                            'id' => $id,
                            'quantity' => $quantity
                        ];
                    }
                }
                $script = "<script> 
                window.location = '?url=cart&act=listCart';
                </script>";
                echo $script;
            }
            break;
            case 'listCart';
                include_once 'model/product.php';
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    $listCart = $_SESSION['cart'];
                    $tongTien = 0;
                    foreach ($listCart as $key => $item) {
                        $productDetail = getProductByID($item['id']);
                        $listCart[$key]['name'] = $productDetail['name'];
                        $listCart[$key]['image'] = $productDetail['image'];
                        $listCart[$key]['price'] = $productDetail['price'];
                        $tongTien += $productDetail['price'] * $item['quantity'];
                    }
                    include_once 'views/layout/header.php';
                    include_once 'views/listCart.php';
                    include_once 'views/layout/footer.php';
                } else {
                    $script = "<script> 
                    alert('Giỏ hàng đang trống !!!!!!');
                    window.location = 'index.php';
                    </script>";
                    echo $script;
                }
            break;
            case 'removeCart':
                if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $key => $item) {
                            if ($id == $item['id']) {
                                unset($_SESSION['cart'][$key]);
                            }
                        }
                    }
                }
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                header('location: ?url=cart&act=listCart');
                break;
            case 'checkout';
                include_once 'model/product.php';
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    $listCart = $_SESSION['cart'];
                    $tongTien = 0;
                    foreach ($listCart as $key => $item) {
                        $productDetail = getProductByID($item['id']);
                        $listCart[$key]['name'] = $productDetail['name'];
                        $listCart[$key]['image'] = $productDetail['image'];
                        $listCart[$key]['price'] = $productDetail['price'];
                        $tongTien += $productDetail['price'] * $item['quantity'];
                    }
                    include_once 'views/layout/header.php';
                    include_once 'views/checkout.php';
                    include_once 'views/layout/footer.php';
                } else {
                    $script = "<script> 
                    alert('Giỏ hàng đang trống !!!!!!');
                    window.location = 'index.php';
                    </script>";
                    echo $script;
                }
                break;
            case 'addCheckout':
                include_once 'model/product.php';
                include_once 'model/checkout.php';
                if (isset($_POST['thanhtoan'])) {
                    $listCart = $_SESSION['cart'];
                    $tongTien = 0;
                    foreach ($listCart as $key => $item) {
                        $productDetail = getProductByID($item['id']);
                        $listCart[$key]['name'] = $productDetail['name'];
                        $listCart[$key]['image'] = $productDetail['image'];
                        $listCart[$key]['price'] = $productDetail['price'];
                        $tongTien += $productDetail['price'] * $item['quantity'];
                    }
                    $name = $_POST['name'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $pay = $_POST['pay'];
                    $status = 0;
                    $tongTien += 20000;
                    if (!isset($_SESSION['user'])) {
                        echo "<script>
                        alert('Bạn cần đăng nhập để thanh toán.');
                        window.location = '?url=user&act=login';
                        </script>";
                        exit;
                    } else {
                        $client_id = $_SESSION['user']['client_id'];
                    }
                    $bill_id = addCheckout($client_id, $name, $phone, $email, $address, $tongTien, $pay, $status);

                    foreach ($listCart as $item) {
                        addCheckoutDetail($bill_id, $item['id'], $item['quantity'], $item['price']);
                    }

                    unset($_SESSION['cart']);
                    $script = "<script> 
                alert('Bạn đã đặt hàng thành công');
                window.location = 'index.php';
                </script>";
                    echo $script;
                    break;
                }
    }
}
