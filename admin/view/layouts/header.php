<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="./asset/css/bootstrap.css">
    <link rel="stylesheet" href="./asset/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="./asset/vendors/iconly/bold.css">
    <link rel="stylesheet" href="./asset/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="./asset/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="./asset/css/app.css">
    <link rel="shortcut icon" href="./asset/images/favicon.svg" type="image/x-icon">

    <!-- Custom CSS -->
    <style>
        .sidebar-item.active a {
            background-color: #007bff; /* Màu nền nổi bật */
            color: white; /* Màu chữ */
        }

        .sidebar-item a {
            color: #6c757d; /* Màu chữ mặc định */
            text-decoration: none;
        }

        .sidebar-item.active a:hover {
            color: white;
            background-color: #0056b3; /* Màu khi hover */
        }
    </style>
</head>

<body>
    <?php
    // Lấy hành động hiện tại từ URL
    $currentAction = isset($_GET['action']) ? $_GET['action'] : '';
    ?>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="./asset/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item <?php echo $currentAction === '' ? 'active' : ''; ?>">
                            <a href="http://localhost/duan1_nhom4/admin/" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php
if ($currentAction === 'listdanhmuc' || $currentAction === 'adddanhmuc' || $currentAction === 'editdanhmuc') {
    echo 'active';
} else {
    echo '';
}
?>">
                            <a href="index.php?action=listdanhmuc" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Danh mục</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php
if ($currentAction === 'listsanpham' || $currentAction === 'addsanpham' || $currentAction === 'editsanpham') {
    echo 'active';
} else {
    echo '';
}
?>">
                            <a href="index.php?action=listsanpham" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Sản phẩm</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php echo $currentAction === 'listcomment' ? 'active' : ''; ?>">
                            <a href="index.php?action=listcomment" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Bình luận</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php echo $currentAction === 'listhoadon' ? 'active' : ''; ?>">
                            <a href="index.php?action=listhoadon" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Hoá đơn</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php
if ($currentAction === 'listclient' || $currentAction === 'addclient' || $currentAction === 'editclient') {
    echo 'active';
} else {
    echo '';
}
?>">
                            <a href="index.php?action=listclient" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Người dùng</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
    </div>
</body>

</html>
