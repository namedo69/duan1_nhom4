<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="ogani-master/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="ogani-master/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="ogani-master/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="ogani-master/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="ogani-master/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="ogani-master/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="ogani-master/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="asset/css/style.css" type="text/css">
    <link rel="stylesheet" href="asset/css/css.css" type="text/css">
</head>

<style>
    .active > a {
        font-weight: bold;
        color: #ff9900;
    }
</style>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="?url=page&act=home"><img src="img/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
        </ul>
        <div class="header__cart__price">item: <span>$150.00</span></div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="img/language.png" alt="">
            <div>English</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#">Spanish</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div>
        <div class="header__top__right__auth">
            <a href="#"><i class="fa fa-user"></i> Login</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="<?= (isset($_GET['url']) && $_GET['url'] == 'page&act=home') ? 'active' : '' ?>">
                <a href="?url=page&act=home">Home</a>
            </li>
            <li class="<?= (isset($_GET['url']) && strpos($_GET['url'], 'product') !== false) ? 'active' : '' ?>">
                <a href="?url=product&act=listAll">Shop</a>
            </li>
            <li class="<?= (isset($_GET['url']) && strpos($_GET['url'], 'blog') !== false) ? 'active' : '' ?>">
                <a href="./blog.html">Blog</a>
            </li>
            <li class="<?= (isset($_GET['url']) && $_GET['url'] == 'contact') ? 'active' : '' ?>">
                <a href="?url=contact">Contact</a>
            </li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
            <li>Free Shipping for all Order of $99</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                            <li>Free Shipping for all Order of $99</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <?php if (!isset($_SESSION['user'])) { ?>
                            <div class="header__top__right__auth">
                                <a href="?url=user&act=login"><i class="fa fa-user"></i> Login</a>
                            </div>
                        <?php } else {  ?>
                            <div class="header__top__right__language">
                                <div>Xin chào, <?= $_SESSION['user']['name'] ?></div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Tài khoản</a></li>
                                    <li><a href="?url=user&act=logout"> Đăng xuất </a></li>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="?url=page&act=home"><img src="ogani-master/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                    <li class="<?= (isset($_GET['url']) && strpos($_GET['url'], 'page') !== false) ? 'active' : '' ?>">
                            <a href="?url=page&act=home">Home</a>
                        </li>
                        <li class="<?= (isset($_GET['url']) && strpos($_GET['url'], 'product') !== false) ? 'active' : '' ?>">
                            <a href="?url=product&act=listAll">Shop</a>
                        </li>
                        <li class="<?= (isset($_GET['url']) && strpos($_GET['url'], 'about') !== false) ? 'active' : '' ?>">
                            <a href="?url=about">About Us</a>
                        </li>
                        <li class="<?= (isset($_GET['url']) && $_GET['url'] == 'contact') ? 'active' : '' ?>">
                            <a href="?url=contact">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="?url=cart&act=listCart"><i class="fa fa-shopping-bag"></i> <span><?php echo $demsanpham ?></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->

</body>

</html>
