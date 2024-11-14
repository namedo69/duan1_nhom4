<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="Ogani Template" />
    <meta name="keywords" content="Ogani, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Ogani | Template</title>

    <!-- Google Font -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <!-- Css Styles -->
    <link rel="stylesheet" href="ogani-master/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="ogani-master/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="ogani-master/css/elegant-icons.css" type="text/css" />
    <link rel="stylesheet" href="ogani-master/css/nice-select.css" type="text/css" />
    <link rel="stylesheet" href="ogani-master/css/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="ogani-master/css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="ogani-master/css/slicknav.min.css" type="text/css" />
    <link rel="stylesheet" href="ogani-master/css/style.css" type="text/css" />
  </head>

  <body>
    <!-- Page Preloder -->
    <div id="preloder">
      <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="header__logo">
              <a href=""><img src="asset/img/logo.png" alt="" /></a>
            </div>
          </div>
          <div class="col-lg-6">
            <nav class="header__menu">
              <ul>
                <li><a href="?url=page&act=home">Home</a></li>
                <li><a href="">Shop</a></li>
                <li>
                  <a href="#">Pages</a>
                  <ul class="header__menu__dropdown">
                    <li><a href="">Shop Details</a></li>
                    <li><a href="">Shoping Cart</a></li>
                    <li><a href="">Check Out</a></li>
                    <li><a href="">Blog Details</a></li>
                  </ul>
                </li>
                <li><a href="">Blog</a></li>
                <li class="active"><a href="">Contact</a></li>
              </ul>
            </nav>
          </div>
          <div class="col-lg-3">
            <div class="header__cart">
              <ul>
                  <li>
                      <span>Login</span>
                      <a href="#"><i class="fa fa-user"></i></a>
                  </li>
                <li>
                  <a href="#"><i class="fa fa-heart"></i></a>
                </li>
                <li>
                  <a href="#"
                    ><i class="fa fa-shopping-bag"></i></a
                  >
                </li>
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

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="hero__categories">
              <div class="hero__categories__all">
                <i class="fa fa-bars"></i>
                <span>Danh mục sách</span>
              </div>
              <ul>
                  <?php foreach ($getAllCategory as $item) { ?>
                    <li><a href="#"><?= $item['name'] ?></a></li>
                  <?php } ?>
              </ul>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="hero__search">
              <div class="hero__search__form">
                <form action="#">
                  <input type="text" placeholder="" />
                  <button type="submit" class="site-btn">Tìm kiếm</button>
                </form>
              </div>
              <div class="hero__search__phone">
                <div class="hero__search__phone__icon">
                  <i class="fa fa-phone"></i>
                </div>
                <div class="hero__search__phone__text">
                  <h5>0392.051.825</h5>
                  <span>Support 24/7 time</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Hero Section End -->