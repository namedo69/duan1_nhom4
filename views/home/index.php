<!-- Hero Section Begin -->
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <div class="hero__search">
                <div class="hero__search__form">
                    <form action="?url=product&act=search" method="post">
                        <input name="keyword" type="text" placeholder="Bạn cần gì?">
                        <button type="submit" class="site-btn">TÌM KIẾM</button>
                    </form>
                </div>
                <div class="hero__search__phone">
                    <div class="hero__search__phone__icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="hero__search__phone__text">
                        <h5>+65 11.188.888</h5>
                        <span>Hỗ trợ 24/7</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-33">
        <div class="hero__categories">
            <div class="hero__categories__all">
                <i class="fa fa-bars"></i>
                <span> Danh mục</span>
            </div>
            <div class="danhmuc_banner">
                <ul class="hero-list">
                    <?php foreach ($getAllCategory as $item){if($item['status']==1){ ?>
                        <li><a href="?url=category&act=detail&id=<?= $item['category_id'] ?>"> <?= $item['name'] ?></a></li>
                    <?php }} ?>
                </ul>
                <ul class="hero-banner">
                    <div class="hero__item set-bg" data-setbg="admin/upload/AnhGoc/banner.png">
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản phẩm tốt nhất</h2>
                </div>
            </div>
            <div class="categories__slider owl-carousel">
                <?php foreach ($getMostComment as $item){ ?>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="admin/upload/AnhNhanBan/product/<?= $item['image'] ?>" alt="">
                            <h5><a href="?url=product&act=detail&id=<?= $item['product_id'] ?>" class="latest-product__item"> <h6><?= $item['name'] ?></h6></a></h5>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản phẩm nổi bật</h2>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            <?php 
            $dem = 0; 
            foreach ($getMostComment as $item) {
                if ($dem <= 8 && $item['status'] == 1) {  // Kiểm tra nếu $dem < 4 và $item['status'] == 1
                    $dem++;  // Tăng biến $dem khi điều kiện đúng
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="admin/upload/AnhNhanBan/product/<?= $item['image'] ?>">
                            <ul class="featured__item__pic__hover">
                                <form action="?url=cart&act=addToCart" method="post">
                                    <input type="hidden" name="id" value="<?= $item['product_id'] ?>">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="primary-btn">Thêm vào giỏ hàng</button>
                                </form>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="?url=product&act=detail&id=<?= $item['product_id'] ?>"><?= $item['name'] ?></a></h6>
                            <h5><?= $item['price'] ?> Vnđ</h5>
                        </div>
                    </div>
                </div>
            <?php 
            }
            }
            ?>
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="admin/upload/AnhGoc/banner.png" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="admin/upload/AnhGoc/banner.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Sản phẩm mới nhất</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                        <?php 
                            $dem = 0; 
                            foreach ($getLatestProduct as $item) {
                                if ($dem <= 4 && $item['status'] == 1) {  // Kiểm tra nếu $dem < 4 và $item['status'] == 1
                                    $dem++;  // Tăng biến $dem khi điều kiện đúng
                        ?>
                                <a href="?url=product&act=detail&id=<?= $item['product_id'] ?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="admin/upload/AnhNhanBan/product/<?= $item['image'] ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $item['name'] ?></h6>
                                        <span><?= number_format($item['price']) ?> Vnđ</span> <!-- Format giá trị -->
                                    </div>
                                </a>
                        <?php 
                                }
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Sản phẩm được xem nhiều</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                        <?php 
                            $dem = 0; 
                            foreach ($getProductByView as $item) {
                                if ($dem <= 4 && $item['status'] == 1) {  // Kiểm tra nếu $dem < 4 và $item['status'] == 1
                                    $dem++;  // Tăng biến $dem khi điều kiện đúng
                        ?>
                                <a href="?url=product&act=detail&id=<?= $item['product_id'] ?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="admin/upload/AnhNhanBan/product/<?= $item['image'] ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $item['name'] ?></h6>
                                        <span><?= number_format($item['price']) ?> Vnđ</span> <!-- Format giá trị -->
                                    </div>
                                </a>
                        <?php 
                                }
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Sản phẩm được đánh giá nhiều</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                        <?php 
                            $dem = 0; 
                            foreach ($getMostComment as $item) {
                                if ($dem <= 4 && $item['status'] == 1) {  // Kiểm tra nếu $dem < 4 và $item['status'] == 1
                                    $dem++;  // Tăng biến $dem khi điều kiện đúng
                        ?>
                                <a href="?url=product&act=detail&id=<?= $item['product_id'] ?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="admin/upload/AnhNhanBan/product/<?= $item['image'] ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $item['name'] ?></h6>
                                        <span><?= number_format($item['price']) ?> Vnđ</span> <!-- Format giá trị -->
                                    </div>
                                </a>
                        <?php 
                                }
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Product Section End -->
